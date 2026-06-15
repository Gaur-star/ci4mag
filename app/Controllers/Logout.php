<?php
namespace App\Controllers\admin;

use CodeIgniter\Controller;

class Logout extends Controller {

	
    public function index()
	{
        $session = session();
        $session->destroy();
        return redirect()->to(base_url("login"));
    }
   
	

}
