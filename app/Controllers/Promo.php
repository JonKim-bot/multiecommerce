<?php


namespace App\Controllers;


use App\Core\BaseController;
use App\Models\OrdersModel;
use App\Models\PromoModel;
use App\Models\PromoTypeModel;
use App\Models\ProductModel;

class Promo extends BaseController
{
    

    public function __construct()
    {

        $this->pageData = array();
        $this->PromoModel = new PromoModel();
        $this->PromoTypeModel = new PromoTypeModel();
        $this->OrdersModel = new OrdersModel();

        $this->ProductModel = new ProductModel();

        // if(session()->get('login_data')['type'] == null && uri_string() != "access/login"){
        //     //  redirect()->to(base_url('access/login/'));
        //     echo "<script>location.href='".base_url()."/access/login';</script>";
        // }

        $this->pageData['promo_type'] = $this->PromoTypeModel->getAll();

        $product = $this->ProductModel->getAll();

        $this->pageData["product"] = $product;
        

    }

    public function change_status($promo_id){
        $where = [
            'promo_id' => $promo_id

        ];
        $promo = $this->PromoModel->getWhere($where)[0];
        if($promo['is_active'] == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        $this->PromoModel->updateWhere($where,['is_active' => $status]);

        return redirect()->to(base_url('promo/detail/' . $promo_id, "refresh"));

    }
    public function index()
    {

      
        $promo = $this->PromoModel->getAll();
        $this->pageData['promo'] = $promo;

        echo view('admin/header', $this->pageData);
        echo view('admin/promo/all');
        echo view('admin/footer');
    }

    public function get_promo($promo_type_id,$data){
        if($promo_type_id == 2){
            if($_POST['discount_type_id'] == 1){
                $data['offer_amount'] = $_POST['offer_amount'];
            }else{
                $data['offer_percent'] = $_POST['offer_percent'];
            }
        }
        if($promo_type_id == 3){
            if($_POST['discount_type_id'] == 1){
                $data['offer_amount'] = $_POST['offer_amount'];
            }else{
                $data['offer_percent'] = $_POST['offer_percent'];
            }
            
            $data['product_id'] =join(",",$_POST['product_id']); ;

        }
        return $data;
    }


    public function add()
    {


        if ($_POST) {

            $input = $this->request->getPost();
            $error = false;
            if (!$error) {
                $promo_type_id = $this->request->getPost("promo_type_id");
                $affliate = isset($_POST['for_affliate']) ? 1 : 0 ;
                $new_member = isset($_POST['new_member']) ? 1 : 0 ;
                $data = array(
                    "code" => $this->request->getPost("code"),
                    "promo_type_id" => $this->request->getPost("promo_type_id"),
                    "discount_type_id" => $this->request->getPost("discount_type_id"),
                    'is_newmemberonly' => $new_member,
                    'is_affliate' => $affliate,
                    'minimum' =>  $this->request->getPost("minimum"),
                    'shop_id' => $this->shop_id,

                    'created_by' => session()->get('login_id'),
                );
                $data = $this->get_promo($promo_type_id,$data);
                
                // $this->debug($data);
 
                $this->PromoModel->insertNew($data);
            


                return redirect()->to(base_url('promo', "refresh"));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/promo/add');
        echo view('admin/footer');
    }

    public function detail($promo_id)
    {

        $where = array(
            "promo_id" => $promo_id,
        );
        $promo = $this->PromoModel->getWhere($where);
        $where = array(
            "orders.promo_id" => $promo_id,
        );
      
        $order_with_promo = $this->OrdersModel->getWhere($where);

        $this->pageData["order_with_promo"] = $order_with_promo;
        // $this->show_404_if_empty($admin);

        $this->pageData["promo"] = $promo[0];

        echo view('admin/header', $this->pageData);
        echo view('admin/promo/detail');
        echo view('admin/footer');
    }

    public function edit($promo_id)
    {

        $where = array(

            "promo_id" => $promo_id,
        );

        $this->pageData["promo"] = $this->PromoModel->getWhere($where)[0];
       
        if ($_POST) {

            $error = false;

            $input = $this->request->getPost();

           

            if (!$error) {
                
                $promo_type_id = $this->request->getPost("promo_type_id");
                $affliate = isset($_POST['for_affliate']) ? 1 : 0 ;
                $new_member = isset($_POST['new_member']) ? 1 : 0 ;

                $data = array(
                    "code" => $this->request->getPost("code"),
                    "promo_type_id" => $this->request->getPost("promo_type_id"),
                    "discount_type_id" => $this->request->getPost("discount_type_id"),
                    'minimum' =>  $this->request->getPost("minimum"),
                    'shop_id' => $this->shop_id,
                    'is_newmemberonly' => $new_member,
                    'is_affliate' => $affliate,
                    'created_by' => session()->get('login_id'),
                );
                $data = $this->get_promo($promo_type_id,$data);
                

                $this->PromoModel->updateWhere($where, $data);

                return redirect()->to(base_url('promo/detail/' . $promo_id, "refresh"));
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/promo/edit');
        echo view('admin/footer');
    }

    public function delete($promo_id)
    {

        $this->PromoModel->softDelete($promo_id);

        return redirect()->to(base_url('promo', "refresh"));
    }

    
}
