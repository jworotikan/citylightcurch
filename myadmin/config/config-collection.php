<?php

$gettopic=$db_conn->query("SELECT * FROM dbcattopic ORDER BY id ASC");
$gettype=$db_conn->query("SELECT * FROM dbcatcollection ORDER BY id ASC");
$getplan=$db_conn->query("SELECT * FROM dbcatplan where parent_id = '0' ORDER BY id ASC");
$getrelated=$db_conn->query("SELECT * FROM dbcollectiondetail where published = '1' ORDER BY id ASC");


// Open Data Collection 

	if($_GET['type'] == 'edit') {
		$getcollection=$db_conn->query("SELECT * FROM dbcollectiondetail where id = '$_GET[id]'");
		while($datacollection=$getcollection->fetch_array())  {
			$collection_id = $datacollection["id"];
			$type_id = $datacollection["cat_id"];
			$title_en = $datacollection["title_en"];
			$fulltext_en = $datacollection["fulltext_en"];
			$finding_en = $datacollection["finding_en"];
			$policy_en = $datacollection["policy_en"];
			$title_id = $datacollection["title_id"];
			$fulltext_id = $datacollection["fulltext_id"];
			$finding_id = $datacollection["finding_id"];
			$policy_id = $datacollection["policy_id"];
			$img_bg_path = $datacollection["img"];
			$img_bg_path_view = "../" . $img_bg_path;
			$file_pdf = $datacollection["file"];
			$path_pdf = "../" . $file_pdf;
			$thumb_pt_en = $datacollection["thumb_pt_en"];
			$thumb_pt_en_view = "../" . $thumb_pt_en;
			$thumb_pt_id = $datacollection["thumb_pt_id"];
			$thumb_pt_id_view = "../" . $thumb_pt_id;
			$thumb_lc_en = $datacollection["thumb_lc_en"];
			$thumb_lc_en_view = "../" . $thumb_lc_en;
			$thumb_lc_id = $datacollection["thumb_lc_id"];
			$thumb_lc_id_view = "../" . $thumb_lc_id;
			$path_embed = $datacollection["embedcode"];
			$authorname = $datacollection["author"];
			$pub_date = date('d F Y', strtotime($datacollection['published_date']));
			$mdesc_en= $datacollection["mdesc_en"];
			$mkey_en = $datacollection["mkey_en"];
			$mdesc_id = $datacollection["mdesc_id"];
			$mkey_id = $datacollection["mkey_id"];
			$dw_button = $datacollection["dw_button"];
			$ps_button = $datacollection["print_shared_button"];
			$citation = $datacollection["citation"];
			$published_perm = $datacollection["published"];
		}
			
			$buttonsimpan = "editbutton";

	} else {
			$collection_id = "";
			$title_en = "";
			$fulltext_en = "";
			$finding_en = "";
			$policy_en = "";
			$title_id = "";
			$fulltext_id = "";
			$finding_id = "";
			$thumb_pt_en = "images/tpt_en.png";
			$thumb_pt_en_view = "../images/tpt_en.png";
			$thumb_pt_id = "images/tpt_id.png";
			$thumb_pt_id_view = "../images/tpt_id.png";
			$thumb_lc_en = "images/tlc_en.png";
			$thumb_lc_en_view = "../images/tlc_en.png";
			$thumb_lc_id = "images/tlc_id.png";
			$thumb_lc_id_view = "../images/tlc_id.png";
			$path_embed = "";
			$path_pdf = "";
			$img_bg_path = "";
			$img_bg_path_view = "";
			$pdf_fl_path = "";
			$pdf_fl_path_view = "";
			$policy_id = "";
			$authorname = "";
			$pub_date = date("d F Y");
			$mdesc_en= "";
			$mkey_en = "";
			$mdesc_id = "";
			$mkey_id = "";
			$dw_button = "1";
			$ps_button = "1";
			$citation = "";
			$published_perm = "1";
			$buttonsimpan = "savebutton";
		}


