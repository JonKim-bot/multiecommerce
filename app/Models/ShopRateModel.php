<?php namespace App\Models;

use App\Core\BaseModel;

class ShopRateModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "shop_rate";
        $this->primaryKey = "shop_rate_id";

    }
}
