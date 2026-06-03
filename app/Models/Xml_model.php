<?php
class Xml_model extends CI_Model
{
    public function get_blog()
    {

        $query = $this->db->query("SELECT posts.id,posts.seo_url,posts.title,posts.image,posts.content,posts.date_,user.user_name,user.email
        FROM posts
        INNER JOIN user ON posts.author = user.id WHERE user.user_name != 'Issuewire' AND posts.site_map='y' ORDER BY posts.id DESC");
        //$query = $this->db->query("SELECT * FROM `posts` WHERE author!=81 ORDER BY id DESC ");
        $postdata = $query->result_array();
        $posts = array();
        foreach ($postdata as $index => $post) {
            $posts[$index] = $post;
            $cats = $this->get_categorie($post['id']);
            $category_data = implode(", ", $cats);
            $posts[$index]['categorie'] = $category_data;
        }
        return $posts;
    }
    ///////////////////////////////////////////////////
    public function get_categorie($id)
    {
        $cats = array();
        $query_category =   $this->db->query("SELECT categories   FROM `post_categories` WHERE post_id=" . $id)->result_array();
        foreach ($query_category as $cat) {
            $cats[] =  $cat['categories'];
        }
        return $cats;
    }
    //////////////////////////////////////////////////////
    public function get_blog_for_sitemap()
    {
        $query = $this->db->query("SELECT * FROM `posts` WHERE active=1 AND site_map='y' ORDER BY id DESC");
        $postdata = $query->result_array();
        $posts = array();
        foreach ($postdata as $index => $post) {
            $posts[$index] = $post;
            $cats = $this->get_categorie($post['id']);
            $category_data = implode(", ", $cats);
            $posts[$index]['categorie'] = $category_data;
        }
        return $posts;
    }
    ///////////////////////////////////////////////////
    public function blog_count()
    {
        $query = $this->db->query("SELECT count(*) as count FROM `posts` WHERE `active`=1 AND visibility='p' AND site_map=1;");
        return $query->row_array();
    }
    function getPostList($page,$perpage)
    {
        $page=($page-1)*$perpage;
        $this->db->SELECT("seo_url,date_time");
        $this->db->where("active",1);
        $this->db->where("visibility","p");
        $this->db->where("site_map",1);
        $this->db->order_by("id","DESC");
        $this->db->limit($perpage,$page);
        $res = $this->db->get("posts");
        $result=$res->result_array();
      
        // foreach($result as $key=>$r){
        //     $data=$r;
        // }
        return $result;
    }
    function getPageList(){
        $this->db->SELECT("seo_url,cur_date");
        $this->db->where("visibility","p");
        $this->db->where("sitemap",1);
        $this->db->where("active",1);
        $res = $this->db->get("pages");
        $result=$res->result_array();
        return $result;
    }
    function postnews(){
        $this->db->SELECT("title,seo_url,date_,time_");
        $this->db->where("active",1);
        $this->db->where("visibility","p");
        $this->db->where("news_sitemap",1);
        // $this->db->where("site_map",1);
        // echo date("Y-m-d",strtotime("yesterday"));
        $this->db->where("date_>=","DATE_SUB(NOW(), INTERVAL 3 DAY)",false);
   
        $res = $this->db->get("posts");
        $result=$res->result_array();
        // echo $this->db->last_query();die;
        return $result;
    }
    function getSetting(){
        $this->db->where("setting_name","site_name");
        $res = $this->db->get("setting");
        $result=$res->row_array();
        return $result;
    }
    function getPermalink(){
        $this->db->where("status","active");
        $res = $this->db->get("permalink_list");
        $result=$res->row_array();
        return $result;
    }
}
