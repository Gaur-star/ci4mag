<?php
namespace App\Controllers\admin;

use App\Models\Adsence_model;
use CodeIgniter\Controller;


class Adsence extends Controller
{
   public $session;
   public $adsence_model;
   public $login;
   public $fname;

   function __construct()
   {      

    $this->session = session();  
    $this->login=$this->session->get("usr");
    $this->fname = $this->session->get("f_name");
      if (!$this->login) {
        return redirect()->to(base_url() . "/login");
        die;
     }
      $this->adsence_model = new Adsence_model();
      helper(array('form','url'));
      helper("webbuild_usable");
      $roleId=$this->session->get("role");
      $this->role=get_role($roleId);
   }

   public function index()
   {
      if(!$this->login)
      {
        return redirect()->to(base_url() . "/login");
      }
     
      $data['setting'] = $this->adsence_model->get_setting();
      $data['permalink'] = $this->adsence_model->get_permalink();
      $data['old_data'] = $this->adsence_model->old_data();
      $data['u_firstname'] = $this->fname;
      echo view('admin/header',$data);
      echo view('admin/sidebar');
      echo view('admin/adsence', $data);
      echo view('admin/footer');
   }


   public function adsence_update(){
      
    $request = \Config\Services::request();
    $postdata = $request->getPost();
    $this->adsence_model->adsence_update($postdata);
    return redirect()->to(base_url() . "/admin/adsence");

   }
  
}
