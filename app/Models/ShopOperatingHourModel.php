<?php namespace App\Models;

use App\Core\BaseModel;

class ShopOperatingHourModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "shop_operating_hour";
        $this->primaryKey = "shop_operating_hour_id";

    }
    
  
}
