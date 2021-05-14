<?php namespace App\Models;

use App\Core\BaseModel;

class SpecialImageModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "special_image";
        $this->primaryKey = "special_image_id";

    }
    
  
}
