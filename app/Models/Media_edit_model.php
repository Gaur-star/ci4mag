<?php

namespace App\Models;

use CodeIgniter\Model;

class Media_edit_model extends Model
{
       protected $table="media";
       public function get_media($page, $per)
       {

              $db = db_connect();
           //   $sql = "CREATE OR REPLACE VIEW media_view AS ";
              $sql="SELECT media.*,user.f_name,user.l_name ";
              $sql.="FROM media ";
              $sql.="LEFT JOIN user ON user.uid=media.author ";
              $sql.="WHERE media.active = 1 ";
              $sql.="ORDER BY media.id DESC ";
             // $sql="CREATE OR REPLACE VIEW media_view AS SELECT media.* FROM media LEFT JOIN user ON user.uid=media.author WHERE media.active = 1 ORDER BY media.id DESC";
              //  $query = $this->db->getLastQuery();
              // echo (string)$query;die;


              $query = $db->query($sql);
              $builder = $this->db->table('media');
              $count = ($page - 1) * $per;
              $builder->select("media.*,user.f_name,user.l_name");
              $builder->where('media.active', 1);
              $builder->orderBy('media.id', 'desc');
              $builder->limit($per, $count);
              $builder->join("user", "user.uid=media.author", "LEFT");
              $query = $builder->get();
              return $query->getResultArray();
       }
       public function media_edit_process($postData)
       {
              $sql = "UPDATE `media` SET `title` = '" . $_POST['title'] . "',`caption` = '" . $_POST['caption'] . "',`alt_text` = '" . $_POST['alt_text'] . "',`description` = '" . $_POST['description_'] . "' WHERE `id` =" . $_POST['id_'] . ";";
              $this->db->query($sql);
       }
       public function media_delete_process($id)
       {
              $db = db_connect();
              $sql = "UPDATE `media` SET `active` = 0 WHERE `id` =".$id;
              $db->query($sql);
       }

       public function media_count()
       {
              $builder =  $this->db->table('media');
              $builder->where("active", 1);
              $res = $builder->get();
              return $builder->countAll();
       }

       public function pagination($id)
       {
              $page = $id * 5;
              $query = $this->db->query("SELECT * FROM `media` WHERE active='y' ORDER BY id DESC LIMIT " . $page . " , 5");
              return $query->getResultArray();
       }

       public function search()
       {
              $search = $_REQUEST['search'];
              // $page=$id*2;
              // echo $page;
              // die;
              $query = $this->db->query("SELECT * FROM `media` WHERE active='y' AND title like '%" . $search . "%' ORDER BY id DESC LIMIT 0 , 5  ");
              return $query->getResultArray();
       }
       public function search_media_count()
       {
              $search = $_REQUEST['search'];
              // $page=$id*2;
              // echo $page;
              // die;
              $query = $this->db->query("SELECT count(*) FROM `media` WHERE active='y' AND title like '%" . $search . "%'");
              return $query->getResultArray();
       }
       public function search_pagination($id)
       {

              $page = $id * 5;
              $search = $_REQUEST['search'];
              // echo $page;
              // die;
              $query = $this->db->query("SELECT * FROM `media` WHERE active='y' AND title like '%" . $search . "%' ORDER BY id DESC LIMIT " . $page . " , 5");
              return $query->getResultArray();
       }
       function get_gallery($page)
       {
              $count = 20;
              $offset = ($page - 1) * $count;
              $builder = $this->db->table("media");
              $builder->where("active", 1);
              $builder->orderBy("id", "DESC");
              $builder->limit($count, $offset);
              $res = $builder->get();
              $imglink = "";
              foreach ($res->getResultArray() as $key => $r) {
                     $data[$key] = $r;
                     if ($r['aws_path']) {
                            $imglink = $r['aws_path'];
                         // $imglink = "https://" . $r['bucket'] . ".s3." . $r['region'] . ".amazonaws.com/" . $r['aws_path'];
                     } else {
                            $imglink = $r["url"];
                     }
                     $data[$key]["url"] = $imglink;
              }

              return $data;
       }
       function deleteMedia($id)
       {
              if (is_numeric($id)) {
                     $builder = $this->db->table("media");
                     $builder->where("id", $id);
                     $res = $builder->delete();
                     // echo $id;die;
              }
       }
       function search_media($name)
       {
              $builder = $this->db->table("media"); 
              $builder->like('url', $name); 
              return $builder->get()->getResultArray();
       }
       function uploadImage($data)
       {
              // echo "<pre>";
              // print_r($data);die;
              $builder = $this->db->table("media");
              $builder->insert($data);
       }
}
