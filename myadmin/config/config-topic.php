<?php
// Open Data Topic

	if($_GET['type'] == 'edit') {
		$gettopic=$db_conn->query("SELECT * FROM dbcattopic where id = '$_GET[id]'");
		while($datatopic=$gettopic->fetch_array())  {
			
			$title_en = $datatopic["title_en"];
			$fulltext_en = $datatopic["fulltext_en"];
			$title_id = $datatopic["title_id"];
			$fulltext_id = $datatopic["fulltext_id"];
			$authorname = $datatopic["author"];
			$pub_date = $datatopic["published_date"];
			$desc_en = $datatopic["desc_en"];
			$mdesc_en= $datatopic["mdesc_en"];
			$mkey_en = $datatopic["mkey_en"];
			$desc_id = $datatopic["desc_id"];
			$mdesc_id = $datatopic["mdesc_id"];
			$mkey_id = $datatopic["mkey_id"];
			$collection_id = $datatopic["id"];
			$published_perm = $datatopic["published"];
			$op_pos = $datatopic["position_lp"];
			$order_pos = $datatopic["order_pos"];
			$tmb_pict = $datatopic["tmb"];
			$tmb_pict_view = '../'.$datatopic["tmb"];
			$background_pict = $datatopic["img"];
			$background_pict_view = '../'.$datatopic["img"];
			$pdf_file_path = $datatopic["file"];

		}
			$buttonsimpan = "editonepager";

	} else {
			$title_en = "";
			$fulltext_en = "";
			$title_id = "";
			$fulltext_id = "";
			$authorname = "";
			$pub_date = "";
			$desc_en = "";
			$mdesc_en= "";
			$mkey_en = "";
			$desc_id = "";
			$mdesc_id = "";
			$mkey_id = "";
			$collection_id = "";
			$published_perm = "";
			$op_pos = "";
			$order_pos = "0";
			$tmb_pict = "";
			$tmb_pict_view = "";
			$background_pict = "";
			$background_pict_view = "";
			$buttonsimpan = "simpanonepager";

		}

// END OF Data Topic


// Save Topic - Onepager
	
	if(isset($_POST['simpanonepager'])){

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
			$tmp_tmb_path = "../images/thumb/topic/{$tmb_name}";
			//var_dump($tmp_file_path);

			//Move the file
			move_uploaded_file($tmb_tmp_name, $tmp_tmb_path);
			//remove tmp file
			//unlink($tmp_file_path);
		}
// END OF Thumbnail

// Upload Background
		if($_FILES['bg_upload']['error'] != 4) {
			$bgfile = $_FILES['bg_upload'];

			//File details
			$bg_name = $bgfile['name'];
			$bg_tmp_name = $bgfile['tmp_name'];

			$bg_ext = explode('.', $bg_name);
			$bg_ext = strtolower(end($bg_ext));
			//var_dump($ext);

			// Temp details
			$bg_key = md5(uniqid());
			$tmp_bg_name = "{$bg_key}.{$bg_ext}";
			$tmp_bg_path = "../images/background/{$bg_name}";
			//var_dump($tmp_file_path);

			//Move the file
			move_uploaded_file($bg_tmp_name, $tmp_bg_path);
			//remove tmp file
			//unlink($tmp_file_path);
		}
// END OF Upload Background


	if(!empty($tmb_name)){$tmb_path = "images/thumb/topic/$tmb_name";} else {$tmb_path = NULL;}
	if(!empty($bg_name)){$bg_path = "images/background/$bg_name";} else {$bg_path = NULL;}
	$judulen = addslashes($_POST['judul_en']);
	$isi_en = addslashes($_POST['isi_op_en']);
	$judulid = addslashes($_POST['judul_id']);
	$isi_id = addslashes($_POST['isi_op_id']);
	$authorname = addslashes($_POST['author_name']);
	$insertdate = date('Y-m-d', strtotime($_POST['published_date']));
	$published_perm= $_POST['published_perm'];
	$position= $_POST['op_pos'];
	$orderpos= $_POST['order_pos'];
	$desc_en= addslashes($_POST['desc_en']);
	$desc_id= addslashes($_POST['desc_id']);
	if(!empty($_POST['metadesc_en'])){
		$meta_desc_en = addslashes($_POST['metadesc_en']);
	} else {
		$meta_desc_en = substr(preg_replace('/(<[^>]+) style=".*?"/i', '$1',(addslashes($_POST['isi_op_en']))), 0, 200);}
	if(!empty($_POST['metadesc_id'])){
		$meta_desc_id = addslashes($_POST['metadesc_id']);
	} else {
		$meta_desc_id = substr(preg_replace('/(<[^>]+) style=".*?"/i', '$1',(addslashes($_POST['isi_op_id']))), 0, 200);}
	$meta_key_en= addslashes($_POST['metakey_en']);
	$meta_key_id= addslashes($_POST['metakey_id']);
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];


	 	$inputarticle = mysqli_query($db_conn, "INSERT INTO dbcattopic (title_en, fulltext_en, title_id, fulltext_id, author, tmb, img, desc_en, desc_id, mdesc_en, mdesc_id, mkey_en, mkey_id, published, published_date, created_user_id, position_lp, order_pos) values ('$judulen', '$isi_en', '$judulid', '$isi_id', '$authorname', '$tmb_path', '$bg_path', '$desc_en', '$desc_id', '$meta_desc_en', '$meta_desc_id', '$meta_key_en', '$meta_key_id', '$published_perm', '$insertdate', '$user_id_created', '$position', '$orderpos')");


	 	if ($inputarticle) {
		echo "<script>alert('Data successfully saved!')</script>";			
		echo "<script>window.open('page-list.php?lang=1&link=topic&mid=10&smid=12','_self')</script>";
		}else{
			echo "Perubahan data gagal".mysqli_error();
		}
	 	
	 	//insert log info
		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Created New Topic' )") or die(mysqli_error());

	}

