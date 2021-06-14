<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\SenangResponseModel;
use App\Models\ShopModel;
use App\Models\OrdersModel;

class Senang extends Controller
{

    public function __construct()
    {
        $this->SenangResponseModel = new SenangResponseModel();
        $this->ShopModel = new ShopModel();
        $this->OrdersModel = new OrdersModel();

        
        $this->pageData = array();
    }

    
    function success(){

        echo view('admin/success', $this->pageData);
    }

    function failed(){

        echo view('admin/failed', $this->pageData);
    }
    public function get_shop($slug,$is_id = false){
        if(!$is_id){
            
            $where =[
                'slug' => $slug
            ];
        }else{
            $where =[
                'shop.shop_id' => $slug
            ];
        }
        $shop = $this->ShopModel->getWhere($where);
    
        return $shop[0];
    }
    
    function senang_return(){

        if($_REQUEST){

            if ($_REQUEST['status_id'] == 1){

                $response = json_encode($_REQUEST, true);

                $data = array(
                    'response' => $response,
                    'type' => 'return success',
                );
                $this->SenangResponseModel->insertNew($data);
                $where = array(
                    "orders.orders_id" => $_REQUEST['order_id'],
                );
                $orders = $this->OrdersModel->getWhere($where)[0];
                $shop = $this->get_shop($orders['shop_id'],true);
                $url = base_url() . "/main/index/" . $shop['slug'];
                return redirect()->to($url , "refresh");
                // $this->debug($_REQUEST);

            } else {

                $response = json_encode($_REQUEST, true);

                $data = array(
                    'response' => $response,
                    'type' => 'return failed',
                );
                $this->SenangResponseModel->insertNew($data);
                $url = base_url() . "/main/index/" . $shop['slug'];
                return redirect()->to($url , "refresh");
                // return redirect()->to(base_url('senang/fail/' , "refresh"));
                // $this->debug($_REQUEST);

            }

            
        }
    }

    function senang_callback(){

        try {

            if($_REQUEST){

                $response = json_encode($_REQUEST, true);

                $where = [
                    'response' => $response,
                    'type' => 'callback'
                ];
                
                $senang = $this->SenangResponseModel->getWhere($where);
                if(empty($senang)){
                    $data = array(
                        'response' =>  $response,
                        'type' => 'callback',
                    );

                    $this->SenangResponseModel->insertNew($data);
    
    
                    if($_REQUEST['status_id'] != 0){
    
                        $where = array(
                            'wallet_topup.wallet_topup_id' => $_REQUEST['order_id']
                        );
                        $data = array(
                            'is_paid' => 1,
                            'remarks' => 'Payment Received',
                        );
                        $this->WalletTopUpModel->updateWhere($where, $data);
                        $topup = $this->WalletTopUpModel->getWhere($where)[0];
                        $this->WalletModel->wallet_in($topup['user_id'],$topup['amount'],$topup['remarks']);
                    }
                }
                // $this->debug($_REQUEST);
                
            }
        } catch(Error $e){

            $data = array(
                'response' => $e->getMessage(),
                'type' => basename($_SERVER['REQUEST_URI']),
            );
            $this->SenangResponseModel->insertNew($data);

        }
    }
}

