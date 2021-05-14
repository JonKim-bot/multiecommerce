<?php namespace App\Models;

use App\Core\BaseModel;

class CategoryModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "category";
        $this->primaryKey = "category_id";

    }
    
  
}
