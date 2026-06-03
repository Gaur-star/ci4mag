<?php
namespace App\Controllers\admin;

use CodeIgniter\Controller;

class Page_not_found extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('library_model');
        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
        $this->load->model('front_model');
    }

    public function index()
    {
        $data['settings'] = $this->front_model->getSetting();
        $data['category'] = $this->front_model->getCategory();
        $data['page'] = $this->front_model->getPageLink();
        $data['latest_news'] = $this->front_model->getNews(
            $page = 1,
            $limit = 5,
            $cat = ''
        );
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
        echo "404";
        // $this->load->view('theme/' . THEME . '/header', $data);
        // $this->load->view('theme/' . THEME . '/menu');
        // $this->load->view('theme/' . THEME . '/404');
        // $this->load->view('theme/' . THEME . '/bottom');
        // $this->load->view('theme/' . THEME . '/footer');
    }
}
