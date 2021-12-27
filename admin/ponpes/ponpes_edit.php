<?php
$nspp = $_GET['nspp'];
$query = $conn->query("SELECT * FROM ponpes WHERE nspp = '$nspp'");
$data = $query->fetch_assoc();
?>

<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Data Lokasi Pondok Pesantren</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
		<div class="box-body">
			<div class="form-group">
				<label for="nspp" class="col-sm-2 control-label">NSPP <span class="text-danger">*</label>

				<div class="col-sm-6">
					<input type="text" name="nspp" class="form-control" value="<?= $data['nspp'] ?>" required="">
				</div>
			</div>
			<div class="form-group">
				<label for="jenis" class="col-sm-2 control-label">Jenis <span class="text-danger">*</label>

				<div class="col-sm-6">
					<select class="form-control" name="jenis">
						<option value="">--Pilih Jenis Ponpes--</option>
						<option value="salafyah" <?= ($data['jenis'] == 'salafyah') ? 'selected' : '' ?>>Salafyah</option>
						<option value="modern" <?= ($data['jenis'] == 'modern') ? 'selected' : '' ?>>Modern</option>
						<option value="kombinasi" <?= ($data['jenis'] == 'kombinasi') ? 'selected' : '' ?>>Kombinasi</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="nama" class="col-sm-2 control-label">Nama </label>

				<div class="col-sm-6">
					<input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required="">
				</div>
			</div>

			<div class="form-group">
				<label for="telepon" class="col-sm-2 control-label">Telepon/Hp <span class="text-danger">*</label>

				<div class="col-sm-6">
					<input type="text" name="telp" id="telepon" class="form-control" value="<?= $data['telp'] ?>">
				</div>
			</div>

			<div class="form-group">
				<label for="addres" class="col-sm-2 control-label">Alamat <span class="text-danger">*</label>

				<div class="col-sm-6">
					<input type="text" name="alamat" id="addres" class="form-control" value="<?= $data['alamat'] ?>">
				</div>
			</div>

			<div class="form-group">
				<label for="kabupaten" class="col-sm-2 control-label">Kab/Kota <span class="text-danger">*</label>

				<div class="col-sm-6">
					<select class="form-control" name="kab">
						<option value="">--Pilih Kab/Kota--</option>
						<option value="Bangkalan" <?= ($data['kab'] == 'Bangkalan') ? 'selected' : '' ?>>Kab. Bangkalan</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="kecamatan" class="col-sm-2 control-label">Kecamatan <span class="text-danger">*</label>

				<div class="col-sm-6">
					<select class="form-control" name="kec">
						<option value="">--Pilih Kecamatan--</option>
						<option value="Arosbaya" <?= ($data['kec'] == 'Arosbaya') ? 'selected' : '' ?>>Kec. Arosbaya</option>
						<option value="Bangkalan" <?= ($data['kec'] == 'Bangkalan') ? 'selected' : '' ?>>Kec. Bangkalan</option>
						<option value="Arosbaya" <?= ($data['kec'] == 'Arosbaya') ? 'Arosbaya'   : '' ?>>Kec. Arosbaya</option>
						<option value="Burneh" <?= ($data['kec'] == 'Burneh') ? 'selected'   : '' ?>>Kec. Burneh</option>
						<option value="Labang" <?= ($data['kec'] == 'Labang') ? 'selected'   : '' ?>>Kec. Labang</option>
						<option value="Tragah" <?= ($data['kec'] == 'Tragah') ? 'selected'   : '' ?>>Kec. Tragah</option>
						<option value="Socah" <?= ($data['kec'] == 'Socah') ? 'selected'   : '' ?>>Kec. Socah</option>
						<option value="Geger" <?= ($data['kec'] == 'Geger') ? 'selected'   : '' ?>>Kec. Geger</option>
						<option value="Konang" <?= ($data['kec'] == 'Konang') ? 'selected'   : '' ?>>Kec. Konang</option>
						<option value="Sepulu" <?= ($data['kec'] == 'Sepulu') ? 'selected'   : '' ?>>Kec. Sepulu</option>
						<option value="Blega" <?= ($data['kec'] == 'Blega') ? 'selected'   : '' ?>>Kec. Blega</option>
						<option value="Kwanyar" <?= ($data['kec'] == 'Kwanyar') ? 'selected'   : '' ?>>Kec. Kwanyar</option>
						<option value="Modung" <?= ($data['kec'] == 'Modung') ? 'selected'   : '' ?>>Kec. Modung</option>
						<option value="Tanah Merah" <?= ($data['kec'] == 'Tanah Merah') ? 'selected'   : '' ?>>Kec. Tanah Merah</option>

					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="gambar" class="col-sm-2 control-label">Gambar <span class="text-danger">*</label>

				<div class="col-sm-6">
					<img src="../assets/images/gambar/<?= $data['gambar'] ?>" width="100px" height="100px">
					<br><br>
					<input type="file" name="gambar" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="lokasi" class="col-sm-2 control-label">Latitude Longtitude</label>

				<div class="col-sm-3">
					<input type="text" name="lat" id="lat" class="form-control" value="<?= $data['lat'] ?>" required="">
				</div>
				<div class="col-sm-3">
					<input type="text" name="lng" id="lng" class="form-control" value="<?= $data['lng'] ?>" required="">
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

		if (strlen($_FILES['gambar']['name']) != 0) {
			// Berisi
			$sql = $conn->query("UPDATE ponpes SET 
			nspp 	= '$nspp',
			jenis	= '$jenis',
			nama	= '$nama',
			telp	= '$telepon',
			alamat	= '$alamat',
			kec		= '$kecamatan',
			kab		= '$kabupaten',
			gambar 	= '$gambar',
			lat 	= '$lat',
			lng 	= '$lng' WHERE nspp = '$nspp' ");

			move_uploaded_file($_FILES['gambar']['tmp_name'], __DIR__ . "/../../assets/images/gambar/" . $gambar);
		} else {
			// Tidak Berisi
			$sql = $conn->query("UPDATE ponpes SET 
			nspp 	= '$nspp',
			jenis	= '$jenis',
			nama	= '$nama',
			telp	= '$telepon',
			alamat	= '$alamat',
			kec		= '$kecamatan',
			kab		= '$kabupaten',
			lat 	= '$lat',
			lng 	= '$lng' WHERE nspp = '$nspp' ");
		}

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
	var lat = document.getElementById('lat').value;
	var lng = document.getElementById('lng').value;

	function initMap() {
		var propertiPeta = {
			center: new google.maps.LatLng(-6.990618951127306, 110.42310721409126),
			zoom: 13,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

		// membuat Marker
		// var marker=new google.maps.Marker({
		//     position: new google.maps.LatLng(lat,lng),
		//     map: peta
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
		console.log("Posisi marker: " + posisiTitik);
		document.getElementById("lat").value = posisiTitik.lat();
		document.getElementById("lng").value = posisiTitik.lng();
	}



	// event jendela di-load  
	google.maps.event.addDomListener(window, 'load', initMap);
</script>