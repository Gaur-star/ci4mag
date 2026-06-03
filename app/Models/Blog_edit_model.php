<?php
namespace App\Models;

use CodeIgniter\Model;

class Blog_edit_model extends Model
{
    public $table = "posts";
    
    public function get_blog()
    {
        $pager = \Config\Services::pager();
        $sql = "SELECT posts.id,posts.title,posts.seo_url,posts.meta_tag as keyword, CONCAT(posts.date_, posts.time_) AS date_time,posts.date_,posts.time_,user.f_name as author,user.email,posts.active
            FROM `posts` 
            INNER JOIN user ON posts.author=user.id
            WHERE posts.active!='n' ORDER BY id DESC LIMIT 0,5";
        $query = $this->db->query($sql);
        $postdata = $query->result_array();
        $posts = array();
        foreach ($postdata as $index => $post) {
            $posts[$index] = $post;
            $cats = $this->get_categorie($post['id']);
            $category_data = implode(", ", $cats);
            $posts[$index]['categorie'] = $category_data;
        }
        // echo '<pre>';
        // print_r($posts);die;
        return $posts;
    }
    ///////////////////////////////////////////////////

    public function get_categorie($id)
    {
        $cats = array();
        $builder = $this->db->table("post_categories");
        $builder->select("categories.categorie");
        $builder->where("post_categories.post_id", $id);
        $builder->join("categories", "post_categories.categorie_id=categories.id");
        $query_category = $builder->get()->getResultArray();
        foreach ($query_category as $cat) {
            $cats[] =  $cat['categorie'];
        }
        return $cats;
    }

    public function blog_count($filter, $userId="")
    {
        $db = db_connect();
        $builder = $this->db->table('posts');
        $builder->select("count(posts.id) as total");
        // $builder->where("posts.active=", "n");
        $builder->join("user", "user.uid=posts.author");
        if ($filter["short"] == "author") {
            $builder->like("user.f_name", $filter["search"], "both");
        }
        if ($filter["short"] == "title") {
            $builder->like("posts.title", $filter["search"], "both");
        }
        if ($filter["category"]) {
            $builder->where("post_categories.categorie_id", $filter["category"]);
            $builder->join("post_categories", "post_categories.post_id=posts.id");
        }
        if ($filter["date"]) {
            $builder->where("YEAR(posts.date_)", date("Y", strtotime($filter["date"])));
            $builder->where("MONTH(posts.date_)", date("m", strtotime($filter["date"])));
        }
        if ($filter["visibility"] == "pub") {
            $builder->where("posts.visibility", "p");
        }
        if ($filter["visibility"] == "draft") {
            $builder->where("posts.visibility", "h");
        }
        if ($userId) {
            $builder->where("posts.author", $userId);
        }      
        //   $query = $builder->get();
        //    $query = $db->getLastQuery();
        //    $sql = $query->getQuery();
        //    $s = (string) $sql;   
        $res = $builder->get()->getResultArray();
        return $res;
    }

    public function blog_delete_process($id)
    {
        $sql = "UPDATE `posts` SET `active` = 'n', visibility='h' WHERE `id` =" . $id . "";
        $this->db->query($sql);
    }


    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // public function posts($page, $filter, $user="")
    // {
        
    //     $pager = \Config\Services::pager();
    //     $page = ($page - 1) * $filter["perpage"];
    //     $db = db_connect();
    //     //$sql = "CREATE OR REPLACE VIEW posts_views AS ";//,//post_keywords.keyword
    //     $sql= "SELECT posts.id,posts.title,posts.seo_url,posts.author,posts.visibility,posts.meta_tag as keyword,CONCAT(posts.date_,posts.time_)
    //     AS date_time,posts.date_,posts.time_,user.f_name as fname,user.l_name as lname,posts.active,loginCred.user_name,visitor.visit,post_categories.categorie_id, categories.categorie ";
    //     $sql.="FROM posts ";
 
    //     $sql.="LEFT JOIN loginCred ON loginCred.uid=posts.author ";
    //     $sql.="LEFT JOIN user ON user.uid=posts.author ";
    //     // $sql.="LEFT JOIN keyword.post_id=posts.id ";
    //     $sql.="LEFT JOIN visitor ON visitor.post_id=posts.id ";

