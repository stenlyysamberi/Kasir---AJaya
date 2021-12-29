<?php 
include '../config/config.php';
header("Content-type:application/json");
$response = array();


$sql = mysqli_query($koneksi,"SELECT tbl_barcode_barang.*,tbl_satuan_produk.nama_satuan FROM tbl_barcode_barang INNER JOIN tbl_satuan_produk ON tbl_barcode_barang.id_satuan = tbl_satuan_produk.id_satuan ORDER BY tbl_barcode_barang.id_barcode DESC");

$url = "http://192.168.42.197/kasir/assets/images/products/";

if(mysqli_num_rows($sql)>0){
	while ($row = mysqli_fetch_array($sql)) {
		$response[] = array(
			'pesan'		   => "true",
			'alert' => 'true',
			'id_barcode'   => $row['id_barcode'],
			'code_barcode' => $row['code_barcode'],
			'nama_barang'  => $row['nama_barang'],
			'img'		   => $url.$row['img'],
			'stok'		   => $row['qty'],
			'ket_join'     => $row['join_ket'],
			'nama_satuan'  => $row['nama_satuan']
		);
	}
}else{
	$response[] = array(
		'pesan' => "false",
		'alert' => 'false'
	);
}



echo json_encode($response);
mysqli_close($koneksi);