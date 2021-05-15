<?php namespace App\Models;


use App\Core\BaseModel;

class OrdersModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "orders";
        $this->primaryKey = "orders_id";

    }
    
    function getAll($limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('orders.*, order_customer.full_name,order_customer.contact,order_customer.address,
        order_customer.email,orders_status.orders_status,order_detail.product_name,
        order_detail.product_price,order_detail.product_quantity,order_detail.product_id,order_detail.product_total_price,
        product.*,shop.shop_name,payment_method.payment_method,,orders.created_at as created_date
        ');
        $builder->join('shop', 'orders.shop_id = shop.shop_id');
        $builder->join('payment_method', 'orders.payment_method_id = payment_method.payment_method_id','left');
        $builder->join('order_customer', 'order_customer.order_customer_id = orders.order_customer_id','left');
        $builder->join('orders_status', 'orders_status.orders_status_id = orders.orders_status_id','left');
        $builder->join('order_detail', 'order_detail.orders_id = orders.orders_id','left');
        $builder->join('product', 'product.product_id = order_detail.product_id','left');
        $builder->orderBy('orders.orders_id','DESC');

        $query = $builder->get();
        return $query->getResultArray();
    }
    function getWhere($where,$limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('orders.*, order_customer.full_name,order_customer.contact,order_customer.address,
        order_customer.email,orders_status.orders_status,order_detail.product_name,
        order_detail.product_price,order_detail.product_quantity,order_detail.product_id,order_detail.product_total_price,
        product.*,shop.shop_name,payment_method.payment_method,orders.created_at as created_date,promo.code,promo.offer_amount
        ');
        $builder->join('shop', 'orders.shop_id = shop.shop_id');
        $builder->join('payment_method', 'orders.payment_method_id = payment_method.payment_method_id','left');
        $builder->join('order_customer', 'order_customer.order_customer_id = orders.order_customer_id','left');
        $builder->join('orders_status', 'orders_status.orders_status_id = orders.orders_status_id','left');
        $builder->join('order_detail', 'order_detail.orders_id = orders.orders_id','left');
        $builder->join('product', 'product.product_id = order_detail.product_id','left');
        $builder->join('promo', 'promo.promo_id = orders.promo_id','left');

        $builder->groupBy('orders.orders_id');
        
        $builder->where($where);
        $builder->orderBy('orders.orders_id','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }
    function getWhereHistory($where,$limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('orders.*, order_customer.full_name,order_customer.contact,order_customer.address,
        order_customer.email,orders_status.orders_status,order_detail.product_name,
        order_detail.product_price,order_detail.product_quantity,order_detail.product_id,order_detail.product_total_price,
        ,orders.created_at as created_date,
        product.*,shop.shop_name,shop.image,shop.icon,shop.address,shop.slug,shop.lat,shop.lng,shop.url,payment_method.payment_method
        ');
        $builder->join('shop', 'orders.shop_id = shop.shop_id');
        $builder->join('payment_method', 'orders.payment_method_id = payment_method.payment_method_id');

        $builder->join('order_customer', 'order_customer.order_customer_id = orders.order_customer_id');
        $builder->join('orders_status', 'orders_status.orders_status_id = orders.orders_status_id');
        $builder->join('order_detail', 'order_detail.orders_id = orders.orders_id');
        $builder->join('product', 'product.product_id = order_detail.product_id');
        $builder->groupBy('orders.orders_id');
        
        $builder->where($where);
        $builder->orderBy('orders.orders_id','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }
    
    function getStatic($where,$limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('sum(orders.grand_total) as total');
     
        // $this->debug($where);
        $builder->where($where);
        $wherenot = [
            '1' , '5'
        ];
        $builder->whereNotIn('orders_status_id',$wherenot);
        $builder->orderBy('orders.orders_id','DESC');



        $query = $builder->get();
        return $query->getResultArray();
    }
  
   
}
