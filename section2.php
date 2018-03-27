<?php
	$pageid = $_GET['pid'];
	$content=$db_conn->query("SELECT * FROM dbcontent where page_id = ".$pageid."");
	while($datacontent=$content->fetch_array()) {
?>

<!--=== Parallax Backgound ===-->
<div class="section-bg fullsection" style="background-image:url(<?php echo $datacontent['imgbg']?>)">
	<div class="container">
		<div class="col-md-2"></div>
		<div class="col-md-8 clsection">
				<?php echo $datacontent['fulltext_en']?><br><br>
		</div><!--/Headline Center V2-->
		<div class="col-md-2"></div>
	</div><!--/container-->
</div>
<!--=== End Parallax Backgound ===-->



<?php
	}
?>