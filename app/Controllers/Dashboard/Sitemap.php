<?php 
 namespace App\Controllers;

use App\Models\Front_model;
use App\Models\Library_model;
use CodeIgniter\Controller;

use CodeIgniter\HTTP\Response;


class Sitemap extends Controller
{
    public $front_model;
  

    function __construct()
    {
     $this->front_model = new Front_model();

   //  helper('xml');
    }

    function index($page)
    {
        // echo $page;die;

        $uri = service('uri');
        $uri = $uri->getSegment(2);
              // echo $uri;die;
        $len = strlen($uri);
      //  echo $uri;die;
        if($len==12)
        {
            $page = substr($uri,7,1);
        }
        else{
            $page = substr($uri,7,2);
        }
        // echo $page;die;
        $response = service('response');
       //  $response->set_content_type('text/xml');
       // $response->setContentType('text/xml');
         //$response->setBody('Content-type', 'text/xml');
       $response->setHeader('Content-type', 'text/xml');


                // $url = "https://allnewsstories.com/wpconv_saurav/wp_to_ci4/";

      //  echo $page;die;
        $file_name = './sitemap/' . 'latest_sitemap'.$page.'.xml';
        $offset = ($page - 1)*100;      
        $data['all_posts'] = $this->front_model->fetch_all_post($offset);
       // echo "<pre>";
       // print_r($data['all_posts']);die;

         $str = '<?xml version="1.0" encoding="UTF-8"?>
         <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';
         foreach($data['all_posts'] as $key=>$value){
        //   echo "<pre>";
        //   print_r($value["all_post"]['images']);die;
        // $img = $value["all_post"]["images"][0]["url"];
        // $img_text = $value["all_post"]["images"][0]["alt_text"];
        ////////////////////////////////////////////////////////////////////////////////////////////////////

           $content = '';
           $freq = '';
            $first_content_date = $data['all_posts'][0]['date_'];
            $first_content_date1 = date_create(date('Y-m-d', strtotime($first_content_date)));

            $content_date =  '"'.$value['date_'].'"'; 
            $content_date1 = date_create(date('Y-m-d', strtotime($content_date))); 

            $diff1 = date_diff($first_content_date1, $content_date1);
            $diff = (int) ($diff1->format("%a"));
            //echo $diff;die;

            if ($diff <= 3) {
                $freq .= 'daily'."\n";
                $content .= '1.0'."\n";
            } else if ($diff > 3 && $diff <= 6) {
                $freq .= 'daily'."\n";
                $content .= '0.9'."\n";
            } else if ($diff > 6 && $diff <= 9) {
                $freq .= 'daily'."\n";
                $content .= '0.8'."\n";
            } else if ($diff > 9 && $diff <= 16) {
                $freq .= 'weekly'."\n";
                $content .= '0.7'."\n";
            } else if ($diff > 16 && $diff <= 23) {
                $freq .= 'weekly'."\n";
                $content .= '0.6'."\n";
            } else if ($diff > 23 && $diff <= 30) {
                $freq .= 'weekly'."\n";
                $content .= '0.5'."\n";
            } else if ($diff > 30 && $diff <= 60) {
                $freq .= 'monthly'."\n";
                $content .= '0.4'."\n";
            } else if ($diff > 60 && $diff <= 90) {
                $freq .= 'monthly'."\n";
                $content .= '0.3'."\n";
            } else if ($diff > 90 && $diff <= 120) {
                $freq .= 'monthly'."\n";
                $content .= '0.2'."\n";
            } else if ($diff > 120 && $diff <= 365) {
                $freq .= 'monthly'."\n";
                $content .= '0.1'."\n";
            } else if ($diff > 365) {
                $freq .= 'yearly'."\n";
                $content .= '0.1'."\n";
            } else {
                $freq .= 'always'."\n";
                $content .= '1.0'."\n";
            }

//    echo $content;die;    '</image:image></url>'
        
        ///////////////////////////////////////////////////////////////////////////////////////////////////
           $str.= '<url>
                  <loc language="">';
                // $str.= "https://allnewsstories.com/wpconv_saurav/wp_to_ci4/".$value["all_post"]["url"].'</loc>';
                //  $str.= "https://w2ci.inewsguru.com/".$value["all_post"]["url"].'</loc>';
                 $str.= base_url().'/'.$value["all_post"]["url"].'</loc>';

                 $str.= '<lastmod>'.$value["date_time"].'</lastmod>';
                 $str.= '<changefreq>'.$freq.'</changefreq>';
                 $str.= '<priority>'.$content.'</priority>';
                 if((!empty($value["all_post"]["images"])) && (!empty($value["all_post"]["images"][0]["url"])))
                 {
                    // $value["all_post"]["images"][0]["url"];
                    // $str.= '<'
                    $str.= '<image:image>';
                    $str.= '<image:loc>'.$value["all_post"]["images"][0]["url"].'</image:loc>';
                    $str.= '<image:caption>'.$value["all_post"]["images"][0]["alt_text"].'</image:caption>';
                    $str.= '<image:title>'.$value["all_post"]["images"][0]["alt_text"].'</image:title>';
                    $str.= '</image:image>';

                 }
                 $str.='</url>';

      }
        $str.='</urlset>';
        $fh_post = fopen($file_name, "w");
        fwrite($fh_post, $str);
        fclose($fh_post);
        echo $str;

    } 

    
    function pages(){
        //  echo base_url();die;
         $data = $this->front_model->pages_count();
        //  echo "<pre>";
        //  print_r($data);die;
         $file_name = './sitemap/listing_sitemap.xml';
        //  $count = count($data['posts']);
        //  $final = floor($count/100) +1;
         $response = service('response');
         $response->setHeader('Content-type', 'text/xml');      
         $str = '<?xml version="1.0" encoding="UTF-8"?>
         <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
         foreach($data as $page){
            // echo "<pre>";
            //  print_r($page);die;
            // $str.= '<sitemap><loc>'. base_url().'/posts/sitemap-page/'.$page['seo_url'].'.xml';
            $str.= '<sitemap><loc>'. base_url().'/'.$page['seo_url'];
            $str.='</loc></sitemap>';
         }
        //  for($start=1;$start<=$final;$start++)
        // {
        //     $str.= '<sitemap><loc>'. base_url().'/posts/sitemap-page'.$start.'.xml';
        //     $str.='</loc></sitemap>';
        // }
        $str.='</sitemapindex>';
        $fh_post = fopen($file_name, "w");
        fwrite($fh_post, $str);
        fclose($fh_post);
        echo $str;
    }
    
