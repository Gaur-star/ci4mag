<?php
namespace App\Controllers\admin;

use CodeIgniter\Controller;

use App\Models\Login_model;

class Login extends Controller
{
    public $login_model;
    function __construct()
    {
        $login_model = new Login_model();
    }

    public function index()
    {
        $session = session();
        $login_model = new Login_model();
        $ses = $session->get('usr');
            $loginDetail = $login_model->usercount();
            if ($loginDetail) {
                echo view('login');
            } else {
                $session->set("usr", array("id" => 1));
                return redirect()->to(base_url() . "/admin/posts");
            }
    }
    public function check_admin()
    {
        $session = session();
        $login_model = new Login_model();
        $user = $_POST['username'];
        $pass = $_POST['pass'];
        if (!empty($user)) {
            if(!empty($pass)){
                        $loginDetail = $login_model->login_check($user);
                        if($loginDetail)
                        {
                            $hashed_password = $loginDetail['password'];
                            if (password_verify($pass, $hashed_password)) {
                                $data["usr"] = $loginDetail["uid"];
                                $data["role"] = $loginDetail["role"];
                                $data["f_name"] = $loginDetail["f_name"];
                                $data["l_name"] = $loginDetail["l_name"];
                                $session->set($data);
                                return redirect()->to(base_url() . "/admin/dashboard");
                            }
                            else
                            {
                                $msg = '<div class="alert alert-danger alert-dismissible">
                                <a href="'. base_url("login")  .'" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                Your user id or password mismatched!
                                </div>';
                                $session->setFlashdata('msg',$msg);
                                return redirect()->to(base_url() . "/login");
                            }
                        }
                        else
                        {
                            $msg = '<div class="alert alert-danger alert-dismissible">
                                <a href="'. base_url("login") .'" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                Your user id or password mismatched!
                                </div>';
                            $session->setFlashdata('msg',$msg);
                            return redirect()->to(base_url()."/login");    
                        }
            }else{
                $msg = '<div class="alert alert-danger alert-dismissible">
                        <a href="'. base_url("login") .'" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        PLease enter Password!
                        </div>';
                    $session->setFlashdata('msg',$msg);
                    return redirect()->to(base_url()."/login");  
            }
        }else{
                $msg = '<div class="alert alert-danger alert-dismissible">
                    <a href="'. base_url("login") .'" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    PLease enter user!
                    </div>';
                $session->setFlashdata('msg',$msg);
                return redirect()->to(base_url()."/login");  
        }
  
    }





}
