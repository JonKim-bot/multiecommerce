<?php namespace App\Models;


use App\Core\BaseModel;

class PointModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();

        $this->tableName = 'point';
        $this->primaryKey = 'point_id';
        $this->PointTopUpModel = new PointTopUpModel();

        

        $this->builder = $this->db->table($this->tableName);
    }

    function get_balance($user_id)
    {
        $balance = 0;
        $this->builder->select('*');
        $this->builder->from($this->table_name);
        $this->builder->where('user_id', $user_id);
        $this->builder->where('is_commissiontier !=', '1');
        $this->builder->orderBy('point_id', 'DESC');
        $query = $this->builder->get()->getResultArray();

        if (!empty($query)) {
            $balance = $query[0]['balance'];
        }
        return $balance;
    }
    function get_refferal_point($user_id)
    {
        $balance = 0;
        $this->builder->select('*');
        $this->builder->from($this->table_name);
        $this->builder->where('user_id', $user_id);
        // $this->builder->where('point.is_commissiontier', 1);
        $this->builder->orderBy('point_id', 'DESC');
        $query = $this->builder->get()->getResultArray();

        if (!empty($query)) {
            $balance = $query[0]['balance'];
        }
        return $balance;
    }
    function record_top_up($user_id, $amount)
    {
        $data = [
            'user_id' => $user_id,
            'amount' => $amount,
        ];

        $top_up_id = $this->PointTopUpModel->insertNew($data);
        return $top_up_id;
    }

    function point_in($user_id, $amount, $remarks)
    {
        $balance = $this->get_balance($user_id);

        $data = [
            'user_id' => $user_id,
            'point_in' => $amount,
            'balance' => $balance + $amount,
            'remarks' => $remarks,
        ];

        $this->insertNew($data);
    }

    function point_out($user_id, $amount, $remarks, $voucher_id = '')
    {
        $balance = $this->get_balance($user_id);

        $data = [
            'user_id' => $user_id,
            'point_out' => $amount,
            'balance' => $balance - $amount,
            'remarks' => $remarks,
            'voucher_id' => $voucher_id,
        ];
        // $user_bank = $this->user_model->get_user_bank([
        //     'user.user_id' => $user_id
        // ])[0];

        // $data_withdrawal = [
        //     'user_id' => $user_id,
        //     'amount' => $amount,
        //     'bank_account' => $user_bank['bank_account'],
        //     'bank_name' => $user_bank['bank_name'],
        //     'account_name' => $user_bank['account_name'],
        // ];
        // $this->Point_withdrawal_model->insert($data_withdrawal);
        $this->insertNew($data);
    }

    function finance($user_id, $data)
    {
        $balance = $this->get_balance($user_id);

        $data = [
            'user_id' => $user_id,
            'is_commissiontier' => 1,
            'point_in' => $data['amount'],
            'balance' => $balance + $data['amount'],
            'remarks' => $data['remarks'],
        ];
        // $user_bank = $this->user_model->get_user_bank([
        //     'user.user_id' => $user_id
        // ])[0];

        // $data_withdrawal = [
        //     'user_id' => $user_id,

        //     'amount' => $amount,
        //     'bank_account' => $user_bank['bank_account'],
        //     'bank_name' => $user_bank['bank_name'],
        //     'account_name' => $user_bank['account_name'],
        // ];
        // $this->Point_withdrawal_model->insert($data_withdrawal);
        $this->insertNew($data);
    }

    function get_total_point_in($user_id)
    {
        $this->builder->select('SUM(point_in) as total_point_in');
        $this->builder->from($this->table_name);
        $this->builder->where('user_id', $user_id);

        $query = $this->builder->get()->getResultArray();

        if (!empty($query)) {
            $result = $query[0]['total_point_in'];
        } else {
            $result = 0;
        }

        return $result;
    }
    
    function get_total_point_out($user_id)
    {
        $this->builder->select('SUM(point_out) as total_point_out');
        $this->builder->from($this->table_name);
        $this->builder->where('user_id', $user_id);

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
            'point.*, user.name AS user, user.username as name, user.contact, (point_in - point_out) AS transaction'
        );
        $this->builder->from($this->table_name);
        $this->builder->join(
            'user',
            'point.user_id = user.user_id AND user.deleted = 0',
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
            'point.*, user.name AS user, user.username as name, user.contact, (point_in - point_out) AS transaction'
        );
        $this->builder->from($this->table_name);
        $this->builder->join(

            'user',
            'point.user_id = user.user_id AND user.deleted = 0',
            'left'
        );
        $this->builder->orderBy('point.created_date DESC');
        if (!empty($where)) {
            $this->builder->where($where);
        }
        $this->builder->whereIn('point.user_id', $wherein);
        $query = $this->builder->get();
        return $query->getResultArray();
    }

    function get_transaction_by_user($where = [])
    {
        $this->builder->select(
            'point.*, user.name AS user, user.name, user.contact, (point_in - point_out) AS transaction'
        );
        $this->builder->from($this->table_name);
        $this->builder->join(
            'user',
            'point.user_id = user.user_id AND user.deleted = 0',
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
        $user = $this->builder
            ->query(
                'SELECT user.user_id, user.name as user, user.contact FROM point JOIN user ON user.user_id = point.user_id GROUP BY point.user_id'
            )
            ->getResultArray();

        foreach ($user as $key => $row) {
            $user[$key]['balance'] = $this->get_balance($row['user_id']);
        }

        return $user;
    }
}
?>
