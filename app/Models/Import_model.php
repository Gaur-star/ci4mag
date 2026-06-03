<?php
namespace App\Models;

use CodeIgniter\Model;
// use Exception;
class Import_model extends Model
{
    protected $table   = 'setting';
    function insert_method($json)
    {
        // echo "<pre>";
        // print_r($json);die;
        $builder = $this->db->table('posts');
        foreach ($json[7]["data"] as $post) {
            if ($post["post_type"] == "post") {
                $p["id"] = $post["ID"];
                $p["guid"] = $post["guid"];
                $p["title"] = $post["post_title"];
                $p["seo_url"] = $post["post_name"];
                $p["image"] = "";
                $p["content"] = $post["post_content"];
                $p["author"] = $post["post_author"];
                if ($post["post_status"] == "draft") {
                    $p["visibility"] = "h";
                }
                if ($post["post_status"] == "publish") {
                    $p["visibility"] = "p";
                }
                $p["date_"] = date("Y-m-d", strtotime($post["post_modified"]));
                $p["time_"] = date("H:i:s", strtotime($post["post_modified"]));
                $p["active"] = 1;
                $p["date_time"] = $post["post_date"];
                $p["update_date"] = $post["post_modified"];
                $builder->insert($p);
            }
            if ($post["post_type"] == "attachment") {
                $attach["url"] = $post["guid"];
                $attach["alt_text"] = $post["post_title"];
                $attach["active"] = 1;
                $attach["create_date"] = date("Y-m-d H:i:s");
                $this->db->insert("media", $attach);
                $lastattachId=$this->db->insert_id();
                $this->db->insert("post_image", array("post_id" => $post["post_parent"], "media_id" => $lastattachId));
            }
        }
        $builder = $this->db->table('categories');
        foreach ($json[9]["data"] as $cat) {
            $c["id"] = $cat["term_id"];
            $c["categorie"] = $cat["name"];
            $c["slug"] = $cat["slug"];
            $builder->insert($c);
        }
        $builder = $this->db->table('post_categories');
        foreach ($json[10]["data"] as $catrel) {
            $cr["post_id"] = $catrel["object_id"];
            $cr["categorie_id"] = $catrel["term_taxonomy_id"];
            $builder->insert($cr);
        }
        
        foreach ($json[13]["data"] as $user) {
            $builder = $this->db->table('loginCred');
            $u["uid"] = $user["ID"];
            $u["user_name"] = $user["user_login"];
            $u["email"] = $user["user_email"];
            $u["role"] = 1;
            $u["password"] = "";
            if ($user["user_status"] == 0) {
                $u["status"] = 1;
            }
            $builder->insert($u);
            $builder = $this->db->table("user");
            $us["uid"] = $u["uid"];
            $us["nick_name"] = $user["user_nicename"];
            $us["f_name"] = $user["display_name"];
            $us["active"] = 1;
            $us["create_date"] = $user["user_registered"];
            $us["update_date"] = $user["user_registered"];
            $builder->insert($us);
        }
    }
    function truncat()
    {
       // $db      = \Config\Database::connect();
   //     $builder = $this->db->table('setting');
        $table = ["comments", "posts","postPreview","categories","post_image", "media", "pages", "pastUrl", "post_categories", "visitor", "post_keywords", "cat_homepage", "menu_list", "menu", "campaign", "menu_list"];
    //    echo "<pre>";
    //    print_r($table);die;
        foreach ($table as $tab) {

            // echo "<pre>";
            // print_r("'".$tab."'");die;
         //   $tab = "'".$tab."'";
            $builder = $this->db->table($tab);
            
            $builder->truncate();
            // echo "sss";die;
            
         //   $this->db->table()
          //  echo "ssssp";die;
            // $this->db->query("ALTER TABLE "."'". $tab ."'"." AUTO_INCREMENT = 1");
            // $builder->update(array("setting_value" => "", "update_date" => ""));
        }
        $sql1 = "DELETE FROM `loginCred` WHERE `uid`!=33 AND `uid`!=40";
        $this->db->query($sql1);
        $sql2 = "DELETE FROM `user` WHERE `uid`!=33 AND `uid`!=40";
        $this->db->query($sql2);
    }
    function droptable()
    {
        $table = ['temp_post', 'temp_terms', 'temp_term_relationships', 'temp_term_taxonomy', 'temp_users'];
        foreach ($table as $tab) {
            $this->db->query("DROP TABLE " . $tab);
        }
    }
    function createtable()
    {
        $this->db->trans_start();
        $this->db->query("CREATE TABLE temp_post(`ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        $this->db->query("CREATE TABLE `temp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

        $this->db->query("CREATE TABLE `temp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

        $this->db->query("CREATE TABLE `temp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

        $this->db->query("CREATE TABLE `temp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
        $this->db->trans_complete();
    }
    function filltempdb($json)
    {
        // $res=$this->db->query("show tables like 'prefix_%'"); 
        foreach ($json as $j) {
            if (isset($j["name"])) {
                $tabname = explode("_", $j["name"]);
                array_shift($tabname);
                $tabname = implode("_", $tabname);

                if ($tabname == "posts") {
                    foreach ($j["data"] as $jsontempdata) {
                        $builder = $this->db->table("temp_post");
                        $builder->insert($jsontempdata);
                    }
                }
                if ($tabname == "terms") {
                    foreach ($j["data"] as $jsontempdata) {
                        $builder = $this->db->table("temp_terms");
                        $builder->insert($jsontempdata);
                    }
                }
                if ($tabname == "term_relationships") {
                    foreach ($j["data"] as $jsontempdata) {
                        $builder = $this->db->table("temp_term_relationships");
                        $builder->insert($jsontempdata);
                    }
                }
                if ($tabname == "term_taxonomy") {
                    foreach ($j["data"] as $jsontempdata) {
                        $builder = $this->db->table("temp_term_taxonomy");
                        $builder->insert($jsontempdata);
                    }
                }
                if ($tabname == "users") {
                    foreach ($j["data"] as $jsontempdata) {
                        $builder = $this->db->table("temp_users");
                        $builder->insert($jsontempdata);
                    }
                }
            }
        }
    }

    function importsql()
    {
        $builder = $this->db->table("setting");
        $builder->where("id", 12);
        $res = $builder->get();
        $imname = $res->getRowArray();
        if ($imname["setting_value"]) {
            $filename = $imname["setting_value"];            
            $templine = '';
            // Read in entire file
            $lines = file($filename);

            // Loop through each line
            foreach ($lines as $line)
             {     
                // Skip it if it's a comment
                if (substr($line, 0, 2) == '--' || $line == '')
                    continue;

                // Add this line to the current segment
                $templine .= $line;
                // If it has a semicolon at the end, it's the end of the query
                if (substr(trim($line), -1, 1) == ';') {
                    // Perform the query
                    $this->db->query($templine);
                    // Reset temp variable to empty
                    $templine = '';
                }
             }
        }
    }
    
    function deleteImportedTables()
    {
        $permanent_table = array("adsence", "campaign", "categories", "cat_homepage", "comments", "contact_form", "postPreview", "ipblocklist", "loginCred", "media", "page_backup", "pages", "pastUrl", "past_backup", "post_categories", "post_deleted", "post_image", "post_keywords", "posts", "privilege_block", "role", "setting", "user", "visitor", "menu", "menu_list", "permalink_list", "categorie_view", "media_view", "media_views", "pages_view", "pages_views", "trash_views", "trash_view");
        // $this->db->where("id", 13);
        // $tab = $this->db->get("setting");
        // $prefix = $tab->row_array();
        // if ($prefix["setting_value"]) {
        // $res = $this->db->query("SHOW TABLES LIKE '" . $prefix["setting_value"] . "%'");
        $res = $this->db->query("SHOW TABLES");
        // echo "<pre>";
        // print_r($res->getResultArray());die;
        foreach ($res->getResultArray() as $importtables) {
            $tabname = array_shift($importtables);
            if (!in_array($tabname, $permanent_table)) {
               // echo $tabname;die;
                $this->db->query("DROP TABLE `".$tabname."`");
            }
        }
        // }
    }
    function getPrefix()
    {
        $builder = $this->db->table("setting");
        $builder->where("id", 11);
        $res = $builder->get();
        $imname = $res->getRowArray();
       // echo $imname["setting_value"];die;
        return  $imname["setting_value"];
    }
    function updateDatabase($count)
    {
      //  echo "sss";die;
      $count = $count;
    //  $mediaurl = $mediaurl;
     // $remain = $remain;
     
        $prefix = $this->getPrefix();
      //  echo "sss".$prefix;die;
        if ($prefix) {
            $post = $this->fillPost($prefix,$count);
            return $post;
            // else if($remain == "continue")
            // {
            //    // return $remain;
            //     $this->filluser($prefix);
            //     $this->fillcategory($prefix);
            //     $this->filltags($prefix);
            //    $this->fillimages($prefix);
            //    $this->fillmasteruser();
            // }

          
        }
    }

  
    function fillPost($p,$count)
    {
        $db = db_connect();
        // return $count;

       // echo $p."posts"; die;
        //$this->db->where("post_type", "post");
   //     $mediaurl=$mediaurl;
        $count = $count;
        $i = $count;
        $j = 5;    //5 at a time
        $builder = $this->db->table($p."posts");
        $builder->where("post_status", "publish");
        $builder->orWhere("post_status", "draft");
       // $total = $builder->get()->getResultArray();
        $res = $builder->get($j,$i);
        $result = $res->getResultArray();

       $sql1 = "SELECT `ID` FROM `".$p."posts` WHERE (`post_type`='post') AND (`post_status`='publish' OR `post_status`='draft') ORDER BY `ID` DESC LIMIT 1";
       $query = $db->query($sql1);
       $po_id = $query->getResultArray();
      //  return $po_id[0]['ID'];

       $sql2 = "SELECT `ID` FROM `".$p."posts` WHERE (`post_type`='page') AND (`post_status`='publish' OR `post_status`='draft') ORDER BY `ID` DESC LIMIT 1";
       $query = $db->query($sql2);
       $page_id = $query->getResultArray();



        foreach ($result as $post) {
            

            if ($post["post_type"] == "post") {
               // return "sssss";
              //  echo "sssss";die;
                $check_po = $post["ID"];
                $po["id"] = $post["ID"];
                $po["guid"] = $post["guid"];
                $po["post_parent"] = $post["post_parent"];
                $po["title"] = htmlentities($post["post_title"]);
                $guid_check = $post['guid'];
                if($guid_check != 'https://spindigit.com/'){
                    $po["seo_url"] = preg_replace("/\d/u", "", $post["post_name"]);
                }else{$po["seo_url"] = $post["post_name"];}
                // $po["seo_url"] = $post["post_name"];
                $po["image"] = 0;
                $po["content"] = htmlentities($post["post_content"]);
                $po["author"] = $post["post_author"];
                $po["seo_url_text"] = $post["post_name"];
                $po["seo_url_no"] = 0;
                if ($post["post_status"] == "draft") {
                    $po["visibility"] = "h";
                    $po["site_map"] = 0;
                    $po["news_sitemap"] = 0;
                    $po["nofollow"] = 1;
                    $po["indexed"] = 0;
                }
                if ($post["post_status"] == "publish") {
                    $po["visibility"] = "p";
                    $po["site_map"] = 1;
                    $po["news_sitemap"] = 1;
                    $po["nofollow"] = 0;
                    $po["indexed"] = 1;
                }



                $po["meta_tag"] =  $this->getMetadetail($post["ID"], $p, "_aioseo_keywords");
                $po["meta_desc"] = $this->getMetadetail($post["ID"], $p, "_aioseo_description");
                $po["date_"] = date("Y-m-d", strtotime($post["post_modified"]));
                $po["time_"] = date("H:i:s", strtotime($post["post_modified"]));
                $po["active"] = 1;
                $po["date_time"] = $post["post_date"];
                $po["update_date"] = $post["post_modified"];
                
                // echo '<pre>';
                // print_r($po);die;
              //  $post_status = $this->db->table("posts")->get()->getResultArray();
                $builder = $this->db->table("posts");

                    if($check_po<=$po_id[0]['ID'])
                    {
                       $builder->insert($po);
                     //  return $count;
                      // return $po["id"]."---".$check;
                    } 

            }
            if ($post["post_type"] == "page") {

                $chk_pg =$post["ID"];
                
                $page["id"] = $post["ID"];
                $page["title"] = htmlentities($post["post_title"]);
                $page["seo_url"] = $post["post_name"];
                $page["content"] = htmlentities($post["post_content"]);
                $page["author"] = $post["post_author"];
                // $page["seo_url_text"] = $post["post_name"];
                // $page["seo_url_no"] = 0;
                if ($post["post_status"] == "draft") {
                    $page["visibility"] = "h";
                    $page["sitemap"] = 0;
                }
                if ($post["post_status"] == "publish") {
                    $page["visibility"] = "p";
                    $page["sitemap"] = 1;
                }
                
                $page["meta_tag"] =  $this->getMetadetail($post["ID"], $p, "_aioseo_keywords");  
                $page["meta_desc"] =  $this->getMetadetail($post["ID"], $p, "_aioseo_description");
                $page["active"] = 1;
                $page["cur_date"] = $post["post_modified"];
               // print_r($page);die;
               
              //  $page_status = $this->db->table("pages")->get()->getResultArray();
                $builder = $this->db->table("pages");


                    if($chk_pg<=$page_id[0]['ID'])
                    {
                        $builder->insert($page);
                     //   return $count;
                       // return $page["id"]."---".$chk;
                    }

            }

            if ($post["post_type"] == "attachment") {
                $attach["url"] = $post["guid"];
                $attach["alt_text"] = $post["post_title"];
                $attach["active"] = 1;
                $attach["create_date"] = date("Y-m-d H:i:s");
                $this->db->insert("media", $attach);
                $lastattachId=$this->db->insert_id();
                $this->db->insert("post_image", array("post_id" => $post["post_parent"], "media_id" => $lastattachId));
            }


        //  echo $this->db->last_query();
        }
        $i = $i+$count;

        $sql3 = "SELECT `id` FROM `posts` ORDER BY `id` DESC LIMIT 1";
        $query = $db->query($sql3);
        $last_po = $query->getResultArray();

        $sql4 = "SELECT `id` FROM `pages` ORDER BY `id` DESC LIMIT 1";
        $query = $db->query($sql4);
        $last_pg = $query->getResultArray();


        if((!empty($last_po[0]['id'])&&($last_po[0]['id']==$po_id[0]['ID'])) && (!empty($last_pg[0]['id'])&&($last_pg[0]['id']==$page_id[0]['ID'])))
        {
            // return $last_po[0]['id']."done".$po_id[0]['ID'];
            return "done";
        }
        else
        {
            return $count;
        }  
    }



    

    function remain_updateDatabase($mediaurl)
    {
        $mediaurl = $mediaurl;
        $prefix = $this->getPrefix();
        if($prefix)
        {
               $fill_user = $this->filluser($prefix);
            //   return $fill_user;
               if($fill_user == "done")
               {
                $fill_cat = $this->fillcategory($prefix);
               }
               if($fill_cat=="done")
               {
                $fill_tag = $this->filltags($prefix);
                if($fill_tag == "done")
                {
                    $fill_img = $this->fillimages($prefix,$mediaurl);
                    if($fill_img == "done")
                    {
                        return "success";
                    }
                    
                }
                
               }
        }
    }



    function filluser($p)
    {
        $builder = $this->db->table($p."users");
      //  echo $p;die;
        $res = $builder->get();
        $result = $res->getResultArray();

     //   $var=array();
        foreach ($result as $user) {
            $u["uid"] = $user["ID"];
            $u["user_name"] = $user["user_login"];
            $u["email"] = $user["user_email"];
           // $u["role"] = 1;
            $u["password"] = "";
            
         //  return $this->getUserRole($p, $u["uid"]);
           
            if($this->getUserRole($p, $u["uid"])==1)
            {
                  //  continue;
                  $u['role'] = 3;
            }
            else{
                $u["role"] = current($this->getUserRole($p, $u["uid"]));
            }
            //  return  $u["role"];

                if ($user["user_status"]) {
                    $u["status"] ='active';
                }else{
                    $u["status"] = 'inactive';
                }
                $builder = $this->db->table("loginCred");
                // if(is_array($u["role"]))
                // {
                    $builder->insert($u);
              //  }
                $us["uid"] = $user["ID"];
                $us["nick_name"] = $user["user_nicename"];
                $us["f_name"] = $user["display_name"];
                // $us["active"] = ($u["status"] == 'active') ? 1: 0;
                $us["active"]=1;
                $us["create_date"] = $user["user_registered"];
                $us["update_date"] = $user["user_registered"];
                $builder = $this->db->table("user");

                    $builder->insert($us);
            
         //   echo "sss";die;

                
        }
        return "done";


    }


    function fillcategory($p)
    {
        $builder = $this->db->table($p."terms");
        $builder->where($p . "term_taxonomy.taxonomy", "category");
        $builder->join($p . "term_taxonomy", $p . "term_taxonomy.term_id=" . $p . "terms.term_id");
        $res = $builder->get();
        $result = $res->getResultArray();
        //  echo '<pre>';
        // print_r($result);die;

        if ($result) {
            foreach ($result as $cat) {
                $c["id"] = $cat["term_taxonomy_id"];
                $c["categorie"] = $cat["name"];
                $c["slug"] = $cat["slug"];
                $c["p_categorie"]=0;
                $builder = $this->db->table("categories");
                $builder->insert($c);
            }
        }
        $builder = $this->db->table($p."term_relationships");
        $builder->where($p . "term_taxonomy.taxonomy", "category");
        $builder->join($p . "term_taxonomy", $p . "term_taxonomy.term_taxonomy_id=" . $p . "term_relationships.term_taxonomy_id");
        $res1 = $builder->get();
        $result1 = $res1->getResultArray();
        if ($result1) {
            foreach ($result1 as $catrel) {
                $cr["post_id"] = $catrel["object_id"];
                $cr["categorie_id"] = $catrel["term_taxonomy_id"];
                $builder = $this->db->table("post_categories");
                $builder->insert($cr);
            }
        }
        return "done";
    }


    function filltags($p)
    {
        $builder = $this->db->table($p."terms as t");
        $builder->select("*");
        $builder->where("tt.taxonomy", "post_tag");
        $builder->join($p . "term_taxonomy as tt", "tt.term_id=t.term_id");
        $builder->join($p . "term_relationships as tr", "tr.term_taxonomy_id=tt.term_taxonomy_id");
        $res = $builder->get();
        $result = $res->getResultArray();
        // echo "<pre>";
        // print_r($result);die;
        if ($result) {
            foreach ($result as $cat) {
                $c["post_id"] = $cat["object_id"];
                $c["keyword"] = $cat["name"];
                $c["slug"] = $cat["slug"];
                $builder = $this->db->table("post_keywords");
                $builder->insert($c);
            }
            return "done";
        }
       // return "done";
    }
    



    function fillimages($p,$mediaurl)
    {
        $mediaurl = $mediaurl;
        $result = $this->db->query("SHOW TABLES LIKE '".$p."as3cf_items'");
        if (isset($result)){
            $builder = $this->db->table($p."posts as post");
            $builder->select("aws.*,post.guid,post.post_title,post.post_author,post.post_parent,pm.meta_value");
            $builder->where("post.post_type", "attachment");
            $builder->where("pm.meta_key", "_wp_attachment_metadata");
            $builder->join($p."as3cf_items as aws", "aws.source_id=post.ID", "left");
            $builder->join($p."postmeta as pm", "pm.post_id=post.ID", "left");
            $res = $builder->get();
            $result = $res->getResultArray();
        // echo "<pre>";
        // print_r($result);die;
        if ($result) {
            foreach ($result as  $post) {
                $attach["url"] = $post["guid"];
                $attach["alt_text"] = $post["post_title"];
                $attach["provider"] = $post["provider"];
                $attach["region"] = $post["region"];
                $attach["bucket"] = $post["bucket"];
                if(!empty($mediaurl))
                {
                    $attach["aws_path"] = $mediaurl."/".$post["original_path"];
                }else{
                    $attach["aws_path"] = $post["original_path"];
                }
                $attach["author"] = $post["post_author"];
                $attach["attachment_metadata"] = $post["meta_value"];
                $attach["active"] = 1;
                $attach["create_date"] = date("Y-m-d H:i:s");
                $builder = $this->db->table("media"); 
                $builder->insert($attach);
               // $lastattachId = $builder->InsertID();
                // $query = $query->query("SELECT `id` FROM `media` ORDER BY id DESC LIMIT 1");
                // $lastattachId= $query->getRow();
                $query = $this->db->query("SELECT `id` FROM `media` ORDER BY id DESC LIMIT 1");
                $lastattachId = $query->getRowArray();
                // print_r($lastattachId);die;
                $builder = $this->db->table("posts");
                $builder->where("id", $post["post_parent"]);
                $builder->update(array("image" => $lastattachId));
                // echo "sss";die;
            }
        }
        } else {
            $builder = $this->db->table("posts");
            $builder->where("post_status", "attachment");
            $res = $builder->get($p . "posts");
            $result = $res->getResultArray();
            if ($result) {
                foreach ($result as  $post) {
                    $attach["url"] = $post["guid"];
                    $attach["alt_text"] = $post["post_title"];
                    $attach["author"] = $post["post_author"];
                    $attach["active"] = 1;
                    $attach["create_date"] = date("Y-m-d H:i:s");
                    $builder = $this->db->table("media");
                    $builder->insert($attach);
                    $query = $this->db->query("SELECT `id` FROM `media` ORDER BY id DESC LIMIT 1");
                    $lastattachId = $query->getRowArray();
                    $builder = $this->db->table("posts");
                    $builder->where("id", $post["post_parent"]);
                    $builder->update(array("image" => $lastattachId));
                }
            }
        }
        return "done";
    }


    function updateSettingDbname($db, $pre)
    {
        $builder  = $this->db->table("setting");
        $builder->where("id", 12);
        $builder->update(array("setting_value" => $db));
        $builder = $this->db->table("setting");
        $builder->where("id", 11);
        $builder->update(array("setting_value" => $pre));
        if ($builder->countAll() > 0) {
            return true;
        } else {
            return false;
        }
    }
    // function fillmasteruser()
    // {
    //     $u["user_name"] = "admin";
    //     $u["email"] = "rameshwar@elphilltechnology.com";
    //     $u["role"] = 1;
    //     $u["password"] = password_hash("123", PASSWORD_DEFAULT);
    //     $u["status"] = 1;
    //     $builder = $this->db->table("loginCred");

    //     $builder->where("email","rameshwar@elphilltechnology.com");
    //     $builder->select('uid');
    //     $x=$builder->get()->getResultArray();

    //     $us["uid"] = $x[0];
    //     $us["nick_name"] = "admin";
    //     $us["f_name"] = "admin";
    //     $us["active"] = 1;
    //     $us["create_date"] = date("Y-m-d H:i:s");
    //     $us["update_date"] = date("Y-m-d H:i:s");
    //     // echo '<pre>';
    //     // print_r($us);die;
    //     $builder = $this->db->table("user");
    //     $builder->insert($us);
    // }



    function getUserRole($p, $uid)
    {
        $builder = $this->db->table($p."usermeta");
      //  $builder->select('meta_value');
        $builder->where("user_id", $uid);
        $builder->like("meta_key", "%capabilities");
        $res = $builder->get();
        $result = $res->getRowArray();
        // print_r($result);die;
      //  $flag==0;
      //  $res=array();
        if(isset($result["meta_value"]))
        {
            try{
                $res = array_key_first(unserialize($result["meta_value"]));
             //   print_r($res);die;
            // return $res;

               // throw new \Exception("error");

                if(is_string($res)) {
                    // return $res;
                    return $this->getRoleId($res);
                }
            }
            catch(\Exception $e)
            {

                return 1;

            }
            
        }
        else{
            return false;
        }
    // continue;

        
    }


    function getRoleId($role)
    {
        $builder = $this->db->table("role");

        $builder->where("role", $role);
        $res = $builder->get();
        return $res->getRowArray();
    }


    function getMetadetail($postid, $prefix, $value)
    {
        $p = $prefix;
        $builder = $this->db->table($p."postmeta");
        $builder->select("meta_value");
        $builder->where("post_id", $postid);
        $builder->where("meta_key", $value);
        $res = $builder->get();
        if (isset($res->getRowArray()["meta_value"])) {
            return $res->getRowArray()["meta_value"];
        } else {
            return false;
        }
    }
}
