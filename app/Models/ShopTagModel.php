<?php namespace App\Models;

use App\Core\BaseModel;

class ShopTagModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "shop_tag";
        $this->primaryKey = "shop_tag_id";

    }
    
}
