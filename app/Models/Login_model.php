<?php
namespace App\Models;

use CodeIgniter\Model;

class Login_model extends Model
{
   
        public function login_check($user)
        {   
             $builder = $this->db->table('loginCred as lc');   
             $builder->select("user.f_name,user.l_name,lc.role,lc.password,lc.uid");
             $builder->where("lc.user_name", $user);
             $builder->where("lc.status","active");
             $builder->join("user","lc.uid=user.uid","left");
             $query = $builder->get();
             return $query->getRowArray();
             //$new = $query->getRowArray();
             
            //  print_r($new);
            //  die;
        //      $this->db->select("user.f_name,user.l_name,lc.role,lc.password,lc.uid");
        //      $this->db->where("lc.user_name", $user);
        //      $this->db->where("lc.status","active");
        //      $this->db->join("user","lc.uid=user.uid","left");
        //      $query = $this->db->get("loginCred as lc");
        //      return $query->row_array();
        }
        function usercount(){
                $builder = $this->db->table('loginCred');
                $builder->where("status","active");
                $query = $builder->get();
                return $builder->countAllResults();
        }
        public function get_role($id)
        {
                $builder = $this->db->table('loginCred');
                $builder->select('role');
                $builder->where('uid',$id);
                $query = $builder->get();
                return $query->getRowArray();
        }
}
