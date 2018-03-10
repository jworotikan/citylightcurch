<div id="newuser" class="<?php echo $_GET['type'] == 'edit'?"profile-edit tab-pane fade in active":"profile-edit tab-pane fade";?>">
  <form class="form-horizontal sky-form" role="form" method="post" action="" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
    <dl class="dl-horizontal">
      <dt>Name</dt>
      <dd>
        <section>
          <label class="input">
            <i class="icon-append fa fa-user"></i>
            <input type="text" placeholder="Your Name" name="newname" value="<?php echo $user_real_name;?>">
            <b class="tooltip tooltip-bottom-right">Insert Name</b>
          </label>
        </section>
      </dd>
      <dt>Username</dt>
      <dd>
        <section>
          <label class="input">
            <i class="icon-append fa fa-user"></i>
            <input type="text" placeholder="Username" name="newusername" value="<?php echo $user_name;?>">
            <b class="tooltip tooltip-bottom-right">Insert Username</b>
          </label>
        </section>
      </dd>
      <dt>Password</dt>
      <dd>
        <section>
          <label class="input">
            <i class="icon-append fa fa-lock"></i>
            <input type="password" id="pass1" name="newpassword" placeholder="Password" value="<?php echo $user_password;?>">
            <b class="tooltip tooltip-bottom-right">Insert Password</b>
          </label>
        </section>
      </dd>
      <dt>Confirm Password</dt>
      <dd>
        <section>
          <label class="input">
            <i class="icon-append fa fa-lock"></i>
            <input type="password" id="pass2" name="confirm_password" placeholder="Password" value="<?php echo $user_password;?>" onchange="return cekpass()">
            <b class="tooltip tooltip-bottom-right">Retype Password</b>
          </label>
        </section>
      </dd>
      <dt>Email address</dt>
      <dd>
        <section>
          <label class="input">
            <i class="icon-append fa fa-envelope"></i>
            <input type="email" placeholder="Email address" name="newuseremail" value="<?php echo $user_email;?>">
            <b class="tooltip tooltip-bottom-right">Insert Email</b>
          </label>
        </section>
      </dd>
      <dt>Institution name</dt>
      <dd>
        <section>
          <label class="input">
            <i class="icon-append glyphicon glyphicon-tower"></i>
            <input type="text" placeholder="Institution name" name="newinstitution" value="<?php echo $user_institution;?>">
            <b class="tooltip tooltip-bottom-right">Insert Institution</b>
          </label>
        </section>
      </dd>
      <dt>Phone Number</dt>
      <dd>
        <section>
          <label class="input">
            <i class="icon-append fa fa-phone"></i>
            <input type="tel" id="password" name="newuserphone" placeholder="Phone Number" value="<?php echo $User_phone;?>">
            <b class="tooltip tooltip-bottom-right">Insert Phone</b>
          </label>
        </section>
      </dd>
      <dt>Level</dt>
      <dd>
        <section class="input">
            <select class="form-control" name="user_level" id="user_level" onchange="changeValue(this.value)">
             <option value="1" <?= $user_level == '1' ? 'selected="selected"':''?>>Administrator</option>
             <option value="2" <?= $user_level == '2' ? 'selected="selected"':''?>>Content Editor</option>
            </select>
        </section>
      </dd>
      <dt>Status</dt>
      <dd>
        <section class="input">
            <select class="form-control" name="user_active" id="user_active" onchange="changeValue(this.value)">
             <option value="1" <?= $user_status == '1' ? 'selected="selected"':''?>>Active</option>
             <option value="0" <?= $user_status == '0' ? 'selected="selected"':''?>>InActive</option>
            </select>
        </section>
      </dd>
    </dl>
   <a href="<?php echo $_SERVER['HTTP_REFERER']?>"><button type="button" class="btn-u btn-u-default">Cancel</button></a>
    <button class="btn-u" type="submit" name="<?php echo $buttonsimpan;?>">Save Changes</button>
  </form>
</div>