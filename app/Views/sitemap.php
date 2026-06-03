<html xmlns="http://www.w3.org/1999/xhtml" xmlns:html="http://www.w3.org/TR/REC-html40" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9">
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sitemap</title>
</head>
<body>

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>urls</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($urls as $url){?>
      <tr>
        <td><a href="<?php print_r($url) ?>" target="_blank"><?php print_r($url) ?></a></td>  
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>