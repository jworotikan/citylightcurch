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
	?>
	
	<div class="introlayer introhome" style="background-image:url(img/home1.jpg) ">
		<div class="container">
			<h1>NO PERFECT PEOPLE ALLOWED</h1>
			<p>COME AS YOU ARE</p>
		</div>
	</div>

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
					Sunday 11:00 AM to 12:20 PM<br>
					Gd. OT - AHAVA Hall<br>
					Kav. 35-36, Rawa Buaya<br>
					Jakarta Barat - Indonesia</p>
			</div>
			<div class="col-sm-6 flat-service md-margin-bottom-50">
				<img alt="" src="img/question.png" class="image-md margin-bottom-20">
				<p>GOT QUESTIONS?<br>
					E-MAIL YOUR INQUIRY TO:<br>
					citylightchurchjakarta@gmail.com</p>
			</div>
		</div>
		<!-- End Service Box --><!--/end row-->
	</div>

	<?php
		require 'page_maps.php';
		require 'section2.php';
		require 'footer.php';
	?>
</body>
</html>