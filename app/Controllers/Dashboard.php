<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Core\BaseController;

class Dashboard extends BaseController
{
    public function __construct()
    {
       
        $this->pageData = array();
        if(session()->get('login_data')['type'] == null && uri_string() != "access/login"){
            //  redirect()->to(base_url('access/login/'));
            echo "<script>location.href='".base_url()."/access/login';</script>";
        }


    }

	public function index()
	{
        // $session = session();
        // $uri = service('uri');

        // if (!$session->get("login_data") and ($uri->getSegment(1)) != "access"){
        //     return redirect()->to( base_url('access/login/',"refresh") );
        // }


        echo view('admin/header',$this->pageData);
        echo view('admin/dashboard/all');
        echo view('admin/footer');
        // echo view('welcome_message');
	}

	//--------------------------------------------------------------------

}
