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
use App\Models\ShopPaymentMethodModel;
use App\Models\ProductOptionSelectionModel;
use App\Models\ProductOptionModel;
use App\Models\OrderDetailModel;
use App\Models\PaymentMethodModel;
use App\Models\EmailModel;
use App\Models\OrdersStatusModel;
use App\Models\OrderDetailOptionModel;
use App\Models\PromoModel;
use App\Models\CustomerModel;

use App\Models\ContactModel;
use App\Models\OrdersLogModel;
use App\Models\PremierResponseModel;
use App\Models\ShopFunctionModel;

class Main extends BaseController
{



    public function __construct()
    {
        $this->PromoModel = new PromoModel();
        $this->CustomerModel = new CustomerModel();

        $this->ShopModel = new ShopModel();
        $this->OrdersLogModel = new OrdersLogModel();

        $this->PremierResponseModel = new PremierResponseModel();
        $this->ProductOptionModel = new ProductOptionModel();
        $this->OrderCustomerModel = new OrderCustomerModel();
        $this->PaymentMethodModel = new PaymentMethodModel();
        $this->AboutModel = new AboutModel();
        $this->CategoryModel = new CategoryModel();
        $this->OrdersModel = new OrdersModel();
        $this->ContactModel = new ContactModel();
        $this->MerchantModel = new MerchantModel();
        $this->AnnouncementModel = new AnnouncementModel();
        $this->BrandModel = new BrandModel();
        $this->PaymentMethod = new PaymentMethodModel();
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
        $this->ShopFunctionModel = new ShopFunctionModel();

        $this->pageData = array();
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $this->session = session();
        if (!empty($this->session->get("cart"))) {
            $this->pageData['cart'] = $this->session->get("cart");
            $this->pageData['cart_count'] = count($this->pageData['cart']);
        } else {
            $this->pageData['cart'] = array();
            $this->pageData['cart_count'] = 0;
        }

        

    }
    public function voucher($slug){
        $shop= $this->get_shop($slug);

        echo view("templateone/header", $this->pageData);
        $this->load_css($this->pageData['shop']);

        echo view("templateone/voucher");
        echo view("templateone/footer");
    }
   
