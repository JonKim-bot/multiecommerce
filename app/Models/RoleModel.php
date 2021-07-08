<?php namespace App\Models;

use App\Core\BaseModel;

class PromoModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "promo";
        $this->primaryKey = "promo_id";

    }


    // function getAll($limit = '', $page = 1, $filter = array())
    // {
    //     $builder = $this->db->table($this->tableName);
    //     // GROUP_CONCAT(slider.slider_image) AS slider
    //     $builder->select('article.*, category.category');
    //     $builder->join('category', 'article.article_type = category.category_id');
    //     $builder->where('article.deleted',0);
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }

    // function getWhere($where,$limit = '', $page = 1, $filter = array())
    // {
    //     $builder = $this->db->table($this->tableName);
    //     // GROUP_CONCAT(slider.slider_image) AS slider
    //     $builder->select('article.*,category.category');
    //     $builder->join('category', 'article.article_type = category.category_id');
    //     $builder->where($where);
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }
}
