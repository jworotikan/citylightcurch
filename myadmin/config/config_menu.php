<?php
if (isset($_GET['tpmenu'])) {
	$menutype = $_GET['tpmenu'];
}
// Type Menu Editor

if ($_GET['link'] == 'type-menu') {
	$getmenutypelist=$db_conn->query("SELECT * from dbmmenutype");
	if($_GET['type'] == 'edit') {
		$getmenutype=$db_conn->query("SELECT * from dbmmenutype where id = '$_GET[id]'");
		while($datatypemenu=$getmenutype->fetch_array())  {
			$typemenutitle = $datatypemenu['menutype'];
			$typemenustatus = $datatypemenu['published'];
		}
		$savebutton = "saveedit";
	} else {
			$typemenutitle = "";
			$typemenustatus = "";
			$savebutton = "savenew";
	}

	if(isset($_POST['savenew'])){
		$newtypemenutitle = addslashes($_POST['typemenutitle']);
		$newtypemenustatus = addslashes($_POST['typemenustatus']);

		$inputtypemenu = mysqli_query($db_conn, "INSERT INTO dbmmenutype (menutype, published) VALUES  ('$newtypemenutitle', '$newtypemenustatus')") or die(mysqli_error());
	//insert log info
		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Create New Type Menu' )") or die(mysqli_error());

		header('location:page-menu-type.php?type=new&link=type-menu&mid=<?php echo $mid;?>&smid=<?php echo $smid?>');
	}

	if(isset($_POST['saveedit'])){
		$newtypemenutitle = addslashes($_POST['typemenutitle']);
		$newtypemenustatus = addslashes($_POST['typemenustatus']);

		$inputtypemenu = mysqli_query($db_conn, "UPDATE dbmmenutype SET menutype = '$newtypemenutitle', published = '$newtypemenustatus' where id = '$_GET[id]'") or die(mysqli_error());
	//insert log info
		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Edit Type Menu' )") or die(mysqli_error());

		header('location:page-menu-type.php?type=new&link=type-menu&mid=<?php echo $mid;?>&smid=<?php echo $smid?>');
	}

	if(isset($_POST['buttondelete'])){
	$menutype = $_GET['id'];
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];

	$inputmenu = mysqli_query($db_conn, "DELETE from dbmmenutype where id = '$_GET[id]'") or die(mysqli_error());
	//insert log info
		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Delete Menu' )") or die(mysqli_error());

		header('location:page-menu-type.php?type=new&link=type-menu&mid=<?php echo $mid;?>&smid=<?php echo $smid?>');
}
		
}


// Menu Editor

