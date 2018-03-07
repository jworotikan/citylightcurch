<?php
	$pageid = $_GET['pid'];
	$content=$db_conn->query("SELECT * FROM dbcontent where page_id = ".$pageid."");
	while($datacontent=$content->fetch_array()) {
echo '

	<section id="contact" style="background-image:url('.$datacontent['imgbg'].')" class="section1">
		<div class="container content-lg">
			<div class="headline-center headline-light margin-bottom-60 sec1"  >
				'.$datacontent['fulltext_en'].'
			</div>

			<div class="row contacts-in">
				<div class="col-md-6 md-margin-bottom-40">

				</div>

				<div class="col-md-6">

				</div>
			</div>
		</div>

	</section>
';
	}
?>
	<!-- End Contact Section -->