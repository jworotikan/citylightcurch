<div class="tab-pane fade in" id="uploadtab">


  <!-- UPLOAD TOPIC -->

<?php
  require 'editortab/kolom.php';
  if ($_GET['link'] == 'topic') {
?>

<div class="tab-pane fade in" id="uploadfile">
  <div class="col-sm-12">
    
    <div class="col-md-6">
      <?php pictupload('Thumbnail Upload','tmb_upload', $tmb_pict, 'preview_thumb', $tmb_pict_view ) ?>
    </div>

    
    <div class="col-md-6">
      <?php pictupload('Background input','bg_upload', $background_pict, 'preview_pict', $background_pict_view ) ?>
    </div>
  </div>
</div>


  <!-- UPLOAD Collection -->

<?php
  }
  elseif ($_GET['link'] == 'collection') { 
?>
  <div class="form-group">

      <div class="col-md-6">
        <?php pictupload('Image File Upload','img_bg_upload', $img_bg_path, 'img_bg_upload', $img_bg_path_view ) ?>
      </div>
      <div class="col-md-6">
        <fieldset>
          <section>
            <label class="label">PDF File</label>
            <label for="file" class="input input-file">
              <div class="button"><input type="file" name="fupload" id="file" onchange="this.parentNode.nextSibling.value = this.value.replace('C:\\fakepath\\', '');">Browse</div><input type="text" readonly>
              <?php if (!empty($file_pdf)) {
                echo '<a href="'.$path_pdf.'" target="_blank">'.$file_pdf.'</a>';
                
              }  ?>
            </label>
          </section>
        </fieldset>
      </div>
  </div>

  <div class="form-group">
    <div class="col-md-12">
      <fieldset>
        <section>
          <label class="label">Embed Code Upload</label>
          <textarea id="editor1" name="embedcode" rows="3" cols="59"><?php echo $path_embed;?></textarea>
          <div><?php echo $path_embed; ?></div>
        </section>
      </fieldset>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-6">
      <?php pictupload('Thumbnail Landscape Upload (en)','tmb_lc_en_upload', $thumb_lc_en, 'preview_tmb_lc_en', $thumb_lc_en_view ) ?>
    </div>
    <div class="col-md-6">
      <?php pictupload('Thumbnail Landscape Upload (id)','tmb_lc_id_upload', $thumb_lc_id, 'preview_tmb_lc_id', $thumb_lc_id_view ) ?>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-6">
      <?php pictupload('Thumbnail Portrait input (en)','tmb_pt_en_upload', $thumb_pt_en, 'preview_tmb_pt_en', $thumb_pt_en_view ) ?>
    </div>
    <div class="col-md-6">
      <?php pictupload('Thumbnail Portrait input (id)','tmb_pt_id_upload', $thumb_pt_id, 'preview_tmb_pt_id', $thumb_pt_id_view) ?>
    </div>
  </div>
 

  <!-- UPLOAD RPJMN -->

<?php
  } else if ($_GET['link'] == 'rpjmn') {
?>
  
  <div class="tab-pane fade in" id="uploadfile">
    <div class="col-sm-12">
      <div class="col-md-6 col-sm-9">
        <?php pictupload('Thumbnail input','tmb_upload', $thumb_img, 'preview_tmb', $thumb_img ); ?>
      </div>
    </div>
  </div>

<?php
  } else if ($_GET['link'] == 'content') {
?>

  <div class="tab-pane fade in" id="uploadfile">
    <div class="form-group">
      <div class="col-md-6">
        <?php pictupload('Picture input','img_upload', '', 'preview_pict' ) ?>
      </div>

      <div class="col-md-6">
        <fieldset>

          <section>
            <label class="label">File input (.PDF)</label>
            <label for="file" class="input input-file">
              <div class="button"><input type="file" name="fupload" id="file" onchange="this.parentNode.nextSibling.value = this.value.replace('C:\\fakepath\\', '');">Browse</div><input type="text" readonly>
            </label>
          </section>


        </fieldset>
      </div>
    </div>
  </div>

<?php
  }
?>

</div>