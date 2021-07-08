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
        $this->builder = $this->db->table($this->tableName);
        $this->builder->select('order_customer.*, orders.delivery_date,shop.shop_name
        ');
        $this->builder->join('orders', 'order_customer.order_customer_id = orders.order_customer_id');
        $this->builder->join('shop', 'shop.shop_id = '.$this->tableName.'.shop_id','left');
  
        $this->builder->groupBy('order_customer.full_name');
        
        if ($limit != '') {
            $count = $this->getCount($filter);
            // die($this->builder->getCompiledSelect(false));
            $offset = ($page - 1) * $limit;
            $pages = $count / $limit;
            $pages = ceil($pages);
            
            $pagination = $this->getPaging($limit, $offset, $page, $pages, $filter,$this->builder);

            return $pagination;

            // intval($limit);
            // $this->db->limit($limit, $offset);
        }
        $query = $this->builder->get();
        return $query->getResultArray();
    }   
    function getWhere($where,$limit = "", $page = 1, $filter = array()){
        $this->builder = $this->db->table($this->tableName);
        $this->builder->select('order_customer.*, orders.delivery_date
        ');
        $this->builder->join('orders', 'order_customer.order_customer_id = orders.order_customer_id');
        $this->builder->where($where);
        $this->builder->groupBy('order_customer.full_name');
        $query = $this->builder->get();
        return $query->getResultArray();
    }   
    function getWhereContact($where,$limit = "", $page = 1, $filter = array()){
        $this->builder = $this->db->table($this->tableName);
        $this->builder->select('order_customer.*, orders.delivery_date
        ');
        $this->builder->join('orders', 'order_customer.order_customer_id = orders.order_customer_id');
        $this->builder->where($where);
        $this->builder->groupBy('order_customer.contact');
        $query = $this->builder->get();
        return $query->getResultArray();
    }   
    function getWhereOrders($where,$limit = "", $page = 1, $filter = array()){
        $this->builder = $this->db->table($this->tableName);
        $this->builder->select('order_customer.*, orders.*
        ');
        $this->builder->join('orders', 'order_customer.order_customer_id = orders.order_customer_id','left');
        $this->builder->where($where);
        $wherenot = [
            '1' , '5'
        ];
        $this->builder->whereNotIn('orders.orders_status_id',$wherenot);
        $this->builder->orderBy('orders.orders_id','DESC');

        $query = $this->builder->get();
        return $query->getResultArray();
    }   
}
