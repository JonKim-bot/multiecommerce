<?php namespace App\Models;

use App\Core\BaseModel;

class SenangResponseModel extends BaseModel
{

    public function __construct()
    {

        parent::__construct();

        $this->tableName = "senang_response";
        $this->primaryKey = "senang_response_id";

    }

    
    // function delete($where){
    //     $sql = "DELETE FROM post_like WHERE user_id = ? and post_id = ?";
    //     $this->db->query($sql, array(

    //     ));
    // }
}
