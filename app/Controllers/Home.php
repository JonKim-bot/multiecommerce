<?php




namespace App\Controllers;

use App\Core\BaseController;
use App\Models\ShopModel;
use App\Models\ProductModel;
use App\Models\BannerModel;
use App\Models\AboutModel;
use App\Models\CustomerModel;

use App\Models\CategoryModel;
use App\Models\OrdersModel;
use App\Models\MerchantModel;
use App\Models\AnnouncementModel;

use App\Models\TagModel;

use App\Models\SpecialModel;
use App\Models\SpecialCategoryModel;

use App\Models\SpecialImageModel;

use App\Models\OrderDetailModel;
use App\Models\PaymentMethodModel;
use App\Models\EmailModel;
use App\Models\OrdersStatusModel;

use App\Models\ShopPaymentMethodModel;

class Home extends BaseController
{


    public function __construct()
    {
		$this->session = session();

		$this->SpecialModel = new SpecialModel();
        $this->SpecialImageModel = new SpecialImageModel();

        $this->SpecialCategoryModel = new SpecialCategoryModel();

        $this->ShopModel = new ShopModel();
        $this->AboutModel = new AboutModel();
		$this->TagModel = new TagModel();

        $this->CategoryModel = new CategoryModel();
        $this->OrdersModel = new OrdersModel();
        $this->MerchantModel = new MerchantModel();
        $this->AnnouncementModel = new AnnouncementModel();
        $this->OrdersStatusModel = new OrdersStatusModel();

        $this->EmailModel = new EmailModel();
		$this->CustomerModel = new CustomerModel();


        $this->BannerModel = new BannerModel();
        $this->ProductModel = new ProductModel();
        $this->PaymentMethod = new PaymentMethodModel();
        $this->ShopPaymentMethodModel = new ShopPaymentMethodModel();

        $this->OrderDetailModel = new OrderDetailModel();


        $this->pageData = array();
    }

    public function index()
    {
        
        // $this->debug($product);
        // $this->debug($product);
        // $this->debug($product);
		$tag = $this->TagModel->getAllWithNumber();
		$this->pageData['tag'] = $tag;
		$this->pageData['shop'] = $this->ShopModel->getWhereTop();

        echo view("home/header");

		echo view("home/index", $this->pageData);
		echo view("home/footer");

	}
	public function special()
    {
		$special_category_id =
		($_GET and $_GET['category_id'])
			? $_GET['category_id']
			: '';

		if ($special_category_id != '') {
			$where['special_category_id'] = $special_category_id;
		
			$special = $this->SpecialModel->getWhere($where);
		}else{
			$special = $this->SpecialModel->getAll();
			
		}
		foreach($special as $key => $row){
			$where = [
				'special_id' => $row['special_id']
			];
			$thumbnail = $this->SpecialImageModel->getWhere($where);
			if(!empty($thumbnail)){
				$special[$key]['thumbnail']  = base_url() .  $thumbnail[0]['special_image'];
			}else{
				$special[$key]['thumbnail']  = 'https://image.shutterstock.com/image-vector/ui-image-placeholder-wireframes-apps-260nw-1037719204.jpg';

			}
		}
		$special_category = $this->SpecialCategoryModel->getAll();
		$this->pageData['special'] = $special;

		$this->pageData['special_category'] = $special_category;
		echo view("home/header", $this->pageData);

        echo view("home/special", $this->pageData);
        echo view("home/footer", $this->pageData);

    }
	public function get_restaurants(){
			$like = [
				'shop_name' => $_POST['keyword'],
			];
			$tag_id = $_POST['tag_id'];
			$where = [
				'tag_id' => $tag_id,	
				'area' => $_POST['area'],
			];
			$shop = $this->ShopModel->getWhereLike($like,$where);


			$this->pageData['shop'] = $shop;

			$this->pageData['number'] = count($shop);

			echo view("home/shop_list", $this->pageData);

	}

