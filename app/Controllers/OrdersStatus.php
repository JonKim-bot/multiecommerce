<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\OrdersStatusModel;

class OrdersStatus extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->OrdersStatusModel = new OrdersStatusModel();
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
        $ordersstatus = $this->OrdersStatusModel->getAll();

        $this->pageData['ordersstatus'] = $ordersstatus;

        echo view('admin/header', $this->pageData);
        echo view('admin/ordersstatus/all');
        echo view('admin/footer');
    }

    public function add()
    {
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                $data = [
                    'ordersstatus' => $this->request->getPost('ordersstatus'),
                ];

                // $this->debug($data);
                // dd($data);

                $this->OrdersStatusModel->insertNew($data);

                return redirect()->to(base_url('ordersstatus', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/ordersstatus/add');
        echo view('admin/footer');
    }

    public function detail($ordersstatus_id)
    {
        $where = [
            'ordersstatus_id' => $ordersstatus_id,
        ];
        $ordersstatus = $this->OrdersStatusModel->getWhere($where);

        // $this->show_404_if_empty($admin);

        $this->pageData['ordersstatus'] = $ordersstatus[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/ordersstatus/detail');
        echo view('admin/footer');
    }

    public function edit($ordersstatus_id)
    {
        $where = [
            'ordersstatus_id' => $ordersstatus_id,
        ];

        $this->pageData['ordersstatus'] = $this->OrdersStatusModel->getWhere(
            $where
        )[0];

        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'ordersstatus' => $this->request->getPost('ordersstatus'),
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                $this->OrdersStatusModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url(
                        'ordersstatus/detail/' . $ordersstatus_id,
                        'refresh'
                    )
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/ordersstatus/edit');
        echo view('admin/footer');
    }

    public function delete($ordersstatus_id)
    {
        $this->OrdersStatusModel->softDelete($ordersstatus_id);

        return redirect()->to(base_url('ordersstatus', 'refresh'));
    }
}
