<?php

	function uploadfoto($namafile, $lokasisimpan, $filepathname){
	//upload to local:
	$file = $_FILES[$namafile];

	//File details
	$name = $file['name'];
	$tmp_name = $file['tmp_name'];

	$ext = explode('.', $name);
	$ext = strtolower(end($ext));
	//var_dump($ext);

	// Temp details
	$key = md5(uniqid());
	$tmp_file_name = "{$key}.{$ext}";
	$tmp_file_path = $lokasisimpan."{$tmp_file_name}";
	//var_dump($tmp_file_path);

	//Move the file
	move_uploaded_file($tmp_name, $tmp_file_path);
	//remove tmp file
	//unlink($tmp_file_path);

	$filepathname = $name;
	}

?>