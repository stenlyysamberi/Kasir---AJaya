<?php 
include '../config/config.php';
header("Content-type:application/json");
$response = array();

$id = $_POST['id'];
//$id = 17;



$sql = mysqli_query($koneksi,"SELECT tbl_barang.harga, tbl_barcode_barang.*,tbl_satuan_produk.nama_satuan FROM tbl_barcode_barang INNER JOIN tbl_satuan_produk ON tbl_barcode_barang.id_satuan = tbl_satuan_produk.id_satuan INNER JOIN tbl_barang ON tbl_barang.id_barcode = tbl_barcode_barang.id_barcode WHERE tbl_barcode_barang.id_barcode = $id ORDER BY tbl_barcode_barang.id_barcode DESC");

$url = "http://192.168.42.203/kasir/assets/images/products/";

if(mysqli_num_rows($sql)>0){
	while ($row = mysqli_fetch_array($sql)) {
		
			$data['pesan']		   = "true";
			$data['alert'] = 'true';
			$data['id_barcode']   = $row['id_barcode'];
			$data['code_barcode'] = $row['code_barcode'];
			$data['nama_barang']  = $row['nama_barang'];
			$data['img']		   = $url.$row['img'];
			$data['stok']		   = $row['qty'];
			$data['ket_join']     = $row['join_ket'];
			$data['nama_satuan']  = $row['nama_satuan'];
			$data['harga']  = "Rp.".number_format($row['harga']);
		}
	
}else{
	
		$data['pesan'] = "false";
		$data['alert'] = 'false';
	
}



echo json_encode($data);
mysqli_close($koneksi);