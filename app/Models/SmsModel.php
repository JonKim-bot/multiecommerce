<?php namespace App\Models;

use App\Core\BaseModel;

class SmsModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "sms";
        $this->primaryKey = "sms_id";

    }
    
  
}
