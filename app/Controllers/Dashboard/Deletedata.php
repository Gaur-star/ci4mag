<?php
namespace App\Controllers;

use App\Models\Cron_model;
use CodeIgniter\Controller;

class Deletedata extends Controller
{
    public $Cron_model;

    function index(){
        $this->Cron_model = new Cron_model();
        $post_ids = $this->Cron_model->get_post_ids();

        $this->Cron_model->delete_from_post_cat($post_ids);
    }
}
