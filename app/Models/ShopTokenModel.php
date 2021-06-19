<?php namespace App\Models;

use App\Core\BaseModel;

class ShopTokenModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "shop_token";
        $this->primaryKey = "shop_token_id";

    }

    function getWhere($where, $limit = '', $page = 1, $filter = array())
    {
        $builder = $this->db->table($this->tableName);
        $builder->select('shop_token.*, shop.*,
        ');
        $builder->join('shop', 'shop.shop_id = shop_token.shop_id');
        
        $builder->where($where);
        $query = $builder->get();
        return $query->getResultArray();
    }
    
}
