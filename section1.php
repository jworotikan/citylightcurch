<?php 
	$content=$db_conn->query("SELECT * FROM dbmcontent");
	while($datacontent=$content->fetch_array()) {
echo '

	<section id="contact" style="background-image:url('.$datacontent['imgbg'].')" class="section1">
		<div class="container content-lg">
			<div class="headline-center headline-light margin-bottom-60 sec1"  >
				<h2 class="Htitle">'.$datacontent['title'].'</h2>
				<p>'.$datacontent['content'].'</p>
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