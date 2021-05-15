<?php



namespace App\Controllers;

use App\Core\BaseController;
use App\Models\ShopModel;
use App\Models\ProductModel;
use App\Models\BannerModel;
use App\Models\AboutModel;
use App\Models\CategoryModel;
use App\Models\ProductImageModel;

use App\Models\OrdersModel;
use App\Models\MerchantModel;

use App\Models\AnnouncementModel;
use App\Models\BrandModel;
use App\Models\OrderCustomerModel;


use App\Models\ProductOptionSelectionModel;
use App\Models\ProductOptionModel;

use App\Models\OrderDetailModel;
use App\Models\PaymentMethodModel;
use App\Models\EmailModel;
use App\Models\OrdersStatusModel;
use App\Models\ShopPaymentMethodModel;
use App\Models\OrderDetailOptionModel;

class Main extends BaseController
{


    public function __construct()
    {
        
        $this->ShopModel = new ShopModel();
        $this->ProductOptionModel = new ProductOptionModel();
        $this->OrderCustomerModel = new OrderCustomerModel();

        $this->AboutModel = new AboutModel();
        $this->CategoryModel = new CategoryModel();
        $this->OrdersModel = new OrdersModel();
        $this->MerchantModel = new MerchantModel();
        $this->AnnouncementModel = new AnnouncementModel();
        $this->BrandModel = new BrandModel();
        $this->ProductImageModel = new ProductImageModel();

        $this->OrdersStatusModel = new OrdersStatusModel();
        $this->ProductOptionSelectionModel = new ProductOptionSelectionModel();

        $this->EmailModel = new EmailModel();

        $this->BannerModel = new BannerModel();
        $this->ProductModel = new ProductModel();
        $this->PaymentMethod = new PaymentMethodModel();
        $this->ShopPaymentMethodModel = new ShopPaymentMethodModel();
        $this->OrderDetailOptionModel = new OrderDetailOptionModel();

        $this->OrderDetailModel = new OrderDetailModel();

        $this->pageData = array();

        $this->session = session();
        if (!empty($this->session->get("cart"))) {
            $this->pageData['cart'] = $this->session->get("cart");
            $this->pageData['cart_count'] = count($this->pageData['cart']);
        } else {
            $this->pageData['cart'] = array();
            $this->pageData['cart_count'] = 0;
        }
    }

    public function get_shop($slug){
        $where =[
            'slug' => $slug
        ];
        $shop = $this->ShopModel->getWhere($where);
        $this->show_404_if_empty($shop);
        $where = [
            'shop_id' => $shop[0]['shop_id'],
        ];
        return $shop[0];
    }
    
    public function failed($slug)
    {
        $this->pageData['shop'] = $this->get_shop($slug);

        echo view("templateone/header", $this->pageData);
        echo view("templateone/failed");
        echo view("templateone/footer");

    }

    
    public function success($slug)
    {
        $this->pageData['shop'] = $this->get_shop($slug);

        echo view("templateone/header", $this->pageData);
        echo view("templateone/success");
        echo view("templateone/footer");

    }

    public function product_detail($slug,$product_id)
    {
        $shop = $this->get_shop($slug);
        $where = [
            'shop_id' => $shop['shop_id']
        ];
        $announcement = $this->AnnouncementModel->getWhere($where);
        if(!empty($announcement)){
            $announcement = $announcement[0];
            $this->pageData['announcement'] = $announcement;
        }
        $where =[
            'product_id' => $product_id
        ];
        $product = $this->ProductModel->getWhere($where)[0];
        $product_image = $this->ProductImageModel->getWhere($where);
        $where = [
            'product_id' => $product['product_id']
        ];
        $product_option = $this->ProductOptionModel->getWhere($where);
        foreach($product_option  as $key=> $row){
            $where = [
                'product_option_selection.product_option_id' => $row['product_option_id']
            ];
            $product_option[$key]['selection'] = $this->ProductOptionSelectionModel->getWhere($where);
        }

        $total_minrequired = array_sum(array_column($product_option,'minimum_required'));
        $this->pageData['total_min'] = $total_minrequired;
        $this->pageData['shop'] = $shop;
        $this->pageData['product_option'] = $product_option;
        $this->pageData['product_image'] = $product_image;
        $this->pageData['product'] = $product;
        echo view("templateone/header", $this->pageData);
        echo view("templateone/product");
        echo view("templateone/footer");

    }
    

