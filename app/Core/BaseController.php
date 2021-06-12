<?php


namespace App\Core;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use App\Models\AdminModel;

use App\Models\UserModel;
use App\Models\ShopFunctionModel;

use CodeIgniter\Controller;

class BaseController extends Controller
{

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['url', 'form', 'infector', 'session'];

    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        // $this->session = \Config\Services::session();

        $session = session();
        $uri = service('uri');

        
        if(session()->get('admin_data') != null){
            if(session()->get('admin_data')['type'] == "MERCHANT"){
                // $this->debug("asd");
                $this->shop_id = session()->get('admin_data')['shop_id'];
                $this->isMerchant = true;

            }
        }
       
        $this->AdminModel = new AdminModel();
        $this->ShopFunctionModel = new ShopFunctionModel();

    }
    public function getShopFunction($shop_id){
        $shop_data = session()->get('shop_data');

        $this->ShopFunctionModel = new ShopFunctionModel();

        $where = [
            'shop_id' => $shop_id, 
        ];
        $shop_function = array_column($this->ShopFunctionModel->getWhere($where),'function_id');
        return $shop_function;
    }
    public function validate_function($function_id,$shop_function){
        if($this->check_exist_function($function_id,$shop_function) == false){
            $this->show_404_if_empty([]);
        }


    }
    public function check_exist_function($function_id,$shop_function){
        if(in_array($function_id,$shop_function)){ 
            return true;
        }else{
            return false;
        }
    }
    public function check_is_merchant_from_shop($shop_id_item){
        if($shop_id_item != $this->shop_id){
            $this->show404();
        }
    }
    public function upload_image($name){
        if ($_FILES[$name] and !empty($_FILES[$name]['name'])) {
            $file = $this->request->getFile($name);
            $new_name = $file->getRandomName();
            $$name = $file->move('./assets/img/'.$name.'/', $new_name);
            if ($name) {

                $name = '/assets/img/'.$name.'/' . $new_name;
                return $name;
            } else {
               return "";
            }
        }else{
            return "";
        }

    }
    function upload_image_base($image_name){
        if (!empty($_FILES[$image_name]['name'])) {
            $file = $this->request->getFile($image_name);
            $new_name = $file->getRandomName();
            $banner = $file->move('./public/images/', $new_name);
            if ($banner) {
                $banner = '/public/images/' . $new_name;
                // $data[$image_name] = $banner;
                return $banner;
            }else{
                return "";
            }
        }else{
            return "";
        }
    }
    function upload_multiple_image($image_name){
        if ( !empty($_FILES[$image_name]['name'][0]) && $_FILES[$image_name]['name'][0] != "" ) {

            $getUpload = $this->request->getFileMultiple('cover_image');
            $image  = [];
            foreach ($getUpload as $files){
                $thumbnail = $files->getName();
                $banner = $files->move('./public/images/', $thumbnail);
                $banner = '/public/images/' . $thumbnail;
                $image[] = $banner;
            }
            return $image;
        }else {
            return "";
        }
    }
    public function hash($password)
    {

        $salt = rand(111111, 999999);
        $password = hash("sha512", $salt . $password);

        $hash = array(
            "salt" => $salt,
            "password" => $password,
        );

        return $hash;
    }

    public function debug($data)
    {

        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        die();

    }

    public function checkExists($username, $exclude_id = "")
    {

        $where = array(
            "username" => $username,
        );

        if ($exclude_id == "") {

            $admin = $this->AdminModel->getWhere($where);

            if (empty($admin) and empty($user)) {

                return false;

            } else {
                return true;
            }

        } else if ($exclude_id != "") {
            $admin = $this->AdminModel->getWhereAndPrimaryIsNot($where, $exclude_id);

            // $this->debug($user);

            if (empty($admin) and empty($user)) {

                return false;

            } else {

                return true;
            }
        }

    }
    function show_404_if_empty($data){
        if(empty($data)){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    function slugify($text)
    {
      // replace non letter or digits by -
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    
      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    
      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);
    
      // trim
      $text = trim($text, '-');
    
      // remove duplicate -
      $text = preg_replace('~-+~', '-', $text);
    
      // lowercase
      $text = strtolower($text);
    
      if (empty($text)) {
        return 'n-a';
      }
    
      return $text;
    }
    public function validateFile($file){
        if($file > 1000000){
            return true;
        }else{
            return false;
        }
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function show404(){
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
}
