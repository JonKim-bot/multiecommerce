<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\TagModel;

class Tag extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->TagModel = new TagModel();
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

    public function index()
    {
        $tag = $this->TagModel->getAll();
        $this->pageData['tag'] = $tag;

        echo view('admin/header', $this->pageData);
        echo view('admin/tag/all');
        echo view('admin/footer');
    }

    public function add()
    {
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                $data = [
                    'tag' => $this->request->getPost('tag'),
                ];

                if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                    $file = $this->request->getFile('banner');
                    $new_name = $file->getRandomName();
                    $banner = $file->move(
                        './public/images/product/',
                        $new_name
                    );
                    if ($banner) {
                        $banner = '/public/images/product/' . $new_name;
                        $data['banner'] = $banner;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }
                // $this->debug($data);
                // dd($data);

                $this->TagModel->insertNew($data);

                return redirect()->to(base_url('tag', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/tag/add');
        echo view('admin/footer');
    }

    public function detail($tag_id)
    {
        $where = [
            'tag_id' => $tag_id,
        ];
        $tag = $this->TagModel->getWhere($where);

        // $this->show_404_if_empty($admin);

        $this->pageData['tag'] = $tag[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/tag/detail');
        echo view('admin/footer');
    }

    public function edit($tag_id)
    {
        $where = [
            'tag_id' => $tag_id,
        ];

        $this->pageData['tag'] = $this->TagModel->getWhere($where)[0];

        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'tag' => $this->request->getPost('tag'),

                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                    $file = $this->request->getFile('banner');
                    $new_name = $file->getRandomName();
                    $banner = $file->move(
                        './public/images/product/',
                        $new_name
                    );
                    if ($banner) {
                        $banner = '/public/images/product/' . $new_name;
                        $data['banner'] = $banner;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

                $this->TagModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('tag/detail/' . $tag_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/tag/edit');
        echo view('admin/footer');
    }

    public function delete($tag_id)
    {
        $this->TagModel->softDelete($tag_id);

        return redirect()->to(base_url('tag', 'refresh'));
    }
}
