<?php


namespace App\Controllers;

use App\Core\BaseController;
use App\Models\ProductModel;
use App\Models\BankModel;
use App\Models\ProductOptionModel;
use App\Models\MerchantModel;
use App\Models\ProductImageModel;

use App\Models\CategoryModel;
use App\Models\ProductCategoryModel;
use App\Models\ProductUpsalesModel;

class Product extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->ProductModel = new ProductModel();
        $this->ProductOptionModel = new ProductOptionModel();
        $this->ProductImageModel = new ProductImageModel();
        $this->ProductUpsalesModel = new ProductUpsalesModel();

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
        $where = [
            'product.shop_id' => session()->get('shop_data')['shop_id']
        ];
        $all_product = $this->ProductModel->getWhereRaw($where);
        $this->pageData['all_product'] = $all_product;
    }
    public function change_status_home($product_id){
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

    public function make_product_image($image,$product_id,$update = ""){
        $data = [
            'product_image' => $image,
            'is_first' => 1,
            'product_id' => $product_id,
        ];
        if($update == ""){
            $this->ProductImageModel->insertNew($data);
        }else{

            $this->ProductImageModel->insertNew($data);
        }

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

                    'promo_price' => $input['promo_price'],

                    
                    'created_by' => session()->get('login_id'),
                    'shop_id' => $this->shop_id,
                ];
                
                if(!empty($_POST['is_promo'])){
                    $data['is_promo'] = 1;
                }else{
                    $data['is_promo'] = 0;
                    
                }
                // dd($data);
                
                $product_id = $this->ProductModel->insertNew($data);
                $this->make_product_image($banner,$product_id);
                
                if (!empty($input['category'])) {
                    foreach ($input['category'] as $row) {
                        $data = [
                            'category_id' => $row,
                            'product_id' => $product_id,
                        ];
                        $this->ProductCategoryModel->insertNew($data);
                    }
                }
                

                if (!empty($input['upsales_product_id'])) {
                    foreach ($input['upsales_product_id'] as $row) {
                        $data = [
                            'upsales_product_id' => $row,
                            'product_id' => $product_id,
                        ];
                        $this->ProductUpsalesModel->insertNew($data);
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


    public function add_image()
    {

        if ($_POST) {

            $input = $this->request->getPost();
            
            $product_pic = $this->upload_image('product_pic');
            $product_pic_data = [
                'product_id' => $input['product_id'],
                'product_image' => $product_pic,
                // 'order_number' => $_POST['order_number']
            ];
            $this->ProductImageModel->insertNew($product_pic_data);


            return redirect()->to(base_url('product/detail/' . $input['product_id'], "refresh"));

        }
    }
    public function change_all_status($product_image){
        $where = [
            'product_id' => $product_image['product_id']
        ];
        $data = [
            'is_first' => 0
        ];
        $this->ProductImageModel->updateWhere($where,$data);
      
    }
    public function delete_image($product_image_id)
    {

        $where = array(
            'product_image.product_image_id' => $product_image_id,
        );
        $product_id = $this->ProductImageModel->getWhere($where)[0]['product_id'];
        $this->ProductImageModel->softDelete($product_image_id);
        return redirect()->to(base_url('product/detail/' . $product_id, "refresh"));
    }

    public function edit_image()
    {

        if ($_POST) {

            $input = $this->request->getPost();
            
            $product_pic = $this->upload_image('product_pic');
            $where = [
                'product_image_id' => $_POST['product_image_id']
            ];
            $product_pic_data = [
              
                // 'order_number' => $_POST['order_number']

                
            ];
            if(!empty($product_pic)){
                $product_pic_data['product_image'] = $product_pic;
            }
            $this->ProductImageModel->updateWhere($where,$product_pic_data);


            return redirect()->to(base_url('product/detail/' . $input['product_id'], "refresh"));

        }

    }
    public function change_status($product_image_id)
    {
        $input = $this->request->getPost();
        
        $where = [
            'product_image_id' => $product_image_id
        ];
        $product_image = $this->ProductImageModel->getWhere($where)[0];
        if($product_image['is_first'] == 1){
            $is_thumbnail = 0;
        }else{
            $is_thumbnail = 1;
        }
        $this->change_all_status($product_image);
        $this->ProductImageModel->updateWhere($where,['is_first' => $is_thumbnail]);
        $where = [
            'product_id' => $product_image['product_id']
        ];
        $data = [
            'image' => $product_image['product_image']
        ];
        $this->ProductModel->updateWhere($where,$data);
        return redirect()->to(base_url('product/detail/' . $product_image['product_id'], "refresh"));

        
    }

    public function detail($product_id)
    {
        $where = [
            'product_id' => $product_id,
        ];

        $product = $this->ProductModel->getWhere($where);
        $product_option = $this->ProductOptionModel->getWhere($where);
        
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop($product[0]['shop_id']);
        }
        // $this->debug($product);
        
        // $merchant = $this->MerchantModel->getWhere($where);
        
        // $this->show_404_if_empty($admin);
 
        $this->pageData['product'] = $product[0];
        
        $this->pageData['product_option'] = $product_option;
        $product_image = $this->ProductImageModel->getWhere($where);
        $this->pageData['product_image'] = $product_image;


        echo view('admin/header', $this->pageData);
        echo view('admin/product/detail');
        echo view('admin/footer');
    }
    // public function make_image(){
    //     $product = $this->ProductModel->getAll();
    //     foreach($product as $row){
    //         $this->make_product_image($row['image'],$row['product_id']);
    //     }
    // }
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
        if ($this->isMerchant == true) {
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
                    'promo_price' => $input['promo_price'],
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];
                if(!empty($_POST['is_promo'])){
                    $data['is_promo'] = 1;
                }else{
                    $data['is_promo'] = 0;

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
                // $this->make_product_image($banner,$product_id);

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
                
                if (!empty($this->request->getPost('upsales_product_id'))) {
                    $this->ProductUpsalesModel
                        ->where('product_id', $product_id)
                        ->delete();
                        

                    // $this->debug($input['category']);
                    foreach ($input['upsales_product_id'] as $row) {
                        $data = [
                            'upsales_product_id' => $row,
                            'product_id' => $product_id,
                        ];
                        $this->ProductUpsalesModel->insertNew($data);
                    }
                }


                return redirect()->to(
                    base_url('product/detail/' . $product_id, 'refresh')
                );
            }
        }
        $where = [
            'product_upsales.product_id' => $product_id,
        ];
        $this->pageData['upsales_product'] = array_column($this->ProductUpsalesModel->getWhere($where),'upsales_product_id');


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
