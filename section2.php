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



<!--=== Contact Us ===-->
<?php
	}
	if ($_GET['pid'] == '8') {
		
?>
<dir class="container contact-session">
	<div class="col-md-4">
		<h1>OUR WORSHIP EXPERIENCE</h1>
		<p>Sunday 9 AM & 11 AM<br>
		26 Cecil Avenue<br>
		Cannington WA 6107</p>
	</div>
	<div class="col-md-4">
		<h1>OFFICE</h1>
		<p>26 Cecil Avenue<br>
		Cannington – WA 6107<br>
		<br>
		Phone : 08 6114 7988<br>
		Monday – Thursday 10am – 5pm</p>
	</div>
	<div class="col-md-4">
		<h1>CONTACT US</h1>
		<p>PO BOX 464 Cannington WA 6987<br>
		ABN: 34 460 390 758<br>
		info@therocks.church</p>
	</div>
</dir>
<hr>
<dir class="container contact-session">
	<section class="content">
        <form class="form-horizontal sky-form" role="form" method="post" action="" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
        	<div class="col-md-12">
		<h1>WRITE TO US</h1>
	</div>
	<div class="col-md-4">
		<h1>Name*</h1>
	</div>
	<div class="col-md-4">
		<h1>Email*</h1>
	</div>
	<div class="col-md-4">
		<h1>Contact Number*</h1>
	</div>
        </form>
    </section>
	
</dir>

<?php
	}
?>