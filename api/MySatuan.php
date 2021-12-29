<?php 
include '../config/config.php';
header("Content-type:application/json");
$response = array();


$sql = mysqli_query($koneksi,"SELECT `id_satuan`,`nama_satuan` FROM `tbl_satuan_produk` ORDER BY id_satuan DESC");

$url = "http://192.168.42.18/kasir/assets/images/products/";

if(mysqli_num_rows($sql)>0){
	while ($row = mysqli_fetch_array($sql)) {
		$response[] = array(
			'pesan'		   => "true",
			'alert' => 'true',
			'id_satuan'   => $row['id_satuan'],
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