<?php namespace App\Models;

use App\Core\BaseModel;

class OrdersStatusModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "orders_status";
        $this->primaryKey = "orders_status_id";

    }
}
