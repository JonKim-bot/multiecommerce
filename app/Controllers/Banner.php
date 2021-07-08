<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\BannerModel;

class Banner extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->BannerModel = new BannerModel();
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
                $get['banner.full_name'] = $get['full_name'];
            }
            if (!empty($get['email'])) {
                $get['banner.email'] = $get['email'];
            }
          
            if (!empty($get['contact'])) {
                $get['banner.contact'] = $get['contact'];
            }
            unset($get['contact']);

            unset($get['email']);
            unset($get['full_name']);

            unset($get['shop']);
            unset($get['page']);
            $filter = $get;
        }

   
        $banner = $this->BannerModel->getAll(10, $page, $filter);
        $this->pageData['page'] = $banner['pagination'];
        $this->pageData['start_no'] = $banner['start_no'];
        $banner = $banner['result'];
        // $this->debug($where);
        // $this->debug($banner);
        // $this->debug($banner);

        $this->pageData['banner'] = $banner;

        echo view('admin/header', $this->pageData);
        echo view('admin/banner/all_admin');
        echo view('admin/footer');
    }

    public function index()
    {
        if($this->isMerchant == false){
            $this->indexadmin();
            return;
        }
        $where = [
            'shop_id' => $this->shop_id,
        ];
        $banner = $this->BannerModel->getWhere($where);
        $this->pageData['banner'] = $banner;

        echo view('admin/header', $this->pageData);
        echo view('admin/banner/all');
        echo view('admin/footer');
    }

    public function add()
    {
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                    $file = $this->request->getFile('banner');
                    $new_name = $file->getRandomName();
                    $banner = $file->move('./public/images/banner/', $new_name);
                    if ($banner) {
                        $banner = '/public/images/banner/' . $new_name;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

                $data = [
                    'banner' => $banner,
                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'shop_id' => $this->shop_id,
                    'created_by' => session()->get('login_id'),
                ];

                // $this->debug($data);
                // dd($data);

                $this->BannerModel->insertNew($data);

                return redirect()->to(base_url('banner', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/banner/add');
        echo view('admin/footer');
    }

    public function detail($banner_id)
    {
        $where = [
            'banner_id' => $banner_id,
        ];
        $banner = $this->BannerModel->getWhere($where);
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop($banner[0]['shop_id']);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['banner'] = $banner[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/banner/detail');
        echo view('admin/footer');
    }

    public function edit($banner_id)
    {
        $where = [
            'banner_id' => $banner_id,
        ];

        $this->pageData['banner'] = $this->BannerModel->getWhere($where)[0];

        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['banner']['shop_id']
            );
        }
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'created_by' => session()->get('login_id'),
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                    $file = $this->request->getFile('banner');
                    $new_name = $file->getRandomName();
                    $banner = $file->move('./public/images/banner/', $new_name);
                    if ($banner) {
                        $banner = '/public/images/banner/' . $new_name;
                        $data['banner'] = $banner;
                    }
                }

                $this->BannerModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('banner/detail/' . $banner_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/banner/edit');
        echo view('admin/footer');
    }

    public function delete($banner_id)
    {
        $this->BannerModel->softDelete($banner_id);

        return redirect()->to(base_url('banner', 'refresh'));
    }
}
