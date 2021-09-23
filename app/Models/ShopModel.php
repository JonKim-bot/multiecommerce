<?php namespace App\Models;


use App\Core\BaseModel;

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
