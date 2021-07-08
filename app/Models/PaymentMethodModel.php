<?php namespace App\Models;

use App\Core\BaseModel;

class PaymentMethodModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "payment_method";
        $this->primaryKey = "payment_method_id";

    }

}
