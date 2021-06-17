<?php namespace App\Models;

use App\Core\BaseModel;

class CreditModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "credit";
        $this->primaryKey = "credit_id";

    }
    
  
}
