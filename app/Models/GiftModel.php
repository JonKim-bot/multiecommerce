<?php namespace App\Models;

use App\Core\BaseModel;

class GiftModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "gift";
        $this->primaryKey = "gift_id";

    }
}
