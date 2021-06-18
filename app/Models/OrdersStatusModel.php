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
    function getAll( $limit = '', $page = 1, $filter = array())
    {
        $this->builder = $this->db->table($this->tableName);
        $this->builder->select('orders_status.*');
        $this->builder->where($this->tableName . ".deleted", 0);
        $this->builder->orderBy('orders_status.orders_status_id','ASC');

        $query = $this->builder->get();
        return $query->getResultArray();
    }

}
