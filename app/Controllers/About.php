<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\AboutModel;

class About extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->AboutModel = new AboutModel();
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
        $about = $this->AboutModel->getWhere($where);
        $this->pageData['about'] = $about;

        echo view('admin/header', $this->pageData);
        echo view('admin/about/all');
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
                    $about = $file->move('./public/images/about/', $new_name);
                    if ($about) {
                        $about = '/public/images/about/' . $new_name;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

                $data = [
                    'banner' => $about,
                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'shop_id' => $this->shop_id,
                    'created_by' => session()->get('login_id'),
                ];

                // $this->debug($data);
                // dd($data);

                $this->AboutModel->insertNew($data);

                return redirect()->to(base_url('about', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/about/add');
        echo view('admin/footer');
    }

    public function detail($about_id)
    {
        $where = [
            'about_id' => $about_id,
        ];
        $about = $this->AboutModel->getWhere($where);
        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop($about[0]['shop_id']);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['about'] = $about[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/about/detail');
        echo view('admin/footer');
    }

    public function edit($about_id)
    {
        $where = [
            'about_id' => $about_id,
        ];

        $this->pageData['about'] = $this->AboutModel->getWhere($where)[0];
        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['about']['shop_id']
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
                    $about = $file->move('./public/images/about/', $new_name);
                    if ($about) {
                        $about = '/public/images/about/' . $new_name;
                        $data['banner'] = $about;
                    }
                }

                $this->AboutModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('about/detail/' . $about_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/about/edit');
        echo view('admin/footer');
    }

    public function delete($about_id)
    {
        $this->AboutModel->softDelete($about_id);

        return redirect()->to(base_url('about', 'refresh'));
    }
}
