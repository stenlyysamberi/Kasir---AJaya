<?php 


$nota = $_GET['nota'];

include '../config/config.php';
$sql = mysqli_query($koneksi, "SELECT tbl_barcode_barang.nama_barang,tbl_barcode_barang.img, tbl_barcode_barang.code_barcode AS ID_BARCODE,
	tbl_nota.nomor_nota,tmp_jual.id_penjualan_d,tmp_jual.jumlah_beli,tmp_jual.harga_satuan,tmp_jual.total
	FROM tbl_nota INNER JOIN tmp_jual ON tbl_nota.id_penjualan_m = tmp_jual.id_penjualan_m
	INNER JOIN tbl_barcode_barang ON tbl_barcode_barang.id_barcode = tmp_jual.id_barcode
	WHERE tbl_nota.nomor_nota = '$nota'");
//$result = array();

while ($row = mysqli_fetch_assoc($sql)) {
	$data[] = $row;
}

echo json_encode($data);