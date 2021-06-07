<?php namespace App\Models;


use App\Core\BaseModel;

class PointModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();

        $this->tableName = 'point';
        $this->primaryKey = 'point_id';

        

        $this->builder = $this->db->table($this->tableName);
    }

    function get_balance($customer_id)
    {
        $balance = 0;
        $this->builder->select('*');
        $this->builder->from($this->table_name);
        $this->builder->where('customer_id', $customer_id);
        $this->builder->orderBy('point_id', 'DESC');
        $query = $this->builder->get()->getResultArray();

        if (!empty($query)) {
            $balance = $query[0]['balance'];
        }
        return $balance;
    }
    function get_refferal_point($customer_id)
    {
        $balance = 0;
        $this->builder->select('*');
        $this->builder->from($this->table_name);
        $this->builder->where('customer_id', $customer_id);
        // $this->builder->where('point.is_commissiontier', 1);
        $this->builder->orderBy('point_id', 'DESC');
        $query = $this->builder->get()->getResultArray();

        if (!empty($query)) {
            $balance = $query[0]['balance'];
        }
        return $balance;
    }
    function record_top_up($customer_id, $amount)
    {
        $data = [
            'customer_id' => $customer_id,
            'amount' => $amount,
        ];

        $top_up_id = $this->PointTopUpModel->insertNew($data);
        return $top_up_id;
    }

    function point_in($customer_id, $amount, $remarks,$orders_id)
    {
        $balance = $this->get_balance($customer_id);

        $data = [
            'customer_id' => $customer_id,
            'point_in' => $amount,
            'orders_id' => $orders_id,
            'balance' => $balance + $amount,
            'remarks' => $remarks,

        ];

        $this->insertNew($data);
    }
    function point_commision_in($data)
    {
        $balance = $this->get_balance($data['customer_id']);

        $data = [
            'customer_id' => $data['customer_id'],
            'point_in' => $data['amount'],
            'is_commission' => 1,
            'percent' => $data['percent'],
            'balance' => $balance + $data['amount'],
            'remarks' => $data['remarks'],
        ];

        $this->insertNew($data);
    }

    function point_out($customer_id, $amount, $remarks, $voucher_id = '')
    {
        $balance = $this->get_balance($customer_id);

        $data = [
            'customer_id' => $customer_id,
            'point_out' => $amount,
            'balance' => $balance - $amount,
            'remarks' => $remarks,
            'voucher_id' => $voucher_id,
        ];
        // $customer_bank = $this->customer_model->get_customer_bank([
        //     'customer.customer_id' => $customer_id
        // ])[0];

        // $data_withdrawal = [
        //     'customer_id' => $customer_id,
        //     'amount' => $amount,
        //     'bank_account' => $customer_bank['bank_account'],
        //     'bank_name' => $customer_bank['bank_name'],
        //     'account_name' => $customer_bank['account_name'],
        // ];
        // $this->Point_withdrawal_model->insert($data_withdrawal);
        $this->insertNew($data);
    }

    function finance($customer_id, $data)
    {
        $balance = $this->get_balance($customer_id);

        $data = [
            'customer_id' => $customer_id,
            'is_commissiontier' => 1,
            'point_in' => $data['amount'],
            'balance' => $balance + $data['amount'],
            'remarks' => $data['remarks'],
        ];
        // $customer_bank = $this->customer_model->get_customer_bank([
        //     'customer.customer_id' => $customer_id
        // ])[0];

        // $data_withdrawal = [
        //     'customer_id' => $customer_id,

        //     'amount' => $amount,
        //     'bank_account' => $customer_bank['bank_account'],
        //     'bank_name' => $customer_bank['bank_name'],
        //     'account_name' => $customer_bank['account_name'],
        // ];
        // $this->Point_withdrawal_model->insert($data_withdrawal);
        $this->insertNew($data);
    }

    function get_total_point_in($customer_id)
    {
        $this->builder->select('SUM(point_in) as total_point_in');
        $this->builder->from($this->table_name);
        $this->builder->where('customer_id', $customer_id);

        $query = $this->builder->get()->getResultArray();

        if (!empty($query)) {
            $result = $query[0]['total_point_in'];
        } else {
            $result = 0;
        }

        return $result;
    }
    
    function get_total_point_out($customer_id)
    {
        $this->builder->select('SUM(point_out) as total_point_out');
        $this->builder->from($this->table_name);
        $this->builder->where('customer_id', $customer_id);

        $query = $this->builder->get()->getResultArray();

        if (!empty($query)) {
            $result = $query[0]['total_point_out'];
        } else {
            $result = 0;
        }

        return $result;
    }

    function get_transaction($limit = '', $page = 1, $filter = [], $where = [])
    {
        $this->builder->select(
            'point.*, customer.name AS customer, customer.customername as name, customer.contact, (point_in - point_out) AS transaction'
        );
        $this->builder->from($this->table_name);
        $this->builder->join(
            'customer',
            'point.customer_id = customer.customer_id AND customer.deleted = 0',
            'left'
        );
        $this->builder->orderBy('point.created_date DESC');
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
            'point.*, customer.name AS customer, customer.customername as name, customer.contact, (point_in - point_out) AS transaction'
        );
        $this->builder->from($this->table_name);
        $this->builder->join(

            'customer',
            'point.customer_id = customer.customer_id AND customer.deleted = 0',
            'left'
        );
        $this->builder->orderBy('point.created_date DESC');
        if (!empty($where)) {
            $this->builder->where($where);
        }
        $this->builder->whereIn('point.customer_id', $wherein);
        $query = $this->builder->get();
        return $query->getResultArray();
    }

    function get_transaction_by_customer($where = [])
    {
        $this->builder->select(
            'point.*, customer.name AS customer, customer.name, customer.contact, (point_in - point_out) AS transaction'
        );
        $this->builder->from($this->table_name);
        $this->builder->join(
            'customer',
            'point.customer_id = customer.customer_id AND customer.deleted = 0',
            'left'
        );
        $this->builder->orderBy('point.created_date DESC');
        if (!empty($where)) {
            $this->builder->where($where);
        }

        $query = $this->builder->get();
        return $query->getResultArray();
    }
    function get_history($where, $limit, $page)
    {
        $this->builder->select(
            'point.*, (point_in - point_out) AS point_in'
        );
        $this->builder->from($this->table_name);
        $this->builder->where($where);
        $this->builder->orderBy('point_id DESC');
        $this->builder->limit($limit, $page);

        $query = $this->builder->get();
        return $query->getResultArray();
    }

    function get_where($where, $limit = '', $page = 1, $filter = [])
    {
        $this->builder->select('point.*');
        $this->builder->from($this->table_name);
        $this->builder->where($where);
        $this->builder->where('point.deleted', 0);
        $this->builder->orderBy('point.point_id', 'DESC');

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
                'SELECT customer.customer_id, customer.name as customer, customer.contact FROM point JOIN customer ON customer.customer_id = point.customer_id GROUP BY point.customer_id'
            )
            ->getResultArray();

        foreach ($customer as $key => $row) {
            $customer[$key]['balance'] = $this->get_balance($row['customer_id']);
        }

        return $customer;
    }
}
?>
