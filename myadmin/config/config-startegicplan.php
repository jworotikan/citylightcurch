<?php

// Open Data Topic

	if($_GET['type'] == 'edit') {
		$getplan=$db_conn->query("SELECT * FROM dbcatplan where id = '$_GET[id]'");
		while($dataplan=$getplan->fetch_array())  {
			
			$title_en = $dataplan["title_en"];
			$fulltext_en = $dataplan["desc_en"];
			$title_id = $dataplan["title_id"];
			$fulltext_id = $dataplan["desc_id"];
			$desc_en = $dataplan["desc_en"];
			$author_name = $dataplan["author"];
			$mdesc_en= $dataplan["mdesc_en"];
			$mkey_en = $dataplan["mkey_en"];
			$mdesc_id = $dataplan["mdesc_id"];
			$mkey_id = $dataplan["mkey_id"];
			$collection_id = $dataplan["id"];
			$sp_pos = $dataplan["position_lp"];
			$published_perm = $dataplan["published"];
			$thumb_path = $dataplan["img"];
			$thumb_img = $path_file.$dataplan["img"];
		}
			$buttonsimpan = "buttonedit";

	} else {
			$title_en = "";
			$fulltext_en = "";
			$title_id = "";
			$fulltext_id = "";
			$desc_en = "";
			$author_name = "";
			$mdesc_en= "";
			$mkey_en = "";
			$desc_id = "";
			$mdesc_id = "";
			$mkey_id = "";
			$collection_id = "";
			$sp_pos = "";
			$published_perm = "";
			$thumb_img = "";
			$buttonsimpan = "buttonsave";

		}

// END OF Data Topic



// Save Strategic Plan
	
	if(isset($_POST['buttonsave'])){

//Upload Thumbnail
		
if($_FILES['tmb_upload']['error'] != 4) {
			// upload thumbnail
		$tmbfile = $_FILES['tmb_upload'];

		//File details
		$tmb_name = $tmbfile['name'];
		$tmb_tmp_name = $tmbfile['tmp_name'];

		$tmb_ext = explode('.', $tmb_name);
		$tmb_ext = strtolower(end($tmb_ext));
		//var_dump($ext);

		// Temp details
		$tmb_key = md5(uniqid());
		$tmp_tmb_name = "{$tmb_key}.{$tmb_ext}";
		$tmp_tmb_path = "../images/rpjmn/{$tmb_name}";
		//var_dump($tmp_file_path);

		//Move the file
		move_uploaded_file($tmb_tmp_name, $tmp_tmb_path);
		//remove tmp file
		//unlink($tmp_file_path);
	}

// END Of Upload Thumbnail


	if(!empty($tmb_name)){$tmb_path = "images/rpjmn/$tmb_name";} else {$tmb_path = NULL;}
	$judulen = addslashes($_POST['judul_en']);
	$isi_en = addslashes($_POST['isi_sp_en']);
	$judulid = addslashes($_POST['judul_id']);
	$isi_id = addslashes($_POST['isi_sp_id']);
	$authorname = addslashes($_POST['author_name']);
	$insertdate = date('Y-m-d', strtotime($_POST['published_date']));
	$published_perm= $_POST['published_perm'];
	$position= $_POST['sp_pos'];
	$meta_desc_en= addslashes($_POST['metadesc_en']);
	$meta_desc_id= addslashes($_POST['metadesc_id']);
	$meta_key_en= addslashes($_POST['metakey_en']);
	$meta_key_id= addslashes($_POST['metakey_id']);
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];
	$type_id = "'1'";


	 	$inputarticle = mysqli_query($db_conn, "INSERT INTO dbcatplan (title_en, desc_en, title_id, desc_id, author, img, mdesc_en, mdesc_id, mkey_en, mkey_id, create_user, published, published_date, position_lp) VALUES ('$judulen', '$isi_en', '$judulid', '$isi_id', '$authorname', '$tmb_path', '$meta_desc_en', '$meta_desc_id', '$meta_key_en', '$meta_key_id',  '$user_id_created', '$published_perm', '$insertdate', '$position')");

	 	//insert log info
		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Created New Plan' )");

	 	if ($inputarticle && $loginfo) {
		echo "<script>alert('Data successfully saved!')</script>";			
		echo "<script>window.open('page-list.php?type=new&lang=1&link=rpjmn&mid=13&smid=14','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}

	}

