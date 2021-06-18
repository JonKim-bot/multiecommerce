<?php namespace App\Models;

use App\Core\BaseModel;

class CreditTopUpModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "credit_top_up";
        $this->primaryKey = "credit_top_up_id";

    }
    
    function getWhere($where, $limit = '', $page = 1, $filter = array())
    {
        $builder = $this->db->table($this->tableName);
        $builder->select('credit_top_up.*, shop.shop_name
        ');
        $builder->join('shop', 'shop.shop_id = credit_top_up.shop_id');
        
        $builder->where($where);
        $builder->orderBy($this->tableName . "." . $this->primaryKey, 'DESC');

        $query = $builder->get();
        return $query->getResultArray();
    }

    
    function getAll($limit = '', $page = 1, $filter = array())
    {
        $builder = $this->db->table($this->tableName);
        $builder->select('credit_top_up.*, shop.shop_name
        ');
        $builder->join('shop', 'shop.shop_id = credit_top_up.shop_id');
        $builder->orderBy($this->tableName . "." . $this->primaryKey, 'DESC');

        $query = $builder->get();
        return $query->getResultArray();
    }
}
