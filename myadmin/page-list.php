<?php
	include'config/conndb_admin.php';
	include'config/getsession.php';
	include'config/config_admin.php';
	if ($_GET['link'] == 'content') {
    $titlelist = 'Content List';
    $gettopic=$db_conn->query("SELECT * FROM dbcontent ORDER BY id ASC");
  }
?>

<!DOCTYPE html>
<html>
<head>

  <?php
    include'headlink.php';
  ?>
  
<!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">City Light Curch</span>
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
    	<div class="box">
    		<div class="box-header">
              <h3 class="box-title"><?php echo $titlelist ;?></h3>
            </div>
            <div class="box-body">



<!-- Page List Content-->
      <?php if ($_GET['link'] == 'content') { ?>
      <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th></th>
            <th>Title</th>
            <th>Detail</th>
            <th>Status</th>
            <th>Edited</th>
          </tr>
          </thead>
          <tbody>
          <?php
                $counter = 1;
                while($datatopic=$gettopic->fetch_array())  {                        
              ?>
          <tr>
            <td><?php echo $counter; ?></td>
            <td><?php echo $datatopic['title_en'];?></td>
            <td align="center"><?php if (is_null($datatopic['fulltext_en']))
              echo '<span class="label label-danger">English</span>';
            else
              echo '<span class="label label-success">English</span>';?>
            </td>
            <td align="center"><?php if ($datatopic['published'] == 0)
              echo '<span class="label label-danger">InActive</span>';
            else
              echo '<span class="label label-success">Active</span>';?></td>
            <td><a class="btn btn-block btn-primary btn-xs" href="editor.php?type=edit&link=content<?php echo $menu_id;?>&id=<?php echo $datatopic['id'];?>">Edit</a></td>
                
          </tr>
          <?php $counter++; ?>
          <?php }?>
          </tbody>
        </table>
            <?php } ?>
<!-- END OF Page LIst Content-->
            </div>
    </section>
</div>




<?php
  include'footer.php';

  include'footlink.php';
?>
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>