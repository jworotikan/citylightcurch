<?php
include('config/conndb_admin.php');
include 'config/getsession.php';
$userlogin=$db_conn->query("SELECT * FROM dbuserloginfo where description = 'Login' ORDER BY id DESC limit 5");
$userloginfo=$db_conn->query("SELECT * FROM dbuserloginfo where description != 'Login' ORDER BY id DESC limit 5");
?>

<!DOCTYPE html>
<html>
<head>
  <?php
    include'headlink.php';
  ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php echo $_SESSION['pesan']?>
    <section class="content">
    <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">LAST LOGGED-IN USERS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Name</th>
                  <th>Login Time</th>
                </tr>
                <?php
                  while($datalogin=$userlogin->fetch_array())  {
                ?>
                <tr>
                  <td><?php echo $datalogin['name']?></td>
                  <td><?php echo $datalogin['timelog']?></td>
                </tr>
                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">LOG ACTIVITY</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Time</th>
                </tr>
                <?php
                  while($datalogininfo=$userloginfo->fetch_array())  {
                ?>
                <tr>
                  <td><?php echo $datalogininfo['name']?></td>
                  <td><?php echo $datalogininfo['description']?></td>
                  <td><?php echo $datalogininfo['timelog']?></td>
                </tr>
                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
  </div>
  <!-- /.content-wrapper -->
<?php
  include'footer.php';
?>

</div>
<!-- ./wrapper -->
<?php
  include'footlink.php';
?>

</body>
</html>
