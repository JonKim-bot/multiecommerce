<?php namespace App\Models;

use App\Core\BaseModel;

class PromoTypeModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "promo_type";
        $this->primaryKey = "promo_type_id";

    }
}
