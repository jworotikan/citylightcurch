<?php
date_default_timezone_set('Asia/Jakarta');


$db_host = "rekapindb.ccvwyu098qee.ap-southeast-1.rds.amazonaws.com";
$db_user = "rekapin_dev";
$db_pass = "R3k4p1n_D3v!";
$db_name = "rekapin_dev";
 
$db_conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
 
if(mysqli_connect_errno()){
	
	//Ubah url blog
	$home = 'http://' . $_SERVER['HTTP_HOST'] . '/';
}


?>