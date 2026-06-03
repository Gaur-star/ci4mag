
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Upload New Media</h1>
          </div>
         </div>
      </div>
    </section>
 <section class="content" style="overflow:hidden;">
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
    document.getElementById('blah').style.display='block';
	document.getElementById('b1').style.display='block';
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
			<div class="col-md-1">
			</div>
			<?php //echo validation_errors(); 
			// if(isset($_SESSION['vdata'])){
			// 	  echo "<div style='color:red !important;'>".$_SESSION['vdata']."</div>";
			// 	  unset($_SESSION['vdata']);
			// }
			 ?>
			<form action="<?php echo base_url() ?>admin/media/do_upload" method="post" class="newsletter_form1" enctype='multipart/form-data'>
			<?php echo validation_errors(); 
			if(isset($_SESSION['m_vdata'])){
				  echo "<center><div style='color:red;' id=''><br>".$_SESSION['m_vdata']."</div></center>";
          unset($_SESSION['m_vdata']);
        
          	}
			 ?>
				<div class="col-md-10">
				<div class="row">
			<div class="col-md-4">
			<br>
      <label for="image" class="btn" style="background:#ebebe0;color:gray;border:2px solid gray;">Add Media</label>
			<input type='file' name='image' id='image' onchange='readURL(this);' style="padding:2px;background:#f2f2f2;visibility:hidden;" class="newsletter_input form-control-lg form-control" required/>
			</div>
            <div class="col-md-5">
			<br>
            <img class="img-thumbnail" src="" id="blah" style="height:150px;width:200px;display:none">
            <br>
              </div>
			  <div class="col-md-3">
			  <br>
			  <button id="b1" class="" style="background:#006699;border:2px solid #006699;color:white;font-size:15px;border-radius:5px;display:none;"><b>&nbsp;Post&nbsp;</b></button>
			</div>
			  </div>
        	</div>
			<br>
				</form>
      <?php //echo $error;?>
</div>
		</div>
	</div>
   </div>
        </div>
        </div>
      </section>
     </div>
     <script>
$(document).ready(function(){
	$("#title").keyup(function(){
		var title = document.getElementById('title').value.toLowerCase();
		var s=title.replace(/@|_|%|&|!|#| +/g, "-");
		var s1=s.replace(/-+/g, "-");
		  var sugest_title=document.getElementById('sugest_title').value;
		  var n = sugest_title.length;
		  var res = sugest_title.substring(n-1, n);
	var s1=s1.replace(/.$/,"");
		document.getElementById('sugest_title').value=s1;
 });
  $("#sugest_title").keyup(function(){
		var sugest_title = document.getElementById('sugest_title').value.toLowerCase();
		var s=sugest_title.replace(/@|_|%|&|!|#/g, "-");
		var s1=s.replace(/  /g, " ");
			document.getElementById('sugest_title').value=s1;
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
			document.getElementById('keywords').innerHTML=keywords+"<button>&nbsp;"+last_keyword+"&nbsp;</button>"+"<input type='button' id='key"+keyword_count+"' onclick=this.style.display='none'; value='&#10006' style='background:#0066ff;border:2px solid #0066ff;color:white;font-size:15px;'>&nbsp;";
			document.getElementById('all_keyword').value=all_keyword+last_keyword+",";
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
			keyword_count=keyword_count+1;
  	}
	 });
});
</script>
<?php  unset($_SESSION['m_vdata']);?>
