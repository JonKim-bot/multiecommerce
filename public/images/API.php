<?php

namespace App\Controllers;

use App\Core\BaseController;

class API extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
    }

    public function add()
    {
      
        
        if(isset($_POST)){
            die(json_encode(array(
                'status' => false,
                'path' => $_FILES,
            ))); 
            
            if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                $file = $this->request->getFile('banner');
                $new_name = $file->getName();
                $banner = $file->move(
                    './public/images/msjaya/',
                    $new_name
                );
                if ($banner) {
                    $banner = '/public/images/msjaya/' . $new_name;
                } else {
                    $error = true;
                    $error_message = 'Upload failed.';
                }
                die(json_encode(array(
                    'status' => true,
                    'path' => base_url() . $banner,
                )));
            }
        }
        die(json_encode(array(
            'status' => false,
            'path' => 'no file',
        )));  
    }

}
