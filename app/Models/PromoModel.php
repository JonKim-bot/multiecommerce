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
        $builder = $this->db->table($this->tableName);
        $builder->select('promo.*, promo_type.promo_type');
        $builder->join('promo_type', 'promo_type.promo_type_id = promo.promo_type_id');
        $builder->where('promo.deleted',0);

        $query = $builder->get();
        return $query->getResultArray();
    }
    function getWhere($where, $limit = '', $page = 1, $filter = array())
    {
        $builder = $this->db->table($this->tableName);
        $builder->select('promo.*,  promo_type.promo_type, product.product_id');
        $builder->join('promo_type', 'promo_type.promo_type_id = promo.promo_type_id');
        $builder->join('product', 'product.product_id = promo.product_id','left');
        $builder->where($where);
        $builder->where('promo.deleted',0);
        $query = $builder->get();
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
