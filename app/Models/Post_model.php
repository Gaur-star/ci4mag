<?php

namespace App\Models;

use CodeIgniter\Model;

class Post_model extends Model
{

    public function __construct()
    {
        
        helper('cookie');
    }

    public function get_feature_image_url()
    {
        $query = $this->db->query(
            'SELECT image FROM `posts` WHERE LENGTH(image)>0 ORDER BY id DESC LIMIT 1'
        );
        foreach ($query->result() as $row) {
            $feature_image_url = $row->image;
        }

        return $feature_image_url;
    }


    /** old code is below */


    // public function insert_post_data($post, $first_src, $category)
    // {
    //     $db = db_connect();
    //     $builder = $db->table('posts');
    //     $builder->where('guid', $post['guid']);
    //     $post_check = $builder->get();
    //     if ($builder->countAll() == 0) {
    //         //return "sssss";die;
    //         if ($first_src) {
    //             $builder = $this->db->table('media');
    //             $builder->insert(['url' => $first_src, 'active' => 1, 'create_date' => date('Y-m-d H:i:s')]);
    //             $post['image'] = $db->insertId();
    //         }
    //         $builder = $this->db->table('posts');
    //         $insert_id = $builder->insert($post);
    //         if ($insert_id) {
    //             $this->insert_cat_data($category, $insert_id);
    //         }
    //         return $insert_id;
    //     } else {
    //         return false;
    //     }
    // }



    /** My new code is below */


    public function insert_post_data($p, $first_src, $cat)
    {
        // return $cat;
        $db = db_connect();
        $builder = $db->table('posts');
       // return $p;
       
       $insert_id = array();
        foreach($p as $key=>$value)
        {
            // $cat_id = array();
          //  return $value['title'];
           // return $value['guid'];die;
            if(!empty($value['guid']))
            {
               // return $value['guid'][0];
                $builder->where('guid', $value['guid']);
                $post_check = $builder->get()->getResultArray();

                if (count($post_check) == 0) {
                    if ($first_src) {
                      //  return $p;
    
                        $builder = $db->table('media');
                        $builder->insert(['url' => $first_src, 'active' => 1, 'create_date' => date('Y-m-d H:i:s')]);
        
                        $sql = "SELECT `id` FROM `media` ORDER BY `id` DESC LIMIT 1";
                        $last_id = $db->query($sql)->getResultArray();
                        $value['image'] = $last_id[0]['id'];
                       // return $last_id[0]['id'];
                       

                       $builder = $db->table('posts');
                       $insert = $builder->insert($value);
                       $insert_id['last_id'] = $db->insertID();
                      
                       
                    }
                    
                }

                 return $insert_id;
            }
            else{
                return false;
               }
   
        }
    //  die;
      
        
    }

    ////////////////////////////////////////////////////////////////////
    public function insert_cat_data($cat, $insert_id)
    { 
      //  $category = array();
       $category['cat'] = $cat;
     // return $category['cat'];die;
      $db = db_connect();
        if (isset($category['cat'])) {
            if ($category['cat'] && $insert_id) {
              //  return $cat;die;
               // $categories_array = explode(',', $categories["categories"]);
                foreach($category['cat'] as $k=>$v) {
                     // return $v;die;
                    $data['categorie'] = $v;
                    $slugy = str_replace(","," ",$v);
                    $slugy = explode(" ",$slugy);
                  // return $slugy;die;
                //     $slugy = str_replace(' ', '_', $slugy);
                //     $slugy = preg_replace('/[^a-zA-Z0-9\']/', '_', $slugy);
                //    $slugy = str_replace("'", '', $slugy);
                //       return $slugy;die;
            
                    // $data['slug'] = $slugy;
                    // $data['p_categorie'] = 0;
                    // $data['description'] = '';
                    // $data['meta_tag'] = '';
                    // $data['meta_desc'] = '';
                    // $data['active'] = 'y';
                    foreach($slugy as $s)
                    {
                        if(isset($s))
                        {
                            $builder = $db->table('categories');
                            $builder->select('id');
                            $builder->where('categorie', $s);
                             $check_exists_catagory = $builder->get()->getResultArray();
                            if (count($check_exists_catagory )>0) {
                                //  return $insert_id;die;

                                $data = [
                                    'post_id' => $insert_id,
                                    'categorie_id' => $check_exists_catagory[0]['id'],
                                ];
                                 $builder = $db->table('post_categories');
                                 $builder->insert($data);
                             }
                        }
                    }

                }
            }
        }
        // return "ssss";
       
    }
    ////////////////////////////////////////////////////////////////////
    public function delete_post_data($guid)
    {
        //echo $guid;die;
        $builder = $this->db->table('posts');
        $query1 = $builder
            ->select('id')
            ->where('guid', $guid)
            ->limit(1)
            ->get('posts');
        // $builder->last_query();
        $num_rows = $builder->countAll();
        $get_data = $query1->getRowArray();
        $post_id = '';
        if ($num_rows > 0) {
            $post_id = $get_data['id'];
            //echo $post_id;die;
        }
        //echo "<pre>".$post_id;
        // $this->db->where('post_id', $post_id);
        // $this->db->delete('post_categories');
        $this->db->query(
            'DELETE FROM post_categories WHERE post_id=' . $post_id
        );
        // $this->db->where('post_id', $post_id);
        // $this->db->delete('post_categories');
        ///////////////////////////////////
        $builder = $this->db->table('posts');
        $builder->where('guid', $guid);
        $builder->delete('posts');
    }
    ///////////////////////////////////////////

