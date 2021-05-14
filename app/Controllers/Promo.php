<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\OrdersModel;
use App\Models\PromoModel;

class Promo extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->PromoModel = new PromoModel();
        $this->OrdersModel = new OrdersModel();

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
    public function get_promo($data){
        if($_POST['discount_type_id'] == 1){
            $data['amount'] = $_POST['amount'];
        }else{
            $data['percent'] = $_POST['percent'];
        }
      
        return $data;
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
                    'is_active' => 1,
                    'minimum' => $this->request->getPost('minimum'),
                    "discount_type_id" => $this->request->getPost("discount_type_id"),
                    'shop_id' => $this->shop_id,
                    'created_by' => session()->get('login_id'),
                ];

                $data= $this->get_promo($data);

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

        $where = [
            'orders.promo_id' => $promo_id,
        ];
        $order_with_promo = $this->OrdersModel->getWhere($where);

        $this->pageData['order_with_promo'] = $order_with_promo;

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
                    'is_active' => 1,
                    'minimum' => $this->request->getPost('minimum'),
                    "discount_type_id" => $this->request->getPost("discount_type_id"),
                    'shop_id' => $this->shop_id,
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                $data= $this->get_promo($data);

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
