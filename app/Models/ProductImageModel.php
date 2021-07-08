<?php namespace App\Models;

use App\Core\BaseModel;

class ProductImageModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "product_image";
        $this->primaryKey = "product_image_id";

    }
}
