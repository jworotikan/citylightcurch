<div class="tab-pane fade in" id="publishingtab">


<!-- Publish Topic -->
<?php
  if ($_GET['link'] == 'topic') {
?>
  <br>
  <div class="form-group">
    <div class="col-sm-1">
      <label for="inputauthor" class="control-label">Author :</label>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="author_name" id="inputauthor" value="<?php echo $authorname ?>">
    </div>

    <div class="col-sm-1">
      <label for="inputtitle" class="control-label">Publised :</label>
    </div>
    <div class="col-sm-4">
      <div class="input-group date">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control pull-right" id="datepicker" name="published_date">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-1">
      <label>Position / Order :</label>
    </div>
    <div class="col-sm-3">
      <select class="form-control" name="op_pos">
        <option value="1" <?= $op_pos == '1' ? 'selected="selected"':''?>>Landing Page</option>
        <option value="0" <?= $op_pos == '0' ? 'selected="selected"':''?>>Inside Other</option>
      </select>
    </div>
    <div class="col-sm-1">
    <input type="text" class="form-control" id="order_pos" name="order_pos" value="<?php echo $order_pos ?>">
    </div>
    <div class="col-sm-1">
      <label>Published</label>
    </div>
    <div class="col-sm-4">
      <select class="form-control" name="published_perm">
        <option value="1" <?= $published_perm == '1' ? 'selected="selected"':''?>>Published</option>
        <option value="0" <?= $published_perm == '0' ? 'selected="selected"':''?>>Unpublished</option>
      </select>
    </div>
  </div>

  <div class="form-group">
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Description (en):</label></div>
        <textarea id="editor1" name="desc_en" rows="3" cols="59"><?php echo $desc_en ?></textarea>
      </div>
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Description (id):</label></div>
        <textarea id="editor1" name="desc_id" rows="3" cols="59"><?php echo $desc_id ?></textarea>
      </div>
  </div>

  <div class="form-group">
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Meta Desc (en):</label></div>
        <textarea id="editor1" name="metadesc_en" rows="3" cols="59"><?php echo $mdesc_en ?></textarea>
          
      </div>
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Meta Desc (id):</label></div>
        <textarea id="editor1" name="metadesc_id" rows="3" cols="59"><?php echo $mdesc_id ?></textarea>
      </div>
  </div>

  <div class="form-group">
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Meta Key (en):</label></div>
        <textarea id="editor1" name="metakey_en" rows="3" cols="59" placeholder="Keyword should be separated by semicolon (;)"><?php echo $mkey_en ?></textarea>
      </div>
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Meta Key (id):</label></div>
        <textarea id="editor1" name="metakey_id" rows="3" cols="59" placeholder="Keyword should be separated by semicolon (;)"><?php echo $mkey_id ?></textarea>
      </div>
  </div>

  <!-- END OF Publish Topic -->

  <!-- Publish Collection -->
<?php
  }
  else if ($_GET['link'] == 'collection') { 
?>

  <br>
  <div class="form-group">
    <div class="col-sm-1">
      <label for="inputauthor" class="control-label">Author</label>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="author_name" id="inputauthor" value="<?php echo $authorname ?>">
    </div>

    <div class="col-sm-1">
      <label for="inputtitle" class="control-label">Publised</label>
    </div>
    <div class="col-sm-4">
      <div class="input-group date">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control pull-right" id="datepicker" name="published_date" value="<?php echo $pub_date;?>">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-1">
      <label class="control-label" for="topiclist">Topic</label>
    </div>
    <div class="col-sm-4">
      <select class="form-control select2" multiple="multiple" data-placeholder="Select Topic" style="width: 100%;" name="topiclist[]">
        <?php
          while($datatopic=$gettopic->fetch_array())  {
          echo ' <option value="'.$datatopic['id'].'" ';
          if($_GET['type'] == 'edit') {
            $getreltopic=$db_conn->query("SELECT * FROM dbrelatedtopic where col_id = '$_GET[id]'");
              while($datareltopic=$getreltopic->fetch_array())  {
                echo ''.(($datareltopic["topic_id"]== $datatopic['id'])?'selected="selected"':"").'';}
          }
                echo '>'.$datatopic['title_en'].'</option>'
          ;
          }
        ?>
      </select>
    </div>
    <div class="col-sm-1">
      <label class="control-label" for="catlist">Type</label>
    </div>
    <div class="col-sm-4">
      <select class="form-control select2" data-placeholder="Select Type" style="width: 100%;" name="typelist">
        <?php
          while($datatype=$gettype->fetch_array())  {
          echo ' <option value="'.$datatype['id'].'" ';
          if($_GET['type'] == 'edit') {
            
                echo ''.(($type_id == $datatype['id'])?'selected="selected"':"").'';
          }
                echo '>'.$datatype['title_en'].'</option>'
          ;
          }
        ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-1">
      <label class="control-label" for="topiclist">Plan</label>
    </div>
    <div class="col-sm-4">
      <select class="form-control select2" multiple="multiple" data-placeholder="Select Plan" style="width: 100%;" name="planlist[]">
        <?php
          while($dataplan=$getplan->fetch_array())  {
          echo ' <option value="'.$dataplan['id'].'" ';
          if($_GET['type'] == 'edit') {
            $getrelplan=$db_conn->query("SELECT * FROM dbrelatedplan where col_id = '$_GET[id]'");
              while($datarelplan=$getrelplan->fetch_array())  {
                echo ''.(($datarelplan["plan_id"]== $dataplan['id'])?'selected="selected"':"").'';}
          }
                echo '>'.$dataplan['title_en'].'</option>'
          ;
          }
        ?>
      </select>
    </div>
    <div class="col-sm-1">
      <label class="control-label" for="catlist">Related</label>
    </div>
    <div class="col-sm-4">
      <select class="form-control select2" multiple="multiple" data-placeholder="Select Related" style="width: 100%;" name="relatedcol[]">
        <?php
          while($datarelated=$getrelated->fetch_array())  {
          echo ' <option value="'.$datarelated['id'].'" ';
          if($_GET['type'] == 'edit') {
            $getrelcollection=$db_conn->query("SELECT * FROM dbrelatedcollection where col_id = '$_GET[id]'");
              while($datarelcollection=$getrelcollection->fetch_array())  {
                echo ''.(($datarelcollection["related_col"]== $datarelated['id'])?'selected="selected"':"").'';}
          }
                echo '>'.$datarelated['title_en'].'</option>'
          ;
          }
        ?>
      </select>
    </div>
  </div>
<hr>
  <div class="form-group">
    <div class="col-sm-1">
      <label class="control-label" for="topiclist">Download</label>
    </div>
    <div class="col-sm-4">
      <select class="form-control" name="dw_button">
        <option value="1" <?= $dw_button == '1' ? 'selected="selected"':''?>>Yes</option>
        <option value="0" <?= $dw_button == '0' ? 'selected="selected"':''?>>No</option>
      </select>
    </div>
    <div class="col-sm-1">
      <label class="control-label" for="topiclist">Share</label>
    </div>
    <div class="col-sm-4">
      <select class="form-control" name="shared_button">
        <option value="1" <?= $ps_button == '1' ? 'selected="selected"':''?>>Yes</option>
        <option value="0" <?= $ps_button == '0' ? 'selected="selected"':''?>>No</option>
      </select>
    </div>
  </div>

 <div class="form-group">
    <div class="col-sm-1">
      <label class="control-label" for="citation">Citation</label>
    </div>
    <div class="col-sm-4">
      <textarea id="editor1" name="citation" rows="3" cols="40" placeholder="Use <i></i> for italic format. Ex: <i>Your Text<i>"><?php echo $citation;?></textarea>

    </div>
    <div class="col-sm-1">
      <label class="control-label" for="topiclist">Published</label>
    </div>
    <div class="col-sm-4">
      <select class="form-control" name="published_perm">
        <option value="1" <?= $published_perm == '1' ? 'selected="selected"':''?>>Published</option>
        <option value="0" <?= $published_perm == '0' ? 'selected="selected"':''?>>Unpublished</option>
      </select>
    </div>
  </div>

  <div class="form-group">
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Meta Key (en):</label></div>
        <textarea id="editor1" name="mkey_en" rows="3" cols="40" placeholder="Keyword should be separated by semicolon (;)"><?php echo $mkey_en;?></textarea>
      </div>
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Meta Key (id):</label></div>
        <textarea id="editor1" name="mkey_id" rows="3" cols="40" placeholder="Keyword should be separated by semicolon (;)"><?php echo $mkey_id;?></textarea>
      </div>
  </div>

    <div class="form-group">
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Meta Desc (en):</label></div>
        <textarea id="editor1" name="metadesc_en" rows="3" cols="40"><?php echo $mdesc_en;?></textarea>
          
      </div>
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Meta Desc (id):</label></div>
        <textarea id="editor1" name="metadesc_id" rows="3" cols="40"><?php echo $mdesc_id;?></textarea>
      </div>
  </div>

  <!-- END OF Collection -->

  <!-- Publish RPJMN -->

<?php
  } else if ($_GET['link'] == 'rpjmn') {
?>
  
 <br>
  <div class="form-group">
    <div class="col-sm-1">
      <label for="inputauthor" class="control-label">Author :</label>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="author_name" id="inputauthor" value="<?php echo $author_name ?>">
    </div>

    <div class="col-sm-1">
      <label for="inputtitle" class="control-label">Publised :</label>
    </div>
    <div class="col-sm-4">
      <div class="input-group date">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control pull-right" id="datepicker" name="published_date">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-1">
      <label>Position</label>
    </div>
    <div class="col-sm-4">
      <select class="form-control" name="sp_pos">
        <option value="1" <?= $sp_pos == '1' ? 'selected="selected"':''?>>Landing Page</option>
        <option value="0" <?= $sp_pos == '0' ? 'selected="selected"':''?>>Inside Other</option>
      </select>
    </div>
    <div class="col-sm-1">
      <label>Published</label>
    </div>
    <div class="col-sm-4">
      <select class="form-control" name="published_perm">
        <option value="1" <?= $published_perm == '1' ? 'selected="selected"':''?>>Published</option>
        <option value="0" <?= $published_perm == '0' ? 'selected="selected"':''?>>Unpublished</option>
      </select>
    </div>
  </div>


  <div class="form-group">
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Meta Desc (en):</label></div>
        <textarea id="editor1" name="metadesc_en" rows="3" cols="59"><?php echo $mdesc_en;?></textarea>
          
      </div>
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Meta Desc (id):</label></div>
        <textarea id="editor1" name="metadesc_id" rows="3" cols="59"><?php echo $mdesc_id;?></textarea>
      </div>
  </div>

  <div class="form-group">
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Meta Key (en):</label></div>
        <textarea id="editor1" name="metakey_en" rows="3" cols="59"><?php echo $mkey_en;?></textarea>
      </div>
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Meta Key (id):</label></div>
        <textarea id="editor1" name="metakey_id" rows="3" cols="59"><?php echo $mkey_id;?></textarea>
      </div>
  </div>

  <!-- END OF Publish RPJMN -->

  <!-- Publish Content -->


<?php
  } else if ($_GET['link'] == 'content') {
    $getcategory = $db_conn->query("SELECT * FROM dbcattegory ORDER BY id ASC");
?>
  
  <br>
  <div class="form-group">
    <div class="col-sm-1">
      <label for="inputauthor" class="control-label">Author</label>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="author_name" id="inputauthor" value="<?php echo $authorname ?>">
    </div>

    <div class="col-sm-1">
      <label for="inputtitle" class="control-label">Publised</label>
    </div>
    <div class="col-sm-4">
      <div class="input-group date">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control pull-right" id="datepicker" name="published_date">
      </div>
    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-1">
      <label class="control-label" for="topiclist">Category</label>
    </div>
    <div class="col-sm-4">
      <select class="form-control select2" data-placeholder="Select Category" style="width: 100%;" name="catlist">
        <?php
          while($datacategory=$getcategory->fetch_array())  {
          echo ' <option value="'.$datacategory['id'].'">'.$datacategory['name'].'</option>';
          }
        ?>
      </select>
    </div>
    <div class="col-sm-1">
      <label for="inputtitle" class="control-label">Status</label>
    </div>
    <div class="col-sm-4">
      <select class="form-control" name="publised_perm">
          <option value="1">Published</option>
          <option value="0">Unpublished</option>
        </select>
    </div>
  </div>

  <div class="form-group">
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Meta Key (en):</label></div>
        <textarea id="editor1" name="metakey_en" rows="3" cols="59"></textarea>
      </div>
      <div class="col-sm-5">
        <div><label class="control-label" for="topiclist">Meta Key (id):</label></div>
        <textarea id="editor1" name="metakey_id" rows="3" cols="59"></textarea>
      </div>
  </div>

  <div class="form-group">
    <div class="col-sm-5">
      <div><label class="control-label" for="topiclist">Meta Desc (en):</label></div>
      <textarea id="editor1" name="metadesc_en" rows="3" cols="59"></textarea>
          
    </div>
    <div class="col-sm-5">
      <div><label class="control-label" for="topiclist">Meta Desc (id):</label></div>
      <textarea id="editor1" name="metadesc_id" rows="3" cols="59"></textarea>
    </div>
  </div>
 

<?php
  }
?>
</div>