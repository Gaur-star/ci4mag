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
        //header("Content-Type: text/xml; charset=UTF-8");
        // parent::__construct();
        // $this->load->model('library_model');
        $this->library_model = new Library_model();
        // $this->load->model('front_model');
        $this->front_model = new Front_model();
        // $this->load->helper(['form', 'url']);
        helper(['form','url']);

        helper('form');
       // helper('xml');
        //$this->session = session();
      //  $this->cachemin = 1440;
        // $this->output->delete_cache();
        $this->pager = \Config\Services::pager();
    }

    /**
     * index
     * This funtion is responsible for the frontend view of home page
     * 
     * @return void view page for preview
     *
     */
    
    
     public function about()
    {
       // echo "ssssssssss";die;
     //  $data['posts']['first_row']=0
       $data['latest_news'] = $this->front_model->getNews($page = 1, $limit = 5, $cat = '');
       $data['settings'] = $this->front_model->getSetting();

    //    echo "<pre>";
    //    print_r($data['settings']);die;


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
               //echo $key.' f </br>';
                $new_tech_data['first_tech_row'][]=$value;
            }
            else if($key<6)
            {
             //echo $key.'s </br>';
             $new_tech_data['second_tech_row'][]=$value;
            }
            else if($key<10)
            {
             // echo $key.'t </br>';
                $new_tech_data['third_tech_row'][]=$value;
            }
    }
       $data['tec_post'] = $new_tech_data;


       $data['buisness_post'] = $this->front_model->get_buisness_post();
    //    echo "<pre>";
    //    print_r($data['buisness_post']);die;
       $new_bus_data = array(
        'first_bus_row' => array(),
        'second_bus_row' => array(),
        'third_bus_row' => array()
       );
       foreach($data['buisness_post'] as $key=>$value)
       {  
   
               if($key<2)
               {
                  //echo $key.' f </br>';
                   $new_bus_data['first_bus_row'][]=$value;
               }
               else if($key<6)
               {
                //echo $key.'s </br>';
                $new_bus_data['second_bus_row'][]=$value;
               }
               else if($key<10)
               {
                // echo $key.'t </br>';
                   $new_bus_data['third_bus_row'][]=$value;
               }
       }

       $data['bus_post'] = $new_bus_data;

       $data['categories'] = $this->front_model->get_all_cat();
    //    echo "<pre>";
    //    print_r($data['latest_news']);
    //    die;


        echo view("spin/html/header.php");
        echo view("pages/about.php",$data);
        echo view("spin/html/footer",$data);
    }

    public function contact()
    {
       // echo "ssssssssss";die;
     //  $data['posts']['first_row']=0
       $data['latest_news'] = $this->front_model->getNews($page = 1, $limit = 5, $cat = '');
       $data['settings'] = $this->front_model->getSetting();

    //    echo "<pre>";
    //    print_r($data['settings']);die;


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
               //echo $key.' f </br>';
                $new_tech_data['first_tech_row'][]=$value;
            }
            else if($key<6)
            {
             //echo $key.'s </br>';
             $new_tech_data['second_tech_row'][]=$value;
            }
            else if($key<10)
            {
             // echo $key.'t </br>';
                $new_tech_data['third_tech_row'][]=$value;
            }
    }
       $data['tec_post'] = $new_tech_data;


       $data['buisness_post'] = $this->front_model->get_buisness_post();
    //    echo "<pre>";
    //    print_r($data['buisness_post']);die;
       $new_bus_data = array(
        'first_bus_row' => array(),
        'second_bus_row' => array(),
        'third_bus_row' => array()
       );
       foreach($data['buisness_post'] as $key=>$value)
       {  
   
               if($key<2)
               {
                  //echo $key.' f </br>';
                   $new_bus_data['first_bus_row'][]=$value;
               }
               else if($key<6)
               {
                //echo $key.'s </br>';
                $new_bus_data['second_bus_row'][]=$value;
               }
               else if($key<10)
               {
                // echo $key.'t </br>';
                   $new_bus_data['third_bus_row'][]=$value;
               }
       }

       $data['bus_post'] = $new_bus_data;

       $data['categories'] = $this->front_model->get_all_cat();
    //    echo "<pre>";
    //    print_r($data['latest_news']);
    //    die;


        echo view("spin/html/header.php");
        echo view("pages/contact.php",$data);
        echo view("spin/html/footer",$data);
    }





}