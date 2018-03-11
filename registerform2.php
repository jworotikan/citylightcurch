<div class="container">
<div class="content-wrapper">
	<section class="content">
      <form class="form-horizontal sky-form" role="form" method="post" action="" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
      	<div class="form-group">
      		<div class="row">
      			<div class="col-md-2">
			      <label for="inputfullname" class="control-label">Nama Lengkap :</label>
			    </div>
			    <div class="col-md-4">
			      <input type="text" class="form-control" name="fullname" id="inputfullname" value="">
			    </div>
			    <div class="col-md-2">
			      <label for="inputfullname" class="control-label">Tempat, Tanggal Lahir :</label>
			    </div>
			    <div class="col-md-2">
			      <input type="text" class="form-control" name="fullname" id="inputfullname" value="">
			    </div>
			    <div class="col-md-2">
			      <div class="input-group date">
			        <div class="input-group-addon">
			          <i class="fa fa-calendar"></i>
			        </div>
			        <input type="text" class="form-control pull-right" id="datepicker" name="published_date">
			      </div>
			    </div>
      		</div>
      		
	    	<div class="control-group after-add-more row">
		    	<div class="col-md-2">
			      <label for="inputfullname" class="control-label">Nama Anak :</label>
			    </div>
			    <div class="col-md-2">
			      	<input type="text" name="childname[]" class="form-control" placeholder="Nama Anak">
			    </div>
			    <div class="col-sm-1">
			      	<input type="text" name="childage[]" class="form-control" placeholder="Usia">
			    </div>
			    <div class="input-group-btn">
	      			<button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i></button>
	        	</div>
	    	</div>
	    	<hr>
	    	<div class="row">
	    		<div class="col-md-2">
	    			<label for="inputfullname" class="control-label">Alamat :</label>
	    		</div>
	    		<div class="col-md-4">
	    			<textarea id="editor1" name="mkey_en" rows="3" cols="40" placeholder="Alamat"></textarea>
	    		</div>
	    		<div class="col-md-2">
	    			<label for="inputfullname" class="control-label">No. Hp 1 :</label>
	    		</div>
	    		<div class="col-md-4">
	    			<input type="text" class="form-control" name="fullname" id="inputfullname" value="">
	    		</div>
	    		<div class="col-md-2">
	    			<label for="inputfullname" class="control-label">No. Hp 2 :</label>
	    		</div>
	    		<div class="col-md-4">
	    			<input type="text" class="form-control" name="fullname" id="inputfullname" value="">
	    		</div>
	    		<div class="col-md-2">
	    			<label for="inputfullname" class="control-label">Email :</label>
	    		</div>
	    		<div class="col-md-4">
	    			<input type="text" class="form-control" name="fullname" id="inputfullname" value="">
	    		</div>
	    	</div>
      	</div>
      </form>
  </section>
</div>
</div>








<!-- Copy Fields -->
<div class="copy hide">
  <div class="control-group row" style="margin-top:10px">
    <div class="col-md-2">
	    </div>
	    <div class="col-md-2">
	      	<input type="text" name="childname[]" class="form-control" placeholder="Nama Anak">
	    </div>
	    <div class="col-sm-1">
	      	<input type="text" name="childage[]" class="form-control" placeholder="Usia">
	    </div>
    <div class="input-group-btn"> 
      <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i></button>
    </div>
  </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>