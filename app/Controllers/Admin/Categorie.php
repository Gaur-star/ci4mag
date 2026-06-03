<?php
namespace App\Controllers\admin;

use App\Models\Categorie_model;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Request;

class Categorie extends Controller
{
  public $session;
  public $login;
  public $fname;
  public $categorie_model;
  public $pager;
  function __construct()
  {
    $this->session = session();
    $this->login = $this->session->get("usr");
    $this->fname = $this->session->get("f_name");
    if (!$this->login) {
      return redirect()->to(base_url() . "/login");
    }
    $this->categorie_model = new Categorie_model();
    helper('form');
    helper(array('form', 'url'));
    helper('webbuild_usable');
    $roleId = $this->session->get("role");
    $this->role = get_role($roleId);     
  }

  public function category_list()
  {
    // if(isset($_GET['page'])){
    //   $page = $_GET['page'];
    // }else{
    //   $page = 1;
    // }
    $pager = \Config\Services::pager();
    $request =service('request');
    $request = \Config\Services::request();    
    $filter["search"] = filter_var($request->getVar("search"),FILTER_SANITIZE_STRING);
    $search = $request->getVar('search');
    $pag = $request->getVar('page');
    if($pag == ''){ $page = 1 ; }else{ $page = $pag; }
    $perpage = 5;
    if(!$this->login)
    {
      return redirect()->to(base_url() . "/login");
    }    
    $data['edit_id'] = $request->getVar("edit");
    $data['catagory_detail'] = $this->categorie_model->catagory_detail($data['edit_id']);
    $data['count'] = $this->categorie_model->total_catagory();
    $data['page_no'] = $page;
    $data['catagory_list'] = $this->categorie_model->get_catagory($page, $perpage, $filter);
    $data['u_firstname'] = $this->session->get('f_name');
    $pager = \Config\Services::pager();
    $data['pages'] = $this->categorie_model->paginate(10);
    $data['pager'] = $this->categorie_model->pager;

    echo view('admin/header',$data);
    if($this->role == 1){
      echo view('admin/sidebar');
      echo view('admin/category', $data);
    }else{
      echo view('admin/sidebar_other');
      echo view('admin/category', $data);
    }
    
    echo view('admin/footer');
  }

  
  public function category_edit($page,$id)
  {
    $data['catagory_detail'] = $this->categorie_model->catagory_detail($id);
    $data['count'] = $this->categorie_model->total_catagory();
    $data['page_no'] = $page;
    $data['details'] = $this->categorie_model->catagory_detail($id);
    $data['u_firstname'] = $this->fname;
    $data['cat'] = $this->categorie_model->get_all_category();
    $p_category = $data['details']['p_categorie'];
    $data['parent'] = $this->categorie_model->get_category_byId($p_category);
    $data['page'] = $page;

    echo view('admin/header',$data);
    echo view('admin/sidebar');
    echo view('admin/categorie_details_edit.php', $data);
    echo view('admin/footer');
  }

  public function catagory_delete($page, $cat_id)
  {    
    $this->categorie_model->catagory_delete($cat_id);
    return redirect()->to(base_url("admin/category"));
  }

  public function categorie_add_process($page)
  {
    $validation =  \Config\Services::validation();
    $validation->setRules ([
      'categorie'=> 'required',
      'slug'=> 'required|is_unique[categories.slug]',

    ]);
    $request = service('request');
    if($validation->withRequest($request))
    {
      $this->session->setFlashdata("categorie");
      $data["slug"] = $request->getPost("slug");
      $data["categorie"] = $request->getPost("categorie");
      $data["p_categorie"] = $request->getPost("p_categorie");
      $data["description"] = $request->getPost("description_");
      $data["meta_tag"] = $request->getPost("meta_tag");
      $data["meta_desc"] = $request->getPost("meta_desc");
      $this->categorie_model->add_category($data);
      return redirect()->to(base_url("admin/category"));
    }
    else
    {
      $this->session->setFlashdata("msg", $validation->getErrors());
    }    
  }

  function update_category($page, $edit_id)
  {
    $request = \Config\Services::request();
    $validation = \Config\Services::validation();
    $validation->setRules([
      'categorie'=>'required',
      'slug'=>'required',
    ]);
    if(!$validation->withRequest($request)->run())
    {
      $this->session->setFlashdata("msg",$validation->listErrors());
      return redirect()->to(base_url()."/admin/category/".$page."/".$edit_id);
    }
    else
    {
      $data["categorie"] = $request->getPost("categorie");
      $data["slug"] = $request->getPost("slug");
      $data["p_categorie"] = $request->getPost("p_cat");
      $data["description"] = $request->getPost("decription_");
      $data["meta_tag"] = $request->getPost("meta_tag");
      $data["meta_desc"] = $request->getPost("meta_desc");
      $this->categorie_model->update_category($edit_id, $data);
      return redirect()->to(base_url() . "/admin/category_edit/" . $page."/".$edit_id);
    }   
  }
}
