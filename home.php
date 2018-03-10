<?php
require 'config/conndb.php';
require 'config/config.php';

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>

	<?php require 'head.php'; ?>

</head>

<body id="body" data-spy="scroll" data-target=".one-page-header" class="demo-lightbox-gallery">
	<?php
		require 'header.php';
		require 'intro.php';
		if ($_GET['pid'] == '1') {
	?>
	<div class="container">
		<div class="headline-center margin-bottom-60">
			<h2>EXPERIENCE CHURCH LIKE NEVER BEFORE</h2>
			<p>THE ROCKS is a modern christian church located in Perth’s suburb of Cannington with a message of grace for everyone. Here, we don’t judge people or assume they’ve got their lives together. You don’t even have to be a Christian to attend. We are ordinary people who acknowledge that we all in some way have messed up and in need of God’s grace. So no matter where you are in your spiritual journey, we’d love for you to join us to see what we’re about. . You won’t regret it. Dress casual and come as you are. There are no perfect people allowed here. 🙂</p>
		</div><!--/end Headline Center-->

		<!-- Service Box -->
		<div class="row text-center margin-bottom-60">
			<div class="col-sm-6 md-margin-bottom-50">
				<img alt="" src="img/maps.png" class="image-md margin-bottom-20">
				<p>WORSHIP EXPERIENCE<br>
					SUNDAY 9:00 & 11:00 AM<br>
					26 CECIL AVENUE, CANNINGTON</p>
			</div>
			<div class="col-sm-6 flat-service md-margin-bottom-50">
				<img alt="" src="img/question.png" class="image-md margin-bottom-20">
				<p>GOT QUESTIONS?<br>
					E-MAIL YOUR INQUIRY TO:<br>
					INFO@THEROCKS.CHURCH</p>
			</div>
		</div>
		<!-- End Service Box --><!--/end row-->
	</div>
	<?php } else if ($_GET['pid'] == '2') { ?>
		
	<div class="container">
		<div class="headline-center margin-bottom-60">
			<h2>JOIN US EVERY SUNDAY 9:00-10:15 A.M & 11:00 AM-12:15 PM</h2>
			<p>26 Cecil Avenue, Cannington Perth WA 6107</p>
		</div><!--/end Headline Center-->
	</div>

	<?php } ?>

	<?php
		if ($_GET['pid'] == '1' && '2') {
			require 'page_maps.php';
		}
		
		require 'section2.php';
		if ($_GET['pid'] == '2') {
			require 'contentlist.php';
		}
		if ($_GET['pid'] == '6') {
			require 'registerform.php';
		}
		require 'footer.php';
	?>

	<?php
		require 'footlink.php';
	?>

</body>
</html>