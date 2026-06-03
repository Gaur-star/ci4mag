<?php
namespace App\Models;

use CodeIgniter\Model;

class Categorie_model extends Model
{
        public $table = "categorie_view";
        function total_catagory()
        {
                $builder = $this->db->table("categories");
                $res = $builder->get();
                return $builder->countAll();

        }
        function get_catagory($page,$per_page,$filter)
        {
                $db = db_connect();
               // $sql = "CREATE OR REPLACE VIEW categorie_view AS ";
                $sql="SELECT categories.*,count(pc.id) as post_count FROM categories ";
                $sql.="LEFT JOIN post_categories AS pc ON pc.categorie_id = categories.id ";
                if($filter)
                {
                        $sql.="WHERE categorie LIKE '%".$filter['search']."%' ";
                }
                $sql.="GROUP BY categories.id ";
                $sql.="ORDER BY categories.id DESC";

                $query = $db->query($sql);

                $builder = $this->db->table('categories');
                $start = ($page - 1) * $per_page;
                $builder->select("categories.*,count(pc.id) as post_count");
                if($filter){
                    $builder->like("categorie",$filter['search']);
                }
                $builder->join("post_categories AS pc", "pc.categorie_id=categories.id", "LEFT");
                $builder->limit($per_page, $start);
                $builder->groupBy("categories.id");
                $builder->orderBy("categories.id", "DESC");
                $res = $builder->get()->getResultArray();
                return $res;
        }
        function catagory_delete($cat_id)
        {
                if ($cat_id) {
                        $builder= $this->db->table('categories');
                        // $builder->trans_start();
                        $builder->where("id", $cat_id);
                        $builder->delete();
                        $builder = $this->db->table('post_categories');
                        $builder->where("categorie_id", $cat_id);
                        $builder->delete();
                        // $this->db->trans_complete();
                }
        }
        function add_category($data)
        {
                $builder = $this->db->table('categories');
                $builder->insert($data);
        }
        function catagory_detail($catagory_id)
        {
                $builder = $this->db->table("categories");
                $builder->select("*");
                $builder->where("id", $catagory_id);
                $res = $builder->get();
                return $res->getRowArray();
        }
        function update_category($edit_id, $data)
        {
                // echo "<pre>";
                // print_r($data);
                $builder = $this->db->table('categories');
                $builder->where("id", $edit_id);
                $builder->update($data);
        }
        function get_all_category()
        {
                $builder = $this->db->table('categories');
                $builder->select('id,categorie');
                $builder->where('active','y');
                $result = $builder->get();
                return $result->getResultArray();
        }
        function get_category_byId($id)
        {
                $builder = $this->db->table('categories');
                $builder->select('p_categorie');
                $builder->where('id',$id);
                $result = $builder->get();
                return $result->getRowArray();
        }
}
