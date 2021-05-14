<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\PaymentMethodModel;

class PaymentMethod extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->PaymentMethodModel = new PaymentMethodModel();
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
        $payment_method = $this->PaymentMethodModel->getAll();
        $this->pageData['payment_method'] = $payment_method;

        echo view('admin/header', $this->pageData);
        echo view('admin/payment_method/all');
        echo view('admin/footer');
    }

    public function add()
    {
        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                $data = [
                    'payment_method' => $this->request->getPost(
                        'payment_method'
                    ),
                ];

                // $this->debug($data);
                // dd($data);

                $this->PaymentMethodModel->insertNew($data);

                return redirect()->to(base_url('payment_method', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/payment_method/add');
        echo view('admin/footer');
    }

    public function detail($payment_method_id)
    {
        $where = [
            'payment_method_id' => $payment_method_id,
        ];
        $payment_method = $this->PaymentMethodModel->getWhere($where);

        // $this->show_404_if_empty($admin);

        $this->pageData['payment_method'] = $payment_method[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/payment_method/detail');
        echo view('admin/footer');
    }

    public function edit($payment_method_id)
    {
        $where = [
            'payment_method_id' => $payment_method_id,
        ];

        $this->pageData['payment_method'] = $this->PaymentMethodModel->getWhere(
            $where
        )[0];

        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            if (!$error) {
                $data = [
                    'payment_method' => $this->request->getPost(
                        'payment_method'
                    ),
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                $this->PaymentMethodModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url(
                        'payment_method/detail/' . $payment_method_id,
                        'refresh'
                    )
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/payment_method/edit');
        echo view('admin/footer');
    }

    public function delete($payment_method_id)
    {
        $this->PaymentMethodModel->softDelete($payment_method_id);

        return redirect()->to(base_url('payment_method', 'refresh'));
    }
}
