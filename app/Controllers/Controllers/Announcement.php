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

    public function index()
    {
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
                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'shop_id' => $this->shop_id,
                    'created_by' => session()->get('login_id'),
                ];
                if (
                    $_FILES['announcement'] and
                    !empty($_FILES['announcement']['name'])
                ) {
                    $file = $this->request->getFile('announcement');
                    $new_name = $file->getRandomName();
                    $announcement = $file->move(
                        './public/images/announcement/',
                        $new_name
                    );
                    if ($announcement) {
                        $announcement =
                            '/public/images/announcement/' . $new_name;
                        $data['banner'] = $announcement;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

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
        if ($this->isMerchant = true) {
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
        if ($this->isMerchant = true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['announcement']['shop_id']
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
                    'modified_by' => session()->get('login_id'),
                ];

                if (
                    $_FILES['announcement'] and
                    !empty($_FILES['announcement']['name'])
                ) {
                    $file = $this->request->getFile('announcement');
                    $new_name = $file->getRandomName();
                    $announcement = $file->move(
                        './public/images/announcement/',
                        $new_name
                    );
                    if ($announcement) {
                        $announcement =
                            '/public/images/announcement/' . $new_name;
                        $data['banner'] = $announcement;
                    }
                }

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

    public function delete($announcement_id)
    {
        $this->AnnouncementModel->softDelete($announcement_id);

        return redirect()->to(base_url('announcement', 'refresh'));
    }
}
