<?php namespace App\Models;




use App\Core\BaseModel;

class WalletTopupModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();

        $this->tableName = 'wallet_topup';
        $this->primaryKey = 'wallet_topup_id';
        

        $this->builder = $this->db->table($this->tableName);
    }

}
?>
