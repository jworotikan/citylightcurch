<?php
if($_GET['type'] == 'edit') {
		$getdataotherlink=$db_conn->query("SELECT * FROM dbpartner where id = '$_GET[id]'");
		while($dataotherlink=$getdataotherlink->fetch_array())  {
			$name = $dataotherlink["partner_name"];
			$urls = $dataotherlink["partner_urls"];
			$position = $dataotherlink["position"];
			$published = $dataotherlink["published"];
			$logo_path = $path_file.$dataotherlink['partner_logo'];
			$logo_path_view = '../'.$dataotherlink['partner_logo'];
		}
			$buttonsimpan = "simpaneditpartner";

	} else {
			$name = "";
			$alias = "";
			$urls = "";
			$published = "1";
			$position = "0";
			$logo_path = $path_file.$dataotherlink['partner_logo'];
			$logo_path_view = '../'.$dataotherlink['partner_logo'];
			$buttonsimpan = "simpannewpartner";
		}



	// SAVE NEW COLLECTION TYPE
if(isset($_POST['simpannewpartner'])){

// upload Logo
		if($_FILES['logo_upload']['error'] != 4) {
			
			$logo_file = $_FILES['logo_upload'];

			//File details
			$logo_name = $logo_file['name'];
			$logo_tmp_name = $logo_file['tmp_name'];

			$logo_extension = explode('.', $logo_name);
			$logo_extension = strtolower(end($logo_extension));
			//var_dump($ext);

			// Temp details
			$logo_key = md5(uniqid());
			$tmp_logo_name = "{$logo_key}.{$logo_extension}";
			$tmp_logo_path = "../images/partner_logo/{$logo_name}";
			//var_dump($tmp_file_path);

			//Move the file
			move_uploaded_file($logo_tmp_name, $tmp_logo_path);
			//remove tmp file
			//unlink($tmp_file_path);
		}
// END OF Upload Logo
	

	if(!empty($logo_name)){$logo_path = "images/partner_logo/$logo_name";} else {$logo_path = NULL;}
	$newpartnername = addslashes($_POST['link_name']) ;
	$newurls = addslashes($_POST['link_url']);
	$cekhttp = substr($newurls,0,4);
	if($cekhttp != "http"){
		$newpartnerurls = $urlstring . $newurls;
	}else{
		$newpartnerurls = $newurls;
	}
	$newpublished = addslashes($_POST['link_published']) ;
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];

		$part_position = $db_conn->query("SELECT * from dbpartner order by position desc limit 1");
		while($part_pos=$part_position->fetch_array())  {

			$newposition = $part_pos['position'] + 1;

		$inputnewpartner = mysqli_query($db_conn, "INSERT INTO dbpartner (partner_name, partner_logo, partner_urls, published, position, created_user) values ('$newpartnername', '$logo_path', '$newpartnerurls', '$newpublished', '$newposition', '$user_id_created')") or die(mysqli_error());

		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Create New Other Site Link' )") or die(mysqli_error());


		header('location:editor-partnerlink.php?type=new&link=partner'.$menu_id.'');
}}
// END - SAVE NEW PARTNER LINK




// SAVE EDIT PARTNER LINK

if(isset($_POST['simpaneditpartner'])){

// upload Logo
		if($_FILES['logo_upload']['error'] != 4) {
			
			$logo_file = $_FILES['logo_upload'];

			//File details
			$logo_name = $logo_file['name'];
			$logo_tmp_name = $logo_file['tmp_name'];

			$logo_extension = explode('.', $logo_name);
			$logo_extension = strtolower(end($logo_extension));
			//var_dump($ext);

			// Temp details
			$logo_key = md5(uniqid());
			$tmp_logo_name = "{$logo_key}.{$logo_extension}";
			$tmp_logo_path = "../images/thumb/topic/{$logo_name}";
			//var_dump($tmp_file_path);

			//Move the file
			move_uploaded_file($logo_tmp_name, $tmp_logo_path);
			//remove tmp file
			//unlink($tmp_file_path);
		}
// END OF Upload Logo

	if(!empty($logo_name)){
		$logo_path = "images/partner_logo/$logo_name";
		$edit_logo_path = "partner_logo = '$logo_path',";
	} else {
		$logo_path = NULL;
		$edit_logo_path = "";}
	$newpartnername = addslashes($_POST['link_name']) ;
	$newurls = addslashes($_POST['link_url']);
	$cekhttp = substr($newurls,0,4);
	if($cekhttp != "http"){
		$newpartnerurls = $urlstring . $newurls;
	}else{
		$newpartnerurls = $newurls;
	}

	$newpublished = addslashes($_POST['link_published']) ;
	$newposition = $_POST['pos_partner'];
	$link_id = $_GET['id'];
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];
	
		$inputnewuser = mysqli_query($db_conn, "UPDATE dbpartner set $edit_logo_path partner_name ='$newpartnername', partner_urls='$newpartnerurls', published = '$newpublished', position = '$newposition' where id = $link_id") or die(mysqli_error());

		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Edit Other Site Link' )") or die(mysqli_error());


		header('location:editor-partnerlink.php?type=new&link=partner'.$menu_id.'');
}
// END - SAVE EDIT PARTNER LINK

// DELETE PARTNER LINK

if(isset($_POST['deletepartner'])){

	$coltypeid = $_GET['id'];
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];
	
		$deletepartner = mysqli_query($db_conn, "DELETE from dbpartner where id = $coltypeid") or die(mysqli_error());

		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Delete Partner Link' )") or die(mysqli_error());


		header('location:editor-partnerlink.php?type=new&link=partner'.$menu_id.'');
}
// END - DELETE PARTNER LINK

?>