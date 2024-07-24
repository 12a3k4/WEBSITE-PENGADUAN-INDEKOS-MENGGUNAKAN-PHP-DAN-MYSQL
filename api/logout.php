<?php
session_start();

include 'koneksi.php';

unset($_SESSION['username']);
unset($_SESSION['role']);

header("location:login.php");

?>
