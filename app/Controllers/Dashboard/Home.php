<?php
namespace App\Controllers\Dashboard;

use App\Models\Front_model;
use App\Models\Library_model;
use App\Models\Blog_add_model;
use CodeIgniter\Controller;


class Home extends Controller
{
    private $cachemin, $library_model, $front_model, $form_validation, $session, $blog_add_model, $pager;

    function __construct()
    {
        $this->library_model = new Library_model();
        $this->front_model = new Front_model();
        helper(['form','url']);
        helper('form');
        $this->pager = \Config\Services::pager();
        helper('get_permalink');
  
    }

    public function index()
    {
        $request = \Config\Services::request();
        header('Link: <'.base_url().'>; rel=canonical');

        $data["metas"] = array();
        $data["metas"][] = '<meta charset="utf-8">';
        $data['settings'] = $this->front_model->getSetting();
        $data['top_menu'] = $this->front_model->getMenu($menu=1);
        $data['footer_menu'] = $this->front_model->getMenu($menu = 3);
        $data['category'] = $this->front_model->getMenu($menu = 2);
        $data['category_footer'] = $this->front_model->getMenu($menu = 4);
        $data['page'] = $this->front_model->getPageLink();
        $data['header_menu'] = $this->front_model->get_header_menu(4);
        $data['latest_news'] = $this->front_model->getNews($page = 1, $limit = 5, $cat = '');

        $populars = $this->front_model->getPopularNews(6);
        $getHomepageCat = $this->front_model->getTopcat();

        $data['posts']=$this->front_model->fetch_the_post();
        $data['tech_post'] = $this->front_model->get_tech_post();
        $data['business_post'] = $this->front_model->get_business_post();         
        $data["title"] = $data['settings'][0]["setting_value"];
        $data["metas"][] = '<meta name="title" content="' . $data['settings'][0]["setting_value"] . '" />';

        if ($data['settings'][3]["setting_value"]) {
            $data["metas"][] = '<meta name="description" content="' . $data['settings'][3]["setting_value"] . '">';
        }
        if ($data['settings'][4]["setting_value"]) {
            $data["metas"][] = '<meta name="keyword" content="' . $data['settings'][4]["setting_value"] . '">';
        }

        $data["metas"][] = '<meta property="og:site_name" content="' . $data['settings'][0]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="og:type" content="object" />';
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
        echo view("theme/newsfeed/body",$data);
        echo view("theme/newsfeed/bottom");        
        echo view("theme/newsfeed/footer");
    }
    

    public function spin()
    {
       
       $lnew = $this->front_model->getNews($page = 1, $limit = 8, $cat = '');
       $data['latest_news'] = array_chunk( $lnew, 2 );

       $data['settings'] = $this->front_model->getSetting();
       $data['header_menu'] = $this->front_model->get_header_menu(4);
       $data['posts']=$this->front_model->fetch_the_post();
       $data['add'] = $this->front_model->add_data();
       $data['popular'] = $this->front_model->getPopularNews(6);
       $data['cat_name'] = '';

       $data['tech_post'] = $this->front_model->get_tech_post($limit = '15');
       $data['business_post'] = $this->front_model->get_business_post($limit = 4);
       $data['software_post'] = $this->front_model->get_software_post($limit = '10');
       $data['health_post'] = $this->front_model->get_health_post($limit = '2');
       $data['entertainment_post'] = $this->front_model->get_entertainment_post($limit = '5');
       $data['sports_post'] = $this->front_model->get_sports_post($limit = '5');
       $data['travel_post'] = $this->front_model->get_travel_post($limit = '12');
       $data['science_post'] = $this->front_model->get_science_post($limit = '4');
       $data['categories'] = $this->front_model->get_all_cat();

        echo view("spin/html/header", $data);
        echo view("spin/html/body", $data);
        echo view("spin/html/footer", $data);     
        
    }

   


