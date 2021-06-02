<?php namespace App\Models;

use App\Core\BaseModel;

class PremierResponseModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "premier_response";
        $this->primaryKey = "premier_response_id";

    }
}
