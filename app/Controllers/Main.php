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
use App\Models\PointModel;

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
use App\Models\GiftModel;
use App\Models\VoucherModel;
use App\Models\CustomerVoucherModel;
use App\Models\CustomerGiftModel;

class Main extends BaseController
{



    public function __construct()
    {
        $this->GiftModel = new GiftModel();
        $this->CustomerVoucherModel = new CustomerVoucherModel();
        $this->VoucherModel = new VoucherModel();
        $this->CustomerGiftModel = new CustomerGiftModel();

        $this->PromoModel = new PromoModel();
        $this->CustomerModel = new CustomerModel();
        $this->PointModel = new PointModel();
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

        if (!empty($this->session->get("customer_data"))) {
            $this->pageData['customer_data'] = $this->session->get("customer_data");
        } else {
            $this->pageData['customer_data'] = array();
        }

        //1 membership
        //2 Gift
        //3 Upsales
        //4 Customer Analysis
        //5 SMS Blast
        //6 Member Referal

    }
    
    public function logout($slug)
    {
        $session = session();

        $session->destroy();

        return redirect()->to( base_url('main/index/' . $slug, "refresh") );
    }
    public function voucher($slug){

        $shop= $this->get_shop($slug);

        $this->load_view('voucher',$slug);

    }
    public function redeem(){
        if($_POST){
            $gift_id = $_POST['gift_id'];
            $where = [
                'gift.gift_id' => $gift_id,

            ];
            $gift = $this->GiftModel->getWhere($where)[0];
            $where = [
                'orders.customer_id' => $this->session->get('customer_id'),
                'orders.grand_total >=' => $gift['order_amount']
            ];
            $orders = $this->OrdersModel->getClosed($where)[0];

            $data = [
                'orders_id' => $orders['orders_id'],
                'customer_id' => $this->session->get('customer_id'),
                'redeem_date' => date('Y-m-d h:i:s'),
                'gift_id' => $gift_id,
            ];
            $gift = $this->CustomerGiftModel->insertNew($data);

            die(json_encode([
                'status' => true,
                'message' => 'Reddeem successful'
            ])) ;           
        }
    }
    public function redeem_voucher(){
        if($_POST){
            $voucher_id = $_POST['voucher_id'];
            $where = [
                'voucher.voucher_id' => $voucher_id,

            ];
            $voucher = $this->VoucherModel->getWhere($where)[0];
            
            $customer_id  =  $this->session->get('customer_id');
            $point_balance = $this->PointModel->get_balance($customer_id);
            if($voucher['redeem_point'] > $point_balance){
                die(json_encode([
                    'status' => false,
                    'title' => 'Redeem failed',
                    'message' => 'Point not enough'
                ])) ; 
            }
            $remarks = 'Deduct ' . $voucher['redeem_point'] . " for voucher " .$voucher['voucher'];
            $this->PointModel->point_out($customer_id,$voucher['redeem_point'],$remarks,$voucher_id);
            $data = [
                'customer_id' => $customer_id,
                'redeem_date' => date('Y-m-d h:i:s'),
                'voucher_id' => $voucher_id,
                'point_used' => $voucher['redeem_point'],
            ];
            $voucher = $this->CustomerVoucherModel->insertNew($data);
            die(json_encode([
                'status' => true,
            
                'title' => 'Redeem successful',
                'message' => 'Reddem successful'
            ])) ;           
        }
    }


    public function load_gift(){
        $slug = $_POST['slug'];
        $shop= $this->get_shop($slug);
        $this->pageData['selected'] = $_POST['selected'];
        if($_POST['selected'] == 1){
            $where = [
                'gift.shop_id' => $shop['shop_id'],
                'DATE(gift.valid_until) <=' => date('Y-m-d'), 

            ];
            $gift = $this->GiftModel->getWhere($where);
            foreach($gift as $key=> $row){
                $where = [
                    'orders.grand_total >=' => $row['order_amount'],
                    'orders.customer_id' => $this->session->get('customer_id'),
                ];
                $orders = $this->OrdersModel->getWhere($where);
          
                if(!empty($orders)){
                    $customer_gift_count = 0;
                    foreach($orders as $row){
    
                        $where = [
                            'customer_gift.orders_id' => $row['orders_id']
                        ];
    
                        $customer_gift_count += count($this->CustomerGiftModel->getWhere($where));
                    }
                    
                    //check how many reddeem already on this custonmer gift id
                }else{
                    $customer_gift_count = 0;
    
                }
                $gift[$key]['count_gift'] =  $customer_gift_count;
                $gift[$key]['count'] = count($orders) - $customer_gift_count;
    
            }

        }else{
            $where = [
                'customer_gift.is_approve' => 1,
                'DATE(gift.valid_until) <=' => date('Y-m-d'), 
                'customer_gift.customer_id' => $this->session->get('customer_id'),
            ];

            $gift = $this->CustomerGiftModel->getWhere($where);
        }
        $this->pageData['gift'] = $gift;


        echo view("templateone/gift_col" ,$this->pageData);
    }

