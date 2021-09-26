<?php


namespace App\Controllers;

use App\Core\BaseController;
use App\Models\PointModel;
use App\Models\CreditModel;
use App\Models\CreditTopUpModel;
use App\Models\WalletModel;
use App\Models\WalletTopupModel;

class Transaction extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->WalletModel = new WalletModel();
        $this->WalletTopupModel = new WalletTopupModel();

        $this->PointModel = new PointModel();
        $this->CreditModel = new CreditModel();
        $this->CreditTopUpModel = new CreditTopUpModel();

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
                $get['customer.full_name'] = $get['full_name'];
            }
            if (!empty($get['email'])) {
                $get['customer.email'] = $get['email'];
            }
          
            if (!empty($get['contact'])) {
                $get['customer.contact'] = $get['contact'];
            }
            unset($get['contact']);

            unset($get['email']);
            unset($get['full_name']);

            unset($get['shop']);
            unset($get['page']);
            $filter = $get;
        }

   
        $customer = $this->PointModel->get_transaction(10, $page, $filter);
        $this->pageData['page'] = $customer['pagination'];
        $this->pageData['start_no'] = $customer['start_no'];
        $customer = $customer['result'];
        // $this->debug($where);
        // $this->debug($customer);
        // $this->debug($customer);

        $this->pageData['transaction'] = $customer;

        echo view('admin/header', $this->pageData);
        echo view('admin/wallet/all_admin');
        echo view('admin/footer');
    }
    public function index()
    {
        if($this->isMerchant == false){
            $this->indexadmin();
            return;
        }
        $where = [
            'customer.shop_id' => $this->shop_id
        ];
        $record = $this->PointModel->get_transaction_by_customer($where);
        $this->pageData['transaction'] = $record;

        echo view('admin/header', $this->pageData);
        echo view('admin/wallet/all');
        echo view('admin/footer');
    }
    
    public function wallet()
    {
      
        $where = [
            'customer.shop_id' => $this->shop_id
        ];
        $record = $this->WalletModel->get_transaction_by_customer($where);
        
        $this->pageData['transaction'] = $record;

        echo view('admin/header', $this->pageData);
        echo view('admin/wallet/all');
        echo view('admin/footer');
    }

    public function topup()
    {
      
        $where = [
            'wallet_topup.shop_id' => $this->shop_id,
            'wallet_topup.is_paid' => 1,

        ];
        $record = $this->WalletTopupModel->get_transaction_by_customer($where);
        $this->pageData['transaction'] = $record;

        echo view('admin/header', $this->pageData);
        echo view('admin/wallet/wtopup');
        echo view('admin/footer');
    }

    public function approve($credit_topup_id){

        $where = array(
            'credit_top_up.credit_top_up_id' => $credit_topup_id,
        );
        $credit_topup = $this->CreditTopUpModel->getWhere($where)[0];

        $data = array(
            'is_approved' => 1,
            'approval_date' => date('Y-m-d h:i:s'),

        );
        $this->CreditTopUpModel->updateWhere($where, $data);
        $remarks = 'Sms credit top up for ' . $credit_topup['shop_name'] . " with amount " . $credit_topup['amount'];
        $this->CreditModel->credit_in($credit_topup['shop_id'],$credit_topup['amount'],$remarks);
        return redirect()->to(base_url($_SERVER['HTTP_REFERER'], 'refresh'));

    }

    public function reject($credit_topup_id){

        $where = array(
            'credit_top_up.credit_top_up_id' => $credit_topup_id,
        );
        $data = array(
            'is_approved' => 2,
            'approval_date' => date('Y-m-d h:i:s'),
        );
        $this->CreditTopUpModel->updateWhere($where, $data);
   
        return redirect()->to(base_url($_SERVER['HTTP_REFERER'], 'refresh'));
    }

    public function credittopup()
    {
       
        $this->validate_merchant();
        $record = $this->CreditTopUpModel->getAll();
        
        $this->pageData['wallet'] = $record;

        echo view('admin/header', $this->pageData);
        echo view('admin/wallet/topup');
        echo view('admin/footer');
    }
    public function record()
    {
        $session = session();

        
        $user_voucher = $this->UserVoucherModel->getWhere(['user_voucher.main_voucher_id' => 0]);

        if ($session->get("login_type") == "MERCHANT") {
            $this->pageData['merchants'] = $this->MerchantModel->getWhere(array(
                "merchant_id" => $session->get("login_id")
            ));
        } else {
            // $this->pageData['merchants'] = $this->MerchantModel->getAllUser();
            die();
        }

        $this->pageData['get_merchant_payments'] = $this->MerchantPaymentModel->get_by_merchant($session->get('login_id'));
        $this->pageData['outstanding'] = $this->MerchantPaymentModel->get_outstanding_by_merchant($session->get('login_id'));

        $this->pageData['user_voucher'] = $user_voucher;
        // die(var_dump($this->pageData));
        // $this->debug($user_voucher);

        // echo "<pre>";
        // var_dump($this->pageData);
        // echo "</pre>";
        // die();
        echo view('admin/header', $this->pageData);
        echo view('admin/record/merchant_record');
        echo view('admin/footer');
    }

    public function platform_record()
    {
        $session = session();


        if ($session->get("login_type") == "MERCHANT") {
            redirect("transaction/record", 'refresh');
        }


        echo view('admin/header', $this->pageData);
        echo view('admin/record/platform_record');
        echo view('admin/footer');
    }

    function ajax_platform_report()
    {
        // $_POST = array(
        //     "merchant_id" => 6,
        //     'start_date' => '2-5-2021'
        // );
        // $_POST['start_date'] = '2-5-2021';
        if ($_POST) {
            $sales = $this->MerchantModel->get_platform_report($_POST['start_date']);
            $this->page_data['merchants'] = $sales['merchants'];
            $this->page_data['dates'] = $sales['dates'];
            $this->page_data['total_sales'] = $sales['total_sales'];
            echo view("admin/record/ajax_platform_record", $this->page_data);
        }
    }

    function ajax_merchant_voucher_report()
    {
        $session = session();

        if ($_POST) {
            $sales = $this->MerchantModel->get_merchant_voucher_report(session()->get("login_id"), $_POST['start_date']);
            $this->page_data['records'] = $sales;
            echo view("admin/record/ajax_merchant_voucher_report", $this->page_data);
        }
    }

    function platform_compiled_report()
    {
        $session = session();


        if ($session->get("login_type") == "MERCHANT") {
            redirect("transaction/record", 'refresh');
        }


        echo view('admin/header', $this->pageData);
        echo view('admin/record/platform_compiled_report');
        echo view('admin/footer');
    }

    function ajax_platform_compiled_report()
    {
        // $_POST = array(
        //     "merchant_id" => 6,
        //     'start_date' => '2-5-2021'
        // );
        // $_POST['start_date'] = '2-5-2021';
        if ($_POST) {
            $sales = $this->MerchantModel->get_platform_report($_POST['start_date']);
            $this->page_data['merchants'] = $sales['merchants'];
            $this->page_data['dates'] = $sales['dates'];
            $this->page_data['total_sales'] = $sales['total_sales'];
            echo view("admin/record/ajax_platform_compiled_report", $this->page_data);
        }
    }

    function ajax_merchant_report()
    {
        $session = session();

        if ($_POST) {
            $sales = $this->MerchantModel->get_report(session()->get("login_id"), $_POST['start_date']);
            $this->page_data['records'] = $sales;
            echo view("admin/record/ajax_merchant_report", $this->page_data);
        }
    }

    // function list($status) {
    //     $page = 1;
    //     $filter = array();

    //     if ($_GET) {
    //         $get = $this->request->getGet();

    //         if (!empty($get['page'])) {
    //             $page = $get['page'];
    //         }
    //         if (!empty($get['status_text'])) {
    //             $get['IF(status = 1, "APPROVED", (IF(status = 2, "REJECTED", "PENDING")))'] = $get['status_text'];
    //         }
    //         if (!empty($get['created_date'])) {
    //             $get['transaction.created_date'] = $get['created_date'];
    //         }

    //         unset($get['page']);
    //         unset($get['created_date']);
    //         unset($get['status_text']);
    //         $filter = $get;
    //     }

    //     $where = array(
    //         "transaction_type_id" => 1,
    //         "status" => $status,
    //     );

    //     $user = $this->TransactionModel->getWhere($where, 10, $page, $filter);
    //     $this->pageData['transaction'] = $user['result'];
    //     $this->pageData['page'] = $user['pagination'];
    //     $this->pageData['start_no'] = $user['start_no'];
    //     $this->pageData['status'] = $status;

    //     echo view('admin/header', $this->pageData);
    //     echo view('admin/transaction/all');
    //     echo view('admin/footer');
    // }

    // public function approve($transaction_id)
    // {
    //     if ($_POST) {
    //         $input = $this->request->getPost();

    //         $where = array(
    //             "transaction_id" => $transaction_id,
    //         );

    //         $transaction = $this->TransactionModel->getWhere($where);
    //         if (empty($transaction)) {
    //             $this->show404();
    //         }
    //         $transaction = $transaction[0];

    //         $where = array(
    //             "user_id" => $transaction['user_id'],
    //         );

    //         $user = $this->UserModel->getWhere($where);
    //         if (empty($user)) {
    //             $this->show404();
    //         }
    //         $user = $user[0];

    //         $where = array(
    //             "transaction_id" => $transaction_id,
    //         );

    //         $data = array(
    //             "status" => 1,
    //             "accept_amount" => $input['amount'],
    //         );

    //         $this->TransactionModel->updateWhere($where, $data);
    //         $uprank_user_id = $this->TransactionModel->updateTier($transaction['user_id']);
    //         if ($uprank_user_id != "" AND $uprank_user_id != 0) {
    //             $where = array(
    //                 "user_id" => $uprank_user_id
    //             );

    //             $uprank_user = $this->UserModel->getWhere($where)[0];

    //             $this->TierModel->updateTier($uprank_user['user_id'], $uprank_user['tier']);
    //         }
    //         $this->CommissiontierModel->giveCommissiontier($transaction);

    //         $where = array(
    //             "user_id" => $user['user_id'],
    //         );

    //         $data = array(
    //             "points" => $user['points'] + ($input['amount'] / 1000),
    //         );

    //         $this->UserModel->updateWhere($where, $data);

    //         // see if there is any referral
    //         if ($user['referral_id'] != 0) {
    //             $this->LovingRewardsModel->debit($user['referral_id'],
    //                 ($input['amount'] * 0.1),
    //                 "Referral user #" . $user['user_id'],
    //                 $transaction_id
    //             );
    //         }

    //         return redirect()->to(base_url('transaction/list/1', "refresh"));
    //     }
    // }

    // public function reject($transaction_id)
    // {
    //     $where = array(
    //         "transaction_id" => $transaction_id,
    //     );

    //     $data = array(
    //         "status" => 2,
    //     );

    //     $this->TransactionModel->updateWhere($where, $data);

    //     return redirect()->to(base_url('transaction/list/2', "refresh"));
    // }

    // public function give_commissiontier()
    // {
    //     $where = array(
    //         "transaction_type_id" => 1,
    //         "status" => 1,
    //     );

    //     $transaction = $this->TransactionModel->getWhere($where);
    //     foreach ($transaction as $row) {
    //         $this->CommissiontierModel->giveCommissiontier($row);
    //     }
    // }
}
