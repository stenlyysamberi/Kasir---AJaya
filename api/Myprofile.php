<?php 
include '../config/config.php';
header("Content-type:application/json");

$my  = mysqli_query($koneksi,"SELECT * FROM `akun` WHERE idAkun = '".$_POST['id']."'");
$url = "http://192.168.0.108/kasir/assets/images/akun/";

if (mysqli_num_rows($my)>0) {
	
	while ($y = mysqli_fetch_array($my)) {
		$data['error'] = "0";
		$data['pesan'] = "data found";
		$data['nama'] = $y['nama'];
		$data['username'] = $y['username'];
		$data['password'] = sha1($y['password']);
		$data['gambar'] = $url.$y['gambar'];
		$data['hp'] = $y['hp'];
		$data['levell'] = $y['levell'];
		$data['alamat'] = $y['alamat'];
		$data['create_date'] = $y['create_date'];
	}

	
}else{
	$data['error'] = "1";
	$data['pesan'] = "data not found";
}

echo json_encode($data);
mysqli_close($koneksi);