    public function gift($slug){
        $shop= $this->get_shop($slug);

        echo view("templateone/header", $this->pageData);
        $this->load_css($this->pageData['shop']);

        echo view("templateone/gift");
        echo view("templateone/footer");
    }
    public function gift_detail($slug){
        $shop= $this->get_shop($slug);
        echo view("templateone/header", $this->pageData);
        $this->load_css($this->pageData['shop']);
        echo view("templateone/gift_detail");
        echo view("templateone/footer");
    }
    public function voucher_detail($slug){
        $shop= $this->get_shop($slug);

        echo view("templateone/header", $this->pageData);
        $this->load_css($this->pageData['shop']);

        echo view("templateone/voucher_detail");
        echo view("templateone/footer");
    }
    public function check_referal_code_exist($referal_code){
        $where = [
            'customer.referal_code' => $referal_code,
        ];
        $exist = $this->CustomerModel->getWhere($where);
        if(empty($exist)){
            return false;
        }else{
            return true;
        }
    }
	public function signup($slug,$referal_code = "")
    {
     
        if($referal_code != ""){
            if($this->check_referal_code_exist($referal_code) == false){
                $this->show_404_if_empty([]);
            }
        }
        $shop= $this->get_shop($slug);
        $this->pageData['referal_code'] = $referal_code;
		if($_POST){

			$input = $this->request->getPost();
			$customer_data = $this->CustomerModel->getWhere(['email' => $input["email"]]);
			if (empty($customer_data)) {

				$hash = $this->hash($input['password']);
				$input['contact'] = str_replace("-","",$input['contact']);
				$input['contact'] = str_replace("+","",$input['contact']);

				if(!$this->startsWith($input['contact'],"6")){
					$input['contact'] = "6" . $input['contact'];
				}

				$data = [
					'email' => $input['email'],
					'contact' => $input['contact'],
					'real_password' => $input['password'],
					'password' => $hash['password'],
					'salt' => $hash['salt'],		
					'role_id' => 3,
					"last_login" => date("Y-m-d H:i:s"),
					'login_method' => 'signup',
				];
				$customer_id = $this->CustomerModel->insertNew($data);
				$where = [
					'customer_id' => $customer_id
				];
				$customer = $this->CustomerModel->getWhere($where);
				$login_data = $customer[0];
				$login_id = $customer[0]["customer_id"];
				$this->session->set("login_data", $login_data);
				$this->session->set("login_id", $login_id);
		
                return redirect()->to(base_url('/home/index', "refresh"));
			}else{
				$this->pageData['error'] = "User Existed";
			}

		}
        
        echo view("templateone/header", $this->pageData);
        $this->load_css($this->pageData['shop']);

        echo view("templateone/signup");
        echo view("templateone/footer");

	}
    public function profile($slug)
    {
     
        $shop= $this->get_shop($slug);
  
		if($_POST){

			$input = $this->request->getPost();
			$customer_data = $this->CustomerModel->getWhere(['email' => $input["email"]]);
			if (empty($customer_data)) {

				$hash = $this->hash($input['password']);
				$input['contact'] = str_replace("-","",$input['contact']);
				$input['contact'] = str_replace("+","",$input['contact']);

				if(!$this->startsWith($input['contact'],"6")){
					$input['contact'] = "6" . $input['contact'];
				}

				$data = [
					'email' => $input['email'],
					'contact' => $input['contact'],
					'real_password' => $input['password'],
					'password' => $hash['password'],
					'salt' => $hash['salt'],		
					'role_id' => 3,
					"last_login" => date("Y-m-d H:i:s"),
					'login_method' => 'signup',
				];
				$customer_id = $this->CustomerModel->insertNew($data);
				$where = [
					'customer_id' => $customer_id
				];
				$customer = $this->CustomerModel->getWhere($where);
				$login_data = $customer[0];
				$login_id = $customer[0]["customer_id"];
				$this->session->set("login_data", $login_data);
				$this->session->set("login_id", $login_id);
		
                return redirect()->to(base_url('/home/index', "refresh"));
			}else{
				$this->pageData['error'] = "User Existed";
			}

		}
        
        echo view("templateone/header", $this->pageData);
        $this->load_css($this->pageData['shop']);

        echo view("templateone/profile");
        echo view("templateone/footer");

	}
    

    public function login($slug)
    {
          
  
        $shop= $this->get_shop($slug);
    
		if($_POST){

			$input = $this->request->getPost();
			$customer_data = $this->CustomerModel->getWhere(['email' => $input["email"]]);
			if (!empty($customer_data)) {
				$where = [
					'customer_id' => $customer_data[0]['customer_id']
				];
				$customer = $this->CustomerModel->getWhere($where);
				$login_data = $customer[0];
				$login_id = $customer[0]["customer_id"];
				$this->session->set("login_data", $login_data);
				$this->session->set("login_id", $login_id);

				return redirect()->to(base_url('/home/index', "refresh"));
			}else{
				$this->pageData['error'] = "User Not Found";
			}

		}
        echo view("templateone/header", $this->pageData);
        $this->load_css($this->pageData['shop']);

        echo view("templateone/login");
        echo view("templateone/footer");
	}

    public function get_shop($slug,$is_id = false){
        if(!$is_id){
            
            $where =[
                'slug' => $slug
            ];
        }else{
            $where =[
                'shop.shop_id' => $slug
            ];
        }
        $shop = $this->ShopModel->getWhere($where);
        $this->show_404_if_empty($shop);
        $where_shop = [
            'shop_id' => $shop[0]['shop_id']
        ];
        $shop['shop_function'] = array_column($this->ShopFunctionModel->getWhere($where_shop),'function_id');
        $this->pageData['trending_product'] = $this->get_trending_product($shop[0]['shop_id']);
        
        $this->pageData['shop_function'] = array_column($this->ShopFunctionModel->getWhere($where_shop),'function_id');
        $where = [
            'shop_id' => $shop[0]['shop_id'],
        ];

        $this->pageData['announcement'] = $this->get_annoucement($where);

        $this->session->set("shop", $shop);
        $this->pageData['shop'] = $shop[0];
        return $shop[0];
    }
    
