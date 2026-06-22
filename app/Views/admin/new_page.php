<?= $this->extend('layout/admin') ?>


<?= $this->section('cssLinks') ?>

<style>
    .panel .panel-heading {
        background-color: #007bff;
        color: #fff;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .modal-content {
        width: 90vw;
    }

    .modal-dialog {
        margin: 3% 5%;
    }

    .image-list {
        width: 100%;
        max-height: 190px;
        border: 5px solid #dfdfdf;
        margin: 10px;
        cursor: pointer;
    }

    .tab-content {
        height: 55vh;
        overflow: scroll;
    }

    .gallery-img-checkbox:checked+.label-gallery-img .image-list {
        border: 5px solid #007bff;
    }

    .panel {
        border: 1px solid #cecdcd;
        border-top-right-radius: 5px;
        border-top-left-radius: 5px;
    }

    .panel-body {
        padding: 10px
    }
</style>

<?= $this->endSection() ?>




<?= $this->section('content') ?>


<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h1>Add New Page</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <?php $session = session();
                                    echo $session->getFlashdata("msg");
                                ?>
                                <form action="<?php echo base_url('admin/admin/pageCreated') ?>" method="post" enctype='multipart/form-data'>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="title">
                                                <h5>Page Name<span style='color:red;'>*</span></h5>
                                            </label>
                                            <input type="text" onpaste="myFunction()" name="title" id="title" class=" form-control" required placeholder="Enter your page name" style="font-size:20px;height:40px;" value="">
                                        </div>

                                        <div class="form-group" style="display:none;" id="s_title">
                                            <label for="sugest_title">
                                                <h5>Post or Blog URL<span style='color:red;'>*</span></h5>
                                            </label>
                                            <input type="text" name="sugest_title" id="sugest_title" class="newsletter_input form-control-lg form-control" required placeholder="Page Url" style="font-size:20px;height:40px;" value="">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="button" onclick="addImage()">Add Media</button>
                                        </div>
                                        <div class="form-group">
                                            <textarea placeholder="Content" id="source" name="content" class="form-control" rows="200" cols="200" required="true"></textarea>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label for="meta_tag">
                                                <h5>Meta Tags ( <span style='color:green;'>optional</span> )</h5>
                                            </label>
                                            <input type="text" placeholder="Enter Meta tag" name="meta_tag" id="meta_tag" class="form-control" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="meta_desc">
                                                <h5>Meta Description ( <span style='color:green;'>optional</span> )</h5>
                                            </label>
                                            <textarea class="form-control" placeholder="Enter Meta description" name="meta_desc" id="meta_desc" rows="5"></textarea>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            Publish
                                        </div>
                                        <div class="panel-body">

                                            <div class="row">
                                                <div class="col-12 mt-2">NOINDEX this page/post <input type="checkbox" name="noindex" value=1></div>
                                                <div class="col-12 mt-2">NOFOLLOW this page/post <input type="checkbox" name="nofollow" value=1></div>
                                                <div class="col-12 mt-2">Exclude From Sitemap <input type="checkbox" name="sitemap" value=1></div>
                                                <div class="col-12 mt-2 mb-2">
                                                    <select name="visibility" id="visibility" class="form-control">
                                                        <option value="p"><b>Public</b></option>
                                                        <option value="h"><b>Only me</b></option>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <!-- <button class="btn btn-primary btn-sm btn-block" value="preview" name="preview" disabled>
                                                        Preview
                                                    </button> -->
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-outline-primary btn-sm btn-block">
                                                        Post
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="mb-2">
                                    <div class="panel-heading">
                                        Meta Tags
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="meta_tag">
                                                <h5>Meta Tags ( <span style='color:green;'>optional</span> )</h5>
                                            </label>
                                            <input type="text" placeholder="Enter Meta tag" name="meta_tag" id="meta_tag" class="form-control" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="meta_desc">
                                                <h5>Meta Description ( <span style='color:green;'>optional</span> )</h5>
                                            </label>
                                            <textarea class="form-control" placeholder="Enter Meta description" name="meta_desc" id="meta_desc" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        

                        </form>

                    </div>

                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal" id="image_gallery">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Add Media</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-9">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#list-gallery">Library</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="list-gallery" class="tab-pane container active">
                                <div id="img-gallery" class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="insertImage()">Insert into post</button>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>


<?= $this->section('scriptLinks') ?>

<script>
    var modal_open = false;
    var page;
    var maxPage;
    $(document).ready(function() {
        $("#source").richText({
            heightPercentage: 70,
        });
        $("#title").keyup(function() {
            document.getElementById('s_title').style.display = 'block';
            var title = document.getElementById('title').value.toLowerCase();
            var s = title.replace(/[^a-z0-9]/gi, '-');
            var s1 = s.replace(/-+/g, "-");
            s1 = s1.replace(/(^\-)|(\-$)/gi, "");
            var sugest_title = document.getElementById('sugest_title').value;
            var n = sugest_title.length;
            var res = sugest_title.substring(n - 1, n);
            document.getElementById('sugest_title').value = s1.substring(0, 100);
        });
        $("#title").change(function() {
            document.getElementById('s_title').style.display = 'block';
            var title = document.getElementById('title').value.toLowerCase();
            var s = title.replace(/[^a-z0-9]/gi, '-');
            var s1 = s.replace(/-+/g, "-");
            s1 = s1.replace(/(^\-)|(\-$)/gi, "");
            var sugest_title = document.getElementById('sugest_title').value;
            var n = sugest_title.length;
            var res = sugest_title.substring(n - 1, n);
            document.getElementById('sugest_title').value = s1.substring(0, 100);
        });
        $("#image").change(function() {
            readURL(this);
        });
        $("#title").keyup(function() {
            var title = $("#title").val();
            console.log(title);
            if (title.length == 0) {
                $("#s_title").css({
                    "display": "none"
                });
            }
        })

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            document.getElementById('preview').style.display = 'block';
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
                console.log(e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function myFunction() {
        document.getElementById('s_title').style.display = 'block';
        var title = document.getElementById('title').value.toLowerCase();
        var s = title.replace(/[^a-z0-9]/gi, '-');
        var s1 = s.replace(/-+/g, "-");
        s1 = s1.replace(/(^\-)|(\-$)/gi, "");
        var sugest_title = document.getElementById('sugest_title').value;
        var n = sugest_title.length;
        var res = sugest_title.substring(n - 1, n);
        document.getElementById('sugest_title').value = s1.substring(0, 100);
    }


    function addImage() {
        $("#image_gallery").modal("toggle");
    }

    function insertImage() {
        $(".gallery-img-checkbox:checked").each(function() {
            $(".richText .richText-editor").append("<div><img src='" + $(this).val() + "' style='width:100%'></div>");
            $("#source").val("<div><img src='" + $(this).val() + "' style='width:100%'></div>");
        });
    }

    $(function() {
        if (!modal_open) {
            $('#image_gallery').on('shown.bs.modal', function(e) {
                page = 0;
                maxPage = '<?php echo $img_no_page ?>';
                $.ajax({
                    url: "<?php echo base_url() . "/admin/media_library/media_library" ?>",
                    success: function(res) {
                        $("#img-gallery").html(res);
                        page = 1;
                        modal_open = true;
                    }
                });
            });
        }
        $(".tab-content").scroll(function() {
            if (page < maxPage) {

                if ($(".tab-content").scrollTop() > 400) {
                    page = page + 1;
                    $.post('<?php echo base_url() . "/admin/media_library/media_library/" ?>' + page, function(res) {
                        $("#img-gallery").append(res);
                    });

                }
            }
        });
    });
</script>

<?= $this->endSection() ?>