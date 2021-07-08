<?php namespace App\Controllers;

use App\Core\BaseController;
use App\Models\CustomerModel;
use App\Models\PointModel;

class Referal extends BaseController
{

    public function __construct()
    {

        $this->pageData = array();
        $this->CustomerModel = new CustomerModel();

        $this->PointModel = new PointModel();
        if (session()->get('admin_data')['type'] == 'MERCHANT') {
            $shop_data = session()->get('shop_data');
            $shop_function = $this->getShopFunction($shop_data['shop_id']);
            $this->shop_function = $shop_function;
            $this->validate_function(8,$shop_function);
            //  redirect()->to(base_url('access/login/'));
        }
    }

    public function index()

    {
        if($this->isMerchant == false){
            $this->indexadmin();
            return;
        }
        $email =
        ($_GET and $_GET['email'])
            ? $_GET['email']
            : '';
        $where = [
            'customer.shop_id' => $this->shop_id,
        ];
        if($email !=''){
            $where['customer.email'] = $email;
        }
        $users = $this->CustomerModel->getWhere($where);
        for($i = 0; $i < count($users); $i++){
            $users[$i]['total_received_point'] = $this->PointModel->get_total_received_point($users[$i]['customer_id']);
            $users[$i]['group_sales'] = $this->CustomerModel->getGroupTotalSales($users[$i]['customer_id']);
            $users[$i]['self_sales'] = $this->CustomerModel->getSelfSales($users[$i]['customer_id']);
            $users[$i]['family'] = $this->CustomerModel->getTree($users[$i]['customer_id']);
        }
        $this->pageData['users'] = $users;
        echo view('admin/header', $this->pageData);
        echo view('admin/referal/all');
        echo view('admin/footer');
    }

    public function indexadmin()

    {
        $users = $this->CustomerModel->getAll();
        for($i = 0; $i < count($users); $i++){
            $users[$i]['total_received_point'] = $this->PointModel->get_total_received_point($users[$i]['customer_id']);
            $users[$i]['group_sales'] = $this->CustomerModel->getGroupTotalSales($users[$i]['customer_id']);
            $users[$i]['self_sales'] = $this->CustomerModel->getSelfSales($users[$i]['customer_id']);
            $users[$i]['family'] = $this->CustomerModel->getTree($users[$i]['customer_id']);
        }
        $this->pageData['users'] = $users;
        echo view('admin/header', $this->pageData);
        echo view('admin/referal/all_admin');
        echo view('admin/footer');
    }

}
