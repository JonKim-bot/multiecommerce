<?php



namespace App\Controllers;

use App\Core\BaseController;
use App\Models\ShopModel;
use App\Models\ProductModel;
use App\Models\BannerModel;
use App\Models\AboutModel;
use App\Models\CategoryModel;
use App\Models\OrdersModel;
use App\Models\MerchantModel;
use App\Models\AnnouncementModel;

use App\Models\ProductOptionSelectionModel;

use App\Models\OrderDetailModel;
use App\Models\PaymentMethodModel;
use App\Models\EmailModel;
use App\Models\OrdersStatusModel;

use App\Models\ShopPaymentMethodModel;

class Main extends BaseController
{


    public function __construct()
    {
        $this->ShopModel = new ShopModel();
        $this->AboutModel = new AboutModel();
        $this->CategoryModel = new CategoryModel();
        $this->OrdersModel = new OrdersModel();
        $this->MerchantModel = new MerchantModel();
        $this->AnnouncementModel = new AnnouncementModel();
        $this->OrdersStatusModel = new OrdersStatusModel();
        $this->ProductOptionSelectionModel = new ProductOptionSelectionModel();

        $this->EmailModel = new EmailModel();

        $this->BannerModel = new BannerModel();
        $this->ProductModel = new ProductModel();
        $this->PaymentMethod = new PaymentMethodModel();
        $this->ShopPaymentMethodModel = new ShopPaymentMethodModel();

        $this->OrderDetailModel = new OrderDetailModel();


        $this->pageData = array();
    }

    public function index($slug)
    {
        $where =[
            'slug' => $slug
        ];
        $shop = $this->ShopModel->getWhere($where);
        $this->show_404_if_empty($shop);
        
        $where = [
            'shop_id' => $shop[0]['shop_id'],
        ];
        $product = $this->ProductModel->getWhere($where);
        $category = $this->CategoryModel->getWhere($where);
        $banner = $this->BannerModel->getWhere($where);
        $about = $this->AboutModel->getWhere($where);
        $payment_method = $this->PaymentMethod->getAll();
        $shop_payment_method = $this->ShopPaymentMethodModel->getWhere($where);
        $shop_payment_method = array_column($shop_payment_method,'payment_method_id');
        // $this->debug($shop_payment_method);
        $this->pageData['shop_payment_method'] = $shop_payment_method;
        
        $this->pageData['payment_method'] = $payment_method;
        $shop[0]['merchant_name'] = $this->MerchantModel->getWhere($where)[0]['name'];
            
        $where = [
            'shop_id' => $shop[0]['shop_id'],
            'is_active' => 1,
        ];
        $announcement = $this->AnnouncementModel->getWhere($where);
        if(!empty($announcement)){
            $announcement = $announcement[0];
            $this->pageData['announcement'] = $announcement;
        }
        $this->pageData['shop'] = $shop[0];
        $this->pageData['category'] = $category;
        $this->pageData['banner'] = $banner;
        if(!empty($about)){
            $about = $about[0];
            $this->pageData['about'] = $about;
        }
        
        
        $this->pageData['product'] = $product;
        // $this->debug($product);
        // $this->debug($product);
        // $this->debug($product);
        echo view("main/index", $this->pageData);
    }
    

    public function get_order_detail_option($order_detail){
 
        foreach($order_detail as $key=> $row_detail){
            if($row_detail['product_option_selection_id'] != null){
                $product_option_selection_ids = explode(",",$row_detail['product_option_selection_id']);
                $option_selection_arr = [];
                foreach ($product_option_selection_ids as $product_option_selection_id){
                    $where = [
                        'product_option_selection_id' => $product_option_selection_id
                    ];
                    $product_option_selection = $this->ProductOptionSelectionModel->getWhere($where);
                    if(!empty($product_option_selection)){

                        array_push($option_selection_arr,$product_option_selection[0]);
                    }
                }
                $order_detail[$key]['order_detail_option'] = $option_selection_arr;
                
            }
        }
        return $order_detail;
    }

