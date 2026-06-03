<?php
namespace App\Models;

use CodeIgniter\Model;

class Adsence_model extends Model
{
    // protected $table = 'adsence';
    // protected $primaryKey = 'id';

    // protected $allowedFields = ['header', 'sidebar'];


  function adsence_update($data)
  {
    // echo "<pre>";
    // print_r($data);
    // die;
    
      if ($data) {
        $builder = $this->db->table('adsence');
        $builder->where("id", $data['id']);
        $builder->update(array(
            'header' => $data['header'],
            'sidebar' => $data['sidebar']
                            ));
      }
    
    // $this->update_permalink($update["permalink"]);
  }
  function old_data()
  {
    $builder  =$this->db->table('adsence');
    $res = $builder->get();
    return $res->getResultArray();
  }

    public function get_setting()
    {
    $builder = $this->db->table('setting');
    $query = $builder->get();
    // echo $this->db->getLastQuery();
    // die;
    return $query->getResultArray();
    }
    function get_permalink()
  {
    $builder  =$this->db->table('permalink_list');
    $res = $builder->get();
    return $res->getResultArray();
  }
}
