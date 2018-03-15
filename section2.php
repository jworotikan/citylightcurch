<?php
	$pageid = $_GET['pid'];
	$content=$db_conn->query("SELECT * FROM dbcontent where page_id = ".$pageid."");
	while($datacontent=$content->fetch_array()) {
?>

<!--=== Parallax Backgound ===-->
<div class="section-bg" style="background-image:url(<?php echo $datacontent['imgbg']?>)">
	<div class="container">
		<div class="margin-bottom-10">
				<?php echo $datacontent['fulltext_en']?><br><br>
			
		</div><!--/Headline Center V2-->
	</div><!--/container-->
</div>
<!--=== End Parallax Backgound ===-->

<?php
	}
	if ($_GET['pid'] == '8') {
		
?>
<dir class="container contact-session">
	<div class="col-md-4">
		<h1>OUR WORSHIP EXPERIENCE</h1>
	</div>
	<div class="col-md-4">
		<h1>OUR WORSHIP EXPERIENCE</h1>
	</div>
	<div class="col-md-4">
		<h1>OUR WORSHIP EXPERIENCE</h1>
	</div>
</dir>

<?php
	}
?>