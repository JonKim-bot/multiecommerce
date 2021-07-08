<?php namespace App\Models;

use App\Core\BaseModel;

class OrdersLogModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "orders_log";
        $this->primaryKey = "orders_log_id";

    }
}