    public function payment($slug,$order_code)
    {

        $shop = $this->get_shop($slug);
        $where = [
            'shop_id' => $shop['shop_id']
        ];
        $this->pageData['shop'] = $shop;
        $announcement = $this->AnnouncementModel->getWhere($where);
        if(!empty($announcement)){
            $announcement = $announcement[0];
            $this->pageData['announcement'] = $announcement;
        }

        $where = [
            'orders.order_code' => $order_code,
        ];
        $orders = $this->OrdersModel->getWhere($where);
        // $this->debug($orders);
        foreach($orders as $key_main=> $row){
            $order_detail = $this->OrderDetailModel->getWhere([
                'orders_id' => $row['orders_id']
            ]);   
            $orders[$key_main]['order_detail'] = $this->get_order_detail_option($order_detail);
 
        }
        // $this->debug($orders);
        $this->show_404_if_empty($orders);
        $order_url = base_url()  . "/main/order_detail/" . $orders[0]['orders_id'];
        $message = "MyOrder|我的订单 -> Note " . $order_url;
        $message = rawurlencode($message);
        
        $orders[0]['url'] =  "https://api.whatsapp.com/send?phone=" .$shop['contact']. "&text=" . $message;
        $this->pageData['orders'] = $orders[0];
        // $shop_operating_hour = $this->ShopOperatingHourModel->getWhere($where);
      
        // $this->debug($product);
        // $this->debug($product);
        // $this->debug($product);
        echo view("templateone/header", $this->pageData);
        echo view("templateone/payment");
        echo view("templateone/footer");

    }
    
    public function cart($slug)
    {
        $this->pageData['shop'] = $this->get_shop($slug);
        $shop = $this->get_shop($slug);
        $where = [
            'shop_id' => $shop['shop_id']
        ];
        $announcement = $this->AnnouncementModel->getWhere($where);
        if(!empty($announcement)){
            $announcement = $announcement[0];
            $this->pageData['announcement'] = $announcement;
        }
        // $shop_operating_hour = $this->ShopOperatingHourModel->getWhere($where);
      
        // $this->debug($product);
        // $this->debug($product);
        // $this->debug($product);
        echo view("templateone/header", $this->pageData);
        echo view("templateone/cart");
        echo view("templateone/footer");

    }
    


    public function index($slug)
    {
        $shop = $this->get_shop($slug);
        $where = [
            'shop_id' => $shop['shop_id']
        ];
        $this->pageData['shop'] = $shop;
        // $shop_operating_hour = $this->ShopOperatingHourModel->getWhere($where);

        $product = $this->ProductModel->getWhere([
            'shop_id' => $shop['shop_id'],
            'is_home' => 1,
        ]);
        $brand = $this->BrandModel->getWhere($where);

        $category = $this->CategoryModel->getWhere($where);
        $banner = $this->BannerModel->getWhere($where);
        $about = $this->AboutModel->getWhere($where);
        // $payment_method = $this->PaymentMethod->getAll();
        // $shop_payment_method = $this->ShopPaymentMethodModel->getWhere($where);
        // $shop_payment_method = array_column($shop_payment_method,'payment_method_id');
        // // $this->debug($shop_payment_method);
        // $this->pageData['shop_payment_method'] = $shop_payment_method;
        // $this->pageData['payment_method'] = $payment_method;
        $this->pageData['brand'] = $brand;

        $shop[0]['merchant_name'] = $this->MerchantModel->getWhere($where)[0]['name'];
            
        $where = [
            'shop_id' => $shop['shop_id'],
            'is_active' => 1,
        ];
        $announcement = $this->AnnouncementModel->getWhere($where);
        if(!empty($announcement)){
            $announcement = $announcement[0];
            $this->pageData['announcement'] = $announcement;
        }
        // $this->pageData['shop_operating_hour'] = $shop_operating_hour;

        $this->pageData['category'] = $category;
        $this->pageData['banner'] = $banner;
        if(!empty($about)){
            $about = $about[0];
            $this->pageData['about'] = $about;
        }
        
        $this->pageData['product'] = $product;

        echo view("templateone/header", $this->pageData);
        echo view("templateone/index");
        echo view("templateone/footer");

    }
    

