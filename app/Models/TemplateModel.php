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
}
