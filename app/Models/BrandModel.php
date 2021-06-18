<?php namespace App\Models;

use App\Core\BaseModel;

class BrandModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "brand";
        $this->primaryKey = "brand_id";

    }
    public function getAll($limit = '', $page = 1, $filter = array())
    {
        $this->builder->select($this->tableName . ".*,shop.shop_name");
        $this->builder->join('shop', 'shop.shop_id = '.$this->tableName.'.shop_id','left');
        
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
        // die($this->builder->getCompiledSelect(false));

        $query = $this->builder->get();
        return $query->getResultArray();
        
    }
}
