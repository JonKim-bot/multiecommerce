<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\SmsModel;
use App\Models\OrderCustomerModel;
use App\Models\SmsSentModel;
use App\Models\CreditTopUpModel;
use App\Models\CreditModel;
use App\Models\SmsresponseModel;

class Sms extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->SmsModel = new SmsModel();
        $this->SmsSentModel = new SmsSentModel();
        $this->CreditTopUpModel = new CreditTopUpModel();
        $this->CreditModel = new CreditModel();
        $this->OrderCustomerModel = new OrderCustomerModel();
        $this->SmsresponseModel = new SmsresponseModel();

        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            echo "<script>location.href='" .
                base_url() .
                "/access/login';</script>";
        }
       
    }
    public function indexadmin()
    {

        $page = 1;
        $filter = array();

        if ($_GET) {
            $get = $this->request->getGet();

            if (!empty($get['page'])) {
                $page = $get['page'];
            }
            if (!empty($get['shop'])) {
                
                $get['shop.shop_name'] = $get['shop'];
            }
            if (!empty($get['full_name'])) {
                $get['sms.full_name'] = $get['full_name'];
            }
            if (!empty($get['email'])) {
                $get['sms.email'] = $get['email'];
            }
          
            if (!empty($get['contact'])) {
                $get['sms.contact'] = $get['contact'];
            }
            unset($get['contact']);

            unset($get['email']);
            unset($get['full_name']);

            unset($get['shop']);
            unset($get['page']);
            $filter = $get;
        }

   
        $sms = $this->SmsModel->getAll(10, $page, $filter);
        $this->pageData['page'] = $sms['pagination'];
        $this->pageData['start_no'] = $sms['start_no'];
        $sms = $sms['result'];
        // $this->debug($where);
        // $this->debug($sms);

        // $this->debug($sms);
        foreach($sms as $key => $row){
            $sms[$key]['template'] = $this->get_template($row['template_id']);
         

        }
        $this->pageData['sms'] = $sms;

        echo view('admin/header', $this->pageData);
        echo view('admin/sms/all_admin');
        echo view('admin/footer');
    }
     public function reject($credit_topup_id){

        $where = array(
            'sms.sms_id' => $sms_id,
        );
        $sms = $this->SmsModel->getWhere($where)[0];

        $data = array(
            'is_approved' => 2,
            'approval_date' => date('Y-m-d h:i:s'),

        );
        $this->SmsModel->updateWhere($where, $data);
        return redirect()->to(base_url($_SERVER['HTTP_REFERER'], 'refresh'));

    }

        
    public function approve($sms_id){

        $where = array(
            'sms.sms_id' => $sms_id,
        );
        $sms = $this->SmsModel->getWhere($where)[0];

        $data = array(
            'is_approved' => 1,
            'approval_date' => date('Y-m-d h:i:s'),

        );
        $this->SmsModel->updateWhere($where, $data);
        return redirect()->to(base_url($_SERVER['HTTP_REFERER'], 'refresh'));

    }

    public function index()
    {
        if($this->isMerchant == false){
            $this->indexadmin();
            return;
        }
        $where = [
            'sms.shop_id' => $this->shop_id,
        ];
        $sms = $this->SmsModel->getWhere($where);
        foreach($sms as $key => $row){
            $sms[$key]['template'] = $this->get_template($row['template_id']);
         

        }
        $this->pageData['sms'] = $sms;

        echo view('admin/header', $this->pageData);
        echo view('admin/sms/all');
        echo view('admin/footer');
    }
    public function get_template($template_id){
        if($template_id == 1){
            return "Hi %customer name%, %merchant name% is %discount /offer%. %Call to action (may include
            shop link)%
            %Merchant representative name% from %merchant name%";
        }
        if($template_id == 2){
            return "%Opening (Sms a problem/ need)%. %Discount/offer%. %Call to action (may include shop
            link)%";
        }
        if($template_id == 3){
            return "Hi %customer name%. % A need/problem%. %Merchant name% is %discount/offer%. %Call to action (may include shop link)%";
        }
        

    }
    public function update_sms_price($sms_id){
        $where = [
            'sms_sent.sms_id' => $sms_id
        ];
        $count = count($this->SmsSentModel->getWhere($where));
        $total = $count * 0.13;
        $data['price'] = $total;
        $where = [
            'sms.sms_id' => $sms_id
        ];
        $this->SmsModel->updateWhere($where, $data);

    }
    public function add()
    {
        $where = [
            'order_customer.shop_id' => $this->shop_id,
        ];
        $order_customer = $this->OrderCustomerModel->getWhereContact($where);
        $this->pageData['order_customer'] = $order_customer;
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                
                $data = [
                    'call_to_action' => $this->request->getPost('call_to_action'),
                    'need' => $this->request->getPost('need'),
                    'discount_offer' => $this->request->getPost('discount_offer'),
                    'template_id' => $this->request->getPost('template_id'),
                    'shop_id' => $this->shop_id,
                    'created_date' => date('Y-m-d H:i:s'),
                    'created_by' => session()->get('login_id'),
                ];
                
                $sms_id = $this->SmsModel->insertNew($data);
                if(!empty($_POST['customer_id'])){
                    if($_POST['customer_id'][0] != "all"){
                        foreach($_POST['customer_id'] as $row){
                            $data_customer = [
                                'sms_id' => $sms_id,
                                'is_sent' => 0,
                                'customer_id' => $row, 
                                'created_by' => session()->get('login_id'),
                                'created_date' => date('Y-m-d H:i:s'),
                            ];
                            $this->SmsSentModel->insertNew($data_customer);
                        }
                    }else{
                        foreach($order_customer as $row){
                            $data_customer = [
                                'sms_id' => $sms_id,
                                'is_sent' => 0,
                                'customer_id' => $row['contact'], 
                                'created_by' => session()->get('login_id'),
                                'created_date' => date('Y-m-d H:i:s'),
                            ];
                            $this->SmsSentModel->insertNew($data_customer);
                        }
                    }
                }
              
                $this->update_sms_price($sms_id);

                return redirect()->to(base_url('sms', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/sms/add');
        echo view('admin/footer');
    }

    public function add_credit($sms_id)
    {
      
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                
                $data = [
                    'shop_id' => $this->shop_id,
                    'amount' => $_POST['amount']
                ];
                if ($_FILES['receipt'] and !empty($_FILES['receipt']['name'])) {
                    $file = $this->request->getFile('receipt');
                    $new_name = $file->getRandomName();
                    $banner = $file->move(
                        './public/images/product/',
                        $new_name
                    );
                    if ($banner) {
                        $banner = '/public/images/product/' . $new_name;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }
                $data['receipt'] = $banner;
                $top_up_id = $this->CreditModel->record_top_up($this->shop_id,$_POST['amount'],$banner);
              
                return redirect()->to(base_url('sms/detail/' . $sms_id, 'refresh'));
            }
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

    public function sms_template($sms_id){
        $where = [
            'sms.sms_id'=> $sms_id
        ];
        $sms = $this->SmsModel->getWhere($where)[0];
        $template_id = $sms['template_id'];
        $remark = "Credit use for sms to send " . $sms['shop_name'] . " with amount " . $sms['price'];
        $credit_out = $this->CreditModel->credit_out($sms['shop_id'],$sms['price'],$remark);

        if($template_id == 1){
            return "Hi %customer_name%,". $sms['shop_name'] . " is ".$sms['discount_offer'].". ".$sms['call_to_action']."\n".$sms['shop_name']." from Webi";
        }
        if($template_id == 2){
            return "". $sms['need'] . ". ". $sms['discount_offer'] . ". ". $sms['discount_offer'] . "
            \n".$sms['shop_name']." from Webi";

        }
        if($template_id == 3){
            return "Hi %customer_name%. ". $sms['need'] . ". ". $sms['shop_name'] . " is ". $sms['discount_offer'] . ". ". $sms['call_to_action'] . "
            \n".$sms['shop_name']." from Webi";
        }
    }
    function startsWith ($string, $startString) 
    { 
        $len = strlen($startString); 

        return (substr($string, 0, $len) === $startString); 
    } 
    public function send_sms_to_user($sms_id){

        $where = [
            'sms_sent.sms_id'=> $sms_id
        ];
        $sms_sent = $this->SmsSentModel->getWhere($where);
        $url= 'https://www.sms123.net/api/send.php?';
        $apikey = '6e6962f9c1a409653c301a977af190cb';
        $sms_template = $this->sms_template($sms_id);
        // $this->SmsModel->updateWhere(['sms.sms_id' => $sms_id] , ['is_sent' => 1]);
        foreach($sms_sent as $row){

            $recipients = $row['contact'];
            $contact = $this->validate_contact($row['contact']);
            $sms_msg = str_replace("%customer_name%",$contact,$sms_template);
            $sms_msg = "RM0.00 Webieasy.com " . $sms_msg;
            $sms_msg = rawurlencode(stripslashes($sms_msg)) ;
            $url = $url . "apiKey=" . $apikey . "&recipients=" . $recipients . "&messageContent=" . $sms_msg; 
            // $this->
            // return redirect()->to(($url));
            // $ch = curl_init();
            // $headers = array(
            // 'Accept: application/json',
            // 'Content-Type: application/json',
        
            // );
            // curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            // curl_setopt($ch, CURLOPT_HEADER, 0);
            // // $body = '{}';
            // // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
            // // curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // // curl_setopt($ch, CURLOPT_TIMEOUT, 30);

            // $result = curl_exec($ch);
            // // die(json_encode([
            //     'result' => $result,
            // ]));
            // Timeout in seconds
            $opts = array('http' =>
                array(
                    'method'  => 'GET',
                    'header'  => 'Content-type: application/json',
                )
            );
            $context  = stream_context_create($opts);
            $result = file_get_contents($url, false, $context);
            $result = json_encode($result);
            $data = [
                'sms_id' => $sms_id,
                'response' => $result,
            ];
            $this->SmsresponseModel->insertNew($data);

        }
    }
    public function send_sms(){
        $where = [
            'sms.sms_id'=> $_POST['sms_id']
        ];
        $sms = $this->SmsModel->getWhere($where)[0];
        $balance = $this->CreditModel->get_balance($this->shop_id);
        if($sms['is_approved'] == 0){
            die(json_encode([
                'status' => false,
                'message' => 'The message not yet approved yet'
            ]));
        }
        if($sms['is_approved'] == 2){
            die(json_encode([
                'status' => false,
                'message' => 'The message is rejected'
            ]));
        }
        if($sms['is_sent'] == 1){
            die(json_encode([
                'status' => false,
                'message' => 'The message already sent'
            ]));
        }
        if($sms['price'] > $balance){
            die(json_encode([
                'status' => false,
                'message' => 'Balance not enought , please top up your sms credit'
            ]));
        }else{
            $this->send_sms_to_user($_POST['sms_id']);
            die(json_encode([
                'status' => true,
                'message' => 'Sended'
            ]));
        }
    }

    public function detail($sms_id)
    {
        $where = [
            'sms_id' => $sms_id,
        ];
        $sms = $this->SmsModel->getWhere($where);
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop($sms[0]['shop_id']);
        }
        // $this->show_404_if_empty($admin);
        $where = [
            'sms_sent.sms_id' => $sms_id,
        ];
        $sms_sent = $this->SmsSentModel->getWhere($where);
        $this->pageData['sms_sent'] = $sms_sent;
        $where = [
            'credit_top_up.shop_id' => $this->shop_id
        ];
        $this->pageData['sms_top_up'] = $this->CreditTopUpModel->getWhere($where);
        $this->pageData['balance'] = $this->CreditModel->get_balance($this->shop_id);

        $sms[0]['template'] = $this->get_template($sms[0]['template_id']);

        $this->pageData['sms'] = $sms[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/sms/detail');
        echo view('admin/footer');
    }

    public function edit($sms_id)
    {
        $where = [
            'sms_id' => $sms_id,
        ];
        
        $this->pageData['sms'] = $this->SmsModel->getWhere($where)[0];
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['sms']['shop_id']
            );
        }
        $where = [
            'order_customer.shop_id' => $this->shop_id,
        ];
        $order_customer = $this->OrderCustomerModel->getWhereContact($where);

        $this->pageData['order_customer'] = $order_customer;
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $where = [
                    'sms_id' => $sms_id,
                ];
                $data = [
                    'call_to_action' => $this->request->getPost('call_to_action'),
                    'need' => $this->request->getPost('need'),
                    'discount_offer' => $this->request->getPost('discount_offer'),
                    'template_id' => $this->request->getPost('template_id'),
                    'shop_id' => $this->shop_id,
                    'created_date' => date('Y-m-d H:i:s'),
                    'created_by' => session()->get('login_id'),
                ];
                
                $this->SmsModel->updateWhere($where, $data);

               
                $this->SmsSentModel->hardDeleteWhere($where);

                if(!empty($_POST['customer_id'])){


                    if($_POST['customer_id'][0] != "all"){
                        foreach($_POST['customer_id'] as $row){
                            $data_customer = [
                                'sms_id' => $sms_id,
                                'is_sent' => 0,
                                'customer_id' => $row, 
                                'created_by' => session()->get('login_id'),
                                'created_date' => date('Y-m-d H:i:s'),
                            ];
                            $this->SmsSentModel->insertNew($data_customer);
                        }
                    }else{
                        foreach($order_customer as $row){
                            $data_customer = [
                                'sms_id' => $sms_id,
                                'is_sent' => 0,
                                'customer_id' => $row['contact'], 
                                'created_by' => session()->get('login_id'),
                                'created_date' => date('Y-m-d H:i:s'),
                            ];
                            $this->SmsSentModel->insertNew($data_customer);
                        }
                    }
                }
                $this->update_sms_price($sms_id);

                return redirect()->to(
                    base_url('sms/detail/' . $sms_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/sms/edit');
        echo view('admin/footer');
    }

    public function delete($sms_id)
    {
        $this->SmsModel->softDelete($sms_id);

        return redirect()->to(base_url('sms', 'refresh'));
    }
}
