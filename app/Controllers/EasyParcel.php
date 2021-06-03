<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Core\BaseController;

class EasyParcel extends BaseController
{
    public function __construct()
    {

        $this->pageData = array();
        $this->api = "EP-npUVCvoxm";
        $this->auth = "7hfXxCTIkr";
    }
    public function expressOrder()
    {
        $domain = "http://demo.connect.easyparcel.my/?ac=";
        $action = "EPSubmitOrderBulkV3";
        $postparam = array(
            'authentication' => $this->auth,
            'api' =>$this->api,
            'courier' => array(
                'Poslaju'
            ) ,
            'dropoff' => '0',
            'bulk' => array(
                array(
                    'referrence' => 'item1',
                    'weight' => '1',
                    'content' => '2017-09-14 - book',
                    'value' => '20',
                    'pick_name' => 'Yong Tat',
                    'pick_company' => 'Yong Tat Sdn Bhd',
                    'pick_contact' => '+6012-1234-5678',
                    'pick_mobile' => '+6017-1234-5678',
                    'pick_addr1' => 'ppppp46/7 adfa',
                    'pick_addr2' => 'test',
                    'pick_addr3' => 'test',
                    'pick_addr4' => '',
                    'pick_city' => 'png',
                    'pick_state' => 'png',
                    'pick_code' => '14300',
                    'pick_country' => 'MY',
                    'send_name' => 'Sam',
                    'send_contact' => '+6012-2134567',
                    'send_mobile' => '+6017-1234-5678',
                    'send_addr1' => 'ssssadsasdst test',
                    'send_addr2' => 'test test',
                    'send_addr3' => 'test',
                    'send_addr4' => '',
                    'send_city' => 'png',
                    'send_state' => 'png',
                    'send_code' => '11950',
                    'send_country' => 'MY',
                    'collect_date' => '2021-06-08',
                    'send_email' => 'xxxxxx@hotmail.com',
                    'sms' => '0',
                ) ,
            ) ,
        );
        $url = $domain . $action;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postparam));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        ob_start();
        $return = curl_exec($ch);
        ob_end_clean();
        curl_close($ch);
        $json = json_decode($return);
        echo "<pre>";
        print_r($json);
        echo "</pre>";
    }
    public function MarketRateChecking()
    {
        $domain = "http://demo.connect.easyparcel.my/?ac=";
        $action = "MPNormalRateCheckingBulk";
        $postparam = array(
            'authentication' => $this->auth,
            'api' =>$this->api,
            'bulk' => array(
                array(
                    'pick_code' => '14300',
                    'pick_state' => 'nt',
                    'pick_country' => 'MY',
                    'send_code' => '81100',
                    'send_state' => 'jhr',
                    'send_country' => 'MY',
                    'weight' => '10',
                    'width' => '0',
                    'length' => '0',
                    'height' => '0',
                    'date_coll' => '2017-11-10',
                ) ,
                array(
                    'pick_code' => '14300',
                    'pick_state' => 'nt',
                    'pick_country' => 'MY',
                    'send_code' => '81100',
                    'send_state' => 'jhr',
                    'send_country' => 'MY',
                    'weight' => '10',
                    'width' => '0',
                    'length' => '0',
                    'height' => '0',
                    'date_coll' => '2017-11-10',
                ) ,
            ) ,
        );
        $url = $domain . $action;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postparam));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        ob_start();
        $return = curl_exec($ch);
        ob_end_clean();
        curl_close($ch);
        $json = json_decode($return);
        echo "<pre>";
        print_r($json);
        echo "</pre>";
    }
    public function trackParcelDetail()
    {
        $domain = "http://demo.connect.easyparcel.my/?ac=";
        $action = "MPTrackingBulk";
        $postparam = array(
            'authentication' => $this->auth,
            'api' =>$this->api,
            'bulk' => array(
                array(
                    'awb_no' => '238725129086',
                ) ,
                array(
                    'awb_no' => '238725129086',
                ) ,
            ) ,
        );
        $url = $domain . $action;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postparam));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        ob_start();
        $return = curl_exec($ch);
        ob_end_clean();
        curl_close($ch);
        $json = json_decode($return);
        echo "<pre>";
        print_r($json);
        echo "</pre>";
    }
    public function checkParcelStatus()
    {
        $domain = "http://demo.connect.easyparcel.my/?ac=";
        $action = "MPParcelStatusBulk";
        $postparam = array(
            'authentication' => $this->auth,
            'api' =>$this->api,
            'bulk' => array(
                array(
                    'order_no' => 'EI-AAGWD',
                ) ,
                array(
                    'order_no' => 'EI-AAGWD',
                ) ,
            ) ,
        );
        $url = $domain . $action;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postparam));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        ob_start();
        $return = curl_exec($ch);
        ob_end_clean();
        curl_close($ch);
        $json = json_decode($return);
        echo "<pre>";
        print_r($json);
        echo "</pre>";
    }
    public function checkOrderStatus()
    {
        $domain = "http://demo.connect.easyparcel.my/?ac=";
        $action = "MPOrderStatusBulk";
        $postparam = array(
            'authentication' => $this->auth,
            'api' =>$this->api,
            'bulk' => array(
                array(
                    'order_no' => 'EI-AAGWD',
                ) ,
                array(
                    'order_no' => 'EI-AAGWD',
                ) ,
            ) ,
        );
        $url = $domain . $action;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postparam));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        ob_start();
        $return = curl_exec($ch);
        ob_end_clean();
        curl_close($ch);
        $json = json_decode($return);
        echo "<pre>";
        print_r($json);
        echo "</pre>";
    }

    public function makePayment()
    {
        $domain = "http://demo.connect.easyparcel.my/?ac=";
        $action = "MPPayOrderBulk";
        $postparam = array(
            'authentication' => $this->auth,
            'api' =>$this->api,
            'bulk' => array(
                array(
                    'order_no' => 'EI-AAGWD',
                ) ,
                array(
                    'order_no' => 'EI-AAGWD',
                ) ,
            ) ,
        );
        $url = $domain . $action;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postparam));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        ob_start();
        $return = curl_exec($ch);
        ob_end_clean();
        curl_close($ch);
        $json = json_decode($return);
        echo "<pre>";
        print_r($json);
        echo "</pre>";

    }
    public function makeOrder()
    {
        $domain = "http://demo.connect.easyparcel.my/?ac=";
        $action = "MPSubmitOrderBulk";
        $postparam = array(
            'authentication' => $this->auth,
            'api' =>$this->api,
            'bulk' => array(
                array(
                    'weight' => '1',
                    'width' => '0',
                    'length' => '0',
                    'height' => '0',
                    'content' => '2017-09-14 - book',
                    'value' => '20',
                    'service_id' => 'EP-CS0W',
                    'pick_point' => 'PGEON_P_JJT',
                    'pick_name' => 'Yong Tat',
                    'pick_company' => 'Yong Tat Sdn Bhd',
                    'pick_contact' => '+6012-1234-5678',
                    'pick_mobile' => '+6017-1234-5678',
                    'pick_addr1' => 'ppppp46/7 adfa',
                    'pick_addr2' => 'test',
                    'pick_addr3' => 'test',
                    'pick_addr4' => '',
                    'pick_city' => 'NT',
                    'pick_state' => 'NT',
                    'pick_code' => '14300',
                    'pick_country' => 'MY',
                    'send_point' => 'PGEON_P_E',
                    'send_name' => 'Sam',
                    'send_company' => '',
                    'send_contact' => '+6012-2134567',
                    'send_mobile' => '+6017-1234-5678',
                    'send_addr1' => 'ssssadsasdst test',
                    'send_addr2' => 'test test',
                    'send_addr3' => 'test',
                    'send_addr4' => '',
                    'send_city' => 'NT',
                    'send_state' => 'NT',
                    'send_code' => '11950',
                    'send_country' => 'MY',
                    'collect_date' => '2017-11-22',
                    'sms' => '1',
                    'send_email' => 'xxxxxx@hotmail.com',
                    'hs_code' => 'yshs_code',
                    'reference' => 'order12321'
                ) ,
                array(
                    'weight' => '1',
                    'width' => '0',
                    'length' => '0',
                    'height' => '0',
                    'content' => '2017-09-14 - book',
                    'value' => '20',
                    'service_id' => 'EP-CS0W',
                    'pick_point' => 'PGEON_P_JJT',
                    'pick_name' => 'Yong Tat',
                    'pick_company' => 'Yong Tat Sdn Bhd',
                    'pick_contact' => '+6012-1234-5678',
                    'pick_mobile' => '+6017-1234-5678',
                    'pick_addr1' => 'ppppp46/7 adfa',
                    'pick_addr2' => 'test',
                    'pick_addr3' => 'test',
                    'pick_addr4' => '',
                    'pick_city' => 'NT',
                    'pick_state' => 'NT',
                    'pick_code' => '14300',
                    'pick_country' => 'MY',
                    'send_point' => 'PGEON_P_E',
                    'send_name' => 'Sam',
                    'send_company' => '',
                    'send_contact' => '+6012-2134567',
                    'send_mobile' => '+6017-1234-5678',
                    'send_addr1' => 'ssssadsasdst test',
                    'send_addr2' => 'test test',
                    'send_addr3' => 'test',
                    'send_addr4' => '',
                    'send_city' => 'NT',
                    'send_state' => 'NT',
                    'send_code' => '11950',
                    'send_country' => 'MY',
                    'collect_date' => '2017-11-22',
                    'sms' => '1',
                    'send_email' => 'xxxxx@hotmail.com',
                    'hs_code' => 'yshs_code',
                    'reference' => 'order12321'
                ) ,
            ) ,
        );
        $url = $domain . $action;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postparam));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        ob_start();
        $return = curl_exec($ch);
        ob_end_clean();
        
        curl_close($ch);
        $json = json_decode($return);
        echo "<pre>";
        print_r($json);
        echo "</pre>";

    }

    public function MPRateCheckingBulk()
    {
        $domain = "http://demo.connect.easyparcel.my/?ac=";
        $action = "MPRateCheckingBulk";
        $postparam = array(
            'authentication' => $this->auth,
            'api' =>$this->api,
            'bulk' => array(

                array(
                    'pick_code' => '10050',
                    'pick_state' => 'png',
                    'pick_country' => 'MY',
                    'send_code' => '11950',
                    'send_state' => 'png',
                    'send_country' => 'MY',
                    'weight' => '5',
                    'width' => '0',
                    'length' => '0',
                    'height' => '0',
                    'date_coll' => '2017-11-10',
                ) ,
                array(
                    'pick_code' => '14300',
                    'pick_state' => 'png',
                    'pick_country' => 'MY',
                    'send_code' => '81100',
                    'send_state' => 'jhr',
                    'send_country' => 'MY',
                    'weight' => '10',
                    'width' => '0',
                    'length' => '0',
                    'height' => '0',
                    'date_coll' => '2017-11-10',
                ) ,
            ) ,
            'exclude_fields' => array(
                'rates.*.pickup_point',
            ) ,
        );
        $url = $domain . $action;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postparam));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        ob_start();
        $return = curl_exec($ch);
        ob_end_clean();
        curl_close($ch);
        $json = json_decode($return);
        echo "<pre>";
        print_r($json);
        echo "</pre>";
    }
}

