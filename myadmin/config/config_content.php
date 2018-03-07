<?php
	if($_GET['type'] == 'edit') {
		$getcontent=$db_conn->query("SELECT * FROM dbcontent where id = '$_GET[id]'");
		while($datacontetn=$getcontent->fetch_array())  {
			$title_en = $datacontetn["title_en"];
			$fulltext_en = $datacontetn["fulltext_en"];
			$collection_id = $datacontetn["id"];
		}
			$buttonsimpan = "editcontent";

	} else {
			$title_en = "";
			$fulltext_en = "";
			$collection_id = "";
			$buttonsimpan = "simpancontent";
		}

	if(isset($_POST['simpancontent'])){  
		$title_en = addslashes($_POST['judul_en']) ;
		$isi_con_en = addslashes($_POST['isi_con_en']);
		$user_id_created = $_SESSION['user_id'];
		$name_of_user = $_SESSION['name_of_user'];

			$inputarticle = mysqli_query($db_conn, "INSERT INTO dbcontent (title_en, fulltext_en, created_id) VALUES  ('$title_en', '$isi_con_en', '$user_id_created')");

			$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Create new Content' )");

			if ($inputarticle && $loginfo) {
		echo "<script>alert('Data successfully saved!')</script>";			
		/*echo "<script>window.open('page-list.php?type=new&lang=1&link=content&mid=22&smid=23','_self')</script>";*/
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}
	}

	if(isset($_POST['editcontent'])){  
		$title_en = addslashes($_POST['judul_en']) ;
		$isi_con_en = addslashes($_POST['isi_con_en']);
		$user_id_created = $_SESSION['user_id'];
		$name_of_user = $_SESSION['name_of_user'];


			$editarticle = mysqli_query($db_conn, "UPDATE dbcontent set title_en = '$title_en', fulltext_en = '$isi_con_en', edit_id = '$user_id_created', edit_date = '$insertdate' where id = '$_GET[id]'");
			$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Edited Content' )");
			if ($editarticle && $loginfo) {
		echo "<script>alert('Data successfully saved!')</script>";			
		echo "<script>window.open('page-list.php?type=new&lang=1&link=content&mid=22&smid=23','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}
		}

	// Start - EDIT Collection
	if(isset($_POST['btndelete'])){
		$collection_id = $_GET['id'];
		$user_id_created = $_SESSION['user_id'];
		$name_of_user = $_SESSION['name_of_user'];
		$query = "DELETE from dbcontent where id = '$collection_id'";

	$deletecollection = mysqli_query($db_conn, $query) or die(mysqli_error());

	//insert log info
	$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Delete Content' )");

	if ($deletecollection && $loginfo) {
		echo "<script>alert('Data successfully DELETE!')</script>";			
		echo "<script>window.open('page-list.php?type=new&lang=1&link=content&mid=22&smid=23','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}
	}
?>