    public function product_list(){
        $where = [
            'shop_id' => $_POST['shop_id']
        ];
        $shop = $this->ShopModel->getWhere($where)[0];
        if(!empty($_POST['category_ids'])){
            $where['category_ids'] = $_POST['category_ids'];
        }
        if(!empty($_POST['keyword'])){
            $where['product_name'] = $_POST['keyword'];
        }
        
        $this->pageData['shop'] = $shop;
        
        $product = $this->ProductModel->getWhereIn($where);
        $product_max_price =  $this->ProductModel->getMaxPrice();
        $this->pageData['product'] = $product;
        $this->pageData['product_max_price'] = $product_max_price[0]['max(product_price)'];
        echo view("templateone/product_list",$this->pageData);
    }
      
    public function product($slug)
    {
        $shop = $this->get_shop($slug);
        $where = [

            'shop_id' => $shop['shop_id']
        ];
        $announcement = $this->AnnouncementModel->getWhere($where);
        if(!empty($announcement)){
            $announcement = $announcement[0];
            $this->pageData['announcement'] = $announcement;
        }
        // $shop_operating_hour = $this->ShopOperatingHourModel->getWhere($where);
        $product = $this->ProductModel->getWhere($where);
        $category = $this->CategoryModel->getWhere($where);
        $this->pageData['shop'] = $shop;

        $this->pageData['category'] = $category;
        
        
        $this->pageData['product'] = $product;
        // $this->debug($product);
        // $this->debug($product);
        // $this->debug($product);
        echo view("templateone/header", $this->pageData);
        echo view("templateone/shop");
        echo view("templateone/footer");

    }
    
    
    public function add_to_cart()
    {
        // $this->session->set("cart", array());

        if ($_POST) {
            $input = $this->request->getPost();
            $error = false;

            $where = array(
                'product_id' => $input['product_id'],
            );
       
            $product = $this->ProductModel->getWhere(array(
                "product_id" => $input['product_id'],
            ))[0];

            if(!empty($input['product_selection'])){
                
                $product_selection = array_column($input['product_selection'],'product_option_selection_id');
                sort($product_selection);
                $product_selection = implode('_',$product_selection);
            }else{
                $product_selection = '';
                $input['product_selection'] = '';
            }
            
            $cart_index = $input['product_id'] . "_" . $input['product_name'] . "_" . $product_selection;

            $cart = $this->session->get("cart");

            if (!empty($cart[$cart_index])) {
                $cart[$cart_index]['quantity'] = $cart[$cart_index]['quantity'] + $input['quantity'];
                $cart[$cart_index]['total'] = $_POST['product_single_price']  * ($cart[$cart_index]['quantity']);
            } else {
                $data = array(
                    "product_id" => $input['product_id'],
                    'product_selection' => $input['product_selection'],
                    "quantity" => $input['quantity'],
                    "product_name" => $product['product_name'],
                    "thumbnail" => $product['image'],
                    "price" => $_POST['product_single_price'],
                    "total" => $_POST['product_single_price'] * $input['quantity'],
                );

                $cart[$cart_index] = $data;
            }
            
            $this->session->set("cart", $cart);

            $this->load_shopping_cart();

            // die(json_encode(array(
            //     "status" => true,
            // )));
        }
    }

    public function load_shopping_cart(){
        $cart = $this->session->get("cart");
        $this->pageData['cart'] = $cart;
        $this->pageData['cart_count'] = count($this->pageData['cart']);
        $this->pageData['total'] = array_sum(array_column($cart,'total'));
        echo view("templateone/header_cart",$this->pageData);
    }

    public function load_cart(){
        $cart = $this->session->get("cart");
        $this->pageData['cart'] = $cart;
        $this->pageData['cart_count'] = count($this->pageData['cart']);
        $this->pageData['total'] = array_sum(array_column($cart,'total'));
        echo view("templateone/ajax_cart",$this->pageData);
    }

    public function get_order_detail_option($order_detail){
 
        foreach($order_detail as $key=> $row_detail){
            if($row_detail['product_option_selection_id'] != null){
                $product_option_selection_ids = explode(",",$row_detail['product_option_selection_id']);
                $option_selection_arr = [];
                foreach ($product_option_selection_ids as $product_option_selection_id){
                    $where = [
                        'product_option_selection_id' => $product_option_selection_id
                    ];
                    $product_option_selection = $this->ProductOptionSelectionModel->getWhere($where);
                    if(!empty($product_option_selection)){

                        array_push($option_selection_arr,$product_option_selection[0]);
                    }
                }
                $order_detail[$key]['order_detail_option'] = $option_selection_arr;
            }
        }
        return $order_detail;
    }

