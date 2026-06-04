<?php
namespace App\Controllers\admin;

use CodeIgniter\Controller;

class Logout extends Controller {

	function __construct() {
        //parent::__construct();
    
    // $this->load->library('session');
	}
	
    public function index()
	{
        $session = session();
        $session->destroy();
        // session_destroy();
      //  $_SESSION['login']='logout';
        return redirect()->to(base_url("login"));
        // redirect(base_url()."login");
    }
   
	

}
