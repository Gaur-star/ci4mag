<?php

function fillPost($p,$count)
{
    $db = db_connect();
    // return $count;
    // echo $p."posts"; die;
    // $this->db->where("post_type", "post");
    // $mediaurl=$mediaurl;
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