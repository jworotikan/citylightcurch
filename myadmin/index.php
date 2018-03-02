<?php
session_start();
include "config/conndb_admin.php";  
$level=$_SESSION['status'];
$userid=$_SESSION['id'];
$name=$_SESSION['name'];
if($level=='1'){
			isset ($_GET['m']) ? $m = $_GET['m'] : $m = 'home';
			header("Location: home.php?lang=1&link=home&mid=1&smid=0");

  		}else{
			header("location:config/login.php");
		}
?>