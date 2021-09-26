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

    function get_transaction_by_customer($where = [],$limit = "")
    {
        $this->builder->select(
            'wallet_topup.*, customer.name AS customer, customer.name, customer.contact'
        );
        
        $this->builder->from($this->table_name);

        $this->builder->join(
            'customer',
            'wallet_topup.customer_id = customer.customer_id AND customer.deleted = 0',
            'left'
        );

        $this->builder->orderBy('wallet_topup.created_date DESC');

        if (!empty($where)) {
            $this->builder->where($where);
        }

        $query = $this->builder->get();
        return $query->getResultArray();
    }
}
?>
