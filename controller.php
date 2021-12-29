<?php

if (isset($_GET['Home'])) {
	include 'view/home.php';
}elseif (isset($_GET['user'])) {
	include 'owner/addUser/index.php';
}elseif (isset($_GET['jenis'])) {
	include 'jenis/index.php';
}elseif(isset($_GET['category'])){
	include 'category/index.php';
}elseif(isset($_GET['gudang'])){
	include 'gudang/index.php';
}elseif (isset($_GET['add-stok'])) {
	// code...
	include 'gudang/List-stok.php';
}elseif (isset($_GET['detil-produk'])) {
	// code...
	include 'owner/setProduct/index.php';
}elseif (isset($_GET['aproval'])) {
	include 'owner/aproval/index.php';
}elseif(isset($_GET['set-produk'])){
	include 'owner/setProduct/setProduk.php';
}elseif (isset($_GET['bayar'])) {
	include 'kasir/index.php';
}else if(isset($_GET['order'])){
	include 'kasir/transaksi.php';
}else if(isset($_GET['cetak'])){
	include 'kasir/transaski_cetak.php';
}else if (isset($_GET['laporan'])) {
	// code...
	include 'owner/report/index.php';
}else if(isset($_GET['new-satuan'])){
	include 'owner/satuan/index.php';
}else if(isset($_GET['view-produk'])){
	include 'kasir/lihat-produk/index.php';
}else if(isset ($_GET['barang-masuk'])){
	include 'owner/barang_masuk/index.php';
}else{
	echo "<h2>Page Not Found! 404</h2>";
}

?>
