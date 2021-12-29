<?php
$today  = date('Y-m-d');
$report = mysqli_query($koneksi,"SELECT akun.nama AS nama_petugas,akun.gambar, tbl_nota.nomor_nota,tbl_nota.tanggal,tbl_nota.grand_total,tbl_nota.bayar AS TUNAI, tbl_nota.tanggal,tbl_barcode_barang.nama_barang,tbl_barcode_barang.img,tbl_penjualan_detail.jumlah_beli,tbl_penjualan_detail.harga_satuan,tbl_penjualan_detail.total FROM tbl_nota INNER JOIN tbl_penjualan_detail ON tbl_nota.id_penjualan_m = tbl_penjualan_detail.id_penjualan_m INNER JOIN tbl_barcode_barang ON tbl_barcode_barang.id_barcode = tbl_penjualan_detail.id_barcode INNER JOIN akun ON akun.idAkun = tbl_nota.idAkun WHERE tbl_nota.tanggal LIKE
	'%$today%'");


function benefit_today(){
	$today  = date('Y-m-d');
	include 'config/config.php';
	$ben = mysqli_query($koneksi,"SELECT SUM(grand_total) AS benefit_today FROM tbl_nota WHERE tanggal 
		LIKE '%$today%'");

	$arr = mysqli_fetch_array($ben);

	echo 'Rp' .number_format($total = $arr['benefit_today']);

}


function karyawaan(){
	include 'config/config.php';
	$kyw = mysqli_query($koneksi,"SELECT COUNT(nama) AS karyawan FROM akun WHERE levell = 'kasir' or levell='gudang'");
	$arr = mysqli_fetch_array($kyw);
	echo $user = $arr['karyawan'];
	//echo $user= $arr['karyawan'] . " " . 'org';
}


function penjualan_today(){
	$today  = date('Y-m-d');
	include 'config/config.php';
	$kyw = mysqli_query($koneksi,"SELECT SUM(tbl_penjualan_detail.jumlah_beli) AS banyak_terjual_today FROM tbl_nota INNER JOIN tbl_penjualan_detail ON tbl_nota.id_penjualan_m = tbl_penjualan_detail.id_penjualan_m WHERE tbl_nota.tanggal LIKE '%$today%'");
	$arr = mysqli_fetch_array($kyw);
	echo $arr['banyak_terjual_today'];
	//echo $order= $arr['banyak_terjual_today']. " " .'orders';

}

function total_barang_masuk_today(){
	include 'config/config.php';
	$today  = date('Y-m-d');
	$bm = mysqli_query($koneksi,"SELECT SUM(jumlah_masuk) AS bnyak FROM tbl_barcode_barang_masuk WHERE tgl_masuk LIKE '%$today%'");

	$arr = mysqli_fetch_array($bm);
	echo $d = $arr['bnyak'];
	
}


	
	$barangMasuk = mysqli_query($koneksi,"SELECT tbl_satuan_produk.nama_satuan,akun.nama, tbl_barcode_barang_masuk.jumlah_masuk,tbl_barcode_barang.img AS gambar_produk ,tbl_barcode_barang_masuk.tgl_masuk,tbl_barcode_barang.nama_barang FROM tbl_barcode_barang_masuk INNER JOIN tbl_barcode_barang ON tbl_barcode_barang_masuk.id_barcode = tbl_barcode_barang.id_barcode INNER JOIN tbl_satuan_produk ON tbl_satuan_produk.id_satuan = tbl_barcode_barang.id_satuan INNER JOIN akun ON akun.idAkun = tbl_barcode_barang_masuk.idAkun WHERE tbl_barcode_barang_masuk.tgl_masuk LIKE
	'%$today%'");












 ?>