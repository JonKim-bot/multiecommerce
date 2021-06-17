<?php namespace App\Models;

use App\Core\BaseModel;

class SmsSentModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "sms_sent";
        $this->primaryKey = "sms_sent_id";

    }
    function getWhere($where, $limit = '', $page = 1, $filter = array())
    {
        $builder = $this->db->table($this->tableName);
        $builder->select('sms_sent.*, order_customer.contact , order_customer.order_customer_id
        ');
        $builder->join('order_customer', 'order_customer.order_customer_id = sms_sent.customer_id');
        
        $builder->where($where);
        $query = $builder->get();
        return $query->getResultArray();
    }

    
    function getAll($limit = '', $page = 1, $filter = array())
    {
        $builder = $this->db->table($this->tableName);
        $builder->select('sms_sent.*, order_customer.contact , order_customer.order_customer_id
        ');
        $builder->join('order_customer', 'order_customer.order_customer_id = sms_sent.customer_id');
        
        
        $query = $builder->get();
        return $query->getResultArray();
    }
  
}