    public function failed($slug)
    {
        $this->pageData['shop'] = $this->get_shop($slug);

        echo view("templateone/header", $this->pageData);
        $this->load_css($this->pageData['shop']);

        echo view("templateone/failed");
        echo view("templateone/footer");

    }

    
    public function success($slug)
    {
        $this->pageData['shop'] = $this->get_shop($slug);

        echo view("templateone/header", $this->pageData);
        $this->load_css($this->pageData['shop']);

        echo view("templateone/success");
        echo view("templateone/footer");

    }


    function get_trending_product($shop_id){
        $product = $this->ProductModel->getWhere([
            'shop_id' => $shop_id,
            'is_home' => 1,
        ]);
        return $product;
    }

    function get_annoucement($where){
        $announcement = $this->AnnouncementModel->getWhere($where);
        if(!empty($announcement)){
            $announcement = $announcement[0];
            return $announcement;
        }else{
            return [];
        }
    }
    public function product_detail($slug,$product_id)
    {
        $shop = $this->get_shop($slug);
 
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
        $product_option_required = $this->ProductOptionModel->getWhere([
            'product_id' => $product['product_id'],
            'minimum_required >' => 0 
        ]);
        $required_option = array_column($product_option_required,'product_option_id');
        sort($required_option);
        $required_option = join("_",$required_option);
        $this->pageData['required_option_id'] = $required_option;
        $this->pageData['product_option'] = $product_option;
        $this->pageData['product_image'] = $product_image;
        $this->pageData['product'] = $product;

        echo view("templateone/header", $this->pageData);
        $this->load_css($shop);
        echo view("templateone/product");
        echo view("templateone/footer");

    }

    public function load_css($shop){
        $this->pageData['color'] = $shop['colour'];
        echo view("templateone/ecomcss",$this->pageData);
        echo view("templateone/lockcss",$this->pageData);
    }
    
    public function update_orders_status($orders_id,$payment_method_id){
        $data = [
            'payment_method_id' => $payment_method_id
        ];
        $where = [
            'orders.orders_id' => $_POST['orders_id'],
        ];
        $this->OrdersModel->updateWhere($where,$data);
        
    }

    function get_page_number($product){
        $max_per_page = 6; //Max results per page
        $total_product = count($product);  //Total number of posts returned
        $pages = ceil($total_product / $max_per_page);
        return $pages;
    }
    
    public function apply_promo(){
        if(isset($_POST)){
            $where = [
                'code' => $_POST['promocode'],
                'promo.shop_id' => $_POST['shop_id'],

                'promo.is_active' => 1,
            ];
            $promo = $this->PromoModel->getWhere($where);
            $whereshop = [
                'shop.shop_id' => $_POST['shop_id']
            ];
            $shop = $this->ShopModel->getWhere($whereshop)[0];
            if(!empty($promo)){
                $promo = $promo[0];
                $grand_total = str_replace("RM","",$_POST['grand_total']);
                if($promo['promo_type_id'] != 1){

                    if($promo['discount_type_id'] == 1){
                        $discount_amount = str_replace("RM","",$promo['offer_amount']);
                        $newTotal = str_replace("RM","",$_POST['grand_total']) - str_replace("RM","",$promo['offer_amount']);
                    }else{
                        $discount_amount  = str_replace("RM","",$_POST['grand_total']) * ($promo['offer_percent'] / 100);
                        $newTotal = str_replace("RM","",$_POST['grand_total']) - $discount_amount;
                    }
                }else{
                    $discount_amount  = $shop['delivery_fee'];
                    $newTotal =  str_replace("RM","",$_POST['grand_total']) - $shop['delivery_fee'];
                }

                $min = str_replace("RM","",$promo['minimum']);
                if($grand_total < $min){

                    die(json_encode(array(
                        'status' => false,
                        'error' => "Min",
                        'min' => $min,
                    )));
                }else{
                    $initial_used = $promo['used'];
                    $this->PromoModel->updateWhere($where,['used' => ($initial_used + 1)]);
                    die(json_encode(array(
                        'status' => true,
                        'promo_type_id' => $promo['promo_type_id'],
                        'promo_id' => $promo['promo_id'],
                        'discount' => round($discount_amount,2),
                        'amount' => $newTotal
                    )));
                }

            }else{
                die(json_encode(array(
                    'status' => false,
                    'error' => "Invalid",
                )));

            }
        }
    }
    function startsWith ($string, $startString) 
    { 
        $len = strlen($startString); 
        return (substr($string, 0, $len) === $startString); 
    } 

