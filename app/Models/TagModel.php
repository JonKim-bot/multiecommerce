<?php namespace App\Models;

use App\Core\BaseModel;

class TagModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "tag";
        $this->primaryKey = "tag_id";

    }
    
    function getAllWithNumber($limit = '', $page = 1, $filter = array())
    {
        $builder = $this->db->table($this->tableName);
        $builder->select('tag.*, COUNT(shop_tag.tag_id) as numberofrow,
        ');
        $builder->join('shop_tag', 'shop_tag.tag_id = tag.tag_id','left');
        $builder->groupBy('tag.tag_id');
        $query = $builder->get();
        return $query->getResultArray();
    }

}
