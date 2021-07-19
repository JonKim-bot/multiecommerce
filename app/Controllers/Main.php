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
use App\Models\SenangResponseModel;
use App\Models\ShopTokenModel;

use App\Models\ShopPaymentMethodModel;
use App\Models\ProductOptionSelectionModel;
use App\Models\ProductOptionModel;
use App\Models\OrderDetailModel;
use App\Models\NotificationResponseModel;

use App\Models\PaymentMethodModel;
use App\Models\EmailModel;
use App\Models\OrdersStatusModel;
use App\Models\OrderDetailOptionModel;
use App\Models\PromoModel;
use App\Models\CustomerModel;
use App\Models\ProductUpsalesModel;

 
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



 // product filter select

// home page change
 
// product detail change

// home page contact horizontal

    public function __construct()
    {
        $this->NotificationResponseModel = new NotificationResponseModel();
        $this->ShopTokenModel = new ShopTokenModel();

        $this->GiftModel = new GiftModel();
        $this->CustomerVoucherModel = new CustomerVoucherModel();
        $this->VoucherModel = new VoucherModel();
        $this->CustomerGiftModel = new CustomerGiftModel();
        $this->ProductUpsalesModel = new ProductUpsalesModel();

        $this->SenangResponseModel = new SenangResponseModel();

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
        $subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2);
        $slug = $subdomain_arr[0];


        $slug = 'capital-shop';


        $this->shop= $this->get_shop($slug);
        $this->load_lang();
        //1 membership
        //2 Gift
        //3 Upsales
        //4 Customer Analysis

        //5 SMS Blast
        //6 Member Referal

    }
    
    public function load_lang()
    {

        $shop = $this->shop;

        $this->session = session();
        // set system language EN for default
        $this->session->set("language_id", $shop['language_id']);

        if ($this->session->get('language_id') == null) {
            $language_id = $shop['language_id'];
            $this->session->set("language_id", $shop['language_id']);
        } else {
            $language_id = $this->session->get('language_id');
        }

        // Get Language data based on language ID
        if ($language_id == 1) {
            require_once APPPATH . "/Language/en_lang.php";
        } else {
            require_once APPPATH . "/Language/cn_lang.php";
        }

        $this->pageData['lang'] = $lang;
    }

    public function set_lang()
    {

        if ($_POST) {

            session()->set("language_id", $_POST['language_id']);

            die(json_encode(array(
                "status" => true,
            )));
        }
    }
    public function logout()
    {
        $session = session();

        $session->destroy();

        return redirect()->to( base_url('main/index/', "refresh") );
    }
    public function voucher(){

        $this->check_exist_function(1,$this->pageData['shop_function']);

        $this->load_view('voucher');

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
                'orders.grand_total >=' => $gift['order_amount'],
                'orders.is_paid' => 1,
            ];
            $orders = $this->OrdersModel->getClosed($where);
            if(!empty($orders)){
                    $orders = $orders[0];
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
            }else{
                    die(json_encode([
                        'status' => false,
                        'message' => 'Reddeem failed'
                    ])) ;           

            }

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

    public function get_gift(){
        $slug = $_POST['slug'];
        $shop = $this->shop;
        $where = [
            'gift.shop_id' => $shop['shop_id'],
            'DATE(gift.valid_until) >=' => date('Y-m-d'), 

        ];
        $gift_shop = $this->GiftModel->getWhere($where);
        foreach($gift_shop as $key=> $row){
            $where = [
                'orders.grand_total >=' => $row['order_amount'],
                'orders.is_paid' => 1,
                'orders.customer_id' => $this->session->get('customer_id'),
            ];
            $orders = $this->OrdersModel->getWhere($where);
        
            if(!empty($orders)){
                $customer_gift_count = 0;
                foreach($orders as $row){


                    $where = [
                        'customer_gift.orders_id' => $row['orders_id'],
                    ];

                    $customer_gift_count += count($this->CustomerGiftModel->getWhere($where));
                }
                
                //check how many reddeem already on this custonmer gift id
            }else{
                $customer_gift_count = 0;

            }

            $gift_shop[$key]['count_gift'] =  $customer_gift_count;
            
            $gift_shop[$key]['count'] = count($orders) - $customer_gift_count;

        }

        $where = [
            'customer_gift.is_approve' => 1,
            'DATE(gift.valid_until) >=' => date('Y-m-d'), 
            'customer_gift.customer_id' => $this->session->get('customer_id'),
        ];

        $gift_self = $this->CustomerGiftModel->getWhere($where);
        $this->pageData['gift_self'] = $gift_self;
        $this->pageData['gift_shop'] = $gift_shop;


        echo view("templateone/gift_loop" ,$this->pageData);
    }

    public function load_gift(){
        $slug = $_POST['slug'];
        $shop = $this->shop;
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
                    'orders.is_paid' => 1,
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
    public function get_about($type_id){
        $shop = $this->shop;

        $where = [
            'about.type_id' => $type_id,
            'about.shop_id' => $shop['shop_id'],
        ];
        $about = $this->AboutModel->getWhere($where);
        if(!empty($about)){
            if($type_id != 1){

                return $about[0];
            }else{
                return $about;

            }
        }else{
            return [];
        }
    }

    public function get_voucher(){
        $shop = $this->shop;

        $where = [
            'voucher.shop_id' => $shop['shop_id'],
            'DATE(voucher.valid_until) >=' => date('Y-m-d'), 
        ];
        $voucher_shop = $this->VoucherModel->getWhere($where);

        $where = [
            'DATE(voucher.valid_until) >=' => date('Y-m-d'), 
            'customer_voucher.is_used' => 0,
            'customer_voucher.customer_id' => $this->session->get('customer_id'),
        ];

        $voucher_self = $this->CustomerVoucherModel->getWhere($where);
        $this->pageData['voucher_self'] = $voucher_self;

        $this->pageData['voucher_shop'] = $voucher_shop;
        echo view("templateone/voucher_loop" ,$this->pageData);

    }

    public function load_voucher(){
        $slug = $_POST['slug'];
        $shop = $this->shop;
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
                // 'customer_voucher.is_used' => 0,
                'customer_voucher.customer_id' => $this->session->get('customer_id'),
            ];

            $voucher = $this->CustomerVoucherModel->getWhere($where);
        }
        $this->pageData['voucher'] = $voucher;
        echo view("templateone/voucher_col" ,$this->pageData);
    }
   
    public function gift(){
        $this->check_exist_function(2,$this->pageData['shop_function']);

        $shop = $this->shop;

        $this->load_view('gift');

    }

    public function gift_detail($gift_id){
        $shop = $this->shop;


        $where = [
            'gift.gift_id' => $gift_id,
        ];
   

        $gift = $this->GiftModel->getWhere($where)[0];
        $where = [
            'orders.grand_total >=' => $gift['order_amount'],
            'orders.customer_id' => $this->session->get('customer_id'),
            'orders.is_paid' => 1,
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
        $gift['count_gift'] =  $customer_gift_count;
        $gift['count'] = count($orders) - $customer_gift_count;

        $this->pageData['gift'] = $gift;
        $this->load_view('gift_detail');

    }
    public function voucher_detail($voucher_id){
        $shop = $this->shop;



        $where = [
            'voucher.voucher_id' => $voucher_id,
        ];
   
        $voucher = $this->VoucherModel->getWhere($where)[0];
        

        $this->pageData['voucher'] = $voucher;
        $this->load_view('voucher_detail');

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
        $customer_name = str_replace(' ','',$customer['email']);
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
	public function signup($referal_code = "")

    {
        $shop = $this->shop;
        if($referal_code != ""){
            if($this->check_referal_code_exist($referal_code) == false){
                $this->show_404_if_empty([]);
            }

        }
        $this->validate_function(1,$this->pageData['shop_function']);
        $this->check_exist_function(1,$this->pageData['shop_function']);
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
                return redirect()->to(base_url('/main/index/' , "refresh"));
			}else{
				$this->pageData['error'] = "User Existed";
			}

		}
     
        $this->pageData['about'] = $this->get_about(3);
        $this->load_view('signup');
	}
    public function edit_profile_image(){
        if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
            $file = $this->request->getFile('banner');
            $new_name = $file->getRandomName();
            $banner = $file->move(
                './public/images/product/',
                $new_name
            );
            if ($banner) {
                $banner = '/public/images/product/' . $new_name;
                $data['banner'] = $banner;
            } else {
                $error = true;
                $error_message = 'Upload failed.';
            }
        }
        $where = [
            'customer_id' => $this->pageData['customer_data']['customer_id']
        ];

        $this->CustomerModel->updateWhere($where, $data);
        return redirect()->to(base_url('/main/profile' , "refresh"));

    }
    public function login()
    {
     
        $shop = $this->shop;
        $this->validate_function(1,$this->pageData['shop_function']);

		if($_POST){

			$input = $this->request->getPost();
			$customer_data = $this->CustomerModel->login_customer($input['email'],$input['password']);
			if (!empty($customer_data)) {

                $customer_data = $customer_data[0];
                $this->set_customer_session($customer_data['customer_id']);
		
                return redirect()->to(base_url('/main/index/' , "refresh"));
			}else{
				$this->pageData['error'] = "Email or password incorrect";

			}

		}
       
        $this->load_view('login');


	}
    

    public function profile()
    {
          
        $shop = $this->shop;
        $this->validate_function(1,$this->pageData['shop_function']);

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
            return redirect()->to(base_url('/main/profile/' , "refresh"));

		}
        $where = [
            'customer_id' => $this->session->get('customer_id'),
        ];
        $customer = $this->CustomerModel->getWhere($where);
        $downline = $this->get_recursive_downline($customer);
        
        $this->pageData['customer'] = $customer[0];
        $this->pageData['downline'] = $downline;
        // $this->debug($downline);

        $this->load_view('profile');

	}

    function get_recursive_downline($downline, $child = [])
    {
        // $this->debug($downline);
        $got_child = false;

        $parent = $child;

        if (empty($parent)) {
            $parent = $downline;
        }

        $child = [];

        foreach ($parent as $row) {
            $where = [
                'customer.referal_id' => $row['customer_id'],
            ];
            $customers = $this->CustomerModel->getWhere($where);
            if (!empty($customers)) {
                $got_child = true;

                foreach ($customers as $customer) {
                    array_push($downline, $customer);
                    array_push($child, $customer);
                }
            }
        }
        // $this->debug($downline);
        if ($got_child) {

            return $this->get_recursive_downline($downline, $child);
        } else {
            return $downline;
        }
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
    
    public function failed()
    {
        $this->pageData['shop'] = $this->shop;
        $this->load_view('failed');


    }

    public function load_view($view_name){
        echo view("templateone/header", $this->pageData);
        $this->load_css($this->pageData['shop']);
        echo view("templateone/" . $view_name);
        echo view("templateone/footer");
    }

    
    public function success()
    {
        $this->pageData['shop'] = $this->shop;

        $this->load_view('success');

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
                'remarks' => 'Downline Task Point for ' . $parent['name'] . ' with downline ' . $customer['name'] ,
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
                    'remarks' => 'Downline Task Point for ' . $grand_parent['name'] . ' with downline ' . $customer['name'] ,
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
                        'remarks' => 'Downline Task Point for ' . $grand_grand_parent['name'] . ' with downline ' . $customer['name'] ,
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
    public function product_detail($product_id)
    {
        $shop = $this->shop;
 
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
        $where = [

            'product_upsales.product_id' => $product['product_id'],
        ];
        $this->pageData['upsales_product'] = $this->ProductUpsalesModel->getWhere($where);

        //sort require option and get required stuff
        $this->pageData['required_option_id'] = $required_option;
        $this->pageData['product_option'] = $product_option;
        $this->pageData['product_image'] = $product_image;
        $this->pageData['product'] = $product;

        $this->load_view('product',$shop);


    }

    public function load_css($shop){
        $this->pageData['color'] = $shop['colour'];
        $this->pageData['color_2'] = $shop['color_2'];
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
            $_POST['promocode'] = trim($_POST['promocode']);
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

    public function order_history(){
        $shop = $this->shop;
     
        if($this->startsWith($_GET['keyword'],"0")){
            $_GET['keyword'] = "+6" . $_GET['keyword'];
        }

        if (!empty($this->session->get("customer_data"))) {
            $where = [
                'orders.customer_id' => $this->session->get("customer_id"),

            ];
            $order_history = $this->OrdersModel->getWhere($where);

        }else{

            $order_history = $this->OrdersModel->getHistory($_GET['keyword'],$shop['shop_id']);
        }

        $this->pageData['order_history'] = $order_history;

        $this->load_view('order_history',$shop);


    }


    
    public function point_history(){
        $shop = $this->shop;
        $this->check_exist_function(6,$this->pageData['shop_function']);

        $where = [
            'point.customer_id' => $this->session->get('customer_id'),
        ];
        $point_history = $this->PointModel->get_transaction_by_customer($where);
        $total_point = $this->PointModel->get_balance($this->session->get('customer_id'));
        $this->pageData['total_point'] = $total_point;

        $this->pageData['point_history'] = $point_history;

        $this->load_view('point_history',$shop);

    }
    public function search(){
        

        $shop = $this->shop;
     
  
        $this->load_view('search');


    }

    public function send_notification($registration_ids,$shop,$orders_id){
        
        $url ="https://fcm.googleapis.com/fcm/send";
        $where = [
            'orders.orders_id' => $orders_id,
        ];
        $orders = $this->OrdersModel->getWhere($where)[0];
        $order_url = base_url() . "/main/payment/" .  $orders['order_code'];

        $fields=array(
            // "to"=> $token,
            'registration_ids' => ($registration_ids),

            "notification"=>array(
                "body"=>"Your have a new order",
                "title"=> $shop['shop_name'] . " orders",
                "icon"=> base_url() . $shop['header_icon'],
                "click_action"=> $order_url,
            )
        );

        $headers=array(
            'Authorization: key=AAAAlnuq00s:APA91bE39qpxD2UojvFVjS2DTU0rvTO72y8D1LniB8IwYSnPtSR9lPd0f2yXV9EjO3K43oyyQb2jPQrTEwQem_x-NjGEX6yfAHVbXHoFfL2mMO37KpArnV8cD0vizICkH4FaC2QljSyb',
            'Content-Type:application/json'
        );

        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
        $result=curl_exec($ch);
        // print_r($result);
        $data = [
            'result' => json_encode($result),
            'orders_id' => $orders_id,
        ];
        $this->NotificationResponseModel->insertNew($data);

        curl_close($ch);
    }



    public function make_payment(){
        $where = [
            'orders.orders_id' => $_POST['orders_id'],
        ];
        $orders = $this->OrdersModel->getWhere($where)[0];
        $where = [
            'order_customer.order_customer_id' => $orders['order_customer_id']
        ];
        $order_customer = $this->OrderCustomerModel->getWhere($where)[0];
        $shop = $this->ShopModel->getWhereNormal(['shop.shop_id' => $orders['shop_id']])[0];
        $order_url = base_url() . "/main/payment/" .  $orders['order_code'];

        $message = "Order No : ".$orders['order_code']." \nTotal Amount : " . $orders['grand_total'] . "\n\n*Customer Info*\nName : ". $order_customer['full_name'] ."\nAddress : ". $order_customer['address'] ."\nContact : ". $order_customer['contact'] ."\n\nPlease Kindly Check your order detail at : \n". $order_url ."\n\n*Merchant Bank Info*\n\nBank Name : ". $shop['bank'] ."\nBank Account : ". $shop['bank_account'] ."\nBank Holder Name : ". $shop['bank_holder_name'] ." ";

        $message = rawurlencode($message);
        
        $url=  "https://api.whatsapp.com/send?phone=" .$shop['contact']. "&text=" . $message;


        if($_POST['payment_method_id'] != 3){
            $this->update_orders_status($_POST['orders_id'],$_POST['payment_method_id']);
            die(json_encode([
                'status' => true,
                'url' => $url,
            ]));
        }else{
            // $this->premier_pay($_POST['orders_id']);
            // $url = base_url() . "/main/senang_pay/" . $_POST['orders_id'];
            $url = base_url() . "/main/gkash_pay/" . $_POST['orders_id'];

            //payment method link
            die(json_encode([
                'status' => true,
                'url' => $url,
            ]));
        }
    }
    function senang_callback(){
        
        
        try {

            if($_REQUEST){

                $response = json_encode($_REQUEST, true);

                $where = [
                    'response' => $response,
                    'type' => 'callback'
                ];
                
                $senang = $this->SenangResponseModel->getWhere($where);

                if(empty($senang)){

                    $data = array(
                        'response' => $response,
                        'type' => 'callback',
                    );
                    $this->SenangResponseModel->insertNew($data);
    
                    // return redirect()->to(url('success'));
    
                    $this->call_back_to_order_senang($_REQUEST['order_id']);
                }
                // $this->debug($_REQUEST);
                
            }
        } catch(Error $e){

            $data = array(
                'response' => $e->getMessage(),
                'type' => basename($_SERVER['REQUEST_URI']),
            );
            $this->SenangResponseModel->insertNew($data);

        }
            // if ($_REQUEST['status_id'] == 1){
            
    }

    function gkash_callback(){
        
        
      
        try {

            if($_REQUEST){

                $response = json_encode($_REQUEST, true);

                if($_REQUEST['status'] == "88 - Transferred"){

                    $where = [
                        'response' => $response,
                        'type' => 'callback sucess',
                    ];
                    
                    $senang = $this->PremierResponseModel->getWhere($where);
                    if(empty($senang)){
    
                        $data = array(
                            'response' => $response,
                            'type' => 'callback sucess',
                        );
                        $this->PremierResponseModel->insertNew($data);
        
                        // return redirect()->to(url('success'));
        
                        $this->call_back_to_order_gkash($_REQUEST['cartid']);
                    }
                }else{
                    $where = [
                        'response' => $response,
                        'type' => 'callback failed',
                    ];
                    
                    $senang = $this->PremierResponseModel->getWhere($where);
                    if(empty($senang)){
    
                        $data = array(
                            'response' => $response,
                            'type' => 'callback failed',
                        );
                        $this->PremierResponseModel->insertNew($data);
        
                    }
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
    function call_back_to_order_senang($order_id){

        $this->update_order($order_id,3);
        
    }
    function senang_pay($orders_id){

        $where = [
            'orders.orders_id' => $orders_id
        ];
        $orders = $this->OrdersModel->getWhere($where)[0];    
        // $this->update_order_payment_id($orders_id,$orderId);
        $shop = $this->get_shop($orders['shop_id'],true);
        // $topup['grand_total'] = 2;
        $detail = 'Pay for order ' . $orders['order_code']; 
        $merchant_id = '977162365741618';
        $secretkey = '3609-2141057149';
        $string = $secretkey . urldecode($detail) . urldecode($orders['grand_total']) . urldecode($orders_id);
        $hashed_string = md5($string);
        $data = array(
            'merchant_id' => $merchant_id,
            'detail' => $detail,
            'amount' => $orders['grand_total'],
            'name' => $orders['full_name'],
            'order_id' => $orders_id,
            'email' => $orders['email'],
            'phone' => $orders['contact'],
            'hash' => $hashed_string,
        );
        $this->pageData['data'] = $data;
       
        echo view('admin/senang', $this->pageData);
    }

    public function getUrlCurrently($filter = array()) {
        $pageURL = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on" ? "https://" : "http://";
    
        $pageURL .= $_SERVER["SERVER_NAME"];
    
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= ":".$_SERVER["SERVER_PORT"];
        }
    
        $pageURL .= $_SERVER["REQUEST_URI"];
    
    
        if (strlen($_SERVER["QUERY_STRING"]) > 0) {
            $pageURL = rtrim(substr($pageURL, 0, -strlen($_SERVER["QUERY_STRING"])), '?');
        }
    
        $query = $_GET;
        foreach ($filter as $key) {
            unset($query[$key]);
        }
    
        if (sizeof($query) > 0) {
            $pageURL .= '?' . http_build_query($query);
        }
    
        return $pageURL;
    }
    public function payment($order_code)
    {
        $where = [
            'orders.order_code' => $order_code,
        ];
        $orders = $this->OrdersModel->getWhere($where);
    
        if(!empty($_GET['code'])){
            $where_code = [
                'orders.order_payment_id' => $_GET['code'],
            ];
            $orders_code_ = $this->OrdersModel->getWhere($where_code);
            if(!empty($orders_code_)){
                $orders_code_ = $orders_code_[0];
                if($orders_code_['customer_id'] > 0){
                    if (empty($this->session->get("customer_data"))) {
                        $this->set_customer_session($orders_code_['customer_id']);
                        // $this->payment($order_code);
                        return redirect()->to(base_url($_SERVER["REQUEST_URI"], 'refresh'));
                    }else{
                        return redirect()->to(base_url('/main/payment/' . $order_code, 'refresh'));

                    }
                }else{
                    return redirect()->to(base_url('/main/payment/' . $order_code, 'refresh'));
    
                }
            }
        }
        
        $shop = $this->shop;
        $where = [
            'shop_id' => $shop['shop_id']
        ];
        $shop_gift = $this->GiftModel->getWhere(array_merge($where,['is_active' => 1]));
        $shop_payment_method = $this->ShopPaymentMethodModel->getWhere($where);
        $this->pageData['shop_payment_method'] = array_column($shop_payment_method,'payment_method_id');
        
        $payment_method = $this->PaymentMethod->getAll();
        $this->pageData['payment_method'] = $payment_method;
        $this->pageData['shop_gift'] = $shop_gift;

       
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
       
        $this->load_view('payment');


        
    }
    
    public function cart()
    {
        $shop = $this->shop;
  
        // $shop_operating_hour = $this->ShopOperatingHourModel->getWhere($where);

        // $this->debug($product);
        // $this->debug($product);
        // $this->debug($product);
        
        $this->load_view('cart');


    }
    


    public function index()
    {
        $shop = $this->shop;
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


        $where = [
            'merchant.shop_id' => $shop['shop_id']
        ];
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
        $this->pageData['about'] = $this->get_about(1);
        $this->pageData['about_bottom'] = $this->get_about(2);

        $this->load_view('index');



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
      
    public function product()
    {
        $shop = $this->shop;

        $where = [
            'product.shop_id' => $shop['shop_id']
        ];

        // $shop_operating_hour = $this->ShopOperatingHourModel->getWhere($where);
        $product = $this->ProductModel->getWhere($where);
        $where = [
            'category.shop_id' => $shop['shop_id']
        ];
        $category = $this->CategoryModel->getWhere($where);
        $this->pageData['category'] = $category;
        $this->pageData['product'] = $product;
        $this->pageData['pages'] = $this->get_page_number($product);

        // $this->debug($product);
        // $this->debug($product);
        // $this->debug($product);
    
        $this->load_view('shop');


    }

    public function member()
    {
        $shop = $this->shop;

        $this->validate_function(1,$this->pageData['shop_function']);

        $this->pageData['point'] = $this->PointModel->get_balance($this->session->get('customer_id'));
	
        $where = [
            'customer_id' => $this->session->get('customer_id'),
        ];
        $customer = $this->CustomerModel->getWhere($where);
        $downline = $this->get_recursive_downline($customer);


        $where = [
            'point.customer_id' => $this->session->get('customer_id'),
        ];
        $point_history = $this->PointModel->get_transaction_by_customer($where);

        $this->pageData['point_history'] = $point_history;
        $this->pageData['customer'] = $customer[0];
        $this->pageData['downline'] = $downline;
  
        $this->load_view('member');

    }
    public function get_voucher_detail(){

        
            $where = [
                'voucher.voucher_id' => $_POST['voucher_id']
            ];
            $voucher = $this->VoucherModel->getWhere($where);
        //    $this->pageData['voucher'] = $voucher[0];
        //    $this->pageData['is_self'] = $_POST['is_self'];

          die(json_encode([
              'data' => $voucher[0],
              'status' => true,
          ]));
        // echo view("templateone/voucher_detail_modal",$this->pageData);

        }
        public function get_gift_detail(){

        
            $where = [
                'gift.gift_id' => $_POST['gift_id']
            ];

            $gift = $this->GiftModel->getWhere($where);
            //    $this->pageData['gift'] = $gift[0];
            //    $this->pageData['is_self'] = $_POST['is_self'];
            
            die(json_encode([
              'data' => $gift[0],
              'status' => true,
            ]));
            // echo view("templateone/gift_detail_modal",$this->pageData);
            
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
            "orders.order_code" => $orders_id,
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
        
        $where = [
            'order_customer.order_customer_id' => $orders[0]['order_customer_id']
        ];
        $orders = $orders[0];
        $order_customer = $this->OrderCustomerModel->getWhere($where)[0];
        $shop = $this->ShopModel->getWhereNormal(['shop.shop_id' => $orders['shop_id']])[0];
        $order_url = base_url() . "/main/payment/" .  $orders['order_code'];

        $message = "Order No : ".$orders['order_code']." \nTotal Amount : " . $orders['grand_total'] . "\n\n*Customer Info*\nName : ". $order_customer['full_name'] ."\nAddress : ". $order_customer['address'] ."\nContact : ". $order_customer['contact'] ."\n\nPlease Kindly Check your order detail at : \n". $order_url ."\n\n*Merchant Bank Info*\n\nBank Name : ". $shop['bank'] ."\nBank Account : ". $shop['bank_account'] ."\nBank Holder Name : ". $shop['bank_holder_name'] ." ";

        $message = rawurlencode($message);
        
        $order_url=  "https://api.whatsapp.com/send?phone=" .$shop['contact']. "&text=" . $message;

        // $order_url = base_url()  . "/main/order_detail/" . $orders_id;
        $orders['url'] =  $order_url;
        $this->pageData["orders"] = $orders;

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

        $order_url = base_url()  . "/main/payment/" . $order_code;
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
                $url = base_url() . "/main/payment/" .  $code;
                // $shop_name = $this->ShopModel->getWhere($where)[0]['contact'];
                $this->send_notification_to_shop($_POST['shop_id'],$order_id);
                // foreach($shop_token as $row){
                //     $this->send_notification($row['token'],$shop['shop_name'],$shop['image']);
                // }
                
                // if($_POST['email'] != ""){
                //     $this->EmailModel->send_email($_POST['email'],$order_id);
                // }
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
   
    public function send_notification_to_shop($shop_id,$orders_id){
        $where = [
            'shop_token.shop_id' => $shop_id,
        ];
        $shop_token = $this->ShopTokenModel->getWhere($where);

        if(!empty($shop_token)){
            $registration_ids = array_column($shop_token,'token');
            $shop_token = $shop_token[0];
            $this->send_notification($registration_ids,$shop_token,$orders_id);
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



    function gkash_pay($orders_id){
        $where = [
            'orders.orders_id' => $orders_id
        ];
        $orders = $this->OrdersModel->getWhere($where)[0];    
        $orderId = $this->generateId();
        $this->update_order_payment_id($orders_id,$orderId);
        $shop = $this->get_shop($orders['shop_id'],true);
        $detail = 'Pay for order ' . $orders['order_code']; 
        
        $CID = 'M161-U-20320';
        $signatureKey = 'hNyRMiIWlo8ijtd';
        
        // $CID = 'M161-U-33';
        // $signatureKey = 'oAhVwtUxfrop4cI';
        
        $returnurl = base_url() . "/main/payment/"  . $orders['order_code'] . "/?code=" . $orderId  ;
        $callbackurl =   base_url() . '/main/gkash_callback';
        // $returnurl ='http://capital-shop.piegendevelop.com/main';
        // $callbackurl ='http://capital-shop.piegendevelop.com/main/call_back_to_order';
        $signatureKey = strtoupper($signatureKey);
        $CID = strtoupper($CID);
        $orderId = strtoupper($orderId);

        $signature_arr = array(
            $signatureKey,
            $CID,
            $orderId,
            number_format($orders['grand_total'], 2, '', ''),
            'MYR'
        );
    
        $signature = hash('sha512', strtoupper(implode(";", $signature_arr)));
        $data = array(
            'cid' => $CID,
            'currency' => "MYR",
            'cart_id' => $orderId,
            'detail' => $detail,
            'return_url' => $returnurl,
            'client_ip' => $_SERVER['REMOTE_ADDR'],
            'address' => $orders['address'],
            'callback_url' => $callbackurl,
            'amount' => $orders['grand_total'],
            'signature' => $signature,
            'name' => $orders['full_name'],
            'order_id' => $orderId,
            'post_url' => 'https://api-staging.pay.asia/api/paymentform.aspx',
            'email' => $orders['email'],
            // 'email' => 'yongrou74@hotmail.com',
            'contact' => $orders['contact'],
        );

        $this->pageData['data'] = $data;
       
        echo view('admin/gkash', $this->pageData);

    }


    function gkash_pay_test($orders_id){
        $where = [
            'orders.orders_id' => $orders_id
        ];
        $orders = $this->OrdersModel->getWhere($where)[0];    
        $orderId = $this->generateId();
        $this->update_order_payment_id($orders_id,$orderId);
        $shop = $this->get_shop($orders['shop_id'],true);
        $detail = 'Pay for order ' . $orders['order_code']; 
        
        $CID = 'M161-U-20320';
        $signatureKey = 'hNyRMiIWlo8ijtd';
        
        // $CID = 'M161-U-33';
        // $signatureKey = 'oAhVwtUxfrop4cI';
        
        $returnurl = base_url() . "/main/payment/"  . $orders['order_code'] ;
        $callbackurl =   base_url() . '/main/gkash_callback';
        // $returnurl ='http://capital-shop.piegendevelop.com/main';
        // $callbackurl ='http://capital-shop.piegendevelop.com/main/call_back_to_order';
        $signatureKey = strtoupper($signatureKey);
        $CID = strtoupper($CID);
        $orderId = strtoupper($orderId);

        $signature_arr = array(
            $signatureKey,
            $CID,
            $orderId,
            number_format($orders['grand_total'], 2, '', ''),
            'MYR'
        );
    
        $signature = hash('sha512', strtoupper(implode(";", $signature_arr)));
        $data = array(
            'cid' => $CID,
            'version' => '1.5.4',
            'v_currency' => "MYR",
            'v_cartid' => $orderId,
            'v_productdesc' => $detail,
            'returnurl' => $returnurl,
            'clientip' => $_SERVER['REMOTE_ADDR'],
            'address' => $orders['address'],
            'callbackurl' => $callbackurl,
            'v_amount' => $orders['grand_total'],
            'signature' => $signature,
            
            'v_firstname' => $orders['full_name'],
            'order_id' => $orderId,
            'post_url' => 'https://api-staging.pay.asia/api/payment/submit',
            'v_billemail' => $orders['email'],
            // 'email' => 'yongrou74@hotmail.com',
            'v_billphone' => $orders['contact'],
        );

        ksort($data);

        $json_encoded_payload = json_encode($data, JSON_UNESCAPED_SLASHES);
        print(">>> Request - <br>".print_r($json_encoded_payload,true)."<br><br>");


        $url = 'https://api-staging.pay.asia/api/payment/submit';
        // $url = 'https://api.premierpay.com.my/premierpay/api/merchant/order/store/'.$client_id.'/online';

        // echo "<<< Response<br>";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_encoded_payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: x-www-form-urlencoded'));
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     'Content-Type: x-www-form-urlencoded; charset=UTF-8',
        // )); 

        $result = curl_exec($ch);
        die($result);
        

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
        $redirect_url = base_url() . "/main/payment/"  . $orders['order_code'] ;
        
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
                if($this->check_exist_function(6,$this->pageData['shop_function']) || $this->check_exist_function(8,$this->pageData['shop_function'])){

                    $this->purchase_orders_percent($orders);
                }
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

        $where = array(
            "orders.orders_id" => $orders_id,

        );
        $orders = $this->OrdersModel->getWhere($where)[0];

        $shop = $this->get_shop($orders['shop_id']);

        if($orders['email'] != ""){
            $this->EmailModel->send_email($orders['email'],$order_id);
        }

        

        if($this->check_exist_function(1,$this->pageData['shop_function'])){
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
    function call_back_to_order_gkash($order_id){
        
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
