
  <?php
    //print_r($_SESSION);cke_dialog_ui_button
  ?>
  <style>
  .cke_dialog_title:after{
    content: " Elphill Technology Pvt Ltd";
    color:brown;
    font-size:25px;
  }
  
  </style>
  <style>
  .cke_dialog_ui_button{
   
    color:brown;
    font-size:25px;
  }
  .cke_contents{
    display: block !important;
    
}
textarea.cke_source {
    
    display: block !important;
}
.cke_inner {
    display: block !important;
  
}
  </style>
  <!--style>
  .cke_dialog_ui_vbox_child:after{
    content: 'whatever it is you want to add';
  }
  </style-->
  <div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <table><tr><td><h1>Edit Post</h1></td>
            <td>&nbsp;&nbsp;&nbsp;<a href="../../admin"><button class="btn-default" style="color:#0066cc;border-radius:5px;"><b >Add New</b></button></a></td></tr></table>
         
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
               </div>
            <script>
                    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    document.getElementById('preview').style.display='block';
    document.getElementById('space').style.display='block';
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
     reader.readAsDataURL(input.files[0]);
  }
}
$("#image").change(function() {
  readURL(this);
});
            </script>   
	<div class="blog">
		<div class="container">
			<div class="row">
		

<script>
function validate() {
      
  var editor_val = document.getElementById('source').value;
  var cat = document.getElementById('all_categorie_id').value;
    
     if(!(editor_val.length>6)){
     document.getElementById('error12345').innerHTML='<center>content is required</center>';
     return false;
     }else if(!(cat.length>0)){
      document.getElementById('error12345').innerHTML='<center>Please select a category</center>';
    
    return false;
     }else{
      return true;
     }
     
}