    public function catagory_post($cat)
    {   
        $cat_present = $this->front_model->check_cat($cat);
        if(empty($cat_present)){
            echo view('errors/html/error_404');
        }else{
   
        $request = service("request");
        $request = \Config\Services::request();
        $pager = service('pager');
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = 4;
        $total   = $this->front_model->category_post_count($cat);
        $pager_links = $pager->makeLinks($page, $perPage, $total);
        $data['pager_links'] = $pager_links;
      
        $data['categories'] = $this->front_model->get_all_cat();
        $data['add'] = $this->front_model->add_data();
        $data['cat_post'] = $this->front_model->get_category_post($cat, $page);
        if(empty($data['cat_post'] )){
            echo view('errors/html/error_404');
        }else{        
        $data['header_menu'] = $this->front_model->get_header_menu(4);
        $data['cat_latest_post'] = $this->front_model->cat_latest_post();
        $data['popular'] = $this->front_model->getPopularNews(6);
        $data['trending'] = $this->front_model->trendingPost();
        $data['settings'] = $this->front_model->getSetting();
        $data['cat_name'] = $cat;   
        echo view("spin/html/header.php", $data);
        echo view("spin/html/category.php", $data);
        echo view("spin/html/footer.php", $data);
        }}
    }
    


    public function author_post($aut)
    {
        $request = service("request");
        $pager = \Config\Services::pager();
        $data['author'] = $aut;
        $data['aut'] = $this->front_model->get_author($aut);

        $p['pages'] = $this->front_model->where('author',$data['aut'])->orderBy('update_date', 'DESC')->paginate(9);
        $data['pager'] = $this->front_model->pager;        
        $data['categories'] = $this->front_model->get_all_cat();
        $data['settings'] = $this->front_model->getSetting();
        $data['aut_post'] = $this->front_model->get_aut_post($p=$p);
        $data['cat_latest_post'] = $this->front_model->cat_latest_post();    
        $data['header_menu'] = $this->front_model->get_header_menu(4);

        echo view("spin/html/header.php");
        echo view("spin/html/author.php",$data);
        echo view("spin/html/footer",$data);
    }

    public function author_post_old($a)
    {
        echo "<pre>";
        print_r($a);die;
    }

    function claercache()
    {
        $cache = \Config\Services::cache();
        $cache->clean();
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
        $data["author"] = 40;
        $data["active"] = 1;
        $data['url'] = base_url().'/assets/media-image/' . $_FILES['upload']['name'];
        $get_id = $data['url'];
        $this->blog_add_model->insert_uploadImage($data);
        $id = $this->blog_add_model->uploadImage($get_id);        
      }
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
      
