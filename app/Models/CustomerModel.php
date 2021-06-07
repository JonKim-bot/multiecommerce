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
    public function getTree($customer_id)
    {
        $this->builder->select("*");
        $this->builder->where("referal_id", $customer_id);
        $this->builder->where("deleted", 0);

        $users = $this->builder->get()->getResultArray();
        foreach ($users as $key => $row) {
    
            $this->builder->select("*");
            $this->builder->where("referal_id", $row['customer_id']);
            $this->builder->where("deleted", 0);

            $child = $this->builder->get()->getResultArray();
            foreach ($child as $ckey => $crow) {
         
                $this->builder->select("*");
                $this->builder->where("referal_id", $crow['customer_id']);
                $this->builder->where("deleted", 0);

                $gchild = $this->builder->get()->getResultArray();
              
                $child[$ckey]['child'] = $gchild;
            }
            $users[$key]['child'] = $child;
        }

        return $users;
    }
}