    //     $sql.="LEFT JOIN post_categories ON post_categories.post_id = posts.id ";
    //     $sql.="INNER JOIN categories ON categories.id = post_categories.categorie_id ";
    //     if($filter["date"])
    //     {
    //         $sql.="WHERE YEAR(posts.date_)= ".date("Y",strtotime($filter["date"]))." " ;
    //         $sql.="AND MONTH(posts.date_)= ".date("m",strtotime($filter["date"]))." ";
    //         $sql.="And posts.active=1 ";
    //         // if($filter['search'])
    //         // {
    //             // $sql.="AND title LIKE '%".$filter['search']."%' ";
    //         // }
            
    //         $sql.="GROUP BY posts.id ";
    //         if($filter['short'])
    //         {
    //             if($filter['short']=='author')
    //             {
    //                 if($filter['search'])
    //                 {
    //                     $sql.="AND user.f_name LIKE'%".$filter['search']."%' ";
    //                 }
    //             }
    //             else
    //             {
    //                 if($filter['search'])
    //                 {
    //                     $sql.="AND title LIKE'%".$filter['search']."%' ";
    //                 }
    //             }
    //         }
    //         if($filter['order'])
    //         {
    //             $sql.= "ORDER BY posts.date_ ".$filter['order']." ";
    //         }
    //         else
    //         {
    //             $sql.="ORDER BY posts.date_ DESC";
    //         }
    //     }
    //     else if($filter['short'])
    //     {
    //         if($filter['short']=='author')
    //         {
    //             if($filter['search'])
    //             {
    //                 $sql.="Where user.f_name LIKE'%".$filter['search']."%' "; 
    //             }
    //         }
    //         else
    //         {
    //             $sql.= "AND title LIKE'%".$filter['search']."%' ";
    //         }
            
    //     }
    //     else if($filter['search'])
    //     {
            
    //         $sql.="WHERE title LIKE '%".$filter['search']."%' ";
    //         $sql.="And posts.active=1 ";
    //         $sql.="GROUP BY posts.id ";
    //         if($filter['order'])
    //         {
    //             $sql.= "ORDER BY posts.id ".$filter['order']." ";
    //         }
    //         else
    //         {
    //             $sql.="ORDER BY posts.date_ DESC";
    //         }
    //     }
        
    //     else if($filter['short'])
    //     {
    //         if($filter['short']=='author')
    //         {
    //             if($filter['search'])
    //             {
    //                 $sql.="AND user.f_name LIKE%'".$filter['search']."%' ";
    //             }
    //         }
    //         else
    //         {
    //             if($filter['search'])
    //             {
    //                 $sql.="AND title LIKE%'".$filter['search']."%' ";
    //             }
    //         }
    //         $sql.="And posts.active=1 ";
    //         $sql.="ORDER BY posts.date_ DESC";
    //     }
    //     else
    //     {
    //         $sql.= "WHERE posts.active=1 ";
    //         if($filter['author'])
    //         {
    //             $sql.="AND posts.author=".$filter['author'] ." ";
    //         }
    //         if($filter['category'])
    //         {
    //             $sql.="AND categories.categorie LIKE'%".$filter['category']."%' ";
    //         }
    //         if($filter['visibility']=="pub")
    //         {
    //             $sql.="AND posts.visibility='p' ";
    //         }
    //         if($filter['visibility']=="draft")
    //         {
    //             $sql.="AND posts.visibility='h' ";
    //         }
    //         $sql.="GROUP BY posts.id "; 
    //         if($filter['order'])
    //         {
    //             $sql.= "ORDER BY posts.id ".$filter['order']." ";
    //         }
    //         else
    //         {
    //             $sql.="ORDER BY posts.date_ DESC ";
    //         }
            
    //     }
    //     // echo'<pre>';
    //     // print_r($sql);die;
        