        foreach($data['all_media'] as $key=>$value)
        {
            $modal_image[] = $value['url'];
        }
        $data['media_list'] = $modal_image;
        echo view("admin/file_browser",$data);
    }


    function catagoryPost($id)
    {
        $pager = \Config\Services::pager();
        $data["metas"] = array();
        $data["metas"][] = '<meta charset="utf-8">';
        $data['settings'] = $this->front_model->getSetting();
        $data['top_menu'] = $this->front_model->getMenu($menu = 1);
        $data['footer_menu'] = $this->front_model->getMenu($menu = 3);
        $data['category'] = $this->front_model->getMenu($menu = 2);
        $data['category_footer'] = $this->front_model->getMenu($menu = 4);
        $data['page'] = $this->front_model->getPageLink();
        $data['pages'] = $this->front_model->paginate(10);
        $data['pager'] = $this->front_model->pager;
        $data['cat_post'] = $this->front_model->get_category_post($id);

        $data['header_menu'] = $this->front_model->get_header_menu(4);
        
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
        echo view('theme/newsfeed/catagorypostbody',$data);
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
        $data['add'] = $this->front_model->add_data();
        $data['categories'] = $this->front_model->get_all_cat();  
        $data['popular'] = $this->front_model->getPopularNews(6);
        $data['latest_news'] = $this->front_model->getNews(
            $page = 1,
            $limit = 5,
            $cat = ''
        );

        $data['header_menu'] = $this->front_model->get_header_menu(4);

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
        $data["metas"][] = '<meta property="og:type" content="object" />';
        $data["metas"][] = '<meta property="og:title" content="' . $data['settings'][0]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="og:url" content="' . base_url() . '" />';
        $data["metas"][] = '<meta property="og:image" content="' . base_url() .'/'. $data['settings'][12]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="og:image:secure_url" content="' . base_url() . $data['settings'][12]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="twitter:card" content="summary" />';
        $data["metas"][] = '<meta property="twitter:domain" content="' . base_url() . '" />';
        $data["metas"][] = '<meta property="twitter:image" content="' . base_url() . $data['settings'][12]["setting_value"] . '" />';

        header('Link: <'.base_url().$data['singlepage']["seo_url"].'>; rel=canonical');

        echo view('theme/newsfeed/header', $data);
        if($page_id == '8'){ echo view('theme/newsfeed/contact', $data); }else{ echo view('theme/newsfeed/newpage1', $data); }        
        echo view('theme/newsfeed/footer', $data);
    }



    function spin_singlepage($id,$data)
    {
        $keys = array();
        foreach($data['single']['keyword'] as $key)
        {
            if(!empty($key['keyword']))
            {
                 array_push($keys,$key['keyword']);
            }
        }

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
        if (isset($data['single']["title"])) {
            $data["metas"][] = '<meta name="title" content="' . $data['single']["title"]  . '">';
        }
        if ($data['single']["meta_tag"]) {
            $data["metas"][] = '<meta name="meta_tag" content="' . $data['single']["meta_tag"] . '">';
        } else{
            $data["metas"][] = '<meta name="meta_tag" content="' . $data['settings'][0]['setting_value'] . '">';
        }

        if (isset($data['single']["meta_desc"])) {
            $data["metas"][] = '<meta name="meta_description" content="' . $data['single']["meta_desc"] . '">';
        }

        if (isset($data['single']["keyword"])) {
 
                $data["metas"][] = '<meta name="keywords" content="' .implode(",",$keys). '">';          
        }

        $data["metas"][] = '<meta property="og:site_name" content="' . $data['settings'][0]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="og:type" content="object" />';
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
        $data['popular'] = $this->front_model->getPopularNews(6);
        $data['header_menu'] = $this->front_model->get_header_menu(4);
        echo view('spin/html/header', $data); 
        echo view('spin/html/single',$data); 
    }

    function post_edit_preview($id)
    {
        $session = session();
        if(!empty($_GET['parent_id']))
        {
            $pc_id= $_GET['parent_id'];      
        }
        $data["metas"] = array();
        $data["metas"][] = '<meta charset="utf-8">';
        $data['settings'] = $this->front_model->getSetting();
        $data['top_menu'] = $this->front_model->getMenu($menu = 1);
        $data['footer_menu'] = $this->front_model->getMenu($menu = 3);
        $data['category'] = $this->front_model->getMenu($menu = 2);
        $data['category_footer'] = $this->front_model->getMenu($menu = 4);
        $data['page'] = $this->front_model->getPageLink();
        $data['single'] = $this->front_model->single_post_preview($id);
        $data['header_menu'] = $this->front_model->get_header_menu(4);
        $data['categories'] = $this->front_model->get_all_cat();
        $data['add'] = $this->front_model->add_data();        
        $this->edit_single_preview($id, $data);          
    }

    function single($id='')
    {
        $request = \Config\Services::request();
        $url = $_SERVER['QUERY_STRING'];
        $url1 = urldecode($url);
        $titles = str_replace( array("s=", "/", "?s=", "+", "%", ), ' ' , $url1 ) ;
        $session = session();
        if(!empty($_GET['parent_id'])) {
            $pc_id= $_GET['parent_id'];      
        }
        $data["metas"] = array();
        $data["metas"][] = '<meta charset="utf-8">';
        $data['settings'] = $this->front_model->getSetting();
        $data['top_menu'] = $this->front_model->getMenu($menu = 1);
        $data['footer_menu'] = $this->front_model->getMenu($menu = 3);
        $data['category'] = $this->front_model->getMenu($menu = 2);
        $data['category_footer'] = $this->front_model->getMenu($menu = 4);
        $data['page'] = $this->front_model->getPageLink();
        $data['trending'] = $this->front_model->trendingPost();
        $data['cat_latest_post'] = $this->front_model->cat_latest_post();
        $data['categories'] = $this->front_model->get_all_cat();
        $title = trim($titles);
        if($title)
        {  $title_present = $this->front_model->search_title($title);       
            if(!empty($title_present)){
                $data['single'] = $this->front_model->getSingleNews1($title);                
            }else{     return redirect()->to(base_url() . "/" . 'Page_not_found');
            } }
        if($id){
            $data['single'] = $this->front_model->getSingleNews($id);
        }

        header('Link: <'.base_url()."/".$data['single']["seo_url"].'>; rel=canonical');
        
        if ($data['single']["visibility"] == "p") {
            if($id != ''){ $this->singlePageDetail($id, $data); }else{ $this->singlePageDetail($data['single']['id'], $data);
            } } else if ($data['single']["visibility"] == "h") {

            echo view('admin/error');die;

            $this->login = $this->session->userdata("usr");
            $this->roleId = $this->session->userdata("role");
            if ($this->roleId == 1) {
                $this->singlePageDetail($id, $data);
            } else { if ($data['single']["author"] == $this->login) {
                     $this->singlePageDetail($id, $data); 
                } else {
                   // show_404("dasdasd",false);
                }
            }
        }
    
    }

    public function search($id = 1){              
        
        
        $request = service("request");
        $request = \Config\Services::request();
        $pager = service('pager');
        if(empty(trim(filter_var($request->getVar("s"), FILTER_SANITIZE_STRING)))){
            echo view('errors/html/error_404');

        }else{

        $cat1 = trim(filter_var($request->getVar("s"), FILTER_SANITIZE_STRING));
        $page    = (int) ($this->request->getGet('page') ?? 1);
        $perPage = 10;
        $total   = $this->front_model->category_post_count1($cat1);
        $pager_links = $pager->makeLinks($page, $perPage, $total);
        $data['pager_links'] = $pager_links;
        $data['search'] = $cat1;
        $data['categories'] = $this->front_model->get_all_cat();
        $data['add'] = $this->front_model->add_data();
        $data['cat_post'] = $this->front_model->get_category_post1($cat1, $page);
        
        $data['header_menu'] = $this->front_model->get_header_menu(4);
        $data['cat_latest_post'] = $this->front_model->cat_latest_post();
        $data['popular'] = $this->front_model->getPopularNews(6);
        $data['trending'] = $this->front_model->trendingPost();
        $data['settings'] = $this->front_model->getSetting();
        $data['cat_name'] = '';   

        echo view("spin/html/header.php", $data);
        echo view("spin/html/searchPage.php", $data);
        echo view("spin/html/footer.php", $data);
    }
  }



    function single_preview($id)
    {
        $session = session();
        if(!empty($_GET['parent_id']))
        {
            $pc_id= $_GET['parent_id'];      
        }
        $data["metas"] = array();
        $data["metas"][] = '<meta charset="utf-8">';
        $data['settings'] = $this->front_model->getSetting();
        $data['top_menu'] = $this->front_model->getMenu($menu = 1);
        $data['footer_menu'] = $this->front_model->getMenu($menu = 3);
        $data['category'] = $this->front_model->getMenu($menu = 2);
        $data['category_footer'] = $this->front_model->getMenu($menu = 4);
        $data['page'] = $this->front_model->getPageLink();
        $data['single'] = $this->front_model->getSingleNews($id);
        $data['categories'] = $this->front_model->get_all_cat();

        header('Link: <'.base_url()."/".$data['single']["seo_url"].'>; rel=canonical');
        if (($data['single']["visibility"] == "h") && !empty($session->get('usr')))
        {
            $this->singlePageDetail($id, $data);
        }
    }

    function edit_single_preview($id, $data){
        $keys = array();
        foreach($data['single']['keyword'] as $key)
        {
            if(!empty($key['keyword']))
            {
                 array_push($keys,$key['keyword']);
            }
        }

        $data['add'] = $this->front_model->add_data();

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
        if (isset($data['single']["title"])) {
            $data["metas"][] = '<meta name="title" content="' . $data['single']["title"]  . '">';
        }
      
        if (isset($data['single']["meta_desc"])) {
            $data["metas"][] = '<meta name="meta_description" content="' . $data['single']["meta_desc"] . '">';
        }
        if (isset($data['single']["keyword"])) {
 
                $data["metas"][] = '<meta name="keywords" content="' .implode(",",$keys). '">';          
        }
        $data["metas"][] = '<meta property="og:site_name" content="' . $data['settings'][0]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="og:type" content="object" />';
        $data["metas"][] = '<meta property="og:url" content="' . base_url() . $data['single']["seo_url"] . '" />';
        $data["metas"][] = '<meta property="twitter:card" content="summary" />';

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
            if(isset($featured_img))
            {
                $data["metas"][] = '<meta property="og:image" content="' .$featured_img.'" />';
                $data["metas"][] = '<meta property="twitter:image" content="' .$featured_img.'" />';
                $data["metas"][] = '<meta property="og:image:secure_url" content="' .$featured_img.'" />';
                $data["metas"][] = '<meta property="og:image:width" content="640" />';
                $data["metas"][] = '<meta property="og:image:height" content="360" />';
            }else{
                $data["metas"][] = '<meta property="og:image" content="' . base_url() .'/'. $data['settings'][12]["setting_value"] . '" />';
                $data["metas"][] = '<meta property="twitter:image" content="' . base_url() .'/'. $data['settings'][12]["setting_value"] . '" />';
                $data["metas"][] = '<meta property="og:image:secure_url" content="' . base_url() .'/'. $data['settings'][12]["setting_value"] . '" />';
                $data["metas"][] = '<meta property="og:image:width" content="640" />';
                $data["metas"][] = '<meta property="og:image:height" content="360" />';
            }
        }

        $data['latest_news'] = $this->front_model->getNews(
            $page = 1,
            $limit = 5,
            $cat = ''
        );
        $data['popular'] = $this->front_model->getPopularNews(6);
        $data['header_menu'] = $this->front_model->get_header_menu(4);       
        $data['prePost'] = $this->front_model->previousPost($id);       
        $data['nextPost'] = $this->front_model->nextPost($id);    
        $data['categories'] = $this->front_model->get_all_cat();   

        echo view('theme/newsfeed/header', $data);
        echo view('theme/newsfeed/single', $data);
        echo view('theme/newsfeed/footer_single', $data);

    }


    function singlePageDetail($id, $data)
    {
        $keys = array();
        foreach($data['single']['post_tags'] as $key)
        {
            if(!empty($key))
            {
                    array_push($keys,$key);
            }
        }
        $fimg = $this->front_model->updated_featuredimage($id);
        $data['add'] = $this->front_model->add_data();
        if((!empty($fimg))&&(!empty($fimg['url'])))
        {
            $featured_img = $fimg['url'];
        }   
        if (isset($data['single']["title"])) {
            $data["title"] = $data['settings'][0]["setting_value"] . " | " . $data['single']["title"];
        } else {
            $data["title"] = $data['settings'][0]["setting_value"];
        }
        if (isset($data['single']["indexed"])) {
            if ($data['single']["indexed"] == 1) {
                $data["metas"][] = '<meta name="robots" content="noindex" />';
            }
        }
        if (isset($data['single']["nofollow"])) {
            if ($data['single']["nofollow"] == 1) {
                $data["metas"][] = '<meta name="robots" content="nofollow"/>';
            }
        }
        if (isset($data['single']["title"])) {
            $data["metas"][] = '<meta name="title" content="' . $data['single']["title"]  . '">';
        }
        if ($data['single']["meta_tag"]) {
            $data["metas"][] = '<meta name="meta_tag" content="' . $data['single']["meta_tag"] . '">';
        }

        if (isset($data['single']["meta_desc"])) {
            $data["metas"][] = '<meta name="meta_description" content="' . $data['single']["meta_desc"] . '">';
        }
    
        if (isset($data['single']["post_tags"])) {    
                $data["metas"][] = '<meta name="keywords" content="' .implode(",",$keys). '">';          
        }

        $data["metas"][] = '<meta property="og:site_name" content="' . $data['settings'][0]["setting_value"] . '" />';
        $data["metas"][] = '<meta property="og:type" content="object" />';
        
        if(isset($data['single']['seo_url'])){
            $data["metas"][] = '<meta property="og:url" content="' . base_url() . $data['single']["seo_url"] . '" />';
        }
        
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
            if(isset($featured_img))
            {
                $data["metas"][] = '<meta property="og:image" content="' .$featured_img.'" />';
                $data["metas"][] = '<meta property="twitter:image" content="' .$featured_img.'" />';
                $data["metas"][] = '<meta property="og:image:secure_url" content="' .$featured_img.'" />';
                $data["metas"][] = '<meta property="og:image:width" content="640" />';
                $data["metas"][] = '<meta property="og:image:height" content="360" />';
            }else{
                $data["metas"][] = '<meta property="og:image" content="' . base_url() .'/'. $data['settings'][12]["setting_value"] . '" />';
                $data["metas"][] = '<meta property="twitter:image" content="' . base_url() .'/'. $data['settings'][12]["setting_value"] . '" />';
                $data["metas"][] = '<meta property="og:image:secure_url" content="' . base_url() .'/'. $data['settings'][12]["setting_value"] . '" />';
                $data["metas"][] = '<meta property="og:image:width" content="640" />';
                $data["metas"][] = '<meta property="og:image:height" content="360" />';
            }
        }
      
        $data['relatedPostRandom'] = $this->front_model->getRelatedPost(
            $id,
            $limit = 5,
            $rand = 1
        );

        $data['relatedPost'] = $this->front_model->getRelatedPost(
            $id,
            $limit = 3,
            $rand = 0
        );
            $data['latest_news'] = $this->front_model->getNews(
            $page = 1,
            $limit = 5,
            $cat = ''
        );

        
        $data['popular'] = $this->front_model->getPopularNews(6);
        $data['header_menu'] = $this->front_model->get_header_menu(4);       
        $data['prePost'] = $this->front_model->previousPost($id);       
        $data['nextPost'] = $this->front_model->nextPost($id);  

        echo view('theme/newsfeed/header', $data);
        echo view('theme/newsfeed/single', $data);
        echo view('theme/newsfeed/footer_single', $data);
    }

    function oldtonew($newurl)
    {
        $date = $this->front_model->oldtonew($newurl);
        return redirect()->to(base_url() . "/".$date."/".$newurl,301);
    }

    function uri_operation()
    {
       $data=$_GET['key'];
       $data_url=$this->front_model->old_url($data);
       if(empty($data_url))
       {
           echo '';
       }
       else
       {
           echo $data_url[0]['new_url'];
       }       
    }

    function show_the_post()
    {
        $request = \Config\Services::request();
        $id=$request->getPost('id');
        $this->front_model->get_post($id);
        echo $data=$this->front_model->get_post($id);        
    }
    
  
    public function contact_us_details(){
       
        $session = session();
        $request = \Config\Services::request();
   
        $validation =  \Config\Services::validation();
       
        $validation->setRules([
                'name' => 'required|trim',
                'email' => 'required',
                'phone' => 'required',
                'subject' => 'required',
                'message' => 'required',
        ]);
        if (!$validation->withRequest($request)->run()) {
              
                return redirect()->to(base_url() . "/" . 'contact-us');
        } else {

                $data['name'] = (trim($request->getPost("name")));
                $data['email'] = (trim(htmlentities($request->getPost("email"))));                
                $data['phone'] = (htmlentities($request->getPost("phone")));                        
                $data['subject'] = ($request->getPost("subject"));
                $data['message'] = ($request->getPost("message"));        
                $data['date'] = date("Y-m-d H:i:s"); 

                $res = $this->front_model->contact_us_detail($data);

                 return redirect()->to(base_url() . "/" . 'contact-us');
                        
                }
        }
}