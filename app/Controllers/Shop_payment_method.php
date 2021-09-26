<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\ShopPaymentMethodModel;
use App\Models\PaymentMethodModel;
use App\Models\ShopModel;
use App\Models\ShopFunctionModel;

class Shop_payment_method extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->PaymentMethodModel = new PaymentMethodModel();
        $this->ShopModel = new ShopModel();
        $this->ShopFunctionModel = new ShopFunctionModel();

        $this->ShopPaymentMethodModel = new ShopPaymentMethodModel();
        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            echo "<script>location.href='" .
                base_url() .
                "/access/login';</script>";
        }
        if (session()->get('admin_data')['type'] == 'MERCHANT') {
            //  redirect()->to(base_url('access/login/'));
            $this->isMerchant = true;
            $shop_data = session()->get('shop_data');
            $this->shop_data = $shop_data;
            $shop_function = $this->getShopFunction();
            $this->shop_function = $shop_function;
          
        }

    }

    // public function change_status($payment_method_id){
    //     $where = [
    //         'payment_method_id' => $payment_method_id

    //     ];
    //     $payment_method = $this->PaymentMethodModel->getWhere($where)[0];
    //     if($payment_method['active'] == 1){
    //         $status = 0;
    //     }else{
    //         $status = 1;
    //     }
    //     $this->PaymentMethodModel->updateWhere($where,['active' => $status]);

    //     return redirect()->to(base_url('shop_payment_method/', "refresh"));

    // }
    public function change_status($payment_method_id)
    {
        $where = [
            'payment_method_id' => $payment_method_id,
            'shop_id' => $this->shop_id,
        ];
        $shop_payment_method = $this->ShopPaymentMethodModel->getWhere($where);
        if (!empty($shop_payment_method)) {
            $this->ShopPaymentMethodModel->hardDelete(
                $shop_payment_method[0]['shop_payment_method_id']
            );
        } else {
            $this->ShopPaymentMethodModel->insertNew($where);
        }

        return redirect()->to(base_url('shop_payment_method/', 'refresh'));
    }
    public function index()
    {
        // foreach($this->ShopModel->getAll() as $row){

        //     $where = [
        //         'shop_id' => $row['shop_id']
        //         // 'active' =>'1',
        //     ];
        //     $shop_payment_method = $this->ShopPaymentMethodModel->getWhere($where);
        //     if($shop_payment_method == [] ){
        //         foreach($this->PaymentMethodModel->getAll() as $rowpayment){
        //             $data = [
        //                 'shop_id' => $row['shop_id'],
        //                 'payment_method_id' => $rowpayment['payment_method_id']
        //             ];
        //             $this->ShopPaymentMethodModel->insertNew($data);
        //         }
        //     }
        // }
        $shop_function = $this->shop_function;
        $where = [
            'shop_id' => $this->shop_id,
            // 'active' =>'1',
        ];
        $shop_payment_method = $this->ShopPaymentMethodModel->getWhere($where);
        $shop_payment_method = array_column(
            $shop_payment_method,
            'payment_method_id'
        );
        // $this->debug($shop_payment_method);
        $this->pageData['shop_payment_method'] = $shop_payment_method;

        if($this->check_exist_function(9,$shop_function)){
           
            $payment_method = $this->PaymentMethodModel->getAll();
        }else{
            $where = [
                'payment_method.payment_method_id !=' => 4 
            ];
            $payment_method = $this->PaymentMethodModel->getWhere($where);

        }

        
        $this->pageData['payment_method'] = $payment_method;
        //
        echo view('admin/header', $this->pageData);
        echo view('admin/shop_payment_method/all');
        echo view('admin/footer');
    }
}
