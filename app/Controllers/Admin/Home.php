<?php
namespace App\Controllers\admin;

use App\Models\Front_model;
use App\Models\Library_model;
use App\Models\Blog_add_model;
use CodeIgniter\Controller;


class Home extends Controller
{
    private $cachemin;
    public $library_model;
    public $front_model;
    public $form_validation;
    public $session;
    
    function __construct()
    {
        $this->library_model = new Library_model();
        $this->front_model = new Front_model();
        helper(['form','url']);
        helper('form');
        $this->cachemin = 1440;
    }


    public function index()
    {
        header('Link: <'.base_url().'>; rel=canonical');
        $data["metas"] = array();
        $data["metas"][] = '<meta charset="utf-8">';
        $data['settings'] = $this->front_model->getSetting();
        $data['top_menu'] = $this->front_model->getMenu($menu=1);
        $data['footer_menu'] = $this->front_model->getMenu($menu = 3);
        $data['category'] = $this->front_model->getMenu($menu = 2);
        $data['category_footer'] = $this->front_model->getMenu($menu = 4);
        $data['page'] = $this->front_model->getPageLink();
        $data['latest_news'] = $this->front_model->getNews($page = 1, $limit = 5, $cat = ''); 
        $populars = $this->front_model->getPopularNews();
        $getHomepageCat = $this->front_model->getTopcat();

        if ($data['settings'][4]["setting_value"]) {
            $data["metas"][] = '<meta name="title" content="' . $data['settings'][4]["setting_value"] . '">';
        }
        if ($data['settings'][4]["setting_value"]) {
            $data["metas"][] = '<meta name="description" content="' . $data['settings'][4]["setting_value"] . '">';
        }
        $data["metas"][] = '<meta property="og:site_name" content="' . $data['settings'][0]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="og:type" content="article" />';
        $data["metas"][] = '<meta property="og:title" content="' . $data['settings'][0]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="og:url" content="' . base_url() . '" />';
        $data["metas"][] = '<meta property="og:image" content="' . base_url() . $data['settings'][12]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="og:image:secure_url" content="' . base_url() . $data['settings'][12]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="twitter:card" content="summary" />';
        $data["metas"][] = '<meta property="twitter:domain" content="' . base_url() . '" />';
        $data["metas"][] = '<meta property="twitter:image" content="' . base_url() . $data['settings'][12]["setting_value"] . '" />';


        foreach ($getHomepageCat as $key => $homecat) {
            $homecat['post_limit'] = 5;
            $data['homepagepost'][$key]['post'] = $this->front_model->getNews($page = 1, $limit = $homecat['post_limit'], $cat = $homecat['categorie_id']);
            $data['homepagepost'][$key]['post_title'] = $homecat['categorie'];
        }

        if ($populars) {
            $i = 0;
            foreach ($populars as $Key => $popular) {
                $data['popular'][$i]['title'] = $popular['title'];
                $data['popular'][$i]['seo_url'] = $popular['seo_url'];
                if (isset($popular['image'])) {
                    $data['popular'][$i]['image'] = $popular['image'];
                } else {
                    $data['popular'][$i]['image'] = base_url() . $data['settings'][12]['setting_value'];
                }
                $i++;
            }
        }
   
        echo view("theme/newsfeed/header",$data);
        echo view("theme/newsfeed/menu");
        echo view("theme/newsfeed/body");
        echo view("theme/newsfeed/bottom");
        echo view("theme/newsfeed/footer");

    }
    
    function catagoryPost($id)
    {
        $data["metas"] = array();
        $data["metas"][] = '<meta charset="utf-8">';
        $data['settings'] = $this->front_model->getSetting();
        $data['top_menu'] = $this->front_model->getMenu($menu = 1);
        $data['footer_menu'] = $this->front_model->getMenu($menu = 3);
        $data['category'] = $this->front_model->getMenu($menu = 2);
        $data['category_footer'] = $this->front_model->getMenu($menu = 4);
        $data['page'] = $this->front_model->getPageLink();
        $this->front_model->visitorUpdate($id);
        $data['latest_news'] = $this->front_model->getNews(
            $page = 1,
            $limit = 5,
            $cat = ''
        );
        $data['catagoryPost'] = $this->front_model->getNews(
            $page = 1,
            $limit = 10,
            $cat = $id
        );
        if (isset($data['catagoryPost'][0]["categorie"])) {
            $data["title"] = $data['settings'][0]["setting_value"] . " | " . $data['catagoryPost'][0]["categorie"];
        } else {
            $data["title"] = $data['settings'][0]["setting_value"];
        }

        if ($data['settings'][4]["setting_value"]) {
            $data["metas"][] = '<meta name="keywords" content="' . $data['settings'][4]["setting_value"] . '">';
        }
        if ($data['settings'][4]["setting_value"]) {
            $data["metas"][] = '<meta name="description" content="' . $data['settings'][4]["setting_value"] . '">';
        }
     
        echo view('theme/newsfeed/header', $data);
        echo view('theme/newsfeed/menu');
        echo view('theme/newsfeed/catagorypostbody');
        echo view('theme/newsfeed/bottom');
        echo view('theme/newsfeed/footer');
    }

