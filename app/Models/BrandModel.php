<?php namespace App\Models;

use App\Core\BaseModel;

class BrandModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "brand";
        $this->primaryKey = "brand_id";

    }
}
