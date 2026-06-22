<div class="content-wrapper">
    <div class="container-fluid">
            <div>
                <h1 class="text-dark">Trash Page</h1>
            </div>
    </div>



   
      <div class="container-fluid">
        <div class="row">
            <form method="post" action="<?php echo base_url()?>/admin/trash_page_delete">
             <div class="row">
              <div class="col-8 mt-2 mb-4 mx-1">
                <select name="bulkaction" class="form-control" id="slc">
                    <option value="">Bulk Action</option>
                    <option value="del_all">Delete All</option>
                </select>
                </div>  
                <div class="col-2 mt-2 mb-4">
                    <input type="hidden"  id="clear_trash_page" name="id">
                   <button class="btn btn-outline-danger" type="submit" onclick="abc(event)"> Apply</button>
                </div>
             </div>
            </form>
         
            <?php //print_r($_POST);?>
            <!-- ----------------------------------------------- -->
            <!-- <div class="col-6 mt-2 mb-2">
        <form action='<?php //echo base_url(); ?>/admin/admin/bulkpostaction' class='form-inline' method="post">
          <div class="input-group">
            <select name="bulkaction" class="form-control">
              <option value="">Bulk Action</option>
              <option value="del">Delete</option>
            </select>
            <input type="hidden" name="chkk" value="">
          </div>
          <div class="input-group px-2">
            <button class="btn btn-outline-danger" type="submit">
              Apply
            </button>
          </div>
        </form>
      </div> -->
            <!--------------------------------------------------->
        <table class="table table-striped table-valign-middle">
            <tr>
                <td><input type="checkbox" id="chk_p" val="" onchange="handleChange(this)"></td>
                <td>Page Id</td>
                <td>Title</td>
                <td>Action</td>
            </tr>
            <?php foreach($trash_page as $row){?>
                <td><input type="checkbox" value="<?php echo $row->id;?>" name="chk_c"></td>
                <td><?php  echo $row->id;?></td>
                <td><?php  echo $row->title;?></td>
                <td>
                    <a class="btnsection" href="#" onclick="delete_trash_page(<?php echo $row->id;?>)">Delete</a></br>
                    <a class="btnsection" href="#" onclick="restore_trash_page(<?php echo $row->id;?>)">Restore</a>
                </td>
            </tr>
            <?php }?>    
        </table>


        </div>
     </div>
</div>
<!-- <?php //echo base_url();die;?> -->

<script type="text/javascript">
    var url='<?php echo base_url();?>';
    // var url='https://allnewsstories.com/wpconv_saurav/wp_to_ci4/';
    function restore_trash_page(id)
    {
        window.location = url+"/admin/restore_trash/"+id;
        //console.log(id);
    }

    function delete_trash_page(id)
    {
        window.location = url+"/admin/page/delete/"+id;
        // console.log(id);
    }



    // function select()
    // {
    //     var ele=document.getElementsByName('chk');
    //    // console.log(ele);
    //    for(var i=0;i<ele.length;i++)
    //    {
    //        if(ele[i].type='checkbox')
    //        {
    //            ele[i].checked=true;
    //        }
    //    }
    //    console.log(ele);
    // }

//     $(document).ready(function() {
//     $("#chk").on("click", function() {
//       if ($("#chk_p").prop("checked")) {
//         $("#chk_c").prop('checked', true);
//         var deleteBulk = [];
//         $("#check:checked").each(function() {
//           deleteBulk.push($(this).val());
//         });
//       } else {
//         var deleteBulk = [];
//         $("#chk_c").prop('checked', false);
//       }
//       $("input[name=chkk]").val(deleteBulk);
//     });

//     $("#chk_c").on("click", function() {
//       var deleteBulk = [];
//       $("#chk_c:checked").each(function() {
//         deleteBulk.push($(this).val());
//       });
//       $("input[name=chkk]").val(deleteBulk);
//     });

//   });


// $document.ready(function(){
//     if($("#chk_p").prop("checked"))
//     {
//        var ele=document.getElementById('chk_c');
//        // console.log(ele);
//        for(var i=0;i<ele.length;i++)
//        {
//            if(ele[i].type='checkbox')
//            {
//                ele[i].checked=true;
//            }
//        }
//     }
// });

function handleChange()
{
    
    var x = document.getElementById('chk_p');
    if(x.checked == true)
    {
        
        var a = document.getElementsByName('chk_c');
        for(var i=0;i<a.length;i++)
        {
            //console.log('sssss');
            a[i].checked=true;
        }
    }
    else
    {
        var a = document.getElementsByName('chk_c');
        for(var i=0;i<a.length;i++)
        {
            //console.log('sssss');
            a[i].checked=false;
        }
    }
}

function abc()
{
    var x = document.getElementById('chk_p');
    var y = document.getElementById('chk_c');
    var arr=[];
    var hidden=document.getElementById('clear_trash_page');
    //console.log(hidden);
    var del_all=document.getElementById('slc');
   // console.log(del_all.value);

    //event.preventDefault();
    if(del_all.value=='del_all')
    {
        document.querySelectorAll('[name="chk_c"]').forEach(function(ele, index){
        if(ele.checked){
            arr.push(ele.value);
        }
      })
     console.log(arr)
     hidden.setAttribute("value", arr);

    return;
    }
    // else{
    //     window.location = url+"/admin/trash_page";
    //     // window.location ="#";
    // }


    // if(del_all.value=='del_all')
    // {
    //     if(x.checked == true)
    //     {
            
    //         var a = document.getElementsByName('chk_c');
    //         for(var i=0;i<a.length;i++)
    //         {
    //             //console.log('sssss');
    //             if(a[i].checked=true)
    //             {
    //             //arr[i]=a[i].value;
    //             arr.push(a[i].value);
                
    //             }
    //         }
        
    //     }
    //     else{
    //         var a = document.getElementsByName('chk_c');
    //         for(var i=0;i<a.length;i++)
    //         {
    //             //console.log('sssss');
    //             if(a[i].checked=true)
    //             {
    //             //arr[i]=a[i].value;
    //             arr.push(a[i].value);
                
    //             }
    //         }
    //     }

    //     hidden.setAttribute("value", arr);
    
    // }
}
</script>
