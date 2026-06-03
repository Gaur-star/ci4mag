<?php
namespace App\Controllers\admin;

use App\Models\Adsence_model;
use CodeIgniter\Controller;


class Adsence extends Controller
{
   public $session;
  //  public $settings_model;
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
      // $this->load->model('adsence_model');
      $this->adsence_model = new Adsence_model();
      helper(array('form','url'));
      // $this->load->helper(array('form', 'url'));
      // $this->load->library('session');
      helper("webbuild_usable");
      // $this->load->helper('webbuild_usable');
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
      //    echo "<pre>";
      // print_r($data['permalink']);die;
      // echo "<pre>";
      // print_r($data);die;
      $data['u_firstname'] = $this->fname;
      echo view('admin/header',$data);
      echo view('admin/sidebar');
      echo view('admin/adsence', $data);
      echo view('admin/footer');
   }

//    public function adsence_add()
//    {
//    //   echo "ssss";die;
//       // $postdata = $this->input->post();
//     //   echo "<pre>";
//     //   print_r($_FILES);die;
//     $adsencemodel = new Adsence_model();
//     $request = \Config\Services::request();
//     $validation = \Config\Services::validation();
//     // echo "<pre>";
   
  
//    //  echo "sssss";
//   //   echo "<pre>";
//   //  print_r($postdata);die;
//   $data = [
//     'header' => $this->request->getVar('header'),
//     'sidebar'  => $this->request->getVar('sidebar'),
    
// ];

// // $this->product->insert($data);
// //  echo "<pre>";
// //  print_r($data);die;
//  $adsencemodel->insert($data); 
// //  die;
// //  $this->adsence_model->insert($data); die;
//   //  $this->adsence_model->adsence_update($data);
//    return redirect()->to(base_url() . "/admin/adsence");

     
//    }

   public function adsence_update(){
    $request = \Config\Services::request();
    $postdata = $request->getPost();
    //  echo "<pre>";
    //  print_r($postdata);die;
     $this->adsence_model->adsence_update($postdata);

   return redirect()->to(base_url() . "/admin/adsence");
  // $this->settings_model->setting_update($postdata);
  //  return redirect()->to(base_url() . "/admin/settings");
   }
  
}
