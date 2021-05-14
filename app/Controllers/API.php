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
      
        if (!empty($_FILES['banner']['name']))
    {
        $file = $this
            ->request
            ->getFile('banner');
        $new_name = $file->getName();

        
        $banner = $file->move('./public/images/msjaya/', $new_name);
        if ($banner)
        {
            $banner = '/public/images/msjaya/' . $new_name;
        }
        else
        {
            $error = true;
            $error_message = "Upload failed.";
        }
        die(json_encode(array(
            'stauts' => true,
            'path' => $banner

        )));
    }
    die(json_encode(array(
        'stauts' => false,
        'path' => "no banner"
    )));
    }

}
