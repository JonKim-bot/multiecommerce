<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\SpecialCategoryModel;

class SpecialCategory extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->SpecialCategoryModel = new SpecialCategoryModel();
        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            echo "<script>location.href='" .
                base_url() .
                "/access/login';</script>";
        }
        if (session()->get('admin_data')['type'] == 'MERCHANT') {
            //  redirect()->to(base_url('access/login/'));
            $this->isMerchant = true;
        }
    }

    public function index()
    {
        $special_category = $this->SpecialCategoryModel->getAll();
        $this->pageData['special_category'] = $special_category;

        echo view('admin/header', $this->pageData);
        echo view('admin/special_category/all');
        echo view('admin/footer');
    }

    public function add()
    {
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                $data = [
                    'special_category' => $this->request->getPost('special_category'),
                    'created_by' => session()->get('login_id'),
                ];

        

                $this->SpecialCategoryModel->insertNew($data);

                return redirect()->to(base_url('SpecialCategory', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/special_category/add');
        echo view('admin/footer');
    }

    public function detail($special_category_id)
    {
        $where = [
            'special_category_id' => $special_category_id,
        ];
        $special_category = $this->SpecialCategoryModel->getWhere($where);
     
        // $this->show_404_if_empty($admin);

        $this->pageData['special_category'] = $special_category[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/special_category/detail');
        echo view('admin/footer');
    }

    public function edit($special_category_id)
    {
        $where = [
            'special_category_id' => $special_category_id,
        ];

        $this->pageData['special_category'] = $this->SpecialCategoryModel->getWhere($where)[0];
        // $this->debug($this->pageData);
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'special_category' => $this->request->getPost('special_category'),
                ];

      
                $this->SpecialCategoryModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url(
                        'SpecialCategory/detail/' . $special_category_id,
                        'refresh'
                    )
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/special_category/edit');
        echo view('admin/footer');
    }

    public function delete($special_category_id)
    {
        $this->SpecialCategoryModel->softDelete($special_category_id);

        return redirect()->to(base_url('SpecialCategory', 'refresh'));
    }
}
