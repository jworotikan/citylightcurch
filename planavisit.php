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
	?>
	<div class="container">
		<div class="headline-center margin-bottom-60">
			<h2>JOIN US EVERY SUNDAY 9:00-10:15 A.M & 11:00 AM-12:15 PM</h2>
			<p>26 Cecil Avenue, Cannington Perth WA 6107</p>
		</div><!--/end Headline Center-->
	</div>
	<?php
		require 'page_maps.php';
		require 'contentlist.php';
		require 'footer.php';
		require 'footlink.php';
	?>
</body>
</html>