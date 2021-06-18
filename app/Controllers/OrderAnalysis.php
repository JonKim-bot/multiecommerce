<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\OrdersModel;
use App\Models\ProductCategoryModel;
use App\Models\ShopModel;

class Orderanalysis extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->OrdersModel = new OrdersModel();
        $this->ProductCategoryModel = new ProductCategoryModel();
        $this->ShopModel = new ShopModel();



        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            // echo "<script>location.href='".base_url()."/access/login';</script>";
        }

        if (session()->get('admin_data')['type'] == 'MERCHANT') {
            $shop_data = session()->get('shop_data');
            $shop_function = $this->getShopFunction($shop_data['shop_id']);
            $this->shop_function = $shop_function;
            //  redirect()->to(base_url('access/login/'));
        }


     
    }

    public function indexadmin()
    {
        $shop_id =
        ($_GET and $_GET['shop_id'])
            ? $_GET['shop_id']
            : '1';
     
        $total_today_orders = $this->OrdersModel->get_total_today_orders($shop_id);
        $total_number_orders = $this->OrdersModel->get_total_number_orders($shop_id);
        $new_registered_member = $this->OrdersModel->get_new_registered_member($shop_id);
        $this->pageData['total_today_orders'] = $total_today_orders;
        $this->pageData['total_number_orders'] = $total_number_orders;
        $this->pageData['new_registered_member'] = $new_registered_member;
        $shop = $this->ShopModel->getAll();
        $this->pageData['shop'] = $shop;


        echo view('admin/header', $this->pageData);

        echo view('admin/orderanalysis/all_admin');
        echo view('admin/footer');
    }
    public function index()
    {

        if($this->isMerchant == false){
            $this->indexadmin();
            return;
        }
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

        $shop_id =
        ($_POST and $_POST['shop_id'])
            ? $_POST['shop_id']
            : $this->shop_id;
        $total_sales = $this->OrdersModel->get_total_sales($shop_id,$date_from,$date_to);
        $this->pageData['total_sales'] = $total_sales;
        echo view('admin/orderanalysis/total_sales_chart',$this->pageData);
    }

    public function get_total_order()
    {
     
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];

        $shop_id =
        ($_POST and $_POST['shop_id'])
            ? $_POST['shop_id']
            : $this->shop_id;
        $total_order = $this->OrdersModel->get_total_order($shop_id,$date_from,$date_to);
        $this->pageData['total_order'] = $total_order;
        echo view('admin/orderanalysis/total_order_chart',$this->pageData);
    }

    public function get_total_rate()
    {
     
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];

        $shop_id =
        ($_POST and $_POST['shop_id'])
            ? $_POST['shop_id']
            : $this->shop_id;        $total_rate = $this->OrdersModel->get_rate($shop_id,$date_from,$date_to);
        $this->pageData['total_rate'] = $total_rate;
        // $this->debug($total_rate);

        echo view('admin/orderanalysis/total_rate_chart',$this->pageData);
    }
    
    public function get_new_register()
    {
     
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];

        $shop_id =
        ($_POST and $_POST['shop_id'])
            ? $_POST['shop_id']
            : $this->shop_id;        $total_new_register = $this->OrdersModel->get_new_register($shop_id,$date_from,$date_to);
        $this->pageData['total_new_register'] = $total_new_register;
        echo view('admin/orderanalysis/total_new_register_chart',$this->pageData);
    }
    
    public function get_top_product_cat()
    {
     
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];

        $shop_id =
        ($_POST and $_POST['shop_id'])
            ? $_POST['shop_id']
            : $this->shop_id;        $top_product_cat = $this->OrdersModel->get_top_product_cat($shop_id,$date_from,$date_to);
        $top_category_array = [];
        $data_category_sales = [];
        foreach($top_product_cat as $key=> $row){
                $where = [
                    'product_category.product_id' => $row['product_id']
                ];
                $product_category = $this->ProductCategoryModel->getWhere($where);
                if(!empty($product_category)){
                    $category = $product_category;
                    foreach($category as $keycategory => $row_category){
           

                        if (!in_array($row_category['category'], $top_category_array) ){
                            $data = [
                                'category' => $row_category['category'],
                                'sales' => $row['total'],
                                'category_id' => $row_category['category_id'],
                            ]; 
                            // if not existed push
                            array_push($top_category_array,$row_category['category']);
                            array_push($data_category_sales,$data);
                        }else{
                            //if exiseted add
                            foreach($data_category_sales as $key_sales => $row_category_sales){
                                if($row_category_sales['category'] == $row_category['category']){
                                    $data_category_sales[$key_sales]['category'] = $row_category['category'];
                                    $data_category_sales[$key_sales]['sales'] = $data_category_sales[$key_sales]['sales'] + $row['total'] ;
                                }
                            }
                        }

                    }

                }
                
        }

        $this->pageData['top_product_cat'] = $data_category_sales;
        echo view('admin/orderanalysis/top_product_cat_table',$this->pageData);
    }
    
    public function get_top_product()
    {
     
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];

        $shop_id =
        ($_POST and $_POST['shop_id'])
            ? $_POST['shop_id']

            : $this->shop_id;
        $top_product = $this->OrdersModel->get_top_product($shop_id,$date_from,$date_to);
        $this->pageData['top_product'] = $top_product;
        echo view('admin/orderanalysis/top_product_table',$this->pageData);
    }
    public function detail()
    {
        if($this->isMerchant == false){
            $this->detail_admin();
            return;
        }
        $this->validate_function(7,$this->shop_function);
        echo view('admin/header', $this->pageData);
        echo view('admin/orderanalysis/detail');
        echo view('admin/footer');
    }

    public function detail_admin()
    {
    
        $shop = $this->ShopModel->getAll();
        $this->pageData['shop'] = $shop;

        echo view('admin/header', $this->pageData);
        echo view('admin/orderanalysis/detail_admin');
        echo view('admin/footer');
    }
  
}
