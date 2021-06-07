<?php namespace App\Models;


use App\Core\BaseModel;

class CustomerVoucherModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "customer_voucher";
        $this->primaryKey = "customer_voucher_id";

    }
    
    function getAll($limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('customer_voucher.*, customer.name,voucher.voucher');
        $builder->join('customer', 'customer.customer_id = customer_voucher.customer_id');
        $builder->join('voucher', 'voucher.voucher_id = customer_voucher.voucher_id');
        $query = $builder->get();
        return $query->getResultArray();
    }
    function getWhere($where,$limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('customer_voucher.*, customer.name,voucher.voucher');
        $builder->join('customer', 'customer.customer_id = customer_voucher.customer_id');
        $builder->join('voucher', 'voucher.voucher_id = customer_voucher.voucher_id');
        $builder->where($where);


        $query = $builder->get();
        
        return $query->getResultArray();
    }


  
   
}
