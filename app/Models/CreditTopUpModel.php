<?php namespace App\Models;

use App\Core\BaseModel;

class CreditTopUpModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "credit_top_up";
        $this->primaryKey = "credit_top_up_id";

    }
    
  
}
