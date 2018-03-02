<?php

if (isset($_FILES['myimage']['tmp_name'])){
	$path = $path_file.'images/thumb/topic/'.$_FILES['myimage']['name'];
	move_uploaded_file($_FILES['myimage']['tmp_name'], $path)
}
?>