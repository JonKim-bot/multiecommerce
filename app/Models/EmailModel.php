<?php namespace App\Models;


use App\Core\BaseModel;
use CodeIgniter\Model;
use App\Models\OrderDetailModel;
use App\Models\OrdersModel;
use App\Models\ShopModel;
use App\Models\OrdersStatusModel;
use App\Models\OrderCustomerModel;

class EmailModel extends BaseModel
{

    public function __construct(){
        parent::__construct();

        $this->OrderDetailModel = new OrderDetailModel();
        $this->OrderCustomerModel = new OrderCustomerModel();

        $this->OrdersModel = new OrdersModel();
        $this->ShopModel = new ShopModel();
        $this->OrdersStatusModel = new OrdersStatusModel();

        $this->pageData = array();

    }
    
    function send_email_tracking($orders_id = ""){
        $email = \Config\Services::email();
        // $orders_id = 25;
        $where = array(
            "orders.orders_id" => $orders_id,
        );
        $orders = $this->OrdersModel->getWhere($where);
      
        foreach($orders as $key=> $row){
            $orders[$key]['order_detail'] = $this->OrderDetailModel->getWhere([
                'orders_id' => $row['orders_id']
            ]);   
        }
        // $this->show_404_if_empty($admin);

        $this->pageData["orders_status"] = $this->OrdersStatusModel->getAll();
        
        $this->pageData['shop'] = $this->ShopModel->getWhere(['shop.shop_id' => $orders[0]['shop_id']])[0];
    

        $shop_contact = $this->ShopModel->getWhere([
            'shop_id' => $orders[0]['shop_id']
        ])[0]['contact'];
        
     
        $where = [
            'order_customer.order_customer_id' => $orders[0]['order_customer_id']
        ];
        $orders = $orders[0];
        $order_customer = $this->OrderCustomerModel->getWhere($where)[0];
        $shop = $this->ShopModel->getWhereNormal(['shop.shop_id' => $orders['shop_id']])[0];
        $order_url = base_url() . "/main/payment/" .  $orders['order_code'];

        $message = "Order No : ".$orders['order_code']." \nTotal Amount : " . $orders['grand_total'] . "\n\n*Customer Info*\nName : ". $order_customer['full_name'] ."\nAddress : ". $order_customer['address'] ."\nContact : ". $order_customer['contact'] ."\n\nPlease Kindly Check your order detail at : \n". $order_url ."\n\n*Merchant Bank Info*\n\nBank Name : ". $shop['bank'] ."\nBank Account : ". $shop['bank_account'] ."\nBank Holder Name : ". $shop['bank_holder_name'] ." ";

        $message = rawurlencode($message);
        
        $order_url=  "https://api.whatsapp.com/send?phone=" .$shop['contact']. "&text=" . $message;
        $orders['url'] =  $order_url;

        $this->pageData["orders"] = $orders;

        $view = view('admin/orders/orders_tracking', $this->pageData);
        $email->setFrom('piegensoftware20@gmail.com', $this->pageData['shop']['shop_name'] . " orders");
        if($orders['email'] != ""){

            $email->setTo($orders['email']);
    
            $email->setSubject($orders['shop_name'] . ' Orders ' . $orders['orders_status']);
            $email->setMessage($view);
    
            if ($email->send()) {
                return true;
    
            } else {
    
                $message = $email->printDebugger();
                die($message);
            }
        }
    }
    

    function send_email($sent_to = "", $orders_id = ""){
        $email = \Config\Services::email();
        // $orders_id = 25;
        $where = array(
            "orders.orders_id" => $orders_id,
        );
        // $sent_to = 'yongrou74@hotmail.com';
        $orders = $this->OrdersModel->getWhere($where);
        foreach($orders as $key=> $row){
            $orders[$key]['order_detail'] = $this->OrderDetailModel->getWhere([
                'orders_id' => $row['orders_id']
            ]);   
        }
        
        $this->pageData['shop'] = $this->ShopModel->getWhere(['shop_id' => $orders[0]['shop_id']])[0];
        // $this->show_404_if_empty($admin);
        $this->pageData["orders"] = $orders[0];

        $view = view('admin/orders/email_order', $this->pageData);
        $email->setFrom('piegensoftware20@gmail.com', $this->pageData['shop']['shop_name'] . " orders");
        $email->setTo($sent_to);

        $email->setSubject($orders[0]['shop_name'] . ' Orders');
        $email->setMessage($view);

        if ($email->send()) {
            // echo "sent";
            return true;

        } else {

            $message = $email->printDebugger();
            die($message);
        }
    }

}