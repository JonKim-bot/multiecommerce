<?php namespace App\Models;


use App\Core\BaseModel;

class CustomerGiftModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "customer_gift";
        $this->primaryKey = "customer_gift_id";

    }
    
    function getAll($limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('customer_gift.*, customer.name,gift.gift');
        $builder->join('customer', 'customer.customer_id = customer_gift.customer_id');
        $builder->join('gift', 'gift.gift_id = customer_gift.gift_id');
        $query = $builder->get();
        return $query->getResultArray();
    }
    function getWhere($where,$limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('customer_gift.*, customer.name,gift.gift');
        $builder->join('customer', 'customer.customer_id = customer_gift.customer_id');
        $builder->join('gift', 'gift.gift_id = customer_gift.gift_id');
        $builder->where($where);


        $query = $builder->get();
        
        return $query->getResultArray();
    }


  
   
}