</script> 

			<form onSubmit="return validate();" action="<?php echo base_url() ?>admin/blog_details_edit/blog_details_edit_process" method="post" class="" enctype='multipart/form-data'>
      <input type="hidden" name="HTTP_REFERER" value="<?php echo $HTTP_REFERER;?>" />
     
    	<div class="col-md-8">
      <br>
      <?php echo validation_errors(); 
			if(isset($_SESSION['vdata'])){
				  echo "<center><div style='color:red !important;' align='center'>".$_SESSION['vdata']."</div></center>";
				  unset($_SESSION['vdata']);
			}
			 ?>
      <div style='color:red;' id='error12345'></div>
            <?php foreach($posts as $details){ ?>
                <input type="hidden" name="id" id="id" value="<?php echo $details['id'];?>" class="newsletter_input" placeholder="Enter your post title" ><br><br>
                <!--input type="text" id='last_id' name='last_id'-->
                <h4>Post or Blog Title( <span style='color:red;'>required</span> )</h4><br>
                <input type="text" onpaste="myFunction()" name="title" id="title" value="<?php echo $details['title'];?>" class="form-control"  placeholder="Enter your post title" style="font-size:20px;height:40px;"><br><br>
                <script>
      function myFunction() {
   // alert(1);
   document.getElementById('sugest_title').style.display='block';
		var title = document.getElementById('title').value.toLowerCase();
		var s=title.replace(/[^a-z0-9]/g, "-");
		var s1=s.replace(/-+/g, "-");
		s1=s1.replace(/(^\-)|(\-$)/gi,"");
			  var sugest_title=document.getElementById('sugest_title').value;
		  var n = sugest_title.length;
		  var res = sugest_title.substring(n-1, n);
    	document.getElementById('sugest_title').value=s1.substring(0, 100);
}
      </script>
              	<h4>Post or Blog URL ( <span style='color:red;'>required</span> )</h4><br>
                
                <input type="text" name="sugest_title" id="sugest_title" value="<?php echo $details['seo_url'];?>" class="form-control"  placeholder="Sujested post title" style="font-size:20px;height:40px;display:none1;"><br><br>
								 <div class="col-md-5">
                 <h4>Feature Image ( <span style='color:green;'>optional</span> )</h4><br>
                <label for="image" class="btn" style="background:#ebebe0;color:gray;border:2px solid gray;">Add Media</label>
								<input type='file' name='image' id='image' onchange='readURL(this);' style="padding:2px;background:#f2f2f2;background-image: url('paper.gif');visibility:hidden;" class="newsletter_input form-control-lg form-control"/>
								</div>
                <div class="col-md-3" id="preview" style="display:none;">
                <img src="" class="img-thumbnail" id="blah" style="height:150px;width:300px;"></div><div id="space" style="display:none;"><br><br><br><br><br><br></div><br><br><br><br><br><br><br><br><br><br>
                <h4>Post or Blog Content ( <span style='color:red;'>required</span> )</h4><br>
                <input type="button" onclick="ck();" value="Noflow">
                <script>
                
               function ck(){
                 var title=document.getElementsByClassName('cke_dialog_ui_input_text')[9].value;
                  var a=document.getElementsByClassName('cke_dialog_ui_input_text')[3].value;
                  //alert(title);
                  //a=a+'"';
                   var a1=CKEDITOR.instances.source.getData();
                   res = a1.replace(a, a+"\" rel='nofollow' target='_blank' title='"+title+"'");
                   //res = a1.replace("'", "\"");
                   CKEDITOR.instances['source'].setData(res);
                 // document.getElementsByClassName('cke_dialog_title')[0].innerHTML="<input type='checkbox' onclick='var a=document.getElementsByClassName('cke_dialog_ui_hbox_last')[0].value;alert(a);'>No follow";
                }
             // });
                </script>
                <h4 style="opacity:0;">Set all content link as dofollow ( <span style='color:green;opacity:0;'>optional</span> ) <input type="checkbox" id="follow" name="follow" value="d" class="form-control1"></h4>
            	<textarea id="source" name="content" class="newsletter_input1 form-control ckeditor" rows="15" cols="100">
                                <?php echo $details['content'];?> 
                                </textarea>
                                <?php
                                if($details['follow']=='d'){
                                      echo "<script>
                                                    document.getElementById('follow').checked = true;
                                            </script>";
                                }
                                 ?>
                                <h4>Meta Tags ( <span style='color:green;'>optional</span> )</h4>
                                <br><input type="text" value="<?php echo $details['meta_tag'];?>" placeholder="Enter Meta tag" name="meta_tag"  id="meta_tag" class="form-control">
                                <h4>Meta Description ( <span style='color:green;'>optional</span> )</h4>
                <br><textarea class="form-control" placeholder="Enter Meta description" name="meta_desc"  id="meta_desc" rows="5"><?php echo $details['meta_desc'];?></textarea>
                                <?php 
                                if(strlen($details['image'])>0){
                                    echo "<script>
                                    document.getElementById('blah').src='".$details['image']."';
                                            document.getElementById('preview').style.display='block';
                                    </script>";
                                }
                               ?> 
	<div id='design'></div>
								<div  style="font-size:15px;">
								
								<b>
								</div>
								<br><br>
							 <?php } ?>
									</div>
      	<div class="col-md-3">
			<div class="container1">
      <div class="list-group">
  <a class="list-group-item active"><b style="font-size:18px;color:white;">&nbsp;Publish ( <span style='color:red;background:white;border-radius:5px;'>&nbsp;required&nbsp;</span> )</b></a>
  <a class="list-group-item">Author<select name="author" id="author" class="form-control">
  <?php foreach($user as $author){?>
        <option value="<?php echo $author['id'];?>">&nbsp;<?php echo $author['user_name'];?></option>
      <?php } ?>
								    <option value="Admin">&nbsp;Admin</option>
								<option value="User">&nbsp;User</option>
                                </select></a>
                                 <a class="list-group-item"> Publish<input name="date_"  id="date_" type="date" value="<?php echo $details['date_'];?>" class="form-control"><br>
                                <input name="time_"  id="time_" type="time" value="<?php echo $details['time_'];?>" class="form-control"></a>
                                <a class="list-group-item"> 
                                Include this post in site map <input name="site_map" id="site_map" type="checkbox" value="y"  ><br>
                               </a>
                                <a class="list-group-item active">
                                <?php
                                    $text = strtolower($details['seo_url']);
                                    $text = str_replace(' ', '_', $text);
                                   $text = preg_replace('/[^a-z0-9]+/', '-', strtolower($text));
                                  $text = str_replace("'", '', $text);
                                  $text = preg_replace('/-{2,}/','-',$text);
                                  $text = ltrim($text, '-'); 
                                  $text=rtrim($text, '-');
                                ?>
                                <!--td><a href="<?php echo base_url().$text;?>" target=blank><button class="" type="button" name="preview" style="background:#0099ff;border:2px solid #006699;color:white;font-size:12px;">
                                <b>&nbsp;Preview&nbsp;</b>
                                </button></a></td-->
                                <table><tr><td><button class=""  value="preview" name="preview" style="background:#0099ff;border:2px solid #006699;color:white;font-size:12px;height:35px;">
                                <b>&nbsp;Preview&nbsp;</b>
                                </button></td><td>
                                <button class="" style="background:#0099ff;border:2px solid #006699;color:white;font-size:18px;position:relative;top:11px;">
                                <b>&nbsp;Post&nbsp;</b>
                                </button>
								&nbsp;&nbsp;    </td><td><select name="visibility" id="visibility" class="form-control" style="background:#006699;border:2px solid #006699;color:white;font-size:15px;">
								                    <option value="Public"><b>&nbsp;&nbsp;Public&nbsp;</b></option>
								                    <option value="Only me"><b>&nbsp;&nbsp;Only me&nbsp;</b></option>
                                    <option value="Trush"><b>&nbsp;&nbsp;Trush&nbsp;</b></option>
                                </select></td></tr></table>
                                  <script>
                                    document.getElementById('author').value='<?php echo $details['author'];?>';
                                    document.getElementById('visibility').value='<?php echo $details['visibility'];?>';
                              </script></a>
                              <?php
                                    if($details['site_map']=='y'){
                                        echo "<script>
                                                document.getElementById('site_map').checked=true;
                                        </script>";
                                    }
                              ?>
