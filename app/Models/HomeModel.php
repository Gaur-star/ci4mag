<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    public $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    
    public function weather()
    {
        // $apiKey = ""; // enter api key
        // $city = "Kolkata,IN";
        // $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&APPID=" . $apiKey;
        
        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_HEADER, 0);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        // curl_setopt($ch, CURLOPT_VERBOSE, 0);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // $response = curl_exec($ch);

        // curl_close($ch);
        // $data = json_decode($response);
        // $weather = ceil($data->main->temp - 273.15);
        // return $weather;
    }
    public function site_info($col)
    {
        $sql = "SELECT `setting_value` FROM setting WHERE `setting_name` = '".$col."'";
        $query = $this->db->query($sql);
        $results = $query->getRow();
        return $results;
    }
    public function permalink()
    {
        $sql = "SELECT `linkformat` FROM permalink_list WHERE `status` = 'active'";
        $query   = $this->db->query($sql);
        $results = $query->getRow()->linkformat;
        return $results;
    }
    public function find_ads()
    {
        $sql = "SELECT * FROM adsence LIMIT 1";
        $query   = $this->db->query($sql);
        $results = $query->getRow();
        return $results;
    }
    function get_header_menu($limit)
    {
        $sql = "SELECT `categorie_id`, `categorie`, `slug`, COUNT('post_id') as post_no FROM `post_categories` as pc, `categories` as c WHERE pc.categorie_id = c.id AND c.categorie != 'unknown' AND c.categorie != 'Uncategorized' GROUP BY `categorie_id` ORDER BY `post_no` DESC LIMIT ".$limit."";
        $query = $this->db->query($sql);
        $results =  $query->getResultArray();
        return $results;
    }
    public function get_category()
    {
        $sql = "SELECT `categorie`,`slug` FROM categories WHERE `active` = 'y' AND `categorie` != 'Uncategorized' ORDER BY `categorie` ASC";
        $query   = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
    public function category_posts($id, $limit)
    {
        $sql = "SELECT p.id, p.title, p.seo_url, p.content, p.date_, m.url, m.alt_text, c.categorie, c.slug FROM posts p, media m, post_categories pc, categories c WHERE p.image = m.id AND pc.post_id = p.id AND pc.categorie_id = c.id AND p.visibility = 'p' AND p.active = '1' AND pc.categorie_id = ".$id." ORDER BY p.date_ DESC LIMIT ".$limit."";
        $query   = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
    public function all_category_posts($id, $limit, $offset)
    {
        $sql = "SELECT p.id, p.title, p.seo_url, p.content, p.date_, m.url, m.alt_text, c.categorie, c.slug FROM posts p, media m, post_categories pc, categories c WHERE p.image = m.id AND pc.post_id = p.id AND pc.categorie_id = c.id AND p.visibility = 'p' AND p.active = '1' AND pc.categorie_id = ".$id." ORDER BY p.date_ DESC LIMIT ".$limit." OFFSET ".$offset."";
        $query   = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
    public function post_count($id)
    {
        // $sql = "SELECT COUNT(id) as count FROM post_categories WHERE categorie_id = ".$id."";
        $sql = "SELECT p.id, p.title, p.seo_url, p.content, p.date_, m.url, m.alt_text, c.categorie, c.slug FROM posts p, media m, post_categories pc, categories c WHERE p.image = m.id AND pc.post_id = p.id AND pc.categorie_id = c.id AND p.visibility = 'p' AND p.active = '1' AND pc.categorie_id = ".$id."";
        $query   = $this->db->query($sql);
        $results = count($query->getResultArray());
        return $results;
    }
    public function breadcrumbs($date, $limit, $offset)
    {
        $sql = "SELECT p.id, p.title, p.seo_url, p.content, p.date_, m.url, m.alt_text, c.categorie, c.slug FROM posts p, media m, post_categories pc, categories c WHERE p.image = m.id AND pc.post_id = p.id AND pc.categorie_id = c.id AND p.visibility = 'p' AND p.active = '1' AND p.date_ LIKE '".$date."%' GROUP BY p.id ORDER BY p.date_ DESC LIMIT ".$limit." OFFSET ".$offset."";
        $query   = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
    public function breadcrumbs_count($date)
    {
        // $sql = "SELECT COUNT(id) as count FROM post_categories WHERE categorie_id = ".$id."";
        $sql = "SELECT p.id, p.title, p.seo_url, p.content, p.date_, m.url, m.alt_text, c.categorie, c.slug FROM posts p, media m, post_categories pc, categories c WHERE p.image = m.id AND pc.post_id = p.id AND pc.categorie_id = c.id AND p.visibility = 'p' AND p.active = '1' AND p.date_ LIKE '".$date."%' GROUP BY p.id";
        $query   = $this->db->query($sql);
        $results = count($query->getResultArray());
        return $results;
    }
    public function find_category_id($slug)
    {
        $sql = "SELECT `id`,`categorie`,`meta_tag` FROM categories WHERE `slug` = '".$slug."'";
        $query = $this->db->query($sql);
        $results = $query->getRow();
        return $results;
    }
    public function urlredi($id)
    {
        $sql = "SELECT p.id, p.seo_url, p.date_ FROM posts p WHERE p.id = '".$id."'";
        $query   = $this->db->query($sql);
        $results = $query->getRow();
        return $results;
    }
    public function latest_post($limit)
    {
        $sql = "SELECT p.id, p.title, p.seo_url, p.date_, p.content, m.url, m.alt_text, c.categorie, c.slug FROM posts p, media m, post_categories pc, categories c WHERE p.image = m.id AND pc.post_id = p.id AND pc.categorie_id = c.id AND p.visibility = 'p' AND p.active = '1' GROUP BY p.seo_url ORDER BY p.date_ DESC LIMIT ".$limit."";
        $query   = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
    public function popular_post($limit)
    {
        $sql = "SELECT p.id, p.title, p.seo_url, p.content, p.date_, c.categorie, c.slug, m.url, m.alt_text FROM visitor v, posts p, post_categories pc, categories c, media m WHERE v.post_id = p.id AND pc.post_id = p.id AND pc.categorie_id = c.id AND p.image = m.id AND p.visibility = 'p' AND p.active = '1' GROUP BY p.title ORDER BY v.visit DESC LIMIT ".$limit."";
        $query   = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
    public function trendy_post($limit)
    {
        $sql = "SELECT p.id, p.title, p.seo_url, p.date_, p.content, m.url, m.alt_text, c.categorie, c.slug, count(pc.categorie_id) as cat_no FROM posts p, media m, post_categories pc, categories c WHERE p.image = m.id AND pc.post_id = p.id AND pc.categorie_id = c.id AND p.visibility = 'p' AND p.active = '1' GROUP BY post_id ORDER BY `cat_no` DESC LIMIT ".$limit."";
        $query   = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
    public function single_post($id)
    {
        $sql = "SELECT p.*, m.url, m.alt_text, u.f_name, u.l_name FROM posts p, media m, user u WHERE p.image = m.id AND p.author = u.uid AND p.id = ".$id."";
        $query   = $this->db->query($sql);
        $results = $query->getRow();
        return $results;
    }
    public function single_post_category($id)
    {
        $sql = "SELECT pc.*,c.categorie,c.slug FROM post_categories as pc, categories as c WHERE pc.categorie_id = c.id AND post_id = ".$id."";
        $query   = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
    public function single_post_keywords($id)
    {
        $sql = "SELECT pk.keyword FROM post_keywords as pk WHERE pk.post_id = ".$id."";
        $query   = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
    public function related_post($id,$limit)
    {
        $sql = "SELECT * FROM `post_categories` WHERE `post_id` = ".$id."";
        $query   = $this->db->query($sql);
        $cat_id = $query->getRow();
        if(empty($cat_id)){
            $cat_id = 1;
        }else{
            $cat_id = $cat_id->categorie_id;
        }
        $sql = "SELECT p.id, p.title, p.seo_url, p.content, p.date_, m.url, m.alt_text, c.categorie, c.slug FROM posts p, media m, post_categories pc, categories c WHERE p.id != ".$id." AND p.image = m.id AND pc.post_id = p.id AND pc.categorie_id = c.id AND pc.categorie_id = ".$cat_id." AND p.visibility = 'p' AND p.active = '1' ORDER BY p.date_ DESC LIMIT ".$limit."";
        $query   = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
    public function more_post($limit)
    {
        $sql = "SELECT COUNT(id) as no FROM `posts` WHERE visibility = 'p'";
        $query   = $this->db->query($sql);
        $no = $query->getRow()->no;
        $offset = rand(1,$no);
        $sql1 = "SELECT `id`,`title`,`seo_url`,`date_` FROM `posts` WHERE visibility = 'p' AND active = '1' LIMIT ".$limit." OFFSET ".$offset."";
        $query1   = $this->db->query($sql1);
        $results = $query1->getResultArray();
        return $results;
    }
    public function get_next_url($id)
    {
        $sql = "SELECT `title`,`seo_url`,`date_` FROM `posts` WHERE `id` = (SELECT min(id) FROM `posts` WHERE `id` > ".$id." AND `visibility` = 'p' AND `active` = '1')";
        $query   = $this->db->query($sql);
        $results = $query->getRow();
        return $results;
    }
    public function get_prev_url($id)
    {
        $sql = "SELECT `title`,`seo_url`,`date_` FROM `posts` WHERE `id` = (SELECT max(id) FROM `posts` WHERE `id` < ".$id." AND `visibility` = 'p' AND `active` = '1')";
        $query   = $this->db->query($sql);
        $results = $query->getRow();
        return $results;
    }
    public function find_titla($title)
    {
        $sql = "SELECT `title`, `seo_url`, `date_` FROM `posts` WHERE `title` LIKE '".$title."%' LIMIT 10";
        $query   = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
    public function single_page($id)
    {
        $sql = "SELECT p.* FROM pages p WHERE p.visibility = 'p' AND p.id = ".$id."";
        $query   = $this->db->query($sql);
        $results = $query->getRow();
        return $results;
    }
    public function insert_form($data)
    {
        $this->db->table('comments')->insert($data);
    }
    public function preview_post($id)
    {
        $sql = "SELECT * FROM posts WHERE id = ".$id."";
        $query   = $this->db->query($sql);
        $results = $query->getRow();
        return $results;
    }
    public function preview_media($id)
    {
        $sql = "SELECT * FROM posts WHERE id = ".$id."";
        $query   = $this->db->query($sql);
        $results = $query->getRow();
        $sql1 = "SELECT * FROM media WHERE id = ".$results->image."";
        $query1   = $this->db->query($sql1);
        $results1 = $query1->getRow();
        return $results1;
    }
    public function preview_category($id)
    {
        $sql = "SELECT pc.*,c.categorie,c.slug FROM post_categories as pc, categories as c WHERE pc.categorie_id = c.id AND post_id = ".$id."";
        $query   = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
    public function preview_keywords($id)
    {
        $sql = "SELECT pk.keyword FROM post_keywords as pk WHERE pk.post_id = ".$id."";
        $query   = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
    public function visit_count($id)
    {
        $sql = "SELECT * FROM visitor WHERE post_id = ".$id."";
        $query   = $this->db->query($sql);
        $results = $query->getRow();
        if(empty($results)){
            $data = [
                'post_id' => $id,
                'visit'  => 1,
                'date'  => date("Y-m-d"),
            ];
            $this->db->table('visitor')->insert($data);
        }else{
            $data = [
                'post_id' => $id,
                'visit'  => $results->visit + 1,
                'date'  => date("Y-m-d"),
            ];
            $this->db->table('visitor')->where('visit_id',$results->visit_id)->update($data);
        }
    }
}
