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
        product.*,shop.shop_name,payment_method.payment_method,orders.created_at as created_date ,orders.created_at as created_date_,promo.code,promo.offer_amount
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

    // function getAvaliableVoucher($customer_id,$amount){
    //     $where = [
    //         'orders.grand_total >=' => $amount,
    //         'orders.customer_id' => $customer_id,
    //         'customer_gift.orders_id'
    //     ];
    //     $builder = $this->db->table($this->tableName);
    //     $builder->select('orders.*, order_customer.full_name,order_customer.contact,order_customer.address,
    //     order_customer.email,orders_status.orders_status,order_detail.product_name,
    //     order_detail.product_price,order_detail.product_quantity,order_detail.product_id,order_detail.product_total_price,
    //     product.*,shop.shop_name,payment_method.payment_method,orders.created_at as created_date ,orders.created_at as created_date_,promo.code,promo.offer_amount
    //     ');
    //     $builder->join('shop', 'orders.shop_id = shop.shop_id');
    //     $builder->join('payment_method', 'orders.payment_method_id = payment_method.payment_method_id','left');
    //     $builder->join('order_customer', 'order_customer.order_customer_id = orders.order_customer_id','left');
    //     $builder->join('orders_status', 'orders_status.orders_status_id = orders.orders_status_id','left');
    //     $builder->join('order_detail', 'order_detail.orders_id = orders.orders_id','left');
    //     $builder->join('product', 'product.product_id = order_detail.product_id','left');
    //     $builder->join('promo', 'promo.promo_id = orders.promo_id','left');
    //     $builder->join('customer_gift', 'customer_gift.orders_id = orders.orders_id','left');

    //     $builder->groupBy('orders.orders_id');
        
    //     $builder->where($where);
    //     $builder->orderBy('orders.orders_id','DESC');
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }


    function getHistory($keyword,$shop_id){
        $builder = $this->db->table($this->tableName);
        $builder->select('orders.*,orders.created_at as created_date ,orders.created_at as created_date_,order_customer.email as email_order_cus,customer.email as email_cus,customer.contact as contact_cus,order_customer.contact');
        $builder->join('order_customer', 'order_customer.order_customer_id = orders.order_customer_id','left');
        $builder->join('customer', 'customer.customer_id = orders.customer_id','left');
        $builder->join('orders_status', 'orders_status.orders_status_id = orders.orders_status_id','left');

        
        $builder->orWhere('customer.email =', $keyword);
        $builder->orWhere('customer.contact =', $keyword);
        $builder->orWhere('order_customer.email =', $keyword);
        $builder->orWhere('order_customer.contact =', $keyword);
        $builder->where('orders.shop_id =', $shop_id);

        $builder->orderBy('orders.orders_id','DESC');
        $builder->groupBy('orders.orders_id');
        $query = $builder->get();
        return $query->getResultArray();
    }
    
    function getClosed($where){
        $builder = $this->db->table($this->tableName);
        $builder->select('orders.*');
        $builder->where($where);
        $builder->orderBy('orders.grand_total','ASC');
        $builder->limit(1);
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

    function get_total_today_orders($shop_id){
        $where = [
            'orders.shop_id' => $shop_id,
            'DATE(orders.created_at)' => date('Y-m-d')
        ];
        $builder = $this->db->table($this->tableName);
        $builder->select('sum(orders.grand_total) as total');
     
        // $this->debug($where);
        $builder->where($where);
        $wherenot = [
            '1' , '5'
        ];
        // $builder->whereNotIn('orders_status_id',$wherenot);
        $builder->orderBy('orders.orders_id','DESC');
        $total = 0;
        $query = $builder->get()->getResultArray();
        if(!empty($query)){
            if($query[0]['total'] != null){

                return $query[0]['total'];
            }else{
                return $total;
            }
        }else{
            return $total;
        }
    }

    function get_total_number_orders($shop_id){
        $where = [
            'orders.shop_id' => $shop_id,
            'DATE(orders.created_at)' => date('Y-m-d')
        ];
        $builder = $this->db->table($this->tableName);
        $builder->select('*');
     
        // $this->debug($where);
        $builder->where($where);
        $wherenot = [
            '1' , '5'
        ];
        // $builder->whereNotIn('orders_status_id',$wherenot);
        $builder->orderBy('orders.orders_id','DESC');

        $query = $builder->get();
        return count($query->getResultArray());
    }
    function get_new_registered_member($shop_id){
        $where = [
            'customer.shop_id' => $shop_id,

            'DATE(customer.created_date)' => date('Y-m-d')
        ];
        $builder = $this->db->table('customer');
        $builder->select('*');
     
        // $this->debug($where);
        $builder->where($where);
       
        $query = $builder->get();
        return count($query->getResultArray());
    }
    function get_days($date_from,$date_to){

        $date_from = strtotime($date_from,);
        $date_to = strtotime($date_to,);
        $days = $date_to - $date_from;
        $days = ($days / (60 * 60 * 24));

        return $days;
    }
    function get_total_sales($shop_id,$date_from,$date_to){
        $full_data = array();

        $where = [
            'DATE(orders.created_at) >=' => $date_from,
            'DATE(orders.created_at) <='  => $date_to,

        ];
        $days = $this->get_days($date_from,$date_to);
        for ($i = 0; $i <= $days; $i++) {
            $current = Date('Y-m-d', strtotime($date_from . " +" . $i . " days"));
            $where = [
                'orders.shop_id' => $shop_id,
                'DATE(orders.created_at)'  => $current,
                'orders.is_paid' => 1

            ];
            $builder = $this->db->table($this->tableName);
            $builder->select('sum(orders.grand_total) as total,DATE(orders.created_at) as created_at');
            $builder->where($where);
           
            $builder->orderBy('orders.orders_id','ASC');
    
            $result = $builder->get()->getResultArray();
            $data = [
                'created_at' => $current,
                'total' => $result[0]['total'] ? $result[0]['total'] : 0
            ];
            array_push($full_data, $data);

        }
        return $full_data;
        // $this->debug($where);
    }

    function get_total_order($shop_id,$date_from,$date_to){
        $full_data = array();

    
        $days = $this->get_days($date_from,$date_to);
        for ($i = 0; $i <= $days; $i++) {
            $current = Date('Y-m-d', strtotime($date_from . " +" . $i . " days"));
            $where = [
                'orders.shop_id' => $shop_id,
                'DATE(orders.created_at)'  => $current,
                'orders.is_paid' => 1

            ];
            $builder = $this->db->table($this->tableName);
            $builder->select('count(orders_id) as total,DATE(orders.created_at) as created_at');
            $builder->where($where);

            $builder->orderBy('orders.orders_id','ASC');
    
            $result = $builder->get()->getResultArray();
            $data = [
                'created_at' => $current,
                'total' => $result[0]['total'] ? $result[0]['total'] : 0
            ];
            array_push($full_data, $data);

        }
        return $full_data;
        // $this->debug($where);
    }

    function get_rate($shop_id,$date_from,$date_to){
        $full_data = array();

        for ($i = 0; $i <= 24 ; $i++) {
            
            $builder = $this->db->table($this->tableName);
            $builder->select('count(orders_id) as total,HOUR(created_at) as hour');
            $where = [
                'DATE(orders.created_at) >=' => $date_from,
                'DATE(orders.created_at) <='  => $date_to,
                'HOUR(orders.created_at)' => round($i,2) . ": 00",
                'orders.shop_id' => $shop_id,

            ];
            $builder->where($where);

            $builder->orderBy('orders.orders_id','ASC');
    
            $result = $builder->get()->getResultArray();
            $data = $result;
            $data = [
                'hour' => round($i,2) . ": 00",
                'total' => $result[0]['total'] ? $result[0]['total'] : 0
            ];
            array_push($full_data, $data);

        }
        return $full_data;

        // $this->debug($where);
    }
    function get_new_register($shop_id,$date_from,$date_to){
        $full_data = array();

        $days = $this->get_days($date_from,$date_to);
        for ($i = 0; $i <= $days; $i++) {
            $current = Date('Y-m-d', strtotime($date_from . " +" . $i . " days"));
            $where = [
                'customer.shop_id' => $shop_id,
                'DATE(customer.created_date)'  => $current,
            ];
            $builder = $this->db->table('customer');
            $builder->select('count(customer_id) as total,DATE(customer.created_date) as created_date');
            $builder->where($where);
         
    
            $result = $builder->get()->getResultArray();
            $data = [
                'created_at' => $current,
                'total' => $result[0]['total'] ? $result[0]['total'] : 0
            ];
            array_push($full_data, $data);

        }
        return $full_data;

        // $this->debug($where);
    }

    function get_top_product($shop_id,$date_from,$date_to){
        $full_data = array();
        $where = [
            'DATE(order_detail.created_at) >=' => $date_from,
            'DATE(order_detail.created_at) <='  => $date_to,
            'orders.shop_id' => $shop_id,
            'orders.is_paid' => 1
        ];
        $days = $this->get_days($date_from,$date_to);
        
        $builder = $this->db->table('order_detail');
        $builder->select('product.*,sum(order_detail.product_quantity) as total,DATE(order_detail.created_at) as created_date');
        $builder->join('product', 'product.product_id = order_detail.product_id','left');
        $builder->join('orders', 'orders.orders_id = order_detail.orders_id');

        $builder->where($where);
        $builder->groupBy('order_detail.product_id');
        $builder->orderBy('total','DESC');

        $result = $builder->get()->getResultArray();
        return $result;
    }

    // function get_top_product_cat($shop_id,$date_from,$date_to){
    //     $full_data = array();
    //     $where = [
    //         'DATE(order_detail.created_at) >=' => $date_from,
    //         'DATE(order_detail.created_at) <='  => $date_to,
    //         'orders.shop_id' => $shop_id,
    //         'orders.is_paid' => 1
    //     ];
    //     $days = $this->get_days($date_from,$date_to);
        
    //     $builder = $this->db->table('order_detail');
    //         $builder->select('product.*,GROUP_CONCAT(product_category.category_id) AS category_id,sum(order_detail.product_quantity) as total,DATE(order_detail.created_at) as created_date');
    //     $builder->join('product', 'product.product_id = order_detail.product_id','left');
    //     $builder->join('orders', 'orders.orders_id = order_detail.orders_id');
    //     $builder->join('product_category', 'product_category.product_id = product.product_id');

    //     $builder->where($where);
    //     $builder->groupBy('orders.orders_id');

    //     $builder->orderBy('total','DESC');

    //     $result = $builder->get()->getResultArray();
    //     return $result;
    // }
    function get_top_product_cat($shop_id,$date_from,$date_to){
        $full_data = array();
        $where = [
            'DATE(order_detail.created_at) >=' => $date_from,
            'DATE(order_detail.created_at) <='  => $date_to,
            'orders.shop_id' => $shop_id,
            'orders.is_paid' => 1
        ];
        $days = $this->get_days($date_from,$date_to);
        
        $builder = $this->db->table('order_detail');
        $builder->select('product.*,sum(order_detail.product_quantity) as total,DATE(order_detail.created_at) as created_date');
        $builder->join('product', 'product.product_id = order_detail.product_id','left');
        $builder->join('orders', 'orders.orders_id = order_detail.orders_id');

        $builder->where($where);
        $builder->groupBy('order_detail.product_id');
        $builder->orderBy('total','DESC');

        $result = $builder->get()->getResultArray();
        return $result;
    }


        // $this->debug($where);
  
  
   
}
