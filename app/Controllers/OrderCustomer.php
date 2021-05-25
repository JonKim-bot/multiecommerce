<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\OrderCustomerModel;
use App\Models\OrdersModel;

class OrderCustomer extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->OrdersModel = new OrdersModel();

        $this->OrderCustomerModel = new OrderCustomerModel();
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
        } else {
            $this->isMerchant = false;
        }
    }

    public function export_customer()
    {
        
        $order_customer = $this->OrderCustomerModel->getWhere([
            'orders.shop_id' => $this->shop_id,
        ]);
        $filter = [
            'order_customer_id',
            'modified_date',
            'modified_by',
            'created_by',
            'created_at',
            'delivery_date',

            'deleted',
            'is_active',
            'image',
            'receipt_url',
            'shop_id',
            'product_id',
        ];
        $orders_csv = $this->unset_array($filter, $order_customer);

        $url = $this->exports_to_csv($orders_csv, 'order_customer');

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
   
    public function exports_to_csv($data, $file_name)
    {
        
        $path = './public/csv/' . $file_name . '.csv';
        $path_return = '/public/csv/' . $file_name . '.csv';

        $handle = fopen($path, 'w');
        $header = array_keys($data[0]);
        //get all key from array and make it become header
        fputcsv($handle, $header);

        foreach ($data as $data_array) {
            fputcsv($handle, $data_array);
            
        }
        fclose($handle);
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="orders.csv"');
        ob_clean();
        readfile(base_url() . $path_return);
        return base_url() . $path_return;
        exit();
    }
    public function index()
    {
        if ($this->isMerchant) {
            $order_customer = $this->OrderCustomerModel->getWhere([
                'orders.shop_id' => $this->shop_id,
            ]);
        } else {
            $order_customer = $this->OrderCustomerModel->getAll();
        }
        $this->pageData['order_customer'] = $order_customer;

        echo view('admin/header', $this->pageData);
        echo view('admin/order_customer/all');
        echo view('admin/footer');
    }

    public function detail($order_customer_id)
    {
        $where = [
            'order_customer.order_customer_id' => $order_customer_id,
        ];
        $order_customer = $this->OrderCustomerModel->getWhere($where);
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop($order_customer[0]['shop_id']);
        }
        $this->show_404_if_empty($order_customer);
        $where = [
            'order_customer.full_name' => $order_customer[0]['full_name'],
        ];
        $orders = $this->OrderCustomerModel->getWhereOrders($where);
        
        // $this->show_404_if_empty($admin);
        $total_order = array_column($orders, 'grand_total');

        if (!empty($total_order)) {
            $this->pageData['orders_total'] = $total_order[0];
        } else {
            $this->pageData['orders_total'] = 0;
        }
        //  $this->debug( $this->pageData["orders_total"]);
        $this->pageData['orders_count'] = count($orders);
        $this->pageData['orders'] = $orders;

        $this->pageData['order_customer'] = $order_customer[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/order_customer/detail');
        echo view('admin/footer');
    }
}