        function main(){
        //  echo base_url();die;
         $file_name = './sitemap/listing_sitemap.xml';

         $response = service('response');
         $response->setHeader('Content-type', 'text/xml');      
         $str = '<?xml version="1.0" encoding="UTF-8"?>
         <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
      
        $str.= '<sitemap><loc>'. base_url().'/'.'sitemap.xml';
        $str.='</loc></sitemap>';
        $str.= '<sitemap><loc>'. base_url().'/'.'page-sitemap.xml';
        $str.='</loc></sitemap>';

        $str.='</sitemapindex>';
        $fh_post = fopen($file_name, "w");
        fwrite($fh_post, $str);
        fclose($fh_post);
        echo $str;
  }
  
    function home()
    {
        //echo base_url();die;
       // $start = 1;
        $data['posts'] = $this->front_model->post_count();
        // echo "<pre>";
        // print_r($data['posts']);die;
        $file_name = './sitemap/listing_sitemap.xml';
        $count = count($data['posts']);
        // echo "<pre>";
        // print_r($count);die;
        $final = floor($count/100) +1;
        //  echo $final;die;
        $response = service('response');
        // echo "<pre>";
        // print_r($response);die;
        $response->setHeader('Content-type', 'text/xml');  
       
        $str = '<?xml version="1.0" encoding="UTF-8"?>
        <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
       
        for($start=$final;$start>=1;$start--)
        {
           // $str.= '<sitemap><loc>https://allnewsstories.com/wpconv_saurav/wp_to_ci4/posts/sitemap'.$start.'.xml';
            //  $str.= '<sitemap><loc>http://localserver.com/wp2ci/posts/sitemap'.$start.'.xml';
            $str.= '<sitemap><loc>'. base_url().'/posts/sitemap'.$start.'.xml';
            //  $data['urls'][] =  base_url().'/posts/sitemap'.$start.'.xml';
            // $str.= '<sitemap><loc>https://beta.spindigit.com/posts/sitemap'.$start.'.xml';
            // $str.= '<sitemap><loc>https://w2ci.inewsguru.com/posts/sitemap'.$start.'.xml';
            $str.='</loc></sitemap>';
        }

        // echo "<pre>"; print_r($data['urls']); die;
        $str.='</sitemapindex>';
        // $data['title_bottom'] = '</sitemapindex>';
        $fh_post = fopen($file_name, "w");
        fwrite($fh_post, $str);
        fclose($fh_post);

        echo $str;
              
        
    }

    function sitemap_news()
    {
       // echo "sss";die;


        $response = service('response');
        $response->setHeader('Content-type', 'text/xml'); 

        $data['sitemap_news'] = $this->front_model->sitemap_news_post();
        $data['perma'] = $this->front_model->sitemap_perma();
        // echo "<pre>";
        // print_r($data['sitemap_news']);die;
 

        $str = '<?xml version="1.0" encoding="UTF-8"?>';
        $str.='<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">';
        foreach($data['sitemap_news'] as $res)
        {
            if(!empty(html_entity_decode($res["title"])))
            {
                if((!empty($res["seo_url"])) && (!empty($res['date_'])))
                {
                    
                    $d = $res['date_'];
                    $d_create = date_create($d);
                    $date = date_format($d_create,$data['perma']['linkformat']);
                    // $t = html_entity_decode($res["title"],ENT_HTML5 ,"UTF-8");
                    // $t = var_dump(html_entity_decode($res["title"]));
    
    
                    $str.='<url>';
                    // $str.='<loc>';
                    // $str.= 'http://beta.spindigit.com/'.$date.'/'.$res["seo_url"].'</loc>';
                    $str.= '<news:news>';
                    $str.='<news:publication>';
                    $str.= '<news:name>Spindigit</news:name>';
                    $str.='<news:language>en</news:language>';
                    $str.='</news:publication>';
                    $str.='<news:publication_date>'.$res["date_"]." ".$res["time_"].'</news:publication_date>';
                    $str.='<news:title>'.$res["title"].'</news:title>';
                //   $str.='<news:title>'."xyz".'</news:title>';
                    $str.='<news:keywords/>';
                    $str.='</news:news>';
                    $str.='</url>';
                }
                else
                {
                    $str.='<url>';
                    $str.= '<news:news>';
                    $str.='<news:publication>';
                    $str.= '<news:name>Spindigit</news:name>';
                    $str.='<news:language>en</news:language>';
                    $str.='</news:publication>';
                    $str.='<news:publication_date>'.$res["date_"]." ".$res["time_"].'</news:publication_date>';
                    $str.='<news:title>'.html_entity_decode($res["title"]).'</news:title>';
                    $str.='<news:keywords/>';
                    $str.='</news:news>';
                    $str.='</url>';
                }
            }

     
        }
        $str.='</urlset>';
        echo $str;

    }



    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    
}







