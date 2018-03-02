<div class="tab-pane fade in active" id="englishcollection">
  <div class="form-group">
    <br>
    <div class="col-sm-1">
      <label for="inputtitle_en" class="control-label">Title (en):</label>
    </div>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="judul_en" id="inputtitle_en" value="<?php echo $title_en;?>">
    </div>
  </div>

<?php
  if ($_GET['link'] == 'topic') {
?>
  <div class="form-group">
    <div class="col-sm-12">
      <textarea id="editor1" name="isi_op_en" rows="0" cols="80">
        <?php echo $fulltext_en ?>
      </textarea>
    </div>
  </div>

<?php
  }
  else if ($_GET['link'] == 'collection') { 
?>
  

  <div class="form-group">
    <div class="col-sm-12">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#col_en" data-toggle="tab">Collection</a></li>
        <li><a href="#comp_fin_en" data-toggle="tab">Compendium (Finding)</a></li>
        <li><a href="#comp_pol_en" data-toggle="tab">Compendium (Policy)</a></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade in active" id="col_en">
          <textarea id="editor1" name="isi_col_en" rows="0" cols="80">
            <?php echo $fulltext_en; ?>
          </textarea>
        </div>
        <div class="tab-pane fade in" id="comp_fin_en">
          <textarea id="editor1" name="isi_fin_en" rows="0" cols="80">
            <?php echo $finding_en; ?>
          </textarea>
        </div>
        <div class="tab-pane fade in" id="comp_pol_en">
          <textarea id="editor1" name="isi_pol_en" rows="0" cols="80">
            <?php echo $policy_en; ?>
          </textarea>
        </div>
      </div>

    </div>
  </div>

<?php
  } else if ($_GET['link'] == 'rpjmn') {
?>

  <div class="form-group">
    <div class="col-sm-12">

      <textarea id="editor1" name="isi_sp_en" rows="0" cols="80">
        <?php echo $fulltext_en ?>
      </textarea>

    </div>
  </div>
 

<?php
  } else if ($_GET['link'] == 'content') {
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