    public function view_order_status($orders_id = "")
    {
        $where = array(
            "orders.orders_id" => $orders_id,
        );
        $orders = $this->OrdersModel->getWhere($where);
    
        
        foreach($orders as $key_main=> $row){
            $order_detail = $this->OrderDetailModel->getWhere([
                'orders_id' => $row['orders_id']
            ]);   
            $orders[$key_main]['order_detail'] = $this->get_order_detail_option($order_detail);
 
        }
        // $this->show_404_if_empty($admin);

        $this->pageData["orders_status"] = $this->OrdersStatusModel->getAll();
        
        $this->pageData['shop'] = $this->ShopModel->getWhere(['shop.shop_id' => $orders[0]['shop_id']])[0];
    

        $shop_contact = $this->ShopModel->getWhere([
            'shop_id' => $orders[0]['shop_id']
        ])[0]['contact'];
        

        $order_url = base_url()  . "/main/order_detail/" . $orders_id;
        $message = "MyOrder|我的订单 -> Note " . $order_url;
        $message = rawurlencode($message);
        
        
        $orders[0]['url'] =  "https://api.whatsapp.com/send?phone=" .$shop_contact. "&text=" . $message;
        $this->pageData["orders"] = $orders[0];

        // $this->debug($orders);
        echo view("main/orders_tracking", $this->pageData);

    }
    public function order_detail($orders_id)
    {
        
        $where = array(
            "orders.orders_id" => $orders_id,
        );
        $orders = $this->OrdersModel->getWhere($where);
        // $this->debug($orders);

        foreach($orders as $key_main=> $row){
            $order_detail = $this->OrderDetailModel->getWhere([
                'orders_id' => $row['orders_id']
            ]);   
            $orders[$key_main]['order_detail'] = $this->get_order_detail_option($order_detail);
 
        }

        // $this->debug($orders);
        $this->show_404_if_empty($orders);
        $shop_contact = $this->ShopModel->getWhere([
            'shop_id' => $orders[0]['shop_id']
        ])[0]['contact'];
        
        $shop = $this->ShopModel->getWhere([
            'shop_id' => $orders[0]['shop_id']

        ]);
        $this->pageData["shop"] = $shop[0];

        $order_url = base_url()  . "/main/order_detail/" . $orders_id;
        $message = "MyOrder|我的订单 -> Note " . $order_url;
        $message = rawurlencode($message);
        
        
        $orders[0]['url'] =  "https://api.whatsapp.com/send?phone=" .$shop_contact. "&text=" . $message;
        // $this->debug($orders);

        $this->pageData["orders"] = $orders[0];

        // $this->debug($product);
        echo view("main/order_detail", $this->pageData);
    }
    

    

    
    public function blog($slug)
    {
        $where = ['slug' => $slug];
        $this->pageData['article'] = $this->ArticleModel->getWhere($where)[0];
        $where = [
            
            'article.deleted' => "0",
            'slug !=' => $slug,
    
        ];

        
        $this->pageData['images'] = $this->ArticleImageModel->getWhere([
            'article_id' => $this->pageData['article']['article_id']
        ]);

        $this->pageData['more_read'] = $this->ArticleModel->getWhere($where, 5);
        if(count($this->pageData['more_read']) > 1){
            $rand_keys = array_rand($this->pageData['more_read'], 2);
        }else{
            $rand_keys = 1;

        }
        //if the more read post is less than satu then show it
        $previous = "javascript:history.go(-1)";
        if(isset($_SERVER['HTTP_REFERER'])) {
            $previous = $_SERVER['HTTP_REFERER'];
        }
        //go back to previos page
        $this->pageData['prevLink'] = $previous;

        echo view("main/blog", $this->pageData);
    }

