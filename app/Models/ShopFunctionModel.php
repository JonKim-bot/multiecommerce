<?php namespace App\Models;

use App\Core\BaseModel;

class ShopFunctionModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "shop_function";
        $this->primaryKey = "shop_function_id";

    }
}
