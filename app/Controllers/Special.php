<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\SpecialModel;
use App\Models\SpecialCategoryModel;

use App\Models\SpecialImageModel;

class Special extends BaseController
{
    public function __construct()

    {
        $this->pageData = [];
        $this->SpecialModel = new SpecialModel();
        $this->SpecialImageModel = new SpecialImageModel();

        $this->SpecialCategoryModel = new SpecialCategoryModel();

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
            $this->isMerchant = true;
            $this->pageData['isMerchant'] = true;
        }else{
            $this->pageData['isMerchant'] = false;

        }
    }

    public function index()
    {
        $special = $this->SpecialModel->getAll();
        // $this->debug($where);
        // $this->debug($special);
        // $this->debug($special);

        $this->pageData['special'] = $special;

        echo view('admin/header', $this->pageData);
        echo view('admin/special/alltable');
        echo view('admin/footer');
    }
    public function specialtable()
    {
        $special_category =
            ($_GET and $_GET['special_category'])
                ? $_GET['special_category']
                : '';

        $where = [
            'shop_id' => $this->shop_id,
        ];
        if ($special_category != '') {
            $where['category_id'] = $special_category;
        }
        $special = $this->SpecialModel->getWhere($where);
        $this->pageData['special'] = $special;

        echo view('admin/header', $this->pageData);
        echo view('admin/special/all');
        echo view('admin/footer');
    }

    public function search()
    {
        $like = [
            'special_name' => $_POST['special_name'],
        ];

        $special = $this->SpecialModel->getLike($like);
        $this->pageData['special'] = $special;

        echo view('admin/header', $this->pageData);
        echo view('admin/special/all');
        echo view('admin/footer');
    }

    public function add()
    {
        $special_category = $this->SpecialCategoryModel->getAll();

        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                // if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                //     $file = $this->request->getFile('banner');
                //     $new_name = $file->getRandomName();
                //     $banner = $file->move(
                //         './public/images/special/',
                //         $new_name
                //     );
                //     if ($banner) {
                //         $banner = '/public/images/special/' . $new_name;
                //     } else {
                //         $error = true;
                //         $error_message = 'Upload failed.';
                //     }
                // }

                $data = $_POST;

                // $data['banner'] = $banner;

                // dd($data);

                $special_id = $this->SpecialModel->insertNew($data);

                if (!empty($input['special_category'])) {
                    foreach ($input['special_category'] as $row) {
                        $data = [
                            'category_id' => $row,
                            'special_id' => $special_id,
                        ];
                        $this->SpecialCategoryModel->insertNew($data);
                    }
                }

                return redirect()->to(base_url('special', 'refresh'));
            }
        }
        $this->pageData['form'] = $this->SpecialModel->generate_input();
        // $this->debug($this->pageData['form']);

        $this->pageData['special_category'] = $special_category;
        echo view('admin/header', $this->pageData);
        echo view('admin/special/add');
        echo view('admin/footer');
    }

    public function set_status($special_id)
    {
        $where = [
            'special.special_id' => $special_id,
        ];
        $special = $this->SpecialModel->getWhere($where);
        if ($special[0]['is_active'] == 1) {
            $is_active = 0;
        } else {
            $is_active = 1;
        }
        $this->SpecialModel->updateWhere($where, ['is_active' => $is_active]);
        return redirect()->to(
            base_url('special/detail/' . $special_id, 'refresh')
        );
    }
    public function detail($special_id)
    {
        $where = [
            'special_id' => $special_id,
        ];

        $special = $this->SpecialModel->getWhere($where);
        $special_image = $this->SpecialImageModel->getWhere($where);

        // $this->debug($special);

        // $merchant = $this->MerchantModel->getWhere($where);

        // $this->show_404_if_empty($admin);

        $this->pageData['special'] = $special[0];
        $this->pageData['special_image'] = $special_image;

        echo view('admin/header', $this->pageData);
        echo view('admin/special/detail');
        echo view('admin/footer');
    }

    public function addImage($special_id)
    {
      

            $error = false;

            $input = $this->request->getPost();

            if (!$error) {

                if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                    $file = $this->request->getFile('banner');
                    $new_name = $file->getRandomName();
                    $banner = $file->move(
                        './public/images/special/',
                        $new_name
                    );
                    if ($banner) {
                        $banner = '/public/images/special/' . $new_name;
                        $data['special_image'] = $banner;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

                $data['special_id'] = $special_id;
                $input['contact'] = str_replace("-","",$input['contact']);
                $input['contact'] = str_replace("+","",$input['contact']);
    
                if(!$this->startsWith($input['contact'],"6")){
                    $input['contact'] = "6" . $input['contact'];
                }
    

                $data['contact'] = $input['contact'];
                
                $this->SpecialImageModel->insertNew($data);

                
                return redirect()->to(
                    base_url('special/detail/' . $special_id, 'refresh')
                );
            }
     
    }
    public function edit($special_id)
    {
      

        $special_category = $this->SpecialCategoryModel->getAll();

        $where = [
            'special_id' => $special_id,
        ];
        $this->pageData['special_category'] = $special_category;

        $this->pageData[
            'special_category'
        ] = $this->SpecialCategoryModel->getAll();

        $this->pageData['special'] = $this->SpecialModel->getWhere($where)[0];
     
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = $_POST;
                $input['contact'] = str_replace("-","",$input['contact']);
                $input['contact'] = str_replace("+","",$input['contact']);
    
                if(!$this->startsWith($input['contact'],"6")){
                    $input['contact'] = "6" . $input['contact'];
                }
    

                $data['contact'] = $input['contact'];

                // if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                //     $file = $this->request->getFile('banner');
                //     $new_name = $file->getRandomName();
                //     $banner = $file->move(
                //         './public/images/special/',
                //         $new_name
                //     );
                //     if ($banner) {
                //         $banner = '/public/images/special/' . $new_name;
                //         $data['image'] = $banner;
                //     } else {
                //         $error = true;
                //         $error_message = 'Upload failed.';
                //     }
                // }

                
                $this->SpecialModel->updateWhere($where, $data);

                
                return redirect()->to(
                    base_url('special/detail/' . $special_id, 'refresh')
                );
            }
        }
        $this->pageData['form'] = $this->SpecialModel->generate_edit_input($special_id);

        // $this->debug($this->pageData);
        // $this->debug($this->pageData['special']['category_id']);
        echo view('admin/header', $this->pageData);

        echo view('admin/special/edit');
        echo view('admin/footer');
    }

    public function delete($special_id)
    {
        $this->SpecialModel->softDelete($special_id);

        return redirect()->to(base_url('special', 'refresh'));
    }
    public function delete_image($special_image_id,$special_id)
    {

        $this->SpecialImageModel->hardDelete($special_image_id);


        return redirect()->to(
            base_url('special/detail/' . $special_id, 'refresh')
        );    }
}
