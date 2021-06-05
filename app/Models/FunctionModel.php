<?php namespace App\Models;

use App\Core\BaseModel;

class FunctionModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "function";
        $this->primaryKey = "function_id";

    }
}
