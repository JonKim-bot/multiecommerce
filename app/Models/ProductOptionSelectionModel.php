<?php namespace App\Models;

use App\Core\BaseModel;

class ProductOptionSelectionModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "product_option_selection";
        $this->primaryKey = "product_option_selection_id";

    }
    function getWhere($where,$limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('product_option_selection.*, product_option.name as option_name,');
        // ,product_option_selection.product_option_name as selection_name,product_option.name as option_name
        $builder->join('product_option', 'product_option.product_option_id = product_option_selection.product_option_id');
        // $builder->join('product_option_selection', 'product_option_selection.product_option_selection_id = order_detail_option.product_option_selection_id');
        // $builder->join('product_option', 'product_option.product_option_id = product_option_selection.product_option_id');

        $builder->where($where);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function getWhereIn($where,$limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('product_option_selection.product_option_name, product_option.name as option_name,');
        // ,product_option_selection.product_option_name as selection_name,product_option.name as option_name
        $builder->join('product_option', 'product_option.product_option_id = product_option_selection.product_option_id');
        // $builder->join('product_option_selection', 'product_option_selection.product_option_selection_id = order_detail_option.product_option_selection_id');
        // $builder->join('product_option', 'product_option.product_option_id = product_option_selection.product_option_id');
        $builder->whereIn('product_option_selection_id',$where);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
