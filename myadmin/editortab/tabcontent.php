<div class="tab-pane fade in active" id="contenteditor">
  <div class="form-group">
    <br>
    <div class="col-sm-1">
      <label for="inputtitle_en" class="control-label">Title:</label>
    </div>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="judul_en" id="inputtitle_en" value="<?php echo $title_en;?>">
    </div>
  </div>

<?php
  if ($_GET['link'] == 'content') {
?>
  <div class="form-group">
    <div class="col-sm-12">
      <textarea id="editor1" name="isi_con_en" rows="0" cols="80">
        <?php echo $fulltext_en ?>
      </textarea>
    </div>
  </div>

<?php
  }
?>
</div>