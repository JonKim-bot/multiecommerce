<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\GiftModel;
use App\Models\CustomerGiftModel;

class Gift extends BaseController
{
    public function __construct()
    {

        $this->pageData = [];

        $this->GiftModel = new GiftModel();
        $this->CustomerGiftModel = new CustomerGiftModel();

        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            echo "<script>location.href='" .
                base_url() .
                "/access/login';</script>";
        }
        $shop_data = session()->get('shop_data');
        $shop_function = $this->getShopFunction($shop_data['shop_id']);
        $this->shop_function = $shop_function;
        $this->validate_function(2,$shop_function);
    }

    public function index()
    {
        $where = [
            'shop_id' => $this->shop_id,
        ];
        $gift = $this->GiftModel->getWhere($where);
        $this->pageData['gift'] = $gift;

        echo view('admin/header', $this->pageData);
        echo view('admin/gift/all');
        echo view('admin/footer');
    }

    public function change_status($gift_id){
        $where = [
            'gift_id' => $gift_id

        ];
        $gift = $this->GiftModel->getWhere($where)[0];
        if($gift['is_active'] == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        $this->GiftModel->updateWhere($where,['is_active' => $status]);

        return redirect()->to(base_url('gift' ,"refresh"));

    }
    public function add()
    {
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                $banner = $this->upload_image('banner');
                $data = [
                    'gift' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'order_amount' => $this->request->getPost('order_amount'),
                    'valid_until' => $this->request->getPost('valid_until'),
                    'shop_id' =>$this->shop_id,
                    'created_by' => session()->get('login_id'),
                ];
                if(!empty($banner)){
                    $data['banner'] = $banner;
                }
                $this->GiftModel->insertNew($data);

                return redirect()->to(base_url('gift', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/gift/add');
        echo view('admin/footer');
    }

    public function detail($gift_id)
    {
        $where = [
            'gift_id' => $gift_id,
        ];
        $gift = $this->GiftModel->getWhere($where);
        $where = [
            'customer_gift.gift_id' => $gift_id,
        ];
        $c_gift = $this->CustomerGiftModel->getWhere($where);

        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop($gift[0]['shop_id']);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['gift'] = $gift[0];
        $this->pageData['customer_gift'] = $c_gift;

        echo view('admin/header', $this->pageData);
        echo view('admin/gift/detail');
        echo view('admin/footer');
    }
    public function approve($customer_gift_id){
        $where = [
            'customer_gift.customer_gift_id' => $customer_gift_id

        ];
        $gift = $this->CustomerGiftModel->getWhere($where)[0];
        if($gift['is_approve'] == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        $this->CustomerGiftModel->updateWhere($where,['is_approve' => $status]);

        return redirect()->to(base_url('gift/detail/' . $gift['gift_id'], "refresh"));

    }

    public function edit($gift_id)
    {
        $where = [
            'gift_id' => $gift_id,
        ];

        $this->pageData['gift'] = $this->GiftModel->getWhere($where)[0];
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['gift']['shop_id']
            );
        }
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
           
                $banner = $this->upload_image('banner');
                $data = [
                    'gift' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'order_amount' => $this->request->getPost('order_amount'),
                    'valid_until' => $this->request->getPost('valid_until'),
                    'shop_id' =>$this->shop_id,
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

            
                if(!empty($banner)){
                    $data['banner'] = $banner;
                }

                $this->GiftModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('gift/detail/' . $gift_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/gift/edit');
        echo view('admin/footer');
    }
   public function delete_customer_gift($customer_gift_id)
    {
        $where = [
            'customer_gift.customer_gift_id' => $customer_gift_id

        ];
        $gift = $this->CustomerGiftModel->getWhere($where)[0];
        $this->CustomerGiftModel->hardDelete($customer_gift_id);

        return redirect()->to(base_url('gift/detail/' . $gift['gift_id'], "refresh"));
    }
    public function delete($gift_id)
    {
        $this->GiftModel->softDelete($gift_id);

        return redirect()->to(base_url('gift', 'refresh'));
    }
}
