<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\AnnouncementModel;

class Announcement extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->AnnouncementModel = new AnnouncementModel();
        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            // echo "<script>location.href='".base_url()."/access/login';</script>";
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
            if (!empty($get['announcement'])) {
                $get['announcement.announcement'] = $get['announcement'];
            }
            if (!empty($get['email'])) {
                $get['announcement.email'] = $get['email'];
            }
          
            unset($get['email']);
            unset($get['announcement']);

            unset($get['shop']);
            unset($get['page']);
            $filter = $get;
        }

   
        $announcement = $this->AnnouncementModel->getAll(10, $page, $filter);
        $this->pageData['page'] = $announcement['pagination'];
        $this->pageData['start_no'] = $announcement['start_no'];
        $announcement = $announcement['result'];
        // $this->debug($where);
        // $this->debug($announcement);
        // $this->debug($announcement);

        $this->pageData['announcement'] = $announcement;

        echo view('admin/header', $this->pageData);
        echo view('admin/announcement/all_admin');
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
        $announcement = $this->AnnouncementModel->getWhere($where);
        $this->pageData['announcement'] = $announcement;

        echo view('admin/header', $this->pageData);
        echo view('admin/announcement/all');
        echo view('admin/footer');
    }

    public function change_status($announcement_id)
    {
        $where = [
            'announcement_id' => $announcement_id,
        ];
        $announcement = $this->AnnouncementModel->getWhere($where)[0];
        if ($announcement['is_active'] == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $this->AnnouncementModel->updateWhere($where, ['is_active' => $status]);

        return redirect()->to(
            base_url('announcement/detail/' . $announcement_id, 'refresh')
        );
    }
    public function add()
    {
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                $data = [
                    'link' => $this->request->getPost('link'),

                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'shop_id' => $this->shop_id,
                    'created_by' => session()->get('login_id'),
                ];
                

                // $this->debug($data);
                // dd($data);

                $this->AnnouncementModel->insertNew($data);

                return redirect()->to(base_url('announcement', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/announcement/add');
        echo view('admin/footer');
    }

    public function detail($announcement_id)
    {
        $where = [
            'announcement_id' => $announcement_id,
        ];
        $announcement = $this->AnnouncementModel->getWhere($where);
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop($announcement[0]['shop_id']);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['announcement'] = $announcement[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/announcement/detail');
        echo view('admin/footer');
    }

    public function edit($announcement_id)
    {
        $where = [
            'announcement_id' => $announcement_id,
        ];

        $this->pageData['announcement'] = $this->AnnouncementModel->getWhere(
            $where
        )[0];
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['announcement']['shop_id']
            );
        }
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'link' => $this->request->getPost('link'),
                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                $this->AnnouncementModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url(
                        'announcement/detail/' . $announcement_id,
                        'refresh'
                    )
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/announcement/edit');
        echo view('admin/footer');
    }

    public function edita($announcement_id = null)
    {
        
        if($announcement_id == null){

            $where = [
                'shop_id' => $this->shop_id,
            ];
        }else{
            
            $where = [
                'announcement_id' => $announcement_id,
                'shop_id' => $this->shop_id,
            ];
        }

        $this->pageData['announcement'] = $this->AnnouncementModel->getWhere(
            $where
        );

        if(empty($this->pageData['announcement'])){
            $announcement_id = $this->AnnouncementModel->insertNew($where);
            // $this->edita($announcement_id);
            return redirect()->to(
                base_url(
                    'announcement/edita/' . $announcement_id,
                    'refresh'
                )
            );
        }else{
            $this->pageData['announcement'] = $this->AnnouncementModel->getWhere(
                $where
            )[0];
    
        }
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['announcement']['shop_id']
            );
        }
        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'link' => $this->request->getPost('link'),
                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                $this->AnnouncementModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url(
                        'announcement/edita/' . $announcement_id,
                        'refresh'
                    )
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/announcement/edita');
        echo view('admin/footer');
    }
    public function delete($announcement_id)
    {
        $this->AnnouncementModel->softDelete($announcement_id);

        return redirect()->to(base_url('announcement', 'refresh'));
    }
}