    public function view_order_status($orders_id = "")
    {
        $where = array(
            "orders.orders_id" => $orders_id,
        );
        
        $orders = $this->OrdersModel->getWhere($where);
    
        
        foreach($orders as $key_main=> $row){
            $order_detail = $this->OrderDetailModel->getWhere([
                'orders_id' => $row['orders_id']
            ]);   
            $orders[$key_main]['order_detail'] = $this->get_order_detail_option($order_detail);
 
        }
        // $this->show_404_if_empty($admin);

        $this->pageData["orders_status"] = $this->OrdersStatusModel->getAll();
        
        $this->pageData['shop'] = $this->ShopModel->getWhere(['shop.shop_id' => $orders[0]['shop_id']])[0];
    


        $shop_contact = $this->ShopModel->getWhere([
            'shop_id' => $orders[0]['shop_id']
        ])[0]['contact'];
        

        $order_url = base_url()  . "/main/order_detail/" . $orders_id;
        $message = "MyOrder|我的订单 -> Note " . $order_url;
        $message = rawurlencode($message);
        
        
        $orders[0]['url'] =  "https://api.whatsapp.com/send?phone=" .$shop_contact. "&text=" . $message;
        $this->pageData["orders"] = $orders[0];

        // $this->debug($orders);
        echo view("main/orders_tracking", $this->pageData);

    }
    public function order_detail($orders_id)
    {
        
        $where = array(
            "orders.orders_id" => $orders_id,
        );
        $orders = $this->OrdersModel->getWhere($where);
        // $this->debug($orders);

        foreach($orders as $key_main=> $row){
            $order_detail = $this->OrderDetailModel->getWhere([
                'orders_id' => $row['orders_id']
            ]);   
            $orders[$key_main]['order_detail'] = $this->get_order_detail_option($order_detail);
 
        }

        // $this->debug($orders);
        $this->show_404_if_empty($orders);
        $shop_contact = $this->ShopModel->getWhere([
            'shop_id' => $orders[0]['shop_id']
        ])[0]['contact'];
        
        $shop = $this->ShopModel->getWhere([
            'shop_id' => $orders[0]['shop_id']

        ]);
        $this->pageData["shop"] = $shop[0];

        $order_url = base_url()  . "/main/payment/" . $shop['slug'] .  "/" . $order_code;
        $message = "MyOrder|我的订单 -> Note " . $order_url;
        $message = rawurlencode($message);
        $orders[0]['url'] =  "https://api.whatsapp.com/send?phone=" .$shop_contact. "&text=" . $message;
        // $this->debug($orders);

        $this->pageData["orders"] = $orders[0];

        // $this->debug($product);
        echo view("main/order_detail", $this->pageData);
    }

   
    public function generate_orders_code($orders_id)
    {

        $where = array(
            'orders.orders_id' => $orders_id,
        );
        $orders = $this->OrdersModel->getWhere($where)[0];


        $code = date('i', strtotime($orders['created_at'])) . $orders_id . date('s', strtotime($orders['created_at'])) . $orders['shop_id'];

        $where = array(
            'orders.orders_id' => $orders_id,
        );
        $data = array(
            'order_code' => $code,
        );
        $this->OrdersModel->updateWhere($where, $data);

        return $code;
    }
    public function submit_order($byStripe = false)
    {
        if($_POST){
            $error = false;
            $cart = $this->session->get("cart");
            if (empty($cart)) {
                $error = true;
                $message = "No Items in Cart.";
            }

            if(!$error){

                $customer_data = [
                    'full_name' => $_POST['name'],
                    'contact' => $_POST['contact'],
                    'address' => $_POST['address'],
                    'email' => $_POST['email'],
                    'city' => $_POST['city'],
                    'post_code' => $_POST['post_code'],
                    'shop_id' => $_POST['shop_id'],
                ];
                
                $order_customer_id = $this->OrderCustomerModel->insertNew($customer_data);
    
                $order_data = [
                    'order_customer_id' => $order_customer_id,
                    'orders_status_id' => 1,
                    // 'delivery_method' => $_POST['delivery_option'],
                    // 'payment_method_id' => $_POST['payment_method_id'],
                    // 'is_preorder' => $_POST['is_preorder'],
                    'delivery_fee' => $_POST['delivery_fee'],
                    'grand_total' => $_POST['grand_total'],
                    // 'created_at' => date('d-m-Y H:i:s'),
                    'subtotal' => $_POST['subtotal'],
                    'shop_id' => $_POST['shop_id'],
                ];
                // if($_POST['customer_id'] > 0){
                //     $order_data['customer_id'] = $_POST['customer_id'];
                // }
                if(!empty($_POST['promo_id']) && $_POST['promo_id'] > 0){
                    $order_data['promo_id'] = $_POST['promo_id'];
                }
                $order_id = $this->OrdersModel->insertNew($order_data);
                $code = $this->generate_orders_code($order_id);
                // $this->debug($_POST['product']);
                foreach($cart as $row){
                    $order_detail_data = [
                        'orders_id' => $order_id,
                        'product_id' => $row['product_id'],
                        'product_quantity' => $row['quantity'],
                        'product_name' => $row['product_name'],
                        'product_price' => $row['price'],
                        'product_total_price' => $row['total'],
                    ];
                    $order_detail_id = $this->OrderDetailModel->insertNew($order_detail_data);
                    if($row['product_selection']  != '0' && $row['product_selection'] != ""){
                        foreach($row['product_selection'] as $rowaddon){
                            $order_detail_selection = [
                                'order_detail_id' => $order_detail_id,
                                'product_option_selection_id' => $rowaddon['product_option_selection_id'],
                                'ids' => json_encode($row['product_selection']),
                            ];
                            $oder_detail_selection = $this->OrderDetailOptionModel->insertNew($order_detail_selection);
                        }
                    }
                        
                }
                $url = base_url() . "/main/payment/capital-shop/". $code;
                $where = [
                    'shop_id' => $_POST['shop_id'],
                ];
                $shop = $this->ShopModel->getWhere($where)[0];
                // $shop_name = $this->ShopModel->getWhere($where)[0]['contact'];
                // $shop_token = $this->ShopTokenModel->getWhere($where);
                // foreach($shop_token as $row){
                //     $this->send_notification($row['token'],$shop['shop_name'],$shop['image']);
                // }
                
                if($_POST['email'] != ""){
                    $this->EmailModel->send_email($_POST['email'],$order_id);
                }
                if($shop['email'] != ""){
                    $this->EmailModel->send_email($shop['email'],$order_id);
                }

                $this->session->set("cart", array());

                die(json_encode(
                    array(
                        'status' => true,
                        'url' => $url,
                        'orders_id' => $order_id,
                        )
                )) ;
            }else{
                die(json_encode(
                    array(
                        'status' => false,
                        'message' => $message,
                        )
                )) ;
            }

            

        }
    

    }


   

