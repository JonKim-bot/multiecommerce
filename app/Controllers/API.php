<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\ProductModel;
use App\Models\ProductCategoryModel;

use App\Models\CategoryModel;

class API extends BaseController
{
    public function __construct()
    {
        $this->ProductModel = new ProductModel();
        $this->ProductCategoryModel = new ProductCategoryModel();
        
        $this->CategoryModel = new CategoryModel();
        $this->pageData = [];
    }
    public function get_product(){
        if(!empty($_POST['category_ids'])){
            $where['category_ids'] = json_decode($_POST['category_ids'],TRUE);;
        }
        if(!empty($_POST['keyword'])){
            $where['product_name'] = $_POST['keyword'];
        }
        if(empty($where)){
            $product = $this->ProductModel->getAll();
        }else{
            $product = $this->ProductModel->getWhereIn($where);
        }
        die(json_encode(
            [
                'status' => true,
                'data' => $product
            ]
        ));

    }

    public function get_category(){
        $category = $this->CategoryModel->getAll();
        die(json_encode(
            [
                'status' => true,
                'data' => $category
            ]
        ));
    }


}
