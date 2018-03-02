<?php
	function pictupload($filelabel, $filename, $fileupload, $previewfile, $fileuploadview){
?>
	<fieldset>
        <section>
          <label class="label"><?php echo $filelabel ;?></label>
			<label for="file" class="input input-file">
            <div class="button"><input type="file" name="<?php echo $filename ;?>" id="file" onchange="this.parentNode.nextSibling.value = this.value.replace('C:\\fakepath\\', '');tampilkanPreview(this,'<?php echo $previewfile;?>')">Browse</div><input type="text" value= "<?php echo $fileupload;?>" readonly>
            <br>
            <img class="col-md-6" id=<?php echo $previewfile;?> src=<?php echo $fileuploadview;?> alt=""/>
          </label>
        </section>
    </fieldset>
<?php }; ?>


<script>
      function tampilkanPreview(gambar,idpreview){
          var gb = gambar.files;
          for (var i = 0; i < gb.length; i++){
              var gbPreview = gb[i];
              var imageType = /image.*/;
              var preview=document.getElementById(idpreview);            
              var reader = new FileReader();
              
              if (gbPreview.type.match(imageType)) {
                  preview.file = gbPreview;
                  reader.onload = (function(element) { 
                      return function(e) { 
                          element.src = e.target.result; 
                      }; 
                  })(preview);
                  reader.readAsDataURL(gbPreview);
              }else{
                  alert("Image Only");
              }
             
          }    
      }
  </script>