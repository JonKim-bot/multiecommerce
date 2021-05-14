<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\PromoModel;

class Promo extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->PromoModel = new PromoModel();
        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            // echo "<script>location.href='".base_url()."/access/login';</script>";
        }
    }

    public function change_status($promo_id)
    {
        $where = [
            'promo_id' => $promo_id,
        ];
        $promo = $this->PromoModel->getWhere($where)[0];
        if ($promo['is_active'] == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $this->PromoModel->updateWhere($where, ['is_active' => $status]);

        return redirect()->to(base_url('promo/detail/' . $promo_id, 'refresh'));
    }
    public function index()
    {
        $where = [
            'shop_id' => $this->shop_id,
        ];
        $promo = $this->PromoModel->getWhere($where);
        $this->pageData['promo'] = $promo;

        echo view('admin/header', $this->pageData);
        echo view('admin/promo/all');
        echo view('admin/footer');
    }

    public function add()
    {
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                $data = [
                    'code' => $this->request->getPost('code'),
                    'amount' => $this->request->getPost('amount'),
                    'is_active' => 1,
                    'minimum' => $this->request->getPost('minimum'),

                    'shop_id' => $this->shop_id,
                    'created_by' => session()->get('login_id'),
                ];

                // $this->debug($data);
                // dd($data);

                $this->PromoModel->insertNew($data);

                return redirect()->to(base_url('promo', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/promo/add');
        echo view('admin/footer');
    }

    public function detail($promo_id)
    {
        $where = [
            'promo_id' => $promo_id,
        ];
        $promo = $this->PromoModel->getWhere($where);
        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop($promo[0]['shop_id']);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['promo'] = $promo[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/promo/detail');
        echo view('admin/footer');
    }

    public function edit($promo_id)
    {
        $where = [
            'promo_id' => $promo_id,
        ];

        $this->pageData['promo'] = $this->PromoModel->getWhere($where)[0];
        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['promo']['shop_id']
            );
        }
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'code' => $this->request->getPost('code'),
                    'amount' => $this->request->getPost('amount'),
                    'minimum' => $this->request->getPost('minimum'),

                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                $this->PromoModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('promo/detail/' . $promo_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/promo/edit');
        echo view('admin/footer');
    }

    public function delete($promo_id)
    {
        $this->PromoModel->softDelete($promo_id);

        return redirect()->to(base_url('promo', 'refresh'));
    }
}
