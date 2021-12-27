<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah Data Lokasi Pondok Pesantren</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
		<div class="box-body">
			<div class="form-group">
				<label for="nspp" class="col-sm-2 control-label">NSPP <span class="text-danger">*</span></label>

				<div class="col-sm-6">
					<input type="text" name="nspp" id="nspp" class="form-control" placeholder="Nomor NSPP" value="" required>
				</div>
			</div>

			<div class="form-group">
				<label for="jenis" class="col-sm-2 control-label">Jenis <span class="text-danger">*</label>

				<div class="col-sm-6">
					<select class="form-control" name="jenis">
						<option value="">--Pilih Jenis Pesantren--</option>
						<option value="salafyah">Salafyah</option>
						<option value="modern">Modern</option>
						<option value="kombinasi">Kombinasi</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Nama <span class="text-danger">*</label>

				<div class="col-sm-6">
					<input type="text" name="nama" id="name" class="form-control" placeholder="Nama Ponpes" value="" required>
				</div>
			</div>

			<div class="form-group">
				<label for="telepon" class="col-sm-2 control-label">Telepon/Hp <span class="text-danger">*</label>

				<div class="col-sm-6">
					<input type="text" name="telp" id="telepon" class="form-control" placeholder="Nomer Telepon/Hp">
				</div>
			</div>

			<div class="form-group">
				<label for="addres" class="col-sm-2 control-label">Alamat <span class="text-danger">*</label>

				<div class="col-sm-6">
					<input type="text" name="alamat" id="addres" class="form-control" placeholder="Alamat Lengkap" value="" required>
				</div>
			</div>

			<div class="form-group">
				<label for="kabupaten" class="col-sm-2 control-label">Kab/Kota <span class="text-danger">*</label>

				<div class="col-sm-6">
					<select class="form-control" name="kab" required>
						<option value="">--Pilih Kab/Kota--</option>
						<option value="Bangkalan">Kab. Bangkalan</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="kecamatan" class="col-sm-2 control-label">Kecamatan <span class="text-danger">*</label>

				<div class="col-sm-6">
					<select class="form-control" name="kec" required>
						<option value="">--Pilih Kecamatan--</option>
						<option value="Arosbaya">Kec. Arosbaya</option>
						<option value="Bangkalan">Kec. Bangkalan</option>
						<option value="Burneh">Kec. Burneh</option>
						<option value="Arosbaya">Kec. Arosbaya</option>
						<option value="Labang">Kec. Labang</option>
						<option value="Tragah">Kec. Tragah</option>
						<option value="Socah">Kec. Socah</option>
						<option value="Geger">Kec. Geger</option>
						<option value="Konang">Kec. Konang</option>
						<option value="Sepulu">Kec. Sepulu</option>
						<option value="Blega">Kec. Blega</option>
						<option value="Kwanyar">Kec. Kwanyar</option>
						<option value="Modung">Kec. Modung</option>
						<option value="Tanah Merah">Kec. Tanah Merah</option>
					</select>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label for="gambar" class="col-sm-2 control-label">Gambar <span class="text-danger">*</label>

			<div class="col-sm-6">
				<input type="file" class="form-control" name="gambar" required>
			</div>
		</div>

		<div class="form-group">
			<label for="lat" class="col-sm-2 control-label">Latitude Longtitude <span class="text-danger">*</label>

			<div class="col-sm-3">
				<input type="text" name="lat" id="lat" class="form-control" placeholder="Latitude" value="" required>
			</div>
			<div class="col-sm-3">
				<input type="text" name="lng" id="lng" class="form-control" placeholder="Longtitude" value="" required>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<div class="col-sm-6">
				<div id="googleMap" style="width:100%;height:380px;"></div>
			</div>
		</div>

</div>
<!-- /.box-body -->
<div class="box-footer">
	<input type="reset" class="btn btn-default" value="Cancel" />
	<input type="submit" name="save" class="btn btn-info pull-right" value="Simpan" />
</div>
<!-- /.box-footer -->
</form>


<?php
if (isset($_POST['save'])) {

	$nspp    	= $_POST['nspp'];
	$jenis   	= $_POST['jenis'];
	$nama    	= $_POST['nama'];
	$telepon 	= $_POST['telp'];
	$alamat  	= $_POST['alamat'];
	$kabupaten  = $_POST['kab'];
	$kecamatan  = $_POST['kec'];
	$gambar 	= $_FILES['gambar']['name'] . '_' . uniqid();
	$lat		= $_POST['lat'];
	$lng  	 	= $_POST['lng'];

	move_uploaded_file($_FILES['gambar']['tmp_name'], __DIR__ . "/../../assets/images/gambar/" . $gambar);

	$sql = $conn->query("INSERT INTO ponpes (nspp, jenis, nama, telp, alamat, kab, kec, gambar, lat, lng) VALUES('$nspp', '$jenis', '$nama', '$telepon', '$alamat', '$kabupaten', '$kecamatan', '$gambar', '$lat', '$lng')");

	if ($sql) {

?>
		<script type="text/javascript">
			alert("Data Berhasil disimpan.");
			document.location = '?page=view';
		</script>
	<?php

	} else {

	?>
		<script type="text/javascript">
			alert("Data gagal disimpan.");
			document.location = '?page=view';
		</script>
<?php

	}
}
?>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5PFwjCKMLJR-uSQ9Ijg8LLgBKteINOqE&callback=initMap" type="text/javascript"></script>
<script>
	function initMap() {
		var propertiPeta = {
			center: new google.maps.LatLng(-7.0234062, 112.7021635),
			zoom: 13,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

		// membuat Marker
		// var marker=new google.maps.Marker({
		//     position: new google.maps.LatLng(-8.5830695,116.3202515),
		//     map: peta,
		//     animation: google.maps.Animation.BOUNCE
		// });

		// even listner ketika peta diklik
		google.maps.event.addListener(peta, 'click', function(event) {
			taruhMarker(this, event.latLng);
		});

	}
	var marker;

	function taruhMarker(peta, posisiTitik) {

		if (marker) {
			// pindahkan marker
			marker.setPosition(posisiTitik);
		} else {
			// buat marker baru
			marker = new google.maps.Marker({
				position: posisiTitik,
				map: peta
			});
		}

		// isi nilai koordinat ke form
		document.getElementById("lat").value = posisiTitik.lat();
		document.getElementById("lng").value = posisiTitik.lng();
	}



	// event jendela di-load  
	google.maps.event.addDomListener(window, 'load', initMap);
</script>