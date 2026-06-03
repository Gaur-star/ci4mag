<?php
namespace App\Models;
use CodeIgniter\Model;


class Page_model extends Model
{
    protected $table = "pages";

    function getPage($page, $perpage, $filter)
    {
        // $count = $this->pageCount();
        $start = ($page - 1) * $perpage;
        $sql = "SELECT pages.*, user.nick_name FROM pages ";
        $sql.= "LEFT JOIN  user  ON  user .uid=pages.author ";
        $sql.= "WHERE `pages`.`active` = 1 ";
        if($filter['search'])
        {
            $sql .="AND pages.title LIKE'%" . $filter['search'] ."%' " ;
        }
        if($filter['author'])
        {
            $sql .= "AND pages.author = " . $filter['author'] . " ";
        }
        $sql.="ORDER BY pages.cur_date DESC ";
        $db = db_connect();
        $query = $db->query($sql);
       
        $builder = $this->db->table('pages');
        $builder->SELECT("pages.*,user.nick_name");
        $builder->where("pages.active", 1);
        
        if($filter['search'])
        {
            $builder->like('pages.title',$filter['search']);
        }
        $builder->join("user","user.uid=pages.author","LEFT");
        $builder->limit($perpage, $start);
        $builder->orderBy("pages.cur_date","DESC");
        $res = $builder->get();
       
        return $res->getResultArray();
    }

    // function getPage($page, $perpage, $userId, $filter)
    // {
    //     $count = $this->pageCount();
    //     $start = ($page - 1) * $perpage;
    //     $sql = "SELECT pages.*, user.nick_name FROM pages ";
    //     $sql.= "LEFT JOIN  user  ON  user .uid=pages.author ";
    //     $sql.= "WHERE `pages`.`active` = 1 ";
    //     if($filter['search'])
    //     {
    //         $sql .="AND pages.title LIKE'%" . $filter['search'] ."%' " ;
    //     }
    //     if($filter['author'])
    //     {
    //         $sql .= "AND pages.author = " . $filter['author'] . " ";
    //     }
    //     $sql.="ORDER BY pages.cur_date DESC ";
    //     $db = db_connect();
    //     $query = $db->query($sql);
       
    //     $builder = $this->db->table('pages');
    //     $builder->SELECT("pages.*,user.nick_name");
    //     $builder->where("pages.active", 1);
        
    //     if($filter['search'])
    //     {
    //         $builder->like('pages.title',$filter['search']);
    //     }
    //     $builder->join("user","user.uid=pages.author","LEFT");
    //     $builder->limit($perpage, $start);
    //     $builder->orderBy("pages.cur_date","DESC");
    //     $res = $builder->get();
       
    //     return $res->getResultArray();
    // }


    function pageCount($userId="")
    {
        $builder = $this->db->table('pages');
        $builder->select("count(id) as total");
        $builder->where("active", 1);
        if($userId){
            $builder->where("author",$userId);
        }
      
        $res = $builder->get();
        return $res->getRowArray();
    }
    function deletePage($id)
    {
        $builder = $this->db->table('pages');
        if (is_numeric($id)) {
            $builder->where("id", $id);
            $builder->delete();
        }
    }
    function countImgPage($perPage)
    {
        $builder = $this->db->table('media');
        $builder->select("id");
        $builder->where("active", 1);
        $res = $builder->get();
        $total = $builder->countAll();
        $total_page = ceil($total / $perPage);
        return $total_page;
    }
    function getPageDetail($id)
    {
        $builder = $this->db->table('pages');
        $builder->where("id", $id);
        $res = $builder->get();
        return $res->getRowArray();
    }
    function pageUpdate($id, $data)
    {
        $builder = $this->db->table('pages');
        $builder->where("id", $id);
        $builder->update($data);
    }
    function page_trash($id)
    {
        $sql = "UPDATE `pages` SET `active` = '0',visibility='h' WHERE `id` =" . $id . "";
        $this->db->query($sql);

    }

    function get_trash_page()
    {
        $builder = $this->db->table('pages');
        $builder->where("active","0");
        $res=$builder->get();
        return $res->getResult();
    }

    function restore_trash_page($id)
    {
        $sql = "UPDATE `pages` SET `active` = '1',visibility='p' WHERE `id` =" . $id . "";
        $this->db->query($sql);
    }
    function trash_page_count()
    {
        // $builder = $this->db->table('pages');
        // $builder->where("active",0);
        // $total=$builder->countAll();
        // return $total;
        // $total="SELECT COUNT(*) FROM `pages` WHERE active=0";
        // $builder=$this->db->query($total);
        // return $builder;
        $sql="SELECT * FROM `pages` WHERE active=0";
        $builder=$this->db->query($sql);
        $x=$builder->getResultArray();
        return $x;

    }

    function trash_page_delete_all($id)
    {
        $builder=$this->db->table('pages');
        $id = explode(',', $id);
        foreach ($id as $id) {
            $builder->where('id', $id);
            $builder->delete();
        }
       // $builder->delete();
    }
}