</div>
 <input type="hidden" id="all_categorie" name="all_categorie">
  <input type="hidden" id="all_categorie_id" name="all_categorie_id">
  <br>
  <div class="list-group">
  <a class="list-group-item active"><b style="font-size:18px;color:white;">&nbsp;Categorie ( <span style='color:red;background:white;border-radius:5px;'>&nbsp;required&nbsp;</span> )</b></a>
  <a class="list-group-item"><div id="categories" style="font-size:15px;">
    </div></a>
    <div style="height:200px;overflow-y:scroll;">
  <?php foreach($cat as $catdata){?>
    <a class="list-group-item">&nbsp;&nbsp;<input type="checkbox" id="cat<?php echo $catdata['id'];?>" onclick="f<?php echo $catdata['id'];?>();" value="<?php echo $catdata['categorie']; ?>"><?php echo "&nbsp;&nbsp;<b style='font-size:15px;'>".$catdata['categorie']."</b>";?></a>
    
	<script>
function f<?php echo $catdata['id'];?>(){
	var categories=document.getElementById('categories').innerHTML;
	var all_categorie=document.getElementById('all_categorie').value;
	var all_categorie_id=document.getElementById('all_categorie_id').value;
	if(document.getElementById('<?php echo "cat".$catdata['id'];?>').checked==true){
	document.getElementById('categories').innerHTML=categories+"<button><span>&nbsp;<?php echo $catdata['categorie']; ?>&nbsp;</span></button>&nbsp;";
	document.getElementById('all_categorie_id').value=all_categorie_id+'<?php echo $catdata['id']; ?>,';
	document.getElementById('all_categorie').value=all_categorie+'<?php echo $catdata['categorie']; ?>,';
	}else{
			document.getElementById('categories').innerHTML=categories.replace("<button><span>&nbsp;<?php echo $catdata['categorie']; ?>&nbsp;</span></button>&nbsp;", " ");
		document.getElementById('all_categorie').value=all_categorie.replace("<?php echo $catdata['categorie']; ?>,", "");
		document.getElementById('all_categorie_id').value=all_categorie_id.replace("<?php echo $catdata['id']; ?>,", "");
		}
}
</script>
<?php } ?>
<?php foreach($post_id as $details){ ?>
<script>
var categories=document.getElementById('categories').innerHTML;
	 var all_categorie=document.getElementById('all_categorie').value;
	var all_categorie_id=document.getElementById('all_categorie_id').value;
document.getElementById('categories').innerHTML=categories+"<button><span>&nbsp;<?php echo $details['categorie']; ?>&nbsp;</span></button>&nbsp;";
	document.getElementById('all_categorie').value=all_categorie+'<?php echo $details['categorie']; ?>,';
  document.getElementById('all_categorie_id').value=all_categorie_id+'<?php echo $details['categorie_id']; ?>,';
	document.getElementById('<?php echo "cat".$details['categorie_id'];?>').checked=true;
</script>
<?php } ?>
   </div></div>
	<br><br>
  	<input type="hidden" name="all_keyword" id="all_keyword">
  <input type="hidden" name="delete_keyword" id="delete_keyword" >
	<div class="list-group">
  <a class="list-group-item active"><b style="font-size:18px;color:white;">&nbsp;Type Keywords ( <span style='color:green;background:white;border-radius:5px;'>&nbsp;optional&nbsp;</span> )</b></a>
  <a class="list-group-item">
  <div id="keywords" style="font-size:15px;height:50px;overflow-y:scroll;" >
	</div></a>
  <a class="list-group-item">
  <textarea rows="3" cols="37" id="keyword" style="font-size:15px;" class="form-control"></textarea>
  <span style="color:#b8b894;">Separate tags with commas</span>
  </a>
  
