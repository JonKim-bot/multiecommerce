<?php namespace App\Models;

use App\Core\BaseModel;

class MetaModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "meta";
        $this->primaryKey = "meta_id";

    }


}
