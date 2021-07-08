<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\BankModel;

class Bank extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->BankModel = new BankModel();
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
        $bank = $this->BankModel->getAll();
        $this->pageData['bank'] = $bank;

        echo view('admin/header', $this->pageData);
        echo view('admin/bank/all');
        echo view('admin/footer');
    }

    public function add()
    {
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                $data = [
                    'bank' => $this->request->getPost('bank'),
                ];

                // $this->debug($data);
                // dd($data);

                $this->BankModel->insertNew($data);

                return redirect()->to(base_url('bank', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/bank/add');
        echo view('admin/footer');
    }

    public function detail($bank_id)
    {
        $where = [
            'bank_id' => $bank_id,
        ];
        $bank = $this->BankModel->getWhere($where);

        // $this->show_404_if_empty($admin);

        $this->pageData['bank'] = $bank[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/bank/detail');
        echo view('admin/footer');
    }

    public function edit($bank_id)
    {
        $where = [
            'bank_id' => $bank_id,
        ];

        $this->pageData['bank'] = $this->BankModel->getWhere($where)[0];

        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'bank' => $this->request->getPost('bank'),

                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                $this->BankModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url('bank/detail/' . $bank_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/bank/edit');
        echo view('admin/footer');
    }

    public function delete($bank_id)
    {
        $this->BankModel->softDelete($bank_id);

        return redirect()->to(base_url('bank', 'refresh'));
    }
}
