<?php
$nama=$_POST['name'];
$email=$_POST['email'];
$subjek=$_POST['subject'];
$pesan=$_POST['message'];$to="info@imanagementindonesia.com";
$header="From: $email";@mail($to, $subjek, $pesan, $header);
header('location:../page-contact.php?link=services&id=5');
?>