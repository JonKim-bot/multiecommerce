<?php namespace App\Models;

use App\Core\BaseModel;

class ProductUpsalesModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "product_upsales";
        $this->primaryKey = "product_upsales_id";

    }
}
