<?php namespace App\Models;

use App\Core\BaseModel;

class AdminModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "admin";
        $this->primaryKey = "admin_id";

    }

    public function getWhere($where,$limit = '', $page = 1, $filter = array())
    {
        $this->builder->select('*');
        $this->builder->join("role", $this->tableName . '.role_id = role.role_id', 'left');
        $this->builder->where($this->tableName . ".deleted", 0);
        $query = $this->builder->get();
        return $query->getResultArray();
        
    }
}
