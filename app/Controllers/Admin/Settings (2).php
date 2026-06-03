<?php
namespace App\Controllers\admin;

use App\Models\Settings_model;
use CodeIgniter\Controller;

class Settings extends Controller
{
   public $session;
   public $settings_model;
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
    $this->settings_model = new Settings_model();
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
      $data['setting'] = $this->settings_model->get_setting();
      $data['permalink'] = $this->settings_model->get_permalink();
      $data['u_firstname'] = $this->fname;
      echo view('admin/header',$data);
      echo view('admin/sidebar');
      echo view('admin/settings', $data);
      echo view('admin/footer');
   }

   public function settings_edit_process()
   {
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();
        $postdata = $request->getPost();
        $file = $request->getFile("image");
        
        if($file->isValid())
        {     
        if($file->move(ROOTPATH.'assets/setting-image'))
        {
            $data['image'] = $file->getClientName();
            $postdata[3] = 'assets/setting-image/'.$data['image'];       
        }
        }
        $file = $request->getFile('fav');
        
        if($file->isValid())
        {
        if($file->move(ROOTPATH.'assets/setting-image'))
        {
            $data['image'] = $file->getClientName();
            $postdata[8] = "assets/setting-image/".$data['image'];
        }
        }
        $file = $request->getFile('deafultimage');
        if($file->isValid())
        {
        $data["image"] = $file->getClientName();
        if($file->move(FCPATH.'assets/setting-image'))
        {
            $postdata[13] = "assets/setting-image/".$data["image"];
        }
        }
        $this->settings_model->setting_update($postdata);
        return redirect()->to(base_url() . "/admin/settings");
   }

   public function extra()
   {
      $file = strlen($_FILES['image']['name']);
      if ($file > 0)
      {
         $config['upload_path']          = 'assets/setting-image/';
         $config['allowed_types']        = 'gif|jpg|png|bmp';
         $this->load->library('upload', $config);
         if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
         } else {
            $postdata['upload_data'] = $this->upload->data();
            $this->settings_model->settings_edit_process($postdata);
            $_SESSION['st_vdata'] = "<span style=color:green; >Setting updated successfully.</span>";
            return redirect()->to(base_url() . "/admin/settings");
         }
      } else {
         $this->settings_model->settings_edit_process_without_image($_POST);
         $_SESSION['st_vdata'] = "<span style=color:green; >Setting updated successfully.</span>";
         return redirect()->to(base_url() . "/admin/settings");
      }
   }
}
