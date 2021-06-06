<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\ShopRateModel;

class ShopRate extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->ShopRateModel = new ShopRateModel();
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

    public function index()
    {
        $where = [
            'shop_id' => $this->shop_id,
        ];
        $shoprate = $this->ShopRateModel->getWhere($where);
        $this->pageData['shoprate'] = $shoprate;

        echo view('admin/header', $this->pageData);
        echo view('admin/shoprate/all');
        echo view('admin/footer');
    }

    public function add()
    {
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                
                $data = [
                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'icons' => $this->request->getPost('icons'),

                    'shop_id' => $this->shop_id,
                    'created_by' => session()->get('login_id'),
                ];
                
                // $image = $this->upload_image_base('banner');

                // if($image != ""){
                //     $data['banner'] = $image;
                // }
          
                // $this->debug($data);
                // dd($data);

                $this->ShopRateModel->insertNew($data);

                return redirect()->to(base_url('shoprate', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/shoprate/add');
        echo view('admin/footer');
    }

    public function detail($shoprate_id)
    {
        $where = [
            'shoprate_id' => $shoprate_id,
        ];
        $shoprate = $this->ShopRateModel->getWhere($where);
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop($shoprate[0]['shop_id']);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['shoprate'] = $shoprate[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/shoprate/detail');
        echo view('admin/footer');
    }

    public function edit($shoprate_id)
    {
        $where = [
            'shoprate_id' => $shoprate_id,
        ];

        $this->pageData['shoprate'] = $this->ShopRateModel->getWhere($where)[0];
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['shoprate']['shop_id']
            );
        }
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'icons' => $this->request->getPost('icons'),
                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                // $image = $this->upload_image_base('banner');

                // if($image != ""){
                //     $data['banner'] = $image;
                // }
          
          

                $this->ShopRateModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('shoprate/detail/' . $shoprate_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/shoprate/edit');
        echo view('admin/footer');
    }

    public function delete($shoprate_id)
    {
        $this->ShopRateModel->softDelete($shoprate_id);

        return redirect()->to(base_url('shoprate', 'refresh'));
    }
}
    