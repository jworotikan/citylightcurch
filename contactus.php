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
	<!--=== Search Block ===-->
		<div class="search-block parallaxBg" style="background: url(img/intro-contact-us.jpg) 50% 0px / 106% no-repeat fixed;">
			<div class="container">
				<div class="col-md-6 col-md-offset-3 contactus">
					<h1>WE’D LOVE TO HEAR FROM YOU</h1>
					<p>citylightchurchjakarta@gmail.com</p>

					<div class="input-group">
					</div>
				</div>
			</div>
		</div>
		<!--=== End Search Block ===-->

		<dir class="container contact-session">
	<div class="col-md-4">
		<h1>OUR WORSHIP EXPERIENCE</h1>
		<p>Sunday 11:00 AM to 12:20 PM<br>
		Gd. OT - AHAVA Hall<br>
		Kav. 35-36, Rawa Buaya<br>
		Jakarta Barat - Indonesia</p>
	</div>
	<div class="col-md-4">
		<h1>OFFICE</h1>
		<p>Gd. OT - AHAVA Hall<br>
		Kav. 35-36, Rawa Buaya<br>
		Jakarta Barat - Indonesia</p>
		<br>
		Phone : <br></p>
	</div>
	<div class="col-md-4">
		<h1>CONTACT US</h1>
		<p>citylightchurchjakarta@gmail.com</p>
	</div>
</dir>
<hr>
<div class="container contact-session">
	<form action="config/send_mail.php" method="post" id="sky-form3" class="sky-form">
		<header>Contacts Us</header>
		<fieldset>
			<div class="row">
				<section class="col col-4">
					<label class="label">Name</label>
					<label class="input">
						<i class="icon-append fa fa-user"></i>
						<input type="text" name="name" id="name">
					</label>
				</section>
				<section class="col col-4">
					<label class="label">E-mail</label>
					<label class="input">
						<i class="icon-append fa fa-envelope-o"></i>
						<input type="email" name="email2" id="email2">
					</label>
				</section>
				<section class="col col-4">
					<label class="label">Contact Number</label>
					<label class="input">
						<i class="icon-append fa fa-phone"></i>
						<input type="email" name="email2" id="email2">
					</label>
				</section>
			</div>

			<section>
				<label class="label">Subject</label>
				<label class="input">
					<i class="icon-append fa fa-tag"></i>
					<input type="text" name="subject" id="subject">
				</label>
			</section>

			<section>
				<label class="label">Message</label>
				<label class="textarea">
					<i class="icon-append fa fa-comment"></i>
					<textarea rows="4" name="message" id="message"></textarea>
				</label>
			</section>

			<section>
				<label class="checkbox"><input type="checkbox" name="copy"><i></i>Send a copy to my e-mail address</label>
			</section>
		</fieldset>
		<footer>
			<button type="submit" class="button">Send message</button>
		</footer>
	</form>
</div>
</body>
</html>