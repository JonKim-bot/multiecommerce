<?php namespace App\Models;


use App\Core\BaseModel;

class LoginLogModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "login_log";
        $this->primaryKey = "login_log_id";

    }

    function getLoginLog($where = [], $limit = '', $page = 1, $filter = array())
    {
        $builder = $this->db->table($this->tableName);
        $builder->select('count(*) as total');
        $builder->join('shop', 'shop.shop_id = login_log.shop_id','left');
        $builder->where($where);
        $builder->groupBy('DATE(created_date)');
        $query = $builder->get()->getResultArray();
        if(!empty($query)){
            return $query[0]['total'];
        }else{
            return 0;
        }


    }
   

}
