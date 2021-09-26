<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\TopuprewardModel;

class Topupreward extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->TopuprewardModel = new TopuprewardModel();
        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            echo "<script>location.href='" .
                base_url() .
                "/access/login';</script>";
        }
        $array_rate = [
            'first_rate',
            'second_rate',
            'thrid_rate',

        ];
     
        if (session()->get('admin_data')['type'] == 'MERCHANT') {
            //  redirect()->to(base_url('access/login/'));
            $this->pageData['array_rate'] = $array_rate;
            $shop_data = session()->get('shop_data');
            $shop_function = $this->getShopFunction($shop_data['shop_id']);
            $this->shop_function = $shop_function;
            $this->validate_function(1,$shop_function);
        }

    }

    public function indexadmin()
    {

        $page = 1;
        $filter = array();

        if ($_GET) {
            $get = $this->request->getGet();

            if (!empty($get['page'])) {
                $page = $get['page'];
            }
            if (!empty($get['shop'])) {
                $get['shop.shop_name'] = $get['shop'];
            }
            if (!empty($get['full_name'])) {
                $get['topupreward.full_name'] = $get['full_name'];
            }
            if (!empty($get['email'])) {
                $get['topupreward.email'] = $get['email'];
            }
          
            if (!empty($get['contact'])) {
                $get['topupreward.contact'] = $get['contact'];
            }
            unset($get['contact']);

            unset($get['email']);
            unset($get['full_name']);

            unset($get['shop']);
            unset($get['page']);
            $filter = $get;
        }

   
        $topupreward = $this->TopuprewardModel->getAll(10, $page, $filter);
        $this->pageData['page'] = $topupreward['pagination'];
        $this->pageData['start_no'] = $topupreward['start_no'];
        $topupreward = $topupreward['result'];
        // $this->debug($where);
        // $this->debug($topupreward);
        // $this->debug($topupreward);

        $this->pageData['topupreward'] = $topupreward;

        echo view('admin/header', $this->pageData);
        echo view('admin/topupreward/all_admin');
        echo view('admin/footer');
    }

    public function index()
    {
        if($this->isMerchant == false){
            $this->indexadmin();
            return;
        }
        $where = [
            'shop_id' => $this->shop_id,
        ];
        $topupreward = $this->TopuprewardModel->getWhere($where);
        $this->pageData['topupreward'] = $topupreward;

        echo view('admin/header', $this->pageData);
        echo view('admin/topupreward/all');
        echo view('admin/footer');
    }

    public function add()
    {
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                
                $data = [
                    'above' => $this->request->getPost('above'),
                    'reward' => $this->request->getPost('reward'),

                    'shop_id' => $this->shop_id,
                    'created_by' => session()->get('login_id'),
                ];
                
                // $image = $this->upload_image_base('banner');

                // if($image != ""){
                //     $data['banner'] = $image;
                // }
          
                // $this->debug($data);
                // dd($data);

                $this->TopuprewardModel->insertNew($data);

                return redirect()->to(base_url('topupreward', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/topupreward/add');
        echo view('admin/footer');
    }

    public function detail($topupreward_id)
    {
        $where = [
            'topupreward_id' => $topupreward_id,
        ];
        $topupreward = $this->TopuprewardModel->getWhere($where);
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop($topupreward[0]['shop_id']);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['topupreward'] = $topupreward[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/topupreward/detail');
        echo view('admin/footer');
    }


    public function edit($topupreward_id)
    {
        $where = [
            'topupreward_id' => $topupreward_id,
        ];

        $this->pageData['topupreward'] = $this->TopuprewardModel->getWhere($where)[0];
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['topupreward']['shop_id']
            );
        }
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'rate_name' => $this->request->getPost('rate_name'),
                    'rate' => $this->request->getPost('rate'),
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                // $image = $this->upload_image_base('banner');

                // if($image != ""){
                //     $data['banner'] = $image;
                // }
          
          

                $this->TopuprewardModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('topupreward/detail/' . $topupreward_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/topupreward/edit');
        echo view('admin/footer');
    }

    public function delete($topupreward_id)
    {
        $this->TopuprewardModel->softDelete($topupreward_id);

        return redirect()->to(base_url('topupreward', 'refresh'));
    }
}
