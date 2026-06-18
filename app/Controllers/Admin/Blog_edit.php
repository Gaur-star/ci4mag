<?php
namespace App\Controllers\admin;

use App\Models\Blog_edit_model;
use KejawenLab\CodeIgniter\Pagination\Paginator;

use CodeIgniter\HTTP\IncomingRequest;

use CodeIgniter\Controller;

class Blog_edit extends Controller
{
  public $login;
  public $fname;
  public $roleId;
  public $role;
  public $blog_edit_model;
  public $session;
  public $pager;

  function __construct()
  {
    $this->session = session();
    $this->login = $this->session->get("usr");
    $this->fname = $this->session->get("f_name");
    if (!$this->login) {
      return redirect()->to(base_url("login"));
      die;
    }
    $this->blog_edit_model = new Blog_edit_model();
    helper('array');
    helper('form');
    helper('get_permalink');
    $this->roleId = $this->session->get("role");
  }

  public function blog_delete($id)
  {
    $this->blog_edit_model->blog_delete_process($id);
    return redirect()->to(base_url() . "/admin/posts");
  }
  
  public function pagination($id = 1)
  {   
    $request = service('request');   
    $request = \Config\Services::request();
    $pager = \Config\Services::pager();
    $session = session();
    if($session->has('single_preview'))
    {
       unset($_SESSION['single_preview']);
    }

    $filter["date"] = filter_var($request->getVar("date"), FILTER_SANITIZE_STRING);
    $filter["visibility"] = filter_var($request->getVar("vi"), FILTER_SANITIZE_STRING);
    $filter["category"] = filter_var($request->getVar("cat"), FILTER_SANITIZE_STRING);
    $filter["order"] = filter_var($request->getVar("order"), FILTER_SANITIZE_STRING);
    $filter["short"] = filter_var($request->getVar("short"), FILTER_SANITIZE_STRING);
    $filter["search"] = trim(filter_var($request->getVar("search"), FILTER_SANITIZE_STRING));
    $filter["author"] = filter_var($request->getVar("user.f_name"), FILTER_SANITIZE_STRING);
    $filter['author'] = filter_var($request->getVar('author'),FILTER_SANITIZE_STRING);
    $filter["perpage"] = 100;
    $page = $request->getVar("page");

    if ($this->roleId == 1) {
      $data = $this->blog_edit_model->count_post();
      $data["total"] = $this->blog_edit_model->blog_count($filter);
      $data['blog'] = $this->blog_edit_model->posts($page,$filter);
      $data['pages'] = $this->blog_edit_model->paginate(4);
      $data['pager'] = $this->blog_edit_model->pager;         
      } else {
        if(!$this->login){          
          return redirect()->to(base_url() . "/login");        
          }
        
        $data = $this->blog_edit_model->count_post();
        $data["total"] = $this->blog_edit_model->blog_count($filter);
        $data['blog'] = $this->blog_edit_model->posts($page, $filter);
        $data['pages'] = $this->blog_edit_model->paginate(4);
        $data['pager'] = $this->blog_edit_model->pager;
      }

    $data["catagory"] = $this->blog_edit_model->getCatagory();
    $data["dateList"] = $this->blog_edit_model->dateList();
    $data['pages'] = $this->blog_edit_model->paginate(4);
    $data['pager'] = $this->blog_edit_model->pager;
    $data["searchdetail"] =  $filter;    
    $data["permalink"]=getPermalink();    
    $data['u_firstname'] = $this->fname;    

    echo view('admin/post_list', $data);
    
  }

  function matico_edit($id)
  {
    if (!$this->login)
    {
      return redirect()->to(base_url("login"));
      die;
    }
    else
    {
    $uri = current_url(true);
    $uri = explode("/",$uri);
    $last_uri = end($uri);

    $ch = curl_init();
    $url = 'https://www.issuewire.com/home/getPrDetailsByGuid/'.$last_uri;

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

    $headers = array();
    $headers[] = 'Accept: application/json';
    $headers[] = "User-Agent: ReqBin Curl Client/1.0";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    $post = json_decode($result,true);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    $res = $this->blog_edit_model->update_data_all($last_uri,$post);
    echo "<pre>";
    print_r($res);die;
    }
  }
}