// END - SAVE ONEPAGER - TOPIC




// SAVE EDIT ONEPAGER - TOPIC
	
if(isset($_POST['editonepager'])){

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
			$tmp_tmb_path = "../images/thumb/topic/{$tmb_name}";
			//var_dump($tmp_file_path);

			//Move the file
			move_uploaded_file($tmb_tmp_name, $tmp_tmb_path);
			//remove tmp file
			//unlink($tmp_file_path);
		}
// END OF Thumbnail

// Upload Background
		if($_FILES['bg_upload']['error'] != 4) {
			$bgfile = $_FILES['bg_upload'];

			//File details
			$bg_name = $bgfile['name'];
			$bg_tmp_name = $bgfile['tmp_name'];

			$bg_ext = explode('.', $bg_name);
			$bg_ext = strtolower(end($bg_ext));
			//var_dump($ext);

			// Temp details
			$bg_key = md5(uniqid());
			$tmp_bg_name = "{$bg_key}.{$bg_ext}";
			$tmp_bg_path = "../images/background/{$bg_name}";
			//var_dump($tmp_file_path);

			//Move the file
			move_uploaded_file($bg_tmp_name, $tmp_bg_path);
			//remove tmp file
			//unlink($tmp_file_path);
		}
// END OF Upload Background


	$topic_id = $_GET['id'];
	if(!empty($tmb_name)){
		$tmb_path = "images/thumb/topic/$tmb_name";
		$edit_tmb = "tmb = '$tmb_path',";
	} else {
		$tmb_path = NULL;
		$edit_tmb = "";
	}
	if(!empty($bg_name)){
		$bg_path = "images/background/$bg_name";
		$edit_bg = "img = '$bg_path',";
	} else {
		$bg_path = NULL;
		$edit_bg = "";
	}

	$judulen = addslashes($_POST['judul_en']);
	$isi_en = addslashes($_POST['isi_op_en']);
	$judulid = addslashes($_POST['judul_id']);
	$isi_id = addslashes($_POST['isi_op_id']);
	$authorname = addslashes($_POST['author_name']);
	$insertdate = date('Y-m-d', strtotime($_POST['published_date']));
	$published_perm= $_POST['published_perm'];
	$orderpos= $_POST['order_pos'];
	$position= $_POST['op_pos'];
	$desc_en= addslashes($_POST['desc_en']);
	$desc_id= addslashes($_POST['desc_id']);
	if(!empty($_POST['metadesc_en'])){
		$meta_desc_en = addslashes($_POST['metadesc_en']);
	} else {
		$meta_desc_en = substr(preg_replace('/(<[^>]+) style=".*?"/i', '$1',(addslashes($_POST['isi_op_en']))), 0, 200);}
	if(!empty($_POST['metadesc_id'])){
		$meta_desc_id = addslashes($_POST['metadesc_id']);
	} else {
		$meta_desc_id = substr(preg_replace('/(<[^>]+) style=".*?"/i', '$1',(addslashes($_POST['isi_op_id']))), 0, 200);}
	$meta_key_en= addslashes($_POST['metakey_en']);
	$meta_key_id= addslashes($_POST['metakey_id']);
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];

	 	$inputarticle = mysqli_query($db_conn, "UPDATE dbcattopic SET $edit_tmb $edit_bg title_en = '$judulen', fulltext_en = '$isi_en', title_id = '$judulid', fulltext_id = '$isi_id', author = '$authorname', desc_en = '$desc_en', desc_id = '$desc_id', mdesc_en = '$meta_desc_en', mdesc_id = '$meta_desc_id', mkey_en = '$meta_key_en', mkey_id = '$meta_key_id', published = '$published_perm', published_date = '$insertdate', created_user_id = '$user_id_created', position_lp = '$position', order_pos = '$orderpos' where id = '$topic_id'");

	 	if ($inputarticle) {
		echo "<script>alert('Data successfully saved!')</script>";			
		echo "<script>window.open('page-list.php?lang=1&link=topic&mid=10&smid=12','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysqli_error();
		}

	 	$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Edited Topic' )") or die(mysqli_error());

	}

// END - EDIT ONEPAGER - TOPIC


// Delete Onepager
	
	if(isset($_POST['btndelete'])){
		$topic_id = $_GET['id'];
		$user_id_created = $_SESSION['user_id'];
		$name_of_user = $_SESSION['name_of_user'];
		$deletearticel = $inputarticle = mysqli_query($db_conn, "DELETE from dbcattopic where id = $topic_id");

		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Delete Topic' )");

		if ($deletearticel && $loginfo) {
			echo "<script>alert('Data successfully DELETE!')</script>";			
			echo "<script>window.open('page-list.php?lang=1&link=topic&mid=10&smid=12','_self')</script>";
			}else{
				echo "Gagal menghapus data=<br/>".mysqli_error();
			}
	}
// END OF Delete Onepager
?>