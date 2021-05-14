<?php namespace App\Models;

use App\Core\BaseModel;

class OrderDetailOptionModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "order_detail_option";
        $this->primaryKey = "order_detail_option_id";

    }
}
