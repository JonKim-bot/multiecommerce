<?php namespace App\Controllers;

use App\Core\BaseController;
use App\Models\CustomerModel;

class Referal extends BaseController
{

    public function __construct()
    {

        $this->pageData = array();

        // $this->MarketPlaceModel = new MarketPlaceModel();
        $this->CustomerModel = new CustomerModel();
    }

    public function index()
    {
        $users = $this->CustomerModel->getAll();
        for($i = 0; $i < count($users); $i++){
            $users[$i]['family'] = $this->CustomerModel->getTree($users[$i]['customer_id']);
        }
        $this->pageData['users'] = $users;
        echo view('admin/header', $this->pageData);
        echo view('admin/referal/all');
        echo view('admin/footer');
    }

}
