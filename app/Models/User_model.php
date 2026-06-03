<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    
    function getUser()
    {
        $builder = $this->db->table('user');
        
        $builder->select('user.*,loginCred.*,role.role');
        $builder->join('loginCred', 'user.uid=loginCred.uid');
        $builder->join('role', 'role.role_id=loginCred.role');
        $res = $builder->get();
        $data = $res->getResultArray();
        $i = 0;
        foreach ($res->getResultArray() as $r) {
            $data[$i]['id'] = $r['id'];
            $data[$i]['uid'] = $r['uid'];
            $data[$i]['f_name'] = $r['f_name'];
            $data[$i]['email'] = $r['email'];
            $data[$i]['role'] = $r['role'];
            $data[$i]['user_name'] = $r['user_name'];
            $data[$i]['posts'] = $this->userPostCount($r['uid']);
            $i++;
        }
        return $data;
        // $this->db->select('user.*,loginCred.*,role.role');
        // $this->db->join('loginCred', 'user.uid=loginCred.uid');
        // $this->db->join('role', 'role.role_id=loginCred.role');
        // $res = $this->db->get('user');
        // $data = $res->result_array();
        // $i = 0;
        // foreach ($res->result_array() as $r) {
        //     $data[$i]['id'] = $r['id'];
        //     $data[$i]['uid'] = $r['uid'];
        //     $data[$i]['f_name'] = $r['f_name'];
        //     $data[$i]['email'] = $r['email'];
        //     $data[$i]['role'] = $r['role'];
        //     $data[$i]['user_name'] = $r['user_name'];
        //     $data[$i]['posts'] = $this->userPostCount($r['uid']);
        //     $i++;
        // }
        // return $data;
    }
    function userPostCount($author)
    {
        $builder = $this->db->table('posts');
        $builder->where('author', $author);
        $res = $builder->get();
        return $builder->countAllResults();
    }
    function get_details($data)
    {
        // print_r($data);die;
        $builder = $this->db->table('user');
        $builder->select('user.*,loginCred.*,role.role as rolename');
        $builder->where('user.uid', $data);
        $builder->join('loginCred', 'user.uid=loginCred.uid');
        $builder->join('role', 'role.role_id=loginCred.role');
        $res = $builder->get();
        return $res->getResultArray();
    }
    public function getRole()
    {
        
        $builder = $this->db->table('role');
        $builder->where('status', 'active');
        $res = $builder->get();
        return $res->getResultArray();
    }
    public function insert_data($login, $data)
    {
        // echo "<pre>";
        // print_r($login);
        // print_r($data);die;
        // $this->db->trans_start();
        $db = db_connect();
        $builder = $this->db->table('loginCred');
        $builder->insert($login);
        $data['uid'] = $db->insertId();
        $builder = $this->db->table('user');
        $builder->insert($data);
        // $this->db->trans_complete();
    }
    public function userupdate($id, $data, $login)
    {
        $db = db_connect();
       // $flag = 0;
        // echo "<pre>";
        // print_r($data['rolename']);die;
        
        $builder = $this->db->table("loginCred");
        
        if ($login) {
           // echo "flag is true". 'id is ' . $id;
            $builder = $this->db->table("loginCred");
            $builder->where('uid', $id);
            $builder->update($login);
        }
        // die;
        $builder =  $this->db->table('user');
        $builder->where('uid', $id);
        $builder->update($data);
    }
    public function get_categorie()
    {
        $db = db_connect();
        $query = $db->query(
            'SELECT * FROM `user` WHERE active=1 ORDER BY id DESC'
        );
        return $query->getResultArray();
    }
    function deleteUser($uid)
    {
        $builder = $this->db->table('loginCred');    
        $builder->where("uid",$uid);
        $builder->delete();
        $builder = $this->db->table('user');
        $builder->where("uid",$uid);
        $builder->delete();
    }
}
