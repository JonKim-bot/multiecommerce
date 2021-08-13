<?php namespace App\Controllers;






use App\Models\BaseModel;
use App\Models\AdminModel;
use App\Core\BaseController;

use App\Models\MerchantModel;
use App\Models\BankModel;
use App\Models\TagModel;
use App\Models\ShopModel;
use App\Models\ShopTagModel;

class Access extends BaseController
{

    public function __construct() {

        $this->pageData= array();
        $this->BankModel = new BankModel();
        $this->TagModel = new TagModel();


        $this->AdminModel = new AdminModel();
        $this->MerchantModel = new MerchantModel();
        $this->ShopTagModel = new ShopTagModel();

        $this->ShopModel = new ShopModel();

        $bank = $this->BankModel->getAll();
        $this->pageData['tag'] = $this->TagModel->getAll();

        $this->pageData['bank'] = $bank;

        $session = session();
        if(session()->get('admin_data') != null){
            //  redirect()->to(base_url('access/login/'));
            echo "<script>location.href='".base_url()."/admin';</script>";
        }
    }
    function startsWith ($string, $startString) 
    { 
        $len = strlen($startString); 
        return (substr($string, 0, $len) === $startString); 
    } 
    public function register()
    {

        // $input = $this->request->getVar();
        // $check = $this->request->getGet();
        if ($_POST) {


            $input = $this->request->getPost();

            // $this->debug($input);

            $error = false;

               

            if (!$error) {
            if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                $file = $this->request->getFile('banner');
                $new_name = $file->getRandomName();

                $banner = $file->move('./public/images/shop/', $new_name);
                if ($banner) {
                    $banner = '/public/images/shop/' . $new_name;
                } else {
                    $error = true;
                    $error_message = "Upload failed.";
                }
            } 
            if ($_FILES['icon'] and !empty($_FILES['icon']['name'])) {
                $file = $this->request->getFile('icon');
                $new_name = $file->getRandomName();
                $icon = $file->move('./public/images/shop/', $new_name);
                if ($icon) {
                    $icon = '/public/images/shop/' . $new_name;
                } else {
                    $error = true;
                    $error_message = "Upload failed.";
                }
            } 


            $input['contact'] = str_replace("-","",$input['contact']);
            $input['contact'] = str_replace("+","",$input['contact']);

            if(!$this->startsWith($input['contact'],"6")){
                $input['contact'] = "6" . $input['contact'];
            }



            $data = array(
                "shop_name" => $input['shop'],
                "shop_chinese_name" => $input['shop_name'],
                "slug" => $this->slugify($input['shop']),
                "email" => $input['email'],
                "operating_hour" => $input['operating_hour'],
                "contact" => $input['contact'],
                "delivery_fee" => $input['delivery_fee'],
                'insta' => $input['insta'],
                'facebook' => $input['facebook'],

                "address" => $input['address'],
                
                // "bank_id" => $input['bank_id'],
                // "bank_holder_name" => $input['bank_holder_name'],
                // "bank_account" => $input['bank_account'],

            );
               
            if(!empty($icon)){
                $data['icon'] = $icon;

            }
            if(!empty($banner)){
                $data['image'] = $banner;
            }


            // $this->debug($data);
            // dd($data);

            $shop_id =   $this->ShopModel->insertNew($data);

            $where = [
                'shop_id' => $shop_id
            ];
            // $this->ShopTagModel->hardDeleteWhere($where);
            // foreach($_POST['tag_id'] as $tag){
            //     $data = [
            //         'tag_id' => $tag,
            //         'shop_id' => $shop_id
            //     ];
            //     $this->ShopTagModel->insertNew($data);
            // } 
            $exists = $this->checkExists($input["username"]);
            // $this->debug($exists);

            if ($exists) {
                $error = true;
                $this->pageData["error"] = "Username already exists.";
                $this->pageData["input"] = $input;
            }

            if ($input["password"] != $input["password2"]) {
                $error = true;
                $this->pageData["error"] = "Passwords do not match";
                $this->pageData["input"] = $input;
            }

            //single upload
            // $getUpload = $this->request->getFile('thumbnail');
            // $thumbnail = $getUpload->getName();
            // $tempName = $getUpload->getTempName();
            // $getUpload->move('./assets/img/merchant', $thumbnail);

            //multiple upload
            // $getUpload = $this->request->getFileMultiple('thumbnail');
            // foreach ($getUpload as $files){
            //     $thumbnail = $files->getName();
            //     $files->move('./assets/img/merchant', $thumbnail);
            // }

            if (!$error) {

                $hash = $this->hash($input['password']);

                $data = array(
                    'role_id' => 2,
                    'shop_id' => $shop_id,
                    'username' => $input['username'],
                    'contact' => $input['contact'],
                    'email' => $input['email'],
                    'real_password' => $input['password'],
                    'password' => $hash['password'],
                    'salt' => $hash['salt'],
                );

                // $this->debug($data);
                // dd($data);

                $this->MerchantModel->insertNew($data);

                return redirect()->to(base_url('/access/loginMerchant', "refresh"));

            }
        }
        }

