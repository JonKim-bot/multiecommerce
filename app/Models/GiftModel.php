<?php namespace App\Models;

use App\Core\BaseModel;

class GiftModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "gift";
        $this->primaryKey = "gift_id";

    }
    // function getAll($limit = "", $page = 1, $filter = array()){
    //     $builder = $this->db->table($this->tableName);
    //     $builder->select('gift.*');
    //     $builder->where('gift.deleted',0);
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }
    // function getWhere($where,$limit = "", $page = 1, $filter = array()){
    //     $builder = $this->db->table($this->tableName);
    //     $builder->select('gift.*');
    //     $builder->where('gift.deleted',0);
    //     $builder->where($where);

    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }
    

}