    public function order_history($slug){
        $shop = $this->get_shop($slug);
     
        if($this->startsWith($_GET['keyword'],"0")){
            $_GET['keyword'] = "+6" . $_GET['keyword'];
        }

        $order_history = $this->OrdersModel->getHistory($_GET['keyword'],$shop['shop_id']);

        $this->pageData['order_history'] = $order_history;
        echo view("templateone/header", $this->pageData);
        $this->load_css($shop);
        echo view("templateone/order_history");
        echo view("templateone/footer");
    }
    public function search($slug){
        

        $shop = $this->get_shop($slug);
     
        echo view("templateone/header", $this->pageData);
        $this->load_css($shop);
        echo view("templateone/search");
        echo view("templateone/footer");
    }

    

    public function make_payment(){
        $where = [
            'orders.orders_id' => $_POST['orders_id'],
        ];
        $orders = $this->OrdersModel->getWhere($where);


        $shop = $this->ShopModel->getWhere(['shop.shop_id' => $orders[0]['shop_id']])[0];
        $order_url = base_url() . "/main/payment/" . $shop['slug'] . '/' . $orders[0]['order_code'];

        $message = "MyOrder|我的订单 -> Note " . $order_url;
        $message = rawurlencode($message);
        $url =  "https://api.whatsapp.com/send?phone=" .$shop['contact']. "&text=" . $message;


        if($_POST['payment_method_id'] != 3){
            $this->update_orders_status($_POST['orders_id'],$_POST['payment_method_id']);
            die(json_encode([
                'status' => true,
                'url' => $url,
            ]));
        }else{
            $this->premier_pay($_POST['orders_id']);
            //payment method link
            die(json_encode([
                'status' => true,
                'url' => $url,
            ]));
        }
    }

    public function payment($slug,$order_code)
    {

        $shop = $this->get_shop($slug);
        $where = [
            'shop_id' => $shop['shop_id']
        ];
        $shop_payment_method = $this->ShopPaymentMethodModel->getWhere($where);
        $this->pageData['shop_payment_method'] = array_column($shop_payment_method,'payment_method_id');
        
        $payment_method = $this->PaymentMethod->getAll();
        $this->pageData['payment_method'] = $payment_method;

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
        $this->load_css($this->pageData['shop']);

        echo view("templateone/payment");
        echo view("templateone/footer");

    }
    
    public function cart($slug)
    {
        $shop = $this->get_shop($slug);
  
        // $shop_operating_hour = $this->ShopOperatingHourModel->getWhere($where);

        // $this->debug($product);
        // $this->debug($product);
        // $this->debug($product);
        echo view("templateone/header", $this->pageData);
        $this->load_css($this->pageData['shop']);

        echo view("templateone/cart");
        echo view("templateone/footer");

    }
    


