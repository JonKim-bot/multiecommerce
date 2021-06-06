<?php

namespace App\Controllers;

use App\Core\BaseController;

use App\Models\OrdersModel;
use App\Models\ShopModel;
use App\Models\EmailModel;
use App\Models\OrdersStatusModel;
use App\Models\ProductOptionSelectionModel;
use App\Models\PromoModel;
use App\Models\ShopFunctionModel;
use App\Models\PointModel;

// use App\Models\ShopOperatingHourModel;

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
        $this->ShopFunctionModel = new ShopFunctionModel();
        $this->PointModel = new PointModel();
        $this->OrderDetailModel = new OrderDetailModel();
        // $this->ShopOperatingHourModel = new ShopOperatingHourModel();

        $this->ShopModel = new ShopModel();
        $this->PromoModel = new PromoModel();

        $this->ProductOptionSelectionModel = new ProductOptionSelectionModel();

        $this->OrdersStatusModel = new OrdersStatusModel();

        $this->EmailModel = new EmailModel();

        $this->OrdersModel = new OrdersModel();
        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {

            //  redirect()->to(base_url('access/login/'));
            echo "<script>location.href='" .
                base_url() .
                "/access/login';</script>";
        }

        if (session()->get('admin_data')['type'] == 'MERCHANT') {
            //  redirect()->to(base_url('access/login/'));
            $this->isMerchant = true;
        }

        $shop_data = session()->get('shop_data');
    }

    // public function generate_operating_hour($shop_id){
    //     $days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
    //     foreach($days as $row_day){
    //         $where = [
    //             'day' => $row_day,
    //             'shop_id' => $shop_id,
    //         ];
    //         $is_exist = $this->ShopOperatingHourModel->getWhere($where);
    //         if(empty($is_exist)){
    //             $data = [
    //                 'day' => $row_day,
    //                 'shop_id' => $shop_id,
    //                 'open_at' => '00:00',
    //                 'closed_at' => '23:59'
    //             ];
    //             $this->ShopOperatingHourModel->insertNew($data);
    //         }

    //     }
    // }

    public function kitchen_order($orders_id)
    {
        // $this->debug($orders);
        $where = [
            'orders.orders_id' => $orders_id,
        ];
        $orders = $this->OrdersModel->getWhere($where);
        if ($this->isMerchant == true) {
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
    public function set_paid($orders_id){
       
        $where = array(
            "orders.orders_id" => $orders_id,
        );
        $orders = $this->OrdersModel->getWhere($where)[0];
        if($orders['is_paid'] == 1){
            $is_paid = 0;
        }else{
            $is_paid = 1;
        }

        $data = array(
            "is_paid" => $is_paid,
        );
        $this->OrdersModel->updateWhere($where,$data);
        if($is_paid == 1 && $this->check_exist_function(1,$orders['shop_id'])){
            $this->give_point($orders_id);
            
        }
        return redirect()->to(
            base_url('orders', 'refresh')
        );

    }
    public function give_point($orders_id){

        $where = [
            'orders.orders_id' => $orders_id,
        ];
        $orders = $this->OrdersModel->getWhere($where)[0];
        $where = [
            'orders_id' => $orders_id,
            'customer_id' => $orders['customer_id'],
        ];
        $point = $this->PointModel->getWhere($where);
        if(empty($point)){
            if($orders['customer_id'] > 0){
                $remarks = 'Point for ' . $orders['contact'] . " on orders " . $orders['order_code'];
                $this->PointModel->point_in($orders['customer_id'],$orders['grand_total'],$remarks,$orders_id);
                $this->purchase_orders_percent($orders);
            }
        }

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
        $dateFrom =
            ($_GET and isset($_GET['dateFrom']))
                ? $_GET['dateFrom']
                : date('Y-m-d');
        $dateTo =
            ($_GET and isset($_GET['dateTo']))
                ? $_GET['dateTo']
                : date('Y-m-d');
        $status =
            ($_GET and isset($_GET['status_id']) && $_GET['status_id'] != '')
                ? $_GET['status_id']
                : '';
        $preorder =
            ($_GET and isset($_GET['preorder'])) ? $_GET['preorder'] : '';

        if (isset($_GET['dateFrom'])) {
            $where['DATE(orders.created_at) >='] = $dateFrom;
            $where['DATE(orders.created_at) <='] = $dateTo;
        }
        if ($status != '') {
            $where['orders.orders_status_id'] = $_GET['status_id'];
        }
        if ($preorder) {
            $where['orders.is_preorder'] = 1;
        }

        $orders_csv = $this->OrdersModel->getWhere($where);
        if ($this->isMerchant == true) {
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

        // return redirect()->to($url);
    }
    public function purchase_orders_percent($orders)
    {
        // $where = [
        //     'user.user_id' => $user['referral_id']
        // ];
        $where = [
            'customer.customer_id' => $orders['customer_id'],
        ];
        $customer = $this->CustomerModel->getWhere($where)[0];
        $where = [
            'customer.customer_id' => $customer['referal_id'],
        ];
        $parent = $this->CustomerModel->getWhere($where);
        // $discount_amount  = ($this->parseFloat($total)) * ($promo['offer_percent'] / 100);
        $shop_rate_col = array_column($this->ShopRateModel->getWhere(['shop_id' => $orders['shop_id']]),'rate_name');

        if (!empty($parent) && in_array('first_rate',$shop_rate_col)) {
            $where_col = [
                'rate_name' => 'first_rate',
                'shop_id' => $orders['shop_id']
            ];
            $shop_rate = $this->ShopRateModel->getWhere($where_col)[0];
            $parent = $parent[0];
            $data = [
                'percent' => $shop_rate['rate'],
                'is_commission' => 1,
                'customer_id' => $parent['customer_id'],
                'amount' =>  floatval($orders['grand_total']) * ($shop_rate['rate'] / 100),
                'remarks' => 'Downline Task Commission for ' . $parent['name'] . ' with downline ' . $customer['name'] ,
                'orders_id' => $orders['orders_id'],
            ];
            // $this->WalletModel->wallet_in($user['user_id'], $_POST['amount'], $remark);

            $this->PointModel->point_commision_in($data);
            $where = [
                'customer.customer_id' => $parent['referal_id'],
            ];
            $grand_parent = $this->CustomerModel->getWhere($where);

            if (!empty($grand_parent)  && in_array('second_rate',$shop_rate_col)) {
                $grand_parent = $grand_parent[0];

                $where_col = [
                    'rate_name' => 'second_rate',
                    'shop_id' => $orders['shop_id']
                ];
                $shop_rate = $this->ShopRateModel->getWhere($where_col)[0];
                $data = [
                    'percent' => $shop_rate['rate'],
                    'is_commission' => 1,
                    'customer_id' => $grand_parent['customer_id'],

                    'amount' =>  floatval($orders['grand_total']) * ($shop_rate['rate'] / 100),
                    'remarks' => 'Downline Task Commission for ' . $parent['name'] . ' with downline ' . $customer['name'] ,
                    'orders_id' => $orders['orders_id'],
                ];

                // $this->WalletModel->wallet_in($user['user_id'], $_POST['amount'], $remark);
                $this->PointModel->point_commision_in($data);

           
                $where = [
                    'customer.referal_id' => $grand_parent['referal_id'],
                ];

                $grand_grand_parent = $this->CustomerModel->getWhere($where);

                if (!empty($grand_grand_parent)  && in_array('thrid_rate',$shop_rate_col)) {
                    $grand_grand_parent = $grand_grand_parent[0];

                    $where_col = [
                        'rate_name' => 'thrid_rate',
                        'shop_id' => $orders['shop_id']
                    ];
                    $shop_rate = $this->ShopRateModel->getWhere($where_col)[0];
                    $data = [
                        'percent' => $shop_rate['rate'],
                        'is_commission' => 1,
                        'customer_id' => $grand_grand_parent['customer_id'],
                        'amount' =>  floatval($orders['grand_total']) * ($shop_rate['rate'] / 100),
                        'remarks' => 'Downline Task Commission for ' . $parent['name'] . ' with downline ' . $customer['name'] ,
                        'orders_id' => $orders['orders_id'],
                    ];
                    // $this->WalletModel->wallet_in($user['user_id'], $_POST['amount'], $remark);

                    $this->PointModel->point_commision_in($data);

                }
            }
        }
    }

    public function return_option_text($array){
        $text = '';
        foreach($array as $row){
            $text.= $row['option_name'] . " , " . $row['product_option_name'] . " | ";
        }
        return $text;
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
            if(!empty($order_details)){

                foreach($order_details as $key=> $row){
                    if($row['product_option_selection_id'] != null){
                        $where = [
                            'product_option_selection_id' => explode(',',$row['product_option_selection_id']),
                        ];
                        $order_details_name = $this->ProductOptionSelectionModel->getWhereIn($where['product_option_selection_id']);
                        $order_details_name = $this->return_option_text($order_details_name);
                      
                        $order_details[$key]['orders_detail_name'] = $order_details_name;
                    }
                }
                $order_details = $this->unset_array($filter, $order_details);
    
                $headerdetail = array_keys($order_details[0]);
    
                fputcsv($handle, $headerdetail);
    
                foreach ($order_details as $order_detail) {
                    fputcsv($handle, $order_detail);
                }
                fputcsv($handle, []);
            }
        }
        fclose($handle);
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="orders.csv"');
        ob_clean();
        readfile(base_url() . $path_return);
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
        if ($this->isMerchant == true) {
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
    function startsWith($string, $startString)
    {
        $len = strlen($startString);
        return substr($string, 0, $len) === $startString;
    }
    public function notify_customer($orders_id)
    {
        
        $where = [
            'orders.orders_id' => $orders_id,
        ];
        $orders = $this->OrdersModel->getWhere($where)[0];
        $shop = $this->ShopModel->getWhere(['shop_id' => $orders['shop_id']])[0];
        $url = base_url() . "/main/payment/" . $shop['slug'] . '/' . $orders['order_code'];
        $orders['contact'] = str_replace('+', '', $orders['contact']);

        $orders['contact'] = str_replace('-', '', $orders['contact']);
        
        if (!$this->startsWith($orders['contact'], '6')) {
            $orders['contact'] = '6' . $orders['contact'];
        }
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
            $orders['contact'] .
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
        if ($this->isMerchant == true) {
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
        if ($this->isMerchant == true) {
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
        // $this->generate_operating_hour($this->shop_id);

        $dateFrom =
            ($_GET and isset($_GET['dateFrom']))
                ? $_GET['dateFrom']
                : date('Y-m-d');
        $dateTo =
            ($_GET and isset($_GET['dateTo']))
                ? $_GET['dateTo']
                : date('Y-m-d');
        $status =
            ($_GET and isset($_GET['status_id']) && $_GET['status_id'] != '')
                ? $_GET['status_id']
                : '';
        $preorder =
            ($_GET and isset($_GET['preorder'])) ? $_GET['preorder'] : '';

        if (isset($_GET['dateFrom'])) {
            $where['DATE(orders.created_at) >='] = $dateFrom;
            $where['DATE(orders.created_at) <='] = $dateTo;
        }
        if ($status != '') {
            $where['orders.orders_status_id'] = $_GET['status_id'];
        }
        if ($preorder) {
            $where['orders.is_preorder'] = 1;
        }
        // $this->debug($where);
        $this->pageData['dateFrom'] = $dateFrom;
        $this->pageData['dateTo'] = $dateTo;

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
        if ($this->isMerchant == true) {
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
                    );
                    if (!empty($product_option_selection)) {
                        $product_option_selection =
                            $product_option_selection[0];
                        array_push(
                            $option_selection_arr,
                            $product_option_selection
                        );
                    }
                }
                $order_detail[$key][
                    'order_detail_option'
                ] = $option_selection_arr;
            }
        }
        return $order_detail;
    }
    public function check_exist_function($function_id,$shop_id){
        $where = [
            'shop_function.shop_id' => $shop_id
        ];
        $shop_function = array_column($this->ShopFunctionModel->getWhere($where),'function_id');
        if(in_array($function_id,$shop_function)){ 
            return true;
        }else{
            return false;
        }
    }
    public function detail($orders_id)
    {
        $where = [
            'orders.orders_id' => $orders_id,
        ];
        $orders = $this->OrdersModel->getWhere($where);
        if ($this->isMerchant == true) {
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

        if ($orders[0]['promo_id'] > 1) {
            $where = [
                'promo.promo_id' => $orders[0]['promo_id'],
            ];
            $promo = $this->PromoModel->getWhere($where)[0];
            if ($promo['discount_type_id'] == 1) {
                $amount = str_replace('RM', '', $promo['offer_amount']);
                
            } else {
                $amount =
                    str_replace('RM', '', $orders[0]['grand_total']) *
                    ($promo['offer_percent'] / 100);
            }
            $orders[0]['amount'] = $amount;
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
