<?php
session_start();
	$leveluser = $_SESSION['level'];
	$_SESSION['user_id'] = $_SESSION['id'];
	$_SESSION['name_of_user'] = $_SESSION['name'];
	if (isset($_GET['mid'])) {
		$mid = $_GET['mid'];
	}
	if (isset($_GET['smid'])) {
		$smid = $_GET['smid'];
	}
	
	$menu_id = "&mid=$mid&smid=$smid";
	$urlstring = "http://";

$getsiteconfig = $db_conn->query("SELECT * FROM dbmsiteconfig where site_default ='1'");
  while($siteconfig=$getsiteconfig->fetch_array()):
    $path_file = $siteconfig['file_path'];
	$favicon = $path_file . $siteconfig['favico_path'];
	endwhile;
?>