</div>

</div>
						</div>
            </form>
            <?php /*foreach($posts as $details){ 
$str = $details['categorie'];
$a=explode(",",$str);
for($i=0; $i<count($a)-1; $i++){
echo "<script>
var categories=document.getElementById('categories').innerHTML;
	var all_categorie=document.getElementById('all_categorie').value;

        document.getElementById('cat3').checked=true;
        document.getElementById('categories').innerHTML=categories+'<button><span>&nbsp;".$a[$i]."&nbsp;</span></button>&nbsp;';
	
	document.getElementById('all_categorie').value=all_categorie+'".$a[$i].",';
</script>";
}

            }*/?>
       <?php 
  $count=1;
  foreach($keyword as $tag){ ?>
<script>
	var keywords=document.getElementById('keywords').innerHTML;
		  var all_keyword=document.getElementById('all_keyword').value;
      document.getElementById('keywords').innerHTML=keywords+"<button id='k<?php echo $count;?>'><?php echo $tag['keyword']?></button><input type=button id='key<?php echo $count;?>' onclick=document.getElementById('delete_keyword').value='<?php echo $tag['keyword']?>';f1();document.getElementById('k<?php echo $count;?>').style.display='none';this.style.display='none';   value='&#10006' style='background:#0066ff;border:2px solid #0066ff;color:white;font-size:15px;'>";
			document.getElementById('all_keyword').value=all_keyword+'<?php echo $tag['keyword']?>'+',';
     </script>
       <?php 
            $count=$count+1;
        }?>
				</div>
	</div>
	</div>
     </div>
        </div>
        </div>
       </section>
    </div>
    <p id="d2"></p>
    <script>
