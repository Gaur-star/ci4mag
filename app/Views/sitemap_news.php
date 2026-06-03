
   <?php die;?>  
<?php
 // header('Content-type: application/xml; charset="ISO-8859-1"',true); 
?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
 <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
    <?php foreach($all_posts as $key=>$value){ ?>
        <url>
            <loc><?php echo "https://allnewsstories.com/wpconv_saurav/wp_to_ci4/".$value["all_post"]["url"]; ?></loc>
            <news:news>
                <news:publication>
                    <news:name>York Pedia</news:name>
                    <news:language>en</news:language>
                </news:publication>
                <news:publication_date><?php echo $value["date_time"];?></news:publication_date>  
                <news:title><?php echo $value["title"];?></news:title>
                <news:keywords/>
            </news:news>
        </url>
    <?php }?> 
  </urlset>


