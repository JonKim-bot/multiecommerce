<?php

namespace App\Controllers;

use App\Core\BaseController;

use App\Models\OrdersModel;
use App\Models\ShopModel;
use App\Models\EmailModel;
use App\Models\OrdersStatusModel;
use App\Models\ProductOptionSelectionModel;

use App\Models\OrderDetailModel;
require_once APPPATH .
    'ThirdParty' .
    DIRECTORY_SEPARATOR .
    'dompdf' .
    DIRECTORY_SEPARATOR .
    'autoload.inc.php';

use Dompdf\Dompdf;

class Orders extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->OrderDetailModel = new OrderDetailModel();
        $this->ShopModel = new ShopModel();
        $this->ProductOptionSelectionModel = new ProductOptionSelectionModel();

        $this->OrdersStatusModel = new OrdersStatusModel();

        $this->EmailModel = new EmailModel();

        $this->OrdersModel = new OrdersModel();
        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            // echo "<script>location.href='".base_url()."/access/login';</script>";
        }

        if (session()->get('admin_data') == 'MERCHANT') {
            //  redirect()->to(base_url('access/login/'));
            $this->isMerchant = true;
        }
    }

    public function kitchen_order($orders_id)
    {
        // $this->debug($orders);
        $where = [
            'orders.orders_id' => $orders_id,
        ];
        $orders = $this->OrdersModel->getWhere($where);
        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop($orders[0]['shop_id']);
        }
        foreach ($orders as $key_main => $row) {
            $order_detail = $this->OrderDetailModel->getWhere([
                'orders_id' => $row['orders_id'],
            ]);
            $orders[$key_main]['order_detail'] = $this->get_order_detail_option(
                $order_detail
            );
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['orders'] = $orders[0];
        $this->pageData['shop'] = $this->ShopModel->getWhere([
            'shop.shop_id' => $orders[0]['shop_id'],
        ])[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/orders/kitchen_order');
    }

    public function unset_array($filter, $orgininal)
    {
        foreach ($filter as $key => $row) {
            foreach ($orgininal as $dual_key => $ori) {
                unset($orgininal[$dual_key][$row]);
            }
        }

        return $orgininal;
    }
    public function export_orders()
    {
        $where = [
            'orders.shop_id' => $this->shop_id,
        ];

        $orders_csv = $this->OrdersModel->getWhere($where);
        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop($orders_csv[0]['shop_id']);
        }
        $filter = [
            'order_customer_id',
            'payment_method_id',
            'orders_status_id',
            'modified_date',
            'modified_by',
            'created_by',
            'deleted',
            'is_active',
            'image',
            'receipt_url',
            'shop_id',
            'product_id',
        ];
        $orders_csv = $this->unset_array($filter, $orders_csv);

        $url = $this->exports_to_csv($orders_csv, 'orders');
        return redirect()->to($url);
    }
    public function exports_to_csv($data, $file_name)
    {
        $filter = [
            'order_detail_id    ',
            'modified_date',
            'modified_by',
            'created_by',
            'deleted',
            'image',
            'order_detail_id',
            'orders_id',
            'created_at',
            'product_id',
        ];
        $path = './public/csv/' . $file_name . '.csv';
        $path_return = '/public/csv/' . $file_name . '.csv';

        $handle = fopen($path, 'w');
        $header = array_keys($data[0]);
        //get all key from array and make it become header
        fputcsv($handle, $header);

        foreach ($data as $data_array) {
            fputcsv($handle, $data_array);
            $order_details = $this->OrderDetailModel->getWhere([
                'orders_id' => $data_array['orders_id'],
            ]);
            $order_details = $this->unset_array($filter, $order_details);
            $headerdetail = array_keys($order_details[0]);

            fputcsv($handle, $headerdetail);
            foreach ($order_details as $order_detail) {
                fputcsv($handle, $order_detail);
            }
            fputcsv($handle, []);
        }
        fclose($handle);
        return base_url() . $path_return;
        exit();
    }
    public function view_receipt($orders_id)
    {
        // $this->debug($orders);
        $where = [
            'orders.orders_id' => $orders_id,
        ];
        $orders = $this->OrdersModel->getWhere($where);
        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop($orders[0]['shop_id']);
        }
        foreach ($orders as $key_main => $row) {
            $order_detail = $this->OrderDetailModel->getWhere([
                'orders_id' => $row['orders_id'],
            ]);
            $orders[$key_main]['order_detail'] = $this->get_order_detail_option(
                $order_detail
            );
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['orders'] = $orders[0];
        $this->pageData['shop'] = $this->ShopModel->getWhere([
            'shop.shop_id' => $orders[0]['shop_id'],
        ])[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/orders/receipt');
    }
    public function notify_customer($orders_id)
    {
        $url = base_url() . '/main/order_detail/' . $orders_id;
        $where = [
            'orders.orders_id' => $orders_id,
        ];
        $orders = $this->OrdersModel->getWhere($where)[0];

        echo '<script>
            var message = "Hi, "+"' .
            $orders['full_name'] .
            '"+" your current order status for ' .
            $url .
            ' is " + "' .
            $orders['orders_status'] .
            '";
            message = encodeURIComponent(message);
            window.location.href = "https://api.whatsapp.com/send?phone="+"' .
            $orders['orders_status'] .
            '"+"&text=" + message;
            </script>
             ';
    }
    public function print_kitchen_order($orders_id)
    {
        $where = [
            'orders.orders_id' => $orders_id,
        ];
        $orders = $this->OrdersModel->getWhere($where);
        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop($orders[0]['shop_id']);
        }
        foreach ($orders as $key_main => $row) {
            $order_detail = $this->OrderDetailModel->getWhere([
                'orders_id' => $row['orders_id'],
            ]);
            $orders[$key_main]['order_detail'] = $this->get_order_detail_option(
                $order_detail
            );
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['orders'] = $orders[0];
        $this->pageData['shop'] = $this->ShopModel->getWhere([
            'shop.shop_id' => $orders[0]['shop_id'],
        ])[0];

        $dompdf = new Dompdf();

        $dompdf->loadHtml(view('admin/orders/kitchen_order', $this->pageData));
        // setting paper to portrait, also we have landscape
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Download pdf
        $dompdf->stream('dompdf_out.pdf', ['Attachment' => false]);
        exit(0);
    }
    public function print_receipt($orders_id)
    {
        $where = [
            'orders.orders_id' => $orders_id,
        ];
        $orders = $this->OrdersModel->getWhere($where);
        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop($orders[0]['shop_id']);
        }
        foreach ($orders as $key => $row) {
            $orders[$key]['order_detail'] = $this->OrderDetailModel->getWhere([
                'orders_id' => $row['orders_id'],
            ]);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['orders'] = $orders[0];
        $this->pageData['shop'] = $this->ShopModel->getWhere([
            'shop.shop_id' => $orders[0]['shop_id'],
        ])[0];

        $dompdf = new Dompdf();

        $dompdf->loadHtml(view('admin/orders/receipt', $this->pageData));
        // setting paper to portrait, also we have landscape
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Download pdf
        $dompdf->stream('dompdf_out.pdf', ['Attachment' => false]);
        exit(0);
    }
    public function index()
    {
        $where = [
            'orders.shop_id' => $this->shop_id,
        ];

        if ($_GET) {
            $where['orders.orders_status_id'] = $_GET['status'];
        }
        $orders = $this->OrdersModel->getWhere($where);

        $orders_static = $this->OrdersModel->getStatic($where);
        $this->pageData['orders_count'] = count($orders);

        $this->pageData['orders_static'] = $orders_static[0];

        // $this->debug($orders_static);
        $this->pageData['orders'] = $orders;

        // $this->debug($orders);
        echo view('admin/header', $this->pageData);
        echo view('admin/orders/all');
        echo view('admin/footer');
    }

    public function change_status($orders_status_id, $orders_id)
    {
        $where['orders.orders_id'] = $orders_id;
        $data = [
            'orders_status_id' => $orders_status_id,
        ];
        $orders = $this->OrdersModel->updateWhere($where, $data);
        $this->EmailModel->send_email_tracking($orders_id);
        return redirect()->to(
            base_url('orders/detail/' . $orders_id, 'refresh')
        );
    }

    public function view_order_status($orders_id = '')
    {
        $where = [
            'orders.orders_id' => $orders_id,
        ];
        $orders = $this->OrdersModel->getWhere($where);
        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop($orders[0]['shop_id']);
        }
        foreach ($orders as $key => $row) {
            $orders[$key]['order_detail'] = $this->OrderDetailModel->getWhere([
                'orders_id' => $row['orders_id'],
            ]);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['orders_status'] = $this->OrdersStatusModel->getAll();

        $this->pageData['shop'] = $this->ShopModel->getWhere([
            'shop.shop_id' => $orders[0]['shop_id'],
        ])[0];

        $shop_contact = $this->ShopModel->getWhere([
            'shop_id' => $orders[0]['shop_id'],
        ])[0]['contact'];

        $order_url = base_url() . '/main/order_detail/' . $orders_id;
        $message = 'MyOrder|我的订单 -> Note ' . $order_url;
        $message = rawurlencode($message);

        $orders[0]['url'] =
            'https://api.whatsapp.com/send?phone=' .
            $shop_contact .
            '&text=' .
            $message;
        $this->pageData['orders'] = $orders[0];

        // $this->debug($orders);

        echo view('admin/header');
        echo view('admin/orders/orders_tracking', $this->pageData);
        echo view('admin/footer');
    }
    public function get_order_detail_option($order_detail)
    {
        foreach ($order_detail as $key => $row_detail) {
            if ($row_detail['product_option_selection_id'] != null) {
                $product_option_selection_ids = explode(
                    ',',
                    $row_detail['product_option_selection_id']
                );
                $option_selection_arr = [];
                foreach (
                    $product_option_selection_ids
                    as $product_option_selection_id
                ) {
                    $where = [
                        'product_option_selection_id' => $product_option_selection_id,
                    ];
                    $product_option_selection = $this->ProductOptionSelectionModel->getWhere(
                        $where
                    )[0];
                    array_push(
                        $option_selection_arr,
                        $product_option_selection
                    );
                }
                $order_detail[$key][
                    'order_detail_option'
                ] = $option_selection_arr;
            }
        }
        return $order_detail;
    }

    public function detail($orders_id)
    {
        $where = [
            'orders.orders_id' => $orders_id,
        ];
        $orders = $this->OrdersModel->getWhere($where);
        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop($orders[0]['shop_id']);
        }
        foreach ($orders as $key_main => $row) {
            $order_detail = $this->OrderDetailModel->getWhere([
                'orders_id' => $row['orders_id'],
            ]);
            $orders[$key_main]['order_detail'] = $this->get_order_detail_option(
                $order_detail
            );
        }

        // $this->debug($orders);
        // $this->show_404_if_empty($admin);
        $this->pageData['orders'] = $orders[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/orders/detail');
        echo view('admin/footer');
    }

    public function edit($orders_id)
    {
        $where = [
            'orders_id' => $orders_id,
        ];

        $this->pageData['orders'] = $this->OrdersModel->getWhere($where)[0];

        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'orders' => $this->request->getPost('orders'),
                    'meta_title' => $this->request->getPost('meta_title'),
                    'meta_description' => $this->request->getPost(
                        'meta_description'
                    ),
                    'meta_keywords' => $this->request->getPost('meta_keywords'),
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                    $file = $this->request->getFile('banner');
                    $new_name = $file->getRandomName();
                    $banner = $file->move(
                        './public/images/article/',
                        $new_name
                    );
                    if ($banner) {
                        $banner = '/public/images/article/' . $new_name;
                        $data['image'] = $banner;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                } else {
                    $error = true;
                    $error_message = 'Please upload a receipt.';
                }

                $this->OrdersModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('orders/detail/' . $orders_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/orders/edit');
        echo view('admin/footer');
    }

    public function delete($orders_id)
    {
        $this->OrdersModel->softDelete($orders_id);

        return redirect()->to(base_url('orders', 'refresh'));
    }
}
