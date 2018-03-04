<?php
	if($_GET['type'] == 'edit') {
		$getcontent=$db_conn->query("SELECT * FROM dbcontent where id = '$_GET[id]'");
		while($datacontetn=$getcontent->fetch_array())  {
			$title_en = $datacontetn["title_en"];
			$fulltext_en = $datacontetn["fulltext_en"];
			$title_id = $datacontetn["title_id"];
			$fulltext_id = $datacontetn["fulltext_id"];
			$authorname = $datacontetn["created_name"];
			$pub_date = $datacontetn["published_date"];
			$mdesc_en = $datacontetn["mdesc_en"];
			$mkey_en = $datacontetn["mkey_en"];
			$mdesc_id = $datacontetn["mdesc_id"];
			$mkey_id = $datacontetn["mkey_id"];
			$collection_id = $datacontetn["id"];
		}
			$buttonsimpan = "editcontent";

	} else {
			$title_en = "";
			$fulltext_en = "";
			$title_id = "";
			$fulltext_id = "";
			$authorname = "";
			$pub_date = "";
			$mdesc_en = "";
			$mkey_en = "";
			$mdesc_id = "";
			$mkey_id = "";
			$collection_id = "";
			$buttonsimpan = "simpancontent";
		}

	if(isset($_POST['simpancontent'])){  
		$title_en = addslashes($_POST['judul_en']) ;
		$isi_art_en = addslashes($_POST['isi_con_en']);
		$authorname = addslashes($_POST['author_name']);
		$insertdate = date('Y-m-d', strtotime($_POST['published_date']));
		$meta_desc_en= addslashes($_POST['metadesc_en']);
		$meta_key_en= addslashes($_POST['metakey_en']);
		$meta_desc_id= addslashes($_POST['metadesc_en']);
		$meta_key_id= addslashes($_POST['metakey_en']);
		$published_perm= addslashes($_POST['publised_perm']);
		$catlist = isset($_POST['catlist']) ? $_POST['catlist'] : "0";
		$user_id_created = $_SESSION['user_id'];
		$name_of_user = $_SESSION['name_of_user'];

			$inputarticle = mysqli_query($db_conn, "INSERT INTO dbcontent (cat_id, title_en, fulltext_en, mdesc_en, mkey_en, published, created_by, created_name, published_date) VALUES  ('$catlist','$title_en', '$isi_art_en', '$meta_desc_en', '$meta_key_en', '$isi_art_id', $published_perm, '$user_id_created', '$name_of_user', '$insertdate')");

			$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Create new Content' )");

			if ($inputarticle && $loginfo) {
		echo "<script>alert('Data successfully saved!')</script>";			
		echo "<script>window.open('page-list.php?type=new&lang=1&link=content&mid=22&smid=23','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}
	}

	if(isset($_POST['editcontent'])){  
		$title_en = addslashes($_POST['judul_en']) ;
		$isi_art_en = addslashes($_POST['isi_con_en']);
		$title_id = addslashes($_POST['judul_id']) ;
		$isi_art_id = addslashes($_POST['isi_con_id']);
		$authorname = addslashes($_POST['author_name']);
		$insertdate = date('Y-m-d', strtotime($_POST['published_date']));
		$meta_desc_en= addslashes($_POST['metadesc_en']);
		$meta_key_en= addslashes($_POST['metakey_en']);
		$meta_desc_id= addslashes($_POST['metadesc_en']);
		$meta_key_id= addslashes($_POST['metakey_en']);
		$published_perm= addslashes($_POST['publised_perm']);
		$catlist = isset($_POST['catlist']) ? $_POST['catlist'] : "0";
		$countcatlist = count($catlist);
		$user_id_created = $_SESSION['user_id'];
		$name_of_user = $_SESSION['name_of_user'];


			$editarticle = mysqli_query($db_conn, "UPDATE dbcontent set title_en = '$title_en', fulltext_en = '$isi_art_en', mdesc_en = '$meta_desc_en', mkey_en = '$meta_key_en', title_id = '$title_id', fulltext_id = '$isi_art_id', mdesc_id = '$meta_desc_id', mkey_id = '$meta_key_id', published = $published_perm, created_by = '$user_id_created', published_date = '$insertdate' where id = '$_GET[id]'");
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