    public function singlepage($page_id)
    {
        $data["metas"] = array();
        $data["metas"][] = '<meta charset="utf-8">';
        $data['settings'] = $this->front_model->getSetting();
        $data['top_menu'] = $this->front_model->getMenu($menu = 1);
        $data['footer_menu'] = $this->front_model->getMenu($menu = 3);
        $data['category'] = $this->front_model->getMenu($menu = 2);
        $data['category_footer'] = $this->front_model->getMenu($menu = 4);
        $data['page'] = $this->front_model->getPageLink();
        $data['singlepage'] = $this->front_model->getPage($page_id);
        $data['latest_news'] = $this->front_model->getNews(
            $page = 1,
            $limit = 5,
            $cat = ''
        );
        if (isset($data['singlepage']["title"])) {
            $data["title"] = $data['settings'][0]["setting_value"] . " | " . $data['singlepage']["title"];
        } else {
            $data["title"] = $data['settings'][0]["setting_value"];
        }
        if (isset($data['singlepage']["meta_tag"])) {
            $data["metas"][] = '<meta name="keywords" content="' . $data['singlepage']["meta_tag"] . '">';
        }
        if (isset($data['singlepage']["meta_desc"])) {
            $data["metas"][] = '<meta name="description" content="' . $data['singlepage']["meta_desc"] . '">';
        }


        $data["metas"][] = '<meta property="og:site_name" content="' . $data['settings'][0]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="og:type" content="article" />';
        $data["metas"][] = '<meta property="og:title" content="' . $data['settings'][0]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="og:url" content="' . base_url() . '" />';
        $data["metas"][] = '<meta property="og:image" content="' . base_url() . $data['settings'][12]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="og:image:secure_url" content="' . base_url() . $data['settings'][12]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="twitter:card" content="summary" />';
        $data["metas"][] = '<meta property="twitter:domain" content="' . base_url() . '" />';
        $data["metas"][] = '<meta property="twitter:image" content="' . base_url() . $data['settings'][12]["setting_value"] . '" />';

        echo view('theme/newsfeed/header', $data);
        echo view('theme/newsfeed/menu');
        echo view('theme/newsfeed/page');
        echo view('theme/newsfeed/bottom');
        echo view('theme/newsfeed/footer');
    }

    function single($id)
    {
        $this->session=session();
        $data["metas"] = array();
        $data["metas"][] = '<meta charset="utf-8">';
        $data['settings'] = $this->front_model->getSetting();
        $data['top_menu'] = $this->front_model->getMenu($menu = 1);
        $data['footer_menu'] = $this->front_model->getMenu($menu = 3);
        $data['category'] = $this->front_model->getMenu($menu = 2);
        $data['category_footer'] = $this->front_model->getMenu($menu = 4);
        $data['page'] = $this->front_model->getPageLink();
        $data['single'] = $this->front_model->getSingleNews($id);
        $this->front_model->visitorUpdate($id);

        header('Link: <'.base_url()."/".$data['single']["seo_url"].'>; rel=canonical');
        if ($data['single']["visibility"] == "p") {
            $this->singlePageDetail($id, $data);
        } else if ($data['single']["visibility"] == "h") {
            $this->login = $this->session->userdata("usr");
            $this->roleId = $this->session->userdata("role");
            if ($this->roleId == 1) {
                $this->singlePageDetail($id, $data);
            } else {
                if ($data['single']["author"] == $this->login) {
                    $this->singlePageDetail($id, $data);
                } else {
                   
                }
            }
        }       
    }

