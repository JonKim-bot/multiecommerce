<?php namespace App\Models;


use App\Core\BaseModel;
use DateTime;

class ShopModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "shop";
        $this->primaryKey = "shop_id";

    }




    function getWhereNormal($where, $limit = '', $page = 1, $filter = array())
    {
        $builder = $this->db->table($this->tableName);
        $builder->select('shop.*, bank.bank,
        GROUP_CONCAT(tag.tag) AS categories,
        GROUP_CONCAT(tag.tag_id) AS categories_tag
        ');
        $builder->join('bank', 'shop.bank_id = bank.bank_id','left');
        $builder->join('shop_tag', 'shop.shop_id = shop_tag.shop_id','left');
        $builder->join('tag', 'tag.tag_id = shop_tag.tag_id','left');
        
        $builder->where($where);
        $query = $builder->get();
        return $query->getResultArray();
    }
    

    function getVersion($where = "", $limit = '', $page = 1, $filter = array())
    {
        $builder = $this->db->table($this->tableName);
        $builder->select('shop.* ');
        $builder->groupBy('shop.version');
        $builder->where('shop.version !=','');
        $query = $builder->get();
        return $query->getResultArray();
    }

    
    function getNumberOfMerchantWhogotfirstsales($where,$limit = "", $page = 1, $filter = array()){
        $first_sales_reached = [];
        $this->builder = $this->db->table($this->tableName);
        $this->builder->select('shop.created_at as register_date ,shop.*,
         orders.created_at as orders_first_date
        ');
        $this->builder->join('orders', 'orders.shop_id = shop.shop_id');
        $this->builder->orderBy('orders.orders_id','ASC');
        $this->builder->groupBy('orders.shop_id','DESC');
        $this->builder->where($where);

        if ($limit != '') {
            $count = $this->getCount($filter);
            $offset = ($page - 1) * $limit;
            $pages = $count / $limit;
            $pages = ceil($pages);
            
            $pagination = $this->getPaging($limit, $offset, $page, $pages, $filter,$this->builder);

            return $pagination;

            // intval($limit);
            // $this->db->limit($limit, $offset);
        }
        $query = $this->builder->get()->getResultArray();
        foreach($query as $key=> $row){
            $register_date = new DateTime($row['register_date']);
            $orders_first_date = ($row['orders_first_date']);
            $orders_date_after_14_dats = date('Y-m-d', strtotime($orders_first_date. ' + 14 days'));
            $orders_date_after_14_dats = new DateTime($orders_date_after_14_dats);
            $date_now = new DateTime();
  
            if($date_now <= $orders_date_after_14_dats){
                // havent reaced
            }else{
                //reached 
                $query[$key]['orders_date_after_14_dats'] = $orders_date_after_14_dats;
                array_push($first_sales_reached,$row);
            }
        }
        if(!empty($first_sales_reached)){
            return count($first_sales_reached);
        }else{
            return 0;
        }

        // return $query->getResultArray();
    }
    function getWhereLike($like,$where = "", $limit = '', $page = 1, $filter = array())
    {
        $builder = $this->db->table($this->tableName);
        $builder->select('shop.*, bank.bank,shop_tag.tag_id

        ');
        $builder->join('bank', 'shop.bank_id = bank.bank_id');
        $builder->join('shop_tag', 'shop_tag.shop_id = shop.shop_id','left');

        if($where['tag_id'] != "" && $where['tag_id'] != "All Category"){

            $builder->where('tag_id',$where['tag_id']);
        }
        if($where['area'] != "" && $where['area'] != "All Area"){

            $builder->where('state',$where['area']);
        }
        $builder->like($like);
        $builder->groupBy('shop.shop_id');

        $query = $builder->get();
        return $query->getResultArray();
    }
   
    function getWhereTop($limit = '', $page = 1, $filter = array())
    {
        $builder = $this->db->table($this->tableName);
        $builder->select('shop.*, bank.bank,sum(orders.grand_total) as total
        ');
        $builder->join('bank', 'shop.bank_id = bank.bank_id');
        $builder->join('orders', 'orders.shop_id = shop.shop_id');
        $builder->groupBy('shop.shop_id');
        $builder->orderBy('total','DESC');

        $builder->limit(3);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function getShopState($limit = '', $page = 1, $filter = array())
    {
        $builder = $this->db->table($this->tableName);
        $builder->select('shop.*
        ');

        $builder->groupBy('shop.state');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
