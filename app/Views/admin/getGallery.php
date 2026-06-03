<?php foreach ($media as $md) { ?>
    <div class="col-3">
       
        <input type="checkbox" class="gallery-img-checkbox" id="gallery_img_<?php echo $md["id"] ?>" style="display:none" value="<?php echo $md["url"] ?>">
        <label class="label-gallery-img" for="gallery_img_<?php echo $md["id"] ?>"><img class="image-list" src="<?php echo  $md["url"] ?>" onclick="img_src(this)"></label>
    </div>
<?php } ?>