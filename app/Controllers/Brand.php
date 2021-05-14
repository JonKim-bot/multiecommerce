<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\BrandModel;

class Brand extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->BrandModel = new BrandModel();
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
        $brand = $this->BrandModel->getWhere($where);
        $this->pageData['brand'] = $brand;

        echo view('admin/header', $this->pageData);
        echo view('admin/brand/all');
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

                $this->BrandModel->insertNew($data);

                return redirect()->to(base_url('brand', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/brand/add');
        echo view('admin/footer');
    }

    public function detail($brand_id)
    {
        $where = [
            'brand_id' => $brand_id,
        ];
        $brand = $this->BrandModel->getWhere($where);
        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop($brand[0]['shop_id']);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['brand'] = $brand[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/brand/detail');
        echo view('admin/footer');
    }

    public function edit($brand_id)
    {
        $where = [
            'brand_id' => $brand_id,
        ];

        $this->pageData['brand'] = $this->BrandModel->getWhere($where)[0];
        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['brand']['shop_id']
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
                    'created_by' => session()->get('login_id'),
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                // $image = $this->upload_image_base('banner');

                // if($image != ""){
                //     $data['banner'] = $image;
                // }
          
          

                $this->BrandModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('brand/detail/' . $brand_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/brand/edit');
        echo view('admin/footer');
    }

    public function delete($brand_id)
    {
        $this->BrandModel->softDelete($brand_id);

        return redirect()->to(base_url('brand', 'refresh'));
    }
}