	public function restaurants()
    {
     
		$tag = $this->TagModel->getAll();
		$this->pageData['tag'] = $tag;
		$state = $this->ShopModel->getShopState();
		$this->pageData['state'] = $state;
        echo view("home/header");
		echo view("home/listing", $this->pageData);
		echo view("home/footer");
		

	}
	public function special_detail($special_id)
    {
     
		$where = [
            'special_id' => $special_id,
        ];

        $special = $this->SpecialModel->getWhere($where);
        $special_image = $this->SpecialImageModel->getWhere($where);

        // $this->debug($special);

        // $merchant = $this->MerchantModel->getWhere($where);

        // $this->show_404_if_empty($admin);

        $this->pageData['special'] = $special[0];
        $this->pageData['special_image'] = $special_image;

        echo view("home/header");

		echo view("home/detail", $this->pageData);
		echo view("home/footer");

	}
	public function order_history()
    {
     
		$where =[
			'orders.customer_id' => $this->session->get("login_id")
        ];
		$orders = $this->OrdersModel->getWhereHistory($where);
		$this->pageData['orders'] = $orders;
        echo view("home/header");

		echo view("home/order_history", $this->pageData);
		echo view("home/footer");

	}
	public function save_profile(){
		
		if($_POST){
			$data = array(
				'name' => $input['name'],
				'email' => $input['email'],
				'contact' => $input['contact'],
				'address' => $input['address'],
				'lng' => $input['lng'],
				'lat' => $input['lat'],
				'taman' => $input['taman'],
				'state' => $input['state'],
				'url' => $input['url'],


				'role_id' => 3,
			);
			$customer_id = $this->CustomerModel->insertNew($data);
			die(json_encode([
				'status' => true,
				'data' => $customer_id,
			]));
		}
	}
	public function profile()
    {	
     
		$where = [
			'customer_id' => $this->session->get("login_id")
		];
		if($_POST){
			$input = $this->request->getPost();
			$data = array(
				'name' => $input['name'],
				'email' => $input['email'],
				'contact' => $input['contact'],
				'address' => $input['address'],
				'lng' => $input['lng'],
				'lat' => $input['lat'],
				'taman' => $input['taman'],
				'state' => $input['state'],
				'url' => $input['url'],

			);
			$customer_id = $this->CustomerModel->updateWhere($where,$data);
			$customer = $this->CustomerModel->getWhere($where);
			$login_data = $customer[0];
			$login_id = $customer[0]["customer_id"];
			$this->session->set("login_data", $login_data);
			$this->session->set("login_id", $login_id);
		}

		$customer = $this->CustomerModel->getWhere($where);
		$this->pageData['customer'] = $customer[0];
		echo view("home/header");
		echo view("home/profile", $this->pageData);
		echo view("home/footer");

	}
	public function login()
    {
     
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
        echo view("home/header");

		echo view("home/login", $this->pageData);
		echo view("home/footer");
		
	}
	public function ismscURL($link){

		$http = curl_init($link);
  
		curl_setopt($http, CURLOPT_RETURNTRANSFER, TRUE);
		$http_result = curl_exec($http);
		$http_status = curl_getinfo($http, CURLINFO_HTTP_CODE);
		curl_close($http);
  
		return $http_result;
	   }
  
	   public function sendSms($destination = "",$message = "",$type = 1){
  
		$destination = "0169787592";
		$message = "test";
		$message = html_entity_decode($message, ENT_QUOTES, 'utf-8'); 
		$message = urlencode($message);
		
		$username = urlencode("hupseang");
		$password = urlencode("hupseang2020");
		$sender_id = urlencode("66300");
  
		$fp = "https://www.isms.com.my/isms_send.php";
		$fp .= "?un=$username&pwd=$password&dstno=$destination&msg=$message&type=$type&sendid=$sender_id&agreedterm=Yes";
		//echo $fp;
		
		$result = $this->ismscURL($fp);
	   //  echo $result;
	}
	public function login_by_google(){
        if(isset($_POST)){
			$input = $_POST['response'];
			
			
            $error = false;
            $customer_data = $this->CustomerModel->getWhere(['email' => $input["email"]]);
			
            if (!empty($customer_data)) {
				
				$where =['email' => $input['email']];
				
                $data = [
					"last_login" => date("Y-m-d H:i:s"),
                ];
                $customer = $this->CustomerModel->updateWhere($where,$data);
                
            }else{
				$data = array(
					'name' => $input['name'],
                    'email' => $input['email'],
					'google_id' => $input['id'], 
					"last_login" => date("Y-m-d H:i:s"),
					'thumbnail' => $input['picture'],
					'role_id' => 3,
                    'login_method' => 'google',
                );
                $customer_id = $this->CustomerModel->insertNew($data);
				$where = [
					'customer_id' => $customer_id
				];
            }
			$customer = $this->CustomerModel->getWhere($where);
			$login_data = $customer[0];
			$login_id = $customer[0]["customer_id"];
			$this->session->set("login_data", $login_data);
			$this->session->set("login_id", $login_id);
			die(json_encode(array(
				"data" => $login_data,
				'status'=> true,

			)));
        }
        
    }
	function startsWith ($string, $startString) 
    { 
        $len = strlen($startString); 
        return (substr($string, 0, $len) === $startString); 
    } 
	public function signup($is_home = "")
    {
     
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
				if($is_home != ""){
					return redirect()->to(base_url('/main/index/' . $is_home, "refresh"));
				}else{
					return redirect()->to(base_url('/home/index', "refresh"));
				}
			}else{
				$this->pageData['error'] = "User Existed";
			}

		}
		$this->pageData['is_home'] = $is_home;

        echo view("home/header");

		echo view("home/signup", $this->pageData);
		echo view("home/footer");


	}
    

    
	public function logout()
    {
        $session = session();

        $session->destroy();
		$url = base_url();

        return redirect()->to($url);
    }
    
}