    public function get_total(){
        $cart = $this->session->get('cart');

        $total = array_sum(array_column($cart,'total'));
        die(json_encode([
            'status' => true,
            'data' => $total
        ]));

    }
    public function clear_cart(){
        $this->session->set("cart", []);
        $this->load_shopping_cart();
    }
    public function add_qty()
    {
        if ($_POST) {


            $input = $this->request->getPost();
            $index = $input['index'];
            $cart = $this->session->get('cart');

            $cart[$index]['quantity'] += 1;
            $cart[$index]['total'] = $cart[$index]['quantity'] * $cart[$index]['price'];
            $this->session->set("cart", $cart);
            $this->load_shopping_cart();
        }
    }

    public function minus_qty()
    {
        if ($_POST) {
            $input = $this->request->getPost();
            $index = $input['index'];
            $cart = $this->session->get('cart');

            if ($cart[$index]['quantity'] == 1) {
                if(isset($_SESSION['product_sku'])){
                    $this->cancelPromo();
                }
                unset($cart[$index]);
            } else {
                $cart[$index]['quantity'] -= 1;
                $cart[$index]['total'] = $cart[$index]['quantity'] * $cart[$index]['price'];

            }
            $this->session->set("cart", $cart);

            $this->load_shopping_cart();

        }
    }

    public function delete_item()
    {
        if ($_POST) {
            $input = $this->request->getPost();
            $index = $input['index'];
            $cart = $this->session->get('cart');
            
            unset($cart[$index]);

            $this->session->set("cart", $cart);

            die(json_encode(array(
                "status" => true,
            )));
        }
    }
    
}
