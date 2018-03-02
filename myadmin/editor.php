<?php
	include'config/conndb_admin.php';
	include'config/getsession.php';

	if ($_GET['link'] == 'topic') {
		require'config/config-topic.php';
	} elseif ($_GET['link'] == 'collection') {
    require'config/config_admin.php';
		require'config/config-collection.php';
	}elseif ($_GET['link'] == 'rpjmn') {
		require'config/config-startegicplan.php';
	}elseif ($_GET['link'] == 'content') {
    require'config/config_content.php';
  }
	
?>

<!DOCTYPE html>
<html>
<head>
  <?php
    include'headlink.php';
  ?>
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/sky-forms-pro/skyforms/css/sky-forms.css">
  <link rel="stylesheet" href="plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="css/blue.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css"> 
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">REKAPIN</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
<?php
  include'leftsidebar.php';
?>
<div class="content-wrapper">
	<section class="content">
      <form class="form-horizontal sky-form" role="form" method="post" action="" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
        <div class="row">
            <div class="col-md-2">
              <button type="submit" class="btn btn-block btn-success btn-sm rounded" name="<?php echo $buttonsimpan ?>"><i class="fa fa-edit"></i>&nbsp; Save</button>
            </div>
            <div class="col-md-2">
            <a href=<?php echo $_SERVER['HTTP_REFERER']?>>
              <button type="button" class="btn btn-block btn-danger btn-sm rounded"><i class="glyphicon glyphicon-remove"></i>&nbsp; Cancel</button>
            </a>
            </div>
            <?php if ($leveluser == '1') { ?>
              <div class="col-md-2">
                <button type="submit" class="btn btn-block btn-danger btn-sm rounded" name='btndelete'><i class="glyphicon glyphicon-trash"></i>&nbsp; Delete</button>
              </div>
            <?php }; ?>
        </div>
        <br>
        <div class="tab-v2">
          <ul class="nav nav-tabs">

            <li class="active"><a href="#contenteditor" data-toggle="tab">Content</a></li>

            <!--
            <li class="active"><a href="#englishcollection" data-toggle="tab">English</a></li>
            <li><a href="#indocollection" data-toggle="tab">Indonesia</a></li>
            <li><a href="#publishingtab" data-toggle="tab">Publishing Option</a></li>
            <?php if ($_GET['link'] != 'content') { ?>
            <li><a href="#uploadtab" data-toggle="tab">File Upload</a></li>
            <?php }; ?>
          -->
          </ul>
          <div class="tab-content">

            <?php
              include'editortab/tabcontent.php';
            ?>


          </div>

        </div>

      </form>
    </section>
</div>
  <!-- /.content-wrapper -->
<?php
  include'footer.php';
?>


</div>

<?php
  include'footlink.php';
?>
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<script src="js/app.min.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Page script -->
<script type="text/javascript">
function validasi_input(form){
  if (form.judul_en.value == ""){
    alert("English Title Cannot Empty!!");
    form.judul_en.focus();
    return (false);
  } else if (form.judul_id.value == ""){
    alert("Indonesia Title Cannot Empty!!");
    form.judul_id.focus();
    return (false);
  }
return (true);
}
</script>

<script src="plugins/ckeditor/ckeditor.js"></script>

<?php if ($_GET['link'] == 'topic') { ?>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
    //Initialize Select2 Elements
    $(".select2").select2();
    CKEDITOR.replace('isi_op_en');
    CKEDITOR.replace('isi_op_id');
  });
</script>
<?php } elseif ($_GET['link'] == 'collection') { ?>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
    //Initialize Select2 Elements
    $(".select2").select2();
    CKEDITOR.replace('isi_col_en');
    CKEDITOR.replace('isi_fin_en');
    CKEDITOR.replace('isi_pol_en');
    CKEDITOR.replace('metadesc_en');
    CKEDITOR.replace('isi_col_id');
    CKEDITOR.replace('isi_fin_id');
    CKEDITOR.replace('isi_pol_id');
    CKEDITOR.replace('metadesc_id');
  });
</script>
<?php } elseif ($_GET['link'] == 'rpjmn') { ?>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
    //Initialize Select2 Elements
    $(".select2").select2();
    CKEDITOR.replace('isi_sp_en');
    CKEDITOR.replace('isi_sp_id');
  });
</script>
<?php } elseif ($_GET['link'] == 'content') { ?>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
    //Initialize Select2 Elements
    $(".select2").select2();
    CKEDITOR.replace('isi_con_en');
    CKEDITOR.replace('metadesc_en');
    CKEDITOR.replace('isi_con_id');
    CKEDITOR.replace('metadesc_id');
  });
</script>
<?php }; ?>


<script>
  CKEDITOR.config.extraPlugins = 'filebrowser';
</script>

</body>
</html>