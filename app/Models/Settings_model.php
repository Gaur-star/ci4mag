<?php
namespace App\Models;

use CodeIgniter\Model;

class Settings_model extends Model
{
  public function get_setting()
  {
    $builder = $this->db->table('setting');
    $query = $builder->get();
    return $query->getResultArray();
  }
  public function settings_edit_process($postData)
  {
    $fname = $postData['upload_data']['file_name'];
    $path = "assets/setting-image/" . $fname;
    $sql = "UPDATE `setting` SET `site_logo`='" . $path . "',`site_email` = '" . $_POST['email'] . "',`site_desc` = '" . $_POST['description_'] . "',`site_keyword` = '" . $_POST['keyword'] . "', site_name = '" . $_POST['site_name'] . "'  WHERE `id` =1";
    $this->db->query($sql);
  }
  public function settings_edit_process_without_image($postData)
  {
    $sql = "UPDATE `setting` SET `site_email` = '" . $_POST['email'] . "',`site_desc` = '" . $_POST['description_'] . "',`site_keyword` = '" . $_POST['keyword'] . "', site_name = '" . $_POST['site_name'] . "'  WHERE `id` =1";
    $this->db->query($sql);
  }
  function setting_update($update)
  {
    foreach ($update as $key => $up) {
      if ($up) {
        $builder = $this->db->table('setting');
        $builder->where("id", $key);
        $builder->update(array("setting_value" => $up));
      }
    }
    $this->update_permalink($update["permalink"]);
  }
  function get_permalink()
  {
    $builder  =$this->db->table('permalink_list');
    $res = $builder->get();
    return $res->getResultArray();
  }
  function  update_permalink($permalink_id)
  {
    $builder = $this->db->table("permalink_list");
    $builder->update(array("status"=>"inactive"));
     
    $builder->where("permalinkListId",$permalink_id);
    $builder->update(array("status"=>"active"));
  }
}