// Save Collection
	if(isset($_POST['savebutton'])){

// Upload Thumbnail Landscape - en

	if($_FILES['tmb_lc_en_upload']['error'] != 4) {


		$tmb_lc_en_file = $_FILES['tmb_lc_en_upload'];

		//File details
		$tmb_lc_en_name = $tmb_lc_en_file['name'];
		$tmb_lc_en_name = str_replace(" ", "-",$tmb_lc_en_name);
		$tmb_lc_en_tmp_name = $tmb_lc_en_file['tmp_name'];

		$tmb_lc_en_ext = explode('.', $tmb_lc_en_name);
		$tmb_lc_en_ext = strtolower(end($tmb_lc_en_ext));
		//var_dump($ext);

		// Temp details
		$tmb_lc_en_key = md5(uniqid());
		$tmp_tmb_lc_en_name = "{$tmb_lc_en_key}.{$tmb_lc_en_ext}";
		$tmp_tmb_lc_en_path = "../images/thumb/thumb_lc_en/{$tmb_lc_en_name}";
		//var_dump($tmp_file_path);

		//Move the file
		move_uploaded_file($tmb_lc_en_tmp_name, $tmp_tmb_lc_en_path);
		//remove tmp file
		//unlink($tmp_file_path);
	}
// END Of Upload Thumbnail Landscape - en

// Upload Thumbnail Landscape - id

	if($_FILES['tmb_lc_id_upload']['error'] != 4) {


		$tmb_lc_id_file = $_FILES['tmb_lc_id_upload'];

		//File details
		$tmb_lc_id_name = $tmb_lc_id_file['name'];
		$tmb_lc_id_name = str_replace(" ", "-",$tmb_lc_id_name);
		$tmb_lc_id_tmp_name = $tmb_lc_id_file['tmp_name'];

		$tmb_lc_id_ext = explode('.', $tmb_lc_id_name);
		$tmb_lc_id_ext = strtolower(end($tmb_lc_id_ext));
		//var_dump($ext);

		// Temp details
		$tmb_lc_id_key = md5(uniqid());
		$tmp_tmb_lc_id_name = "{$tmb_lc_id_key}.{$tmb_lc_id_ext}";
		$tmp_tmb_lc_id_path = "../images/thumb/thumb_lc_id/{$tmb_lc_id_name}";
		//var_dump($tmp_file_path);

		//Move the file
		move_uploaded_file($tmb_lc_id_tmp_name, $tmp_tmb_lc_id_path);
		//remove tmp file
		//unlink($tmp_file_path);
	}
// END Of Upload Thumbnail Landscape - id


/// Upload Thumbnail Portrait - en

	if($_FILES['tmb_pt_en_upload']['error'] != 4) {


		$tmb_pt_en_file = $_FILES['tmb_pt_en_upload'];

		//File details
		$tmb_pt_en_name = $tmb_pt_en_file['name'];
		$tmb_pt_en_name = str_replace(" ", "-",$tmb_pt_en_name);
		$tmb_pt_en_tmp_name = $tmb_pt_en_file['tmp_name'];

		$tmb_pt_en_ext = explode('.', $tmb_pt_en_name);
		$tmb_pt_en_ext = strtolower(end($tmb_pt_en_ext));
		//var_dump($ext);

		// Temp details
		$tmb_pt_en_key = md5(uniqid());
		$tmp_tmb_pt_en_name = "{$tmb_pt_en_key}.{$tmb_pt_en_ext}";
		$tmp_tmb_pt_en_path = "../images/thumb/thumb_pt_en/{$tmb_pt_en_name}";
		//var_dump($tmp_file_path);

		//Move the file
		move_uploaded_file($tmb_pt_en_tmp_name, $tmp_tmb_pt_en_path);
		//remove tmp file
		//unlink($tmp_file_path);
	}
// END Of Upload Thumbnail Portrait - en

// Upload Thumbnail Portrait - id

	if($_FILES['tmb_pt_id_upload']['error'] != 4) {


		$tmb_pt_id_file = $_FILES['tmb_pt_id_upload'];

		//File details
		$tmb_pt_id_name = $tmb_pt_id_file['name'];
		$tmb_pt_id_name = str_replace(" ", "-",$tmb_pt_id_name);
		$tmb_pt_id_tmp_name = $tmb_pt_id_file['tmp_name'];

		$tmb_pt_id_ext = explode('.', $tmb_pt_id_name);
		$tmb_pt_id_ext = strtolower(end($tmb_pt_id_ext));
		//var_dump($ext);

		// Temp details
		$tmb_pt_id_key = md5(uniqid());
		$tmp_tmb_pt_id_name = "{$tmb_pt_id_key}.{$tmb_pt_id_ext}";
		$tmp_tmb_pt_id_path = "../images/thumb/thumb_pt_id/{$tmb_pt_id_name}";
		//var_dump($tmp_file_path);

		//Move the file
		move_uploaded_file($tmb_pt_id_tmp_name, $tmp_tmb_pt_id_path);
		//remove tmp file
		//unlink($tmp_file_path);
	}
// END Of Upload Thumbnail Portrait - id

// Upload PDF

	if($_FILES['fupload']['error'] != 4) {

		$pdf_file = $_FILES['fupload'];

		//File details
		$pdf_name = $pdf_file['name'];
		$pdf_name = str_replace(" ", "-",$pdf_name);
		$pdf_tmp_name = $pdf_file['tmp_name'];

		$pdf_ext = explode('.', $pdf_name);
		$pdf_ext = strtolower(end($pdf_ext));
		//var_dump($ext);

		// Temp details
		$tmb_pdf_key = md5(uniqid());
		$tmp_pdf_name = "{$tmb_pdf_key}.{$pdf_ext}";
		$tmp_pdf_path = "../download/collection/{$pdf_name}";
		//var_dump($tmp_file_path);

		//Move the file
		move_uploaded_file($pdf_tmp_name, $tmp_pdf_path);

		$text = /*tika($tmp_pdf_path)*/"";
		//remove tmp file
		//unlink($tmp_file_path);
	}
// END of Upload PDF

// Upload Background

	if($_FILES['img_bg_upload']['error'] != 4) {


		$img_bg_file = $_FILES['img_bg_upload'];

		//File details
		$img_bg_name = $img_bg_file['name'];
		$img_bg_name = str_replace(" ", "-",$img_bg_name);
		$img_bg_tmp_name = $img_bg_file['tmp_name'];

		$img_bg_ext = explode('.', $img_bg_name);
		$img_bg_ext = strtolower(end($img_bg_ext));
		//var_dump($ext);

		// Temp details
		$img_bg_key = md5(uniqid());
		$tmp_img_bg_name = "{$img_bg_key}.{$img_bg_ext}";
		$tmp_img_bg_path = "../images/background/collection-bg/{$img_bg_name}";
		//var_dump($tmp_file_path);

		//Move the file
		move_uploaded_file($img_bg_tmp_name, $tmp_img_bg_path);
		//remove tmp file
		//unlink($tmp_file_path);
	}
// END Of Upload Background


// END Of Upload


	if(!empty($tmb_lc_en_name)){$tmb_lc_en_path = "images/thumb/thumb_lc_en/$tmb_lc_en_name";} else {$tmb_lc_en_path = NULL;}
	if(!empty($tmb_pt_en_name)){$tmb_pt_en_path = "images/thumb/thumb_pt_en/$tmb_pt_en_name";} else {$tmb_pt_en_path = NULL;}
	if(!empty($tmb_lc_id_name)){$tmb_lc_id_path = "images/thumb/thumb_lc_id/$tmb_lc_id_name";} else {$tmb_lc_id_path = NULL;}
	if(!empty($tmb_pt_id_name)){$tmb_pt_id_path = "images/thumb/thumb_pt_id/$tmb_pt_id_name";} else {$tmb_pt_id_path = NULL;}
	if(!empty($img_bg_name)){$img_bg_path = "images/background/collection-bg/$img_bg_name";} else {$img_bg_path = NULL;}
	if(!empty($pdf_name)){$pdf_file_path = "download/collection/$pdf_name";} else {$pdf_file_path = NULL;}
	if(!empty($pdf_name)){$generate_txt = $text;} else {$generate_txt = "";}
	$judulen = addslashes($_POST['judul_en']) ;
	$isi_en = addslashes($_POST['isi_col_en']);
	$fin_en = addslashes($_POST['isi_fin_en']);
	$pol_en = addslashes($_POST['isi_pol_en']);
	$judulid = addslashes($_POST['judul_id']);
	$isi_id = addslashes($_POST['isi_col_id']);
	$fin_id = addslashes($_POST['isi_fin_id']);
	$pol_id = addslashes($_POST['isi_pol_id']);
	$authorname = addslashes($_POST['author_name']);
	$insertdate = date('Y-m-d', strtotime($_POST['published_date']));
	$coltype = $_POST['typelist'];
	if(!empty($_POST['metadesc_en'])){
		$meta_desc_en = addslashes($_POST['metadesc_en']);
	} else {
		$meta_desc_en = substr(preg_replace('/(<[^>]+) style=".*?"/i', '$1',(addslashes($_POST['isi_col_en']))), 0, 200);}
	if(!empty($_POST['metadesc_id'])){
		$meta_desc_id = addslashes($_POST['metadesc_id']);
	} else {
		$meta_desc_id = substr(preg_replace('/(<[^>]+) style=".*?"/i', '$1',(addslashes($_POST['isi_col_id']))), 0, 200);}
	$meta_key_en= addslashes($_POST['mkey_en']);
	$meta_key_id= addslashes($_POST['mkey_id']);
	$dw_button = $_POST['dw_button'];
	$printshare_button = $_POST['shared_button'];
	$citation = $_POST['citation'];
	$published_perm = $_POST['published_perm'];
	$embedcode= addslashes($_POST['embedcode']);
	$topiclist = isset($_POST['topiclist']) ? $_POST['topiclist'] : "0";
	$counttopiclist = count($topiclist);
	$plan = isset($_POST['planlist']) ? $_POST['planlist'] : "0";
	$countplan = count($plan);
	$related_col = isset($_POST['relatedcol']) ? $_POST['relatedcol'] : "0";
	$countrelated = count($related_col);
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];
	
	$query = "INSERT INTO dbcollectiondetail (cat_id, title_en, fulltext_en, finding_en, policy_en, title_id, fulltext_id, finding_id, policy_id, thumb_pt_en, thumb_pt_id, thumb_lc_en, thumb_lc_id, img, file, generate_pdf_txt, author, citation, mkey_en, mkey_id, mdesc_en, mdesc_id, created_by, published_date, dw_button, print_shared_button, published, embedcode) VALUES ('$coltype', '$judulen', '$isi_en', '$fin_en', '$pol_en', '$judulid', '$isi_id', '$fin_id', '$pol_id', '$tmb_pt_en_path', '$tmb_pt_id_path', '$tmb_lc_en_path', '$tmb_lc_id_path', '$img_bg_path', '$pdf_file_path', '$generate_txt', '$authorname', '$citation', '$meta_key_en', '$meta_key_id', '$meta_desc_en', '$meta_desc_id', '$user_id_created', '$insertdate', '$dw_button', '$printshare_button', '$published_perm', '$embedcode')";
	print_r($query); die();

	$inputcollection = mysqli_query($db_conn, $query);


	$get_last_id = $db_conn->insert_id; 

	// Insert Related Topic
	if (isset($_POST['topiclist'])) {
		$sqlreltop   = "INSERT INTO dbrelatedtopic (col_id, topic_id) VALUES ";
	
	for( $i=0; $i < $counttopiclist; $i++ )
	{	
		$sqlreltop .= "('$get_last_id', '{$topiclist[$i]}')";
		$sqlreltop .= ",";
	}
	$sqlreltop = rtrim($sqlreltop,",");
	$insertreltop = $db_conn->query($sqlreltop);
	}
	

	// Insert Related Plan
	if (isset($_POST['planlist'])) {
		$sqlrelplan   = "INSERT INTO dbrelatedplan (col_id, plan_id) VALUES ";
	
	for( $u=0; $u < $countplan; $u++ )
	{	
		$sqlrelplan .= "('$get_last_id', '{$plan[$u]}')";
		$sqlrelplan .= ",";
	}
	$sqlrelplan = rtrim($sqlrelplan,",");
	$insertrelplan = $db_conn->query($sqlrelplan);
	}
	

	// Insert Related Collection
	if (isset($_POST['relatedcol'])) {
		$sqlrelcol   = "INSERT INTO dbrelatedcollection (col_id, related_col) VALUES ";
	
	for( $e=0; $e < $countrelated; $e++ )
	{	
		$sqlrelcol .= "('$get_last_id', '{$related_col[$e]}')";
		$sqlrelcol .= ",";
	}
	$sqlrelcol = rtrim($sqlrelcol,",");
	$insertrelcol = $db_conn->query($sqlrelcol);
	}
	

	//insert log info
	$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Create new Collection' )");
	
	if ($inputcollection && $loginfo) {
		echo "<script>alert('Data successfully saved!')</script>";			
		echo "<script>window.open('page-list.php?lang=1&link=collection&mid=11&smid=21','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}
	
}
// END - SAVE Collection



