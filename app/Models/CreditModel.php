<?php namespace App\Models;




use App\Core\BaseModel;

class CreditModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();

        $this->tableName = 'credit';
        $this->primaryKey = 'credit_id';

        

        $this->builder = $this->db->table($this->tableName);
    }

    function get_balance($merchant_id)
    {
        $balance = 0;
        $this->builder->select('*');
        $this->builder->from($this->table_name);
        $this->builder->where('merchant_id', $merchant_id);
        $this->builder->orderBy('credit_id', 'DESC');
        $query = $this->builder->get()->getResultArray();

        if (!empty($query)) {
            $balance = $query[0]['balance'];
        }
        return $balance;
    }
    function get_refferal_credit($merchant_id)
    {
        $balance = 0;
        $this->builder->select('*');
        $this->builder->from($this->table_name);
        $this->builder->where('merchant_id', $merchant_id);
        // $this->builder->where('credit.is_commissiontier', 1);
        $this->builder->orderBy('credit_id', 'DESC');
        $query = $this->builder->get()->getResultArray();

        if (!empty($query)) {
            $balance = $query[0]['balance'];
        }
        return $balance;
    }
    function record_top_up($merchant_id, $amount)
    {
        $data = [
            'merchant_id' => $merchant_id,
            'amount' => $amount,
        ];

        $top_up_id = $this->CreditTopUpModel->insertNew($data);
        return $top_up_id;
    }

    function credit_in($merchant_id, $amount, $remarks,$orders_id = 0)
    {
        $balance = $this->get_balance($merchant_id);

        $data = [
            'merchant_id' => $merchant_id,
            'credit_in' => $amount,
            'orders_id' => $orders_id,
            'balance' => $balance + $amount,

            'remarks' => $remarks,

        ];

        $this->insertNew($data);
    }
    function credit_commision_in($data)
    {
        $balance = $this->get_balance($data['merchant_id']);

        $data = [
            'merchant_id' => $data['merchant_id'],
            'credit_in' => $data['amount'],
            'is_commission' => 1,
            'percent' => $data['percent'],
            'balance' => $balance + $data['amount'],
            'remarks' => $data['remarks'],
        ];

        $this->insertNew($data);
    }


    function credit_out($merchant_id, $amount, $remarks, $voucher_id = '')
    {
        $balance = $this->get_balance($merchant_id);

        $data = [
            'merchant_id' => $merchant_id,
            'credit_out' => $amount,
            'balance' => $balance - $amount,
            'remarks' => $remarks,
            'voucher_id' => $voucher_id,
        ];
        // $customer_bank = $this->customer_model->get_customer_bank([
        //     'customer.merchant_id' => $merchant_id
        // ])[0];

        // $data_withdrawal = [
        //     'merchant_id' => $merchant_id,
        //     'amount' => $amount,
        //     'bank_account' => $customer_bank['bank_account'],
        //     'bank_name' => $customer_bank['bank_name'],
        //     'account_name' => $customer_bank['account_name'],
        // ];
        // $this->Credit_withdrawal_model->insert($data_withdrawal);
        $this->insertNew($data);
    }

    function finance($merchant_id, $data)
    {
        $balance = $this->get_balance($merchant_id);

        $data = [
            'merchant_id' => $merchant_id,
            'is_commissiontier' => 1,
            'credit_in' => $data['amount'],
            'balance' => $balance + $data['amount'],
            'remarks' => $data['remarks'],
        ];
        // $customer_bank = $this->customer_model->get_customer_bank([
        //     'customer.merchant_id' => $merchant_id
        // ])[0];

        // $data_withdrawal = [
        //     'merchant_id' => $merchant_id,

        //     'amount' => $amount,
        //     'bank_account' => $customer_bank['bank_account'],
        //     'bank_name' => $customer_bank['bank_name'],
        //     'account_name' => $customer_bank['account_name'],
        // ];
        // $this->Credit_withdrawal_model->insert($data_withdrawal);
        $this->insertNew($data);
    }

    function get_total_credit_in($merchant_id)
    {
        $this->builder->select('SUM(credit_in) as total_credit_in');
        $this->builder->from($this->table_name);
        $this->builder->where('merchant_id', $merchant_id);

        $query = $this->builder->get()->getResultArray();

        if (!empty($query)) {
            $result = $query[0]['total_credit_in'];
        } else {
            $result = 0;
        }

        return $result;
    }
    function get_total_received_credit($merchant_id)
    {
        
        $this->builder->select('SUM(credit_in) as total_credit_in');
        $this->builder->from($this->table_name);
        $this->builder->where('merchant_id', $merchant_id);
        $this->builder->where('is_commission', 1);

        $query = $this->builder->get()->getResultArray();

        if (!empty($query)) {
            $result = $query[0]['total_credit_in'];
        } else {
            $result = 0;
        }

        return $result;
    }
    
    
    function get_total_credit_out($merchant_id)
    {
        $this->builder->select('SUM(credit_out) as total_credit_out');
        $this->builder->from($this->table_name);
        $this->builder->where('merchant_id', $merchant_id);

        $query = $this->builder->get()->getResultArray();

        if (!empty($query)) {
            $result = $query[0]['total_credit_out'];
        } else {
            $result = 0;
        }

        return $result;
    }

    function get_transaction($limit = '', $page = 1, $filter = [], $where = [])
    {
        $this->builder->select(
            'credit.*, customer.name AS customer, customer.customername as name, customer.contact, (credit_in - credit_out) AS transaction'
        );
        $this->builder->from($this->table_name);
        $this->builder->join(
            'customer',
            'credit.merchant_id = customer.merchant_id AND customer.deleted = 0',
            'left'
        );
        $this->builder->orderBy('credit.created_date DESC');
        if (!empty($where)) {
            $this->builder->where($where);
        }
        if ($limit != '') {
            $count = $this->getCount($filter);
            $offset = ($page - 1) * $limit;
            $pages = $count / $limit;
            $pages = ceil($pages);

            $pagination = $this->getPaging(
                $limit,
                $offset,
                $page,
                $pages,
                $filter
            );

            return $pagination;
        } else {
            $query = $this->builder->get();
            return $query->getResultArray();
        }
    }
    function get_transaction_wherein($wherein, $where = [])
    {
        $this->builder->select(
            'credit.*, customer.name AS customer, customer.customername as name, customer.contact, (credit_in - credit_out) AS transaction'
        );
        $this->builder->from($this->table_name);
        $this->builder->join(

            'customer',
            'credit.merchant_id = customer.merchant_id AND customer.deleted = 0',
            'left'
        );
        $this->builder->orderBy('credit.created_date DESC');
        if (!empty($where)) {
            $this->builder->where($where);
        }
        $this->builder->whereIn('credit.merchant_id', $wherein);
        $query = $this->builder->get();
        return $query->getResultArray();
    }

    function get_transaction_by_customer($where = [],$limit = "")
    {
        $this->builder->select(
            'credit.*, customer.name AS customer, customer.name, customer.contact, (credit_in - credit_out) AS transaction'
        );
        $this->builder->from($this->table_name);
        $this->builder->join(
            'customer',
            'credit.merchant_id = customer.merchant_id AND customer.deleted = 0',
            'left'
        );

        $this->builder->orderBy('credit.created_date DESC');
        if (!empty($where)) {
            $this->builder->where($where);
        }

        $query = $this->builder->get();
        return $query->getResultArray();
    }
    function get_history($where, $limit, $page)
    {
        $this->builder->select(
            'credit.*, (credit_in - credit_out) AS credit_in'
        );
        $this->builder->from($this->table_name);
        $this->builder->where($where);
        $this->builder->orderBy('credit_id DESC');
        $this->builder->limit($limit, $page);

        $query = $this->builder->get();
        return $query->getResultArray();
    }

    function get_where($where, $limit = '', $page = 1, $filter = [])
    {
        $this->builder->select('credit.*');
        $this->builder->from($this->table_name);
        $this->builder->where($where);
        $this->builder->where('credit.deleted', 0);
        $this->builder->orderBy('credit.credit_id', 'DESC');

        if ($limit != '') {
            $count = $this->getCount($filter);
            $offset = ($page - 1) * $limit;
            $pages = $count / $limit;
            $pages = ceil($pages);
            $pagination = $this->getPaging(
                $limit,
                $offset,
                $page,
                $pages,
                $filter
            );

            return $pagination;
        } else {
            $query = $this->builder->get();
            return $query->getResultArray();
        }
    }

    function get_all_balance()
    {
        $customer = $this->builder
            ->query(
                'SELECT customer.merchant_id, customer.name as customer, customer.contact FROM credit JOIN customer ON customer.merchant_id = credit.merchant_id GROUP BY credit.merchant_id'
            )
            ->getResultArray();

        foreach ($customer as $key => $row) {
            $customer[$key]['balance'] = $this->get_balance($row['merchant_id']);
        }

        return $customer;
    }
}
?>
