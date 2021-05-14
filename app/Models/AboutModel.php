<?php namespace App\Models;

use App\Core\BaseModel;

class AboutModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "about";
        $this->primaryKey = "about_id";

    }
}
