<?php

namespace App\Models;

use App\Core\BaseModel;

class ProductModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();
        // $this->AreaModel = new ProductModel();
        $this->tableName = "product";
        $this->primaryKey = "product_id";
        
    }

    
    function getWhereInTotal($where, $page = 1,$limit = 6, $filter = array()){
        $builder = $this->db->table($this->tableName);
       
        $sql = ('SELECT product.*,GROUP_CONCAT(product_category.category_id) AS category_id FROM product LEFT JOIN product_category ON product_category.product_id = product.product_id 
        WHERE product.is_active = 1
        ');
        if(!empty($where['shop_id'])){
            $sql .= "AND product.shop_id = ? AND product.deleted = 0";
        }else{
            $sql .= "AND product.product_id = ? AND product.deleted = 0";
        }
        if(!empty($where['product_name'])){
            $sql .= " AND product_name LIKE '%".$where['product_name']."%' ";
            unset($where['product_name']);
        }

        if(!empty($where['category_ids'])){
            $sql .= " AND product_category.category_id IN (".implode(",",$where['category_ids']).") AND product_category.deleted = 0";
            unset($where['category_ids']);
        }
        $sql .= " GROUP BY product.product_id";

        $query = $this->db->query($sql, [$where]);

        return $query->getResultArray();
    }
    function getWhereIn($where, $page = 1,$limit = 100000, $filter = array()){
        $builder = $this->db->table($this->tableName);
       
        $sql = ('SELECT product.*,GROUP_CONCAT(product_category.category_id) AS category_id FROM product LEFT JOIN product_category ON product_category.product_id = product.product_id 
        WHERE product.is_active = 1

        ');
        if(!empty($where['shop_id'])){
            $sql .= "AND product.shop_id = ? AND product.deleted = 0";
        }else{
            $sql .= "AND product.product_id = ? AND product.deleted = 0";
        }
        if(!empty($where['product_name'])){
            $sql .= " AND product_name LIKE '%".$where['product_name']."%' ";
            unset($where['product_name']);
        }

        if(!empty($where['category_ids'])){
            $sql .= " AND product_category.category_id IN (".implode(",",$where['category_ids']).") AND product_category.deleted = 0";
            unset($where['category_ids']);
        }
        $sql .= " GROUP BY product.product_id";

        $offset = 0;
        if($page > 1){
            $offset = ($page - 1) * $limit;
        }
        $sql .= ' LIMIT '.$limit.' OFFSET '.$offset.'';
        
        $query = $this->db->query($sql, [$where]);

        return $query->getResultArray();
    }
    function getMaxPrice(){
        $builder = $this->db->table($this->tableName);
       
        $sql = ('SELECT max(product_price) FROM product');
        
        $query = $this->db->query($sql);

        return $query->getResultArray();
    }
    public function getAll($limit = '', $page = 1, $filter = array())
    {
        $this->builder->select("product.*,shop.shop_name");
        $this->builder->join('shop', 'shop.shop_id = product.shop_id','left');
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
    function getWhere($where,$limit = "", $offset = "", $filter = array()){
        $builder = $this->db->table($this->tableName);
       

        $sql = ('SELECT product.*,
        GROUP_CONCAT(product_category.category_id) AS category_id
        FROM product
        LEFT JOIN product_category
        ON product_category.product_id = product.product_id
        ');
        if(!empty($where['shop_id'])){
            $sql .= "WHERE product.shop_id = ? AND product.deleted = 0";
        }else{
            $sql .= "WHERE product.product_id = ? AND product.deleted = 0";

        }

        if(!empty($where['is_home'])){
            $sql .= " AND product.is_home = '1' ";
            unset($where['is_home']);
        }


        if(!empty($where['category_id'])){
            $sql .= " AND product_category.category_id = ".$where['category_id']." AND product_category.deleted = 0
            ";
            unset($where['category_id']);
        }
        $sql .= " GROUP BY product.product_id";
      
        $query = $this->db->query($sql, [$where]);

        return $query->getResultArray();
    }

    // function getFromTags($area = 'all', $tag = 'all')
    // {
    //     // $this->debug($area); 

    //     $this->builder = $this->db->table("outlet");
    //     $this->builder->select("*");
    //     $this->builder->select("(SELECT GROUP_CONCAT(category) from outlet_category LEFT JOIN category
    //     on outlet_category.category_id = category.category_id 
    //     WHERE outlet_id = outlet.outlet_id group by outlet_id ) as tags ");
    //     $this->builder->select("(SELECT GROUP_CONCAT(slug) from  area_outlet LEFT JOIN area on area_outlet.area_id = area.area_id 
    //     LEFT JOIN slug on area.slug_id = slug.slug_id 
    //     WHERE area_outlet.outlet_id = outlet.outlet_id group by outlet_id) as areas ");
    //     if($area != "all"){
    //         $this->builder->join("area_outlet", "outlet.outlet_id = area_outlet.outlet_id", "left");
    //         $this->builder->where("area_id", $area);
    //     }

    //     if($tag != "all"){
    //         $this->builder->join("outlet_category", "outlet.outlet_id = outlet_category.outlet_id", "left");
    //         $this->builder->where("category_id", $tag);
    //     }
    //     $this->builder->where('deleted',0);
    //     $this->builder->orderBy('outlet.created_date','DESC');

    //     // die($this->builder->getCompiledSelect(false));
        
    //     return $this->builder->get()->getResultArray();
    // }

   
    // function run_query($area , $tag , $order){
    //     $this->builder = $this->db->table("outlet");

    //     $this->builder->select("*");
    //     $this->builder->select("(SELECT GROUP_CONCAT(category) from outlet_category LEFT JOIN category
    //     on outlet_category.category_id = category.category_id 
    //     WHERE outlet_id = outlet.outlet_id group by outlet_id) as tags ");
    //     $this->builder->select("(SELECT GROUP_CONCAT(banner) from outlet_category LEFT JOIN category
    //     on outlet_category.category_id = category.category_id 
    //     WHERE outlet_id = outlet.outlet_id group by outlet_id) as icontags ");
    //     $this->builder->select("(SELECT GROUP_CONCAT(slug) from  area_outlet LEFT JOIN area on area_outlet.area_id = area.area_id 
    //     LEFT JOIN slug on area.slug_id = slug.slug_id 
    //     WHERE area_outlet.outlet_id = outlet.outlet_id group by outlet_id) as areas ");
    //     $this->builder->groupBy("outlet.outlet_id");
    //     if($area != "all"){
    //         $this->builder->join("area_outlet", "outlet.outlet_id = area_outlet.outlet_id", "left");
    //         $this->builder->where("area_id", $area);
    //     }

    //     if(!empty($tag)){
    //         $this->builder->join("outlet_category", "outlet.outlet_id = outlet_category.outlet_id", "left");
    //         $this->builder->whereIn("category_id", $tag);
    //     }

    //     if($order == "DESC"){

    //         $this->builder->orderBy('outlet.created_date', $order);
    //     }else if($order == "ALPHA"){
    //         $this->builder->orderBy('outlet.name', 'ASC');

    //     }    
    //     $this->builder->where('deleted',0);

    // }

    // function getFromTagsAjax($area = 'all', $tag = array(),$order = "DESC",$limit = '',$page = 1,$filter=array())
    // {
    //     // $this->debug($area); 

        
    //     $this->run_query($area,$tag,$order);

    //     $result = $this->builder->get()->getResultArray();
    //     // if ($limit != '') {
    //     //     $offset = ($page-1) * $limit;
    //     //     $number_of_page = ceil($count / $page);
    //     //     $this->run_query($area,$tag,$order);
    //     //     $this->builder->limit($limit, $offset);
    //     // }
    //     if ($limit != '') {
    //         $count = count($result);
    //         $offset = ($page - 1) * $limit;
    //         $pages = $count / $limit;
    //         $pages = ceil($pages);
    //         $this->run_query($area,$tag,$order);

            
    //         $pagination = $this->getPaging($limit, $offset, $page, $pages, $filter);

    //         return $pagination;

    //         // intval($limit);
    //         // $this->db->limit($limit, $offset);
    //     }

    //     return $this->builder->get()->getResultArray();

    // }
    
    // function getFromTagsJson($area = 'all', $tag = array(),$order = "DESC")
    // {
    //     // $this->debug($area); 

    //     $this->builder = $this->db->table("outlet");

    //     $this->builder->select("*");
    //     $this->builder->select("(SELECT GROUP_CONCAT(category) from outlet_category LEFT JOIN category
    //     on outlet_category.category_id = category.category_id 
    //     WHERE outlet_id = outlet.outlet_id group by outlet_id) as tags ");
    //     $this->builder->select("(SELECT GROUP_CONCAT(banner) from outlet_category LEFT JOIN category
    //     on outlet_category.category_id = category.category_id 
    //     WHERE outlet_id = outlet.outlet_id group by outlet_id) as icontags ");
    //     $this->builder->select("(SELECT GROUP_CONCAT(slug) from  area_outlet LEFT JOIN area on area_outlet.area_id = area.area_id 
    //     LEFT JOIN slug on area.slug_id = slug.slug_id 
    //     WHERE area_outlet.outlet_id = outlet.outlet_id group by outlet_id) as areas ");
    //     $this->builder->groupBy("outlet.outlet_id");
    //     if($area != "all"){
    //         $this->builder->join("area_outlet", "outlet.outlet_id = area_outlet.outlet_id", "left");
    //         $this->builder->where("area_id", $area);
    //     }

    //     if(!empty($tag)){
    //         $this->builder->join("outlet_category", "outlet.outlet_id = outlet_category.outlet_id", "left");
    //         $this->builder->whereIn("category_id", $tag);
    //     }

    //     if($order == "DESC"){

    //         $this->builder->orderBy('outlet.created_date', $order);
    //     }else if($order == "ALPHA"){
    //         $this->builder->orderBy('outlet.name', 'ASC');

    //     }        
    //     $this->builder->where('deleted',0);


    //     // die($this->builder->getCompiledSelect(false));
        
    //     return $this->builder->get()->getResultArray();
    // }

   


}
