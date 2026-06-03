<?php
namespace App\Models;

use CodeIgniter\Model;

class Cron_model extends Model
{
  public function delete_post($id){
    $builder = $this->db->table('posts');
    $builder->where("id",$id);
    $builder->orwhere("guid",$id);
    $builder->update(array("active"=>0));
  }

  public function getCampaign(){
    $builder = $this->db->table('campaign');
    $res=$builder->get();
    return $res->getResultArray();
  }

  public function insert_post_data($p, $first_src, $cat)
  {
    $db = db_connect();
    $builder = $db->table('posts'); 
    $insert_id = array();
    foreach($p as $key=>$value)
    {
        if(!empty($value['guid']))
        {
            $builder->where('guid', $value['guid']);
            $post_check = $builder->get()->getResultArray();

            if (count($post_check) == 0) {
                if ($first_src) {
                   $builder = $db->table('media');
                   $builder->insert(['url' => $first_src, 'active' => 1, 'create_date' => date('Y-m-d H:i:s')]);
    
                   $sql = "SELECT `id` FROM `media` ORDER BY `id` DESC LIMIT 1";
                   $last_id = $db->query($sql)->getResultArray();
                   $value['image'] = $last_id[0]['id'];                  

                   $builder = $db->table('posts');
                   $insert = $builder->insert($value);
                   $insert_id['last_id'] = $db->insertID();                  
                }                
            }
             return $insert_id;
        }else{
            return false;
        }
    }    
 }

    public function insert_cat_data($cat, $insert_id)
    { 
        $category['cat'] = $cat;
        $db = db_connect();
        if (isset($category['cat'])) {
        if ($category['cat'] && $insert_id) {

            foreach($category['cat'] as $k=>$v) {               
                $data['categorie'] = $v;
                $slugy = str_replace(","," ",$v);
                $slugy = explode(" ",$slugy);
         
                foreach($slugy as $s)
                {
                    if(isset($s))
                    {
                        $builder = $db->table('categories');
                        $builder->select('id');
                        $builder->where('categorie', $s);
                        $check_exists_catagory = $builder->get()->getResultArray();
                        if (count($check_exists_catagory )>0) {
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
   
}
    function campaignUpdate($campaignId, $campaign)
    {
        $db = db_connect();
        $builder = $db->table('campaign');
        $builder->where('campaign_id',$campaignId);
        $builder->update($campaign);

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

    function get_post_ids()
    {
        $db = db_connect();
        $sql ="SELECT id FROM posts WHERE `content` != ' ' ";
        $post_id = $this->db->query($sql)->getResultArray();
        foreach($post_id as $post){
            $postids[] = $post['id'];
        }
        return $postids;
    }

    function delete_from_post_cat($ids){
    
        $db = db_connect();
        $sql = "SELECT DISTINCT post_id FROM post_categories ORDER BY id desc";
        $id1 = $this->db->query($sql)->getResultArray(); 
        foreach($id1 as $id){
            if(!in_array($id['post_id'], array_values($ids))){
                // $sql = "DELETE FROM post_categories WHERE `post_id` = '{$id['post_id']}' ";
                // $this->db->query($sql);
                $builder = $this->db->table('post_categories');
                $builder->where("post_id", $id['post_id']);
                $builder->delete();
        
                
            }
           
        }
    }

}
