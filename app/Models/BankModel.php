<?php namespace App\Models;

use App\Core\BaseModel;

class BankModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "bank";
        $this->primaryKey = "bank_id";

    }

    
}
