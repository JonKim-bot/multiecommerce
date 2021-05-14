<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\ProductModel;
use App\Models\BankModel;
use App\Models\ProductOptionModel;
use App\Models\MerchantModel;

use App\Models\CategoryModel;
use App\Models\ProductCategoryModel;

class Product extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->ProductModel = new ProductModel();
        $this->ProductOptionModel = new ProductOptionModel();

        $this->MerchantModel = new MerchantModel();
        $this->CategoryModel = new CategoryModel();
        $this->ProductCategoryModel = new ProductCategoryModel();

        $this->BankModel = new BankModel();

        $this->CategoryModel = new CategoryModel();

     
        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            echo "<script>location.href='" .
                base_url() .
                "/access/login';</script>";
        }
        // if(session()->get('admin_data') != null){
        //     //  redirect()->to(base_url('access/login/'));
        //     echo "<script>location.href='".base_url()."/admin';</script>";
        // }
        if (session()->get('admin_data')['type'] == 'MERCHANT') {
            //  redirect()->to(base_url('access/login/'));
            $this->isMerchant = true;
        }
    }
    public function change_status($product_id){
        $where = [
            'product_id' => $product_id

        ];
        $product = $this->ProductModel->getWhere($where)[0];
        if($product['is_home'] == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        $this->ProductModel->updateWhere($where,['is_home' => $status]);

        return redirect()->to(base_url('product', "refresh"));

    }

    public function index()
    {
        $product_category =
            ($_GET and $_GET['product_category'])
                ? $_GET['product_category']
                : '';

        $where = [
            'shop_id' => $this->shop_id,
        ];

  
        $this->pageData['category'] = $this->CategoryModel->getWhere($where);
        if ($product_category != '') {
            $where['category_id'] = $product_category;
        }
        $product = $this->ProductModel->getWhere($where);
        // $this->debug($where);
        // $this->debug($product);
        // $this->debug($product);

        $this->pageData['product'] = $product;

        echo view('admin/header', $this->pageData);
        echo view('admin/product/alltable');
        echo view('admin/footer');
    }
    public function producttable()
    {
        $product_category =
            ($_GET and $_GET['product_category'])
                ? $_GET['product_category']
                : '';

        $where = [
            'shop_id' => $this->shop_id,
        ];
        if ($product_category != '') {
            $where['category_id'] = $product_category;
        }
        $product = $this->ProductModel->getWhere($where);
        $this->pageData['product'] = $product;

        echo view('admin/header', $this->pageData);
        echo view('admin/product/all');
        echo view('admin/footer');
    }

    public function search()
    {
        $like = [
            'product_name' => $_POST['product_name'],
        ];

        $product = $this->ProductModel->getLike($like);
        $this->pageData['product'] = $product;

        echo view('admin/header', $this->pageData);
        echo view('admin/product/all');
        echo view('admin/footer');
    }

    public function add()
    {
        $where = [
            'shop_id' => $this->shop_id,
        ];

        $category = $this->CategoryModel->getWhere($where);

        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                    $file = $this->request->getFile('banner');
                    $new_name = $file->getRandomName();
                    $banner = $file->move(
                        './public/images/product/',
                        $new_name
                    );
                    if ($banner) {
                        $banner = '/public/images/product/' . $new_name;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

                $data = [
                    'product_name' => $input['product'],
                    'image' => $banner,
                    'product_price' => $input['product_price'],
                    'product_description' => $input['product_description'],
                    'product_name' => $input['product'],
                    'product_price' => $input['product_price'],

                    'created_by' => session()->get('login_id'),
                    'shop_id' => $this->shop_id,
                ];

                if(!empty($_POST['is_product'])){
                    $data['is_product'] = 1;
                }else{
                    $data['is_product'] = 0;

                }
                // dd($data);

                $product_id = $this->ProductModel->insertNew($data);

                if (!empty($input['category'])) {
                    foreach ($input['category'] as $row) {
                        $data = [
                            'category_id' => $row,
                            'product_id' => $product_id,
                        ];
                        $this->ProductCategoryModel->insertNew($data);
                    }
                }

                return redirect()->to(base_url('product', 'refresh'));
            }
        }

        $this->pageData['category'] = $category;
        echo view('admin/header', $this->pageData);
        echo view('admin/product/add');
        echo view('admin/footer');

    }

    public function set_status($product_id)
    {
        $where = [
            'product.product_id' => $product_id,
        ];
        $product = $this->ProductModel->getWhere($where);
        if ($product[0]['is_active'] == 1) {
            $is_active = 0;
        } else {
            $is_active = 1;
        }
        $this->ProductModel->updateWhere($where, ['is_active' => $is_active]);
        return redirect()->to(
            base_url('product/detail/' . $product_id, 'refresh')
        );
    }
    public function detail($product_id)
    {
        $where = [
            'product_id' => $product_id,
        ];

        $product = $this->ProductModel->getWhere($where);
        $product_option = $this->ProductOptionModel->getWhere($where);

        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop($product[0]['shop_id']);
        }
        // $this->debug($product);

        // $merchant = $this->MerchantModel->getWhere($where);

        // $this->show_404_if_empty($admin);

        $this->pageData['product'] = $product[0];
        $this->pageData['product_option'] = $product_option;
        

        echo view('admin/header', $this->pageData);
        echo view('admin/product/detail');
        echo view('admin/footer');
    }

    public function edit($product_id)
    {
        $where = [
            'shop_id' => $this->shop_id,
        ];

        $category = $this->CategoryModel->getWhere($where);

        $where = [
            'product_id' => $product_id,
        ];
        $this->pageData['category'] = $category;

        $this->pageData[
            'product_category'
        ] = $this->ProductCategoryModel->getWhere($where);

        $this->pageData['product'] = $this->ProductModel->getWhere($where)[0];
        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['product']['shop_id']
            );
        }
        if ($_POST) {
            $error = false;
        
            $input = $this->request->getPost();
            if (!$error) {
                $data = [
                    'product_name' => $input['product'],
                    'product_price' => $input['product_price'],
                    'product_description' => $input['product_description'],
                    'product_name' => $input['product'],
                    'product_price' => $input['product_price'],

                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];
                if(!empty($_POST['is_product'])){
                    $data['is_product'] = 1;
                }else{
                    $data['is_product'] = 0;

                }

                if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                    $file = $this->request->getFile('banner');
                    $new_name = $file->getRandomName();
                    $banner = $file->move(
                        './public/images/product/',
                        $new_name
                    );
                    if ($banner) {
                        $banner = '/public/images/product/' . $new_name;
                        $data['image'] = $banner;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

                $this->ProductModel->updateWhere($where, $data);

                if (!empty($this->request->getPost('category'))) {
                    $this->ProductCategoryModel
                        ->where('product_id', $product_id)
                        ->delete();

                    // $this->debug($input['category']);
                    foreach ($input['category'] as $row) {
                        $data = [
                            'category_id' => $row,
                            'product_id' => $product_id,
                        ];
                        $this->ProductCategoryModel->insertNew($data);
                    }
                }
                return redirect()->to(
                    base_url('product/detail/' . $product_id, 'refresh')
                );
            }
        }

        // $this->debug($this->pageData);
        // $this->debug($this->pageData['product']['category_id']);
        echo view('admin/header', $this->pageData);

        echo view('admin/product/edit');
        echo view('admin/footer');
    }

    public function delete($product_id)
    {
        $this->ProductModel->softDelete($product_id);

        return redirect()->to(base_url('product', 'refresh'));
    }
}
