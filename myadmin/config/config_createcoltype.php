<?php
if($_GET['type'] == 'edit') {
		$getcollection=$db_conn->query("SELECT * FROM dbcatcollection where id = '$_GET[id]'");
		while($datacollection=$getcollection->fetch_array())  {
			$title_en = $datacollection["title_en"];
			$desc_en = $datacollection["desc_en"];
			$title_id = $datacollection["title_id"];
			$desc_id = $datacollection["desc_id"];
			$published = $datacollection["published"];
		}
			$simpancoltype = "simpaneditcoltype";

	} else {
			$title_en = "";
			$desc_en = "";
			$desc_id = "";
			$title_id = "";
			$published = "";
			$simpancoltype = "simpannewcoltype";
		}
	// SAVE NEW COLLECTION TYPE
if(isset($_POST['simpannewcoltype'])){

	$newtitle_en = addslashes($_POST['title_en']) ;
	$newdesc_en = addslashes($_POST['desc_en']) ;
	$newtitle_id = addslashes($_POST['title_id']);
	$newdesc_id = addslashes($_POST['desc_id']) ;
	$newpublished = $_POST['published_perm'] ;
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];
	
		$inputcoltype = mysqli_query($db_conn, "INSERT INTO dbcatcollection (title_en, desc_en, title_id, desc_id, published, created_user) values ('$newtitle_en', '$newdesc_en', '$newtitle_id', '$newdesc_id', '$newpublished', '$user_id_created')");

		if ($inputcoltype) {
		echo "<script>alert('Data successfully saved!')</script>";			
		echo "<script>window.open('collectiontype.php?lang=1&type=new&mid=<? php echo $mid?>&smid=<? php echo $smid;?>','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}


		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Create New Collection Type' )") or die(mysqli_error());
}
// END - SAVE NEW COLLECTION TYPE

// SAVE EDIT COLLECTION TYPE

if(isset($_POST['simpaneditcoltype'])){

	$newtitle_en = addslashes($_POST['title_en']) ;
	$newdesc_en = addslashes($_POST['desc_en']) ;
	$newtitle_id = addslashes($_POST['title_id']);
	$newdesc_id = addslashes($_POST['desc_id']) ;
	$newpublished = $_POST['published_perm'] ;
	$coltypeid = $_GET['id'];
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];
	
		$updatecoltype = mysqli_query($db_conn, "UPDATE dbcatcollection set title_en ='$newtitle_en', title_id='$newtitle_id', desc_en = '$newdesc_en', desc_id = '$newdesc_id', published = '$newpublished' where id = $coltypeid");

		if ($updatecoltype) {
		echo "<script>alert('Data successfully saved!')</script>";			
		echo "<script>window.open('collectiontype.php?lang=1&type=new&mid=<? php echo $mid?>&smid=<? php echo $smid;?>','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}

		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Edit Collection type' )") or die(mysqli_error());
}
// END - SAVE EDIT COLLECTION TYPE

// DELETE COLLECTION TYPE

if(isset($_POST['deletecoltype'])){

	$coltypeid = $_GET['id'];
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];
	
		$updatecoltype = mysqli_query($db_conn, "DELETE FROM dbcatcollection where id = $coltypeid");

		if ($updatecoltype) {
		echo "<script>alert('Data successfully DELETE!')</script>";			
		echo "<script>window.open('collectiontype.php?lang=1&type=new&mid=<? php echo $mid?>&smid=<? php echo $smid;?>','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}

		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Delete Collection type' )") or die(mysqli_error());
}
// END - DELETE COLLECTION TYPE

?>