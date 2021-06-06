<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\GiftModel;

class Gift extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->GiftModel = new GiftModel();
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
        $gift = $this->GiftModel->getWhere($where);
        $this->pageData['gift'] = $gift;

        echo view('admin/header', $this->pageData);
        echo view('admin/gift/all');
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
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop($gift[0]['shop_id']);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['gift'] = $gift[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/gift/detail');
        echo view('admin/footer');
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

    public function delete($gift_id)
    {
        $this->GiftModel->softDelete($gift_id);

        return redirect()->to(base_url('gift', 'refresh'));
    }
}
