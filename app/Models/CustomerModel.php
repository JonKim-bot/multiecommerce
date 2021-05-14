<?php namespace App\Models;

use App\Core\BaseModel;

class CustomerModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "customer";
        $this->primaryKey = "customer_id";

    }
    function getAll($limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('customer.*, role.*
        ');
        $builder->join('role', 'role.role_id = customer.role_id');
        // $builder->groupBy('order_customer.full_name');
        $query = $builder->get();
        return $query->getResultArray();
    }   

    function getWhere($where,$limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('customer.*, role.*');
        $builder->join('role', 'role.role_id = customer.role_id');
        $builder->where($where);
        // $builder->groupBy('order_customer.full_name');
        $query = $builder->get();
        return $query->getResultArray();
    }   
    
}
