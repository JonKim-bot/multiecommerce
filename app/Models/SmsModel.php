<?php namespace App\Models;

use App\Core\BaseModel;

class SmsModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "sms";
        $this->primaryKey = "sms_id";

    }
    
    
    function getWhere($where, $limit = '', $page = 1, $filter = array())
    {
        $builder = $this->db->table($this->tableName);
        $builder->select('sms.*, shop.shop_name
        ');
        $builder->join('shop', 'shop.shop_id = sms.shop_id');
        
        $builder->where($where);
        $query = $builder->get();
        return $query->getResultArray();
    }

    
    function getAll($limit = '', $page = 1, $filter = array())
    {
        $builder = $this->db->table($this->tableName);
        $builder->select('sms.*, shop.shop_name
        ');
        $builder->join('shop', 'shop.shop_id = sms.shop_id');
        
        $query = $builder->get();
        return $query->getResultArray();
    }
  
}
