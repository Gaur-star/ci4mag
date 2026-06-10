<?php
namespace App\Controllers;

use App\Models\Front_model;
use App\Models\Library_model;
use App\Models\Blog_add_model;
use CodeIgniter\Controller;


class FooterPages extends Controller
{
    private $cachemin;
    public $library_model;
    public $front_model;
    public $form_validation;
    public $session; 
    public $blog_add_model;
           

    function __construct()
    {
        $this->library_model = new Library_model();
        $this->front_model = new Front_model();
        helper(['form','url']);

        helper('form');
        $this->pager = \Config\Services::pager();
    }
    
    
     public function about()
    {
       $data['latest_news'] = $this->front_model->getNews($page = 1, $limit = 5, $cat = '');
       $data['settings'] = $this->front_model->getSetting();

       $data['posts']=$this->front_model->fetch_the_post();
       $new_data = array(
        'first_row' => array(),
        'second_row' => array()
       );
    foreach($data['posts'] as $key=>$value)
    {  
            if($key<4)
            {
                $new_data['first_row'][]=$value;
            }
            else
            {
                $new_data['second_row'][]=$value;
            }
    }
    $data['post'] = $new_data;


    $data['tech_post'] = $this->front_model->get_tech_post();
    $new_tech_data = array(
        'first_tech_row' => array(),
        'second_tech_row' => array(),
        'third_tech_row' => array()
       );
    foreach($data['tech_post'] as $key=>$value)
    {  

            if($key<1)
            {
                $new_tech_data['first_tech_row'][]=$value;
            }
            else if($key<6)
            {
             $new_tech_data['second_tech_row'][]=$value;
            }
            else if($key<10)
            {
                $new_tech_data['third_tech_row'][]=$value;
            }
    }
       $data['tec_post'] = $new_tech_data;


       $data['buisness_post'] = $this->front_model->get_buisness_post();

       $new_bus_data = array(
        'first_bus_row' => array(),
        'second_bus_row' => array(),
        'third_bus_row' => array()
       );
       foreach($data['buisness_post'] as $key=>$value)
       {  
   
               if($key<2)
               {
                   $new_bus_data['first_bus_row'][]=$value;
               }
               else if($key<6)
               {
                $new_bus_data['second_bus_row'][]=$value;
               }
               else if($key<10)
               {
                   $new_bus_data['third_bus_row'][]=$value;
               }
       }

       $data['bus_post'] = $new_bus_data;

       $data['categories'] = $this->front_model->get_all_cat();

        echo view("spin/html/header.php");
        echo view("pages/about.php",$data);
        echo view("spin/html/footer",$data);
    }

    public function contact()
    {

       $data['latest_news'] = $this->front_model->getNews($page = 1, $limit = 5, $cat = '');
       $data['settings'] = $this->front_model->getSetting();

       $data['posts']=$this->front_model->fetch_the_post();
       $new_data = array(
        'first_row' => array(),
        'second_row' => array()
       );
    foreach($data['posts'] as $key=>$value)
    {  
            if($key<4)
            {
                $new_data['first_row'][]=$value;
            }
            else
            {
                $new_data['second_row'][]=$value;
            }
    }
    $data['post'] = $new_data;


    $data['tech_post'] = $this->front_model->get_tech_post();
    $new_tech_data = array(
        'first_tech_row' => array(),
        'second_tech_row' => array(),
        'third_tech_row' => array()
       );
    foreach($data['tech_post'] as $key=>$value)
    {  

            if($key<1)
            {
                $new_tech_data['first_tech_row'][]=$value;
            }
            else if($key<6)
            {
             $new_tech_data['second_tech_row'][]=$value;
            }
            else if($key<10)
            {
                $new_tech_data['third_tech_row'][]=$value;
            }
    }
       $data['tec_post'] = $new_tech_data;


       $data['buisness_post'] = $this->front_model->get_buisness_post();
       $new_bus_data = array(
        'first_bus_row' => array(),
        'second_bus_row' => array(),
        'third_bus_row' => array()
       );
       foreach($data['buisness_post'] as $key=>$value)
       {  
   
               if($key<2)
               {
                   $new_bus_data['first_bus_row'][]=$value;
               }
               else if($key<6)
               {
                $new_bus_data['second_bus_row'][]=$value;
               }
               else if($key<10)
               {
                   $new_bus_data['third_bus_row'][]=$value;
               }
       }

       $data['bus_post'] = $new_bus_data;

       $data['categories'] = $this->front_model->get_all_cat();

        echo view("spin/html/header.php");
        echo view("pages/contact.php",$data);
        echo view("spin/html/footer",$data);
    }





}