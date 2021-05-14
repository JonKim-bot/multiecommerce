<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\ProductOptionSelectionModel;
use App\Models\BankModel;
use App\Models\ProductOptionModel;
use App\Models\CategoryModel;
use App\Models\ProductCategoryModel;

class ProductOptionSelection extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];

        $this->ProductOptionSelectionModel = new ProductOptionSelectionModel();
        $this->ProductOptionModel = new ProductOptionModel();
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

        $product_option_selection = $this->ProductOptionSelectionModel->getWhere(
            $where
        );
        // $this->debug($product_option_selection);

        $this->pageData['product_option_selection'] = $product_option_selection;

        echo view('admin/header', $this->pageData);
        echo view('admin/product_option_selection/all');
        echo view('admin/footer');
    }
    public function product_option_selectiontable()
    {
        $where = [
            'shop_id' => $this->shop_id,
        ];
        $product_option_selection = $this->ProductOptionSelectionModel->getWhere(
            $where
        );

        $this->pageData['product_option_selection'] = $product_option_selection;

        echo view('admin/header', $this->pageData);
        echo view('admin/product_option_selection/alltable');
        echo view('admin/footer');
    }

    public function search()
    {
        $like = [
            'product_option_selection_name' =>
                $_POST['product_option_selection_name'],
        ];

        $product_option_selection = $this->ProductOptionSelectionModel->getLike(
            $like
        );
        $this->pageData['product_option_selection'] = $product_option_selection;

        echo view('admin/header', $this->pageData);
        echo view('admin/product_option_selection/all');
        echo view('admin/footer');
    }

    public function add($product_option_id)
    {
        $where = [
            'shop_id' => $this->shop_id,
        ];

        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                $data = [
                    'product_option_id' => $product_option_id,

                    'product_option_name' => $input['product_option_selection'],
                    'selection_price' => $input['selection_price'],
                    'created_by' => session()->get('login_id'),
                ];

                // dd($data);

                $product_option_selection_id = $this->ProductOptionSelectionModel->insertNew(
                    $data
                );

                return redirect()->to(
                    base_url(
                        'ProductOption/detail/' . $product_option_id,
                        'refresh'
                    )
                );
            }
        }
        $this->pageData['product_option_id'] = $product_option_id;
        echo view('admin/header', $this->pageData);
        echo view('admin/product_option_selection/add');
        echo view('admin/footer');
    }

    public function detail($product_option_selection_id)
    {
        $where = [
            'product_option_selection_id' => $product_option_selection_id,
        ];

        $product_option_selection = $this->ProductOptionSelectionModel->getWhere(
            $where
        );

        // $this->debug($product_option_selection);
        // $merchant = $this->MerchantModel->getWhere($where);

        // $this->show_404_if_empty($admin);

        $this->pageData['product_option_selection'] =
            $product_option_selection[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/product_option_selection/detail');
        echo view('admin/footer');
    }

    public function edit($product_option_selection_id)
    {
        $where = [
            'product_option_selection_id' => $product_option_selection_id,
        ];

        $this->pageData[
            'product_option_selection'
        ] = $this->ProductOptionSelectionModel->getWhere($where)[0];

        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'product_option_name' => $input['product_option_selection'],
                    'selection_price' => $input['selection_price'],
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                $this->ProductOptionSelectionModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url(
                        'ProductOptionSelection/detail/' .
                            $product_option_selection_id,
                        'refresh'
                    )
                );
            }
        }

        // $this->debug($this->pageData);
        // $this->debug($this->pageData['product_option_selection']['category_id']);
        echo view('admin/header', $this->pageData);

        echo view('admin/product_option_selection/edit');
        echo view('admin/footer');
    }

    public function delete($product_option_selection_id)
    {
        $where = [
            'product_option_selection_id' => $product_option_selection_id,
        ];
        $product_option_id = $this->ProductOptionSelectionModel->getWhere(
            $where
        )[0]['product_option_id'];

        $this->ProductOptionSelectionModel->hardDelete(
            $product_option_selection_id
        );

        return redirect()->to(
            base_url('ProductOption/detail/' . $product_option_id, 'refresh')
        );
    }
}
