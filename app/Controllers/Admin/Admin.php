<?php

namespace App\Controllers\admin;

use App\Controllers\Login;
use CodeIgniter\Controller;
use DOMDocument;

use App\Models\User_model;

use App\Models\Blog_add_model;
use App\Models\Login_model;


class Admin extends Controller
{

        public $user_model;
        public $blog_add_model;
        public $roleId;
        public $role;
        public $login;
        public $fname;
        public $session;
        public $login_model;
        
        function __construct()
        {
                $this->session = session();
                $this->login_model = new Login_model();
                $this->login = $this->session->get('usr');
                $this->fname = $this->session->get('f_name');

                if (empty($this->login)) {
                        return redirect()->to(base_url() . "/login");
                }

                $this->user_model = new User_model();
                $this->blog_add_model = new Blog_add_model();
                helper(['form', 'url']);
                helper('form');
                helper('webbuild_usable');
                helper('get_permalink');
                $this->roleId  = $this->login_model->get_role($this->login)['role'];
                
        }


        public function index()
        {
                $count_per_page = 5;
                $session = session();
                helper('webbuild_usable');
                $data["stylesheets"][] = "/assets/richtext/richtext.min.css";
                $data["javascripts"][] = "/assets/richtext/jquery.richtext.min.js";
                $data["javascripts"][] = "/assets/js/moment.min.js";
                $data["stylesheets"][] = "/assets/css/datetimepicker.css";
                $data["javascripts"][] = "/assets/js/datetimepicker.js";
                $data['u_firstname'] = $session->get('f_name');
                if(!$this->login)
                {
                  return redirect()->to(base_url() . "/login");
                }
                $data["img_no_page"] = $this->blog_add_model->countImgPage($count_per_page);
                $data['user'] = $this->user_model->get_categorie();
                $data['cat'] = $this->blog_add_model->get_categorie();
                $data['id'] = $this->blog_add_model->get_post_max_id();
                $data['roleId'] = $this->roleId;
                $data['last_id'] = $this->blog_add_model->get_last_post_id();
                $data["permalink"] = getPermalink();

                echo view('admin/addPost', $data);
        }

