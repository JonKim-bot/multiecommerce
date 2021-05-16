<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\ContactModel;

class Contact extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->ContactModel = new ContactModel();
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
        $contact = $this->ContactModel->getWhere($where);
        $this->pageData['contact'] = $contact;

        echo view('admin/header', $this->pageData);
        echo view('admin/contact/all');
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

                $this->ContactModel->insertNew($data);

                return redirect()->to(base_url('contact', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/contact/add');
        echo view('admin/footer');
    }

    public function detail($contact_id)
    {
        $where = [
            'contact_id' => $contact_id,
        ];
        $contact = $this->ContactModel->getWhere($where);
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop($contact[0]['shop_id']);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['contact'] = $contact[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/contact/detail');
        echo view('admin/footer');
    }

    public function edit($contact_id)
    {
        $where = [
            'contact_id' => $contact_id,
        ];

        $this->pageData['contact'] = $this->ContactModel->getWhere($where)[0];
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['contact']['shop_id']
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
          
          

                $this->ContactModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('contact/detail/' . $contact_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/contact/edit');
        echo view('admin/footer');
    }

    public function delete($contact_id)
    {
        $this->ContactModel->softDelete($contact_id);

        return redirect()->to(base_url('contact', 'refresh'));
    }
}