    public function index($slug)
    {
        $shop = $this->get_shop($slug);
        $where = [
            'shop_id' => $shop['shop_id']
        ];
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

        // $this->pageData['shop_operating_hour'] = $shop_operating_hour;

        $this->pageData['category'] = $category;
        $this->pageData['banner'] = $banner;
        if(!empty($about)){
            $about = $about[0];
            $this->pageData['about'] = $about;
        }
        
        $this->pageData['product'] = $product;

        echo view("templateone/header", $this->pageData);
        $this->load_css($shop);

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
        
        $product = $this->ProductModel->getWhereIn($where,$_POST['page']);
        $product_total = $this->ProductModel->getWhereInTotal($where);
        $product_max_price =  $this->ProductModel->getMaxPrice();
        $this->pageData['product'] = $product;
        $this->pageData['product_total'] = count($product_total);
        $this->pageData['active_page'] = $_POST['page'];

        $this->pageData['pages'] = $this->get_page_number($product_total);
        $this->pageData['product_max_price'] = $product_max_price[0]['max(product_price)'];
        echo view("templateone/product_list",$this->pageData);
    }
      
    public function product($slug)
    {
        $shop = $this->get_shop($slug);

        $where = [

            'shop_id' => $shop['shop_id']
        ];

        // $shop_operating_hour = $this->ShopOperatingHourModel->getWhere($where);
        $product = $this->ProductModel->getWhere($where);
        $category = $this->CategoryModel->getWhere($where);
        $this->pageData['category'] = $category;
        $this->pageData['product'] = $product;
        $this->pageData['pages'] = $this->get_page_number($product);

        // $this->debug($product);
        // $this->debug($product);
        // $this->debug($product);
        echo view("templateone/header", $this->pageData);
        $this->load_css($this->pageData['shop']);

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
        // $shop = $this->get_shop($_POST['slug']);
        $this->pageData['shop'] = $this->session->get("shop")[0];
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

    public function submit_contact(){
        if($_POST){
            $data = $_POST;
            $this->ContactModel->insertNew($data);
            die(json_encode([
                'status' => true,
                'data' => $data,
            ]));
        }
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
        

        // $order_url = base_url()  . "/main/order_detail/" . $orders_id;
        $order_url = base_url() . "/main/payment/" .  $this->pageData['shop']['slug'] . '/' . $orders[0]['order_code'];

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
                    'created_at' => date('Y-m-d H:i:s'),
                    'delivery_fee' => $_POST['delivery_fee'],
                    'grand_total' => $_POST['grand_total'],
                    'promo_id' => $_POST['promo_id'],

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
                $where = [
                    'shop_id' => $_POST['shop_id'],
                ];
                $shop = $this->ShopModel->getWhere($where)[0];
                $url = base_url() . "/main/payment/" . $shop['slug'] . '/' . $code;
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
        $total = 0;
        $cart_count = 0;
        if(!empty($cart)){
            $cart_count = count($cart);
            $total = array_sum(array_column($cart,'total'));
        }
        die(json_encode([
            'count' => $cart_count,
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

    function generateId() {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $year    = date('Y');
        $month   = date('m');
        $day     = date('d');
        $hour    = date('H');
        $min     = date('i');
        $sec     = date('s');
        $mil     = date('u');

        $transId = $year.$month.$day.$hour.$min.$sec.$mil;
        return $transId;
    }
    function update_order_payment_id($orders_id,$order_payment_id){
        $where = [
            'orders.orders_id' => $orders_id
        ];
        $data = [
            'order_payment_id' => $order_payment_id,
        ];

        $this->OrdersModel->updateWhere($where,$data); 
        $data['orders_id'] = $orders_id;    
        $data['is_order'] = 1;    

        $this->OrdersLogModel->insertNew($data);    

    }
    
    function premier_pay($orders_id){
    
        $timestamp = round(microtime(true) * 1000);
        //$nonce_string = md5(rand(1,99999999));
        $strsTime = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $nonce_string = substr(str_shuffle($strsTime), mt_rand(0, strlen($strsTime) - 11), 40);
        $orderId = $this->generateId();

        $where = [
            'orders.orders_id' => $orders_id
        ];
        $orders = $this->OrdersModel->getWhere($where)[0];    
        $this->update_order_payment_id($orders_id,$orderId);
        $amount = str_replace('.','',$orders['grand_total']);
        $amount = floatval($amount);
        $shop = $this->get_shop($orders['shop_id'],true);
        $redirect_url = base_url() . "/main/payment/" . $shop['slug']  . "/" . $orders['order_code'] ;
        
        //staging key
        $client_id = '16225290295158143777';
        $client_secret = 'a29bc326-f8c5-5a83-91b5-b39345add487';
        // //live key
        // $client_id = '16225262392817499070';
        // $client_secret = '1e153144-c9da-59e7-909f-bcae8677025d';

        //their key
        // $client_id = '1580791973248000000';
        // $client_secret = 'a1b6d087-f977-5c5c-a8d1-793a3e6784b2';

        // $amount = 0011;

        $payload = [
            "title" => "Ecommerce purchase",
            "description" => "You are making a purchase for " . $shop['shop_name'],
            "currency" => "MYR",

            "amount" => $amount,//0010, //$orders_amount,
            "redirectUrl" => $redirect_url,//url('/'),
            "callbackUrl" => base_url() . '/ajax/premier_callback' ,
            "orderReferenceNo" => $orderId,
        ];
        ksort($payload);
        $json_encoded_payload = json_encode($payload, JSON_UNESCAPED_SLASHES);
        
        // print(">>> Request - <br>".print_r($json_encoded_payload,true)."<br><br>");
        
        $base64_json_encoded_payload = base64_encode($json_encoded_payload);
        
        $final_array = [
            'data='.$base64_json_encoded_payload,
            'timestamp='.$timestamp,
            'nonce='.$nonce_string
        ];
        //$final_string = implode('&amp;', $final_array);
        $final_string = implode("&", $final_array);
        $hash_data = hash_hmac('sha512', $final_string, $client_secret, true);
        $base64 = base64_encode($hash_data);
        
        $url = 'https://sb-api.glypay.com/glypay/api/merchant/order/store/'.$client_id.'/online';
        // $url = 'https://api.premierpay.com.my/premierpay/api/merchant/order/store/'.$client_id.'/online';

        // echo "<<< Response<br>";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_encoded_payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'x-signature: '.$base64,
            'x-timestamp: '.$timestamp,
            'x-nonce: '.$nonce_string
        )); 
        // curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        
        $result = curl_exec($ch);
        die();
        // $this->debug($result);
    }
    function premier_callback(){
        
        
        try {

            if($_REQUEST){

                $response = json_encode($_REQUEST, true);

                $where = [
                    'response' => $response,
                    'type' => 'callback',
                ];
                
                $senang = $this->PremierResponseModel->getWhere($where);
                if(empty($senang)){

                    $data = array(
                        'response' => $response,
                        'type' => 'callback',
                    );
                    $this->PremierResponseModel->insertNew($data);
    
                    // return redirect()->to(url('success'));
    
                    $this->call_back_to_order($_REQUEST['transId']);
                }
                // $this->debug($_REQUEST);
                
            }
        } catch(Error $e){

            $data = array(
                'response' => $e->getMessage(),
                'type' => basename($_SERVER['REQUEST_URI']),
            );
            $this->PremierResponseModel->insertNew($data);

        }
            // if ($_REQUEST['status_id'] == 1){
            
    }
    public function update_order($orders_id,$payment_method_id){
       
        $where = array(
            "orders.orders_id" => $orders_id,
        );
        $data = array(
            "is_paid" => 1,
            "payment_method_id" => $payment_method_id,
        );
        $orders = $this->OrdersModel->updateWhere($where,$data);

    }
    function call_back_to_order($order_id){

        $where = [
            'orders_log.order_payment_id' => $order_id
        ];

        $orderlog = $this->OrdersLogModel->getWhere($where)[0];

        $where = [
            'orders.orders_id' =>  $orderlog['orders_id']
        ];
        $orders = $this->OrdersModel->getWhere($where);
        $this->update_order($orderlog['orders_id'],3);
        
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
