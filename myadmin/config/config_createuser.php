<?php
if($_GET['type'] == 'edit') {
		$getdatauser=$db_conn->query("SELECT * FROM dbmusers where id = '$_GET[id]'");
		while($datausers=$getdatauser->fetch_array())  {
			$user_name = $datausers["username"];
			$user_real_name = $datausers["name"];
			$user_password = $datausers["userpassword"];
			$user_email = $datausers["email"];
			$user_institution = $datausers["institution"];
			$User_phone = $datausers["phone"];
			$user_level = $datausers["level_user"];
			$user_status = $datausers["status"];
		}
			$buttonsimpan = "saveedit";
} else {
		$user_name = "";
		$user_real_name = "";
		$user_password = "";
		$user_email = "";
		$user_institution = "";
		$User_phone = "";
		$user_level = "";
		$user_status = "";
		$buttonsimpan = "savenew";
}

	// SAVE NEW USER
if(isset($_POST['savenew'])){

	$newname = addslashes($_POST['newname']) ;
	$newusername = addslashes($_POST['newusername']);
	$newpassword = addslashes($_POST['newpassword']);
	$newemail = addslashes($_POST['newuseremail']);
	$newinstitution = addslashes($_POST['newinstitution']);
	$newphone = addslashes($_POST['newuserphone']);
	$newstatus = addslashes($_POST['user_active']);
	$newlevel = addslashes($_POST['user_level']);
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];

		$inputnewuser = mysqli_query($db_conn, "INSERT INTO dbmusers (name, username, email, userpassword, phone, institution, status, created_user, level_user) VALUES ('$newname', '$newusername', '$newemail', md5('$newpassword'), '$newphone', '$newinstitution', '$newstatus', '$user_id_created', '$newlevel')");
		if ($inputnewuser) {
		echo "<script>alert('Data successfully saved!')</script>";			
		echo "<script>window.open('page_user.php?type=new&link=create-user&mid=$mid&smid=$smid','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}
		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Create new user' )") or die(mysqli_error());

}
// END - SAVE NEW USER

// Edit USER
if(isset($_POST['saveedit'])){

	$newname = addslashes($_POST['newname']) ;
	$newusername = addslashes($_POST['newusername']);
	$newpassword = addslashes($_POST['newpassword']);
	$newemail = addslashes($_POST['newuseremail']);
	$newinstitution = addslashes($_POST['newinstitution']);
	$newphone = addslashes($_POST['newuserphone']);
	$newstatus = addslashes($_POST['user_active']);
	$newlevel = addslashes($_POST['user_level']);
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];
	$edit_user_id = $_GET['id'];
	
		$inputnewuser = mysqli_query($db_conn, "UPDATE dbmusers SET name = '$newname', username = '$newusername', email = '$newemail', userpassword = md5('$newpassword'), phone = '$newphone', institution = '$newinstitution', status = '$newstatus', created_user = '$user_id_created', level_user = '$newlevel' where id = $edit_user_id ");
		if ($inputnewuser) {
		echo "<script>alert('Data successfully saved!')</script>";			
		echo "<script>window.open('page_user.php?type=new&link=create-user&mid=$mid&smid=$smid','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}

		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Create new user' )") or die(mysqli_error());
}
// END - SAVE NEW USER

?>