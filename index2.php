<?php

require 'config/conndb.php';
require 'config/config.php';


if(!isset($_GET['lang']))
{
	header("Location: index.php?lang=$def_site_lang&link=home&pid=1");
}

//$gethome = $db_conn->query("SELECT * FROM dbmmenu where id='$_GET[id]'"); ????

?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>

	
	<?php require 'head.php'; ?>

</head>

<body class="header-fixed">
	<div class="wrapper">
		
		<!--=== Header v3 ===-->
		<?php require 'navbar.php'; ?>
		<!--=== End Header v3 ===-->

		<!--=== Search Block ===-->
		<?php require 'search-block.php'; ?>
		<!--=== End Search Block ===-->

		<!--=== Container Part ===-->
		<?php
  			while($homeedutopic=$gethomeedutopic->fetch_array()):
		?>
		<div class="container content-xs">
			<div class="headline text-center margin-bottom-50">
					<h2 class="title-center"><?php if (isset($headingtitle)) {echo $homeedutopic[$headingtitle];}?></h2><p></p>
					<?php if (isset($fulltext)) {echo $homeedutopic[$fulltext];}?>
				</div>
		<?php endwhile;?>
			<?php

			$i = 0;
			$color = array("red", "blue", "purple", "aqua", "yellow");
			$getdata = $db_conn->query("SELECT * FROM dbcattopic where type_id='1' and published ='1' and position_lp = '1' ORDER BY id ASC");

			while($tampil=$getdata->fetch_array()):
	
				if ($i % 4 == 0) echo "<ul class='row block-grid-v2'>";
				//print_r($tampil);die;
			?>

				<li class="col-md-3 col-sm-6 md-margin-bottom-30">
					<div class="easy-block-v1">
						<a href="topic.php?lang=<?php if(isset($_GET['lang'])) {echo $_GET['lang'];} ?>&link=topic&id=<?php echo $tampil['id'];?>">
							<img class="img-responsive" src="<?php echo $path_file . $tampil['tmb']; ?>">
						</a>
						<div class="easy-block-v1-badge bottom rgba-<?php echo $color[$i]; ?>"><?php if (isset($headingtitle)) {echo $tampil[$headingtitle];} ?></div>
					</div>
					<div class="block-grid-v2-info rounded-bottom">
					</div>
				</li>

			<?php

				$i++;
				if ($i % 4 == 0) 
				{
					echo "</ul><br />";
					$i = 0;
				}

			endwhile;

			?>

		</div><!--/container-->
		<!--=== Container Part ===-->


		<!--=== Featured Collections ===-->
		<?php require 'featured-collection.php'; ?>
		<!--=== End Featured Collections ===-->
		

		<!--=== Partners ===-->
		<?php require 'partner.php'; ?>
		<!--=== End Partners ===-->

		<!--=== Footer ===-->
		<?php require 'footer.php'; ?>
		<!--=== End ===-->

	</div><!--/End Wrapepr-->

	<!--=== Java Script ===-->
	<?php require 'javascript.php'; ?>

	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			App.initCounter();
			App.initParallaxBg();
			OwlCarousel.initOwlCarousel();
			StyleSwitcher.initStyleSwitcher();
		});
	</script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
</body>
</html>