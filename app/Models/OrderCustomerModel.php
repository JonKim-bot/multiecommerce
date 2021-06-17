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
    function getAll($limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('order_customer.*, orders.delivery_date
        ');
        $builder->join('orders', 'order_customer.order_customer_id = orders.order_customer_id');
        $builder->groupBy('order_customer.full_name');
        $query = $builder->get();
        return $query->getResultArray();
    }   
    function getWhere($where,$limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('order_customer.*, orders.delivery_date
        ');
        $builder->join('orders', 'order_customer.order_customer_id = orders.order_customer_id');
        $builder->where($where);
        $builder->groupBy('order_customer.full_name');
        $query = $builder->get();
        return $query->getResultArray();
    }   
    function getWhereContact($where,$limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('order_customer.*, orders.delivery_date
        ');
        $builder->join('orders', 'order_customer.order_customer_id = orders.order_customer_id');
        $builder->where($where);
        $builder->groupBy('order_customer.contact');
        $query = $builder->get();
        return $query->getResultArray();
    }   
    function getWhereOrders($where,$limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('order_customer.*, orders.*
        ');
        $builder->join('orders', 'order_customer.order_customer_id = orders.order_customer_id','left');
        $builder->where($where);
        $wherenot = [
            '1' , '5'
        ];
        $builder->whereNotIn('orders.orders_status_id',$wherenot);
        $builder->orderBy('orders.orders_id','DESC');

        $query = $builder->get();
        return $query->getResultArray();
    }   
}
