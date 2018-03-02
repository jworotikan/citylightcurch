<?php
if($_GET['type'] == 'edit') {
		$getdataotherlink=$db_conn->query("SELECT * FROM dbothersite where id = '$_GET[id]'");
		while($dataotherlink=$getdataotherlink->fetch_array())  {
			$name = $dataotherlink["name"];
			$alias = $dataotherlink["title_en"];
			$urls = $dataotherlink["urls_en"];
			$published = $dataotherlink["published"];
			$position = $dataotherlink['order_pos'];
		}
			$buttonsimpan = "simpaneditotherlink";

	} else {
			$name = "";
			$alias = "";
			$urls = "";
			$published = "1";
			$position = "0";
			$buttonsimpan = "simpannewotherlink";
		}
	// SAVE NEW COLLECTION TYPE
if(isset($_POST['simpannewotherlink'])){
	$getposition=$db_conn->query("SELECT max(order_pos) as lastpos FROM dbothersite");
		while($datapos=$getposition->fetch_array())  {
			$setpos=$datapos['lastpos'];
		}

	$newname = addslashes($_POST['link_name']) ;
	$newalias = addslashes($_POST['link_alias']) ;
	$newurls = addslashes($_POST['link_url']);
	$cekhttp = substr($newurls,0,4);
	if($cekhttp != "http"){
		$newlinkurls = $urlstring . $newurls;
	}else{
		$newlinkurls = $newurls;
	}
	$newpublished = addslashes($_POST['link_published']) ;
	$newposition = $setpos+1 ;
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];
	
		$inputnewuser = mysqli_query($db_conn, "INSERT INTO dbothersite (name, title_en, urls_en, title_id, urls_id, published, order_pos, created_user) values ('$newname', '$newalias', '$newlinkurls', '$newalias', '$newlinkurls','$newpublished', '$newposition', '$user_id_created')");

		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Create New Other Site Link' )");

		if ($inputnewuser && $loginfo) {
		echo "<script>alert('Data successfully SAVED!')</script>";			
		echo "<script>window.open('editor-otherlink.php?link=othersite&type=new&mid=$mid&smid=$smid','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}
		
}
// END - SAVE NEW COLLECTION TYPE

// SAVE EDIT COLLECTION TYPE

if(isset($_POST['simpaneditotherlink'])){

	$newname = addslashes($_POST['link_name']) ;
	$newalias = addslashes($_POST['link_alias']) ;
	$newurls = addslashes($_POST['link_url']);
	$cekhttp = substr($newurls,0,4);
	if($cekhttp != "http"){
		$newlinkurls = $urlstring . $newurls;
	}else{
		$newlinkurls = $newurls;
	}
	$newpublished = addslashes($_POST['link_published']) ;
	$newposition = addslashes($_POST['pos_partner']) ;
	$link_id = $_GET['id'];
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];
	
		$inputnewuser = mysqli_query($db_conn, "UPDATE dbothersite set name ='$newname', title_en = '$newalias', urls_en='$newlinkurls', title_id = '$newalias', urls_id='$newlinkurls', published = '$newpublished', order_pos = '$newposition'  where id = $link_id") or die(mysqli_error());

		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Edit Other Site Link' )") or die(mysqli_error());

		if ($inputnewuser && $loginfo) {
		echo "<script>alert('Data successfully EDIT!')</script>";			
		echo "<script>window.open('editor-otherlink.php?link=othersite&type=new&mid=$mid&smid=$smid','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}
}
// END - SAVE EDIT COLLECTION TYPE

// DELETE COLLECTION TYPE

if(isset($_POST['deleteotherlink'])){

	$coltypeid = $_GET['id'];
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];
	
		$inputnewuser = mysqli_query($db_conn, "DELETE FROM dbothersite where id = $coltypeid") or die(mysqli_error());

		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Delete Other Link' )") or die(mysqli_error());
		
		if ($inputnewuser && $loginfo) {
		echo "<script>alert('Data successfully DELETE!')</script>";			
		echo "<script>window.open('editor-otherlink.php?link=othersite&type=new&mid=$mid&smid=$smid','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}
}
// END - DELETE COLLECTION TYPE
?>