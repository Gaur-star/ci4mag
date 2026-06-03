<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {

    $routes->get('login', 'Admin\Login::index');
    $routes->get('login/check_admin', 'Login::check_admin');
    
    $routes->get('addPost', 'Admin::index');
    $routes->get('admin/post_edit/(:num)', 'Admin::post_edit/$1');    
    $routes->post('admin/bulkpostaction', 'Admin::bulkpostaction');
    $routes->post('admin/blog_add_process', 'Admin::blog_add_process');
    $routes->post('admin/imageUpload', 'Admin::imageUpload');
    $routes->post('admin/post_preview/(:num)', 'Admin::preview/$1');
    $routes->post('admin/post_add_preview/(:num)', 'Admin::post_add_preview/$1');
    $routes->post('admin/post_add_publish/(:num)', 'Admin::post_add_publish/$1');
    $routes->post('admin/remove_image/(:num)', 'Admin::remove_media/$1');
    $routes->post("admin/update_post/(:num)", 'Admin::update_post/$1');
    $routes->post('admin/restore', 'Admin::restore');
    $routes->post('admin/trash_clear', 'Admin::trash_clear');
    $routes->post('admin/pageCreated', 'Admin::pageCreated');
    $routes->get('admin/importpage', 'Admin::importpage');
    $routes->post('admin/addMainMenu', 'Admin::addMainMenu');
    $routes->post('admin/updateMenu', 'Admin::updateMenu');
    $routes->post('admin/addIp', 'Admin::addIp');
    $routes->get('admin/menupage', 'Admin::menupage');
    
    $routes->post('checkurl', 'Admin::checkurl');
    $routes->post('checkurl2', 'Admin::checkurl2');

    $routes->get('addPost', 'Admin::index');
    $routes->post('addPost', 'Admin::post_preview_insert');
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
    
    $routes->get('media_library/media_library', 'Media_library::media_library');
    $routes->get('media_library/media_library/(:num)', 'Media_library::Media_library/$1');
    $routes->get('media_library/delete/(:num)', 'Media_library::media_delete_process/$1');
    $routes->post('media_library/uploadImg', 'Media_library::uploadImg');
    
    $routes->post('useraddprocess', 'User::user_add_process');
    $routes->post('categorie/categorie_add_process/(:num)', 'Categorie::categorie_add_process/$1');
    $routes->post('categorie/update_category/(:num)/(:num)', 'Categorie::update_category/$1/$2');
    $routes->post('page/pageEdit/(:num)', 'Page::page_widget/$1');
    $routes->post('page/pageUpdate/(:num)', 'Page::pageUpdate/$1');

    $routes->get('edit_mtico/(:any)', 'Blog_edit::matico_edit/s1');
    $routes->get("blog_edit/blog_delete/(:num)", 'Blog_edit::blog_delete/$1');

    $routes->get('category', 'Categorie::category_list');
    $routes->get('category/(:num)', 'Categorie::category_list/$1');
    $routes->get('category_edit/(:num)/(:num)', 'Categorie::category_edit/$1/$2');
    $routes->get('categorie/catagory_delete/(:num/(:num))', 'Categorie::catagory_delete/$1/$2');

    $routes->get('trash_pages', 'Page::get_trash_pages');
    $routes->get('restore_trash/(:num)', 'Page::restore_trash_page/$1');
    
    $routes->get('page', 'Page::index');
    $routes->get('page/pageEdit/(:num)', 'Page::pageEdit/$1');
    $routes->get('page/delete/(:num)', 'Page::delete/$1');
    $routes->get('page/page_trash/(:num)', 'Page::page_trash/$1');

    $routes->get('userlist', 'User::user_list');

    $routes->get('user', 'User::index');
    $routes->get('user/deleteuser/(:num)', 'User::deleteUser/$1');

    $routes->get('profile', 'User::profileDetail');

    $routes->get('import/truncat', 'Import::truncat');
    $routes->get('import/deleteImportedTables', 'Import::deleteImportedTables');

    $routes->get('media', 'Media_library::pagelist');
    $routes->get('media/(:num)', 'media_library::pagelist/$1');
    $routes->get('media_library', 'Media_library::media_library');
    
    $routes->get('adsence', 'Adsence::index');
    $routes->get('logout', 'Logout::index');  
    $routes->get('posts', 'Blog_edit::pagination');
    $routes->get('settings', 'Settings::index');
    $routes->post('user/useredit_process/(:num)', 'User::useredit_process/$1');
    
    $routes->get('matico', 'Matico::index');
    $routes->get('matico/addCampaign', 'Matico::addCampaign');
    $routes->get('matico/campaignUpdate/(:num)', 'Matico::campaignUpdate/$1');
    $routes->post('matico/addCampaignProcess', 'Matico::addCampaignProcess');
    $routes->get('matico/deleteCampaignProcess/(:num)', 'Matico::deleteCampaignprocess/$1'); 
    $routes->post('matico/updateCampaignProcess/(:num)', 'Matico::updateCampaignProcess/$1');

    $routes->post('settings/settings_edit_process', 'Settings::settings_edit_process');
    $routes->post('import/updateDatabase', 'Import::updateDatabase');
    $routes->post('import', 'Import::index');
    $routes->post('trash_page_delete', 'Page::trash_page_delete_all'); 
    $routes->post('adsence/adsence_update', 'Adsence::adsence_update');
    $routes->post('media_library/media_delete_process/(:num)', 'Media_library::media_delete_process/$1');
    $routes->post('useraddprocess', 'User::user_add_process');      
    
  });



  $db = \Config\Database::connect();
  $sql = "SELECT * FROM permalink_list WHERE `status` = 'active'";
  $perma = $db->query($sql)->getRowArray();
 
  $page_sql = "SELECT id,seo_url,date_ FROM posts";
  $query = $db->query($page_sql);
  $result = $query->getResultArray();
  foreach ($result as $row) {
    $go_to = urlencode($row['seo_url']);
    $d = $row['date_'];
    $d_create = date_create($d);
    $date = date_format($d_create,$perma['linkformat']);
    $routes->get($date.'/'. $go_to,'Home::single/'. $row['id']); 
}

  $sql = "SELECT post_id,seo_url,date_ FROM postPreview";
  $query = $db->query($sql);
  $result = $query->getResultArray();
  foreach ($result as $row) {
    $go_to = urlencode($row['seo_url']);
    $id = $row['post_id'];
    $d = $row['date_'];
    $d_create = date_create($d);
    $date = date_format($d_create,$perma['linkformat']);
    $routes->get('preview' . '/' . $date . '/' . $go_to .'/'. $id ,'Home::post_edit_preview/'. $row['post_id']); 
  
  }
  
  $page_sql = "SELECT id,seo_url,date_ FROM posts";
  $query = $db->query($page_sql);
  $result = $query->getResultArray();
  foreach ($result as $row) {
    $go_to = urlencode($row['seo_url']);
    $sql ="SELECT `url`FROM pastUrl WHERE `new_url`='{$row['seo_url']}'";
    $res = $db->query($sql)->getResultArray();
    if(empty($res))
    {
      continue;
    }
    else
    {
      $d = $row['date_'];
      $d_create = date_create($d);
      $date = date_format($d_create,$perma['linkformat']);

      $uri = current_url(true);
      $uri = (string) $uri;
      $r = (explode("/",$uri));
      $re = array_pop($r);
        if($re==$res[0]['url'])
        {
        $routes->get($date.'/'. $res[0]['url'],'Home::oldtonew/'. $go_to);
        }
        
    }   
  
  }


    $builder = $db->table("permalink_list");
    $builder->where("status", "active");
    $res = $builder->get();
    $perma = $res->getRowArray();

    $page_sql = "SELECT id,seo_url,date_ FROM posts";
    $query = $db->query($page_sql);
    $result = $query->getResultArray();
    foreach ($result as $row) {
      $id = $row['id'];
      $go_to = urlencode($row['seo_url']);
      $d = $row['date_'];
      $d_create = date_create($d);
      $date = date_format($d_create,$perma['linkformat']);
      $routes->get('post_preview/'.$date.'/'. $go_to .'/'. $id,'Home::single_preview/'. $row['id']);  
    }

    $page_sql = "SELECT id,seo_url FROM pages";
    $query = $db->query($page_sql);
    $result = $query->getResultArray();
    foreach($result as $row)
    {
    $go_to = urlencode($row['seo_url']);
    $routes->get($go_to,"Home::singlepage/". $row['id']);
    }





  $routes->get('/', 'Dashboard\Home::spin');
  // $routes->get('category/(:any)/', 'Dashboard\Home::catagory_post/$1');
  $routes->get('category/(:any)', 'Dashboard\Home::catagoryPost/$1');
  $routes->get('clear_cache', 'Dashboard\Home::claercache');
  $routes->get('/author/(:any)', 'Dashboard\Home::author_post/$1') ;
  $routes->get('posts/sitemap-page/(:any)', 'Dashboard\Home::catagoryPost/$1');
  
  
  $routes->get('login', 'Admin\Login::index');
  $routes->get('login/check_admin', 'Login::check_admin');
  
  $routes->get('admin', 'Admin::admin');
  $routes->get('wp-admin', 'admin\Login::index');
  $routes->post('/upload_ck', 'admin\Home::upload_ck'); 
  $routes->post('/upload_ck_file_browser', 'admin\Home::upload_ck_file_browser');
  
  
  
  $routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    
    $routes->get('addPost', 'Admin::index');
    $routes->get('admin/post_edit/(:num)', 'Admin::post_edit/$1');    
    $routes->post('admin/bulkpostaction', 'Admin::bulkpostaction');
    $routes->post('admin/blog_add_process', 'Admin::blog_add_process');
    $routes->post('admin/imageUpload', 'Admin::imageUpload');
    $routes->post('admin/post_preview/(:num)', 'Admin::preview/$1');
    $routes->post('admin/post_add_preview/(:num)', 'Admin::post_add_preview/$1');
    $routes->post('admin/post_add_publish/(:num)', 'Admin::post_add_publish/$1');
    $routes->post('admin/remove_image/(:num)', 'Admin::remove_media/$1');
    $routes->post("admin/update_post/(:num)", 'Admin::update_post/$1');
    $routes->post('admin/restore', 'Admin::restore');
    $routes->post('admin/trash_clear', 'Admin::trash_clear');
    $routes->post('admin/pageCreated', 'Admin::pageCreated');
    $routes->get('admin/importpage', 'Admin::importpage');
    $routes->post('admin/addMainMenu', 'Admin::addMainMenu');
    $routes->post('admin/updateMenu', 'Admin::updateMenu');
    $routes->post('admin/addIp', 'Admin::addIp');
    $routes->get('admin/menupage', 'Admin::menupage');
    
    $routes->post('checkurl', 'Admin::checkurl');
    $routes->post('checkurl2', 'Admin::checkurl2');

    $routes->get('addPost', 'Admin::index');
    $routes->post('addPost', 'Admin::post_preview_insert');
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
    
    $routes->get('media_library/media_library', 'Media_library::media_library');
    $routes->get('media_library/media_library/(:num)', 'Media_library::Media_library/$1');
    $routes->get('media_library/delete/(:num)', 'Media_library::media_delete_process/$1');
    $routes->post('media_library/uploadImg', 'Media_library::uploadImg');
    
    $routes->post('useraddprocess', 'User::user_add_process');
    $routes->post('categorie/categorie_add_process/(:num)', 'Categorie::categorie_add_process/$1');
    $routes->post('categorie/update_category/(:num)/(:num)', 'Categorie::update_category/$1/$2');
    $routes->post('page/pageEdit/(:num)', 'Page::page_widget/$1');
    $routes->post('page/pageUpdate/(:num)', 'Page::pageUpdate/$1');

    $routes->get('edit_mtico/(:any)', 'Blog_edit::matico_edit/s1');
    $routes->get("blog_edit/blog_delete/(:num)", 'Blog_edit::blog_delete/$1');

    $routes->get('category', 'Categorie::category_list');
    // $routes->get('category/(:num)', 'categorie::category_list/$1');
    $routes->get('category/(:num)', 'Categorie::category_list/$1');
    $routes->get('category_edit/(:num)/(:num)', 'Categorie::category_edit/$1/$2');
    $routes->get('categorie/catagory_delete/(:num/(:num))', 'Categorie::catagory_delete/$1/$2');

    $routes->get('trash_pages', 'Page::get_trash_pages');
    $routes->get('restore_trash/(:num)', 'Page::restore_trash_page/$1');
    
    $routes->get('page', 'Page::index');
    $routes->get('page/pageEdit/(:num)', 'Page::pageEdit/$1');
    $routes->get('page/delete/(:num)', 'Page::delete/$1');
    $routes->get('page/page_trash/(:num)', 'Page::page_trash/$1');

    $routes->get('userlist', 'User::user_list');

    $routes->get('user', 'User::index');
    $routes->get('user/deleteuser/(:num)', 'User::deleteUser/$1');

    $routes->get('profile', 'User::profileDetail');

    $routes->get('import/truncat', 'Import::truncat');
    $routes->get('import/deleteImportedTables', 'Import::deleteImportedTables');

    $routes->get('media', 'Media_library::pagelist');
    $routes->get('media/(:num)', 'media_library::pagelist/$1');
    $routes->get('media_library', 'Media_library::media_library');
    
    $routes->get('adsence', 'Adsence::index');
    $routes->get('logout', 'Logout::index');  
    $routes->get('posts', 'Blog_edit::pagination');
    $routes->get('settings', 'Settings::index');
    $routes->post('user/useredit_process/(:num)', 'User::useredit_process/$1');
    
    $routes->get('matico', 'Matico::index');
    $routes->get('matico/addCampaign', 'Matico::addCampaign');
    $routes->get('matico/campaignUpdate/(:num)', 'Matico::campaignUpdate/$1');
    $routes->post('matico/addCampaignProcess', 'Matico::addCampaignProcess');
    $routes->get('matico/deleteCampaignProcess/(:num)', 'Matico::deleteCampaignprocess/$1'); 
    $routes->post('matico/updateCampaignProcess/(:num)', 'Matico::updateCampaignProcess/$1');

    $routes->post('settings/settings_edit_process', 'Settings::settings_edit_process');
    $routes->post('import/updateDatabase', 'Import::updateDatabase');
    $routes->post('import', 'Import::index');
    $routes->post('trash_page_delete', 'Page::trash_page_delete_all'); 
    $routes->post('adsence/adsence_update', 'Adsence::adsence_update');
    $routes->post('media_library/media_delete_process/(:num)', 'Media_library::media_delete_process/$1');
    $routes->post('useraddprocess', 'User::user_add_process');      
    
  });
    
  
    
    
  $routes->add('userlist/user_edit/(:any)', 'User::user_edit/$1');
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