    function singlePageDetail($id, $data)
    {        
        if (isset($data['single']["title"])) {
            $data["title"] = $data['settings'][0]["setting_value"] . " | " . $data['single']["title"];
        } else {
            $data["title"] = $data['settings'][0]["setting_value"];
        }
        if (isset($data['single']["indexed"])) {
            if ($data['single']["indexed"] == 0) {
                $data["metas"][] = '<meta name="robots" content="noindex" />';
            }
        }
        if (isset($data['single']["nofollow"])) {
            if ($data['single']["nofollow"] == 1) {
                $data["metas"][] = '<meta name="robots" content="nofollow"/>';
            }
        }
        if (isset($data['single']["meta_tag"])) {
            $data["metas"][] = '<meta name="keywords" content="' . $data['single']["meta_tag"] . '">';
        }

        if (isset($data['single']["meta_desc"])) {
            $data["metas"][] = '<meta name="description" content="' . $data['single']["meta_desc"] . '">';
        }

        $data["metas"][] = '<meta property="og:site_name" content="' . $data['settings'][0]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="og:type" content="article" />';
        $data["metas"][] = '<meta property="og:url" content="' . base_url() . $data['single']["seo_url"] . '" />';

        $data["metas"][] = '<meta property="twitter:card" content="summary" />';

        $data["metas"][] = '<meta property="article:published_time" content="' . date("c", strtotime($data['single']["date_"] . " " . $data['single']["time_"])) . '" />';
        $data["metas"][] = '<meta property="article:modified_time" content="' . date("c", strtotime($data['single']["date_"] . " " . $data['single']["time_"]))  . '" />';

        if (isset($data['single']["title"])) {
            $data["metas"][] = '<meta property="og:title" content="' . $data['single']["title"] . '" />';
            $data["metas"][] = '<meta property="twitter:title" content="' . $data['single']["title"] . '" />';
        } else {
            $data["metas"][] = '<meta property="og:title" content="' . $data['settings'][0]["setting_value"] . '" />';
            $data["metas"][] = '<meta property="twitter:title" content="' . $data['settings'][0]["setting_value"] . '" />';
        }
        if (isset($data['single']["aws_path"])) {
            $data["metas"][] = '<meta property="og:image" content="https://' . $data['single']["bucket"] . ".s3." . $data['single']["region"] . ".amazonaws.com/" . $data['single']["aws_path"] . '" />';
            $data["metas"][] = '<meta property="og:image:secure_url" content="https://' . $data['single']["bucket"] . ".s3." . $data['single']["region"] . ".amazonaws.com/" . $data['single']["aws_path"] . '" />';
            $data["metas"][] = '<meta property="og:image:width" content="640" />';
            $data["metas"][] = '<meta property="og:image:height" content="360" />';
            $data["metas"][] = '<meta property="twitter:image" content="https://' . $data['single']["bucket"] . ".s3." . $data['single']["region"] . ".amazonaws.com/" . $data['single']["aws_path"] . '" />';
        } else if (isset($data['single']["url"])) {
            $data["metas"][] = '<meta property="og:image" content="' . $data['single']["url"] . '" />';
            $data["metas"][] = '<meta property="twitter:image" content="' . $data['single']["url"] . '" />';
            $data["metas"][] = '<meta property="og:image:secure_url" content="' . $data['single']["url"] . '" />';
            $data["metas"][] = '<meta property="og:image:width" content="640" />';
            $data["metas"][] = '<meta property="og:image:height" content="360" />';
        } else {
            $data["metas"][] = '<meta property="og:image" content="' . base_url() . $data['settings'][12]["setting_value"] . '" />';
            $data["metas"][] = '<meta property="twitter:image" content="' . base_url() . $data['settings'][12]["setting_value"] . '" />';
            $data["metas"][] = '<meta property="og:image:secure_url" content="' . base_url() . $data['settings'][12]["setting_value"] . '" />';
            $data["metas"][] = '<meta property="og:image:width" content="640" />';
            $data["metas"][] = '<meta property="og:image:height" content="360" />';
        }
        $data['relatedPostRandom'] = $this->front_model->getRelatedPost(
            $id,
            $limit = 5,
            $rand = 1
        );

        $data['relatedPost'] = $this->front_model->getRelatedPost(
            $id,
            $limit = 5,
            $rand = 0
        );

        $data['latest_news'] = $this->front_model->getNews(
            $page = 1,
            $limit = 5,
            $cat = ''
        );

        $data['popular'] = $this->front_model->getPopularNews();

        echo view('theme/newsfeed/header', $data);
        echo view('theme/newsfeed/menu');
        echo view('theme/newsfeed/single');
        echo view('theme/newsfeed/bottom');
        echo view('theme/newsfeed/footer');
    }

    function oldtonew($newurl)
    {
        return redirect()->to(base_url(urldecode($newurl)), 'location', 301);
    }

    function uri_operation()
    {
        $this->load->helper('url');
        $uri= $this->uri->segment(1);
        echo $uri;
    }

    public function upload_ck_file_browser()
    {
        $request = \Config\Services::request();
        $pag = $request->getVar('page');
        if($pag == ''){ $page = 1 ; }else{ $page = $pag; }
        $perpage = 8;
        $pager = \Config\Services::pager();

        $modal_image = array();
        $this->blog_add_model = new Blog_add_model();
        $data['all_media'] = $this->blog_add_model->fetch_all_media_img($page, $perpage);
        $data['pages'] = $this->blog_add_model->paginate(4);
        $data['pager'] = $this->blog_add_model->pager;
        $modal_image[$k] =  base_url().'/'.$v;
        foreach($data['all_media'] as $key=>$value)
        {
            $modal_image[] = $value['url'];
        }
        $data['media_list'] = $modal_image;
        echo view("admin/file_browser",$data);
    }
    
    public function upload_ck()
    {
      $this->blog_add_model = new Blog_add_model();
      $file = $_FILES['upload']['tmp_name'];
      if (!isset($file))
      {
        echo "file error..";
      }
      else{
        move_uploaded_file($_FILES['upload']['tmp_name'], './assets/media-image/'.$_FILES['upload']['name']);       
        $data["create_date"] = date("Y-m-d H:i:s");
        $data["author"] = 33;
        $data["active"] = 1;
        $data['url'] = base_url().'/assets/media-image/' . $_FILES['upload']['name'];
        $get_id = $data['url'];
        $this->blog_add_model->insert_uploadImage($data);
        $id = $this->blog_add_model->uploadImage($get_id);        
      }      

    }
  
}
