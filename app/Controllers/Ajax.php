<?php namespace App\Controllers;


use App\Core\BaseController;
use App\Models\ShopModel;
use App\Models\OrdersModel;
use App\Models\OrderDetailModel;
use App\Models\OrderCustomerModel;
use App\Models\ShopTokenModel;
use App\Models\PromoModel;
use App\Models\EmailModel;
use App\Models\ProductOptionModel;
use App\Models\ProductOptionSelectionModel;
use App\Models\ProductModel;
use App\Models\OrderDetailOptionModel;
use App\Models\ShopOperatingHourModel;

require_once('./public/config.php');
// require_once(APPPATH.'/libraries/config.php'); 


class Ajax extends BaseController
{


public function __construct()
    {
        $this->ShopOperatingHourModel = new ShopOperatingHourModel();

        $this->EmailModel = new EmailModel();
        $this->ProductModel = new ProductModel();
        $this->OrderDetailOptionModel = new OrderDetailOptionModel();

        $this->ShopModel = new ShopModel();
        $this->OrdersModel = new OrdersModel();
        $this->OrderDetailModel = new OrderDetailModel();
        $this->OrderCustomerModel = new OrderCustomerModel();
        $this->ShopTokenModel = new ShopTokenModel();
        $this->PromoModel = new PromoModel();
        $this->ProductOptionModel = new ProductOptionModel();
        $this->ProductOptionSelectionModel = new ProductOptionSelectionModel();

        $this->pageData = array();
        date_default_timezone_set("Asia/Kuala_Lumpur");

    }
    public function fetch_menu(){
        $product_id = $_POST['product_id'];
        $where = [
            'product.product_id' => $product_id
        ];
        $this->pageData['product'] = $this->ProductModel->getWhere($where)[0];
        $where = [

            'product_id' => $product_id
        ];
        $product_option = $this->ProductOptionModel->getWhere($where);
        foreach($product_option  as $key=> $row){
            $where = [
                'product_option_selection.product_option_id' => $row['product_option_id']
            ];
            $product_option[$key]['selection'] = $this->ProductOptionSelectionModel->getWhere($where);
        }
        $total_minrequired = array_sum(array_column($product_option,'minimum_required'));
        $this->pageData['total_min'] = $total_minrequired;
        $this->pageData['product_option'] = $product_option;
        // $this->debug($product_option);
        echo view("main/menuform", $this->pageData);
    }
    public function get_lat_long_from_place_id(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 
            'https://maps.googleapis.com/maps/api/place/details/json?placeid='.$_POST['place_id'].'&key=AIzaSyCAIJ95ufzqwjC7nE6nuUocyjOABoqFPaA'
        );
        $content = curl_exec($ch);
        echo $content;
    }
    public function get_position_from_lat_lng(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 
            'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$_POST['lat'] . "," . $_POST['lng'].'&sensor=true&key=AIzaSyCAIJ95ufzqwjC7nE6nuUocyjOABoqFPaA'
        );
        $content = curl_exec($ch);
        echo $content;
    }
    public function stripe_payment(){
        // $this->debug($_POST);
        if(isset($_POST['stripeToken'])){
            $byStripe = true;
            
            $_POST['product'] = json_decode($_POST['product'], true);
            $orders = $this->submit_order($byStripe);
            
            \Stripe\Stripe::setVerifySslCerts(false);
            $token=$_POST['stripeToken'];

            $customer = \Stripe\Customer::create(array(
                // 'email'   => $_POST["email_address"],
                'source'  => $_POST["stripeToken"],
                'name'   => $_POST["name"],
                'email' => $_POST['email'],
                'description' => 'Contact : ' . $_POST['contact'],
                'address'  => array(
                    'line1'   => $_POST["delivery_address"],
                    'country'  => 'MY'
                )
            
            ));

            // \Stripe\Customer::createSource(
            //     $customer->id,
            //     ['source' => $token]
            // );
            

            $data=\Stripe\Charge::create(array(
                "amount"=> $_POST['f_stripe_total'],
                "currency"=>"myr",
                'customer' => $customer->id,
                "description"=> $orders['url'],
                // "source"=>$token,
              
                // 'customer' => $_POST['name'],
            ));

            // $this->debug($data);
            if($data->paid){
                // $this->submit_order($byStripe,$data->receipt_url);
                $data = [
                    'receipt_url' => $data->receipt_url
                ];
                $where =[
                    'orders_id' => $orders['orders_id']
                ];
                $this->OrdersModel->updateWhere($where,$data);

                echo "<script>
                
                window.location.href = '".$orders['url']."'
                </script>";
                
            }
            // $this->debug($_POST);

            
           
            // print_r($data);
        }else{
            $this->show_404_if_empty($_POST);
        }
    }
    public function register_token(){
        if($_POST){
            $token = $_POST['token'];
            $where = [
                'token' => $token
            ];
            $token_exist = $this->ShopTokenModel->getWhere($where);
            if(!empty($token_exist)){
                die(json_encode(array(
                    'status' => false,
                    'data' => 'token existed'
                )));
            }else{
                $data = [
                    'shop_id' => $this->shop_id,
                    'token' => $token,
                    'created_by' => session()->get('login_id'),
                ];
                $this->ShopTokenModel->insertNew($data);

                die(json_encode(array(
                    'status' => true,
                    'data' => 'token register'
                )));
            }
        }   

    }

    public function send_notification($token,$shop_name,$image){
        
        $url ="https://fcm.googleapis.com/fcm/send";

        $fields=array(
            "to"=>$token,
            "notification"=>array(
                "body"=>"Your have a new order",
                "title"=> $shop_name . " orders",
                "icon"=> base_url() . $image,
                "click_action"=>"piegen"
            )
        );

        $headers=array(
            'Authorization: key=AAAAlnuq00s:APA91bE39qpxD2UojvFVjS2DTU0rvTO72y8D1LniB8IwYSnPtSR9lPd0f2yXV9EjO3K43oyyQb2jPQrTEwQem_x-NjGEX6yfAHVbXHoFfL2mMO37KpArnV8cD0vizICkH4FaC2QljSyb',
            'Content-Type:application/json'
        );

        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
        $result=curl_exec($ch);
        // print_r($result);
        curl_close($ch);
    }

    public function check_operating_hour(){
            $where = [
                'day' => $_POST['day'],
                'shop_id' => $_POST['shop_id'],
            ];
            $time_now = date('H:i');
            $operating_hour = $this->ShopOperatingHourModel->getWhere($where);
            if(!empty($operating_hour)){
                $operating_hour = $operating_hour[0];
                if($time_now > $operating_hour['closed_at'] || $time_now < $operating_hour['open_at']){
                    //not in operating hour
                    die(json_encode([
                        'status' => false,
                        'data' => 'Not in operating hour'
                    ]));
                }else{
                    die(json_encode([
                        'status' => true,
                        'data' => 'In operating hour'
                    ]));
                }
            }else{
                die(json_encode([
                    'status' => false,
                    'data' => 'Not in operating hour'
                ]));
            }
    }
   
    public function apply_promo(){
        if($_POST){
            $where = [
                'code' => $_POST['promocode'],
                'shop_id' => $_POST['shop_id'],

                'is_active' => 1,
            ];
            $promo = $this->PromoModel->getWhere($where);
            if(!empty($promo)){
                $promo = $promo[0];
                $grand_total = str_replace("RM","",$_POST['grand_total']);
                if($promo['discount_type_id'] == 1){

                    $discount_amount = str_replace("RM","",$promo['amount']);
                    $newTotal = str_replace("RM","",$_POST['grand_total']) - str_replace("RM","",$promo['amount']);
                }else{

                    $discount_amount  = str_replace("RM","",$_POST['grand_total']) * ($promo['percent'] / 100);

                    $newTotal = str_replace("RM","",$_POST['grand_total']) - $discount_amount;
                }
                

                $min = str_replace("RM","",$promo['minimum']);

                if($grand_total < $min){

                    die(json_encode(array(
                        'status' => false,
                        
                        'error' => "Min",
                        'min' => $min,

                    )));
                }else{
                    $initial_used = $promo['used'];
                    $this->PromoModel->updateWhere($where,['used' => ($initial_used + 1)]);
                    die(json_encode(array(
                        'status' => true,
                        'promo_id' => $promo['promo_id'],
                        'discount' => round($discount_amount,2),
                        'amount' => $newTotal
                    )));
                }

            }else{
                die(json_encode(array(
                    'status' => false,
                    'error' => "Invalid",
                )));

            }
        }
    }

    public function submit_order($byStripe = false)
    {
        if($_POST){
            $customer_data = [
                'full_name' => $_POST['name'],
                'contact' => $_POST['contact'],
                'address' => $_POST['delivery_address'],
                'email' => $_POST['email'],
                'url' => $_POST['url'],
                'shop_id' => $_POST['shop_id'],
            ];
            
            $order_customer_id = $this->OrderCustomerModel->insertNew($customer_data);

            $order_data = [
                'order_customer_id' => $order_customer_id,
                'orders_status_id' => 1,
                'delivery_time' => $_POST['delivery_time'],
                'delivery_date' => $_POST['delivery_date'],
                'delivery_method' => $_POST['delivery_option'],
                'payment_method_id' => $_POST['payment_method_id'],
                'is_preorder' => $_POST['is_preorder'],
                'delivery_fee' => $_POST['delivery_fee'],
                'grand_total' => $_POST['grand_total'],
                'created_at' => date('d-m-Y H:i:s'),
                'subtotal' => $_POST['subtotal'],
                'shop_id' => $_POST['shop_id'],
            ];
            if($_POST['customer_id'] > 0){
                $order_data['customer_id'] = $_POST['customer_id'];
            }
            if($_POST['promo_id'] > 0){
                $order_data['promo_id'] = $_POST['promo_id'];
            }
            $order_id = $this->OrdersModel->insertNew($order_data);

            // $this->debug($_POST['product']);
            if(!empty($_POST['product'])){

                foreach($_POST['product'] as $row){
                    $order_detail_data = [
                        'orders_id' => $order_id,
                        'product_id' => $row['product_id'],
                        'product_quantity' => $row['product_quantity'],
                        'product_name' => $row['product_name'],
                        'product_price' => $row['product_price'],
                        'product_total_price' => $row['product_total_price'],
                        'remark' => $row['item_remark'],

                        'delivery_fee' => $_POST['delivery_fee'],
    
                    ];
                    $order_detail_id = $this->OrderDetailModel->insertNew($order_detail_data);
                    if($row['item_addon'] != "0"){
                        foreach($row['item_addon'] as $rowaddon){
                            $order_detail_selection = [
                                'order_detail_id' => $order_detail_id,
                                'product_option_selection_id' => $rowaddon,
                                'ids' => json_encode($row['item_addon']),
                            ];
                            $oder_detail_selection = $this->OrderDetailOptionModel->insertNew($order_detail_selection);
                        }
                    }
                        
                }
            }
            $url = base_url() . "/main/order_detail/". $order_id;
            $where = [
                'shop_id' => $_POST['shop_id'],
            ];

            $shop = $this->ShopModel->getWhere($where)[0];
            // $shop_name = $this->ShopModel->getWhere($where)[0]['contact'];

            $shop_token = $this->ShopTokenModel->getWhere($where);




            foreach($shop_token as $row){
                $this->send_notification($row['token'],$shop['shop_name'],$shop['image']);
            }
            
            if($_POST['email'] != ""){
                $this->EmailModel->send_email($_POST['email'],$order_id);
            }
            if($shop['email'] != ""){
                $this->EmailModel->send_email($shop['email'],$order_id);
            }

            if($byStripe == false){
                

                die(json_encode(array(
                    'status' => true,
                    'url' => $url,
                    'contact' => $shop['contact'],
                )));
            }else{
                return array(
                    'url' => $url,
                    'orders_id' => $order_id,
                );
            }

            

        }
    

    }

}
