<?php
namespace App\Controllers\admin;

use App\Models\User_model;
use CodeIgniter\Controller;

class User extends Controller
{
  public $session;
  public $login;
  public $fname;
  public $user_model;
  public $roleId;
  public $role;
  public function __construct()
  {
    $this->session =  session();
    $this->login = $this->session->get("usr");    
    $this->fname = $this->session->get("f_name");
    if (!$this->login) {
      return redirect()->to(base_url() . "login");
      die;
    }
    $this->user_model = new User_model();
    helper(array('form', 'url'));
    helper('form');
    helper('webbuild_usable');
    $this->roleId = $this->session->get('role');
    $this->role = get_role( $this->roleId);
  }

  public function index()
  {
    if(!$this->login)
    {
      return redirect()->to(base_url() . "/login");
    }
    if (!in_array("adduser", $this->role)) {
      $data['role'] = $this->user_model->getRole();
      $data['u_firstname'] = $this->fname;
      echo view('admin/header',$data);
      echo view('admin/sidebar');
      echo view('admin/user',$data);
      
    }
  }

  function email_validation($str) {
    return (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str))? FALSE : TRUE;    
    }

  public function user_add_process()
  {    
    helper(array('form','helper'));
    $validation =  \Config\Services::validation();
    $validation->setRules([
      'uname'=> 'required|is_unique[loginCred.user_name]',
      'pword'=> 'required',
      'email'=> 'required|is_unique[loginCred.email]'
      ]);
     if(!$validation->withRequest($this->request)->run())
    {
      $this->session->setFlashdata("msg", '<div class="alert alert-danger alert-dismissible fade show" role="alert">' .$validation->listErrors(). '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
      </button>
      </div>');
      return redirect()->to(base_url('admin/user'));
    }
    else
    {
      $login["user_name"] = trim($_POST['uname']);
      $login["password"] = password_hash($_POST['pword'], PASSWORD_DEFAULT);
      $login["email"] = trim($_POST['email']);
      $login['email'] = strtolower($login['email']);
      $data['f_name'] = $_POST['fname'];
      $data['l_name'] = $_POST['lname'];
      $data['website'] = $_POST['website'];
      $login['role']  = $_POST['role_'];
      if(!$this->email_validation($login['email']))
      {
        $this->session->setFlashdata("msg",'<div class="alert alert-danger alert-dismissible fade show" role="alert">'."Valid email id is required".'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        </div');
        return redirect()->to(base_url('admin/user'));
      }
      $this->user_model->insert_data($login,$data);
      $this->session->setFlashdata("msg",'<div class="alert alert-danger alert-dismissible fade show" role="alert">User Added Successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
      </button></div>');
      return redirect()->to(base_url("admin/userlist"));      
    }
}

  public function user_list()
  {
    if(!$this->login)
    {
      return redirect()->to(base_url() . "/login");
    }

    if (!in_array("userlist", $this->role)) {

      $data['user'] = $this->user_model->getUser();
      $data['u_firstname'] = $this->fname;
      echo view('admin/header',$data);
      echo view('admin/sidebar');
      echo view('admin/userlist', $data);
      echo view('admin/footer');
    }
  }

  public function  user_edit($id)
  {
    $data['user'] = $this->user_model->get_details($id);
    $data['roles'] = $this->user_model->getRole();
    $data['u_firstname'] = $this->fname;
    echo view('admin/header',$data);
    echo view('admin/sidebar');
    echo view('admin/user_details_edit', $data);
    echo view('admin/footer'); 
  }
  
  function useredit_process($id)
  {
    $request = \Config\Services::request();
    $login = array();
    $this->session->setFlashdata("message","");
    if(($this->session->get('role')==1))
    {
      if($request->getPost("username"))
      {
        $login["user_name"] = trim($request->getPost("username"));
      }
      if($request->getPost("new_password"))
      {        
      if($request->getPost("new_password")!=trim($request->getPost('confirm_password')))
      {
        $this->session->setFlashdata("message","New password and  Confirm password mismatch");
      }
      else{
      $login["password"] = trim(password_hash($request->getPost('confirm_password'),PASSWORD_DEFAULT));
      $this->session->setFlashdata("message","");
      }
      }
        if($request->getPost('email'))
        {
          $login['email'] = trim($request->getPost("email"));
          $login['email'] = strtolower($login['email']);
        }
        if($request->getPost('rolename'))
        {
          $login['role'] = trim($request->getPost('rolename'));
        }
        $file = $request->getFile('image');
        if(isset($file) && (!empty($file->getClientName())))
        {
            $validationRule = [
              'rules' => 'uploaded[image]'
                  . '|is_image[image]'
                  . '|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',        
            ];

            if (!$this->validate($validationRule)){
              $this->session->setFlashdata("image_error","rules is not a valid uploaded file.");
              return redirect()->to(base_url() . "/admin/userlist/user_edit/" . $id);
            }
            else
            {
              if ($file->isValid() && ! $file->hasMoved())
              {
                $file->move(ROOTPATH.'assets/user-image');
                $img = $file->getClientName();
                $data["image"] = "assets/user-image/".$img;
              }
            }
        }
        $data['f_name'] = $request->getPost("f_name");
        $data['l_name'] = $request->getPost("l_name");
        $data['nick_name'] = $request->getPost("nick_name");
        $data['website'] = $request->getPost("website");
        $data['biography'] = $request->getPost("biography");
        $data['update_date'] = date("Y-m-d H:i:s");
        $this->user_model->userupdate($id,$data,$login);
        $this->session->setFlashdata("message","Your Profile Updated!");
        return redirect()->to(base_url() . "/admin/userlist/user_edit/" . $id);  
      
    }
    else
    {
      $this->session->setFlashdata("message","Only Admin can update Users...");
      return redirect()->to(base_url() . "/admin/userlist/user_edit/" . $id);
    }  
  }

  function profileDetail()
  {
    $userid = $this->session->get("usr");
    if(!$this->login)
    {
      return redirect()->to(base_url() . "/login");
    }
    $data['user'] = $this->user_model->get_details($userid);
    if($this->roleId==1){
      $data['roles'] = $this->user_model->getRole();
    }
    $data['u_firstname'] = $this->fname;
    $data['roleId'] = $this->session->get("role");

    echo view('admin/header',$data);
    echo view('admin/sidebar');
    echo view('admin/user_details_edit',$data);
    echo view('admin/footer');
  }

  function deleteUser($uid)
  {
    $this->user_model->deleteUser($uid);
    return redirect()->to(base_url() . "/admin/userlist");
  }

}
