<?php namespace App\Models;

use App\Core\BaseModel;

class SpecialCategoryModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "special_category";
        $this->primaryKey = "special_category_id";

    }
    
  
}
