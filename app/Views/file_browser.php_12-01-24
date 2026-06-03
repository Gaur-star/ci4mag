<?php
// echo "<pre>";
// print_r($media_list);die;

?>
<style>
.pagination{
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: 0.25rem;
    text-align: center;
    justify-content: center;
}
.pagination>li{
    padding: 5px 10px;
     color: #000;
     margin: 2px;
     border: 1px solid #828282;
     border-radius:6px;
     font-size: 20px;
     background-color: #fff;
}
.pagination>ul{
    display: inline-block;
    text-align: left;
}
</style>

<div class="container-fluid">
    <div class="row">
        <center>
            <table border="2">
                <tr>
                    <?php 
                    $count = 0;        
                    foreach($media_list as $path){
                        $count++;
                        ?>
                    <td>
                        <img src="<?php echo $path;?>" style="height:200px;width:200px" alt="thumb" class="img_upload"> 
                    </td>
                        <?php if($count % 4 == 0){    ?>
                </tr>
                <?php } }?>
            </table>   
        </center>
    </div>
    <div class="pagination">
        <?php 
        if($pager)
        {
            $pagi_path = "wp2ci/home/upload_ck_file_browser";
            $pager->setPath($pagi_path);
            echo $pager->links();
        }       
        ?>
    </div>

</div>

<script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var funcNum = <?php echo $_GET['CKEditorFuncNum'].';'; ?>
       // alert(funcNum);
       $('.img_upload').on('click',function(){
        var fileurl = $(this).attr('src');
        // alert(fileurl);
        // return;
        window.opener.CKEDITOR.tools.callFunction(funcNum,fileurl);
        window.close();
       }).hover(function(){
        $(this).css('cursor','pointer');
       });

    });
</script>