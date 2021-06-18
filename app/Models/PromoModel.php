<?php namespace App\Models;

use App\Core\BaseModel;
use App\Models\ProductModel;

class PromoModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "promo";
        $this->primaryKey = "promo_id";
        $this->ProductModel = new ProductModel();

    }
    function getAll($limit = '', $page = 1, $filter = array())
    {
        // $this->builder = $this->db->table($this->tableName);
        $this->builder->select('promo.*, promo_type.promo_type,shop.shop_name');
        $this->builder->join('shop', 'shop.shop_id = '.$this->tableName.'.shop_id','left');

        $this->builder->join('promo_type', 'promo_type.promo_type_id = promo.promo_type_id');
        $this->builder->where('promo.deleted',0);

        if ($limit != '') {
            $count = $this->getCount($filter);
            // die($this->this->builder->getCompiledSelect(false));
            $offset = ($page - 1) * $limit;
            $pages = $count / $limit;
            $pages = ceil($pages);
            
            $pagination = $this->getPaging($limit, $offset, $page, $pages, $filter,$this->this->builder);

            return $pagination;

            // intval($limit);
            // $this->db->limit($limit, $offset);
        }
        $query = $this->builder->get();
        return $query->getResultArray();
    }
    function getWhere($where, $limit = '', $page = 1, $filter = array())
    {
        $this->builder = $this->db->table($this->tableName);
        $this->builder->select('promo.*,  promo_type.promo_type, product.product_id');
        $this->builder->join('promo_type', 'promo_type.promo_type_id = promo.promo_type_id');
        $this->builder->join('product', 'product.product_id = promo.product_id','left');
        $this->builder->where($where);
        $this->builder->where('promo.deleted',0);
        $query = $this->builder->get();
        $promo = $query->getResultArray();
        // if(!empty($promo)){

        //     if($promo[0]['promo_type_id'] == 3 ){
        //         $promo_multiple = $promo[0]['product_id_id'];
        //         $whereIn = [
        //             'product_id.product_id_id' => explode(",",$promo_multiple)
        //         ];
                
        //         $promo_multiple = array_column($this->ProductModel->getWhereIn(explode(",",$promo_multiple)),'stock_id');
        //         $promo[0]['stock_id'] = join(",",$promo_multiple);
        //     }
        // }
        return $promo;
    }

}
