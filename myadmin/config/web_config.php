<?php
	$getsiteconfig = $db_conn->query("SELECT * FROM dbmsiteconfig");
	while($datasiteconfig=$getsiteconfig->fetch_array())  {
		$file_path = $datasiteconfig["file_path"];
		$site_name_en = $datasiteconfig["site_name_en"];
		$site_name_id = $datasiteconfig["site_name_id"];
		$site_title_en = $datasiteconfig["title_en"];
		$site_title_id = $datasiteconfig["title_id"];
		$logo_path = $datasiteconfig["logo_path"];
		$favico_path = $datasiteconfig["favico_path"];
		$footdes_en = $datasiteconfig["foot_desc_en"];
		$footdes_id = $datasiteconfig["foot_desc_id"];
		$mtdesc_en = $datasiteconfig["mdesc_en"];
		$mtkey_en = $datasiteconfig["mkey_en"];
		$mtdesc_id = $datasiteconfig["mdesc_id"];
		$mtkey_id = $datasiteconfig["mkey_id"];
		$def_lang = $datasiteconfig["deflang"];
	}
	$getbackgroundconfig =$db_conn->query("SELECT * FROM dbsearchblock");
	while($databg=$getbackgroundconfig->fetch_array())  {
		$caption_en = $databg['fulltext_en'];
		$caption_id = $databg['fulltext_id'];
		$bg_img = $databg['img_path'];
	} 

	// SAVE WEB CONFIG
use Aws\S3\Exception\S3Exception;
if(isset($_POST['simpanconfigweb'])){

	// upload S3 Image
	require 'plugins/uploads3/start.php';
// Upload Logo


	if($_FILES['logo_upload']['error'] != 4){
	$logo_file=$_FILES['logo_upload'];

		//file details
		$logo_name = $logo_file['name'];
		$logo_tmp_name = $logo_file['tmp_name'];

		$logo_extension = explode('.', $logo_name);
		$logo_extension = strtolower (end($logo_extension));
		
		//tmp details
		$key = md5(uniqid());
		$tmp_logo_name = "{$key}.{$logo_extension}";
		$tmp_logo_path = "tmp/{$tmp_logo_name}";
		// move the file

		move_uploaded_file($logo_tmp_name, $tmp_logo_path);

		try {

			$s3->putObject([
				'Bucket' => $config['s3']['bucket'],
				'Key' => "images/{$logo_name}",
				'Body' => fopen($tmp_logo_path, 'rb'),
				'ACL' => 'public-read'
				]);


			unlink($tmp_logo_path);


		} catch(S3Exception $e) {
			die ("the was an error");
		}
}
// End Upload Logo

// Upload favicon

	if($_FILES['favico_upload']['error'] != 4){
	$favico_file=$_FILES['favico_upload'];

		//file details
		$favico_name = $favico_file['name'];
		$favico_tmp_name = $favico_file['tmp_name'];


		$favico_extension = explode('.', $favico_name);
		$favico_extension = strtolower (end($favico_extension));
		
		//tmp details
		$key = md5(uniqid());
		$tmp_favico_name = "{$key}.{$favico_extension}";
		$tmp_favico_path = "tmp/{$tmp_favico_name}";
		// move the file

		move_uploaded_file($favico_tmp_name, $tmp_favico_path);

		try {

			$s3->putObject([
				'Bucket' => $config['s3']['bucket'],
				'Key' => "images/ico/{$favico_name}",
				'Body' => fopen($tmp_favico_path, 'rb'),
				'ACL' => 'public-read'
				]);

			unlink($tmp_favico_path);


		} catch(S3Exception $e) {
			die ("the was an error");
		}
}
// End Upload favicon

// Upload background

	if($_FILES['bg_upload']['error'] != 4){
	$bg_file=$_FILES['bg_upload'];

		//file details
		$bg_name = $bg_file['name'];
		$bg_tmp_name = $bg_file['tmp_name'];


		$bg_extension = explode('.', $bg_name);
		$bg_extension = strtolower (end($bg_extension));
		
		//tmp details
		$key = md5(uniqid());
		$tmp_bg_name = "{$key}.{$bg_extension}";
		$tmp_bg_path = "tmp/{$tmp_bg_name}";
		// move the file

		move_uploaded_file($bg_tmp_name, $tmp_bg_path);

		try {

			$s3->putObject([
				'Bucket' => $config['s3']['bucket'],
				'Key' => "images/background/{$bg_name}",
				'Body' => fopen($tmp_bg_path, 'rb'),
				'ACL' => 'public-read'
				]);

			unlink($tmp_bg_path);


		} catch(S3Exception $e) {
			die ("the was an error");
		}
}
// End Upload background

// end of S3 function
	if(!empty($logo_name)){$newlogo_path = "images/$logo_name";} else {$newlogo_path = $logo_path;}
	if(!empty($favico_name)){$newfavico_path = "images/ico/$favico_name";} else {$newfavico_path = $favico_path;}
	if(!empty($bg_name)){$newbg_path = "images/background/$bg_name";} else {$newbg_path = $bg_img;}
	$pathfile = addslashes($_POST['pathfile']) ;
	$sitename_en = addslashes($_POST['sitename_en']) ;
	$sitetitle_en = addslashes($_POST['sitetitle_en']);
	$sitename_id = addslashes($_POST['sitename_id']) ;
	$sitetitle_id = addslashes($_POST['sitetitle_id']);
	$foot_desc_en = addslashes($_POST['footdes_en']);
	$foot_desc_id = addslashes($_POST['footdes_id']);
	$sitemetadesc_en = addslashes($_POST['sitemetadesc_en']);
	$sitemetadesc_id = addslashes($_POST['sitemetadesc_id']);
	$sitemetakey_en = addslashes($_POST['sitemetakey_en']);
	$sitemetakey_id = addslashes($_POST['sitemetakey_id']);
	$caption_bg_en = addslashes($_POST['caption_en']);
	$caption_bg_id = addslashes($_POST['caption_id']);
	$def_lang_option = $_POST['def_lang_option'];
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];


		$updatewebconfig = mysqli_query($db_conn, "UPDATE dbmsiteconfig set site_name_en = '$sitename_en', title_en = '$sitetitle_en', site_name_id = '$sitename_id', title_id = '$sitetitle_id', mdesc_en = '$sitemetadesc_en', mdesc_id = '$sitemetadesc_id', foot_desc_en = '$foot_desc_en', foot_desc_id = '$foot_desc_id', mkey_en = '$sitemetakey_en', mkey_id = '$sitemetakey_id', user_update = '$user_id_created', logo_path = '$newlogo_path', favico_path = '$newfavico_path', file_path = '$pathfile', deflang = '$def_lang_option' where id = '1'") or die(mysqli_error());

		$updatebg = mysqli_query($db_conn, "UPDATE dbsearchblock set fulltext_en = '$caption_bg_en', fulltext_id = '$caption_bg_id', img_path = '$newbg_path' where id = '1'") or die(mysqli_error());

		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Update Site Config' )") or die(mysqli_error());


		header('location:page_webconfig.php?type=edit&link=site-config&mid=2&smid=3');
}
// END - SAVE WEB CONFIG
?>