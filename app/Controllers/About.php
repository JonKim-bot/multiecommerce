<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\AboutModel;

class About extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];

        $this->AboutModel = new AboutModel();
        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            echo "<script>location.href='" .
                base_url() .
                "/access/login';</script>";
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
                $get['about.full_name'] = $get['full_name'];
            }
            if (!empty($get['email'])) {
                $get['about.email'] = $get['email'];
            }
          
            if (!empty($get['contact'])) {
                $get['about.contact'] = $get['contact'];
            }
            unset($get['contact']);

            unset($get['email']);
            unset($get['full_name']);

            unset($get['shop']);
            unset($get['page']);
            $filter = $get;
        }

   
        $about = $this->AboutModel->getAll(10, $page, $filter);
        $this->pageData['page'] = $about['pagination'];
        $this->pageData['start_no'] = $about['start_no'];
        $about = $about['result'];
        // $this->debug($where);
        // $this->debug($about);
        // $this->debug($about);

        $this->pageData['about'] = $about;

        echo view('admin/header', $this->pageData);
        echo view('admin/about/all_admin');
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
        $about = $this->AboutModel->getWhere($where);
        $this->pageData['about'] = $about;

        echo view('admin/header', $this->pageData);
        echo view('admin/about/all');
        echo view('admin/footer');
    }

    public function add()
    {
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                    $file = $this->request->getFile('banner');
                    $new_name = $file->getRandomName();
                    $about = $file->move('./public/images/about/', $new_name);
                    if ($about) {
                        $about = '/public/images/about/' . $new_name;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

                if ($_FILES['banner2'] and !empty($_FILES['banner2']['name'])) {
                    $file = $this->request->getFile('banner2');
                    $new_name = $file->getRandomName();
                    $about2 = $file->move('./public/images/about/', $new_name);
                    if ($about) {
                        $about2 = '/public/images/about/' . $new_name;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

                if ($_FILES['banner3'] and !empty($_FILES['banner3']['name'])) {
                    $file = $this->request->getFile('banner3');
                    $new_name = $file->getRandomName();
                    $about3 = $file->move('./public/images/about/', $new_name);
                    if ($about3) {
                        $about3 = '/public/images/about/' . $new_name;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

                $data = [
                    'type_id' => $_POST['type_id'],
                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'shop_id' => $this->shop_id,
                    'created_by' => session()->get('login_id'),
                ];
                if(!empty($about)){
                    $data['banner'] = $about;
                }
                if(!empty($about2)){
                    $data['banner2'] = $about;
                }
                if(!empty($about3)){
                    $data['banner3'] = $about;
                }
                // $this->debug($data);
                // dd($data);

                $this->AboutModel->insertNew($data);

                return redirect()->to(base_url('about', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/about/add');
        echo view('admin/footer');
    }

    public function detail($about_id)
    {
        $where = [
            'about_id' => $about_id,
        ];
        $about = $this->AboutModel->getWhere($where);
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop($about[0]['shop_id']);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['about'] = $about[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/about/detail');
        echo view('admin/footer');
    }

    public function edit($about_id)
    {
        $where = [
            'about_id' => $about_id,
        ];

        $this->pageData['about'] = $this->AboutModel->getWhere($where)[0];
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['about']['shop_id']
            );
        }
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'created_by' => session()->get('login_id'),
                    'modified_date' => date('Y-m-d H:i:s'),
                    'type_id' => $_POST['type_id'],
                    'modified_by' => session()->get('login_id'),
                ];

                if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                    $file = $this->request->getFile('banner');
                    $new_name = $file->getRandomName();
                    $about = $file->move('./public/images/about/', $new_name);
                    if ($about) {
                        $about = '/public/images/about/' . $new_name;
                        $data['banner'] = $about;
                    }
                }

                if ($_FILES['banner2'] and !empty($_FILES['banner2']['name'])) {
                    $file = $this->request->getFile('banner2');
                    $new_name = $file->getRandomName();
                    $about2 = $file->move('./public/images/about/', $new_name);
                    if ($about) {
                        $about2 = '/public/images/about/' . $new_name;
                        $data['banner2'] = $about2;

                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

                if ($_FILES['banner3'] and !empty($_FILES['banner3']['name'])) {
                    $file = $this->request->getFile('banner3');
                    $new_name = $file->getRandomName();
                    $about3 = $file->move('./public/images/about/', $new_name);
                    if ($about3) {
                        $about3 = '/public/images/about/' . $new_name;
                        $data['banner3'] = $about3;

                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

                $this->AboutModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('about/detail/' . $about_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/about/edit');
        echo view('admin/footer');
    }

    
    public function edithome($about_id = null)
    {
        if($about_id == null){

            $where = [
                'type_id' => 1,
                'shop_id' => $this->shop_id,
            ];
        }else{
            
            $where = [
                'about_id' => $about_id,
                'type_id' => 1,
                'shop_id' => $this->shop_id,
            ];
        }
        $this->pageData['about'] = $this->AboutModel->getWhere($where);

        if(empty($this->pageData['about'])){
            $about_id = $this->AboutModel->insertNew($where);
            // $this->edithome($about_id);
            return redirect()->to(
                base_url('about/edithome/' . $about_id, 'refresh')
            );
        }else{
            $this->pageData['about'] = $this->AboutModel->getWhere($where)[0];

        }
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['about']['shop_id']
            );
        }
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];


                $this->AboutModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('about/edithome/' . $about_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/about/edithome');
        echo view('admin/footer');
    }
    
    public function editlogin($about_id = null)
    {
        if($about_id == null){

            $where = [
                'type_id' => 3,
                'shop_id' => $this->shop_id,
            ];
        }else{
            
            $where = [
                'about_id' => $about_id,
                'type_id' => 3,
                'shop_id' => $this->shop_id,
            ];
        }
        $this->pageData['about'] = $this->AboutModel->getWhere($where);

        if(empty($this->pageData['about'])){
            $about_id = $this->AboutModel->insertNew($where);
            // $this->editlogin($about_id);
            return redirect()->to(
                base_url('about/editlogin/' . $about_id, 'refresh')
            );
        }else{
            $this->pageData['about'] = $this->AboutModel->getWhere($where)[0];

        }
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['about']['shop_id']
            );
        }
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                
                if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                    $file = $this->request->getFile('banner');
                    $new_name = $file->getRandomName();
                    $about = $file->move('./public/images/about/', $new_name);
                    if ($about) {
                        $about = '/public/images/about/' . $new_name;
                        $data['banner'] = $about;
                    }
                }

                if ($_FILES['banner2'] and !empty($_FILES['banner2']['name'])) {
                    $file = $this->request->getFile('banner2');
                    $new_name = $file->getRandomName();
                    $about2 = $file->move('./public/images/about/', $new_name);
                    if ($about) {
                        $about2 = '/public/images/about/' . $new_name;
                        $data['banner2'] = $about2;

                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

                if ($_FILES['banner3'] and !empty($_FILES['banner3']['name'])) {
                    $file = $this->request->getFile('banner3');
                    $new_name = $file->getRandomName();
                    $about3 = $file->move('./public/images/about/', $new_name);
                    if ($about3) {
                        $about3 = '/public/images/about/' . $new_name;
                        $data['banner3'] = $about3;

                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }


                $this->AboutModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('about/editlogin/' . $about_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/about/editlogin');
        echo view('admin/footer');
    }


    public function edithome2($about_id = null)
    {
        if($about_id == null){

            $where = [
                'type_id' => 2,
                'shop_id' => $this->shop_id,
            ];
        }else{
            
            $where = [
                'about_id' => $about_id,
                'type_id' => 2,
                'shop_id' => $this->shop_id,
            ];
        }
        $this->pageData['about'] = $this->AboutModel->getWhere($where);

        if(empty($this->pageData['about'])){
            $about_id = $this->AboutModel->insertNew($where);
            // $this->edithome2($about_id);
            return redirect()->to(
                base_url('about/edithome2/' . $about_id, 'refresh')
            );
        }else{
            $this->pageData['about'] = $this->AboutModel->getWhere($where)[0];

        }
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['about']['shop_id']
            );
        }
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'description' => $this->request->getPost('description'),
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];
                if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                    $file = $this->request->getFile('banner');
                    $new_name = $file->getRandomName();
                    $about = $file->move('./public/images/about/', $new_name);
                    if ($about) {
                        $about = '/public/images/about/' . $new_name;
                        $data['banner'] = $about;
                    }
                }

                $this->AboutModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('about/edithome2/' . $about_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/about/edithome2');
        echo view('admin/footer');
    }

    public function delete($about_id)
    {
        $this->AboutModel->softDelete($about_id);

        return redirect()->to(base_url('about', 'refresh'));
    }
}

