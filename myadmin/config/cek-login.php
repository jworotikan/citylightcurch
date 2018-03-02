<?php
session_start();
include "conndb_admin.php";

if(isset($_POST['username']) && ($_POST['password'])){
	 $admin_name = $db_conn->real_escape_string($_POST['username']);
	 $admin_password = $db_conn->real_escape_string(md5($_POST['password']));
	 $sql = "select * from dbmusers where username = '$admin_name' AND userpassword = '$admin_password'";
	 $result = $db_conn->query($sql) or die('Terjadi Kesalahan : '.$db_conn->error);
	
	if ($result->num_rows == 1){
		  $row = $result->fetch_assoc();

		  $_SESSION['username'] = $row['username'];
		  $_SESSION['name'] = $row['name'];
		  $_SESSION['id'] = $row['id'];
		  $_SESSION['status'] = $row['status'];
		  $_SESSION['level'] = $row['level_user'];
		  header("location:../index.php");
		  $_SESSION['pesan'] = '<p><div class="alert alert-primary">Selamat datang <b>'.$_SESSION['name'].'</b></div></p>';
		  mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) VALUES ('$_SESSION[id]', '$_SESSION[name]', 'Login')") or die(mysqli_error());
  
	}else{
		  echo "<script>alert('Maaf, usrename atau password salah..');location.href='login.php'</script>";
	}
}else{
	 echo "<script>alert('Maaf, usrename atau password salah..');location.href='login.php'</script>";
}
?>
