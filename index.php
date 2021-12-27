<?php include "admin/config.php"; ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DITPD Potren Bangkalan</title>
	<link type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
	<link rel="stylesheet" href="admin/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

	<style>
		html,
		body {
			color: #757575;
			font-family: 'Open Sans', sans-serif;
			font-style: normal;
			font-weight: 400;
		}

		#mapid {
			height: 5px;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-success" id="navbar_hight">
		<div class="container">
			<!-- Just an image -->
			<nav class="navbar navbar-light">
				<a class="navbar-brand" href="#">
					<img src="assets/images/kemenag.png" width="60px" height="auto" alt="">
				</a>
				<div class="row">
					<div class="col-md-10 text-light">
						<h5>Sistem Informasi Geografis</h5>
					</div>
					<div class="col-md-10 text-light">
						<h5>Persebaran Pondok Pesantren Kab Bangkalan</h5>
					</div>
				</div>
			</nav>
		</div>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="navbar_hight">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Data Pondok Pesantren
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="?page=salafyah">Salafyah</a>
							<a class="dropdown-item" href="?page=modern">Modern</a>
							<a class="dropdown-item" href="?page=kombinasi">Kombinasi</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?page=profile">About Us </a>
					</li>
				</ul>
				<?php
				if (!isset($_SESSION['users'])) {
					# code...
				?>
					<a class="btn btn-outline-success my-2 my-sm-0" href="admin">Login</a>
				<?php
				} else {
				?>
					<a class="btn btn-outline-success mr-3 my-2 my-sm-0" href="admin"><?= $_SESSION['users']['username'] ?></a>
					<a class="btn btn-outline-success my-2 my-sm-0 fa fa-sign-out rounded" title="Sign Out" href="admin/logout.php"></a>
				<?php
				}
				?>
			</div>
		</div>
	</nav>
	<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

	switch ($_GET['page']) {
		case 'profile':
			include 'profile.php';
			break;
		case 'salafyah':
			include 'data/salafyah.php';
			break;
		case 'kombinasi':
			include 'data/kombinasi.php';
			break;
		case 'modern':
			include 'data/modern.php';
			break;

		default:
			include 'home.php';
			break;
	}
	?>

	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<script>
		function myMap() {
			var winH = $(window).height();
			var winW = $(window).width();
			var navbar_hight = $('#navbar_hight').height();
			var total = winH - navbar_hight - navbar_hight;
			$('#mapid').css({
				'height': total + 'px',
			});
		};
		window.onload = myMap();
		var mymap = L.map('mapid').setView([-7.0234062, 112.7021635], 10);
		var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			maxZoom: 18,
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11',
			tileSize: 512,
			zoomOffset: -1
		}).addTo(mymap);

		var marker_red = 'assets/images/marker_red.png',
			marker_blue = 'assets/images/marker_blue.png',
			marker_green = 'assets/images/marker_green.png';

		var redIcon = L.icon({
				iconUrl: marker_red,
				iconSize: [38, 38], // size of the icon
			}),
			greenIcon = L.icon({
				iconUrl: marker_green,
				iconSize: [38, 38],
			}),
			blueIcon = L.icon({
				iconUrl: marker_blue,
				iconSize: [38, 38],
			});

		var kombinasi = L.layerGroup();
		var salafyah = L.layerGroup();
		var modern = L.layerGroup();

		var overlays = {
			"<img src='assets/images/marker_red.png' width='20px'>  Modern": modern,
			"<img src='assets/images/marker_green.png' width='20px'>  Salafyah": salafyah,
			"<img src='assets/images/marker_blue.png' width='20px'>  Kombinasi": kombinasi,
		};

		mymap.addLayer(kombinasi);
		mymap.addLayer(salafyah);
		mymap.addLayer(modern);

		<?php
		$query = $conn->query("SELECT * FROM ponpes");
		while ($data = $query->fetch_assoc()) {
			# code...
		?>
			var dataPop =
				'<br><img src ="../SIGPONPES/assets/images/gambar/<?= $data['gambar'] ?>" width="80px"></br>' + '</br>' +
				'<b>NSPP</b> : <?= $data['nspp'] ?><br>' +
				'<b>Nama</b> : <?= $data['nama'] ?><br>' +
				'<b>Jenis</b> : Pesantren <?= $data['jenis'] ?><br>' +
				'<b>Telpon</b> : <?= $data['telp'] ?><br>' +
				'<b>Alamat</b> : <?= $data['alamat'] ?><br>' +
				'<b>Kecamatan</b> : <?= $data['kec'] ?><br>';

			L.marker([<?= $data['lat'] . ", " . $data['lng'] ?>], <?php if ($data['jenis'] == "kombinasi") {
																		echo "{icon: blueIcon}";
																	} elseif ($data['jenis'] == "salafyah") {
																		echo "{icon: greenIcon}";
																	} else {
																		echo "{icon: redIcon}";
																	} ?>).bindPopup(dataPop).addTo(<?= $data['jenis']; ?>);
		<?php
		}
		?>
		// L.marker([-6.988366, 110.381141], {icon: redIcon}).bindPopup('<h3>sdsd</h3>').addTo(kombinasi),
		// L.marker([-6.9940, 110.385680]).bindPopup('This is Littleton, CO.').addTo(salafiyah),
		// L.marker([-6.999867, 110.392857], {icon: redIcon}).bindPopup('This is Littleton, CO.').addTo(kombinasi);
		// L.marker([-6.9990, 110.395680]).bindPopup('This is Littleton, CO.').addTo(salafiyah),
		L.control.layers({}, overlays).addTo(mymap);

		// var marker = L.marker([-6.984277, 110.409636]).addTo(mymap);

		var popup = L.popup();

		function onMapClick(e) {
			popup
				.setLatLng(e.latlng)
				.setContent("Lokasi yang dipilih: " + e.latlng.toString())
				.openOn(mymap);
		}
		mymap.on('click', onMapClick);
	</script>

	<!--Datatables-->
	<script src="admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#example1').DataTable();
	</script>
</body>

</html>