
<?= $this->extend('layout/admin') ?>


<?= $this->section('cssLinks') ?>

<style>
    .block-section {
        text-align: center;
        border: 3px solid;
        padding: 60px;
    }
    .form-inline .input-group{
        padding: 2px;
    }
        #myProgress {
        width: 100%;
        background-color: #ddd;
    }

        #myBar {
        width: 0%;
        height: 30px;
        background-color: #04AA6D;
        }
</style>

<?= $this->endSection() ?>




<?= $this->section('content') ?>


<?php // phpinfo();die;?>
<div class="content-wrapper">

    <div class="container mt-2 mb-3">
            <div id="myProgress">
            <div id="myBar"></div>
            </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php $session = session();
                      echo $session->getFlashdata('msg'); ?>
            </div>
            <div class="col-md-6 block-section">
                <div class="col-md-12">
                    <h1>1.Clear Old Data</h1>
                </div>
                <div class="col-md-12">
                    <a href="<?php echo base_url() .
                        '/admin/import/truncat'; ?>" class="btn btn-danger">Clear Old Data</a>
                </div>
            </div>
            <div class="col-md-6 block-section">
                <div class="col-md-12">
                    <h1>2.Select Database and Import</h1>
                </div>
                <div class="col-md-12">
                    <form class="form-inline" action="<?php echo base_url() .
                        '/admin/import'; ?>" method="post">
                        <div class="input-group col-md-4">
                            <select name="db_name" class="form-control" required>
                                <?php if ($files) { ?>
                                    <option value="">Select Sql File</option>
                                    <?php foreach ($files as $f) { ?>
                                        <option value="<?php echo $f; ?>"><?php echo $f; ?></option>
                                    <?php } ?>
                                <?php } else { ?>
                                    <option value="">Upload .Sql File to root</option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="input-group col-md-4">
                            <input type="text" name="prefix" placeholder="Enter Prefix" class="form-control" required>
                        </div>
                        <div class="input-group col-md-4">
                            <button class="btn btn-primary" type="submit">Import Database</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 block-section">
                <div class="col-md-12">
                    <h1>3.Update Site Data</h1>
                </div>

               
                <div class="col-md-12">
                <!-- <form method="post" action="<?php // echo base_url() .'/admin/import/updateDatabase'; ?>"> -->
                    <input type="text" name="mediaurl" id="mediaurl" placeholder="Add the media url">
                    <!-- <a href="<?php //echo base_url() .
                       // '/admin/import/updateDatabase'; ?>" class="btn btn-success">Update Site Data</a> -->
                    <button class="btn btn-success" id="update_button" onclick="update_post();">Update Site Data</button>   
                <!-- </form>         -->
                </div>
            </div>
            <div class="col-md-6 block-section">
                <div class="col-md-12">
                    <h1>4.Delete temp files and tables</h1>
                </div>
                <div class="col-md-12">
                    <a href="<?php echo base_url() .
                        '/admin/import/deleteImportedTables'; ?>" class="btn btn-warning">Delete temp files and tables</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>


<?= $this->section('scriptLinks') ?>

<script>
//     var count = 0;
//    var i =0;

//     // if(mediaurl!='')
//     // {

//     // }
//    // var remain = '';
//     function update_post()
//     {
//       //  var mediaurl = document.getElementById("mediaurl").value;
//         // alert(mediaurl);
//         // return;
        
//         // console.log(p);
//         // return;
       
//         $.ajax({
//             url: '<?php // echo base_url() ."/admin/import/updateDatabase"?>',
//             type:'post',
//             data:{count:count},
//             success:function(response)
//             {
                
//             //    console.log(response);
//             //    return;
//               count=count+5;
//            //    alert(response);
//             //    return;
//            //   remain='continue';

//            if (i == 0){
//                 i = 1;
//                 var elem = document.getElementById("myBar");
//                 var width = 1;
//                // var id = setInterval(frame,1000);
//                 // function frame()
//                 // {

//                     if((response!='done') && (response!='success'))
//                     {
//                         update_post(count);
//                         width=30;
//                         elem.style.width = width+"%";
//                     }

//                     else if(response=='success')
//                     {
//                        // clearInterval(id);
//                         i = 0;
//                         width=69;
//                         elem.style.width = width+"%";
//                         alert("Data imported successfully");
//                        // return;
//                     }
//                // }
//            }



//             }

//         });

//     }



///////////////////////////////////////////////////////////////////////////////////////////////////////


var count = 0;

// if(mediaurl!='')
// {

// }
// var remain = '';
function update_post()
{
    var mediaurl = document.getElementById("mediaurl").value;
    var elem = document.getElementById("myBar");
    var width = 10;
             //   width=10;
    elem.style.width = width+"%";
   // alert(mediaurl);
    // return;
    
    // console.log(p);
    // return;
   
    $.ajax({
        url: '<?php echo base_url() ."/admin/import/updateDatabase"?>',
        type:'post',
        data:{count:count,mediaurl:mediaurl},
        success:function(response)
        {
            
        //    console.log(response);
        //    return;
          count=count+5;
        //   if(count>5)
        //   {
        //     width=10;
        //     elem.style.width = width+"%";
        //   }

        //   alert(response);
        //     return;
       //   remain='continue';
            if((response!='done') && (response!='success'))
            {
                
                setTimeout(update_post, 6000);
                
                width=50;
                elem.style.width = width+"%";
            }else if(response=='success'){
                width=100;
                elem.style.width = width+"%";
                alert("Data imported successfully");
            }

        }

    });

}


///////////////////////////////////////////////////////////////////////////////////////////////////////






// var count = 0;

// // if(mediaurl!='')
// // {

// // }
// // var remain = '';
// function update_post()
// {
//     var mediaurl = document.getElementById("mediaurl").value;
//     // alert(mediaurl);
//     // return;
    
//     // console.log(p);
//     // return;
   
//     $.ajax({
//         url: '<?php  // echo base_url() ."/admin/import/updateDatabase"?>',
//         type:'post',
//         data:{count:count,mediaurl:mediaurl},
//         success:function(response)
//         {
            
//         //    console.log(response);
//         //    return;
//           count=count+5;
//        //    alert(response);
//         //    return;
//        //   remain='continue';
//             if((response!='done') && (response!='success'))
//             {
//                 update_post(count);
//             }else if(response=='success'){
//                 alert("Data imported successfully");
//             }

//         }

//     });

// }
</script>

<?= $this->endSection() ?>