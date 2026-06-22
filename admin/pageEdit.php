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
    .panel-body{
        padding: 10px
    }
</style>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h1>Edit Page</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <form action="<?php echo base_url()."/" ?>admin/page/pageUpdate/<?php echo $page["id"] ?>" method="post" enctype='multipart/form-data'>

                                    <div class="col-12">
                                        <?php //echo validation_errors(); ?>
                                        <div class="form-group">
                                            <label for="title">
                                                <h5>Page Name<span style='color:red;'>*</span></h5>
                                            </label>
                                            <input type="text" onpaste="myFunction()" name="title" id="title" class=" form-control" required placeholder="Enter your page name" style="font-size:20px;height:40px;" value="<?php echo $page["title"] ?>">
                                        </div>

                                        <div class="form-group" id="s_title">
                                            <label for="sugest_title">
                                                <h5>Post or Blog URL<span style='color:red;'>*</span></h5>
                                            </label>
                                            <input type="text" name="seo_url" id="sugest_title" class="newsletter_input form-control-lg form-control" required placeholder="Page Url" style="font-size:20px;height:40px;" value="<?php echo $page["seo_url"] ?>">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="button" onclick="addImage()">Add Media</button>
                                        </div>
                                        
                                        <!-----------rich text editor---------------->
                                        <div class="form-group">
                                            <textarea placeholder="Content" id="source" name="content" class="form-control" rows="25" cols="100" required="true"><?php echo $page["content"] ?></textarea>
                                        </div>
                                        <!-----------rich text editor---------------->

                                        <div class="form-group">
                                            <label for="meta_tag"><source>
                                                <h5>Meta Tags ( <span style='color:green;'>optional</span> )</h5>
                                            </label>
                                            <input type="text" placeholder="Enter Meta tag" name="meta_tag" id="meta_tag" class="form-control" value="<?php echo $page["meta_tag"] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="meta_desc">
                                                <h5>Meta Description ( <span style='color:green;'>optional</span> )</h5>
                                            </label>
                                            <textarea class="form-control" placeholder="Enter Meta description" name="meta_desc" id="meta_desc" rows="5"><?php echo $page["meta_desc"] ?></textarea>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel">
                                    <div class="panel-heading">Publish</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-12 mt-2">NOINDEX this page/post <input type="checkbox" name="noindex" id="noindex" value="1" <?php echo (($page["noindex"] == 1) ? "checked" : "") ?>></div>
                                            <div class="col-12 mt-2">NOFOLLOW this page/post <input type="checkbox" name="nofollow" id="nofollow" value="1" <?php echo (($page["nofollow"] == 1) ? "checked" : "") ?>></div>
                                            <div class="col-12 mt-2">Exclude From Sitemap <input type="checkbox" name="sitemap" id="sitemap" value="1" <?php echo (($page["sitemap"] == 1) ? "checked" : "") ?>></div>
                                            <div class="col-12 mt-2 mb-2">
                                                <select name="visibility" id="visibility" class="form-control">
                                                    <option value="p" <?php echo ($page["visibility"] == "p") ? "selected" : "" ?>><b>Public</b></option>
                                                    <option value="h" <?php echo ($page["visibility"] == "h") ? "selected" : "" ?>><b>Only me</b></option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                            <?php //echo $page['seo_url'];die;?>
                                            <!-- <a href="<?php //echo base_url()."/".$page['seo_url']?>" class="btn btn-primary btn-sm btn-block">Preview</a>  -->
                                                <button class="btn btn-outline-primary" type="button" onclick="pre_view('<?php echo $page['id'];?>')">Preview</button>
                                               
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-primary btn-sm btn-block">Update</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                </form>
                            <!----------------------------------------------------------------------------->
                               <!-- <button class="btn btn-outline-dark mt-4" onclick="add_widgets('<?php //echo $page['id'];?>','<?php //echo $page['seo_url'];?>')">Add Widgets</button> -->
                             <!----------------------------------------------------------------------------->
                            </div>
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

            <!-- Modal Header -->
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

<script>
    var modal_open = false;
    var page;
    var maxPage;
    $(document).ready(function() {
        $("#source").richText({
            removeStyles: true,
            code: true,
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
        // alert(1);
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
        //console.log('ssss');
        $("#image_gallery").modal("toggle");
        
    }

    function insertImage() {
        $(".gallery-img-checkbox:checked").each(function() {
            $(".richText .richText-editor").append("<div><img src='" + $(this).val() + "' style='width:100%'></div>");
            var text_val = $("#source").val();
            $("#source").val( text_val + "<div><img src='"+ $(this).val()+"' style='width:100%'></div>");
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
                        page = 1;
                        $("#img-gallery").html(res);
                        modal_open = true;
                    }
                });
            });
        }

        $(".tab-content").scroll(function() {
            if (page < maxPage) {
                // if ($(".tab-content").scrollTop() + $(".tab-content").height() > $("#img-gallery").height() - 100) {
                //     $.post('<?php echo base_url() . "/admin/media_library/media_library/" ?>' + page, function(res) {
                //         $("#img-gallery").append(res);
                //     });
                //     page++;
                // }

                if ($(".tab-content").scrollTop() > 400) {
                    page = page + 1;
                    $.post('<?php echo base_url() . "/admin/media_library/media_library/" ?>' + page, function(res) {
                        $("#img-gallery").append(res);
                    });

                }

            }
        });
    });


    ////////////Preview section is added here

    function pre_view(id)
    {
        var title= document.getElementById("title").value;
        var seo_url= document.getElementById("sugest_title").value.trim();
        var content = document.getElementById("source").value;
        var meta_tag = document.getElementById("meta_tag").value;
        var meta_desc= document.getElementById("meta_desc").value;
        var noindex = document.getElementById("noindex").value;
        var nofollow= document.getElementById("nofollow").value;
        var sitemap= document.getElementById("sitemap").value;
        var visibility= document.getElementById("visibility").value;
        // var cur_date= document.getElementById("cur_date").value;
       $.ajax({
           url:'<?php echo base_url();?>/admin/page/pageUpdate/' + id,
           type:'post',
           data:{
               title : title,
               seo_url : seo_url,
               content : content,
               meta_tag : meta_tag,
               meta_desc : meta_desc,
               noindex : noindex,
               nofollow : nofollow,
               sitemap : sitemap,
               visibility : visibility
            },

           success:function(response)
           {
               window.location='<?php echo base_url()."/".$page['seo_url']?>';
            //    console.log('ssssss');
           }
       });
    }
    ///////////////////////////////////////////////// ADDING WIDGETS

    function add_widgets(id,seo_url)
    {
        // var wid =  documemt.getElementById("wid");
        $.ajax({
            url:'<?php echo base_url();?>/admin/page/pageEdit/'+id,
            type:'post',
            success:function(response)
            {
                // console.log(response);
                var widgets = response;
                console.log(widgets);
              //  $('#wid').html(widgets);
              //  $('#wid').html('<h2>hello dosto</h2>');
                alert('widgets added .....');
               // window.location='<?php //echo base_url()."/"?>'+seo_url;
             
               
            }
        });
       // console.log(id);
    }
</script>

