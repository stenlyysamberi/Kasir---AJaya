<?php 
include '../config/config.php';
header("Content-type:application/json");

$iduser    = $_POST['id_user'];
$idBarcode = $_POST['idbarcode'];
$stokLama  = $_POST['stokLama'];
$stokBaru  = $_POST['stokBaru'];
$date      = date('Y-m-d');

$total = ($stokLama + $stokBaru);
$update = mysqli_query($koneksi,"INSERT INTO `tbl_barcode_barang_masuk`(
	`id_barcode`,`jumlah_masuk`,`tgl_masuk`,`idAkun`) 
	VALUES ('$idBarcode','$stokBaru','$date','".$iduser."')");

if ($update) {
	$data['pesan'] = 'Berhasil';
}else{
	$data['pesan'] = 'Gagal';
}

echo json_encode($data);
mysqli_close($koneksi);






