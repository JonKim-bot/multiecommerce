<?php namespace App\Models;

use App\Core\BaseModel;

class ProductCategoryModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();


    }

    public function getWhere($where, $limit = '', $page = 1, $filter = array())
    {
        $this->builder = $this->db->table($this->tableName);
        $this->builder->select("product_category.*,category.category");
        $this->builder->join('category', 'product_category.category_id = category.category_id');

        $this->builder->where($where);

        // die($this->builder->getCompiledSelect(false));

        $query = $this->builder->get();
        return $query->getResultArray();

    }

    function getSlugID($slug){
        $this->builder = $this->db->table('slug');
        $this->builder->select("*");
        $this->builder->where("slug", $slug);

        $slug = $this->builder->get()->getResultArray();

        if(empty($slug)){
            // die($this->builder->getCompiledSelect(false));
            return "all";
        } else {
            $slug = $slug[0];
            $field = "";
            switch($slug['type']){
                case "area":
                    $field = "name";
                    break;
                case "activity":
                    $field = "title";
                    break;
                case "category":
                    $field = "category";
                    break;
            }

            $this->builder = $this->db->table($slug['type']);
            $this->builder->select("*");
            $this->builder->where("slug_id", $slug['slug_id']);

            $result = $this->builder->get()->getResultArray()[0];
            return $result[$slug['type'] . "_id"];
        }
    }

}
