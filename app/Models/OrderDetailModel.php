<?php namespace App\Models;

use App\Core\BaseModel;

class OrderDetailModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "order_detail";
        $this->primaryKey = "order_detail_id";

    }
    function getWhere($where,$limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('order_detail.*, product.image,product.product_name,
        GROUP_CONCAT(order_detail_option.product_option_selection_id) AS product_option_selection_id
        ');
        // ,product_option_selection.product_option_name as selection_name,product_option.name as option_name
        $builder->join('product', 'product.product_id = order_detail.product_id');
        $builder->join('order_detail_option', 'order_detail_option.order_detail_id = order_detail.order_detail_id','left');
        // $builder->join('product_option_selection', 'product_option_selection.product_option_selection_id = order_detail_option.product_option_selection_id');
        // $builder->join('product_option', 'product_option.product_option_id = product_option_selection.product_option_id');
        $builder->groupBy('order_detail.order_detail_id');
        $builder->where($where);
        $query = $builder->get();
        return $query->getResultArray();
    }
    
    
    
  
   
}
