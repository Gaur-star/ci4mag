<?php
namespace App\Controllers\admin;

use App\Models\Media_edit_model;
use CodeIgniter\Controller;


class Media_library extends Controller
{
  public $login;
  public $media_edit_model;
  public $session;
  function __construct()
  {
    $this->session = session();
    $this->login = $this->session->get("usr");
    $this->fname = $this->session->get("f_name");
    if (!$this->login) {
      return redirect()->to(base_url() . "login");
      die;
    }
    $this->media_edit_model = new Media_edit_model();
    helper(array('form','url'));
    helper('webbuild_usable');
    $roleId=$this->session->get("role");
    $this->role=get_role($roleId);
  }
  public function pagelist($page = 1)
  {
      $request = service("request");
      $pager = \Config\Services::pager();
      $perpage = $request->getpost("per");
      if(!$this->login)
      {
        return redirect()->to(base_url() . "/login");
      }
      if (!$perpage) {
        $perpage =20;
      }

      $total = $this->media_edit_model->media_count();
      $data['u_firstname'] = $this->session->get('fname');
      $data['pages'] = $this->media_edit_model->orderBy('id', 'DESC')->paginate(20);
      $data['pager'] = $this->media_edit_model->pager;

      $media_name = $request->getVar("media_search");
      if(isset($media_name))
      {
        $data['search_media'] = $this->media_edit_model->search_media($media_name);
      }  
      echo view('admin/header', $data);
      if($this->role == 1){
        echo view('admin/sidebar');
        echo view('admin/medialist',$data);
      }else{
        echo view('admin/sidebar_other');
        echo view('admin/medialist',$data);
      }
     
      echo view('admin/footer');
  }

  function delete($id)
  {
    $res = $this->media_edit_model->deleteMedia($id);
    return redirect()->to(base_url("admin/media"));
  }
  
  public function searchx()
  {
    $_SESSION['query'] = $_REQUEST;
    $data['count'] = $this->media_edit_model->search_media_count();
    $data['media'] = $this->media_edit_model->search($_REQUEST);
    echo view('admin/header');
    echo view('admin/sidebar1');
    echo view('admin/media_library', $data);
    echo view('admin/footer');
  }

  public function search_paginationx($id)
  {
    $_SESSION['pagination'] = $id;
    $_REQUEST = $_SESSION['query'];
    $data['count'] = $this->media_edit_model->search_media_count();
    $data['media'] = $this->media_edit_model->search_pagination($id);
    echo view('admin/header');
    echo view('admin/sidebar2');
    echo view('admin/media_library', $data);
    echo view('admin/footer');
  }

  public function media_delete_process($id)
  {
    $session = session();    
    $this->media_edit_model->media_delete_process($id);
    $session->setFlashdata('image_delete', '<div class="alert alert-success alert-dismissible fade show" role="alert">Image deleted successfully !!!</div>');
    return redirect()->to(base_url() . "/admin/media");
  }

  function media_library($page = 1)
  {
    $data['media'] = $this->media_edit_model->get_gallery($page);
    echo view('admin/getGallery', $data);
  }

  function uploadImg()
  {   
    $request = \Config\Services::request();
    $file  = $request->getFile('fileUpload');
    if($file->isValid() && !$file->hasMoved())
    {
      $file->move(ROOTPATH."assets/media-image/");
      $data = $file->getClientName();
      $insertdata["alt_text"] = $request->getPost("alt");
      $insertdata["url"] = base_url()."/assets/media-image/".$data;
      $insertdata["create_date"] =date("Y-m-d H:i:s");
      $insertdata["active"] = 1;
      $this->media_edit_model->uploadImage($insertdata);
      return redirect()->to(base_url()."/admin/media");
    }
    else
    {
      $this->session->setFlashdata("msg","<span style=color:red; >" . $file->getErrorString() . "</span>");
      return redirect()->to(base_url()."/admin/media");
    }

  }
}
