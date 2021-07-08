<?php namespace App\Models;

use App\Core\BaseModel;

class ProductOptionModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "product_option";
        $this->primaryKey = "product_option_id";

    }
}
