<?php namespace App\Models;

use App\Core\BaseModel;

class OrderCustomerModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "order_customer";
        $this->primaryKey = "order_customer_id";

    }
    
}
