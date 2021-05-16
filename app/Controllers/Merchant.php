<?php namespace App\Controllers;

use App\Core\BaseController;
use App\Models\MerchantModel;
use App\Models\ShopModel;

class Merchant extends BaseController
{

    public function __construct()
    {

        $this->pageData = array();
        $this->MerchantModel = new MerchantModel();
        $this->ShopModel = new ShopModel();
        
        $shop = $this->ShopModel->getAll();

        $this->pageData['shop'] =  $shop;

        if(session()->get('admin_data') == null && uri_string() != "access/login"){
            //  redirect()->to(base_url('access/login/'));
            echo "<script>location.href='".base_url()."/access/login';</script>";
        }

    }


    public function index()
    {

        $merchant = $this->MerchantModel->getAll();
        // $this->debug($merchant);
        $this->pageData['merchant'] = $merchant;
        echo view('admin/header', $this->pageData);
        echo view('admin/merchant/all');
        echo view('admin/footer');
    }
    
    function startsWith($string, $startString)
    {
        $len = strlen($startString);
        return substr($string, 0, $len) === $startString;
    }
    public function add()
    {

        // $input = $this->request->getVar();
        // $check = $this->request->getGet();
        if ($_POST) {

            $input = $this->request->getPost();

            // $this->debug($input);

            $error = false;

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

            $input['contact'] = str_replace("-","",$input['contact']);
            $input['contact'] = str_replace("+","",$input['contact']);
            if (!$this->startsWith($input['contact'], '6')) {
                $input['contact'] = '6' . $input['contact'];
            }

            if (!$error) {

                $hash = $this->hash($input['password']);

                $data = array(
                    'role_id' => 2,
                    'name' => $input['name'],
                    'shop_id' => $input['shop_id'],
                    'username' => $input['username'],
                    'contact' => $input['contact'],
                    'email' => $input['email'],
                    'password' => $hash['password'],
                    'salt' => $hash['salt'],
                    'created_by' => session()->get('login_id'),
                );

                // $this->debug($data);
                // dd($data);

                $this->MerchantModel->insertNew($data);

                return redirect()->to(base_url('merchant', "refresh"));

            }

        }

        echo view('admin/header', $this->pageData);
        echo view('admin/merchant/add');
        echo view('admin/footer');
    }

    public function detail($merchant_id)
    {

        $where = array(
            "merchant_id" => $merchant_id,
        );


        $merchant = $this->MerchantModel->getWhere($where);

        $this->show_404_if_empty($merchant);
        $where = [
            'shop_id' => $merchant[0]['shop_id']
        ];
        $shop = $this->ShopModel->getWhere($where);
        $this->pageData['shop'] = $shop[0];
        // $this->debug($shop[0]);
        $this->pageData["merchant"] = $merchant[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/merchant/detail');
        echo view('admin/footer');
    }

    public function edit($merchant_id)
    {

        $where = array(

            "merchant_id" => $merchant_id,
        );

        $this->pageData["merchant"] = $this->MerchantModel->getWhere($where)[0];

        if ($_POST) {

            $error = false;

            $input = $this->request->getPost();

            $exists = $this->checkExists($input["username"], $merchant_id);

            if ($exists) {
                $error = true;
                $this->pageData["error"] = "Username already exists.";
                $this->pageData["input"] = $input;
            }
            if (!empty($input['password'])) {
                if ($input["password"] != $input["password2"]) {
                    $error = true;
                    $this->pageData["error"] = "Passwords do not match";
                    $this->pageData["input"] = $input;
                }
            }

            //single upload
            $getUpload = $this->request->getFile('thumbnail');
            $thumbnail = $getUpload->getName();

            //multiple upload
            // $getUpload = $this->request->getFileMultiple('thumbnail');

            if (!$error) {

                $where = array(
                    'merchant_id' => $merchant_id,
                );

                $data = array(
                    'username' => $input['username'],
                    'name' => $input['name'],
                    'shop_id' => $input['shop_id'],

                    'contact' => $input['contact'],
                    'email' => $input['email'],
                    "modified_date" => date("Y-m-d H:i:s"),
                    'modified_by' => session()->get('login_id'),
                );

                if (!empty($thumbnail)) {
                    $data['thumbnail'] = $thumbnail;
                    $getUpload->move('./assets/img/merchant', $thumbnail);

                    // foreach ($getUpload as $files){
                    //     $thumbnail = $files->getName();
                    //     $files->move('./assets/img/merchant', $thumbnail);
                // }
                }

                $this->MerchantModel->updateWhere($where, $data);

                return redirect()->to(base_url('merchant/detail/' . $merchant_id, "refresh"));

            }


        }

        echo view('admin/header', $this->pageData);
        echo view('admin/merchant/edit');
        echo view('admin/footer');
    }

    public function delete($merchant_id)
    {

        $this->MerchantModel->softDelete($merchant_id);

        return redirect()->to(base_url('merchant', "refresh"));
    }

    public function test()
    {
        die("hello world");
    }

}