$(document).ready(function(){
	$("#title").keyup(function(){
    document.getElementById('sugest_title').style.display='block';
		var title = document.getElementById('title').value.toLowerCase();
		var s=title.replace(/[^a-z0-9]/g, "-");
		var s1=s.replace(/-+/g, "-");
		s1=s1.replace(/(^\-)|(\-$)/gi,"");
			  var sugest_title=document.getElementById('sugest_title').value;
		  var n = sugest_title.length;
		  var res = sugest_title.substring(n-1, n);
    	document.getElementById('sugest_title').value=s1.substring(0, 100);
});
  $("#sugest_title").keyup(function(){
		var sugest_title = document.getElementById('sugest_title').value.toLowerCase();
		var s=sugest_title.replace(/[^a-z0-9]/g, "-");
		var s1=s.replace(/  /g, " ");
		s1=s1.replace(/(^\-)|(\-$)/gi,"");
    s1=s1.replace(/(^\s*)|(\s*$)/gi,"");
		document.getElementById('sugest_title').value=s1.substring(0, 100);
		 });
  var keyword_count=1;
  $("#keyword").keyup(function(){
		var keyword = document.getElementById('keyword').value;
		var n = keyword.length;
		 var res = keyword.substring(n-1, n);
		if(res==','){
			var keywords=document.getElementById('keywords').innerHTML;
			var last_keyword=keyword.substring(0, n-1);
			var all_keyword=document.getElementById('all_keyword').value;
      var k=all_keyword.split(last_keyword).length;
      if(!(k==2)){
        document.getElementById('keywords').innerHTML=keywords+"<button id='k"+keyword_count+"'>"+last_keyword+"</button><input type='button' id='key' onclick=document.getElementById('delete_keyword').value=document.getElementById('k"+keyword_count+"').innerHTML;this.style.display='none';document.getElementById('k"+keyword_count+"').style.display='none';f1();  value='&#10006' style='background:#0066ff;border:2px solid #0066ff;color:white;font-size:15px;'>&nbsp;";
			document.getElementById('all_keyword').value=all_keyword+last_keyword+",";
      }
			document.getElementById('keyword').value="";
			var fun_name='key'+keyword_count;
			var js=document.getElementById('js').innerHTML;
				$('#key'+keyword_count).click(function(){
				var words=document.getElementById('keywords').innerHTML;
				var words1=document.getElementById('all_keyword').value;
				var s=words.replace('<button>&nbsp;'+last_keyword+'&nbsp;</button>', '');
					var s1=words1.replace(last_keyword+",", "");
				document.getElementById('keywords').innerHTML=s;
				document.getElementById('all_keyword').value=s1;
					});
			}
		keyword_count=keyword_count+1;
  });

/////////////////////////////////////////////////
/*setInterval(function(){
   //alert("Hello");
   var name=document.getElementById('title').value; 
   var url=document.getElementById('sugest_title').value; 
   var source=document.getElementById('source').value; 
   var meta_tag=document.getElementById('meta_tag').value; 
   var meta_desc=document.getElementById('meta_desc').value; 
   var author=document.getElementById('author').value; 
   var date_=document.getElementById('date_').value; 
   var time_=document.getElementById('time_').value; 
   //var site_map=document.getElementById('site_map').value; 
   var visibility=document.getElementById('visibility').value;
   var all_categorie=document.getElementById('all_categorie').value;  
   var all_categorie_id=document.getElementById('all_categorie_id').value; 
   var all_keyword=document.getElementById('all_keyword').value; //value not coming
   var delete_keyword=document.getElementById('delete_keyword').value; //value not coming
   var id=document.getElementById('id').value;
   if(document.getElementById('follow').checked==true){
     var follow_link='d';
   }else{
     var follow_link='n';
   }

   if(document.getElementById('site_map').checked==true){
     var site_map='y';
   }else{
     var site_map='n';
   }
   //alert(follow);

   $.ajax({
        type: 'POST',
        url: '<?php echo base_url();?>admin/blog_details_edit/blog_details_edit_process_for_draft',
        data: {name:name, source:source, url:url, meta_tag:meta_tag, meta_desc:meta_desc, author:author,date_:date_, time_:time_, site_map:site_map, visibility:visibility, all_categorie:all_categorie, all_categorie_id:all_categorie_id, id:id, follow_link:follow_link } ,
        success: function(data)
                  {
                   // document.getElementById('last_id').value=data;
 //console.log(data);
                     }
         });

   }, 5000);*/
/////////////////////source////////////////////////////
CKEDITOR.config.height=800;
//////////////////////////////////////////
///////////////////try ck editor no follow//////cke_dialog_contents_137////////
//document.getElementsByClassName('cke_dialog_title')[0].innerHTML='abc';
//document.getElementById('cke_dialog_title_175').innerHTML='abc';
//document.getElementsByClassName("cke_dialog_title").innerHTML='abc';
//document.getElementsByClassName("hid_id")
////////////////////////end try/////////////////////////cke_367_label



});
</script>
<script>
function f1(){
  var a= document.getElementById('delete_keyword').value;
  var b= document.getElementById('all_keyword').value;
  b=b.replace(a+",", "");
  document.getElementById('all_keyword').value=b;
  //alert(a);
}
</script>

<?php  unset($_SESSION['vdata']);?>
