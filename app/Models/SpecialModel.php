<?php namespace App\Models;

use App\Core\BaseModel;

class SpecialModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "special";
        $this->primaryKey = "special_id";

    }
    
  
}
