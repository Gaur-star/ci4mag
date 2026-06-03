<?php
namespace App\Models;

use CodeIgniter\Model;

class Front_model extends Model
{
  protected $table   = 'posts';

  function getSetting()
  {
    $builder = $this->db->table('setting');
    $res = $builder->get();
    return $res->getResultArray();
  }

  function getCategory()
  {
    $builder = $this->db->table("categories");
    $builder->where("active", "y");
    $res = $builder->get();
    return $res->getResultArray();
  }

  function getPageLink()
  {
    $builder = $this->db->table('pages');
    $builder->select('id,title,seo_url');
    $builder->where("visibility", "p");
    $builder->where("active", 1);
    $res = $builder->get();
    return $res->getResultArray();
  }
  

  function getNews($page, $limit, $cat)
  {
    $builder = $this->db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();
    $page = ($page - 1) * $limit;
    $builder = $this->db->table('posts');
    $builder->select("posts.id,posts.title,posts.seo_url,posts.image,posts.date_,posts.update_date, posts.time_,
    posts.date_time,media.url,media.alt_text,media.bucket,media.region,media.aws_path,media.attachment_metadata");
    $builder->join("media", "media.id=posts.image", "left");
    $builder->where("posts.visibility", "p");
    $builder->where("posts.active", "1"); 
    $builder->orderBy("posts.date_time", "DESC");
    $builder->groupBy("posts.id");
    $builder->limit($limit, $page);
    $res = $builder->get()->getResultArray();

    $data = array();
    $i = 0;
    foreach ($res as $news)
    {
      $imgmeta = "";
      $imglink = "";
      $thumb = "";
      $data[$i] = $news;
      if ($perma) {
        if ($perma["linkformat"]) {
          $d = $news['date_'];
          $d_create = date_create($d);
          $date = date_format($d_create,$perma["linkformat"]);
          $go_to = $date."/".$news["seo_url"];
        } else {
          $go_to = $news["seo_url"];
        }
      } else {
        $go_to = $news["seo_url"];
      }
      
      if ($news["attachment_metadata"]) {
        $imgmeta = unserialize($news["attachment_metadata"]);

        if (isset($imgmeta["sizes"]["thumbnail"]["file"])) {
          $thumbnail = $imgmeta["sizes"]["thumbnail"]["file"];
        }

        if ($news['aws_path']) {
          $imglink = $news['aws_path'];
          if ($thumbnail) {
            $thumb =  $news['aws_path'];
          } else {
            $thumb = $imglink;
          }
        } else {
          $imglink = $news['url'];

          if ($thumbnail) {
            $thumb = $news['url'];
            $thmb = explode("/", $news['url']);
            array_pop($thmb);
            array_push($thmb, $thumbnail);
            $thumb = implode("/", $thmb);
          } else {
            $thumb = $imglink;
          }
        }
      }


      $builder = $this->db->table('post_categories');
      $builder->select('*');
      $builder->where("post_id", $news['id']);
      $result = $builder->get();
      $rest = $result->getResultArray();      
      $p_ids = array();
      foreach($rest as $re){
        $p_ids[] = $re['categorie_id'];
      }
      $rest1 = array();
      foreach($p_ids as $r){
        $builder = $this->db->table('categories');
        $builder->select('categorie');
        $builder->where("id", $r);
        $result = $builder->get();
        $rest1[] = $result->getResultArray();      }
      $cat = array();
      foreach($rest1 as $res)      {
        $cat[] = $res[0]['categorie'];
      }
      
      $data[$i]['seo_url'] = $go_to;
      $data[$i]['image'] = $imglink;
      $data[$i]['thumb'] = $thumb;
      $data[$i]['cat'] = $cat;

      $i++;
    }

    return $data;
  }

  function updated_featuredimage($id)
  { 
    $db = db_connect();
    $sql = "SELECT `image` FROM `posts` WHERE `id`=".$id;
    $query = $db->query($sql);
    $img_id =  $query->getRowArray();

    if(!empty($img_id))
    {
      $sqli = "SELECT `url`,`alt_text` FROM `media` WHERE `id`='{$img_id['image']}'";
      $query = $db->query($sqli);
      $res =  $query->getRowArray();
      return $res;
    }
  }

  function getPopularNews($limit)
  { 
    $builder = $this->db->table('permalink_list');
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();
    
    $sql = "SELECT DISTINCT(posts.id), `posts`.`title`, `posts`.`seo_url`,`posts`.`date_`,`posts`.`image`, `media`.`url` as `media_url`, 
    `media`.`alt_text`, `media`.`bucket`, `media`.`region`, `media`.`aws_path`, `media`.`attachment_metadata` 
    FROM `posts` LEFT JOIN `media` ON `media`.`id`=`posts`.`image` JOIN `visitor` ON `visitor`.`post_id`=`posts`.`id` 
    WHERE `posts`.`visibility` = 'p' AND `posts`.`active` = '1' ORDER BY `visit` DESC LIMIT $limit";
    $query = $this->db->query($sql);
    $res = $query->getResultArray();
    $data = array();
    $i = 0;
    foreach ($res as $news) {
      $imgmeta = "";
      $imglink = "";
      $thumb = "";
      $data[$i] = $news;

      if ($perma) {
        if ($perma["linkformat"]) {
          $d = $news['date_'];
          $d_create = date_create($d);
          $date = date_format($d_create,$perma["linkformat"]);
          $go_to = $date."/".$news["seo_url"];
        } else {
          $go_to = $news["seo_url"];
        }
      } else {
        $go_to = $news["seo_url"];
      }
      $data[$i]['seo_url'] = $go_to;
      $imglink = "";
      if ($news["attachment_metadata"]) {
        $imgmeta = unserialize($news["attachment_metadata"]);  

        if (isset($imgmeta["sizes"]["thumbnail"]["file"])) {
          $thumbnail = $imgmeta["sizes"]["thumbnail"]["file"];
        }

        if ($news['aws_path']) {
          $imglink = "https://" . $news['bucket'] . ".s3." . $news['region'] . ".amazonaws.com/" . $news['aws_path'];
          if ($thumbnail) {
            $thmb = explode("/", $news['aws_path']);
            array_pop($thmb);
            array_push($thmb, $thumbnail);
            $thumb = "https://" . $news['bucket'] . ".s3." . $news['region'] . ".amazonaws.com/" .  implode("/", $thmb);
          } else {
            $thumb = $imglink;
          }
        } else {
          $imglink = $news['media_url'];

          if ($thumbnail) {
            $thumb = $news['media_url'];
            $thmb = explode("/", $news['media_url']);
            array_pop($thmb);
            array_push($thmb, $thumbnail);
            $thumb = implode("/", $thmb);
          } else {
            $thumb = $imglink;
          }
        }
      }
      $data[$i]['image'] = $imglink;
      $data[$i]['thumb'] = $thumb;
      $i++;
    }

    return $data;
  }

  function getHomepageCat()
  {
    $builder =$this->db->table("cat_homepage");
    $builder->where("cat_homepage.status", 1);
    $builder->join("categories", "categories.id=cat_homepage.category_id");
    $res = $builder->get();
    return $res->getResultArray();
  }

  function getPage($id)
  {
    $builder = $this->db->table("pages");
    $builder->where("id", $id);
    $res = $builder->get();
    return $res->getRowArray();
  }

  public function single_post_preview($nid)
  {
    $id = $nid;
    $builder = $this->db->table("postPreview");
    $builder->select("postPreview.*, user.f_name");
    $builder->where("post_id", $id);
    $builder->join("user", "user.uid=postPreview.author", "left");
    $re = $builder->get()->getRowArray();

    $rest = explode(",", $re['post_categories']);
    $rest1 = array();
    foreach($rest as $r){
      $builder = $this->db->table('categories');
      $builder->select('categorie');
      $builder->where("id", $r);
      $result = $builder->get();
      $rest1[] = $result->getRowArray();      
    }
    foreach($rest1 as $res)      {
      $cat[] = $res['categorie'];
    } 

    $res['post_id']  = $re['post_id'];
    $res['title']  = $re['title'];
    $res['content']  = $re['content'];
    $res['seo_url']  = $re['seo_url'];
    $res['date_']  = $re['date_'];
    $res['f_name'] = $re['f_name'];;
    $res['post_tags'] = $cat;
    $res['keyword'] = $this->post_keyword($re['post_id']);
    $res['tags'] = '';
    $res['matico'] = 'n';
    
    return $res;
  }

  public function getSingleNews($id)
  {
    $builder = $this->db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();

    $builder = $this->db->table('posts');
    $builder->select("posts.*, user.f_name");
    $builder->where("posts.id", $id);
    $builder->join("user", "user.uid=posts.author", "left");

    $res = $builder->get();
    $this->visitorUpdate($id);
    $data = $res->getRowArray();
    $str =  trim($data["content"]);
    $builder = $this->db->table('post_categories');
    $builder->select('*');
    $builder->where("post_id", $id);
    $result = $builder->get();
    $rest = $result->getResultArray();      
    $p_ids = array();
    foreach($rest as $re){
      $p_ids[] = $re['categorie_id'];
    }
    $rest1 = array();
    foreach($p_ids as $r){
      $builder = $this->db->table('categories');
      $builder->select('categorie');
      $builder->where("id", $r);
      $result = $builder->get();
      $rest1[] = $result->getResultArray();      }
    $cat = array();
    foreach($rest1 as $res)      {
      $cat[] = $res[0]['categorie'];
    } 

    $data['seo_url'] = date($perma["linkformat"]) . "/" . $data['seo_url'];
    $data['date_'] = date('Y-m-d', strtotime($data['date_']));
    $data['time_'] = date('H-i-s', strtotime($data['time_']));
    $data['title'] = $data['title'];
    $data['tags'] = '';
    $data['post_tags'] = $cat;
    $data['keyword'] = $this->post_keyword($id);
    return $data;
  }

  public function getSingleNews1($title){
   
    $builder = $this->db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();

    $builder = $this->db->table('posts');
    $builder->select("posts.*, user.f_name");
    $builder->like("posts.title", trim($title), "both");
    $builder->orlike("posts.seo_url", trim($title), "both");
    $builder->join("user", "user.uid=posts.author", "left");

    $res = $builder->get();
    
    $data = $res->getRowArray();
 
    $id = $data['id'];
    $this->visitorUpdate($id);
    $str =  trim($data["content"]);

    $builder = $this->db->table('post_categories');
    $builder->select('*');
    $builder->where("post_id", $id);
    $result = $builder->get();
    $rest = $result->getResultArray();    
 
    $p_ids = array();
    foreach($rest as $re){
      $p_ids[] = $re['categorie_id'];
    }
    $rest1 = array();
    foreach($p_ids as $r){
      $builder = $this->db->table('categories');
      $builder->select('categorie');
      $builder->where("id", $r);
      $result = $builder->get();
      $rest1[] = $result->getResultArray();      }
    $cat = array();
    foreach($rest1 as $res)      {
      $cat[] = $res[0]['categorie'];
    }  

    $data['seo_url'] = date($perma["linkformat"]) . "/" . $data['seo_url'];
    $data['date_'] = date('Y-m-d', strtotime($data['date_']));
    $data['time_'] = date('H-i-s', strtotime($data['time_']));
    $data['title'] = $data['title'];
    $data['tags'] = '';
    $data['post_tags'] = $cat;
    $data['keyword'] = $this->post_keyword($id);

    return $data;
  }

  public function getSingleNews2(){
    $builder = $this->db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();

    $builder = $this->db->table('posts');
    $builder->select("posts.*, user.f_name");
    $builder->like("posts.title", trim($title), "both");
    $builder->orlike("posts.seo_url", trim($title), "both");
    // ------------------------------------------------------------
      // $sql = array('0'); // Stop errors when $words is empty

      // foreach($words as $word){
      //     $sql[] = 'name LIKE %'.$word.'%'
      // }

      // $sql = 'SELECT * FROM users WHERE '.implode(" OR ", $sql);
    // ------------------------------------------------------------
    $builder->join("user", "user.uid=posts.author", "left");

    $res = $builder->get();
    
    $data = $res->getRowArray();
 
    $id = $data['id'];
    $this->visitorUpdate($id);
    $str =  trim($data["content"]);

    $builder = $this->db->table('post_categories');
    $builder->select('*');
    $builder->where("post_id", $id);
    $result = $builder->get();
    $rest = $result->getResultArray();    
 
    $p_ids = array();
    foreach($rest as $re){
      $p_ids[] = $re['categorie_id'];
    }
    $rest1 = array();
    foreach($p_ids as $r){
      $builder = $this->db->table('categories');
      $builder->select('categorie');
      $builder->where("id", $r);
      $result = $builder->get();
      $rest1[] = $result->getResultArray();      }
    $cat = array();
    foreach($rest1 as $res)      {
      $cat[] = $res[0]['categorie'];
    }  

    $data['seo_url'] = date($perma["linkformat"]) . "/" . $data['seo_url'];
    $data['date_'] = date('Y-m-d', strtotime($data['date_']));
    $data['time_'] = date('H-i-s', strtotime($data['time_']));
    $data['title'] = $data['title'];
    $data['tags'] = '';
    $data['post_tags'] = $cat;
    $data['keyword'] = $this->post_keyword($id);

    return $data;
  }

  public function post_keyword($id)
  {
    $db = db_connect();
    $sql = "SELECT `keyword` FROM `post_keywords` WHERE `post_id`=".$id;
    $query = $db->query($sql);
    return $query->getResultArray();
  }

  public function visitorUpdate($id)
  {
    $db = db_connect();
    $sql = "SELECT * FROM visitor ";
    $sql.= "WHERE post_id = " . $id . " ";
    $sql.= "AND date = '" . date("Y-m-d") . "' ";
    $query = $db->query($sql);

    if ($db->affectedRows() > 0) {
      $sql = "UPDATE visitor SET visit=visit+1 WHERE post_id=" . $id . " AND date='" . date("Y-m-d") . "'";
      $this->db->query($sql);
      return;
    } else {
      $builder = $this->db->table('visitor');
      $builder->insert(array("post_id" => $id, "visit" => 1, "date" => date("Y-m-d")));
      return;
    }

  }
  
  function getRelatedPost($id, $limit, $rand)
  {
    $builder = $this->db->table('permalink_list');
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();
    
    $relatedPost = array();
    $builder = $this->db->table("post_categories");
    $builder->select("categorie_id");
    $builder->where("post_id", $id);
    $res = $builder->get();
    $postcat = [];
    $rela = array();
    foreach ($res->getResultArray() as $cat) {
      $postcat[] = $cat["categorie_id"];
    }

    if ($postcat) {
  
      $builder = $this->db->table("posts");
      $builder->select("posts.id,posts.title,posts.seo_url,posts.date_,posts.image,posts.update_date");
      $builder->join("post_categories", "post_categories.post_id=posts.id");    
      $builder->where("post_categories.categorie_id", $postcat[0]);
      $builder->limit($limit);
      $builder->orderBy('posts.id', "DESC");

      if ($rand) {
        $builder->orderBy('rand()');
      } else {
        $builder->orderBy('posts.id', "DESC");
      }

      $relatedPost = $builder->get()->getResultArray();

      $i = 0;

      foreach ($relatedPost as $related) {
        $sql = "SELECT `url` FROM `media` WHERE `id` = '{$related["image"]}'";
        $url = $this->db->query($sql)->getResultArray();

        $rela[$i]["title"] = $related["title"];
        $rela[$i]["date"] = $related['date_'];
        $rela[$i]["update_date"] = $related['update_date'];
   
        if ($perma) {
          if ($perma["linkformat"]) {

            $d = $related['date_'];
            $d_create = date_create($d);
            $date = date_format($d_create,$perma["linkformat"]);

            $go_to = $date."/".$related["seo_url"];
          } else {
            $go_to = $related['seo_url'];
          }
        } else {
          $go_to = $related['seo_url'];
        }
        $rela[$i]["seo_url"] = $go_to;
        
        if(!empty($url[0]))
        {
          $rela[$i]["url"] = $url[0]['url'];
        }else{
          $rela[$i]["url"] = base_url("/assets/setting-image/spindigit_default.jpg");
        }

        $i++;
      }
    }
    
    return $rela;
  }

  function getTopcat()
  {
    $builder = $this->db->table('post_categories');
    $builder->select("post_categories.*,count(post_categories.id) as sum,categories.categorie");
    $builder->where("categories.slug!=", "uncategorized");
    $builder->join("categories", "post_categories.categorie_id=categories.id");
    $builder->groupBy("categories.id");
    $builder->limit(3);
    $res = $builder->get();
    return $res->getResultArray();
  }

  function getMenu($menu_ord)
  {
    $builder = $this->db->table('menu_list as ml');
    $builder->select("ml.label,ml.custom_link,pg.title,pg.seo_url,ct.slug");
    $builder->where("m.menu_order", $menu_ord);
    $builder->join("pages as pg", "pg.id=ml.page", "LEFT");
    $builder->join("categories as ct", "ml.category_id=ct.id", "LEFT");
    $builder->join("menu as m", "m.menu_order=ml.menu_id");
    $res = $builder->get();
    $i = 0;
    $data = array();

    foreach ($res->getResultArray() as $menu) {
      $data[$i]["label"] = $menu["label"];
      if (!empty($menu["custom_link"])) {
        $data[$i]["link"] = $menu["custom_link"];
      }
      if (!empty($menu["seo_url"])) {
        $data[$i]["link"] = base_url() . $menu["seo_url"];
      }
      if (!empty($menu["slug"])) {
        $data[$i]["link"] = base_url() . $menu["slug"];
      }
      $i++;
    }

    return $data;
  }

  function getTags($post_id)
  {
    $builder = $this->db->table('post_keywords');
    $builder->where("post_id", $post_id);
    $res = $builder->get();
    return $res->getResultArray();
  }

  function old_url($data)
  {
    $builder=$this->db->table('pastUrl');
    $builder->select("url,new_url");
    $builder->where("new_url",$data);
    $res = $builder->get();
    return $res->getResultArray();

  }   

  function post_count()
  {
    $sql = "SELECT * FROM `posts` ORDER BY `id` DESC";
    $res = $this->db->query($sql);
    $result = $res->getResultArray();
    return $result;
  }

  function pages_count()
  {
    $sql = "SELECT * FROM `pages` ORDER BY `id` ASC";
    $res = $this->db->query($sql);
    $result = $res->getResultArray();
    return $result;
  }

  function fetch_all_pages()
  {
    $builder = $this->db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();
    
    $sql="SELECT `title`,`seo_url`,`date_time`,`date_`,`image` FROM `posts` WHERE `title` IS NOT NULL AND `seo_url` IS NOT NULL AND `site_map`=1 AND `visibility`='p' ORDER BY `id` DESC LIMIT ".$offset.",100 ";
    $res = $this->db->query($sql);
    $post_img_arr = $res->getResultArray();
 
    foreach($post_img_arr as $key=>$value)
    {
     if(!empty($value['image']))
     {
      $sql = "SELECT `alt_text`,`url` FROM `media` WHERE `id`=".$value['image'];
      $img = $this->db->query($sql);      
      $the_post['images'] = $img->getResultArray();
     }

      $d = $value['date_'];
      $d_create = date_create($d);
      $date = date_format($d_create,$perma["linkformat"]);
      $the_post['url'] = $date . "/" . $value['seo_url'];
      $post_img_arr[$key]['all_post'] = $the_post;
    }

    return $post_img_arr;
  }

  function fetch_all_post($offset)
  {
   $offset = $offset;

    $builder = $this->db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();
    
    $sql="SELECT `title`,`seo_url`,`date_time`,`date_`,`image` FROM `posts` WHERE `title` IS NOT NULL AND `seo_url` IS NOT NULL AND `site_map`=1 AND `visibility`='p' ORDER BY `id` ASC LIMIT ".$offset.",100 ";
    $res = $this->db->query($sql);
    $post_img_arr = $res->getResultArray();

    foreach($post_img_arr as $key=>$value)
    {
     if(!empty($value['image']))
     {
      $sql = "SELECT `alt_text`,`url` FROM `media` WHERE `id`=".$value['image'];
      $img = $this->db->query($sql);      
      $the_post['images'] = $img->getResultArray();
     }
      $d = $value['date_'];
      $d_create = date_create($d);
      $date = date_format($d_create,$perma["linkformat"]);
      $the_post['url'] = $date . "/" . $value['seo_url'];
      $post_img_arr[$key]['all_post'] = $the_post;
    }
    return array_reverse($post_img_arr);
  }

  function fetch_the_post()
  {
    $builder = $this->db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();

    $sql="SELECT * FROM `posts` ORDER BY RAND() LIMIT 10";
    $res = $this->db->query($sql);
    $post_img_arr = $res->getResultArray();
    
    foreach($post_img_arr as $key=>$value)
    {
        $the_post=array();
        $sql = "SELECT `categorie_id` FROM `post_categories` WHERE `post_id`='{$value["id"]}'";
        $cat_id = $this->db->query($sql)->getResultArray();
        foreach($cat_id as $k=>$v)
        {
            $sql = "SELECT `categorie`,`slug` FROM `categories` WHERE `id`='{$v["categorie_id"]}'";
            $cat_id[$k]['cat'] = $this->db->query($sql)->getResultArray();
        }

        $sql = "SELECT `url` FROM `media` WHERE `id`='{$value["image"]}'";
        $path = $this->db->query($sql)->getResultArray();
        if(isset($path[0]))
        {
            $the_post['path'] = $path[0];
        }else{
            $the_post['path']['url'] = base_url("/assets/setting-image/spindigit_default.jpg");
        }

        $the_post['the_category'] = $cat_id;
        $d = $value['date_'];
        $d_create = date_create($d);
        $date = date_format($d_create,$perma["linkformat"]);
        $the_post['url'] = $date . "/" . $value['seo_url'];
        $post_img_arr[$key]['fetch_post'] = $the_post; 
    }

    return $post_img_arr; 
  }

    function get_tech_post_old()
    {
        $builder = $this->db->table("permalink_list");
        $builder->where("status", "active");
        $res = $builder->get();
        $perma = $res->getRowArray();

        $sql="SELECT `post_id` FROM `post_categories` WHERE `categorie_id`=116 ORDER BY RAND() LIMIT 10";
        $res = $this->db->query($sql);
        $tech_all_post = $res->getResultArray();

        foreach($tech_all_post as $key=>$value)
        {
            $sql = "SELECT `categorie_id` FROM `post_categories` WHERE `post_id`='{$value["post_id"]}'";
            $post_cat = $this->db->query($sql)->getResultArray();
            $cat_id = array();
        foreach($post_cat as $k=>$v)
        {
            $sql = "SELECT `categorie`,`slug` FROM `categories` WHERE `id`='{$v["categorie_id"]}'";
            $cat_id[$k]['cat'] = $this->db->query($sql)->getResultArray();
        }

        $sql = "SELECT * FROM `posts` WHERE `id`='{$value["post_id"]}' ORDER BY `date_` DESC";
        $all_posts = $this->db->query($sql)->getResultArray();
        if(!empty($all_posts))
        {
            $tech_post['post_data'] = $all_posts;


            $tech_post = array();
            $tech_post['the_category'] = $cat_id;
            $tech_post['post_data'] = $all_posts[0];
            $sql = "SELECT `url` FROM `media` WHERE `id`='{$all_posts[0]["image"]}'";
            $path = $this->db->query($sql)->getResultArray();
            $tech_post['tech_path'] = $path;

            $d = $all_posts[0]["date_"];
            $d_create = date_create($d);
            $date = date_format($d_create,$perma["linkformat"]);

            $tech_post['tech_url'] = $date . "/" . $all_posts[0]["seo_url"];
            $tech_all_post[$key]['all_tech_post'] = $tech_post;
        }
        
        }
        echo "<pre>";
        print_r($tech_all_post);
        die;
        return $tech_all_post;
    }

    // function get_tech_post()           old function 
    // {
    //   $builder = $this->db->table("permalink_list");
    //   $builder->where("status", "active");
    //   $res = $builder->get();
    //   $perma = $res->getRowArray();
           
    //   $sql = "SELECT `post_categories`.`post_id` FROM `posts`, `post_categories` WHERE `post_categories`.`post_id` = `posts`.`id` AND `posts`.`visibility` = 'p' ORDER BY 'id'";
    //   $res = $this->db->query($sql);
    //   $tech_post_id_arr = $res->getResultArray();

    //   $post_ids_arr = array();

    //   foreach( $tech_post_id_arr as $data ) {
    //     $post_ids_arr[] = $data['post_id'];
    //   }

    //   $imploded_post_ids = implode(',', $post_ids_arr);

    //   $sql="SELECT `post_id`, `categorie_id` FROM `post_categories` WHERE `post_id` IN ( {$imploded_post_ids} )";
    //   $tech_all_post = $this->db->query($sql)->getResultArray();

    //   // storing all categories :----

    //   $sql = "SELECT  `id`, `categorie`,`slug` FROM `categories` WHERE `active` = 'y' ";
    //   $all_categories_raw = $this->db->query($sql)->getResultArray();
    //   // modifying category
    //   $all_categories = array();

    //   foreach( $all_categories_raw as $category ) {
    //     $all_categories[ $category['id'] ] = array(
    //       'categorie' => $category['categorie'],
    //       'slug' => $category['slug']
    //     );
    //   }
      
    //   // storing all categories

    //   // cat array according to post id :---

    //   $all_cat_arr_acc_to_post_id = array();

    //   foreach( $tech_all_post as $this_tech_post ) {
    //     if( empty( $all_cat_arr_acc_to_post_id[ $this_tech_post['post_id'] ] ) ) {
    //       $all_cat_arr_acc_to_post_id[ $this_tech_post['post_id'] ] = array();
    //     }
    //     $all_cat_arr_acc_to_post_id[ $this_tech_post['post_id'] ][] = array(
    //       'cat' => array(
    //           array(
    //             'categorie' => $all_categories[ $this_tech_post['categorie_id'] ]['categorie'],
    //             'slug' => $all_categories[ $this_tech_post['categorie_id'] ]['slug']
    //         )
    //       )
    //     );
    //   }

    //   // cat array according to post id

    //   // fetching post all details :--

    //   $sql = "SELECT 
    //             `posts`.*, 
    //             `media`.`url`
    //           FROM 
    //             `posts`
    //           LEFT JOIN 
    //             `media`
    //           ON 
    //             `media`.`id` = `posts`.`image`
    //           WHERE 
    //             `posts`.`id` IN ( {$imploded_post_ids} ) 
    //           ORDER BY `date_` DESC ";


    //   $all_tech_post = $this->db->query($sql)->getResultArray();

    //   // fetching post all details :--

    //   // formatting $final_tech_post array :---
    //   $final_tech_post = array();
    //   foreach( $all_tech_post as $post ) {
    //     $formatted_post = array();
        
    //     $formatted_post['post_id'] = $post['id'];
    //     $formatted_post['all_tech_post'] = array(
    //       'the_category' => $all_cat_arr_acc_to_post_id[ $post['id'] ]
    //     );
    //     $formatted_post['all_tech_post']['tech_path'] = array(
    //       array(
    //         'url' => $post['url']
    //       )
    //     );
    //     unset($post['url']);
    //     $formatted_post['all_tech_post']['post_data'] = $post;
    //     $date = date_format(date_create($post['date_']), $perma["linkformat"]);
    //     $formatted_post['all_tech_post']['tech_url'] = $date . "/" . $post["seo_url"];

    //     $final_tech_post[] = $formatted_post;
    //   }      
    //   // formatting $final_tech_post array

    //   // echo "<pre>";
    //   // print_r($final_tech_post);die;
    //   return $final_tech_post;
    // }


    function get_tech_post($limit)
    {
  
    //   $sql="SELECT `post_id` FROM `post_categories` WHERE `categorie_id`=116 ORDER BY `id` DESC";
    //   $res = $this->db->query($sql);
    //   $tech_all_post2 = $res->getResultArray();
    //   foreach($tech_all_post2 as $techie){
    //     $techs[] = $techie['post_id'];
    //   }

    //   $sql_ids = "SELECT id FROM posts";
    //   $all_ids = $this->db->query($sql_ids)->getResultArray();
    //   foreach($all_ids as $idss){
    //     $ids[] = $idss['id'];
    //   }

    //   $result12 = array_intersect($techs, $ids);
    //   // print_r($result);
    //   // echo "<pre>";
    //   // print_r($ids);
    //   // die;
    //   foreach($result12 as $value)
    //   {
        

    //       $sql = "SELECT `categorie_id` FROM `post_categories` WHERE `post_id`='{$value}'";
    //       $post_cat = $this->db->query($sql)->getResultArray();
          
    //         foreach($post_cat as $k=>$v)
    //         {
    //           $sqli = "SELECT `categorie`,`slug` FROM `categories` WHERE `id`='{$v["categorie_id"]}'";
    //           $cat_id[$k]['cat'] = $this->db->query($sqli)->getResultArray();
    //         }

    //       $sql1 = "SELECT * FROM `posts` WHERE `id`='{$value}' ORDER BY `date_` DESC";
    //       $all_posts = $this->db->query($sql1)->getResultArray();
    //       $tech_post['post_data'] = $all_posts;

    //       $tech_post = array();
    //       if(!empty($all_posts[0]))
    //       {
    //         $tech_post['post_data'] = $all_posts[0];
    //       }

    //       $tech_post['the_category'] = $cat_id;
    //       if(!empty($all_posts[0]["image"])){
    //         $sql = "SELECT `url` FROM `media` WHERE `id`='{$all_posts[0]["image"]}'";
    //         $path = $this->db->query($sql)->getResultArray();
    //       }
    //       else{
    //         $path[0]['url'] = base_url("/assets/setting-image/spindigit_default.jpg");
    //       }          
         
    //       $tech_post['tech_path'] = $path;

    //       if(!empty($all_posts[0]["date_"]))
    //       {
    //         $d = $all_posts[0]["date_"];
    //       }else{
    //         $d = date("y.m.d");
    //       }

    //       $d_create = date_create($d);
    //       $date = date_format($d_create,$perma["linkformat"]);

    //       if(!empty($all_posts[0]["seo_url"])){
    //         $tech_post['tech_url'] = $date . "/" . $all_posts[0]["seo_url"];
    //       }        

    //     $tech_all_post[]['all_tech_post'] = $tech_post;        
      
    // }
    //  return $tech_all_post;
    $builder = $this->db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();

    $sql="SELECT `post_id` FROM `post_categories` WHERE `categorie_id`= 116 ORDER BY `id` DESC LIMIT $limit";
    $res = $this->db->query($sql);
    $tech_all_post = $res->getResultArray();

    foreach($tech_all_post as $key=>$value)
    {

     $sql = "SELECT `categorie_id` FROM `post_categories` WHERE `post_id`='{$value["post_id"]}'";
     $post_cat = $this->db->query($sql)->getResultArray();
     foreach($post_cat as $k=>$v)
     {
      $sqli = "SELECT `categorie`,`slug` FROM `categories` WHERE `id`='{$v["categorie_id"]}'";
      $cat_id[$k]['cat'] = $this->db->query($sqli)->getResultArray();
     }

      // $sql1 = "SELECT * FROM `posts` WHERE `id`='{$value["post_id"]}' ORDER BY `date_` DESC";
      // $all_posts = $this->db->query($sql1)->getResultArray();
      $builder = $this->db->table("posts");
     
      $builder->where("id", "{$value["post_id"]}");
      // $builder->where("active", '1');
      $builder->orderBy("date_", 'DESC');
      $res = $builder->get();
      $all_posts = $res->getResultArray();

      if(!empty($all_posts[0]['author'])){
          $sql2 = "SELECT * FROM `user` WHERE `uid`= '{$all_posts[0]['author']}' ";
          $fname = $this->db->query($sql2)->getRowArray()['f_name'];
          $all_posts[0]['author'] = $fname;
        }

      $all_posts['post_data'] = $all_posts;

      // echo "<pre>";
      // print_r($all_posts['post_data']);
      // die;
    
        $tech_post = array();
        if(!empty($all_posts[0]))
        {
          $tech_post['post_data'] = $all_posts[0];
        }

        $tech_post['the_category'] = $cat_id;
        if(!empty($all_posts[0]["image"])){
          $sql = "SELECT `url` FROM `media` WHERE `id`='{$all_posts[0]["image"]}'";
          $path = $this->db->query($sql)->getResultArray();
        }
        else{
          $path[0]['url'] = base_url("/assets/setting-image/spindigit_default.jpg");
        }          
       
        $tech_post['tech_path'] = $path;

        if(!empty($all_posts[0]["date_"]))
        {
          $d = $all_posts[0]["date_"];
        }else{
          $d = date("y.m.d");
        }

        $d_create = date_create($d);
        $date = date_format($d_create,$perma["linkformat"]);

        if(!empty($all_posts[0]["seo_url"])){
          $tech_post['tech_url'] = $date . "/" . $all_posts[0]["seo_url"];
        }           

      $tech_all_post[$key]['all_tech_post'] = $tech_post;        
        }
      return $tech_all_post;
     
    }


    function get_business_post($limit)
    {
      $builder = $this->db->table("permalink_list");
      $builder->where("status", "active");
      $res = $builder->get();
      $perma = $res->getRowArray();
  
      $sql= "SELECT `post_id` FROM `post_categories` WHERE `categorie_id` = 205 ORDER BY `id` DESC LIMIT $limit " ;
      $res = $this->db->query($sql);
      $business_all_post = $res->getResultArray();

      foreach($business_all_post as $key=>$value)
      {

       $sql = "SELECT `categorie_id` FROM `post_categories` WHERE `post_id`='{$value["post_id"]}'";
       $post_cat = $this->db->query($sql)->getResultArray();
       foreach($post_cat as $k=>$v)
       {
        $sqli = "SELECT `categorie`,`slug` FROM `categories` WHERE `id`='{$v["categorie_id"]}'";
        $cat_id[$k]['cat'] = $this->db->query($sqli)->getResultArray();
       }

        $sql1 = "SELECT * FROM `posts` WHERE `id`='{$value["post_id"]}' ORDER BY `date_` DESC";
        $all_posts = $this->db->query($sql1)->getResultArray();

        if(!empty($all_posts[0]['author'])){
          $sql2 = "SELECT * FROM `user` WHERE `uid`= '{$all_posts[0]['author']}' ";
          $fname = $this->db->query($sql2)->getRowArray()['f_name'];
          $all_posts[0]['author'] = $fname;
        }


        $business_post['post_data'] = $all_posts;

        $business_post = array();
        if(!empty($all_posts[0]))
        {
          $business_post['post_data'] = $all_posts[0];
        }

          $business_post['the_category'] = $cat_id;
          if(!empty($all_posts[0]["image"])){
            $sql = "SELECT `url` FROM `media` WHERE `id`='{$all_posts[0]["image"]}'";
            $path = $this->db->query($sql)->getResultArray();

          }
          else{
            $path[0]['url'] = base_url("/assets/setting-image/spindigit_default.jpg");

          }          
         
          $business_post['business_path'] = $path;

          if(!empty($all_posts[0]["date_"]))
          {
            $d = $all_posts[0]["date_"];
          }else{
            $d = date("y.m.d");
          }

          $d_create = date_create($d);
          $date = date_format($d_create,$perma["linkformat"]);

          if(!empty($all_posts[0]["seo_url"])){
            $business_post['business_url'] = $date . "/" . $all_posts[0]["seo_url"];
          }        

        $business_all_post[$key]['all_business_post'] = $business_post;        
      }
     
      return $business_all_post;
    
     
    }

    function get_software_post($limit)
    {
      $builder = $this->db->table("permalink_list");
      $builder->where("status", "active");
      $res = $builder->get();
      $perma = $res->getRowArray();
  
      $sql="SELECT `post_id` FROM `post_categories` WHERE `categorie_id`=218 ORDER BY `id` DESC LIMIT $limit";
      $res = $this->db->query($sql);
      $software_all_post = $res->getResultArray();
        

      foreach($software_all_post as $key=>$value)
      {

       $sql = "SELECT `categorie_id` FROM `post_categories` WHERE `post_id`='{$value["post_id"]}'";
       $post_cat = $this->db->query($sql)->getResultArray();
       foreach($post_cat as $k=>$v)
       {
        $sqli = "SELECT `categorie`,`slug` FROM `categories` WHERE `id`='{$v["categorie_id"]}'";
        $cat_id[$k]['cat'] = $this->db->query($sqli)->getResultArray();
       }

        $sql1 = "SELECT * FROM `posts` WHERE `id`='{$value["post_id"]}' ORDER BY `date_` DESC";
        $all_posts = $this->db->query($sql1)->getResultArray();

        if(!empty($all_posts[0]['author'])){
          $sql2 = "SELECT * FROM `user` WHERE `uid`= '{$all_posts[0]['author']}' ";
          $fname = $this->db->query($sql2)->getRowArray()['f_name'];
          $all_posts[0]['author'] = $fname;
        }

        $software_post['post_data'] = $all_posts;

        $software_post = array();
          if(!empty($all_posts[0]))
          {
            $software_post['post_data'] = $all_posts[0];
          }

          $software_post['the_category'] = $cat_id;
          if(!empty($all_posts[0]["image"])){
            $sql = "SELECT `url` FROM `media` WHERE `id`='{$all_posts[0]["image"]}'";
            $path = $this->db->query($sql)->getResultArray();

          }
          else{
            $path[0]['url'] = base_url("/assets/setting-image/spindigit_default.jpg");

          }          
         
          $software_post['software_path'] = $path;

          if(!empty($all_posts[0]["date_"]))
          {
            $d = $all_posts[0]["date_"];
          }else{
            $d = date("y.m.d");
          }

          $d_create = date_create($d);
          $date = date_format($d_create,$perma["linkformat"]);

          if(!empty($all_posts[0]["seo_url"])){
            $software_post['software_url'] = $date . "/" . $all_posts[0]["seo_url"];
          } 
        $software_all_post[$key]['all_software'] = $software_post;        
      }
    return $software_all_post; 
    }



    function get_health_post($limit)
    {
      $builder = $this->db->table("permalink_list");
      $builder->where("status", "active");
      $res = $builder->get();
      $perma = $res->getRowArray();
  
      $sql="SELECT `post_id` FROM `post_categories` WHERE `categorie_id`=199 ORDER BY `id` DESC LIMIT $limit";
      $res = $this->db->query($sql);
      $health_all_post = $res->getResultArray();

      foreach($health_all_post as $key=>$value)
      {

       $sql = "SELECT `categorie_id` FROM `post_categories` WHERE `post_id`='{$value["post_id"]}'";
       $post_cat = $this->db->query($sql)->getResultArray();
       foreach($post_cat as $k=>$v)
        {
        $sqli = "SELECT `categorie`,`slug` FROM `categories` WHERE `id`='{$v["categorie_id"]}'";
        $cat_id[$k]['cat'] = $this->db->query($sqli)->getResultArray();
        }

        $sql1 = "SELECT * FROM `posts` WHERE `id`='{$value["post_id"]}' ORDER BY `date_` DESC";
        $all_posts = $this->db->query($sql1)->getResultArray();

        if(!empty($all_posts[0]['author'])){
          $sql2 = "SELECT * FROM `user` WHERE `uid`= '{$all_posts[0]['author']}' ";
          $fname = $this->db->query($sql2)->getRowArray()['f_name'];
          $all_posts[0]['author'] = $fname;
        }

        $health_post['post_data'] = $all_posts;

        $health_post = array();
          if(!empty($all_posts[0]))
          {
            $health_post['post_data'] = $all_posts[0];
          }

          $health_post['the_category'] = $cat_id;
          if(!empty($all_posts[0]["image"])){
            $sql = "SELECT `url` FROM `media` WHERE `id`='{$all_posts[0]["image"]}'";
            $path = $this->db->query($sql)->getResultArray();
          }
          else{
            $path[0]['url'] = base_url("/assets/setting-image/spindigit_default.jpg");
          }          
         
          $health_post['health_path'] = $path;

          if(!empty($all_posts[0]["date_"]))
          {
            $d = $all_posts[0]["date_"];
          }else{
            $d = date("y.m.d");
          }

          $d_create = date_create($d);
          $date = date_format($d_create,$perma["linkformat"]);

          if(!empty($all_posts[0]["seo_url"])){
            $health_post['health_url'] = $date . "/" . $all_posts[0]["seo_url"];
          }        

        $health_all_post[$key]['all_health'] = $health_post;        
      }
     return $health_all_post;
     
    }

    function get_entertainment_post($limit)
    {
      $builder = $this->db->table("permalink_list");
      $builder->where("status", "active");
      $res = $builder->get();
      $perma = $res->getRowArray();
  
      $sql="SELECT `post_id` FROM `post_categories` WHERE `categorie_id`=190 ORDER BY `id` DESC LIMIT $limit";
      $res = $this->db->query($sql);
      $entertainment_all_post = $res->getResultArray();

      foreach($entertainment_all_post as $key=>$value)
      {

       $sql = "SELECT `categorie_id` FROM `post_categories` WHERE `post_id`='{$value["post_id"]}' ";
       $post_cat = $this->db->query($sql)->getResultArray();
       foreach($post_cat as $k=>$v)
       {
        $sqli = "SELECT `categorie`,`slug` FROM `categories` WHERE `id`='{$v["categorie_id"]}'";
        $cat_id[$k]['cat'] = $this->db->query($sqli)->getResultArray();
       }

        $sql1 = "SELECT * FROM `posts` WHERE `id`='{$value["post_id"]}'  AND  `active` = '1' ORDER BY `date_` DESC";
        $all_posts = $this->db->query($sql1)->getResultArray();

        if(!empty($all_posts[0]['author'])){
          $sql2 = "SELECT * FROM `user` WHERE `uid`= '{$all_posts[0]['author']}' ";
          $fname = $this->db->query($sql2)->getRowArray()['f_name'];
          $all_posts[0]['author'] = $fname;
        }

        $entertainment_post['post_data'] = $all_posts;
      
          $entertainment_post = array();
          if(!empty($all_posts[0]))
          {
            $entertainment_post['post_data'] = $all_posts[0];
          }

          $entertainment_post['the_category'] = $cat_id;
          if(!empty($all_posts[0]["image"])){
            $sql = "SELECT `url` FROM `media` WHERE `id`='{$all_posts[0]["image"]}'";
            $path = $this->db->query($sql)->getResultArray();

          }
          else{
            $path[0]['url'] = base_url("/assets/setting-image/spindigit_default.jpg");

          }          
         
          $entertainment_post['entertainment_path'] = $path;

          if(!empty($all_posts[0]["date_"]))
          {
            $d = $all_posts[0]["date_"];
          }else{
            $d = date("y.m.d");
          }

          $d_create = date_create($d);
          $date = date_format($d_create,$perma["linkformat"]);

          if(!empty($all_posts[0]["seo_url"])){
            $entertainment_post['entertainment_url'] = $date . "/" . $all_posts[0]["seo_url"];
          }   
        $entertainment_all_post[$key]['all_entertainment'] = $entertainment_post;        
      }
  
     return $entertainment_all_post;
     
    }


    function get_sports_post($limit)
    {
      $builder = $this->db->table("permalink_list");
      $builder->where("status", "active");
      $res = $builder->get();
      $perma = $res->getRowArray();
  
      $sql="SELECT `post_id` FROM `post_categories` WHERE `categorie_id`=235 ORDER BY `id` DESC LIMIT $limit";
      $res = $this->db->query($sql);
      $sports_all_post = $res->getResultArray();

      foreach($sports_all_post as $key=>$value)
      {

       $sql = "SELECT `categorie_id` FROM `post_categories` WHERE `post_id`='{$value["post_id"]}' ";
       $post_cat = $this->db->query($sql)->getResultArray();
       foreach($post_cat as $k=>$v)
       {
        $sqli = "SELECT `categorie`,`slug` FROM `categories` WHERE `id`='{$v["categorie_id"]}'";
        $cat_id[$k]['cat'] = $this->db->query($sqli)->getResultArray();
       }

        $sql1 = "SELECT * FROM `posts` WHERE `id`='{$value["post_id"]}'  AND  `active` = '1' ORDER BY `date_` DESC";
        $all_posts = $this->db->query($sql1)->getResultArray();

        if(!empty($all_posts[0]['author'])){
          $sql2 = "SELECT * FROM `user` WHERE `uid`= '{$all_posts[0]['author']}' ";
          $fname = $this->db->query($sql2)->getRowArray()['f_name'];
          $all_posts[0]['author'] = $fname;
        }

        $sports_post['post_data'] = $all_posts;
      
          $sports_post = array();
          if(!empty($all_posts[0]))
          {
            $sports_post['post_data'] = $all_posts[0];
          }

          $sports_post['the_category'] = $cat_id;
          if(!empty($all_posts[0]["image"])){
            $sql = "SELECT `url` FROM `media` WHERE `id`='{$all_posts[0]["image"]}'";
            $path = $this->db->query($sql)->getResultArray();

          }
          else{
            $path[0]['url'] = base_url("/assets/setting-image/spindigit_default.jpg");

          }          
         
          $sports_post['sports_path'] = $path;

          if(!empty($all_posts[0]["date_"]))
          {
            $d = $all_posts[0]["date_"];
          }else{
            $d = date("y.m.d");
          }

          $d_create = date_create($d);
          $date = date_format($d_create,$perma["linkformat"]);

          if(!empty($all_posts[0]["seo_url"])){
            $sports_post['sports_url'] = $date . "/" . $all_posts[0]["seo_url"];
          }  
        $sports_all_post[$key]['all_sports'] = $sports_post;        
      }  
     return $sports_all_post;
    }




    function get_travel_post($limit)
    {
      $builder = $this->db->table("permalink_list");
      $builder->where("status", "active");
      $res = $builder->get();
      $perma = $res->getRowArray();
  
      $sql="SELECT `post_id` FROM `post_categories` WHERE `categorie_id`=208 ORDER BY `id` DESC LIMIT $limit";
      $res = $this->db->query($sql);
      $travel_all_post = $res->getResultArray();

      foreach($travel_all_post as $key=>$value)
      {

       $sql = "SELECT `categorie_id` FROM `post_categories` WHERE `post_id`='{$value["post_id"]}'";
       $post_cat = $this->db->query($sql)->getResultArray();
       foreach($post_cat as $k=>$v)
       {
        $sqli = "SELECT `categorie`,`slug` FROM `categories` WHERE `id`='{$v["categorie_id"]}'";
        $cat_id[$k]['cat'] = $this->db->query($sqli)->getResultArray();
       }

        $sql1 = "SELECT * FROM `posts` WHERE `id`='{$value["post_id"]}' ORDER BY `date_` DESC";
        $all_posts = $this->db->query($sql1)->getResultArray();

        if(!empty($all_posts[0]['author'])){
          $sql2 = "SELECT * FROM `user` WHERE `uid`= '{$all_posts[0]['author']}' ";
          $fname = $this->db->query($sql2)->getRowArray()['f_name'];
          $all_posts[0]['author'] = $fname;
        }

        $travel_post['post_data'] = $all_posts;

        $travel_post = array();
          if(!empty($all_posts[0]))
          {
            $travel_post['post_data'] = $all_posts[0];
          }

          $travel_post['the_category'] = $cat_id;
          if(!empty($all_posts[0]["image"])){
            $sql = "SELECT `url` FROM `media` WHERE `id`='{$all_posts[0]["image"]}'";
            $path = $this->db->query($sql)->getResultArray();

          }
          else{
            $path[0]['url'] = base_url("/assets/setting-image/spindigit_default.jpg");

          }          
         
          $travel_post['travel_path'] = $path;

          if(!empty($all_posts[0]["date_"]))
          {
            $d = $all_posts[0]["date_"];
          }else{
            $d = date("y.m.d");
          }

          $d_create = date_create($d);
          $date = date_format($d_create,$perma["linkformat"]);

          if(!empty($all_posts[0]["seo_url"])){
            $travel_post['travel_url'] = $date . "/" . $all_posts[0]["seo_url"];
          }        

        $travel_all_post[$key]['all_travel'] = $travel_post;        
      }
     return $travel_all_post;
     
    }

    function get_science_post($limit)
    {
      $builder = $this->db->table("permalink_list");
      $builder->where("status", "active");
      $res = $builder->get();
      $perma = $res->getRowArray();
  
      $sql="SELECT `post_id` FROM `post_categories` WHERE `categorie_id`=210 ORDER BY `id` DESC LIMIT $limit";
      $res = $this->db->query($sql);
      $science_all_post = $res->getResultArray();

      foreach($science_all_post as $key=>$value)
      {

       $sql = "SELECT `categorie_id` FROM `post_categories` WHERE `post_id`='{$value["post_id"]}'";
       $post_cat = $this->db->query($sql)->getResultArray();
       foreach($post_cat as $k=>$v)
       {
        $sqli = "SELECT `categorie`,`slug` FROM `categories` WHERE `id`='{$v["categorie_id"]}'";
        $cat_id[$k]['cat'] = $this->db->query($sqli)->getResultArray();
       }

        $sql1 = "SELECT * FROM `posts` WHERE `id`='{$value["post_id"]}' ORDER BY `date_` DESC";
        $all_posts = $this->db->query($sql1)->getResultArray();

        if(!empty($all_posts[0]['author'])){
          $sql2 = "SELECT * FROM `user` WHERE `uid`= '{$all_posts[0]['author']}' ";
          $fname = $this->db->query($sql2)->getRowArray()['f_name'];
          $all_posts[0]['author'] = $fname;
        }

        $science_post['post_data'] = $all_posts;

        $science_post = array();
          if(!empty($all_posts[0]))
          {
            $science_post['post_data'] = $all_posts[0];
          }

          $science_post['the_category'] = $cat_id;
          if(!empty($all_posts[0]["image"])){
            $sql = "SELECT `url` FROM `media` WHERE `id`='{$all_posts[0]["image"]}'";
            $path = $this->db->query($sql)->getResultArray();

          }
          else{
            $path[0]['url'] = base_url("/assets/setting-image/spindigit_default.jpg");

          }          
         
          $science_post['science_path'] = $path;

          if(!empty($all_posts[0]["date_"]))
          {
            $d = $all_posts[0]["date_"];
          }else{
            $d = date("y.m.d");
          }

          $d_create = date_create($d);
          $date = date_format($d_create,$perma["linkformat"]);

          if(!empty($all_posts[0]["seo_url"])){
            $science_post['science_url'] = $date . "/" . $all_posts[0]["seo_url"];
          }        

        $science_all_post[$key]['all_science'] = $science_post;        
      }
     return $science_all_post;
     
    }

    function get_all_cat()
    {
        $sql = "SELECT `id`,`categorie`,`slug` FROM `categories`";
        $cat = $this->db->query($sql)->getResultArray();
        return $cat;
    }
    function check_cat($cat)
    {
        $sql = "SELECT `categorie` FROM `categories` WHERE `categorie` = '{$cat}' ";
        $cat = $this->db->query($sql)->getRow();
        return $cat;
    }

  function get_post($id)
  {
    $builder=$this->db->table('wp_posts');
    $builder->select('post_parent');
    $builder->where("id",$id);
    $post_parent= $builder->get()->getResultArray();
    $post_parent_id=$post_parent[0]["post_parent"];
    $sql="SELECT `post_content` FROM `wp_posts` WHERE `id` = '{$post_parent_id}'";

    $res=$this->db->query($sql);
    if(!empty($res->getResultArray())){
        return $post_parent_id;
    } else {
        return 0;
    }
  }

  function getRandomPostData($post_id){
    $builder = $this->db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();
  }

  function category_post_count($cat)
  {
    $builder = $this->db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();

    $sql = "SELECT `id`,`categorie` FROM `categories` WHERE `slug` LIKE '%{$cat}%'";
    $cat_id = $this->db->query($sql)->getResultArray();   

    if(!empty($cat_id[0]))
    {        
      $sql = "SELECT `posts`.* FROM `posts` LEFT JOIN `post_categories` ON `post_categories`.`post_id` = `posts`.`id` 
      WHERE `post_categories`.`categorie_id`='{$cat_id[0]["id"]}' 
      ORDER BY `posts`.`id`";
      $count_result = $this->db->query($sql)->getNumRows();
    }

    return $count_result;
  }

 function get_category_post($cat, $page)
 {
    $builder = $this->db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();

    // $start = ($page - 1) * $perPage;
    $perpage = 4;

    $sql = "SELECT `id`,`categorie` FROM `categories` WHERE `slug` LIKE '%{$cat}%' ";
    $cat_id = $this->db->query($sql)->getResultArray();
    // print_r($cat_id);
    // die;
    // if(empty($cat_id)){}else{echo view('errors/html/error_404');}
    
    $cat_name = $cat_id[0]["categorie"];
    $start = ($page - 1) * $perpage;

    if(!empty($cat_id[0]))
    {        
      $sql = "SELECT `posts`.* FROM `posts` LEFT JOIN `post_categories` ON `post_categories`.`post_id` = `posts`.`id` 
      WHERE `posts`.`visibility` = 'p' AND `post_categories`.`categorie_id`='{$cat_id[0]["id"]}' ORDER BY `posts`.`id` DESC LIMIT $perpage offset $start";
      $cat_post2 = $this->db->query($sql)->getResultArray();
    }

    if(empty($cat_post2)){
      return false;
    }else{
    
            foreach($cat_post2 as $r)
            {
              $p = array();
              $p_id = array();
                
                if(!empty($r['image']))
                  {
                    $sqli = "SELECT `url` FROM `media` WHERE `id`='{$r["image"]}'";
                    $path = $this->db->query($sqli)->getResultArray();
                    $p['path'] = $path;
                  }else{
                    $p['path'][0]['url'] =  base_url("/assets/setting-image/spindigit_default.jpg");
                  }
                
                  if(!empty($r))
                  {
                    $sqlii = "SELECT `user_name` FROM `loginCred` WHERE `uid`='{$r["author"]}'";
                    $author = $this->db->query($sqlii)->getResultArray();
                    $p['author'] = $author;
                  }

                  $p['cat_name'] = $cat_name;

                  if(!empty($r))
                  {
                    $p['the_posts'][] = $r;
                    $d = $r['date_'];
                    $d_create = date_create($d);
                    $date = date_format($d_create,$perma["linkformat"]);
                    $p['url'] = $date . "/" . $r["seo_url"];
                    $cat_post[]['posts'] = $p;
                  }
              }
       
    return $cat_post; }
  }


  function get_author($aut)
  {
    $sql = "SELECT `uid`,`user_name` FROM `loginCred` WHERE `user_name`='{$aut}'";
    $uid = $this->db->query($sql)->getResultArray();
    return $uid[0]['uid'];
  }

  function get_aut_post($p)
  {
    $post = array();
    $builder = $this->db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();
    
    foreach($p['pages'] as $key=>$value)
    {
      $a = array();
      $a['post'] = $value;
      if(!empty($value['image']))
      {
        $sql = "SELECT `url` FROM `media` WHERE `id`='{$value['image']}'";
        $url = $this->db->query($sql)->getResultArray();
        $a['path'] = $url;
      }
        $d = $value['date_'];
        $d_create = date_create($d);
        $date = date_format($d_create,$perma["linkformat"]);

        $a['url'] = $date . "/" . $value["seo_url"];
        $post[$key]['post'] = $a;
    }
    return $post;
  }



  function cat_latest_post()
  {
    $builder = $this->db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();

    $sql = "SELECT * FROM `posts` ORDER BY `update_date` DESC LIMIT 5";   
    
    $cat_latest =  $this->db->query($sql)->getResultArray();

    foreach($cat_latest as $key=>$value)
    {    
      $latest = array();      
      $latest['post'] = $value;
      $sql = "SELECT `url` FROM `media` WHERE `id`='{$value['image']}'";
      $latest['path'] = $this->db->query($sql)->getResultArray();

      $d = $value['date_'];
      $d_create = date_create($d);
      $date = date_format($d_create,$perma["linkformat"]);

      $latest['url'] = $date . "/" . $value["seo_url"];

      $cat_latest[$key] = $latest;
    }
    return $cat_latest;
  }

  function sitemap_news_post()
  {
    // $sql = "SELECT `title`,`seo_url`,`date_`,`time_` FROM `posts` WHERE `date_`<='$date' AND `news_sitemap`= 1 ORDER BY `id` DESC LIMIT 20 ";
    $sql = "SELECT `title`,`seo_url`,`date_`,`time_` FROM `posts` WHERE `date_` >= DATE_SUB(CURDATE(), INTERVAL 2 DAY) AND `date_` <= CURDATE() AND `news_sitemap`= 1 ORDER BY `id` DESC ";  
    return $this->db->query($sql)->getResultArray();
  }

  function sitemap_perma()
  {
    $builder = $this->db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    return $perma = $res->getRowArray();
  }

  function oldtonew($newurl)
  {
    $db = \Config\Database::connect();
    $builder = $db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();
    $newurl = $newurl;
  
    $page_sql = "SELECT date_ FROM posts WHERE `seo_url`='{$newurl}'";
    $query = $db->query($page_sql);
    $result = $query->getResultArray();

    $d = $result[0]['date_'];
    $d_create = date_create($d);
    return  $date = date_format($d_create,$perma['linkformat']);
  }

   function add_data()
   {
    $builder = $this->db->table('adsence');
    $builder->select('*');
    $res = $builder->get();
    return $res->getResultArray();
   }

   function get_single_page($title){
    $builder = $this->db->table('posts');
    $builder->select('*');
    $builder->where("title", "{$title}");
    $res = $builder->get();
    return $res->getResultArray();
   }

   function category_post_count1($cat1){
    $db = db_connect();
    $query = $db->query("SELECT * FROM posts WHERE `title` LIKE '%$cat1%' ");
    $res = $query->getNumRows();
    return $res;


  }
  function get_category_post1($cat, $page=""){
    $perpage = 10;
    $start = ($page - 1) * $perpage;
    $sql = "SELECT * FROM posts WHERE `title` LIKE '%$cat%' ORDER BY `id` DESC LIMIT $perpage offset $start";
    $query = $this->db->query($sql);
    $res1 = $query->getResultArray();

    if(!empty($res1)){
      $data = array();
      
      foreach($res1 as $key => $res){
        $sqli = "SELECT `url` FROM `media` WHERE `id`='{$res["image"]}'";
            if(!empty($this->db->query($sqli)->getRowArray())){
              $data[$key]['path'] = $this->db->query($sqli)->getRowArray();
            }else{
              $data[$key]['path']['url'] =  base_url("/assets/setting-image/spindigit_default.jpg");
            }
      $data[$key]['posts'] = $res;
      $dat = date_create($res['date_']);
      $date = date_format($dat,"Y/m/d");
      $url = $res['seo_url'];
      $data[$key]['url'] = $date.'/'.$url;
      $data[$key]['title'] = $res['title'];      
      }
      return $data;
    }}

   function get_header_menu($limit)
  {
    $db = db_connect();
    $sql = "SELECT `categorie_id`, `categorie`, `slug`, COUNT('post_id') as post_no FROM `post_categories` as pc, `categories` as c WHERE pc.categorie_id = c.id GROUP BY `categorie_id` ORDER BY `post_no` DESC LIMIT ".$limit."";
    $query = $db->query($sql);
    $menu =  $query->getResultArray();
    return $menu;
  }

  public function previousPost($id)
  {
    $builder = $this->db->table('posts');
    $builder->select('*');
    $builder->where("id < ", "{$id}");
    $builder->orderBy('id', 'desc');
    $builder->limit(1);
    $res = $builder->get();
    $result = $res->getResultArray();

    if(!empty($result)){
        $data = array();
        foreach($result as $res){
        $dat = date_create($res['date_']);
        $date = date_format($dat,"Y/m/d");
        $url = $res['seo_url'];
        $data['seo_url'] = $date.'/'.$url;
        $data['title'] = $res['title'];      
        }
        return $data;
    }else{
        return false;
    }
  }

  public function nextPost($id)
  {
    $builder = $this->db->table('posts');
    $builder->select('*');
    $builder->where("id > ", "{$id}");
    $builder->limit(1);
    $res = $builder->get();
    $result = $res->getResultArray();
    if(!empty($result)){
      $data = array();
      foreach($result as $res){
        $dat = date_create($res['date_']);
        $date = date_format($dat,"Y/m/d");
        $url = $res['seo_url'];
        $data['seo_url'] = $date.'/'.$url;
        $data['title'] = $res['title'];      
      }
      return $data;
    }else{
      return false;
    }   
  }

  function insert_comment($data)
    {
        $builder  = $this->db->table('comments');
        $builder->insert($data);
    }

  function search_title($title)
  {
    $db = db_connect();
    $sql = "SELECT * FROM posts WHERE `title` LIKE '%{$title}%' OR `seo_url` LIKE '%{$title}%'";
    return $this->db->query($sql)->getResultArray();       
  }

  function trendingPost(){
        $sql = "SELECT p.id, p.title, p.seo_url, p.date_, p.content, m.url, m.alt_text, c.categorie, c.slug, c.id as catid, count(pc.categorie_id) as cat_no FROM posts p, media m, post_categories pc, categories c WHERE p.image = m.id AND pc.post_id = p.id AND pc.categorie_id = c.id AND p.visibility = 'p' AND p.active = '1' GROUP BY post_id ORDER BY RAND() LIMIT 20 ";
        $query = $this->db->query($sql);
        $results = $query->getResultArray();        

        $data = array();
        foreach($results as $dat){
            $data['id'] = $dat['id']; 
            $data['title'] = $dat['title']; 
            $data['seo_url'] = date("Y/m/d", strtotime($dat['date_'])) . '/' . $dat['seo_url']; 
            $data['date_'] = $dat['date_']; 
            $data['content'] = $dat['content']; 
            $data['url'] = $dat['url']; 
            $data['categorie'] = $dat['categorie'];
            $data['slug'] = $dat['slug'];
            $data['catid'] = $dat['catid']; 
            $dats[] = $data;
        }
        

        return  $dats;
  }
      public function contact_us_detail($data){
        $db = db_connect();
        $builder  = $this->db->table('contact_form');
        $builder->insert($data);
        // return;
      }
   
}
