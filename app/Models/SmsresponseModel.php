<?php namespace App\Models;

use App\Core\BaseModel;

class SmsresponseModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "sms_response";
        $this->primaryKey = "sms_response_id";

    }
    
    
}