    public function load_voucher(){
        $slug = $_POST['slug'];
        $shop= $this->get_shop($slug);
        $this->pageData['selected'] = $_POST['selected'];


        if($_POST['selected'] == 1){
            $where = [
                'voucher.shop_id' => $shop['shop_id'],
                'DATE(voucher.valid_until) <=' => date('Y-m-d'), 
            ];
            $voucher = $this->VoucherModel->getWhere($where);
        }else{
            $where = [
                'DATE(voucher.valid_until) <=' => date('Y-m-d'), 
                'customer_voucher.customer_id' => $this->session->get('customer_id'),
            ];

            $voucher = $this->CustomerVoucherModel->getWhere($where);
        }
        $this->pageData['voucher'] = $voucher;
        echo view("templateone/voucher_col" ,$this->pageData);
    }
   
    public function gift($slug){
        $shop= $this->get_shop($slug);


        $this->load_view('gift',$slug);


    }
    public function gift_detail($slug,$gift_id){
        $shop= $this->get_shop($slug);

        $where = [
            'gift.gift_id' => $gift_id,
        ];
   

        $gift = $this->GiftModel->getWhere($where)[0];
        $this->pageData['gift'] = $gift;
        $this->load_view('gift_detail',$slug);

    }
    public function voucher_detail($slug,$voucher_id){
        $shop= $this->get_shop($slug);

        $where = [
            'voucher.voucher_id' => $voucher_id,
        ];
   
        $voucher = $this->VoucherModel->getWhere($where)[0];
        $this->pageData['voucher'] = $voucher;
        $this->load_view('voucher_detail',$slug);

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
    public function validate_contact($contact){
        $input['contact'] = $contact;
        $input['contact'] = str_replace(" ","",$input['contact']);

        $input['contact'] = str_replace("-","",$input['contact']);
        $input['contact'] = str_replace("+","",$input['contact']);

        if(!$this->startsWith($input['contact'],"6")){
            $input['contact'] = "6" . $input['contact'];
        }
        return $input['contact'];
    }
    function check_if_referral_code_exist($referal_code){
        $where = [
            'customer.referal_code' => $referal_code
        ];
        $customer = $this->CustomerModel->getWhere($where);
        if(!empty($customer)){
            return true;
        }else{
            return false;
        }

    }
    function get_referal_id($referal_code){
        if($referal_code != ""){

            $where = [
                'customer.referal_code' => $referal_code
            ];
            $customer = $this->CustomerModel->getWhere($where);
            if(!empty($customer)){
                return $customer[0]['customer_id'];
            }else{
                return 0;
            }
        }

    }
    function generate_refferal_code($customer_id){

        $where = [
            'customer.customer_id' => $customer_id

        ];
        $customer = $this->CustomerModel->getWhere($where)[0];
        $customer_name = str_replace(' ','',$customer['username']);
        $customer_code = substr($customer_name,0,4) . date('is');
        if($this->check_if_referral_code_exist($customer_code) == true){
            //if merchant_code existed 
            //regenerate it
            $customer_code = substr($customer_name,0,4) . date('is');
        }
        $this->CustomerModel->updateWhere($where,['referal_code' => $customer_code]);
    }
    public function set_customer_session($customer_id){
        $where = [
            'customer_id' => $customer_id
        ];
        $customer = $this->CustomerModel->getWhere($where);
        $login_data = $customer[0];
        $login_id = $customer[0]["customer_id"];
        $this->session->set("customer_data", $login_data);
        $this->session->set("customer_id", $login_id);
    }
    public function validate_function($function_id){
        if($this->check_exist_function($function_id) == false){
            $this->show_404_if_empty([]);
        }

    }
    public function check_exist_function($function_id){
        if(in_array($function_id,$this->pageData['shop_function'])){ 
            return true;
        }else{
            return false;
        }
    }
	public function signup($slug,$referal_code = "")
    {
        $shop= $this->get_shop($slug);
        if($referal_code != ""){
            if($this->check_referal_code_exist($referal_code) == false){
                $this->show_404_if_empty([]);
            }
        }
        $this->validate_function(1);
        $this->check_exist_function(1);
        $this->pageData['referal_code'] = $referal_code;
		if($_POST){

			$input = $this->request->getPost();
			$customer_data = $this->CustomerModel->getWhere(['customer.shop_id' => $shop['shop_id'] ,'email' => $input["email"]]);
			if (empty($customer_data)) {

				$hash = $this->hash($input['password']);
				
                $input['contact'] = $this->validate_contact($input['contact']);

				$data = [
                    'shop_id' => $shop['shop_id'],
					'email' => $input['email'],
					'contact' => $input['contact'],
					'real_password' => $input['password'],
					'password' => $hash['password'],
					'salt' => $hash['salt'],		
					'role_id' => 3,
					"last_login" => date("Y-m-d H:i:s"),
					'login_method' => 'signup',
				];
                if(!empty($input['referal_code'])){
                    $data['referal_id'] = $this->get_referal_id($input['referal_code']);
                }
                $customer_id = $this->CustomerModel->insertNew($data);
                $data['referal_code'] = $this->generate_refferal_code($customer_id);             

                $this->set_customer_session($customer_id);
                return redirect()->to(base_url('/main/index/' . $shop['slug'], "refresh"));
			}else{
				$this->pageData['error'] = "User Existed";
			}

		}
     
        $this->load_view('signup',$slug);
	}
    public function login($slug)
    {
     
        $shop= $this->get_shop($slug);
        $this->validate_function(1);

		if($_POST){

			$input = $this->request->getPost();
			$customer_data = $this->CustomerModel->login_customer($input['email'],$input['password']);
			if (!empty($customer_data)) {

                $customer_data = $customer_data[0];
                $this->set_customer_session($customer_data['customer_id']);
		
                return redirect()->to(base_url('/main/index/' . $shop['slug'], "refresh"));
			}else{
				$this->pageData['error'] = "Email or password incorrect";

			}

		}
       
        $this->load_view('login',$slug);


	}
    

    public function profile($slug)
    {
          
        $shop= $this->get_shop($slug);
        $this->validate_function(1);

        $this->pageData['point'] = $this->PointModel->get_balance($this->session->get('customer_id'));
		if($_POST){

			$input = $this->request->getPost();
            $where = [
                'customer_id' => $this->session->get('customer_id'),
            ];
            $input['contact'] = $this->validate_contact($input['contact']);
            $data = [
                'email' => $input['email'],
                'address' => $input['address'],
                'name' => $input['name'],
                'city' => $input['city'],
                'post_code' => $input['post_code'],
                'contact' => $input['contact'],
                'role_id' => 3,

                "last_login" => date("Y-m-d H:i:s"),
            ];
            if($input['password'] != ""){
                $hash = $this->hash($input['password']);
                $data['real_password'] = $input['password'];
                $data['password'] = $hash['password'];

                $data['salt'] = $hash['salt'];
            }

            $this->CustomerModel->updateWhere($where,$data);
            $this->set_customer_session($where['customer_id']);                
            return redirect()->to(base_url('/main/profile/' . $shop['slug'], "refresh"));
        

		}
     
        $this->load_view('profile',$slug);

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
            'shop_function.shop_id' => $shop[0]['shop_id']
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


        $this->load_view('failed',$slug);


    }

    public function load_view($view_name,$shop){
        echo view("templateone/header", $this->pageData);
        $this->load_css($this->pageData['shop']);
        echo view("templateone/" . $view_name);
        echo view("templateone/footer");
    }

    
    public function success($slug)
    {
        $this->pageData['shop'] = $this->get_shop($slug);

        $this->load_view('success',$slug);

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
                    'remarks' => 'Downline Task Commission for ' . $grand_parent['name'] . ' with downline ' . $customer['name'] ,
                    'orders_id' => $orders['orders_id'],
                ];

                // $this->WalletModel->wallet_in($user['user_id'], $_POST['amount'], $remark);
                $this->PointModel->point_commision_in($data);

           
                $where = [
                    'customer.customer_id' => $grand_parent['referal_id'],
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
                        'remarks' => 'Downline Task Commission for ' . $grand_grand_parent['name'] . ' with downline ' . $customer['name'] ,
                        'orders_id' => $orders['orders_id'],
                    ];
                    // $this->WalletModel->wallet_in($user['user_id'], $_POST['amount'], $remark);

                    $this->PointModel->point_commision_in($data);

                }
            }
        }
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
        //sort require option and get required stuff
        $this->pageData['required_option_id'] = $required_option;
        $this->pageData['product_option'] = $product_option;
        $this->pageData['product_image'] = $product_image;
        $this->pageData['product'] = $product;

        $this->load_view('product',$shop);


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
    public function check_if_member_new($promo){
        if(!empty($this->session->get('customer_id'))){
            $where = [
                'orders.customer_id' => $this->session->get('customer_id'),
            ];
            $orders = $this->OrdersModel->getWhere($where);
            if(empty($orders)){
                if($promo['is_affliate'] == 1){
                    // for referal person
                    if($this->session->get('customer_data')['referal_id'] > 0){
                        return true;
                    }else{
                        die(json_encode(array(
                            'status' => false,
                            'error' => "Invalid",
                            'message' => 'This promo code is for referal member only',
                        )));
                    }
                }
                return true;
            }else{

                die(json_encode(array(
                    'status' => false,
                    'message' => 'This promo code is for new member only',

                    'error' => "Invalid",
                )));
            }
        }else{
            die(json_encode(array(
                'status' => false,
                'message' => 'This promo code is for login only',

                'error' => "Invalid",
            )));
        }
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
                if($promo['is_newmemberonly'] == 1 || $promo['is_affliate'] == 1){
                    $this->check_if_member_new($promo);
                }
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
                    'message' => 'Error',

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

        $this->load_view('order_history',$shop);

    }

    
    public function point_history($slug){
        $shop = $this->get_shop($slug);

        $where = [
            'point.customer_id' => $this->session->get('customer_id'),
        ];
        $point_history = $this->PointModel->get_transaction_by_customer($where);

        $this->pageData['point_history'] = $point_history;

        $this->load_view('point_history',$shop);

    }
    public function search($slug){
        

        $shop = $this->get_shop($slug);
     
  
        $this->load_view('search',$shop);


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
        $shop_gift = $this->GiftModel->getWhere(array_merge($where,['is_active' => 1]));
        $shop_payment_method = $this->ShopPaymentMethodModel->getWhere($where);
        $this->pageData['shop_payment_method'] = array_column($shop_payment_method,'payment_method_id');
        
        $payment_method = $this->PaymentMethod->getAll();
        $this->pageData['payment_method'] = $payment_method;
        $this->pageData['shop_gift'] = $shop_gift;

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
       
        $this->load_view('payment',$slug);


    }
    
    public function cart($slug)
    {
        $shop = $this->get_shop($slug);
  
        // $shop_operating_hour = $this->ShopOperatingHourModel->getWhere($where);

        // $this->debug($product);
        // $this->debug($product);
        // $this->debug($product);
        
        $this->load_view('cart',$slug);


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

    
        $this->load_view('index',$slug);


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
    
        $this->load_view('shop',$slug);


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
                if($_POST['customer_id'] > 0){
                    $order_data['customer_id'] = $_POST['customer_id'];
                }
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
    public function update_order($orders_id,$payment_method_id){
       
        $where = array(
            "orders.orders_id" => $orders_id,

        );
        $data = array(
            "is_paid" => 1,
            "payment_method_id" => $payment_method_id,
        );
        $orders = $this->OrdersModel->updateWhere($where,$data);
        $shop = $this->get_shop($orders['shop_id']);
        if($this->check_exist_function(1)){
            $this->give_point($orders_id);
        }

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
