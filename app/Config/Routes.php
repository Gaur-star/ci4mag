<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */



$routes->get('/', 'Dashboard\Home::spin');
$routes->get('category/(:any)', 'Dashboard\Home::catagoryPost/$1');
$routes->get('clear_cache', 'Dashboard\Home::claercache');
$routes->get('/author/(:any)', 'Dashboard\Home::author_post/$1') ;
$routes->get('posts/sitemap-page/(:any)', 'Dashboard\Home::catagoryPost/$1');


$routes->get('login', 'Login::index');
$routes->post('login/check_admin', 'Login::check_admin');

$routes->get('admin/dashboard', 'Admin\Admin::dashboard');
$routes->post('admin/dashboard', 'Admin\Admin::dashboard');

$routes->get('admin', 'Admin::admin');
$routes->get('wp-admin', 'admin\Login::index');
$routes->post('/upload_ck', 'admin\Home::upload_ck'); 
$routes->post('/upload_ck_file_browser', 'admin\Home::upload_ck_file_browser');



$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
  
  
  $routes->post('checkurl', 'Admin::checkurl');
  $routes->post('checkurl2', 'Admin::checkurl2');
  
  $routes->get('addPost', 'Admin::index');
  $routes->get('addPost', 'Admin::index');
  $routes->post('addPost', 'Admin::post_preview_insert');
  
  $routes->get('ipblocklist', 'Admin::ipblockList');  
  
  $routes->get('new_page', 'Admin::new_page');
  $routes->get('admin/deleteMenu/(:num)/(:num)', 'Admin::deleteMenu/$1/$2');
  $routes->get('ipblocklist', 'Admin::ipblockList');
  $routes->get('dashboard', 'Admin::dashboard');
  $routes->get('trash', 'Admin::trash');
  $routes->post('trash_delete', 'Admin::trash_post_delete');
  $routes->get('removeblockIp/(:num)', 'Admin::removeblockIp/$1');
  $routes->get('test', 'Admin::test');      
  
  
  $routes->get('media', 'Media_library::pagelist');
  $routes->get('media/(:num)', 'Media_library::pagelist/$1');
  
  
  $routes->post('useraddprocess', 'User::user_add_process');
  $routes->post('categorie/categorie_add_process/(:num)', 'Categorie::categorie_add_process/$1');
  $routes->post('categorie/update_category/(:num)/(:num)', 'Categorie::update_category/$1/$2');
  $routes->get('categorie/catagory_delete/(:num/(:num))', 'Categorie::catagory_delete/$1/$2');
  
  
  $routes->get('edit_mtico/(:any)', 'Blog_edit::matico_edit/s1');
  $routes->get("blog_edit/blog_delete/(:num)", 'Blog_edit::blog_delete/$1');
  
  $routes->get('category', 'Categorie::category_list');
  $routes->get('category/(:num)', 'Categorie::category_list/$1');
  $routes->get('category_edit/(:num)/(:num)', 'Categorie::category_edit/$1/$2');
  
  $routes->get('trash_pages', 'Page::get_trash_pages');
  $routes->get('restore_trash/(:num)', 'Page::restore_trash_page/$1');      
  
  
  $routes->get('userlist', 'User::user_list');
  
  $routes->get('user', 'User::index');
  $routes->get('user/deleteuser/(:num)', 'User::deleteUser/$1');
  
  $routes->get('profile', 'User::profileDetail');      
  
  $routes->post('adsence/adsence_update', 'Adsence::adsence_update');
  $routes->get('adsence', 'Adsence::index');
  $routes->get('logout', 'Logout::index');  
  $routes->get('posts', 'Blog_edit::pagination');
  $routes->post('user/useredit_process/(:num)', 'User::useredit_process/$1');      
  
  
  $routes->get('settings', 'Settings::index');
  $routes->post('settings/settings_edit_process', 'Settings::settings_edit_process');
  
  $routes->post('import/updateDatabase', 'Import::updateDatabase');
  $routes->post('import', 'Import::index');
  $routes->get('import/truncat', 'Import::truncat');
  $routes->get('import/deleteImportedTables', 'Import::deleteImportedTables');
  
  $routes->post('trash_page_delete', 'Page::trash_page_delete_all'); 
  $routes->post('useraddprocess', 'User::user_add_process');      
  
  });
  
  
  $routes->group('admin/matico', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    
    $routes->get('/', 'Matico::index');
    $routes->get('addCampaign', 'Matico::addCampaign');
    $routes->get('campaignUpdate/(:num)', 'Matico::campaignUpdate/$1');
    $routes->get('deleteCampaignProcess/(:num)', 'Matico::deleteCampaignprocess/$1'); 
    $routes->post('addCampaignProcess', 'Matico::addCampaignProcess');
    $routes->post('updateCampaignProcess/(:num)', 'Matico::updateCampaignProcess/$1');
    
    });
    
    
    
    $routes->group('admin/page', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
      
      $routes->get('/', 'Page::index');
      $routes->get('delete/(:num)', 'Page::delete/$1');
      $routes->get('page_trash/(:num)', 'Page::page_trash/$1');
      $routes->get('pageEdit/(:num)', 'Page::pageEdit/$1');
      $routes->post('pageEdit/(:num)', 'Page::page_widget/$1');
      $routes->post('pageUpdate/(:num)', 'Page::pageUpdate/$1');
      
      // $routes->get('pageEdit/(:num)', 'Page::pageEdit/$1');
      // $routes->post('pageEdit/(:num)', 'Page::page_widget/$1');
      // $routes->get('/', 'Page::index');
      // $routes->get('delete/(:num)', 'Page::delete/$1');
      // $routes->get('page_trash/(:num)', 'Page::page_trash/$1');
      // $routes->post('pageUpdate/(:num)', 'Page::pageUpdate/$1');
      
      
      });
      
      $routes->group('admin/media_library', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
        
        $routes->get('/', 'Media_library::media_library');
        $routes->get('media_library', 'Media_library::media_library');
        $routes->get('media_library/(:num)', 'Media_library::Media_library/$1');
        $routes->get('delete/(:num)', 'Media_library::media_delete_process/$1');
        $routes->post('uploadImg', 'Media_library::uploadImg');
        $routes->post('media_delete_process/(:num)', 'Media_library::media_delete_process/$1');
        
        });
        
        
        $routes->group('admin/admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
          
          $routes->get('post_edit/(:num)', 'Admin::post_edit/$1');    
          $routes->get('menupage', 'Admin::menupage');
          $routes->get('importpage', 'Admin::importpage');
          $routes->post('bulkpostaction', 'Admin::bulkpostaction');
          $routes->post('blog_add_process', 'Admin::blog_add_process');
          $routes->post('imageUpload', 'Admin::imageUpload');
          $routes->post('post_preview/(:num)', 'Admin::preview/$1');
          $routes->post('post_add_preview/(:num)', 'Admin::post_add_preview/$1');
          // $routes->post('post_add_publish/(:num)', 'Admin::post_add_publish/$1');
          $routes->post('remove_image/(:num)', 'Admin::remove_media/$1');
          $routes->post("update_post/(:num)", 'Admin::update_post/$1');
          $routes->post('restore', 'Admin::restore');
          $routes->post('trash_clear', 'Admin::trash_clear');
          $routes->post('pageCreated', 'Admin::pageCreated');
          $routes->post('addMainMenu', 'Admin::addMainMenu');
          $routes->post('updateMenu', 'Admin::updateMenu');
          $routes->post('addIp', 'Admin::addIp');
          
          });
          
          
          
          $routes->get('sitemap.xml', 'xml\Sitemap::home');
          $routes->get('sitemap-page.xml', 'xml\Sitemap::pages');
          $routes->get('sitemap-news.xml', 'xml\Sitemap::sitemap_news');
          $routes->get('sitemap-main.xml', 'xml\Sitemap::main');
          $routes->get('posts/sitemap(:num).xml', 'xml\Sitemap::index/$s1');
          
          
          $routes->get('/Page_not_found' , 'Page_not_found');
          $routes->get('getpost','GetPosts::index');
          $routes->get('deletedata','Deletedata::index');
          $routes->post('contact_us','Home::contact_us_details');
          $routes->post('campaign/insertPost','Campaign::insertPost');  
          $routes->post('home/search', 'Home::search');
          
          $routes->add('userlist/user_edit/(:any)', 'User::user_edit/$1');