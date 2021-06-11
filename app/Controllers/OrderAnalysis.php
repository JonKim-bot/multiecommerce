<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\OrdersModel;

class OrderAnalysis extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->OrdersModel = new OrdersModel();

        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            // echo "<script>location.href='".base_url()."/access/login';</script>";
        }
    }

    public function index()
    {
     
        $shop_id = $this->shop_id;
        $total_today_orders = $this->OrdersModel->get_total_today_orders($shop_id);
        $total_number_orders = $this->OrdersModel->get_total_number_orders($shop_id);
        $new_registered_member = $this->OrdersModel->get_new_registered_member($shop_id);
        $this->pageData['total_today_orders'] = $total_today_orders;
        $this->pageData['total_number_orders'] = $total_number_orders;
        $this->pageData['new_registered_member'] = $new_registered_member;

        echo view('admin/header', $this->pageData);
        echo view('admin/orderanalysis/all');
        echo view('admin/footer');
    }

    public function get_total_sales()
    {
     
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];

        $shop_id = $this->shop_id;
        $total_sales = $this->OrdersModel->get_total_sales($shop_id,$date_from,$date_to);
        $this->pageData['total_sales'] = $total_sales;
        echo view('admin/orderanalysis/total_sales_chart',$this->pageData);
    }

    public function get_total_order()
    {
     
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];

        $shop_id = $this->shop_id;
        $total_order = $this->OrdersModel->get_total_order($shop_id,$date_from,$date_to);
        $this->pageData['total_order'] = $total_order;
        echo view('admin/orderanalysis/total_order_chart',$this->pageData);
    }

    public function get_total_rate()
    {
     
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];

        $shop_id = $this->shop_id;
        $total_rate = $this->OrdersModel->get_rate($shop_id,$date_from,$date_to);
        $this->pageData['total_rate'] = $total_rate;
        echo view('admin/orderanalysis/total_rate_chart',$this->pageData);
    }
    
    public function get_new_register()
    {
     
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];

        $shop_id = $this->shop_id;
        $total_new_register = $this->OrdersModel->get_new_register($shop_id,$date_from,$date_to);
        $this->pageData['total_new_register'] = $total_new_register;
        echo view('admin/orderanalysis/total_new_register_chart',$this->pageData);
    }
    
    public function get_top_product_cat()
    {
     
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];

        $shop_id = $this->shop_id;
        $top_product_cat = $this->OrdersModel->get_top_product_cat($shop_id,$date_from,$date_to);
        $this->pageData['top_product_cat'] = $top_product_cat;
        echo view('admin/orderanalysis/top_product_cat_table',$this->pageData);
    }
    
    public function get_top_product()
    {
     
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];

        $shop_id = $this->shop_id;
        $top_product = $this->OrdersModel->get_top_product($shop_id,$date_from,$date_to);
        $this->pageData['top_product'] = $top_product;
        echo view('admin/orderanalysis/top_product_table',$this->pageData);
    }
    public function detail()
    {
      
        echo view('admin/header', $this->pageData);
        echo view('admin/orderanalysis/detail');
        echo view('admin/footer');
    }

  
}
