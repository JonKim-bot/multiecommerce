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
        $this->builder = $this->db->table($this->tableName);
        $this->builder->select('sms.*, shop.shop_name
        ');
        $this->builder->join('shop', 'shop.shop_id = sms.shop_id');
        
        $this->builder->where($where);
        $query = $this->builder->get();
        return $query->getResultArray();
    }

    
    function getAll($limit = '', $page = 1, $filter = array())
    {
        $this->builder = $this->db->table($this->tableName);
        $this->builder->select('sms.*, shop.shop_name
        ');
        $this->builder->join('shop', 'shop.shop_id = sms.shop_id');
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
  
}
