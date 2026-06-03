<?php
namespace App\Controllers\admin;

use App\Models\Page_model;
use App\Models\Pages_edit_model;
use App\Models\Blog_add_model;
use CodeIgniter\Controller;

class Page extends Controller
{
  public $login;
  public $session;
  public $page_model;
  public $roleId;
  public $role;
  public $fname;
  public $title;
  public $pages_edit_model;
  public $blog_add_model;

  function __construct()
  {
    $this->session = session();
    $this->login = $this->session->get("usr");
    $this->fname = $this->session->get("f_name");
    if (!$this->login) {
      return redirect()->to(base_url() . "/login");
      die;
    }
    $this->page_model = new Page_model();
    $this->pages_edit_model = new Pages_edit_model();
    $this->blog_add_model = new Blog_add_model();
    helper('form');
    helper(array('form', 'url'));
    helper('get_permalink');
    helper('webbuild_usable');
    $this->roleId = $this->session->get("role");
    $this->role = get_role($this->roleId);
  }

  public function index()
  {
    $request = \Config\Services::request();
    $pag = $request->getVar('page');
    if($pag == ''){ $page = 1 ; }else{ $page = $pag; }
    $perpage = 3;  
    // $pager = \Config\Services::pager();
    $filter['search'] = filter_var($request->getVar('search'),FILTER_SANITIZE_STRING);
    $filter['author'] = filter_var($request->getVar('author'),FILTER_SANITIZE_STRING);

    // if($this->roleId != 1)
    // {
    //   if(!$this->login)
    //   {
    //     return redirect()->to(base_url() . "/login");
    //   }
    //     $data = $this->page_model->pageCount($this->login);
    //     $data = $this->page_model->getPage($page,$perpage,$this->login,$filter);
    //     $data['page'] = $this->page_model->paginate(3);
    //     $data['pager'] = $this->page_model->pager;
    // }

    if ($this->roleId != 1) {
    $data = $this->page_model->pageCount($this->login);
    // $data['pages'] = $this->page_model->getPage($page, $perpage, $this->login,$filter);
    $data['pages'] = $this->page_model->getPage($page, $perpage,$filter);
    $data['page'] = $this->page_model->paginate(5);
    $data['pager'] = $this->page_model->pager;    

    } else {
    $data = $this->page_model->pageCount();
    $data['pages'] = $this->page_model->getPage($page, $perpage, $filter);
    $data['page'] = $this->page_model->paginate(3);
    $data['pager'] = $this->page_model->pager;
    
    }
    $data['trash_count']=$this->page_model->trash_page_count();
    $data['u_firstname'] = $this->fname;
    $data['permalink']=getPermalink();

    echo view('admin/header',$data);
    if($this->roleId == 1){
      echo view('admin/sidebar');
      echo view('admin/pageList',$data);
    }else{
      echo view('admin/sidebar_other');
      echo view('admin/pageList',$data);
    }    
    echo view('admin/footer');
  }

  public function delete($id)
  {
    $this->page_model->deletePage($id);
    return redirect()->to(base_url() . "/admin/page");
  }

  function pageEdit($id)
  {    
    
    helper("webbuild_usable");
    $data["stylesheets"][] = "assets/richtext/richtext.min.css";
    $data["javascripts"][] = "assets/richtext/jquery.richtext.min.js";
    $count_per_page = 20;
    $data["img_no_page"] = $this->page_model->countImgPage($count_per_page);
    $data["page"] = $this->page_model->getPageDetail($id);
    $data['u_firstname'] = $this->fname;
    echo view('admin/header', $data);
    echo view('admin/sidebar');
    echo view('admin/pageEdit');
    echo view('admin/footer');
  }

  function pageUpdate($id)
  {
    $request = \Config\Services::request();
    if (is_numeric($id)) {
      $data["title"] = filter_var(trim($request->getPost("title")), FILTER_SANITIZE_STRING);
      $data["seo_url"] = filter_var(trim($request->getPost("seo_url")), FILTER_SANITIZE_STRING);
      $data["content"] = $request->getPost("content");
      $data["meta_tag"] = filter_var(trim($request->getPost("meta_tag")), FILTER_SANITIZE_STRING);
      $data["meta_desc"] = filter_var(trim($request->getPost("meta_desc")), FILTER_SANITIZE_STRING);
      $data["noindex"] = filter_var(trim($request->getPost("noindex")), FILTER_SANITIZE_STRING);
      $data["nofollow"] = filter_var(trim($request->getPost("nofollow")), FILTER_SANITIZE_STRING);
      $data["sitemap"] = filter_var(trim($request->getPost("sitemap")), FILTER_SANITIZE_STRING);
      $data["visibility"] = filter_var(trim($request->getPost("visibility")), FILTER_SANITIZE_STRING);
      date_default_timezone_set('Asia/Kolkata');
      $data["cur_date"] = date("Y-m-d H:i:A");
      $res = $this->page_model->pageUpdate($id, $data);
      return redirect()->to(base_url() . "/admin/page/pageEdit/" . $id);
    } else {
      return redirect()->to(base_url() . "/admin/page");
    }
  }

  public function page_trash($id)
  {
    $this->page_model->page_trash($id);
    return redirect()->to(base_url() . "/admin/page");
  }

  public function get_trash_pages()
  {
    $data["trash_page"]=$this->page_model->get_trash_page();
    $session = session();
    $data['u_firstname'] = $this->fname;
    echo view('admin/header', $data);
    echo view('admin/sidebar');
    echo view('admin/trash_page',$data);
    echo view('admin/footer');
  }

  public function restore_trash_page($id)
  {
    $this->page_model->restore_trash_page($id);
    return redirect()->to(base_url() . "/admin/page");
  }

  public function trash_page_delete_all()
  {
    $request = \Config\Services::request();
    $id = $request->getPost("id");
    $this->page_model->trash_page_delete_all($id);
    return redirect()->to(base_url() . "/admin/trash_pages");
  }

  public function page_widget($id)
  {
    $view = \Config\Services::renderer();
    $data['widgets'] =  view('widgets/basic',array(),['saveData' => true]);
    $p['one']=$id;
    echo view('theme/newsfeed/header');  
    echo view('theme/newsfeed/menu');
    echo view('theme/newsfeed/page',$p);
    echo view('theme/newsfeed/bottom');
    echo view('theme/newsfeed/footer');
  }
}
