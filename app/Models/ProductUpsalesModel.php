<?php namespace App\Models;

use App\Core\BaseModel;

class ProductUpsalesModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "product_upsales";
        $this->primaryKey = "product_upsales_id";

    }

    function getWhere($where,$limit = "", $page = 1, $filter = array()){
        $builder = $this->db->table($this->tableName);
        $builder->select('product_upsales.*,product.*');
        $builder->join('product', 'product.product_id = product_upsales.upsales_product_id');

        $builder->where('product.deleted', 0);
        $builder->where($where);

        $query = $builder->get();
        return $query->getResultArray();
    }
}
