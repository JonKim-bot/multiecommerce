<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\ShopOperatingHourModel;
use App\Models\ShopModel;


class ShopOperatingHour extends BaseController
{
    public function __construct()

    {
        $this->pageData = [];
        $this->ShopOperatingHourModel = new ShopOperatingHourModel();

        $this->ShopModel = new ShopModel();

        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            echo "<script>location.href='" .
                base_url() .
                "/access/login';</script>";
        }
        // if(session()->get('admin_data') != null){
        //     //  redirect()->to(base_url('access/login/'));
        //     echo "<script>location.href='".base_url()."/admin';</script>";
        // }
        if (session()->get('admin_data')['type'] == 'MERCHANT') {
            //  redirect()->to(base_url('access/login/'));
            $this->isMerchant == true;
        }
    }

    public function index()
    {
        $where = [
            'shop_id' => $this->shop_id
        ];
        $shop_operating_hour = $this->ShopOperatingHourModel->getWhere($where);
        // $this->debug($where);
        // $this->debug($shop_operating_hour);
        // $this->debug($shop_operating_hour);

        $this->pageData['shop_operating_hour'] = $shop_operating_hour;

        echo view('admin/header', $this->pageData);
        echo view('admin/shop_operating_hour/alltable');
        echo view('admin/footer');
    }
    public function shop_operating_hourtable()
    {
        $shop_operating_hour_category =
            ($_GET and $_GET['shop_operating_hour_category'])
                ? $_GET['shop_operating_hour_category']
                : '';

        $where = [
            'shop_id' => $this->shop_id,
        ];
        if ($shop_operating_hour_category != '') {
            $where['category_id'] = $shop_operating_hour_category;
        }
        $shop_operating_hour = $this->ShopOperatingHourModel->getWhere($where);
        $this->pageData['shop_operating_hour'] = $shop_operating_hour;

        echo view('admin/header', $this->pageData);
        echo view('admin/shop_operating_hour/all');
        echo view('admin/footer');
    }

    public function search()
    {
        $like = [
            'shop_operating_hour_name' => $_POST['shop_operating_hour_name'],
        ];

        $shop_operating_hour = $this->ShopOperatingHourModel->getLike($like);
        $this->pageData['shop_operating_hour'] = $shop_operating_hour;

        echo view('admin/header', $this->pageData);
        echo view('admin/shop_operating_hour/all');
        echo view('admin/footer');
    }

    public function generate_operating_hour(){
        $shop = $this->ShopModel->getAll();
        foreach($shop as $row){
            $days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
            foreach($days as $row_day){
                $where = [
                    'day' => $row_day,
                    'shop_id' => $row['shop_id'],
                ];
                $is_exist = $this->ShopOperatingHourModel->getWhere($where);
                if(!empty($is_exist)){
                    $data = [
                        'day' => $row_day,
                        'shop_id' => $row['shop_id'],
                        'open_at' => '00:00',
                        'closed_at' => '23:59'
                    ];
                    $this->ShopOperatingHourModel->insertNew($data);
                }

            }
        }
    }

    public function add()
    {

        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
           
                $data = $_POST;
                $data['day'] = date('D');
                $this->debug($data);
                // $data['banner'] = $banner;

                // dd($data);

                $shop_operating_hour_id = $this->ShopOperatingHourModel->insertNew($data);

                return redirect()->to(base_url('shop_operating_hour', 'refresh'));
            }
        }
        $this->pageData['form'] = $this->ShopOperatingHourModel->generate_input();
        // $this->debug($this->pageData['form']);

        echo view('admin/header', $this->pageData);
        echo view('admin/shop_operating_hour/add');
        echo view('admin/footer');
    }

    public function set_status($shop_operating_hour_id)
    {
        $where = [
            'shop_operating_hour.shop_operating_hour_id' => $shop_operating_hour_id,
        ];
        $shop_operating_hour = $this->ShopOperatingHourModel->getWhere($where);
        if ($shop_operating_hour[0]['is_active'] == 1) {
            $is_active = 0;
        } else {
            $is_active = 1;
        }
        $this->ShopOperatingHourModel->updateWhere($where, ['is_active' => $is_active]);
        return redirect()->to(
            base_url('shop_operating_hour/detail/' . $shop_operating_hour_id, 'refresh')
        );
    }
    public function detail($shop_operating_hour_id)
    {
        $where = [
            'shop_operating_hour_id' => $shop_operating_hour_id,
        ];

        $shop_operating_hour = $this->ShopOperatingHourModel->getWhere($where);

        // $this->debug($shop_operating_hour);

        // $merchant = $this->MerchantModel->getWhere($where);

        // $this->show_404_if_empty($admin);

        $this->pageData['shop_operating_hour'] = $shop_operating_hour[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/shop_operating_hour/detail');
        echo view('admin/footer');
    }

    public function addImage($shop_operating_hour_id)
    {
      

            $error = false;

            $input = $this->request->getPost();

            if (!$error) {

                if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                    $file = $this->request->getFile('banner');
                    $new_name = $file->getRandomName();
                    $banner = $file->move(
                        './public/images/shop_operating_hour/',
                        $new_name
                    );
                    if ($banner) {
                        $banner = '/public/images/shop_operating_hour/' . $new_name;
                        $data['shop_operating_hour_image'] = $banner;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

                $data['shop_operating_hour_id'] = $shop_operating_hour_id;
                $input['contact'] = str_replace("-","",$input['contact']);
                $input['contact'] = str_replace("+","",$input['contact']);
    
                if(!$this->startsWith($input['contact'],"6")){
                    $input['contact'] = "6" . $input['contact'];
                }
    

                $data['contact'] = $input['contact'];
                
                $this->ShopOperatingHourImageModel->insertNew($data);

                
                return redirect()->to(
                    base_url('shop_operating_hour/detail/' . $shop_operating_hour_id, 'refresh')
                );
            }
     
    }
    public function edit($shop_operating_hour_id)
    {
      

       $where = [
           'shop_operating_hour_id' => $shop_operating_hour_id
       ];
        $this->pageData['shop_operating_hour'] = $this->ShopOperatingHourModel->getWhere($where)[0];
     
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
             
                $data = $_POST;
                $this->ShopOperatingHourModel->updateWhere($where, $data);

                
                return redirect()->to(
                    base_url('ShopOperatingHour', 'refresh')
                );
            }
        }
        $this->pageData['form'] = $this->ShopOperatingHourModel->generate_edit_input($shop_operating_hour_id);

        // $this->debug($this->pageData);
        // $this->debug($this->pageData['shop_operating_hour']['category_id']);
        echo view('admin/header', $this->pageData);

        echo view('admin/shop_operating_hour/edit');
        echo view('admin/footer');
    }

    public function delete($shop_operating_hour_id)
    {
        $this->ShopOperatingHourModel->softDelete($shop_operating_hour_id);

        return redirect()->to(base_url('shop_operating_hour', 'refresh'));
    }
    public function delete_image($shop_operating_hour_image_id,$shop_operating_hour_id)
    {

        $this->ShopOperatingHourImageModel->hardDelete($shop_operating_hour_image_id);


        return redirect()->to(
            base_url('shop_operating_hour/detail/' . $shop_operating_hour_id, 'refresh')
        );    }
}
