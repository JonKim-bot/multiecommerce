<?php namespace App\Models;

use App\Core\BaseModel;
use App\Models\PointModel;
use App\Models\OrdersModel;

class CustomerModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "customer";
        $this->primaryKey = "customer_id";
        $this->PointModel = new PointModel();
        $this->OrdersModel = new OrdersModel();

    }
    public function getAll($limit = '', $page = 1, $filter = array())
    {
        $this->builder->select($this->tableName . ".*,shop.shop_name");
        $this->builder->join('shop', 'shop.shop_id = '.$this->tableName.'.shop_id','left');
        $this->builder->where($this->tableName . ".deleted", 0);

        if ($limit != '') {
            $count = $this->getCount($filter);
            // die($this->builder->getCompiledSelect(false));
            $offset = ($page - 1) * $limit;
            $pages = $count / $limit;
            $pages = ceil($pages);
            
            $pagination = $this->getPaging($limit, $offset, $page, $pages, $filter,$this->builder);

            return $pagination;

            // intval($limit);
            // $this->db->limit($limit, $offset);
        }
        // die($this->builder->getCompiledSelect(false));

        $query = $this->builder->get();
        return $query->getResultArray();
        
    }
 

    function getWhere($where,$limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('customer.*, role.*');
        $builder->join('role', 'role.role_id = customer.role_id');
        $builder->where($where);
        // $builder->groupBy('order_customer.full_name');
        $query = $builder->get();
        return $query->getResultArray();
    }   
    public function getGroupTotalSales($customer_id)
    {
        // SELF
        //get user total topup
   
        //get user tier 1 referrals
        $this->builder = $this->db->table('customer');
        $this->builder->select("*");
        $this->builder->where("referal_id", $customer_id);
        $this->builder->where("deleted", 0);

        $customer = $this->builder->get()->getResultArray();

        //TIER 1
        //get tier 1 total topup
        $total = 0;
        foreach ($customer as $row) {
            $where = [
                'orders.is_paid' => 1,
                'orders.customer_id' => $row['customer_id']
            ];
            $orders = $this->OrdersModel->getWhere($where);
            if(!empty($orders)){
                $orders = $orders[0];
                $total+= $orders['grand_total'];
            }
        }

        return $total;
    }

    public function getSelfSales($customer_id)
    {
        // SELF
        //get user total topup
        $total = 0;

        //get user tier 1 referrals
        $where = [
            'orders.is_paid' => 1,
            'orders.customer_id' => $customer_id
        ];
        $orders = $this->OrdersModel->getWhere($where);
        if(!empty($orders)){
            $orders = $orders[0];
            $total+= $orders['grand_total'];
        }

        return $total;
    }
    public function getTree($customer_id)
    {
        $this->builder->select("*");
        $this->builder->where("referal_id", $customer_id);
        $this->builder->where("deleted", 0);

        $users = $this->builder->get()->getResultArray();
        foreach ($users as $key => $row) {
            $users[$key]['self_sales'] = $this->getSelfSales($row['customer_id']);
            $users[$key]['total_received_point'] = $this->PointModel->get_total_received_point($row['customer_id']);
            $users[$key]['group_sales'] = $this->getGroupTotalSales($row['customer_id']);

            $this->builder->select("*");
            $this->builder->where("referal_id", $row['customer_id']);
            $this->builder->where("deleted", 0);

            $child = $this->builder->get()->getResultArray();
            foreach ($child as $ckey => $crow) {
                $child[$ckey]['self_sales'] = $this->getSelfSales($crow['customer_id']);
                $child[$ckey]['total_received_point'] = $this->PointModel->get_total_received_point($crow['customer_id']);
                $child[$ckey]['group_sales'] = $this->getGroupTotalSales($crow['customer_id']);

                $this->builder->select("*");
                $this->builder->where("referal_id", $crow['customer_id']);
                $this->builder->where("deleted", 0);

                $gchild = $this->builder->get()->getResultArray();
                foreach ($gchild as $gkey => $grow) {
                    $gchild[$gkey]['self_sales'] = $this->getSelfSales($grow['customer_id']);
                    $gchild[$gkey]['total_received_point'] = $this->PointModel->get_total_received_point($grow['customer_id']);
                    $gchild[$gkey]['group_sales'] = $this->getGroupTotalSales($grow['customer_id']);
                }
                $child[$ckey]['child'] = $gchild;
            }
            $users[$key]['child'] = $child;
        }

        return $users;
    }
}