        echo view('access/header', $this->pageData);
        echo view('access/merchant_register');
        echo view('access/footer');
    }



    public function login()
    {
        echo "<script>location.href='".base_url()."/access/loginMerchant';</script>";

        $session = session();

        if ($_POST) {


            $input = $this->request->getPost();

            $error = false;


            $where = array(
                "username" => $input["username"],
            );

            $admin = $this->AdminModel->getWhere($where);
            // $user = $this->UserModel->getWhere($where);

            if (!empty($admin)) {
                $login = $this->AdminModel->login($input["username"], $input["password"]);
                
                if (!empty($login)) {
                    $admin_data = $login[0];
                    $login_id = $login[0]["admin_id"];
                    
                } else {
                    $error = true;
                    $this->pageData["error"] = "Invalid Username and Password";
                }

            } else if (!empty($user)) {
                // $login = $this->UserModel->login($input["username"], $input["password"]);
                if (!empty($login)) {
                    $admin_data = $login[0];
                    $login_id = $login[0]["user_id"];
                } else {
                    $error = true;
                    $this->pageData["error"] = "Invalid Username and Password";
                }
            } else {
                $error = true;
                $this->pageData["error"] = "Invalid Username and Password";
            }

            if (!empty($admin_data) and $admin_data["deleted"] == 1) {
                $error = true;
                $this->pagedata["error"] = "This Account has been DEACTIVATED";
            }

            if (!$error) {
                $session->set("admin_data", $admin_data);
            

                $session->set("login_id", $login_id);

                if($admin_data['type'] == "ADMIN"){
                    return redirect()->to( base_url('admin', "refresh") );
                } else if($admin_data['type'] == "USER"){
                    return redirect()->to( base_url('user/detail/' . $login_id, "refresh") );
                }
            }

        }

        echo view('access/header', $this->pageData);
        echo view('access/login');
        echo view('access/footer');
    }

    
    public function loginAdmin()
    {

        $session = session();

        if ($_POST) {

            $input = $this->request->getPost();

            $error = false;

            $where = array(
                "username" => $input["username"],
            );

            $admin = $this->AdminModel->getWhere($where);
            // $user = $this->UserModel->getWhere($where);

            if (!empty($admin)) {
                $login = $admin;//$this->AdminModel->login($input["username"], $input["password"]);

                if (!empty($login)) {
                    
                    $admin_data = $login[0];
                    $login_id = $login[0]["admin_id"];
                    
                } else {
                    $error = true;
                    $this->pageData["error"] = "Invalid Username and Password";
                }

            } else if (!empty($user)) {
                // $login = $this->UserModel->login($input["username"], $input["password"]);
                if (!empty($login)) {
                    $admin_data = $login[0];
                    
                    $login_id = $login[0]["user_id"];
                } else {
                    $error = true;
                    $this->pageData["error"] = "Invalid Username and Password";
                }
            } else {
                $error = true;
                $this->pageData["error"] = "Invalid Username and Password";
            }

            if (!empty($admin_data) and $admin_data["deleted"] == 1) {
                $error = true;
                $this->pagedata["error"] = "This Account has been DEACTIVATED";
            }

            if (!$error) {
                $session->set("admin_data", $admin_data);
                $session->set("login_id", $login_id);

                if($admin_data['type'] == "ADMIN"){
                    return redirect()->to( base_url('admin', "refresh") );
                } 
            }

        }

        echo view('access/header', $this->pageData);
        echo view('access/login');
        echo view('access/footer');
    }
    public function loginMerchant()
    {
        $session = session();

        if ($_POST) {

            $input = $this->request->getPost();

            $error = false;

            $where = array(
                "username" => $input["username"],
            );

            $admin = $this->MerchantModel->getWhere($where);
            // $user = $this->UserModel->getWhere($where);

            if (!empty($admin)) {
                $login = $this->MerchantModel->login($input["username"], $input["password"]);
                
                if (!empty($login)) {
                    $admin_data = $login[0];
                    $login_id = $login[0]["merchant_id"];
                    
                } else {
                    $error = true;
                    $this->pageData["error"] = "Invalid Username and Password";
                }

            } else {
                $error = true;
                $this->pageData["error"] = "Invalid Username and Password";
            }

            if (!empty($admin_data) and $admin_data["deleted"] == 1) {
                $error = true;
                $this->pagedata["error"] = "This Account has been DEACTIVATED";
            }

            if (!$error) {
                $session->set("admin_data", $admin_data);
                $session->set("login_id", $login_id);
                $this->MerchantModel->updateWhere(['merchant_id' => $login_id],[
                    'last_login' => date('m/d/Y h:i:s a', time()),
                ]);
                $where = [
                    'shop_id' => $admin_data['shop_id']
                ];
                $shop = $this->ShopModel->getWhere($where);
                $shop[0]['shop_function'] = $this->getShopFunction($admin_data['shop_id']);
                $session->set('shop_data',$shop[0]);


                if($admin_data['type'] == "ADMIN"){
                    return redirect()->to( base_url('admin', "refresh") );
                } else if($admin_data['type'] == "MERCHANT"){
                    return redirect()->to( base_url('orders?dateFrom='.date('Y-m-d').'&'.'dateTo='.date('Y-m-d'), "refresh") );
                }
            }

        }

        echo view('access/header', $this->pageData);
        echo view('access/merchant_login');
        echo view('access/footer');
    }

    public function logout()
    {
        $session = session();

        $session->destroy();

        return redirect()->to( base_url('access/loginMerchant', "refresh") );
    }
}
