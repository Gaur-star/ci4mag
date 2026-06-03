<?php
namespace App\Controllers\admin;

use App\Models\Matico_model;
use CodeIgniter\Controller;

class Matico extends Controller
{
  public $session;
  public $login;
  public $fname;
  public $Matico_model;
  public function __construct()
  {
    $this->session = session();
    $this->login = $this->session->get("usr");
    $this->fname = $this->session->get("f_name");
    if (!$this->login) {
      redirect(base_url() . "login");
      die;
    }
    $this->Matico_model = new Matico_model();
    helper('webbuild_usable');
    $roleId = $this->session->get("role");
    $this->role = get_role($roleId);
  }

  function index()
  {
    $data["campaign"] = $this->Matico_model->getCampaign();
    $data['u_firstname'] = $this->fname;
    echo view('admin/header', $data);
    if($this->role == 1){
      echo view('admin/sidebar');
      echo view('admin/getCampaign',$data);
    }else{
      echo view('admin/sidebar_other');
      echo view('admin/getCampaign',$data);
    }    
    echo view('admin/footer');
  }

  function addCampaign()
  {
    $data['u_firstname'] = $this->fname;
    helper("webbuild_usable");
    echo view('admin/header',$data);
    if($this->role == 1){
    echo view('admin/sidebar');
    echo view('admin/addCampaign');
  }else{ 
    echo view('admin/sidebar_other');
    echo view('admin/addCampaign');
  }
    echo view('admin/footer');
  }

  function addCampaignProcess()
  {
    $request = \Config\Services::request();
    $data['campaig_name'] = $request->getPost("campaign_name");
    $data['campaign_url'] = $request->getPost("campaign");
    $data['author'] = $request->getPost("author");
    $data['post_status'] = $request->getPost('status');
    $res = $this->Matico_model->addCampaignProcess($data);
    return redirect()->to(base_url("admin/matico"));
  }

  function campaignUpdate($id)
  {
    $data = $this->Matico_model->getCampaignById($id);
    helper("webbuild_usable");
    $data['u_firstname'] = $this->session->get('u_firstname');
    echo view('admin/header', $data);
    echo view('admin/sidebar');
    echo view('admin/updateCampaign');
    echo view('admin/footer');
  }

  function updateCampaignProcess($id)
  {
    $request = service('request');
    $data["campaig_name"] = $request->getPost("campaign_name");
    $data["campaign_url"] = $request->getPost("campaign");
    $data["author"] = $request->getPost('author');
    $data["post_status"] = $request->getPost("status");
    $res = $this->Matico_model->updateCampaignProcess($id, $data);
    return redirect()->to(base_url("admin/matico/campaignUpdate/" . $id));
  }

  function deleteCampaignprocess($id)
  {
    $res = $this->Matico_model->deleteCampaign($id);
    return redirect()->to(base_url("admin/matico"));
  }
}
