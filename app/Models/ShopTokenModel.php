<?php namespace App\Models;

use App\Core\BaseModel;

class ShopTokenModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "shop_token";
        $this->primaryKey = "shop_token_id";

    }

    
}
