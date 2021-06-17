<?php namespace App\Models;

use App\Core\BaseModel;

class SmsSentModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "sms_sent";
        $this->primaryKey = "sms_sent_id";

    }
    
  
}
