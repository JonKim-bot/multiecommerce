<?php namespace App\Models;

use App\Core\BaseModel;

class NotificationResponseModel extends BaseModel
{

    public function __construct()
    {


        parent::__construct();

        $this->tableName = "notification_response";
        $this->primaryKey = "notification_response_id";

    }

}