    ////////////////////////////////////////////////

    public function get_max_id()
    {
        $sql = 'SELECT MAX(ID) FROM `posts`';
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    // public function update_post_data($post, $first_src)
    // {
        // $db = db_connect();
        // $date_time = $post_date;
        // $new_date = date('Y-m-d', strtotime($date_time));
        // $new_time = date('H:i:s', strtotime($date_time));
        // //$db2 = $this->load->database('another', TRUE);

        // $data = [
        //     // 'id' => $post_id,
        //     'title' => $title,
        //     'content' => $content,
        //     'seo_url' => $seo_url,
        //     'meta_tag' => $tags,
        //     'image' => $image_url,
        //     'visibility' => 'Public',
        //     'date_' => $new_date,
        //     'time_' => $new_time,
        // ];
        // $builder = $this->db->table('posts');
        // $builder->where('guid', $guid);
        // $builder->update($data);
        // //$this->db->last_query();
        // $builder = $this->db->table('posts');
        // $query1 = $builder
        //     ->select('id')
        //     ->where('guid', $guid)
        //     ->limit(1)
        //     ->get();
        // // $builder->last_query();
        // $num_rows = $builder->countAll();
        // $get_data = $query1->getRowArray();

        // if ($num_rows > 0) {
        //     $post_id = $get_data['id'];
        //     $builder = $this->db->table('post_categories');
        //     $builder->where('post_id', $post_id);
        //     $builder->delete();
        // }
        // //////////////////////////////////////////
        // $str = $categories;
        // $a = explode(',', $str);
        // for ($i = 0; $i < count($a) - 1; $i++) {
        //     $slug = $a[$i];
        //     $text = strtolower($a[$i]);
        //     $text = str_replace(' ', '_', $text);
        //     $text = preg_replace('/[^a-zA-Z0-9\']/', '_', $text);
        //     $text = str_replace("'", '', $text);
        //     $builder = $this->db->table('categories');
        //     $query1 = $builder
        //         ->select('id')
        //         ->where('slug', $text)
        //         ->limit(1)
        //         ->get();
        //     // $builder->last_query();
        //     $num_rows = $builder->countAll();
        //     $get_data = $query1->getRowArray();

        //     if ($num_rows > 0) {
        //         $cat_id = $get_data['id'];
        //     } else {
        //         $data = [
        //             //'id' => $count,
        //             'categorie' => $a[$i],
        //             'slug' => $text,
        //         ];
        //         $builder = $this->db->table('categories');
        //         $builder->insert($data);
        //         $cat_id = $db->insertId();
        //     }

            ////////////////////////////////////
            // $data = [
            //     'post_id' => $post_id,
            //     'categories' => $a[$i],
            //     'categorie_id' => $cat_id,
            // ];
            // $db = db_connect();
            // $builder =$db->table('post_categories');
            // $builder->insert($data);
            //$this->db->last_query();
        
   // }
    ////////////////////////////////////////////
    function getCampaign($id)
    {
        $db = db_connect();
        $builder = $db->table('campaign');
        $builder->select('campaig_name,campaign_url,author,current_status,total_post,post_status,last_run');
        $builder->where('campaign_id', $id);
        $res = $builder->get();
        return $res->getRowArray();
    }
    function campaignUpdate($campaignId, $campaign)
    {
        $db = db_connect();
        $builder = $db->table('campaign');
        $builder->where('campaign_id',$campaignId);
        $builder->update($campaign);
        // $this->db->query(
        //     "UPDATE campaign SET last_run='" .
        //         $campaign['last_run'] .
        //         "',total_post=total_post+" .
        //         $campaign['total_post'] .
        //         ' WHERE campaign_id=' .
        //         $id
        // );
        // $this->db->where("campaign_id",$id);
        // $this->db->update("campaign", $campaign);
        // echo $this->db->last_query();
    }

    function get_guid(){
        $db = db_connect();
        $builder = $db->table('posts');
        $builder->select('guid');
        $res = $builder->get();
        $data = array();
        $result = $res->getResultArray();
        foreach($result as $res){
            $data[] = $res['guid'];
        }
        return $data;
    }


} //CI_Model class END
