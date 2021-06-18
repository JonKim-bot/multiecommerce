<?php namespace App\Models;

use App\Core\BaseModel;

class CategoryModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        // $this->tableName = "category";
        // $this->primaryKey = "category_id";

    }
        
    public function getAllAdmin($limit = '', $page = 1, $filter = array())
    {
        $this->builder->select("category.*,shop.*");
        $this->builder->join('shop', 'shop.shop_id = category.shop_id','left');
        $this->builder->where($this->tableName . ".deleted", 0);

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

    public function getAll($limit = '', $page = 1, $filter = array())
    {
        $this->builder->select("category.*,shop.*");
        $this->builder->join('shop', 'shop.shop_id = category.shop_id','left');
        
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

    public function getWhereIn($whereIn, $limit = '', $page = 1, $filter = array())
    {
        $this->builder->select('*');
        $this->builder->whereIn('category.category_id',$whereIn);


        if ($limit != '') {
            $count = $this->getCount($filter);
            $offset = ($page - 1) * $limit;
            $pages = $count / $limit;
            $pages = ceil($pages);
            $pagination = $this->getPaging($limit, $offset, $page, $pages, $filter);

            return $pagination;

            // intval($limit);
            // $this->db->limit($limit, $offset);
        }

        // if(!empty($where['customer_id'])){
        // }

        $query = $this->builder->get();

        return $query->getResultArray();

    }
}
