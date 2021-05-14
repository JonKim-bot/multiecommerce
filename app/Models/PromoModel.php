<?php namespace App\Models;

use App\Core\BaseModel;

class PromoModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "promo";
        $this->primaryKey = "promo_id";

    }
}
