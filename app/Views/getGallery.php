<?php foreach ($media as $md) { ?>

    <div class="col-3">
        <input type="checkbox" class="gallery-img-checkbox" id="gallery_img_<?= $md["id"] ?>" style="display:none" value="<?= $md["url"] ?>">
        
        <label class="label-gallery-img" for="gallery_img_<?= $md["id"] ?>"><img class="image-list" src="<?= $md["url"] ?>" onclick="img_src(this)"></label>
    </div>
<?php } ?>
