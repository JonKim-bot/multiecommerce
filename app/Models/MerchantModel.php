<?php namespace App\Models;

use App\Core\BaseModel;

class MerchantModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "merchant";
        $this->primaryKey = "merchant_id";

    }
}