    public function form (){
        $category = $this->CategoryModel->getAll();
        echo view("main/googleform", $this->pageData);
    }
    public function map ($slug1 = "", $slug2 = "",$alpha = ''){
        $slg = "";
        $slg2 = "";
        if ($slug1 != "") {
            $slg = $this->SlugModel->getSlugID($slug1);
            // $this->debug($slg);
        }
        $category_ids = array();

        if (!empty($slug2)) {
            $slug2 = explode("-", $slug2);
            foreach ($slug2 as $row) {
                array_push($category_ids, $this->SlugModel->getSlugID($row));
            }
        }


        $outlet = $this->OutletModel->getFromTagsAjax($slg, $category_ids);
        foreach($outlet as $key=> $rowO){
            $where=[
                'outlet_id' => $rowO['outlet_id'],
            ];
            $outlet[$key]['outlet_image'] = $this->OutletImageModel->getWhere($where);
            $outlet[$key]['outlet_additional_info'] = $this->OutletInfoModel->getWhere($where);
        }


        $this->pageData['outlet'] = $outlet;
        $slg = $this->SlugModel->getWhere(array("slug" => $slug1));
        // $slg2 = $this->SlugModel->getWhere(array("slug" => $slug2));
        $slg2 = array();
        $this->pageData['slug'] = count($slg) ? $slg[0] : false;
        $this->pageData['slug2'] = $category_ids;

        if($this->pageData['slug']!=false){

            $where =['slug_id' => $slg[0]['slug_id']];
            $this->pageData['description'] = $this->AreaModel->getWhere($where)[0]['description'];
        }
        $this->pageData['area'] = $this->AreaModel->getAll();
        $category = $this->CategoryModel->getAll();
        $this->pageData['category'] =$category;
        $where = [
            'meta_id' => 2
        ];
        $this->pageData['meta'] = $this->MetaModel->getWhere($where)[0];
        echo view("main/map", $this->pageData);
    }
    public function browse($slug1 = "", $slug2 = "",$alpha = '')
    {
        $slg = "";
        $slg2 = "";
        if ($slug1 != "") {
            $slg = $this->SlugModel->getSlugID($slug1);
            // $this->debug($slg);
        }
      
        $category_ids = array();

        if (!empty($slug2)) {
            $slug2 = explode("-", $slug2);
            foreach ($slug2 as $row) {
                array_push($category_ids, $this->SlugModel->getSlugID($row));
            }
        }


        $page = 1;
        $filter = array();

        if($_GET){
            $get = $_GET;
            if(!empty($get['page'])) $page = $get['page'];
        }

        $outlet = $this->OutletModel->getFromTagsAjax($slg, $category_ids,'ALPHA',10,$page,$filter);
        $pagination = $outlet['pagination'];
        $this->pageData['pagination'] = $pagination;
        $outlet = $outlet['result'];

        foreach($outlet as $key=> $rowO){
            $where=[
                'outlet_id' => $rowO['outlet_id'],
            ];
            $outlet[$key]['outlet_image'] = $this->OutletImageModel->getWhere($where);
            $outlet[$key]['outlet_additional_info'] = $this->OutletInfoModel->getWhere($where);
        }

        
        
        $this->pageData['outlet'] = $outlet;
        $slg = $this->SlugModel->getWhere(array("slug" => $slug1));
        // $slg2 = $this->SlugModel->getWhere(array("slug" => $slug2));
        $slg2 = array();
        $this->pageData['slug'] = count($slg) ? $slg[0] : false;
        $this->pageData['slug2'] = $category_ids;

        if($this->pageData['slug']!=false){

            $where =['slug_id' => $slg[0]['slug_id']];
            $this->pageData['description'] = $this->AreaModel->getWhere($where)[0]['description'];
        }
        $this->pageData['area'] = $this->AreaModel->getAll();
        $category = $this->CategoryModel->getAll();
        $this->pageData['category'] =$category;
        $where = [
            'meta_id' => 2
        ];
        $this->pageData['meta'] = $this->MetaModel->getWhere($where)[0];
         
        echo view("main/browse", $this->pageData);
    }

    public function promo($slug = "")
    {
        $where = [
            'slug' => $slug,
        ];
        $this->pageData['promo'] = $this->PromoModel->getWhere($where)[0];

        echo view("main/promo", $this->pageData);
    }
    public function event($slug1 = "")
    {

        $slug_id = $this->SlugModel->getWhere(['slug' => $slug1])[0]['slug_id'];

        $where = [
            'activity.slug_id' => $slug_id,
        ];
        $this->pageData['activity'] = $this->ActivityModel->getWhere($where)[0];
        $where = [
            'activity_id !=' => $this->pageData['activity']['activity_id'],
        ];
        $this->pageData['otherActivity'] = $this->ActivityModel->getWhere($where);

        echo view("main/event", $this->pageData);

    }
}