    //     $query = $db->query($sql);
    //    // $query = $builder->get();
    //     // echo $this->db->last_query();die;
    //     $postdata = $query->getResultArray();
    //     //   echo "<pre>";
    //     //   print_r($postdata );die;
    //     $posts = array();
    //     foreach ($postdata as $index => $post) {
    //         $posts[$index] = $post;
    //         $cats = $this->get_categorie($post['id']);
    //         $category_data = implode(", ", $cats);
    //         $posts[$index]['categorie'] = $category_data;
    //     }
    //     // echo "<pre>";
    //     // print_r($posts);die;
    //     return $posts;
    // }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function posts($pag, $filter, $user="")
    {
        // echo "<pre>";
        // print_r($filter);
        // print_r($pag);die;
        if(!empty($pag)){$page=$pag;}else{$page= '1';}
        $page = ($page - 1) * $filter["perpage"];

        $builder = $this->db->table('posts');
        $builder->select("posts.id,posts.title,posts.seo_url,posts.author,posts.visibility,posts.site_map,
        posts.meta_tag as keyword,CONCAT(posts.date_, posts.time_) AS date_time,posts.date_,posts.time_,user.f_name as fname,user.l_name as lname,posts.active,loginCred.user_name,visitor.visit");
        
        if ($filter["date"]) {
            $builder->where("YEAR(posts.date_)", date("Y", strtotime($filter["date"])));
            $builder->where("MONTH(posts.date_)", date("m", strtotime($filter["date"])));
            $builder->orderBy("posts.update_date", "DESC");
        }
        if ($filter["visibility"] == "pub") {
            $builder->where("posts.visibility", "p");
        }
        if ($filter["visibility"] == "draft") {
            $builder->where("posts.visibility", "h");
        }
        $builder->where("posts.active",true);

        if ($user) {
            $builder->where("posts.author", $user);
        }
        if ($filter["short"]) {
            if ($filter["short"] == "author") {
                $builder->like("user.f_name", $filter["search"], "both");
            }
            if ($filter["short"] == "title") {
                $builder->like("posts.title", $filter["search"], "both");
            }
            $builder->orderBy("posts.id", $filter["order"]);
        } else if ($filter["author"]) {
            $builder->where("posts.author", $filter["author"]);
            $builder->orderBy("posts.id", "DESC");
        } else {
            $builder->orderBy("posts.id", "DESC");
        }
        if ($filter["category"]) {
            $builder->where("post_categories.categorie_id", $filter["category"]);
            $builder->join("post_categories", "post_categories.post_id=posts.id");
        }
        if ($filter["search"]) {
          //  echo "ssss...".$filter["search"];die;
            $builder->like("posts.title", $filter["search"]);
            // $builder->join("post_categories", "post_categories.post_id=posts.id");
        }
        // return $page;

        $builder->orderBy("posts.id", "DESC");
        $builder->join("loginCred", "loginCred.uid=posts.author", "left");
        $builder->join("user", "user.uid=posts.author", "left");
        $builder->join("visitor", "visitor.post_id=posts.id", "left");
        $builder->groupBy("posts.id");
        $builder->limit($filter["perpage"],$page);
        // echo $this->db->last_query();die;
        $query = $builder->get();
     
        $postdata = $query->getResultArray();
        $posts = array();
        foreach ($postdata as $index => $post) {
            $posts[$index] = $post;
            $cats = $this->get_categorie($post['id']);
            $category_data = implode(", ", $cats);
            $posts[$index]['categorie'] = $category_data;
        }
        // echo "<pre>";
        // print_r($posts);die;
        return $posts;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // public function posts($page, $filter, $user="")
    // {
    //     //$pager = \Config\Services::pager();
    //     // $page = ($page - 1) * $filter["perpage"];

    //     $builder = $this->db->table('posts');
    //     $builder->select("posts.id,posts.title,posts.seo_url,posts.author,posts.visibility,posts.meta_tag as keyword,CONCAT(posts.date_, posts.time_) AS date_time,posts.date_,posts.time_,user.f_name as fname,user.l_name as lname,posts.active,loginCred.user_name,visitor.visit");

        // if ($filter["date"]) {
        //     $builder->where("YEAR(posts.date_)", date("Y", strtotime($filter["date"])));
        //     $builder->where("MONTH(posts.date_)", date("m", strtotime($filter["date"])));
        // }
        // if ($filter["visibility"] == "pub") {
        //     $builder->where("posts.visibility", "p");
        // }
        // if ($filter["visibility"] == "draft") {
        //     $builder->where("posts.visibility", "h");
        // }
        // $builder->where("posts.active",true);

        // if ($user) {
        //     $builder->where("posts.author", $user);
        // }
        // if ($filter["short"]) {
        //     if ($filter["short"] == "author") {
        //         $builder->like("user.f_name", $filter["search"], "both");
        //     }
        //     if ($filter["short"] == "title") {
        //         $builder->like("posts.title", $filter["search"], "both");
        //     }
        //     $builder->orderBy("posts.id", $filter["order"]);
        // } else if ($filter["author"]) {
        //     $builder->where("posts.author", $filter["author"]);
        //     $builder->orderBy("posts.id", "DESC");
        // } else {
        //     $builder->orderBy("posts.id", "DESC");
        // }
        // if ($filter["category"]) {
        //     $builder->where("post_categories.categorie_id", $filter["category"]);
        //     $builder->join("post_categories", "post_categories.post_id=posts.id");
        // }

    //     $builder->join("loginCred", "loginCred.uid=posts.author", "left");
    //     $builder->join("user", "user.uid=posts.author", "left");
    //     $builder->join("visitor", "visitor.post_id=posts.id", "left");
    //     $builder->groupBy("posts.id");
    //     $builder->limit($filter["perpage"], $page);
    //     $query = $builder->get();
    //     // echo $this->db->last_query();die;
    //     $postdata = $query->getResultArray();
    //     //   echo "<pre>";
    //     //   print_r($postdata );die;
    //     $posts = array();
    //     foreach ($postdata as $index => $post) {
    //         $posts[$index] = $post;
    //         $cats = $this->get_categorie($post['id']);
    //         $category_data = implode(", ", $cats);
    //         $posts[$index]['categorie'] = $category_data;
    //     }
    //     // echo "<pre>";
    //     // print_r($posts);die;
    //     return $posts;
    // }
    function count_post($user = "")
    {
        $db = db_connect();
        $builder = $this->db->table('posts');
        $builder->select("count(`id`) as `post`,visibility");
        $builder->where("posts.active", true);
        if($user){
            $builder->where("posts.author", $user);
        }
        $builder->groupBy("visibility");
        $res = $builder->get();
        $result = $res->getResultArray();

        $data["publish"] = 0;
        $data["draft"] = 0;
        $data["totalpost"] = 0;
        $data["trash"] = 0;
        foreach ($result as $r) {
            if ($r["visibility"] == "p") {
                $data["publish"] = $r["post"];
                $data["totalpost"] += $data["publish"];
            }
            if ($r["visibility"] == "h") {
                $data["draft"] = $r["post"];
                $data["totalpost"] += $data["draft"];
            }
        }
        $sql = "SELECT * FROM posts WHERE posts.active = 0";
        $query = $db->query($sql);
        $data["trashcount"] = $query->getNumRows();
        // $builder->where("posts.active", 0);
        // $delres = $builder->get();
        // $data["trashcount"] = $builder->countAllResults();
        return $data;
    }
    function getCatagory()
    {
        $builder = $this->db->table('post_categories');
        $builder->select("categories.categorie,categories.id");
        $builder->join("categories", "categories.id=post_categories.categorie_id");
        $builder->groupBy("post_categories.categorie_id");
        $res = $builder->get();
        return $res->getResultArray();
    }
    function dateList()
    {
        $builder = $this->db->table('posts');
        $builder->select("update_date");
        $builder->groupBy("YEAR(update_date),MONTH(update_date)");
        $res = $builder->get();
        return $res->getResultArray();
    }
   
    function data_all($id)
    {
      //  return $id;
        $sql = "SELECT * FROM `posts` WHERE `guid` LIKE '%".$id."%'";
       return $res = $this->db->query($sql)->getResultArray();    
        // return $res[0]['id'];
    }
    function update_data_all($id,$data)
    {
       // return $data;
        $builder = $this->db->table('posts');
        $builder->like('guid',$id);
        $builder->update($data);
        //$id = $id;
      //  $data = $data;
        return "Post Updated successfully...";

    }

}