// END - SAVE Strategic Plan




// SAVE EDIT Strategic Plan
if(isset($_POST['buttonedit'])){

//Upload Thumbnail
		
if($_FILES['tmb_upload']['error'] != 4) {
			// upload thumbnail
		$tmbfile = $_FILES['tmb_upload'];

		//File details
		$tmb_name = $tmbfile['name'];
		$tmb_tmp_name = $tmbfile['tmp_name'];

		$tmb_ext = explode('.', $tmb_name);
		$tmb_ext = strtolower(end($tmb_ext));
		//var_dump($ext);

		// Temp details
		$tmb_key = md5(uniqid());
		$tmp_tmb_name = "{$tmb_key}.{$tmb_ext}";
		$tmp_tmb_path = "../images/rpjmn/{$tmb_name}";
		//var_dump($tmp_file_path);

		//Move the file
		move_uploaded_file($tmb_tmp_name, $tmp_tmb_path);
		//remove tmp file
		//unlink($tmp_file_path);
	}

// END Of Upload Thumbnail


	$plan_id = $_GET['id'];
	if(!empty($tmb_name)){
		$tmb_path = "images/rpjmn/$tmb_name";
		$edit_tmb = "img = '$tmb_path',";
	} else {
		$tmb_path = NULL;
		$edit_tmb = "";
	}
	$judulen = addslashes($_POST['judul_en']);
	$isi_en = addslashes($_POST['isi_sp_en']);
	$judulid = addslashes($_POST['judul_id']);
	$isi_id = addslashes($_POST['isi_sp_id']);
	$authorname = addslashes($_POST['author_name']);
	$insertdate = date('Y-m-d', strtotime($_POST['published_date']));
	$published_perm= $_POST['published_perm'];
	$position= $_POST['sp_pos'];
	$meta_desc_en= addslashes($_POST['metadesc_en']);
	$meta_desc_id= addslashes($_POST['metadesc_id']);
	$meta_key_en= addslashes($_POST['metakey_en']);
	$meta_key_id= addslashes($_POST['metakey_id']);
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];
	$type_id = "'1'";

	 	$inputarticle = mysqli_query($db_conn, "UPDATE dbcatplan SET $edit_tmb title_en = '$judulen', desc_en = '$isi_en', title_id = '$judulid', desc_id = '$isi_id', author = '$authorname', mdesc_en = '$meta_desc_en', mdesc_id = '$meta_desc_id', mkey_en = '$meta_key_en', mkey_id = '$meta_key_id', create_user = '$user_id_created', published = '$published_perm', published_date = '$insertdate', position_lp = '$position' where id = '$plan_id'");

	 	$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Edited Plan' )");

	 	if ($inputarticle && $loginfo) {
		echo "<script>alert('Data successfully saved!')</script>";			
		echo "<script>window.open('page-list.php?type=new&lang=1&link=rpjmn&mid=13&smid=14','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}

	}

// END - EDIT Strategic Plan

	// Start - DELETE Collection
	if(isset($_POST['btndelete'])){
		$user_id_created = $_SESSION['user_id'];
		$name_of_user = $_SESSION['name_of_user'];
		$query = "DELETE from dbcatplan where id = '$collection_id'";

	$deletecollection = mysqli_query($db_conn, $query) or die(mysqli_error());

	//insert log info
	$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Delete RPJMN' )");

	if ($deletecollection && $loginfo) {
		echo "<script>alert('Data successfully DELETE!')</script>";			
		echo "<script>window.open('page-list.php?type=new&lang=1&link=home&mid=13&smid=14','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}
	}
?>