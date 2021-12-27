<?php
session_start();
if (isset($_SESSION['users'])) {
  # ada super admin...
  # echo "ada super admin";
	unset($_SESSION['users']);
}
//session_destroy();
echo "<script>alert('anda telah logout');</script>";
echo "<script>location='login.php';</script>";
?>