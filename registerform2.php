
<div class="container">
  <div class="content-wrapper">
		<div class="col-md-6">
			<form action="#" id="sky-form1" class="sky-form">
				<fieldset>
					<section>
						<label class="label">Nama Lengkap</label>
						<label class="input">
							<input type="text" name="fullname" id="fullname">
						</label>
					</section>

					<label class="label">Tempat, Tanggal Lahir</label>
					<div class="row">
						<section class="col col-6">
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="bornplace" id="bornplace">
							</label>
						</section>
						<section class="col col-6">
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="borndate" id="borndate">
							</label>
						</section>
					</div>
					<label class="label">Nama Anak, Usia</label>
					<div class="row">
						<section class="col col-6">
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="childname[]" id="childname">
							</label>
						</section>
						<section class="col col-4">
							<label class="input">
								<input type="text" name="childage[]" id="childage">
							</label>
						</section>
						<section class="col col-2">
							<button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i></button>
						</section>
					</div>

					<section>
						<label class="label">Alamat</label>
						<label class="input">
							<textarea id="editor1" name="address" rows="3" cols="40"></textarea>
						</label>
					</section>

					<section>
						<label class="label">No Hp 1</label>
						<label class="input">
							<i class="icon-append fa fa-calendar"></i>
							<input type="text" name="phone1" id="phone1">
						</label>
					</section>

					<section>
						<label class="label">No Hp 2</label>
						<label class="input">
							<i class="icon-append fa fa-calendar"></i>
							<input type="text" name="phone2" id="phone2">
						</label>
					</section>

					<section>
						<label class="label">Email</label>
						<label class="input">
							<i class="icon-append fa fa-calendar"></i>
							<input type="text" name="email" id="email">
						</label>
					</section>
					<hr>
		            <div class="row">
		              <div class="col-sm-12">
		                <label for="inputfullname" class="control-label">Bagaimana Anda Mengenal CLC?</label>
		              </div>
		              <div class="col-sm-4">
		                <label class="checkbox formcheck"><input type="checkbox" name="checkbox"><i></i>Majalah</label>
		                <label class="checkbox formcheck"><input type="checkbox" name="checkbox"><i></i>Koran</label>
		                <label class="checkbox formcheck"><input type="checkbox" name="checkbox"><i></i>Flyer</label>
		              </div>
		              <div class="col-sm-4">
		                <label class="checkbox formcheck"><input type="checkbox" name="checkbox"><i></i>Invitation</label>
		                <label class="checkbox formcheck"><input type="checkbox" name="checkbox"><i></i>Website</label>
		                <label class="checkbox formcheck"><input type="checkbox" name="checkbox"><i></i>Facebook</label>
		              </div>
		              <div class="col-sm-4">
		                <label class="checkbox formcheck"><input type="checkbox" name="checkbox"><i></i>Twitter</label>
		                <label class="checkbox formcheck"><input type="checkbox" name="checkbox"><i></i>E-Mail</label>
		                <label class="checkbox formcheck"><input type="checkbox" name="checkbox"><i></i>Teman</label>
		              </div>  
		            </div>
		            <hr>
			        <div class="row">
			          <div class="col-sm-12">
			            <label for="inputfullname" class="control-label">Harap beri tanda tick di box yang sesuai (bisa lebih dari satu)</label>
			          </div>
			          <div class="col-sm-12">
			            <label class="checkbox formcheck"><input type="checkbox" name="checkbox"><i></i>Saya mau tahu lebih lagi tentang CITY LIGHT CHURCH </label>
			            <label class="checkbox formcheck"><input type="checkbox" name="checkbox"><i></i>Saya ingin tahu bagaimana menjadi orang Kristen / Dibaptis</label>
			            <label class="checkbox formcheck"><input type="checkbox" name="checkbox"><i></i>Saya mau melayani di CITY LIGHT CHURCH</label>
			          </div>
			          <div class="col-sm-12">
			            <label class="checkbox formcheck"><input type="checkbox" name="checkbox"><i></i>Saya mengambil keputusan penting hari ini :</label>
			          </div>
			          <div class="col-sm-12">
			            <input type="text" class="form-control" name="fullname" id="inputfullname" value="">
			          </div>
			          <div class="col-sm-12">
			            <label class="checkbox formcheck"><input type="checkbox" name="checkbox"><i></i>Yang Lain:</label>
			          </div>
			          <div class="col-sm-12">
			            <input type="text" class="form-control" name="fullname" id="inputfullname" value="">
			          </div>  
			        </div>

			        <div class="row">
			          <div class="col-sm-12">
			             <label for="inputfullname" class="control-label">Kami sangat menghargai masukan Anda. Harap beritahu kami bagaimana pengalaman anda hari ini di gereja kami atau kalau ada yang bisa kami doakan :</label>
			          </div>
			          <div class="col-md-12">
			            <textarea id="editor1" name="mkey_en" rows="3" cols="40" placeholder=""></textarea>
			          </div>

			        </div>
			        <footer>
						<button type="submit" class="btn-u">Submit</button>
					</footer>
				</fieldset>
			</form>
		</div>
	</div>
</div>