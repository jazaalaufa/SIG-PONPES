<?php include "config.php"; ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mapbox</title>
  <link type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">


  <style>
    html,
    body {
      color: #757575;
      font-family: 'Open Sans', sans-serif;
      font-style: normal;
      font-weight: 400;
    }

    #mapid {
      height: 580px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-success" id="navbar_hight">
    <div class="container">
      <!-- Just an image -->
      <nav class="navbar navbar-light">
        <a class="navbar-brand" href="#">
          <img src="../assets/images/kemenag.png" width="50px" height="auto" alt="">
        </a>
        <div class="row">
          <div class="col-md-12 text-light">
            <h4>Sistem Informasi Geografis</h4>
          </div>
          <div class="col-md-12 text-light">
            <h4>Persebaran Pondok Pesantren Kota Bangkalan</h4>
          </div>
        </div>
      </nav>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar_hight">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=profile">Profile</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Informasi Pondok Pesantren
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="?page=kombinasi">Kombinasi</a>
              <a class="dropdown-item" href="?page=salafiyah">Salafiyah</a>
              <div class="dropdown-divider"></div>
            </div>
          </li>
        </ul>
        <a class="btn btn-outline-success my-2 my-sm-0" href="admin">Search</a>
      </div>
    </div>
  </nav>


  <div class="row">
    <div class="col-md-3 bg-dark">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
    <div class="col-md-9 bg-success">dfd</div>
  </div>
  <?php

  switch (isset($_GET['page'])) {
    case 'add_k':
      include 'kombinasi/kombinasi_add.php';
      break;
    case 'edit_k':
      include 'kombinasi/kombinasi_edit.php';
      break;
    case 'view_k':
      include 'kombinasi/kombinasi_view.php';
      break;
    case 'delete_k':
      include 'kombinasi/kombinasi_delete.php';
      break;

    case 'add_s':
      include 'salafiyah/salafiyah_add.php';
      break;
    case 'edit_s':
      include 'salafiyah/salafiyah_edit.php';
      break;
    case 'view_s':
      include 'salafiyah/salafiyah_view.php';
      break;
    case 'delete_s':
      include 'salafiyah/salafiyah_delete.php';
      break;

    default:
      include 'home.php';
      break;
  }
  ?>



  <script src="../assets/js/jquery-3.3.1.slim.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>

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
    window.onload = myMap();
    // Atrribut openstreetmap
    var mbAttr =
      'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';

    // URL openstreetmap
    var mbUrl =
      "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw";

    // Grayscale map
    var grayscale = L.tileLayer(mbUrl, {
      id: "mapbox/light-v9",
      tileSize: 512,
      zoomOffset: -1,
      attribution: mbAttr,
    });

    // Streets map
    var streets = L.tileLayer(mbUrl, {
      id: "mapbox/streets-v11",
      tileSize: 512,
      zoomOffset: -1,
      attribution: mbAttr,
    });

    // Layer Grup
    var kombinasi = L.layerGroup();
    var salafyah = L.layerGroup();
    var modern = L.layerGroup();

    // Maps
    var mymap = L.map("map", {
      center: [-7.0461436, 112.6296988],
      zoom: 14,
      layers: [streets, legends],
    });

    // Base Layer
    var baseLayers = {
      Grayscale: grayscale,
      Streets: streets,
    };

    // Overlay (simbol)
    var overlays = {
      Salafyah: salafyah,
      Modern: modern,
      Kombinasi: kombinasi,
    };

    // Add layer to map
    var layerControl = L.control.layers(baseLayers, overlays).addTo(map);
    var marker_red = 'assets/images/marker_red.png',
      marker_blue = 'assets/images/marker_blue.png',
      marker_green = 'assets/images/marker_green.png';

    var redIcon = L.icon({
        iconUrl: marker_red,
        iconSize: [38, 38], // size of the icon
      }),
      blueIcon = L.icon({
        iconUrl: marker_blue,
        iconSize: [38, 38],
      });


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
  <!-- <script type="text/javascript" src="assets/js/peta.js"></script> -->
</body>

</html>