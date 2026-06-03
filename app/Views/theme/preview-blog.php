<?= $this->extend('App\Views\theme\layouts\structure') ?>

<?= $this->section('title') ?>
    <title><?= $preview_post->title ?> >> <?= $site_title->setting_value ?></title>
    <meta name="title" content="<?= $preview_post->title ?>">
    <meta name="meta_tag" content="<?= $preview_post->meta_tag ?>">
    <meta name="meta_description" content="<?= $preview_post->meta_desc ?>">
    <meta name="keywords" content="<?php foreach($preview_keywords as $pk){ echo $pk['keyword'].', '; } ?>">
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<style>
    .single_url_btn {
    display: -webkit-box;
    max-width: 100%;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    text-decoration: none;
    font-size: 14px;
}
.single_url_link {
    background: #6c757d!important;
    padding: 8px;
    margin-top: 20px;
    text-decoration: none;
    color: #fff;
    max-width: 30%;
    display: inline-flex;
    font-size: 14px;
    align-items: center;
}
div#main_content .single_url_link:last-child {
    display: inline-flex;
    justify-content: flex-end;
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="consumer_sec">
    <div class="container">
        <div class="row main-row">
            <div class="col-sm-12 col-md-4">
                <?= $this->include('theme/layouts/sidebar') ?>
            </div>
            <div class="col-sm-12 col-md-8 mt-3" id="main_content" style="word-break: break-all;overflow:hidden">
                <div class="row">
                    <div class="mt-3 mt-flex">
                        <?php foreach($preview_category as $pc): ?>
                            <span class="bg-info text-light px-2 mx-md-1 mb-1"><?= $pc['categorie'] ?></span>
                        <?php endforeach ?>
                    </div>
                    <div class="mt-3">
                        <h1 class="title-font"><?= $preview_post->title ?></h1>
                    </div>
                    <div class="mt-3">
                        <span class="text-secondary px-2 mr-2"><?= date_for($preview_post->date_) ?></span>
                    </div>
                    <div class="mt-3" style="text-align:justify">
                        <?php echo html_entity_decode($preview_post->content) ?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- =====ads section==== -->
        <div class="ads_sec">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="ads_area"><?= $ads->footer ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =====ads section==== -->
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>
