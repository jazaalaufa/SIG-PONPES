<?php
include 'config.php';
$id = $_GET['nspp'];
$conn->query("DELETE FROM ponpes WHERE nspp='$id'");
echo "<script>alert('Data Berhasil terhapus');</script>";
echo "<script>location='?page=view';</script>";
?>