// Start - EDIT Collection
	if(isset($_POST['editbutton'])){
	
// Upload Thumbnail Landscape - en

	if($_FILES['tmb_lc_en_upload']['error'] != 4) {


		$tmb_lc_en_file = $_FILES['tmb_lc_en_upload'];

		//File details
		$tmb_lc_en_name = $tmb_lc_en_file['name'];
		$tmb_lc_en_name = str_replace(" ", "-",$tmb_lc_en_name);
		$tmb_lc_en_tmp_name = $tmb_lc_en_file['tmp_name'];

		$tmb_lc_en_ext = explode('.', $tmb_lc_en_name);
		$tmb_lc_en_ext = strtolower(end($tmb_lc_en_ext));
		//var_dump($ext);

		// Temp details
		$tmb_lc_en_key = md5(uniqid());
		$tmp_tmb_lc_en_name = "{$tmb_lc_en_key}.{$tmb_lc_en_ext}";
		$tmp_tmb_lc_en_path = "../images/thumb/thumb_lc_en/{$tmb_lc_en_name}";
		//var_dump($tmp_file_path);

		//Move the file
		move_uploaded_file($tmb_lc_en_tmp_name, $tmp_tmb_lc_en_path);
		//remove tmp file
		//unlink($tmp_file_path);
	}
// END Of Upload Thumbnail Landscape - en

// Upload Thumbnail Landscape - id

	if($_FILES['tmb_lc_id_upload']['error'] != 4) {


		$tmb_lc_id_file = $_FILES['tmb_lc_id_upload'];

		//File details
		$tmb_lc_id_name = $tmb_lc_id_file['name'];
		$tmb_lc_id_name = str_replace(" ", "-",$tmb_lc_id_name);
		$tmb_lc_id_tmp_name = $tmb_lc_id_file['tmp_name'];

		$tmb_lc_id_ext = explode('.', $tmb_lc_id_name);
		$tmb_lc_id_ext = strtolower(end($tmb_lc_id_ext));
		//var_dump($ext);

		// Temp details
		$tmb_lc_id_key = md5(uniqid());
		$tmp_tmb_lc_id_name = "{$tmb_lc_id_key}.{$tmb_lc_id_ext}";
		$tmp_tmb_lc_id_path = "../images/thumb/thumb_lc_id/{$tmb_lc_id_name}";
		//var_dump($tmp_file_path);

		//Move the file
		move_uploaded_file($tmb_lc_id_tmp_name, $tmp_tmb_lc_id_path);
		//remove tmp file
		//unlink($tmp_file_path);
	}
// END Of Upload Thumbnail Landscape - id


/// Upload Thumbnail Portrait - en

	if($_FILES['tmb_pt_en_upload']['error'] != 4) {


		$tmb_pt_en_file = $_FILES['tmb_pt_en_upload'];

		//File details
		$tmb_pt_en_name = $tmb_pt_en_file['name'];
		$tmb_pt_en_name = str_replace(" ", "-",$tmb_pt_en_name);
		$tmb_pt_en_tmp_name = $tmb_pt_en_file['tmp_name'];

		$tmb_pt_en_ext = explode('.', $tmb_pt_en_name);
		$tmb_pt_en_ext = strtolower(end($tmb_pt_en_ext));
		//var_dump($ext);

		// Temp details
		$tmb_pt_en_key = md5(uniqid());
		$tmp_tmb_pt_en_name = "{$tmb_pt_en_key}.{$tmb_pt_en_ext}";
		$tmp_tmb_pt_en_path = "../images/thumb/thumb_pt_en/{$tmb_pt_en_name}";
		//var_dump($tmp_file_path);

		//Move the file
		move_uploaded_file($tmb_pt_en_tmp_name, $tmp_tmb_pt_en_path);
		//remove tmp file
		//unlink($tmp_file_path);
	}
// END Of Upload Thumbnail Portrait - en

// Upload Thumbnail Portrait - id

	if($_FILES['tmb_pt_id_upload']['error'] != 4) {


		$tmb_pt_id_file = $_FILES['tmb_pt_id_upload'];

		//File details
		$tmb_pt_id_name = $tmb_pt_id_file['name'];
		$tmb_pt_id_name = str_replace(" ", "-",$tmb_pt_id_name);
		$tmb_pt_id_tmp_name = $tmb_pt_id_file['tmp_name'];

		$tmb_pt_id_ext = explode('.', $tmb_pt_id_name);
		$tmb_pt_id_ext = strtolower(end($tmb_pt_id_ext));
		//var_dump($ext);

		// Temp details
		$tmb_pt_id_key = md5(uniqid());
		$tmp_tmb_pt_id_name = "{$tmb_pt_id_key}.{$tmb_pt_id_ext}";
		$tmp_tmb_pt_id_path = "../images/thumb/thumb_pt_id/{$tmb_pt_id_name}";
		//var_dump($tmp_file_path);

		//Move the file
		move_uploaded_file($tmb_pt_id_tmp_name, $tmp_tmb_pt_id_path);
		//remove tmp file
		//unlink($tmp_file_path);
	}
// END Of Upload Thumbnail Portrait - id

// Upload PDF

	if($_FILES['fupload']['error'] != 4) {

		$pdf_file = $_FILES['fupload'];

		//File details
		$pdf_name = $pdf_file['name'];
		$pdf_name = str_replace(" ", "-",$pdf_name);
		$pdf_tmp_name = $pdf_file['tmp_name'];

		$pdf_ext = explode('.', $pdf_name);
		$pdf_ext = strtolower(end($pdf_ext));
		//var_dump($ext);

		// Temp details
		$tmb_pdf_key = md5(uniqid());
		$tmp_pdf_name = "{$tmb_pdf_key}.{$pdf_ext}";
		$tmp_pdf_path = "../download/collection/{$pdf_name}";
		//var_dump($tmp_file_path);

		//Move the file
		move_uploaded_file($pdf_tmp_name, $tmp_pdf_path);

		$text = /*tika($tmp_pdf_path)*/"";
		//remove tmp file
		//unlink($tmp_file_path);
	}
// END of Upload PDF

// Upload Background

	if($_FILES['img_bg_upload']['error'] != 4) {


		$img_bg_file = $_FILES['img_bg_upload'];

		//File details
		$img_bg_name = $img_bg_file['name'];
		$img_bg_name = str_replace(" ", "-",$img_bg_name);
		$img_bg_tmp_name = $img_bg_file['tmp_name'];

		$img_bg_ext = explode('.', $img_bg_name);
		$img_bg_ext = strtolower(end($img_bg_ext));
		//var_dump($ext);

		// Temp details
		$img_bg_key = md5(uniqid());
		$tmp_img_bg_name = "{$img_bg_key}.{$img_bg_ext}";
		$tmp_img_bg_path = "../images/background/collection-bg/{$img_bg_name}";
		//var_dump($tmp_file_path);

		//Move the file
		move_uploaded_file($img_bg_tmp_name, $tmp_img_bg_path);
		//remove tmp file
		//unlink($tmp_file_path);
	}
// END Of Upload Background


// END Of Upload

	$collection_id = $_GET['id'];
	if(!empty($tmb_lc_en_name)){
		$tmb_lc_en_path = "images/thumb/thumb_lc_en/$tmb_lc_en_name";
		$edit_tmb_lc_en_path = "thumb_lc_en = '$tmb_lc_en_path',";
	} else {
		$tmb_lc_en_path = NULL;
		$edit_tmb_lc_en_path = "";
	}
	if(!empty($tmb_pt_en_name)){
		$tmb_pt_en_path = "images/thumb/thumb_pt_en/$tmb_pt_en_name";
		$edit_tmb_pt_en_path = "thumb_pt_en = '$tmb_pt_en_path',";
	} else {
		$tmb_pt_en_path = NULL;
		$edit_tmb_pt_en_path = "";
	}
	if(!empty($tmb_lc_id_name)){
		$tmb_lc_id_path = "images/thumb/thumb_lc_id/$tmb_lc_id_name";
		$edit_tmb_lc_id_path = "thumb_lc_id = '$tmb_lc_id_path',";
	} else {
		$tmb_lc_id_path = NULL;
		$edit_tmb_lc_id_path = "";
	}
	if(!empty($tmb_pt_id_name)){
		$tmb_pt_id_path = "images/thumb/thumb_pt_id/$tmb_pt_id_name";
		$edit_tmb_pt_id_path = "thumb_pt_id = '$tmb_pt_id_path',";
	} else {
		$tmb_pt_id_path = NULL;
		$edit_tmb_pt_id_path = "";
	}
	if(!empty($img_bg_name)){
		$img_bg_path = "images/background/collection-bg/$img_bg_name";
		$edit_img_bg_path = "img = '$img_bg_path',";
	} else {
		$img_bg_path = NULL;
		$edit_img_bg_path = "";
	}



	if(!empty($pdf_name)){
		$pdf_file_path = "download/collection/$pdf_name";
		$edit_pdf_file_path = "file = '$pdf_file_path',";
		$generate_txt = $text;
		$update_generate_txt = "generate_pdf_txt = '$generate_txt',";
	} else {
		$pdf_file_path = NULL;
		$edit_pdf_file_path = "";
		$generate_txt = "";
		$update_generate_txt = "";
	}

	$judulen = addslashes($_POST['judul_en']) ;
	$isi_en = addslashes($_POST['isi_col_en']);
	$fin_en = addslashes($_POST['isi_fin_en']);
	$pol_en = addslashes($_POST['isi_pol_en']);
	$judulid = addslashes($_POST['judul_id']);
	$isi_id = addslashes($_POST['isi_col_id']);
	$fin_id = addslashes($_POST['isi_fin_id']);
	$pol_id = addslashes($_POST['isi_pol_id']);
	$authorname = addslashes($_POST['author_name']);
	$insertdate = date('Y-m-d', strtotime($_POST['published_date']));
	$coltype = $_POST['typelist'];
	$meta_desc_en= addslashes($_POST['metadesc_en']);
	$meta_desc_id= addslashes($_POST['metadesc_id']);
	$meta_key_en= addslashes($_POST['mkey_en']);
	$meta_key_id= addslashes($_POST['mkey_id']);
	$dw_button = $_POST['dw_button'];
	$printshare_button = $_POST['shared_button'];
	$citation = $_POST['citation'];
	$published_perm = $_POST['published_perm'];
	$embedcode= addslashes($_POST['embedcode']);
	$topiclist = isset($_POST['topiclist']) ? $_POST['topiclist'] : "0";
	$counttopiclist = count($topiclist);
	$plan = isset($_POST['planlist']) ? $_POST['planlist'] : "0";
	$countplan = count($plan);
	$related_col = isset($_POST['relatedcol']) ? $_POST['relatedcol'] : "0";
	$countrelated = count($related_col);
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];
	
	$query = "UPDATE dbcollectiondetail SET $edit_tmb_pt_en_path $edit_tmb_pt_id_path $edit_tmb_lc_en_path $edit_tmb_lc_id_path $edit_img_bg_path $edit_pdf_file_path $update_generate_txt cat_id = '$coltype', title_en = '$judulen', fulltext_en = '$isi_en', finding_en = '$fin_en', policy_en = '$pol_en', title_id = '$judulid', fulltext_id = '$isi_id', finding_id = '$fin_id', policy_id = '$pol_id', author = '$authorname', citation = '$citation', mkey_en = '$meta_key_en', mkey_id = '$meta_key_id', mdesc_en = '$meta_desc_en', mdesc_id = '$meta_desc_id', created_by = '$user_id_created', published_date = '$insertdate', dw_button = '$dw_button', print_shared_button = '$printshare_button', published = '$published_perm', embedcode = '$embedcode' where id = '$collection_id'";

	$updatecollection = mysqli_query($db_conn, $query);


	// Insert Related Topic
	if (isset($_POST['topiclist'])) {
		$delreltop = $db_conn->query("DELETE from dbrelatedtopic where col_id = $collection_id");
		$sqlreltop   = "INSERT INTO dbrelatedtopic (col_id, topic_id) VALUES ";
	
	for( $i=0; $i < $counttopiclist; $i++ )
	{	
		$sqlreltop .= "('$collection_id', '{$topiclist[$i]}')";
		$sqlreltop .= ",";
	}
	$sqlreltop = rtrim($sqlreltop,",");
	$insertreltop = $db_conn->query($sqlreltop);
	}
	

	// Insert Related Plan
	if (isset($_POST['planlist'])) {
		$delreltop = $db_conn->query("DELETE from dbrelatedplan where col_id = $collection_id");
		$sqlrelplan   = "INSERT INTO dbrelatedplan (col_id, plan_id) VALUES ";
	
	for( $u=0; $u < $countplan; $u++ )
	{	
		$sqlrelplan .= "('$collection_id', '{$plan[$u]}')";
		$sqlrelplan .= ",";
	}
	$sqlrelplan = rtrim($sqlrelplan,",");
	$insertrelplan = $db_conn->query($sqlrelplan);
	}
	

	// Insert Related Collection
	if (isset($_POST['relatedcol'])) {
		$delreltop = $db_conn->query("DELETE from dbrelatedcollection where col_id = $collection_id");
		$sqlrelcol   = "INSERT INTO dbrelatedcollection (col_id, related_col) VALUES ";
	
	for( $e=0; $e < $countrelated; $e++ )
	{	
		$sqlrelcol .= "('$collection_id', '{$related_col[$e]}')";
		$sqlrelcol .= ",";
	}
	$sqlrelcol = rtrim($sqlrelcol,",");
	$insertrelcol = $db_conn->query($sqlrelcol);
	}
	

	//insert log info
	$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Edit Collection' )");

	if ($loginfo) {
		echo "<script>alert('Data successfully saved!')</script>";			
		echo "<script>window.open('page-list.php?lang=1&link=collection&mid=11&smid=21','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}
}
// END - EDIT Collection

// Start - EDIT Collection
	if(isset($_POST['btndelete'])){
		$collection_id = $_GET['id'];
		$user_id_created = $_SESSION['user_id'];
		$name_of_user = $_SESSION['name_of_user'];
		$query = "DELETE from dbcollectiondetail where id = '$collection_id'";

	$deletecollection = mysqli_query($db_conn, $query) or die(mysqli_error());

	//insert log info
	$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Delete Collection' )");

	if ($deletecollection && $loginfo) {
		echo "<script>alert('Data successfully DELETE!')</script>";			
		echo "<script>window.open('page-list.php?lang=1&link=collection&mid=11&smid=21','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}
	}
?>