<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\VoucherModel;
use App\Models\CustomerVoucherModel;

class Voucher extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->VoucherModel = new VoucherModel();
        $this->CustomerVoucherModel = new CustomerVoucherModel();

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
        $this->validate_function(1,$shop_function);

    }

    public function index()
    {
        $where = [
            'shop_id' => $this->shop_id,
        ];
        $voucher = $this->VoucherModel->getWhere($where);
        $this->pageData['voucher'] = $voucher;

        echo view('admin/header', $this->pageData);
        echo view('admin/voucher/all');
        echo view('admin/footer');
    }

    public function change_status($voucher_id){
        $where = [
            'voucher_id' => $voucher_id

        ];
        $voucher = $this->VoucherModel->getWhere($where)[0];
        if($voucher['is_active'] == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        $this->VoucherModel->updateWhere($where,['is_active' => $status]);

        return redirect()->to(base_url('voucher' ,"refresh"));

    }
    public function add()
    {
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                $banner = $this->upload_image('banner');
                $data = [
                    'voucher' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'redeem_point' => $this->request->getPost('redeem_point'),
                    'valid_until' => $this->request->getPost('valid_until'),
                    'redeem_instruction' => $this->request->getPost('redeem_instruction'),
                    'shop_id' =>$this->shop_id,
                    'created_by' => session()->get('login_id'),
                ];
                if(!empty($banner)){
                    $data['banner'] = $banner;
                }
                $this->VoucherModel->insertNew($data);

                return redirect()->to(base_url('voucher', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/voucher/add');
        echo view('admin/footer');
    }

    public function detail($voucher_id)
    {
        $where = [
            'voucher_id' => $voucher_id,
        ];
        $voucher = $this->VoucherModel->getWhere($where);
        $where = [
            'customer_voucher.voucher_id' => $voucher_id,
        ];
        $c_voucher = $this->CustomerVoucherModel->getWhere($where);

        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop($voucher[0]['shop_id']);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['voucher'] = $voucher[0];
        $this->pageData['customer_voucher'] = $c_voucher;

        echo view('admin/header', $this->pageData);
        echo view('admin/voucher/detail');
        echo view('admin/footer');
    }

    public function edit($voucher_id)
    {
        $where = [
            'voucher_id' => $voucher_id,
        ];

        $this->pageData['voucher'] = $this->VoucherModel->getWhere($where)[0];
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['voucher']['shop_id']
            );
        }
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
           
                $banner = $this->upload_image('banner');
                $data = [
                    'voucher' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'redeem_point' => $this->request->getPost('redeem_point'),
                    'valid_until' => $this->request->getPost('valid_until'),
                    'redeem_instruction' => $this->request->getPost('redeem_instruction'),
                    'shop_id' =>$this->shop_id,
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

            
                if(!empty($banner)){
                    $data['banner'] = $banner;
                }

                $this->VoucherModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('voucher/detail/' . $voucher_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/voucher/edit');
        echo view('admin/footer');
    }

    public function delete($voucher_id)
    {
        $this->VoucherModel->softDelete($voucher_id);

        return redirect()->to(base_url('voucher', 'refresh'));
    }
}
