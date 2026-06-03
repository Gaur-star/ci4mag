<?php

namespace App\Controllers;

use App\Models\Blog_add_model;
use App\Models\HomeModel;

class Home extends BaseController
{
    public $homemodel, $blogmodel, $session, $data;
    function __construct()
    {
        $this->homemodel = new HomeModel();
        $this->blogmodel = new Blog_add_model();
        $this->session = \Config\Services::session();
        helper('helpers');

        $this->data['site_title'] = $this->homemodel->site_info('site_name');
        $this->data['site_logo'] = $this->homemodel->site_info('logo');
        $this->data['site_fav'] = $this->homemodel->site_info('fav_icon');
        $this->data['site_email'] = $this->homemodel->site_info('site_email');
        $this->data['site_phone'] = $this->homemodel->site_info('site_phone');
        $this->data['site_address'] = $this->homemodel->site_info('site_address');
        $this->data['site_about'] = $this->homemodel->site_info('about');
        $this->data['site_description'] = $this->homemodel->site_info('site_description');
        $this->data['site_keyword'] = $this->homemodel->site_info('site_keyword');
        // $this->data['weather'] = $this->homemodel->weather();
        $this->data['header_menu'] = $this->homemodel->get_header_menu(5);
        $this->data['categories'] = $this->homemodel->get_category();
        $this->data['linkformat'] = $this->homemodel->permalink();
        $this->data['latest_post'] = $this->homemodel->latest_post(10);
        $this->data['trendy_post'] = $this->homemodel->trendy_post(10);
        $this->data['popular_post'] = $this->homemodel->popular_post(10);
        $this->data['most_view'] = $this->homemodel->popular_post(10);
        $this->data['ads'] = $this->homemodel->find_ads();
    }
    
