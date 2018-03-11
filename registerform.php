<div class="container">
  <div class="content-wrapper">
    <div class="col-md-6">
      <section class="content">
        <form class="form-horizontal sky-form" role="form" method="post" action="" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
          <div class="form-group">
            <div class="col-md-4">
              <label for="inputfullname" class="control-label">Nama Lengkap :</label>
            </div>
            <div class="col-md-8">
              <input type="text" class="form-control" name="fullname" id="inputfullname" value="">
            </div>
            <div class="col-md-4">
              <label for="bornplace" class="control-label">Tempat, Tanggal Lahir :</label>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" name="fullname" id="bornplace" value="">
            </div>
            <div class="col-md-4">
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" name="borndate">
              </div>
            </div>
            <div class="control-group after-add-more">
              <div class="col-md-4">
                <label for="inputfullname" class="control-label">Nama Anak :</label>
              </div>
              <div class="col-md-4">
                  <input type="text" name="childname[]" class="form-control" placeholder="Nama Anak">
              </div>
              <div class="col-sm-2">
                  <input type="text" name="childage[]" class="form-control" placeholder="Usia">
              </div>
              <div class="input-group-btn">
                <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i></button>
              </div>
            </div>
            <hr>
            <div class="col-md-4">
              <label for="inputfullname" class="control-label">Alamat :</label>
            </div>
            <div class="col-md-8">
              <textarea id="editor1" name="mkey_en" rows="3" cols="40" placeholder="Alamat"></textarea>
            </div>
            <div class="col-md-4">
              <label for="inputfullname" class="control-label">No. Hp 1 :</label>
            </div>
            <div class="col-md-8">
              <input type="text" class="form-control" name="fullname" id="inputfullname" value="">
            </div>
            <div class="col-md-4">
              <label for="inputfullname" class="control-label">No. Hp 2 :</label>
            </div>
            <div class="col-md-8">
              <input type="text" class="form-control" name="fullname" id="inputfullname" value="">
            </div>
            <div class="col-md-4">
              <label for="inputfullname" class="control-label">Email :</label>
            </div>
            <div class="col-md-8">
              <input type="text" class="form-control" name="fullname" id="inputfullname" value="">
            </div>
            <div class="col-sm-12">
              <label for="inputfullname" class="control-label">Bagaimana Anda Mengenal CLC?</label>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
</div>