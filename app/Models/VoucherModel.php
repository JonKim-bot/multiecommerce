<?php namespace App\Models;

use App\Core\BaseModel;

class VoucherModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "voucher";
        $this->primaryKey = "voucher_id";

    }
}
