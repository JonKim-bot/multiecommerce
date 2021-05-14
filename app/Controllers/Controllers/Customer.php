<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\CategoryModel;

class OrderCustomer extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->CategoryModel = new CategoryModel();
        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            // echo "<script>location.href='".base_url()."/access/login';</script>";
        }
        if (session()->get('admin_data') == 'MERCHANT') {
            //  redirect()->to(base_url('access/login/'));
            $this->isMerchant == true;
        }
    }

    public function index()
    {
        $customer = $this->CategoryModel->getWhere([
            'shop_id' => $this->shop_id,
        ]);
        $this->pageData['customer'] = $customer;

        echo view('admin/header', $this->pageData);
        echo view('admin/customer/all');
        echo view('admin/footer');
    }

    public function add()
    {
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                $data = [
                    'category' => $this->request->getPost('customer'),
                    'created_by' => session()->get('login_id'),
                    'shop_id' => session()->get('admin_data')['shop_id'],
                ];

                // $this->debug($data);
                // dd($data);

                $this->CategoryModel->insertNew($data);

                return redirect()->to(base_url('OrderCustomer', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/customer/add');
        echo view('admin/footer');
    }

    public function detail($customer_id)
    {
        $where = [
            'category_id' => $customer_id,
        ];
        $customer = $this->CategoryModel->getWhere($where);
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop($customer[0]['shop_id']);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['customer'] = $customer[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/customer/detail');
        echo view('admin/footer');
    }

    public function edit($customer_id)
    {
        $where = [
            'category_id' => $customer_id,
        ];

        $this->pageData['category'] = $this->CategoryModel->getWhere($where)[0];

        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['category']['shop_id']
            );
        }
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'category' => $this->request->getPost('customer'),
                    'shop_id' => session()->get('admin_data')['shop_id'],
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                //    if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                //         $file = $this->request->getFile('banner');
                //         $new_name = $file->getRandomName();
                //         $banner = $file->move('./public/images/article/', $new_name);
                //         if ($banner) {
                //             $banner = '/public/images/article/' . $new_name;
                //             $data['image'] = $banner;
                //         } else {
                //             $error = true;
                //             $error_message = "Upload failed.";
                //         }

                //     } else {
                //         $error = true;
                //         $error_message = "Please upload a receipt.";
                //     }

                $this->CategoryModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('OrderCustomer/detail/' . $customer_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/customer/edit');
        echo view('admin/footer');
    }

    public function delete($customer_id)
    {
        $this->CategoryModel->softDelete($customer_id);

        return redirect()->to(base_url('OrderCustomer', 'refresh'));
    }
}
