<?php
namespace App\Controllers\admin;

use App\Models\Import_model;
use CodeIgniter\Controller;

class Import extends Controller
{
    public $import_model;
    public $session;

    function __construct()
    {
        $this->session = session();
        $login = $this->session->get("usr");
        if (!$login) {
            return redirect()->to(base_url() . "/login");
            die;
        }
        $this->import_model = new Import_model();
        helper(array('form', 'url'));
    }

    public function index()
    { 
        $request = \Config\Services::request();
        $dbname = $request->getPost("db_name");
        $prefix = $request->getPost("prefix");
        $res = $this->import_model->updateSettingDbname($dbname, $prefix);
        $this->importsql();
        return redirect()->to(base_url() . "/admin/admin/importpage");
    }

    public function truncat()
    {        
        $this->import_model->truncat();
        return redirect()->to(base_url() . "/admin/admin/importpage");
    }

    function importsql()
    {        
        $this->import_model->importsql();
        return redirect()->to(base_url() . "/admin/admin/importpage");
    }

    function deleteImportedTables()
    {        
        $this->import_model->deleteImportedTables();
        return redirect()->to(base_url() . "/admin/admin/importpage");
    }

    function updateDatabase()
    {        
        $request=\Config\Services::request();
        $mediaurl=$request->getPost("mediaurl");
        $count=$request->getPost("count");
        $remain = $request->getPost("remain");
        $cache = \Config\Services::cache();
        $cache->clean();
        $res = $this->import_model->updateDatabase($count); 
        if($res!="done")
        {
            print_r($res);
        }else if($res=="done"){
           $rs = $this->import_model->remain_updateDatabase($mediaurl); 
           if($rs == "success")
           {
            echo $rs;
            die;
           }           
        }
    }

    function test()
    {
        $rs = $this->import_model->getUserRole($p='wp09fns_',$uid=7); 
        print_r($rs);die;
    }

}
