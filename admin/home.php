<style>
	#mapid {
		height: 480px;
	}
</style>
<link type="text/css" rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="">

<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Lokasi Persebaran Pesantren di Kota Bangkalan</h3>
	</div>
	<div class="col-md-12 peta leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" id="mapid"> </div>
</div>

<script type="text/javascript" src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
<script type="text/javascript">
	function myMap() {
		var winH = $(window).height();
		var winW = $(window).width();
		var navbar_hight = $('#navbar_hight').height();
		var total = winH - navbar_hight - navbar_hight;
		$('#mapid').css({
			'height': total + 'px',
		});
	};
	//window.onload = myMap();
	var mymap = L.map('mapid').setView([-7.0234062, 112.7021635], 10);
	var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

	var marker_red = '../assets/images/marker_red.png',
		marker_blue = '../assets/images/marker_blue.png',
		marker_green = '../assets/images/marker_green.png';

	var redIcon = L.icon({
			iconUrl: marker_red,
			iconSize: [35, 35], // size of the icon
		}),
		greenIcon = L.icon({
			iconUrl: marker_green,
			iconSize: [35, 35],
		}),
		blueIcon = L.icon({
			iconUrl: marker_blue,
			iconSize: [35, 35],
		});

	var kombinasi = L.layerGroup();
	var salafyah = L.layerGroup();
	var modern = L.layerGroup();

	var overlays = {
		"<img src='../assets/images/marker_red.png' width='20px'>  Modern": modern,
		"<img src='../assets/images/marker_green.png' width='20px'>  Salafyah": salafyah,
		"<img src='../assets/images/marker_blue.png' width='20px'>  Kombinasi": kombinasi,
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
			'<br><img src ="../assets/images/gambar/<?= $data['gambar'] ?>" width="80px"></br>' + '</br>' +
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