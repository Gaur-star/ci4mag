<?php
namespace App\Controllers;

use App\Models\Front_model;
use CodeIgniter\Controller;

class Page_not_found extends Controller
{
    private $cachemin;
    public $front_model;
    public $session; 
    public $form_validation;

    function __construct()
    {
        $this->front_model = new Front_model();
        helper(['form','url']);
        helper('form');
        // header('HTTP/1.0 404 Not Found', true, 404);
    }

    public function index()
    {
        $data["metas"] = array();
        $data["metas"][] = '<meta charset="utf-8">';
        $data['settings'] = $this->front_model->getSetting();
        $data['top_menu'] = $this->front_model->getMenu($menu = 1);
        $data['footer_menu'] = $this->front_model->getMenu($menu = 3);
        $data['category'] = $this->front_model->getMenu($menu = 2);
        $data['category_footer'] = $this->front_model->getMenu($menu = 4);
        $data['page'] = $this->front_model->getPageLink();
        $data['add'] = $this->front_model->add_data();
        $data['header_menu'] = $this->front_model->get_header_menu(4);
        $data['categories'] = $this->front_model->get_all_cat();

        $data['latest_news'] = $this->front_model->getNews(
            $page = 1,
            $limit = 5,
            $cat = ''
        );
        $data['trending'] = $this->front_model->trendingPost();
        $data['cat_latest_post'] = $this->front_model->cat_latest_post();
        $data['popular'] = $this->front_model->getPopularNews($limit = '4');
        $getHomepageCat = $this->front_model->getTopcat();
        $data["title"] = $data['settings'][0]["setting_value"];
        if ($data['settings'][4]["setting_value"]) {
            $data["metas"][] = '<meta name="keywords" content="' . $data['settings'][4]["setting_value"] . '">';
        }
        if ($data['settings'][4]["setting_value"]) {
            $data["metas"][] = '<meta name="description" content="' . $data['settings'][4]["setting_value"] . '">';
        }
        $getHomepageCat = $this->front_model->getHomepageCat();
        // print_r($getHomepageCat);die;
        foreach ($getHomepageCat as $key => $homecat) {
            $data['homepagepost'][$key]['post'] = $this->front_model->getNews(
                $page = 1,
                $limit = $homecat['post_limit'],
                $cat = $homecat['category_id']
            );
            $data['homepagepost'][$key]['post_title'] = $homecat['categorie'];
        }
        
        echo view("theme/newsfeed/header", $data);
        echo view("theme/newsfeed/404",$data);
        echo view("theme/newsfeed/footer", $data);
    }
}
