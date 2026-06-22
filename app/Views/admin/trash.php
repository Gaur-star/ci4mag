
<?= $this->extend('layout/admin') ?>


<?= $this->section('cssLinks') ?>

<style>
    .pagination-page {
        margin-bottom: 20px;
    }

    .pagination-page a {
        padding: 5px 10px;
        color: #000;
        margin: 2px;
        border: 1px solid #828282;
        border-radius: 6px;
        font-size: 20px;
        text-decoration: none;
        cursor: pointer;

    }

    .pagination-page strong {
        padding: 10px 20px;
        color: #000;
        margin: 2px;
        border: 1px solid #828282;
        border-radius: 10px;
        font-size: 20px;
        background-color: #fff
    }

    .table tr:nth-child(1) {
        height: 0px;
    }

    .fade-color {
        color: #757575;
    }

    #loader-section {
        display: none;
    }
    .btnsection{
        margin-right: 20px;
    }
</style>

<?= $this->endSection() ?>




<?= $this->section('content') ?>



<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-6">
                <h1 class="text-dark">Trash Post</h1>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="pagination-page">
                <?php //echo $this->pagination->create_links(); 
                    if($pager)
                    {
                        // $pagi_path = 'admin/trash';
                        // $pager->setPath($pagi_path);
                        // echo $pager->links();
                    }
            
                ?>
            </div>
        
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <!-- <button class="btn btn-success" onclick="deleteAllPost()" id="delete_all" style="display:none">Delete All</button> -->
                <button class="btn btn-success" onclick="deleteAll()" id="delete_all" style="display:none">Delete All</button>
                <button class="btn btn-success" onclick="restoreAllPost()" id="restore_all" style="display:none">Restore All</button>
            </div>
            <table class="table table-striped table-valign-middle">
                <tr class="active">
                    <td><input type="checkbox" onclick="selectAll()" id="trashall"></td>
                    <td width="10%">Post Id</td>
                    <td width="80%">Title</td>
                    <td width="10%">Action</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-center" id="loader-section"><img src="<?= base_url() . "assets/loader.svg" ?>"></td>
                </tr>
                <?php foreach ($posts as $post) { ?>
                    <tr>
                        <td><input type="checkbox" value="<?= $post["id"] ?>" name="trash_check[]"></td>
                        <td width="10%"><?= $post["id"] ?></td>
                        <td width="80%"><?= $post["title"] ?></td>
                        <td width="10%">
                            <a class="btnsection" href="#" onclick="delete_trash('<?= '[' . $post['id'] . ']' ?>')">Delete</a>
                            <a class="btnsection" href="#" onclick="restore_trash('<?= '[' . $post['id'] . ']' ?>')">Restore</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

        </div>
    </div>

</div>


<?= $this->endSection() ?>


<?= $this->section('scriptLinks') ?>


<script type="text/javascript">
    $("input[name^='trash_check']").on("click", function() {
        if ($("input[name^='trash_check']:checked").length > 0) {
            $("#delete_all").show();
            $("#restore_all").show();
        } else {
            $("#delete_all").hide();
            $("#restore_all").show();
        }
    });

    function delete_trash(delete_id) {
        $.ajax({
            url: "<?= base_url() . "/admin/admin/trash_clear" ?>",
            data: {
                delete_id
            },
            type: "post",
            success: function() {
                $("#loader-section").hide();
                // alert(delete_id);
                location.href = "<?= base_url() . "/admin/trash" ?>"
            }
        });
    }


    function selectAll(event) {
        // console.log(event);
        if ($("#trashall").is(':checked')) {
            $("input[name^='trash_check']").prop("checked", true);
            $("#delete_all").show();
            $("#restore_all").show();
            
        } else {
            $("input[name^='trash_check']").prop("checked", false);
            $("#delete_all").hide();
            $("#restore_all").hide();
        }

    }

    function deleteAllPost() {
        $("#loader-section").show();
        var deleteid = [];
        $("input[name^='trash_check']:checked").each(function() {
            deleteid.push($(this).val());

        });
        delete_trash(JSON.stringify(deleteid));
    }

    function restore_trash(restore_id) {
        $.ajax({
            url: "<?= base_url() . "/admin/admin/restore" ?>",
            data: {
                restore_id
            },
            type: "post",
            success: function() {
                $("#loader-section").hide();
                location.href = "<?= base_url() . "/admin/trash" ?>"
            }
        });
    }

    function deleteAll()
    {
        var arr=[];
        parent=document.getElementById('trashall');
        if(parent.checked='true')
        {
            document.querySelectorAll('[name="trash_check[]"]').forEach(function(ele,index)
            {
                {
                    arr.push(ele.value);
                }
            })

        }
       console.log(arr);
       var data=arr.join(',');

       $.ajax({
         url:'<?= base_url();?>/admin/trash_delete',
         type:'post',
         data:{data : data},
         success:function(data)
         {
             window.location='<?= base_url();?>/admin/trash';
         }
         });
       
    }

    function restoreAllPost()
    {
        var arr=[];
        parent=document.getElementById('trashall');
        if(parent.checked='true')
        {
            document.querySelectorAll('[name="trash_check[]"]').forEach(function(ele,index)
            {
                {
                    arr.push(ele.value);
                }
            })

        }
       console.log(arr);
       var data=arr.join(',');

       alert(data);

       $.ajax({
        //  url:'</?php echo base_url();?>/admin/trash_delete',
         url:'<?= base_url();?>/admin/admin/restore',
         type:'post',
         data:{data : data},
         success:function(data)
         {
             window.location='<?= base_url();?>/admin/trash';
         }
         });
       
    }

</script>

<?= $this->endSection() ?>