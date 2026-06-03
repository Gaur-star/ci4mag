<?php
namespace App\Models;

use CodeIgniter\Model;

class Library_model extends Model {

        public function __construct()
        {
          $db = db_connect();
        }
        public function get_settings()
        {
        $query = $this->db->query("SELECT * FROM `setting`");
        return $query->result_array();		
        }
        ////////////////////////////////////////////////////////////
        public function get_tab()
        {
        $query = $this->db->query("SELECT * FROM `pages` WHERE active='y' ");
        return $query->result_array();		
        }
        public function get_categorie()
        {
        $query = $this->db->query("SELECT post_categories.categorie_id, categories.categorie, categories.slug
        FROM post_categories
        INNER JOIN categories ON post_categories.categorie_id = categories.id GROUP BY categories.categorie ORDER BY post_categories.categorie_id DESC LIMIT 0,12");
        return $query->result_array();		
        }
        public function get_blog($limit=5,$order_by='asc',$pagination=0,$id=17)
        {
         // echo $_SESSION['login'];die;
          $res = array();
          $_SESSION['tab_id=']=$id;
          $_SESSION['counter']=0;
          $_SESSION['last_top']=0;
         // echo $id;die;
         $order="ORDER BY posts.id ".$order_by;
      $pagination=" LIMIT 0,".$limit;

      // // if($_SESSION['login']=='success'){
      //   $query = $this->db->query("SELECT posts.id,post_categories.categories,categories.slug, posts.seo_url,posts.title,posts.image,posts.content,posts.time_,posts.date_,posts.meta_tag,posts.meta_desc,user.f_name
      //   FROM posts
      //   INNER JOIN post_categories ON posts.id = post_categories.post_id
      //    INNER JOIN user ON posts.author = user.id
      //    INNER JOIN categories ON post_categories.categorie_id = categories.id
      //     WHERE post_categories.categorie_id=".$id." AND posts.active='y' ".$order." LIMIT 0,12 ");
      // }else{
     
        $query = $this->db->query("SELECT posts.id,categories.slug, posts.seo_url,posts.title,posts.image,posts.content,posts.time_,posts.date_,posts.meta_tag,posts.meta_desc
        FROM posts
        INNER JOIN post_categories ON posts.id = post_categories.post_id
         INNER JOIN user ON posts.author = user.id
         INNER JOIN categories ON post_categories.categorie_id = categories.id
          WHERE post_categories.categorie_id=".$id." AND posts.active='y' AND CONCAT(posts.date_,' ', posts.time_) <NOW() ".$order." LIMIT 0,12 ");
      //}

       // return $query->result_array();		
       $postdata=$query->result_array();
        foreach($postdata as $index=>$post){
         $res[$index]=$post;
         
         
         $cats= $this->get_categorie1($post['id']);
         $category_data=implode(", ",$cats);
         $res[$index]['categorie_name']=$category_data;

     }    


       return $res;	
        }
        //////////////////////////////////////////////////////////
        public function get_blog1($top)
        {
        
          // if($top>500){
          //   $top=round($top/2500);
          // }else{
          //   $top=1;
          // }
         $limit = 15*$top;
         $res = array();
     
        $query = $this->db->query("SELECT posts.id,categories.slug, posts.seo_url,posts.title,posts.image,posts.content,posts.time_,posts.date_,posts.meta_tag,posts.meta_desc,user.f_name
        FROM posts
        INNER JOIN post_categories ON posts.id = post_categories.post_id
         INNER JOIN user ON posts.author = user.id
         INNER JOIN categories ON post_categories.categorie_id = categories.id
          WHERE post_categories.categorie_id=".$_SESSION['tab_id=']." AND posts.active='y' AND CONCAT(posts.date_,' ', posts.time_) <NOW() ORDER BY posts.id DESC  LIMIT ".$limit.",15");
        //return $query->result_array();
        $postdata=$query->result_array();
        foreach($postdata as $index=>$post){
         $res[$index]=$post;
         
         
         $cats= $this->get_categorie1($post['id']);
         $category_data=implode(", ",$cats);
         $res[$index]['categorie_name']=$category_data;

     }    


       return $res;			
        }
        ///////////////////////////////////////////////////////
        public function get_latest_blog($limit=5,$order_by='asc',$pagination=0,$id=17)
        {
          //echo $limit;
      $pagination=" LIMIT 0,".$limit;
      $order="ORDER BY posts.id ".$order_by;
        $query = $this->db->query("SELECT posts.id, posts.seo_url,posts.title,posts.image,posts.content,posts.date_,posts.time_,posts.meta_tag,posts.meta_desc,user.f_name
        FROM posts
        INNER JOIN post_categories ON posts.id = post_categories.post_id INNER JOIN user ON posts.author = user.id WHERE post_categories.categorie_id IN(SELECT MAX(categorie_id)-10 FROM post_categories) AND posts.active='y' AND CONCAT(posts.date_,' ', posts.time_) <NOW() ORDER BY posts.id DESC  ".$pagination." ");
        /*$query = $this->db->query("SELECT posts.id,post_categories.categories, posts.seo_url,posts.title,posts.image,posts.content,posts.author,posts.meta_tag,posts.meta_desc
        FROM posts
        INNER JOIN post_categories ON posts.id = post_categories.post_id WHERE post_categories.categorie_id IN(SELECT MAX(categorie_id) FROM post_categories) AND posts.active='y' ORDER BY posts.id DESC ".$pagination." ");
        */
        return $query->result_array();		
        }
        ///////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////
        public function get_second_latest_blog($limit=5,$order_by='asc',$pagination=0,$id=17)
        {
          $res = array();
          //echo $limit;
      $pagination=" LIMIT 0,".$limit;
      $order="ORDER BY posts.id ".$order_by;
        $query = $this->db->query("SELECT posts.id,categories.slug, posts.seo_url,posts.title,posts.image,posts.content,posts.date_,posts.time_,posts.meta_tag,posts.meta_desc,user.f_name
        FROM posts
        INNER JOIN post_categories ON posts.id = post_categories.post_id
        INNER JOIN user ON posts.author = user.id
        INNER JOIN categories ON post_categories.categorie_id = categories.id
        WHERE post_categories.categorie_id IN(2) AND posts.active='y' AND CONCAT(posts.date_,' ', posts.time_) <NOW() ORDER BY posts.id DESC LIMIT 8");
        //return $query->result_array();
        $postdata=$query->result_array();
        foreach($postdata as $index=>$post){
         $res[$index]=$post;
         
         
         $cats= $this->get_categorie1($post['id']);
         $category_data=implode(", ",$cats);
         $res[$index]['categorie_name']=$category_data;

     }    


       return $res;			
        }
        ///////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////
        public function get_third_latest_blog($limit=5,$order_by='asc',$pagination=0,$id=17)
        {
          //echo $limit;
          $res = array();
      $pagination=" LIMIT 0,".$limit;
      $order="ORDER BY posts.id ".$order_by;
        $query = $this->db->query("SELECT posts.id,categories.slug, posts.seo_url,posts.title,posts.image,posts.content,posts.date_,posts.time_,posts.meta_tag,posts.meta_desc,user.f_name
        FROM posts
        INNER JOIN post_categories ON posts.id = post_categories.post_id
        INNER JOIN user ON posts.author = user.id
        INNER JOIN categories ON post_categories.categorie_id = categories.id
         WHERE post_categories.categorie_id IN(3) AND posts.active='y' AND CONCAT(posts.date_,' ', posts.time_) <NOW() ORDER BY posts.id DESC LIMIT 18");
       // return $query->result_array();
       $postdata=$query->result_array();
       foreach($postdata as $index=>$post){
        $res[$index]=$post;
        
        
        $cats= $this->get_categorie1($post['id']);
        $category_data=implode(", ",$cats);
        $res[$index]['categorie_name']=$category_data;

    }    


      return $res;				
        }
        ///////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////
        public function get_fourth_latest_blog($limit=5,$order_by='asc',$pagination=0,$id=17)
        {
          //echo $limit;
          $res = array();
      $pagination=" LIMIT 0,".$limit;
      $order="ORDER BY posts.id ".$order_by;
        $query = $this->db->query("SELECT posts.id,categories.slug, posts.seo_url,posts.title,posts.image,posts.content,posts.date_,posts.time_,posts.meta_tag,posts.meta_desc,user.f_name
        FROM posts
        INNER JOIN post_categories ON posts.id = post_categories.post_id
        INNER JOIN user ON posts.author = user.id
        INNER JOIN categories ON post_categories.categorie_id = categories.id
         WHERE post_categories.categorie_id IN(22) AND posts.active='y' AND CONCAT(posts.date_,' ', posts.time_) <NOW() ORDER BY posts.id DESC LIMIT 13");
        //return $query->result_array();
        $postdata=$query->result_array();
        foreach($postdata as $index=>$post){
         $res[$index]=$post;
         
         
         $cats= $this->get_categorie1($post['id']);
         $category_data=implode(", ",$cats);
         $res[$index]['categorie_name']=$category_data;

     }    


       return $res;				
        }
        ///////////////////////////////////////////////////////
        public function get_blog_count($limit=5,$order_by='asc',$pagination=0,$id=17)
        {
         // echo $limit;die;
      $pagination=" LIMIT 0,".$limit;
      $order="ORDER BY posts.id ".$order_by;
        $query = $this->db->query("SELECT COUNT(posts.id),posts.id, posts.title,posts.image,posts.content,posts.author
        FROM posts
        INNER JOIN post_categories ON posts.id = post_categories.post_id WHERE post_categories.categorie_id=".$id." AND posts.active='y' AND CONCAT(posts.date_,' ', posts.time_) <NOW() ".$order." ".$pagination." ");
        return $query->result_array();		
        }
        public function get_blog_by_id($post_id)
        {
           $query = $this->db->query("SELECT posts.id,posts.guid,categories.slug, posts.title,posts.seo_url,posts.image,posts.content,posts.author,posts.meta_tag,posts.meta_desc,user.f_name,user.email,user.image AS uimg,user.biography,posts.keyword,posts.date_,posts.time_,posts.image,posts.follow
        FROM posts
        INNER JOIN post_categories ON posts.id = post_categories.post_id
         INNER JOIN user ON posts.author = user.id
         INNER JOIN categories ON post_categories.categorie_id = categories.id
          WHERE posts.id=".$post_id." ");
        return $query->result_array();		
        }
        public function previous($post_id)
        {
           $query = $this->db->query("SELECT posts.id,posts.guid,categories.slug, posts.title,posts.seo_url,posts.image,posts.content,posts.author,posts.meta_tag,posts.meta_desc,user.f_name,user.email,user.image AS uimg,user.biography,posts.keyword,posts.date_,posts.time_,posts.image
        FROM posts
        INNER JOIN post_categories ON posts.id = post_categories.post_id
         INNER JOIN user ON posts.author = user.id
         INNER JOIN categories ON post_categories.categorie_id = categories.id
          WHERE posts.id<".$post_id." AND CONCAT(posts.date_,' ', posts.time_) <NOW() ORDER BY posts.id DESC LIMIT 0,1 ");
        return $query->result_array();		
        }
        public function next($post_id)
        {
           $query = $this->db->query("SELECT posts.id,posts.guid,categories.slug, posts.title,posts.seo_url,posts.image,posts.content,posts.author,posts.meta_tag,posts.meta_desc,user.f_name,user.email,user.image AS uimg,user.biography,posts.keyword,posts.date_,posts.time_,posts.image
        FROM posts
        INNER JOIN post_categories ON posts.id = post_categories.post_id
         INNER JOIN user ON posts.author = user.id
         INNER JOIN categories ON post_categories.categorie_id = categories.id
          WHERE posts.id>".$post_id." AND CONCAT(posts.date_,' ', posts.time_) <NOW() ORDER BY posts.id ASC LIMIT 0,1 ");
        return $query->result_array();		
        }
        public function get_blog_keyword_by_id($post_id)
        {
           $query = $this->db->query("SELECT keyword FROM `post_keywords` WHERE post_id=".$post_id." ");
        return $query->result_array();		
        }
        public function get_page_by_id($page_id)
        {
         // echo $page_id;
           $query = $this->db->query("SELECT * FROM pages WHERE id=".$page_id." ");
        return $query->result_array();		
        }
        public function get_blog_by_categorie($limit=10,$order_by='asc',$pagination=0,$id=17)
        {
          $res = array();
      $pagination=" LIMIT 2,19";
      $order="ORDER BY posts.id ".$order_by;
        $query = $this->db->query("SELECT DISTINCT posts.id,categories.slug, posts.title, posts.seo_url, posts.image, posts.content, posts.date_, posts.time_
        FROM posts
        INNER JOIN post_categories ON posts.id = post_categories.post_id
        INNER JOIN user ON posts.author = user.id
        INNER JOIN categories ON post_categories.categorie_id = categories.id
        WHERE posts.active = 'y' AND CONCAT(posts.date_,' ', posts.time_) <NOW() GROUP BY(posts.id) ".$order." ".$pagination."
         ");
        //return $query->result_array();
        $postdata=$query->result_array();
        foreach($postdata as $index=>$post){
         $res[$index]=$post;
         
         
         $cats= $this->get_categorie1($post['id']);
         $category_data=implode(", ",$cats);
         $res[$index]['categorie_name']=$category_data;

     }    


       return $res;				
        }
        public function get_blog_by_categorie1($limit=10,$order_by='asc',$pagination=0,$id=17)
        {

        $res = array();
     

        $pagination=" LIMIT 2,".$limit;
        $order="ORDER BY posts.id ".$order_by;
        $query = $this->db->query("SELECT DISTINCT posts.id,categories.slug, posts.title, posts.seo_url, posts.image, posts.content, user.f_name, posts.date_, posts.time_
        FROM posts
        INNER JOIN post_categories ON posts.id = post_categories.post_id
        INNER JOIN user ON posts.author = user.id
        INNER JOIN categories ON post_categories.categorie_id = categories.id
        WHERE posts.active = 'y' AND CONCAT(posts.date_,' ', posts.time_) <NOW() GROUP BY posts.id ".$order." LIMIT 20, 12 ");
        $postdata=$query->result_array();
         foreach($postdata as $index=>$post){
          $res[$index]=$post;
          
          
          $cats= $this->get_categorie1($post['id']);
          $category_data=implode(", ",$cats);
          $res[$index]['categorie_name']=$category_data;

      }    


        return $res;		
        }

        
        public function get_categorie1($id)
        {
            $cats=array();
            $query_category=   $this->db->query("SELECT categories.categorie,categories.slug
            FROM `categories`
                        INNER JOIN post_categories ON categories.id = post_categories.categorie_id
                          WHERE post_categories.post_id=".$id)->result_array();
            foreach( $query_category as $cat){
              $slug=$cat['slug'];
    $slug = strtolower($slug);
    $slug = str_replace(' ', '_', $slug);
    $slug = preg_replace('/[^a-z0-9]+/', '-', strtolower($slug));
    $slug = str_replace("'", '', $slug);
    $slug = preg_replace('/-{2,}/','-',$slug);
              // $cats[] =  $cat['categorie']; 
               $cats[]=anchor($slug, '<b  style="line-height: 0;color:red;">'.$cat['categorie'].'</b>');
            }
            return $cats;		
        }



        public function get_blog_by_categorie2($limit=10,$order_by='asc',$pagination=0,$id=17)
        {
      $pagination=" LIMIT 2,".$limit;
      $order="ORDER BY posts.id ".$order_by;
        $query = $this->db->query("SELECT DISTINCT posts.id,categories.slug, posts.title, posts.seo_url, posts.image, posts.content, user.f_name, posts.date_, posts.time_
        FROM posts
        INNER JOIN post_categories ON posts.id = post_categories.post_id
        INNER JOIN user ON posts.author = user.id
        INNER JOIN categories ON post_categories.categorie_id = categories.id
        WHERE posts.active = 'y' AND CONCAT(posts.date_,' ', posts.time_) <NOW() GROUP BY(posts.id) ".$order." LIMIT 0, 15 ");
        return $query->result_array();		
        }

        public function search($id)
        {
          //$search = $_POST['search'];
         // print_r($_POST);die;
         $res = array();
              $search= $_REQUEST['search'];
                $sql = "SELECT DISTINCT posts.id,categories.slug, posts.title, posts.seo_url, posts.image,user.f_name, 

                posts.content, posts.author, posts.date_, posts.time_
                        FROM posts
                        INNER JOIN post_categories ON posts.id = post_categories.post_id
                         INNER JOIN user ON posts.author = user.id 
                         INNER JOIN categories ON post_categories.categorie_id = categories.id
                        WHERE posts.active = 'y' AND CONCAT(posts.date_,' ', posts.time_) <NOW() AND posts.title like '%".$search."%' GROUP BY(posts.id) ORDER BY posts.id DESC";
             
               $query = $this->db->query($sql);
               $postdata=$query->result_array();
               foreach($postdata as $index=>$post){
                $res[$index]=$post;
                
                
                $cats= $this->get_categorie1($post['id']);
                $category_data=implode(", ",$cats);
                $res[$index]['categorie_name']=$category_data;
      
            }    
      
      
              return $res;	
  //return $query->result_array();
        }
        public function redirect()
        {
                $sql = "SELECT posts.id,past_backup.url,posts.seo_url FROM past_backup INNER JOIN posts ON past_backup.post_id = posts.id WHERE posts.seo_url != past_backup.url AND posts.active='y' GROUP BY past_backup.url";
             
               $query = $this->db->query($sql);
  return $query->result_array();
        }
        public function blog_count()
        {
        // $query = $this->db->query("SELECT count(*) FROM `post_categories` WHERE categorie_id=".$_SESSION['tab_id='].";");
        // return $query->result_array();		
        }
        public function pagination($id)
        {
               $page= $id*12;
               //$sql = "SELECT * FROM `posts`  WHERE active!='n' ORDER BY id DESC LIMIT ".$page." , 12";
               $sql="SELECT posts.id, posts.seo_url,posts.title,posts.image,posts.content,posts.time_,posts.date_,posts.meta_tag,posts.meta_desc,user.f_name
               FROM posts
               INNER JOIN post_categories ON posts.id = post_categories.post_id INNER JOIN user ON posts.author = user.id WHERE post_categories.categorie_id=". $_SESSION['tab_id=']." AND posts.active='y' AND CONCAT(posts.date_,' ', posts.time_) <NOW() ORDER BY id DESC LIMIT ".$page." , 12";
              /* $sql="SELECT posts.id,post_categories.categories, posts.seo_url,posts.title,posts.image,posts.content,posts.time_,posts.date_,posts.meta_tag,posts.meta_desc,user.f_name
               FROM posts
               INNER JOIN post_categories ON posts.id = post_categories.post_id INNER JOIN user ON posts.author = user.id WHERE post_categories.categorie_id=".$id." AND posts.active='y' ".$order." ".$pagination." ";
              */
              $query = $this->db->query($sql);
  return $query->result_array();
        }

        public function get_blog_category_by_id($post_id)
        {
          $sql = "SELECT categories.`categorie`,categories.`slug` FROM `categories` 
          INNER JOIN post_categories ON categories.`id` = post_categories.`categorie_id`
          WHERE post_categories.`post_id`=".$post_id." GROUP BY categories.`categorie`";
          $query = $this->db->query($sql);
          return $query->result_array();
        }
        public function related_post_by_id($post_id)
        {
          $res = array();
     

       // $pagination=" LIMIT 2,".$limit;
        $order="ORDER BY posts.id DESC";
        $query = $this->db->query("SELECT DISTINCT posts.id,categories.slug, posts.title, posts.seo_url, posts.image, posts.content, user.f_name, posts.date_, posts.time_
        FROM posts
        INNER JOIN post_categories ON posts.id = post_categories.post_id
        INNER JOIN user ON posts.author = user.id
        INNER JOIN categories ON post_categories.categorie_id = categories.id
        WHERE posts.active = 'y' AND CONCAT(posts.date_,' ', posts.time_) <NOW() AND post_categories.categorie_id IN(SELECT categorie_id FROM post_categories WHERE post_id=".$post_id.") GROUP BY posts.id ".$order." LIMIT 0, 9 ");
        $postdata=$query->result_array();
         foreach($postdata as $index=>$post){
          $res[$index]=$post;
          
          
          $cats= $this->get_categorie1($post['id']);
          $category_data=implode(", ",$cats);
          $res[$index]['categorie_name']=$category_data;

      }    


        return $res;		
          // $sql = "SELECT categories.`categorie`,categories.`slug` FROM `categories` 
          // INNER JOIN post_categories ON categories.`id` = post_categories.`categorie_id`
          // WHERE post_categories.`post_id`=".$post_id." GROUP BY categories.`categorie`";
          // $query = $this->db->query($sql);
          // return $query->result_array();
        }
        
       
}