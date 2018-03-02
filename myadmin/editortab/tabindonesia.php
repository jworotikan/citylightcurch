<div class="tab-pane fade in" id="indocollection">
  <div class="form-group">
    <br>
    <div class="col-sm-1">
      <label for="inputtitle_id" class="control-label">Title (id):</label>
    </div>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="judul_id" id="inputtitle_id" value="<?php echo $title_id;?>">
    </div>
  </div>

<?php
  if ($_GET['link'] == 'topic') {
?>
  <div class="col-sm-12">
    <textarea id="editor1" name="isi_op_id" rows="0" cols="80">
      <?php echo $fulltext_id ?>
    </textarea>
  </div>

<?php
  }
  else if ($_GET['link'] == 'collection') { 
?>
  <div class="form-group">
    <div class="col-sm-12">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#col_id" data-toggle="tab">Koleksi</a></li>
        <li><a href="#comp_fin_id" data-toggle="tab">Ringkasan Studi (Temuan)</a></li>
        <li><a href="#comp_pol_id" data-toggle="tab">Ringkasan Studi (Opsi Kebijakan)</a></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade in active" id="col_id">
          <textarea id="editor1" name="isi_col_id" rows="0" cols="80">
            <?php echo $fulltext_id ?>
          </textarea>
        </div>
        <div class="tab-pane fade in" id="comp_fin_id">
          <textarea id="editor1" name="isi_fin_id" rows="10" cols="80">
            <?php echo $finding_id ?>
          </textarea>
        </div>

        <div class="tab-pane fade in" id="comp_pol_id">
          <textarea id="editor1" name="isi_pol_id" rows="10" cols="80">
            <?php echo $policy_id ?>
          </textarea>
        </div>
      </div>
    </div>
  </div>


<?php
  } else if ($_GET['link'] == 'rpjmn') {
?>
  <div class="col-sm-12">
    <textarea id="editor1" name="isi_sp_id" rows="0" cols="80">
      <?php echo $fulltext_id ?>
    </textarea>
  </div>
 

<?php
  } else if ($_GET['link'] == 'content') {
?>
  <div class="form-group">
    <div class="col-sm-12">
      <textarea id="editor1" name="isi_con_id" rows="0" cols="80">
        <?php echo $fulltext_id ?>
      </textarea>
    </div>
  </div>
 

<?php
  }
?>
</div>