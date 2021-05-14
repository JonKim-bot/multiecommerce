<?php namespace App\Models;

use App\Core\BaseModel;

class ShopPaymentMethodModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "shop_payment_method";
        $this->primaryKey = "shop_payment_method_id";

    }


}