if ($_GET['link'] == 'menu-editor') {
	if($_GET['type'] == 'edit') {
			$getmenu=$db_conn->query("SELECT * FROM dbmmenu where id = '$_GET[id]'");
			while($datamenu=$getmenu->fetch_array())  {
				$titlemenu_en = $datamenu['title_en'];
				$titlemenu_id = $datamenu['title_id'];
				$menulevel = $datamenu['level'];
				$menuposition = $datamenu['m_pos'];
				$menustatus = $datamenu['published'];
				$menuurls_en = $datamenu['urls_en'];
				$menuurls_id = $datamenu['urls_id'];
				$pagelink = $datamenu['link'];
				$parentid = $datamenu['parent_id'];


			}
				$simpanmenu = "saveedit";

		} else {
				$titlemenu_en = "";
				$titlemenu_id = "";
				$menulevel = "";
				$menuposition = "0";
				$menustatus = "1";
				$menuurls_en = "";
				$menuurls_id = "";
				$pagelink = "";
				$parentid = "";
				$simpanmenu = "savenew";
	}

$tpmenu = $_GET['tpmenu'] ;
$getmenulist=$db_conn->query("SELECT id, menutype, title_en, published, parent_id,level, m_pos, CASE WHEN parent_id = 0 THEN id ELSE parent_id END AS Sort FROM dbmmenu where menutype= $tpmenu ORDER BY Sort, id");
$getparentmenu = $db_conn->query("SELECT * FROM dbmmenu where menutype = '$_GET[tpmenu]'");
$getlinkmenu = $db_conn->query("SELECT distinct(link) FROM dbmmenu where menutype = '$_GET[tpmenu]' and link != ''");


if(isset($_POST['savenew'])){
	$menutype = $_GET['tpmenu'];
	$title_en = addslashes($_POST['title_en']);
	$title_id = addslashes($_POST['title_id']);
	$parent_id = $_POST['parent_id'];
	if($_POST['parent_id'] == 0){$level = '1';} else {$level = $_POST['lvmenu']+1;}
	$pos_menu = $_POST['posmenu'];
	$statusmenu = $_POST['statusmenu'];
	$urlsmenu_en = $_POST['menu_url_en'];
	$urlsmenu_id = $_POST['menu_url_id'];
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];
	$pubperm = $_POST['statusmenu'];
	$pagelink = $_POST['page_link'];

	$inputmenu = mysqli_query($db_conn, "INSERT INTO dbmmenu (menutype, title_en, urls_en, title_id, urls_id, link, published, parent_id, level, m_pos) VALUES  ('$menutype', '$title_en', '$urlsmenu_en', '$title_id', '$urlsmenu_id', '$pagelink', '$pubperm', '$parent_id', '$level', '$pos_menu')");
	
	//insert log info
		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Create new Menu' )");
	if ($inputmenu && $loginfo) {
		echo "<script>alert('Data successfully saved!')</script>";			
		echo "<script>window.open('page-menu-list.php?lang=1&type=new&link=menu-editor&mid=$mid&smid=$smid&tpmenu=$menutype','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}
}

if(isset($_POST['saveedit'])){
	$menutype = $_GET['tpmenu'];
	$menu_edit_id = $_GET['id'];
	$title_en = addslashes($_POST['title_en']);
	$title_id = addslashes($_POST['title_id']);
	$parent_id = $_POST['parent_id'];
	if($_POST['parent_id'] == 0){$level = '1';} else {$level = $_POST['lvmenu']+1;}
	$pos_menu = $_POST['posmenu'];
	$statusmenu = $_POST['statusmenu'];
	$urlsmenu_en = $_POST['menu_url_en'];
	$urlsmenu_id = $_POST['menu_url_id'];
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];
	$pubperm = $_POST['statusmenu'];
	$pagelink = $_POST['page_link'];

	$inputmenu = mysqli_query($db_conn, "UPDATE dbmmenu set menutype = '$menutype', title_en = '$title_en', urls_en = '$urlsmenu_en', title_id = '$title_id', urls_id = '$urlsmenu_id', link = '$pagelink', published = '$pubperm', parent_id = '$parent_id', level = '$level', m_pos = '$pos_menu' where id = '$menu_edit_id'");
	//insert log info
		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Edit Menu' )");

		if ($inputmenu && $loginfo) {
		echo "<script>alert('Data successfully saved!')</script>";			
		echo "<script>window.open('page-menu-list.php?lang=1&type=new&link=menu-editor&mid=$mid&smid=$smid&tpmenu=$menutype','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}
}

if(isset($_POST['butdelmenu'])){
	$menu_edit_id = $_GET['id'];
	$user_id_created = $_SESSION['user_id'];
	$name_of_user = $_SESSION['name_of_user'];

	$inputmenu = mysqli_query($db_conn, "DELETE from dbmmenu where id = '$menu_edit_id'");
	//insert log info
		$loginfo = mysqli_query($db_conn, "INSERT INTO dbuserloginfo (user_id, name, description) values ('$user_id_created', '$name_of_user', 'Delete Menu' )");

		if ($inputmenu && $loginfo) {
		echo "<script>alert('Data successfully saved!')</script>";			
		echo "<script>window.open('page-menu-list.php?lang=1&type=new&link=menu-editor&mid=$mid&smid=$smid&tpmenu=$menutype','_self')</script>";
		}else{
			echo "Perubahan data gagal=<br/>".mysql_error();
		}
}
}
?>