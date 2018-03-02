<?php
	if(isset($_POST['simpannewuser'])){
	}

	if(isset($_POST['simpanedituser'])){

		$newname = addslashes($_POST['newname']);
		$newusername = addslashes($_POST['username']);
		$newemail = addslashes($_POST['useremail']);
		$newphone = addslashes($_POST['userphone']);
		$newinstitution = addslashes($_POST['institution']);

			$inputedituser = mysqli_query($db_conn, "UPDATE dbmusers set name = '$newname', username = '$newusername', email = '$newemail', userpassword = md5('$newpassword'), phone = '$newphone', institution = '$newinstitution' where id='$user_id'") or die(mysqli_error());

		header('location:edit_user_profile.php?type=edit&lang=1&link=edit-profile'.$menu_id.'');
	}

	if(isset($_POST['simpaneditpassword'])){

		$newpassword = addslashes($_POST['newpassword']);

			$inputedituser = mysqli_query($db_conn, "UPDATE dbmusers set userpassword = md5('$newpassword') where id='$user_id'") or die(mysqli_error());

		header('location:edit_user_profile.php?type=edit&lang=1&link=edit-profile'.$menu_id.'');
	}
?>