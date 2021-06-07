<?php namespace App\Controllers;

use App\Core\BaseController;
use App\Models\CustomerModel;
use App\Models\OrdersModel;


class Customer extends BaseController
{

    public function __construct()
    {

        $this->pageData = array();
        $this->CustomerModel = new CustomerModel();
        $this->OrdersModel = new OrdersModel();

    }

    public function index()
    {

 
        $where = [
            'customer.shop_id' => $this->shop_id,
        ];
        $customer = $this->CustomerModel->getWhere($where);
        $this->pageData['customer'] = $customer;


        echo view('admin/header', $this->pageData);
        echo view('admin/customer/all');

        echo view('admin/footer');
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
            // $getUpload->move('./assets/img/customer', $thumbnail);

            //multiple upload
            // $getUpload = $this->request->gPetFileMultiple('thumbnail');
            // foreach ($getUpload as $files){
            //     $thumbnail = $files->getName();
            //     $files->move('./assets/img/customer', $thumbnail);
            // }

            if (!$error) {

                $hash = $this->hash($input['password']);

                $data = array(
                    'role_id' => 1,
                    'name' => $input['name'],
                    'username' => $input['username'],
                    'contact' => $input['contact'],
                    'email' => $input['email'],
                    'password' => $hash['password'],
                    'salt' => $hash['salt'],
                    'created_by' => session()->get('login_id'),
                );

                // $this->debug($data);
                // dd($data);

                $this->CustomerModel->insertNew($data);

                return redirect()->to(base_url('customer', "refresh"));

            }

        }

        echo view('admin/header', $this->pageData);
        echo view('admin/customer/add');
        echo view('admin/footer');
    }

    public function detail($customer_id)
    {

      
        $where = array(
            "customer_id" => $customer_id,
        );
        $customer = $this->CustomerModel->getWhere($where);
        $where = [
            'orders.customer_id' => $customer[0]['customer_id'],
        ];
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop($customer[0]['shop_id']);
        }
        $orders = $this->OrdersModel->getWhere($where);
        
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
        // $this->show_404_if_empty($customer);

        if($customer[0]['referal_id'] > 0 ){
            $this->pageData['downline'] = $this->CustomerModel->getWhere([
                'customer.customer_id' => $customer[0]['referal_id']
            ])[0]['contact'];
        }else{
            $this->pageData['downline'] = "none";
        }
        $this->pageData["customer"] = $customer[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/customer/detail');
        echo view('admin/footer');
    }

    public function edit($customer_id)
    {

        $where = array(

            "customer_id" => $customer_id,
        );

        $this->pageData["customer"] = $this->CustomerModel->getWhere($where)[0];

        if ($_POST) {

            $error = false;

            $input = $this->request->getPost();

            $exists = $this->checkExists($input["username"], $customer_id);

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
                    'customer_id' => $customer_id,
                );

                $data = array(
                    'username' => $input['username'],
                    'name' => $input['name'],
                    'contact' => $input['contact'],
                    'email' => $input['email'],
                    "modified_date" => date("Y-m-d H:i:s"),
                    'modified_by' => session()->get('login_id'),
                );

                if (!empty($thumbnail)) {
                    $data['thumbnail'] = $thumbnail;
                    $getUpload->move('./assets/img/customer', $thumbnail);

                    // foreach ($getUpload as $files){
                    //     $thumbnail = $files->getName();
                    //     $files->move('./assets/img/customer', $thumbnail);
                // }
                }

                $this->CustomerModel->updateWhere($where, $data);

                return redirect()->to(base_url('customer/detail/' . $customer_id, "refresh"));

            }

        }

        echo view('admin/header', $this->pageData);
        echo view('admin/customer/edit');
        echo view('admin/footer');
    }

    public function delete($customer_id)
    {

        $this->CustomerModel->softDelete($customer_id);

        return redirect()->to(base_url('customer', "refresh"));
    }

    public function test()
    {
        die("hello world");
    }

}
