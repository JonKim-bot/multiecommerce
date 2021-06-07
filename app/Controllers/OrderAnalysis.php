<?php

namespace App\Controllers;

use App\Core\BaseController;

class OrderAnalysis extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
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
     
        echo view('admin/header', $this->pageData);
        echo view('admin/orderanalysis/all');
        echo view('admin/footer');
    }

    public function change_status($orderanalysis_id)
    {
        $where = [
            'orderanalysis_id' => $orderanalysis_id,
        ];
        $orderanalysis = $this->OrderAnalysisModel->getWhere($where)[0];
        if ($orderanalysis['is_active'] == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $this->OrderAnalysisModel->updateWhere($where, ['is_active' => $status]);

        return redirect()->to(
            base_url('orderanalysis/detail/' . $orderanalysis_id, 'refresh')
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

                $this->OrderAnalysisModel->insertNew($data);

                return redirect()->to(base_url('orderanalysis', 'refresh'));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/orderanalysis/add');
        echo view('admin/footer');
    }

    public function detail($orderanalysis_id)
    {
        $where = [
            'orderanalysis_id' => $orderanalysis_id,
        ];
        $orderanalysis = $this->OrderAnalysisModel->getWhere($where);
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop($orderanalysis[0]['shop_id']);
        }
        // $this->show_404_if_empty($admin);

        $this->pageData['orderanalysis'] = $orderanalysis[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/orderanalysis/detail');
        echo view('admin/footer');
    }

    public function edit($orderanalysis_id)
    {
        $where = [
            'orderanalysis_id' => $orderanalysis_id,
        ];

        $this->pageData['orderanalysis'] = $this->OrderAnalysisModel->getWhere(
            $where
        )[0];
        if ($this->isMerchant == true) {
            $this->check_is_merchant_from_shop(
                $this->pageData['orderanalysis']['shop_id']
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

                $this->OrderAnalysisModel->updateWhere($where, $data);

                return redirect()->to(
                    base_url(
                        'orderanalysis/detail/' . $orderanalysis_id,
                        'refresh'
                    )
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/orderanalysis/edit');
        echo view('admin/footer');
    }

    public function delete($orderanalysis_id)
    {
        $this->OrderAnalysisModel->softDelete($orderanalysis_id);

        return redirect()->to(base_url('orderanalysis', 'refresh'));
    }
}
