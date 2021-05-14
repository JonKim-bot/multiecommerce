<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\ProductOptionModel;
use App\Models\BankModel;
use App\Models\MerchantModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ProductOptionSelectionModel;

use App\Models\ProductCategoryModel;

class ProductOption extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->ProductOptionModel = new ProductOptionModel();
        $this->ProductOptionSelectionModel = new ProductOptionSelectionModel();

        $this->MerchantModel = new MerchantModel();
        $this->ProductModel = new ProductModel();

        $this->CategoryModel = new CategoryModel();
        $this->ProductCategoryModel = new ProductCategoryModel();

        $this->BankModel = new BankModel();

        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            // echo "<script>location.href='".base_url()."/access/login';</script>";
        }
        if (session()->get('admin_data') == 'MERCHANT') {
            //  redirect()->to(base_url('access/login/'));
            $this->isMerchant = true;
        }
    }

    public function index()
    {
        $where = [
            'shop_id' => $this->shop_id,
        ];

        $product_option = $this->ProductOptionModel->getWhere($where);
        // $this->debug($product_option);

        $this->pageData['product_option'] = $product_option;

        echo view('admin/header', $this->pageData);
        echo view('admin/product_option/all');
        echo view('admin/footer');
    }
    public function product_optiontable()
    {
        $where = [
            'shop_id' => $this->shop_id,
        ];
        $product_option = $this->ProductOptionModel->getWhere($where);

        $this->pageData['product_option'] = $product_option;

        echo view('admin/header', $this->pageData);
        echo view('admin/product_option/alltable');
        echo view('admin/footer');
    }

    public function search()
    {
        $like = [
            'product_option_name' => $_POST['product_option_name'],
        ];

        $product_option = $this->ProductOptionModel->getLike($like);
        $this->pageData['product_option'] = $product_option;

        echo view('admin/header', $this->pageData);
        echo view('admin/product_option/all');
        echo view('admin/footer');
    }

    public function add($product_id)
    {
        $where = [
            'shop_id' => $this->shop_id,
        ];

        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                $data = [
                    'name' => $input['product_option'],
                    'created_by' => session()->get('login_id'),
                    'product_id' => $product_id,
                ];
                if (!empty($input['minimum_required'])) {
                    $data['minimum_required'] = 1;
                }
                // dd($data);

                $product_option_id = $this->ProductOptionModel->insertNew(
                    $data
                );

                return redirect()->to(
                    base_url('product/detail/' . $product_id, 'refresh')
                );
            }
        }
        $this->pageData['product_id'] = $product_id;
        echo view('admin/header', $this->pageData);
        echo view('admin/product_option/add');
        echo view('admin/footer');
    }

    public function detail($product_option_id)
    {
        $where = [
            'product_option.product_option_id' => $product_option_id,
        ];

        $product_option = $this->ProductOptionModel->getWhere($where);
        $product_option_selection = $this->ProductOptionSelectionModel->getWhere(
            $where
        );
        // $this->debug($product_option);
        // $merchant = $this->MerchantModel->getWhere($where);

        // $this->show_404_if_empty($admin);

        $this->pageData['product_option'] = $product_option[0];

        $this->pageData['product_option_selection'] = $product_option_selection;

        echo view('admin/header', $this->pageData);
        echo view('admin/product_option/detail');
        echo view('admin/footer');
    }

    public function edit($product_option_id)
    {
        $where = [
            'shop_id' => $this->shop_id,
        ];

        $where = [
            'product_option_id' => $product_option_id,
        ];

        $this->pageData['product_option'] = $this->ProductOptionModel->getWhere(
            $where
        )[0];
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'name' => $input['product_option'],
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];
                if (!empty($input['minimum_required'])) {
                    $data['minimum_required'] = 1;
                }

                return redirect()->to(
                    base_url(
                        'ProductOption/detail/' . $product_option_id,
                        'refresh'
                    )
                );
            }
        }

        // $this->debug($this->pageData);
        // $this->debug($this->pageData['product_option']['category_id']);
        echo view('admin/header', $this->pageData);

        echo view('admin/product_option/edit');
        echo view('admin/footer');
    }

    public function delete($product_option_id)
    {
        $where = [
            'product_option_id' => $product_option_id,
        ];
        $product_id = $this->ProductOptionModel->getWhere($where)[0][
            'product_id'
        ];

        $this->ProductOptionModel->hardDelete($product_option_id);

        return redirect()->to(
            base_url('product/detail/' . $product_id, 'refresh')
        );
    }
}
