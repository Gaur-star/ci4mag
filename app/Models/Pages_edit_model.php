<?php
namespace App\Models;
use CodeIgniter\Model;


      class Pages_edit_model extends Model{
        public function get_pages()
        {
                $this->db->select('*');
                $this->db->where('active !=','n');
                $this->db->order_by('id', 'desc');
                $this->db->limit(5);
                $query = $this->db->get('pages');
               return $query->result_array();
				
        }
        public function page_count()
        {
        $query = $this->db->query("SELECT count(*) FROM `pages` WHERE active='y'");
        return $query->result_array();		
        }
        public function get_page_details($id)
        {
                $this->db->select('*');
                $this->db->where('id',$id);
                $query = $this->db->get('pages');
               return $query->result_array();
				
        }
        public function pagination($id)
        {
            //$db = db_connect();
               $page=$id*5;
               $query = $this->db->query("SELECT * FROM `pages` WHERE active='y' ORDER BY id DESC LIMIT ".$page." , 5");
               return $query->result_array();
              }

              public function search()
              {
                   $search=$_REQUEST['search'];
                    // $page=$id*5;
                     $query = $this->db->query("SELECT * FROM `pages` WHERE active='y' AND title like '%".$search."%' ORDER BY id DESC LIMIT 0 , 5");
                     return $query->result_array();
                    }
                    public function search_page_count()
        {
              $search=$_REQUEST['search'];
        $query = $this->db->query("SELECT count(*) FROM `pages` WHERE active='y' AND title like '%".$search."%' ");
        return $query->result_array();		
        }
        public function search_pagination($id)
        {
              $search=$_REQUEST['search'];
               $page=$id*5;
               $query = $this->db->query("SELECT * FROM `pages` WHERE active='y' AND title like '%".$search."%' ORDER BY id DESC LIMIT ".$page." , 5");
               return $query->result_array();
              }

}