        public function blog_add_process()
        {
                $request = \Config\Services::request();
                $validation = \Config\Services::validation();
                $data["title"] = trim(htmlentities($request->getPost("title")));
                $data["seo_url"] = filter_var(trim($request->getPost("sugest_title")), FILTER_SANITIZE_STRING);
                $data["content"] = filter_var(htmlentities($request->getPost("content")));
                $data["meta_desc"] = filter_var($request->getPost("meta_desc"), FILTER_SANITIZE_STRING);
                $data["date_"] = filter_var($request->getPost("date_"), FILTER_SANITIZE_STRING);
                $data["meta_tag"] = filter_var($request->getPost("time_"), FILTER_SANITIZE_STRING);
                $session = session();
                $value = [
                        'title' => $data["title"],
                        'seo_url' => $data["seo_url"],
                        'content' => $data["content"],
                        'meta_desc' => $data["meta_desc"],
                        'date_' => $data["date_"],
                        'meta_tag' => $data["meta_tag"],
                        'cat[]' => filter_var($request->getPost("cat[]"), FILTER_SANITIZE_STRING),
                ];
                $session->setFlashdata('value', $value);

                $validation->setRules([
                        'content' => 'required',
                        'cat' => 'required',

                ]);

                if ($validation->withRequest($request)->run()) {
                        date_default_timezone_set('Asia/Kolkata');
                        $data["title"] = trim(htmlentities($request->getPost("title")));
                        $data["seo_url"] = filter_var(trim($request->getPost("sugest_title")), FILTER_SANITIZE_STRING);
                        $data["content"] = htmlentities($request->getPost("content"));
                        $data["meta_tag"] = filter_var($request->getPost("meta_tag"), FILTER_SANITIZE_STRING);
                        $data["meta_desc"] = filter_var($request->getPost("meta_desc"), FILTER_SANITIZE_STRING);
                        $data["date_"] = filter_var($request->getPost("date_"), FILTER_SANITIZE_STRING);
                        $data["time_"] = filter_var($request->getPost("time_"), FILTER_SANITIZE_STRING);
                        $data["active"] = true;

                        if ($this->roleId == 1) {
                                $data["author"] = filter_var($request->getPost("author"), FILTER_SANITIZE_STRING);
                        } else {
                                $data["author"] = $this->login;
                        }
                        if ($data["date_"]) {
                                $data["date_"] = date("Y-m-d", strtotime($data["date_"]));
                        }
                        if ($data["time_"]) {
                                $data["time_"] = date("H:i:s", strtotime($data["time_"]));
                        }

                        $data["date_time"] = date("Y-m-d H:i:s");
                        $data["update_date"] = date("Y-m-d H:i:s");
                        $data["site_map"] = filter_var($request->getPost("site_map"), FILTER_SANITIZE_STRING);
                        $data["nofollow"] = filter_var($request->getPost("no_follow"), FILTER_SANITIZE_STRING);
                        $data["news_sitemap"] = filter_var($request->getPost("newssitemap"), FILTER_SANITIZE_STRING);
                        if ($request->getPost("no_index") == "y") {
                                $data["indexed"] = 0;
                        } else {
                                $data["indexed"] = 1;
                        }

                        $cat = $request->getPost("cat");
                        $tag = $request->getPost("keyword_list");

                        $var = $request->getPost('content');
                        $len = strlen($data['content']);
                        $file = $request->getFile("image");
                        if ($len == 33) {
                                $this->session->setFlashdata("msg", "Content field is required");
                                return redirect()->to(base_url() . "/admin/addPost");
                        } else {

                                $data["seo_url_text"] = filter_var(trim($request->getPost("sugest_title")), FILTER_SANITIZE_STRING);
                                $data["seo_url_no"] = filter_var(trim($request->getPost("seo_url_no")), FILTER_SANITIZE_STRING);
                                $data['image'] = $this->image_upload("image");
                                $post_id = $this->blog_add_model->addNewPost($data, $tag, $cat);

                                if ($post_id['id']) {
                                        $this->session->setFlashdata("msg", '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Success</h5>
                                Post Successfully Saved
                                </div>');
                                        return redirect()->to(base_url() . "/admin/admin/post_edit/" . $post_id['id']);
                                } else {
                                        return redirect()->to(base_url() . "/admin/addPost");
                                }
                        }
                } else {
                        $this->session->setFlashdata("msg", $validation->listErrors());
                        return redirect()->to(base_url() . "/admin/addPost");
                }
        }


        public function post_edit($post_id = '')
        {
                $count_per_page = 20;
                helper("webbuild_usable");
                $data["stylesheets"][] = "/assets/richtext/richtext.min.css";
                $data["javascripts"][] = "/assets/richtext/jquery.richtext.min.js";
                $data["javascripts"][] = "/assets/js/moment.min.js";
                $data["stylesheets"][] = "/assets/css/datetimepicker.css";
                $data["javascripts"][] = "/assets/js/datetimepicker.js";
                $data["img_no_page"] = $this->blog_add_model->countImgPage($count_per_page);
                $data["post_detail"] = $this->blog_add_model->getPost($post_id);
                $data["catagories_list"] = $this->blog_add_model->getCatagoryList($post_id);
                $data["tag_list"] = $this->blog_add_model->getTagList($post_id);
                $data['cat'] = $this->blog_add_model->get_categorie();
                $data["role"] = $this->blog_add_model->getRole();

                $data["roleId"] = $this->roleId;
                $data["post_id"] = $post_id;
                $data["u_firstname"] = $this->fname;
                $data["permalink"] = getPermalink();
                if ($data["post_detail"]) {
                        echo view('admin/header', $data);
                        echo view('admin/sidebar');
                        echo view('admin/post_edit', $data);
                        echo view('admin/footer');
                } else {
                        return redirect()->to(base_url() . "admin/posts");
                }
        }

        public function update_post($post_id)
        {
                $session = session();
                if($session->has('single_preview'))
                {  unset($_SESSION['single_preview']);  }

                $validation =  \Config\Services::validation();
                $request = \Config\Services::request();
                $validation->setRules([
                        'title' => 'required|trim',
                        'sugest_title' => 'required',
                        'date_' => 'required',
                        'time_' => 'required',
                        'visibility' => 'required',
                ]);
                if (!$validation->withRequest($request)->run()) {
                        $this->session->setFlashdata("msg", '<div class="alert alert-danger alert-dismissible fade show" role="alert' . $validation->listErrors() . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> </button></div>');
                        return redirect()->to(base_url() . "/admin/admin/post_edit/" . $post_id);
                } else {
                        $data["seo_url"] = filter_var(trim($request->getPost("sugest_title")), FILTER_SANITIZE_STRING);
                        $oldUrl = filter_var(trim($request->getPost("oldUrl")), FILTER_SANITIZE_STRING);
                        $data["title"] = filter_var(trim(htmlentities($request->getPost("title"))), FILTER_SANITIZE_STRING);
                        // $data["post_id"] = filter_var(trim(htmlentities($request->getPost("post_id"))));
                        if($data['seo_url']){
                                // $checkurl = $this->blog_add_model->checkUrl($data["seo_url"],$post_id);                                
                                $checkurl = $this->blog_add_model->checkUrl_new($data, $oldUrl, $post_id);
             
                                if($checkurl == 'old'){  $this->session->setFlashdata("msg", '<div class="alert alert-danger alert-dismissible fade show" role="alert">BLOG URL already present  <button type="button" class="close" data-dismiss="alert" aria-label="Close">   <span aria-hidden="true">&times;</span> </button> </div>');                                      
                                        return redirect()->to(base_url() . "/admin/admin/post_edit/" . $post_id);
                                }else{                         
                                $data["content"] = filter_var(htmlentities($request->getPost("content")));
                                $doc = new DOMDocument;
                                @$doc->loadHTML(html_entity_decode($data['content']));  
                                $img_arr = array();   
                                $dom_result = array();
                                $img_arr['images'] = $doc->getElementsByTagName('img');
                                foreach($img_arr['images'] as $key=>$value)
                                {
                                        $img_result[] = array(
                                                'src' =>$value->getAttribute('src'),
                                                'alt' =>$value->getAttribute('alt'),
                                        );
                                }
                                $data["meta_tag"] = filter_var($request->getPost("meta_tag"), FILTER_SANITIZE_STRING);
                                $data["meta_desc"] = filter_var($request->getPost("meta_desc"), FILTER_SANITIZE_STRING);
                                $data["visibility"] = filter_var($request->getPost("visibility"), FILTER_SANITIZE_STRING);
                                $data["date_"] = filter_var($request->getPost("date_"), FILTER_SANITIZE_STRING);
                                $data["time_"] = filter_var($request->getPost("time_"), FILTER_SANITIZE_STRING);

                                if ($data["date_"]) {
                                        $data["date_"] = date("Y-m-d", strtotime($data["date_"]));
                                }
                                if ($data["time_"]) {
                                        $data["time_"] = date("H:i:s", strtotime($data["time_"]));
                                }

                                if ($this->roleId == 1) {
                                        $data["author"] = filter_var($request->getPost("author"), FILTER_SANITIZE_STRING);
                                } else {
                                        $data["author"] = $this->login;
                                }

                                $data["active"] = true;
                                $data["update_date"] = date("Y-m-d H:i:s");
                                $data["site_map"] = filter_var($request->getPost("site_map"), FILTER_SANITIZE_STRING);
                                $data["nofollow"] = filter_var($request->getPost("no_follow"), FILTER_SANITIZE_STRING);
                                $data["indexed"] = filter_var($request->getPost("no_index"), FILTER_SANITIZE_STRING);
                                $data["news_sitemap"] = filter_var($request->getPost("newssitemap"), FILTER_SANITIZE_STRING);

                                if ($request->getPost("no_follow") == "true") {
                                        $data["nofollow"] = 1;
                                } else {
                                        $data["nofollow"] = 0;
                                }

                                if ($request->getPost("no_index") == "true") {
                                        $data["indexed"] = 1;
                                } else {
                                        $data["indexed"] = 0;
                                }

                                $image = $request->getPost("image");
                                $cat = $request->getPost("cat");
                                $delete_catagory = $request->getPost("delete_catagory_list");
                                $tag = $request->getPost("keyword_list");
                                $removetag = $request->getPost("delete_keyword_list");
                                $fetch_data = $this->blog_add_model->check_update_url($data["seo_url"]);
                                $fetch_same_data = $this->blog_add_model->check_same_update_url($data["seo_url"]);

                                if ($data['seo_url'] == $oldUrl) {
                                        $data['seo_url'] = $oldUrl;
                                        if ($post_id) {
                                                if ($image) {
                                                        $res = $this->blog_add_model->uploadImage($image);
                                                        if(!empty($res[0]['id']))
                                                        {
                                                                $data['image'] = $res[0]['id'];
                                                        }
                                                }else{ $data['image'] = $request->getPost('image');}
                                                $update_data = $this->blog_add_model->update_post($post_id, $data, $removetag, $tag, $cat, $delete_catagory,$img_result='');

                                                if ($oldUrl == $data["seo_url"]) {
                                                        $olddata["post_id"] = $post_id;
                                                        $olddata["url"] = $oldUrl;
                                                        $olddata["new_url"] = $data["seo_url"];
                                                        $this->blog_add_model->keepOldUrl($olddata);
                                                }
                                                $this->session->setFlashdata("msg", '<div class="alert alert-info alert-dismissible fade show" role="alert">Post Updated successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                                        }
                                }else if (isset($fetch_data[0]['seo_url_text']) || isset($fetch_same_data[0])) {
                                        if (isset($fetch_data[0]['seo_url_text'])) {
                                                $data['seo_url_text'] = $fetch_data[0]['seo_url_text'];
                                                $data['seo_url_no'] = $fetch_data[0]['seo_url_no'] + 1;
                                                $update_things = $this->blog_add_model->update_things($data, $post_id);
                                                if ($update_things == "ok") {
                                                        $data['seo_url'] = $data['seo_url_text'] . "-" . $data['seo_url_no'];
                                                        if ($post_id) {
                                                                if ($image) {
                                                                        $res = $this->blog_add_model->uploadImage($image);
                                                                        if(!empty($res[0]['id']))
                                                                        {
                                                                                $data['image'] = $res[0]['id'];
                                                                                $img_result = $data['image'];
                                                                        }
                                                                }else{ $data['image'] = $request->getPost('image'); $img_result = $data['image'];}
                                                                $update_data = $this->blog_add_model->update_post($post_id, $data, $removetag, $tag, $cat, $delete_catagory,$img_result);
                                                                if ($oldUrl != $data["seo_url"]) {
                                                                        $olddata["post_id"] = $post_id;
                                                                        $olddata["url"] = $oldUrl;
                                                                        $olddata["new_url"] = $data["seo_url"];
                                                                        $this->blog_add_model->keepOldUrl($olddata);
                                                                }
                                                                $this->session->setFlashdata("msg", '<div class="alert alert-info alert-dismissible fade show" role="alert">Post Updated successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                                </button></div>');
                                                        }
                                                }
                                        }else {
                                                $fetch_by_url_text = $this->blog_add_model->fetch_by_url_text($fetch_same_data[0]['seo_url_text']);
                                                $new_seo_url_no = $fetch_by_url_text[0]['seo_url_no'] + 1;
                                                $data['seo_url_text'] = $fetch_same_data[0]['seo_url_text'] . "-" . $new_seo_url_no;
                                                $data['seo_url'] = $data['seo_url_text'];
                                                $data['seo_url_no'] = $fetch_same_data[0]['seo_url_no'] - count($fetch_same_data);

                                                if ($post_id) {
                                                        if ($image) {
                                                                $res = $this->blog_add_model->uploadImage($image);
                                                                if(!empty($res[0]['id']))
                                                                {
                                                                        $data['image'] = $res[0]['id'];
                                                                }
                                                        }
                                                        $update_data = $this->blog_add_model->update_post($post_id, $data, $removetag, $tag, $cat, $delete_catagory,$img_result);
                                                        if ($oldUrl != $data["seo_url"]) {
                                                                $olddata["post_id"] = $post_id;
                                                                $olddata["url"] = $oldUrl;
                                                                $olddata["new_url"] = $data["seo_url"];
                                                                $this->blog_add_model->keepOldUrl($olddata);
                                                        }
                                                        $this->session->setFlashdata("msg", '<div class="alert alert-info alert-dismissible fade show" role="alert">Post Updated successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                                                        }
                                                        }
                                
                        }else {
                                if ($post_id) {
                                        if ($image) {
                                                $res = $this->blog_add_model->uploadImage($image);
                                                if(!empty($res[0]['id']))
                                                {
                                                        $data['image'] = $res[0]['id'];
                                                        $img_result = $data['image'];
                                                }
                                        }
                                        $update_data = $this->blog_add_model->update_post($post_id, $data, $removetag, $tag, $cat, $delete_catagory,$img_result='');
                                        if ($oldUrl != $data["seo_url"]) {
                                                $olddata["post_id"] = $post_id;
                                                $olddata["url"] = $oldUrl;
                                                $olddata["new_url"] = $data["seo_url"];
                                                $this->blog_add_model->keepOldUrl($olddata);
                                        }
                                        $this->session->setFlashdata("msg", '<div class="alert alert-info alert-dismissible fade show" role="alert">Post Updated successfully                      
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button></div>');
                                         }
                                }
                        return redirect()->to(base_url() . "/admin/admin/post_edit/" . $post_id);
                        }     
                }
                }
        }

        public function image_upload($image) //$img_name
        {
                $session = session();
                $request = \Config\Services::request();
                $validation = \Config\Services::validation();
                $file = $request->getFile($image);
                if ($_FILES[$image]["error"] == 4) {
                        return 0;
                }
                $name = $file->getClientName();
                $file->move(ROOTPATH . 'assets/media-image/');
                $img["url"] = base_url() . "/assets/media-image/" . $name;
                $img["active"] = 1;
                $res = $this->blog_add_model->uploadImage($img);
                return $res;
        }

        public function trash($page = 1)
        {
                $session = session();
                $pager = \Config\Services::pager();
                if(!$this->login)
                {
                  return redirect()->to(base_url() . "/login");
                }
                $data = $this->blog_add_model->getTrash($page);              
                $data['pages'] = $this->blog_add_model->paginate(100);
                $data['pager'] = $this->blog_add_model->pager;
                $data['u_firstname'] = $session->get('f_name');

                echo view('admin/header', $data);               
                echo view('admin/sidebar');
                echo view('admin/trash', $data);      
                echo view('admin/footer');
        }
        
        public function trash_clear()
        {
                $request = \Config\Services::request();
                $delete_id = json_decode($request->getPost("delete_id"));
                $data = $this->blog_add_model->trash_clear($delete_id);
        }

        public function dashboard()
        {
                $session = session();
                if (empty($this->login)) {
                        return redirect()->to(base_url() . "/login");
                } else {

                        $data["javascripts"][] = "/assets/dist/js/jquery.flot.js";
                        $data["recent"] = $this->blog_add_model->getRecent();
                        $data["top"] = $this->blog_add_model->getTopPost();
                        $data["dailyVisit"] = $this->blog_add_model->getDailyVisit();
                        $data["totalvisit"] = $this->blog_add_model->totalvisit();
                        $data["todayview"] = $this->blog_add_model->todayview();
                        $data["bestoverall"] = $this->blog_add_model->bestoverall();
                        $data["blockedips"] = $this->blog_add_model->blockedips();
                        $data["settings"] = $this->blog_add_model->get_settings();
                        $data['u_firstname'] = $session->get('f_name');
                        $data['role_id'] = $session->get('role');
                        $data["permalink"] = getPermalink();
                                               
                        echo view('admin/dashboard', $data);
                }
        }

        public function new_page()
        {
                helper("webbuild_usable");
                $data["stylesheets"][] = "assets/richtext/richtext.min.css";
                $data["javascripts"][] = "assets/richtext/jquery.richtext.min.js";
                $count_per_page = 20;
                if(!$this->login)
                {
                    return redirect()->to(base_url() . "/login");
                }
                $data['user'] = $this->user_model->get_categorie();
                $data["img_no_page"] = $this->blog_add_model->countImgPage($count_per_page);
                $data['u_firstname'] = $this->fname;
                echo view('admin/header', $data);
                echo view('admin/sidebar');
                echo view('admin/new_page');
                echo view('admin/footer');
        }

        public function pageCreated()
        {
                $request = \Config\Services::request();
                $validation = \Config\Services::validation();
                $data["title"] = filter_var(trim($request->getPost("title")), FILTER_SANITIZE_STRING);
                $data["seo_url"] = filter_var(trim($request->getPost("sugest_title")), FILTER_SANITIZE_STRING);
                $data["seo_url_text"] = filter_var(trim($request->getPost("sugest_title")), FILTER_SANITIZE_STRING);
                $data["seo_url_no"] = "0";
                $data["content"] = filter_var(htmlentities($request->getPost("content")));
                $data["meta_tag"] = filter_var(trim($request->getPost("meta_tag")), FILTER_SANITIZE_STRING);
                $data["meta_desc"] = filter_var(trim($request->getPost("meta_desc")), FILTER_SANITIZE_STRING);
                $data["noindex"] = filter_var(trim($request->getPost("noindex")), FILTER_SANITIZE_STRING);
                $data["nofollow"] = filter_var(trim($request->getPost("nofollow")), FILTER_SANITIZE_STRING);
                $data["sitemap"] = filter_var(trim($request->getPost("sitemap")), FILTER_SANITIZE_STRING);
                $data["visibility"] = filter_var(trim($request->getPost("visibility")), FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Kolkata');
                $data["cur_date"] = date("Y-m-d H:i:A");
                $validation->setRules([
                        'title' => 'required|is_unique[pages.title]',
                ]);
                if ($validation->withRequest($request)->run()) {
                        if ($this->login) {
                                $data["author"] = $this->login;
                                $this->blog_add_model->pageCreated($data);
                                $this->session->setFlashdata("msg", '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Success</h5>
                                Post Successfully Saved
                                </div>');
                                return redirect()->to(base_url() . "/admin/new_page");
                        }
                        return redirect()->to(base_url() . "/admin/new_page");
                } else {
                        $this->session->setFlashdata("msg", $validation->listErrors());
                        return redirect()->to(base_url("admin/new_page"));
                }
        }
        public function bulkpostaction()
        {
                $request = \Config\Services::request();
                $postids = $request->getPost("bulkactionlist");
                $this->blog_add_model->bulkpostaction($postids);
                return redirect()->to(base_url() . "/admin/posts");
        }
        public function restore()
        {
                $request = \Config\Services::request();
                $restoreIds = $request->getPost("restore_id");
                $this->blog_add_model->restore($restoreIds);
        }
        public function ipblockList()
        {
                $data["ips"] = $this->blog_add_model->ipblockList();
                $data['u_firstname'] = $this->fname;
                echo view('admin/header', $data);
                echo view('admin/sidebar');
                echo view('admin/ipblocklist');
                echo view('admin/footer');
        }
        public function addIp()
        {
                $request = \Config\Services::request();
                $ip = $request->getPost("ip");
                $this->blog_add_model->addIp($ip);
                return redirect()->to(base_url() . "/admin/ipblockList");
        }
        public function removeblockIp($ip)
        {
                $this->blog_add_model->removeblockIp($ip);
                return redirect()->to(base_url() . "/admin/ipblockList");
        }
        public function imageUpload()
        {
                $request = \Config\Services::request();
                $validation = \Config\Services::validation();

                $input = $this->validate([
                        'file' => 'uploaded[file]|max_size[file,1024]|ext_in[file,jpg,jpeg]',
                ]);
                $file = $request->getFile("img");
                if ($file->isValid() && $file->hasMoved()) {
                }
                if ($file->move(ROOTPATH . 'assets/media-image')) {
                        $data = $file->getClientName();
                        $insertdata["url"] = base_url() . "/assets/media-image/" . $data;
                        $insertdata["create_date"] = date("Y-m-d H:i:s");
                        $insertdata["author"] = $this->session->get("usr");
                        $insertdata["active"] = 1;
                        $this->blog_add_model->insert_uploadImage($insertdata);
                        echo "success";
                } else {
                        echo "<span style=color:red; >" . $this->upload->display_errors() . "</span>";
                }
        }

        public function importpage()
        {
                if (!$this->login) {
                        return redirect()->to(base_url() . "/login");
                }
                else{
                        $data["files"] = glob('*.sql');
                        $data['u_firstname'] = $this->fname;
                        echo view('admin/header', $data);
                        echo view('admin/sidebar');
                        echo view('admin/importpage', $data);               
                        echo view('admin/footer');
                }
        }
      
        public function menupage()
        {
                $request = service('request');
                $data["current"] = $request->getVar("m");
                if (!$data["current"]) {
                        $data["current"] = 1;
                }
                if(!$this->login)
                {
                  return redirect()->to(base_url() . "/login");
                }
                $data["menu_list"] = $this->blog_add_model->getMenu();
                $data["page_list"] = $this->blog_add_model->pageList();
                $data["category_list"] = $this->blog_add_model->categoryList();
                $data["menu_datalist"] = $this->blog_add_model->menu_datalist($data["current"]);
                $data['u_firstname'] = $this->fname;
                echo view('admin/header', $data);
                echo view('admin/sidebar');
                echo view('admin/menupage', $data);
                echo view('admin/footer');
        }

        public function updateMenu()
        {
                $request =  \Config\Services::request();
                $menu = $request->getPost('menu');
                $page = $request->getPost('page_add');
                $custom_label = $request->getPost('labels');
                $custom_url = $request->getPost('link');
                $category = $request->getPost('category_add');
                $data["page_list"] = $this->blog_add_model->updateMenu($menu, $page, $custom_url, $custom_label, $category);
                if ($menu) {
                        return redirect()->to(base_url("/") . "/admin/admin/menupage?m=" . $menu);
                } else {
                        return redirect()->to(base_url("/") . "/admin/admin/menupage");
                }
        }
        public function deleteMenu($page = "",$link_id)
        {
                $this->blog_add_model->deleteMenu($link_id);
                redirect(base_url() . "admin/admin/menupage?m=" . $page);
        }
        public function addMainMenu()
        {
                $request =  \Config\Services::request();
                echo "<pre>";
                $menu = $request->getPost('menu_name');
                $order = $request->getPost('menu_order');
                $this->blog_add_model->addMainMenu($menu, $order);
                return redirect()->to(base_url("/") . "/admin/admin/menupage");
        }
      
        public function test()
        {
                $db = db_connect();
                $builder = $db->table("posts");
                $result = $builder->get();
                $result = $result->getResultArray();
                echo "<pre>";
                print_r($result);
        }

        public function preview($id)
        {
                $request = \Config\Services::request();
                $session = session();
                if (is_numeric($id)) {
                
                $data['date'] = $request->getPost('date');
                $data['content'] = filter_var(htmlentities($request->getPost("content")), FILTER_SANITIZE_STRING);
                
                $data['post_id'] = $id;
                $data['title'] = filter_var(htmlentities($request->getPost('title')), FILTER_SANITIZE_STRING);
                $data['seo_url'] = $request->getPost('seo_url');
                $data['author'] = $request->getPost('author');
                if(!empty($request->getPost('cat'))){
                        $data['cat_id'] = implode(",", $request->getPost('cat'));
                }else{
                        $data['cat_id'] = '';
                }                
                
                $session->set('single_preview', $id);
                $res = $this->blog_add_model->preview($id,$data);   
                echo $res;
                }
        }

        public function trash_post_delete()
        {
                $request =  \Config\Services::request();
                $data = $request->getPost('data');
                $data = explode(',', $data);
                $this->blog_add_model->trash_post_delete($data);
        }
        
        public function post_preview_insert()
        {
                $session = session();
                $data = $_POST;
                $image = $data['image'];
                $data['image'] = '';
                if(!empty($image))
                {
                        $res = $this->blog_add_model->uploadImage($image);
                        if(!empty($res[0]['id']))
                        {
                        $data['image'] = $res[0]['id'];
                        }                           
                }
                $data['author'] = $session->get('usr');
                $res = $this->blog_add_model->post_preview_insert($data);
                echo $res;
        }

        public function post_add_preview($id)
        {
                $request = \Config\Services::request();
                $session = session();
                $session->set("preview", "preview");
                $data['content'] = filter_var(htmlentities($request->getPost("content")), FILTER_SANITIZE_STRING);
                $data['date'] = $request->getPost('date');
                $data['title'] = filter_var(htmlentities($request->getPost('title')), FILTER_SANITIZE_STRING);
                $data['seo_url'] = $request->getPost('seo_url');
                $data['image'] = $request->getPost('image');
                $data['author'] = $request->getPost('author');
                if(!empty($data['image']))
                {
                        $res = $this->blog_add_model->uploadImage($data['image']);
                        if(!empty($res[0]['id']))
                        {
                        $data['image'] = $res[0]['id'];
                        }                           
                }
                $data['visibility'] = 'h';
                      $value = [
                        'title' => $data["title"],
                        'seo_url' => $data["seo_url"],
                        'content' => $data["content"],
                      ];
                $session->set('value', $value);
                
                $res = $this->blog_add_model->post_add_preview($id,$data);

        }

        public function post_add_publish($id)
        {
                $request = \Config\Services::request();
                helper(['form', 'url']);
                $tags = array();
                $session = session();
                if($session->has('value'))
                {
                   unset($_SESSION['value']);
                }
                unset($_SESSION['value']);
                $data['content'] = filter_var(htmlentities($request->getPost("content")), FILTER_SANITIZE_STRING);
                $doc = new DOMDocument;
                @$doc->loadHTML(html_entity_decode($data['content']));  
                $img_arr = array();   
                $img_arr['images'] = $doc->getElementsByTagName('image');
                
                foreach($img_arr['images'] as $key=>$value)
                {
                        $img_result[] = array(
                                'src' =>$value->getAttribute('src'),
                                'alt' =>$value->getAttribute('alt'),
                        );
                }
                $data['date_'] = $request->getPost('date_');
                $data['title'] = $request->getPost('title');
                $data['author'] = $request->getPost('author');
                $image = $request->getPost('image');              
                if(!empty($image))
                {        
                        $res = $this->blog_add_model->uploadImage($image);
                        if(!empty($res[0]['id']))
                        {
                        $data['image'] = $res[0]['id'];
                        }                           
                }
                $seo_url = $request->getPost('seo_url');
                $res = $this->blog_add_model->post_add_check_title($data['title'],$seo_url);

                $data['seo_url'] = $res;
                $data['meta_tag'] = $request->getPost('meta_tag');
                $data['meta_desc'] = $request->getPost('meta_desc');
                $data['seo_url_text'] = $data['title'];
                $data['visibility'] = 'p';
                $data['site_map'] = $request->getPost('site_map');
                $data['news_sitemap'] = $request->getPost('news_sitemap');
                $data['nofollow'] = $request->getPost('nofollow');
                $data['indexed'] = $request->getPost('indexed');
                $cat1 = $request->getPost('cat');
                $type = gettype($cat1);
                if($type == 'array'){ 
                        $data['cat'] = $cat1; 
                }else{
                        $data['cat'] = explode(",",$cat1); 
                }
                $data['tag'] = explode(",",$request->getPost('tag'));
                $res = $this->blog_add_model->post_add_the_publish($id, $data, $img_result='');
        }

        public function remove_media($id)
        {
                $res = $this->blog_add_model->remove_media($id);
                echo $res;die;
        }
        public function user_comment(){
                if(!$this->login)
                {
                  return redirect()->to(base_url() . "/login");
                }
               
                $data['setting'] = $this->blog_add_model->get_settings();
                $data['permalink'] = $this->blog_add_model->get_permalink();
                $data['old_data'] = $this->blog_add_model->get_all_user_data();
                $data['u_firstname'] = $this->fname;
                echo view('admin/header',$data);
                echo view('admin/sidebar');
                echo view('admin/user_comment');
                echo view('admin/footer');
        }
        public function checkurl()
        {
                $url = $_POST['url'];
                $id = $_POST['id'];
                $checkurl = $this->blog_add_model->checkUrl($url,$id);
                return $checkurl;
        }
        public function checkurl2()
        {
                $url = $_POST['url'];
                $id = $_POST['id'];
                $checkurl = $this->blog_add_model->checkUrl2($url,$id);
                return $checkurl;

        }
       
      
}
