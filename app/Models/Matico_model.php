<?php
namespace App\Models;

use CodeIgniter\Model;

class Matico_model extends Model
{
 
    function addCampaignProcess($data)
    {
        $builder = $this->db->table('campaign');
        $builder->insert($data);
    }
    function getCampaign(){
        $builder = $this->db->table('campaign');
        $builder->join("user","user.uid=campaign.author","left");
        $res=$builder->get();
        return $res->getResultArray();
    }
    function getCampaignById($id){
        $builder = $this->db->table('campaign');
        $builder->where("campaign.campaign_id",$id);
        $builder->join("user","user.uid=campaign.author","LEFT");
        $res=$builder->get();
        return $res->getRowArray();
    }
    function updateCampaignProcess($id,$data){
        $builder = $this->db->table('campaign');
        $builder->where("campaign_id",$id);
        $builder->update($data);
    }
    function deleteCampaign($id)
    {
        $builder = $this->db->table('campaign');
        $builder->where('campaign_id',$id);
        $builder->delete();
    }
}
