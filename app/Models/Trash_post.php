<?php
namespace App\Models;

use CodeIgniter\Model;

class Trash_post extends Model
{
    protected $table = 'trash_view';

    public function getTrash()
    {
        $db = db_connect();
        $sql = "CREATE OR REPLACE VIEW ";
    }

}