    public function index()
    {
        $data = $this->data;
        for($i =0; $i <= 2; $i++){
            $data['category_post'][$data['header_menu'][$i]['slug']] = $this->homemodel->category_posts($data['header_menu'][$i]['categorie_id'],5);
        }
        
        // print_s($data);
        return view('theme/index', $data);
    }
    // public function new_blog($id)
    // {
    //     $data = $this->data;
    //     $val = $this->homemodel->urlredi($id);
    //     if(!$data['linkformat']){
    //         $url = base_url('/').'/'.$val->seo_url;
    //     }else{
    //         $url = base_url('/').'/'.date($data['linkformat'], strtotime($val->date_)).'/'.$val->seo_url;
    //     }
    //     header("HTTP/1.1 307 Temporary Redirect");
    //     return redirect()->to($url);
    // }
    // public function past_blog($url,$date)
    // {
    //     $data = $this->data;
    //     header("HTTP/1.1 301 Moved Permanently");
    //     if(!$data['linkformat']){
    //         $reurl = base_url('/').'/'.$url;
    //     }else{
    //         $reurl = base_url('/').'/'.date($data['linkformat'], strtotime($date)).'/'.$url;
    //     }
    //     return redirect()->to($reurl);
    // }
    public function blog($id)
    {
    	$this->homemodel->visit_count($id);
        $data = $this->data;
        $data['single_post'] = $this->homemodel->single_post($id);
        $data['single_post_category'] = $this->homemodel->single_post_category($id);
        $data['single_post_keywords'] = $this->homemodel->single_post_keywords($id);
        $data['more_post'] = $this->homemodel->more_post(5);
        $data['related_post'] = $this->homemodel->related_post($id,8);
        $data['next_url'] = $this->homemodel->get_next_url($id);
        $data['prev_url'] = $this->homemodel->get_prev_url($id);

        // print_s($data['single_post_category']);
        return view('theme/blog', $data);
    }
    public function breadcrumbs($year,$month = 0,$day = 0){
        $data = $this->data;

        if($day){
            $date = $year.'-'.$month.'-'.$day;
            $data['page_title'] = date('d F Y',strtotime($date));
            $data['udate'] = date('Y/m/d',strtotime($date));
        }elseif($month){
            $date = $year.'-'.$month;
            $data['page_title'] = date('F Y',strtotime($date));
            $data['udate'] = date('Y/m',strtotime($date));
        }else{
            $date = $year;
            $data['page_title'] = $year;
            $data['udate'] = $year;
        }

        $per_page = 15;
        $total = $this->homemodel->breadcrumbs_count($date);
        $page_no = ceil($total/$per_page);
        if(!isset($_GET['page'])){
            $page = 1;
        }elseif($_GET['page'] > $page_no){
            return redirect()->back();
        }else{
            $page = $_GET['page'];
        }
        $offset = $per_page * ($page - 1);
        $data['pager'] = $page_no;
        $data['all_posts'] = $this->homemodel->breadcrumbs($date, $per_page, $offset);
        $data['total_post'] = $total;
        $data['offset'] = $offset;
        $data['per_page'] = $per_page;

        // print_s($data);
        return view('theme/breadcrumbs', $data);
    }
    public function category($cat_url = 0,$cat_url2 = 0)
    {
        $data = $this->data;
        if(!$cat_url){
            foreach($data['header_menu'] as $cat)
                $data['category_post'][$cat['slug']] = $this->homemodel->category_posts($cat['categorie_id'],5);

            // print_s($data);
            return view('theme/category', $data);
        }elseif(!$cat_url2){
            $category = $this->homemodel->find_category_id($cat_url);
            if(empty($category)){
                return view('errors/html/custom_404');
            }else{
                $data['category_name'] = $category->categorie;
                $data['category_key'] = $category->meta_tag;
                $pid = $this->homemodel->child_category_id($category->id);
    
                $per_page = 20;
                $total = $this->homemodel->post_count_plus($category->id,$pid);
                $page_no = ceil($total/$per_page);
                if(!isset($_GET['page'])){
                    $page = 1;
                }elseif($_GET['page'] > $page_no){
                    return redirect()->back();
                }else{
                    $page = $_GET['page'];
                }
                $offset = $per_page * ($page - 1);
                $data['pager'] = $page_no;
                $data['category_post'] = $this->homemodel->all_category_posts_plus($category->id, $pid, $per_page, $offset);
                $data['total_post'] = $total;
                $data['offset'] = $offset;
                $data['per_page'] = $per_page;
                $data['cat_url'] = $cat_url;
    
                // print_s($data);
                return view('theme/single-category', $data);
            }
        }else{
            $category = $this->homemodel->find_category_id($cat_url2);
            if(empty($category)){
                return view('errors/html/custom_404');
            }else{
                $data['category_name'] = $category->categorie;
                $data['category_key'] = $category->meta_tag;
    
                $per_page = 20;
                $total = $this->homemodel->post_count($category->id);
                $page_no = ceil($total/$per_page);
                if(!isset($_GET['page'])){
                    $page = 1;
                }elseif($_GET['page'] > $page_no){
                    return redirect()->back();
                }else{
                    $page = $_GET['page'];
                }
                $offset = $per_page * ($page - 1);
                $data['pager'] = $page_no;
                $data['category_post'] = $this->homemodel->all_category_posts($category->id, $per_page, $offset);
                $data['total_post'] = $total;
                $data['offset'] = $offset;
                $data['per_page'] = $per_page;
                $data['cat_url'] = $cat_url2;
    
                // print_s($data);
                return view('theme/single-category', $data);
            }
        }
    }
    public function autocomplete()
    {
        $data = "Y/m/d";
        $query = $_POST['title'];
        $post = $this->homemodel->find_titla($query);
        $output = '<ul class="list-group">';
        if(count($post) > 0){
            foreach($post as $row){
                $output .= '<a href="'.permalink($row['date_'],$data).'/'.$row['seo_url'].'"><li class="list-group-item">'.$row['title'].'</li></a>';
            }
        }else{
            $output .= '<li class="list-group-item">Not Found</li>';
        }
        $output .= '</ul>';
        return $output;
    }
    public function page($id)
    {
        $data = $this->data;
        $data['single_page'] = $this->homemodel->single_page($id);

        // print_s($data);
        return view('theme/page', $data);
    }
    public function forminsert()
    {
        if(empty($_REQUEST['name']) || empty($_REQUEST['email']) || empty($_REQUEST['subject']) || empty($_REQUEST['message'])){
            $this->session->setFlashdata('success', 'All Fields are Required');
            return redirect()->back();
        }else{
            $data = [
                'name' => $_REQUEST['name'],
                'email'  => $_REQUEST['email'],
                'subject'  => $_REQUEST['subject'],
                'message'  => $_REQUEST['message'],
                'created_at' => date("Y-m-d H:i:s"),
            ];
            $this->homemodel->insert_form($data);
            $this->session->setFlashdata('success', 'Successfully Sent Your Data');
            return redirect()->back();
        }
    }
    public function preview_blog($id)
    {
        $data = $this->data;
        header("X-Robots-Tag: noindex, nofollow", true);
        $data['preview_post'] = $this->homemodel->preview_post($id);
        $data['preview_media'] = $this->homemodel->preview_media($id);
        $data['preview_category'] = $this->homemodel->preview_category($id);
        $data['preview_keywords'] = $this->homemodel->preview_keywords($id);

        // print_s($data);
        return view('theme/preview-blog', $data);
    }
    public function upload_ck()
    {
        $file = $_FILES['upload']['tmp_name'];
        if (!isset($file)){
            echo "file error..";
        }else{
            move_uploaded_file($_FILES['upload']['tmp_name'], './assets/media-image/'.$_FILES['upload']['name']);
            
            $data["create_date"] = date("Y-m-d H:i:s");
            $data["author"] = 33;
            $data["active"] = 1;
            $data['url'] = base_url().'/assets/media-image/' . $_FILES['upload']['name'];

            $get_id = $data['url'];
            $this->blogmodel->insert_uploadImage($data);
            $id = $this->blogmodel->uploadImage($get_id);
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
        $data['all_media'] = $this->blogmodel->fetch_all_media_img($page, $perpage);
        $data['pages'] = $this->blogmodel->paginate(4);
        $data['pager'] = $this->blogmodel->pager;
        foreach($data['all_media'] as $key=>$value){
            $modal_image[] = $value['url'];
        }
        $data['media_list'] = $modal_image;
        echo view("admin/file_browser",$data);
    }
    public function claercache()
    {
        $cache = \Config\Services::cache();
        $cache->clean();
    }
    public function corn_image_update()
    {
        $sql = "SELECT p.id, p.content, p.flag, m.id as mid, m.url FROM posts p, media m WHERE p.image = m.id AND p.flag IS NULL ORDER BY p.id DESC LIMIT 50";
        $query   = \Config\Database::connect()->query($sql);
        $results = $query->getResultArray();
        //print_s($results);
        foreach($results as $val){
            $img = first_img(html_entity_decode($val['content']));
            $array = @get_headers($img);
            $string = $array[0];
            if(strpos($string, "200")) {
                $url = $img;
            }else{
                $url = "https://issuewireassets.s3-us-west-2.amazonaws.com/primg/default/York-Pedia.jpg";
            }
            //echo $url;
            //echo "<br>";
            $sql1 = "UPDATE `media` SET `url` = '".$url."' WHERE `media`.`id` =".$val['mid'];
            $query1   = \Config\Database::connect()->query($sql1);
            $sql2 = "UPDATE `posts` SET `flag` = '1' WHERE `posts`.`id` =".$val['id'];
            $query2   = \Config\Database::connect()->query($sql2);
        }
        $sql3 = "SELECT p.id,p.image FROM posts p WHERE p.image = 0 ORDER BY p.id DESC LIMIT 5";
        $query3   = \Config\Database::connect()->query($sql3);
        $results1 = $query3->getResultArray();
        //print_s($results);
        foreach($results1 as $val1){
            $sql4 = "UPDATE `posts` SET `image` = '19' WHERE `posts`.`id` =".$val1['id'];
            $query4   = \Config\Database::connect()->query($sql4);
        }
        echo "Success";
    }
}
