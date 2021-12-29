<?php
session_start();
include 'config.php';
echo $_GET['info'];
$sqli = mysqli_query($koneksi,"INSERT INTO `tbl_info`(`idakun`,`info`) VALUES (
	'".$_SESSION['id']."','".$_GET['info']."')");
