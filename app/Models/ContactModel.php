<?php namespace App\Models;

use App\Core\BaseModel;

class ContactModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "contact";
        $this->primaryKey = "contact_id";

    }

 
}
