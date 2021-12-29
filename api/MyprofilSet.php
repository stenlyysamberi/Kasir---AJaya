<?php 
include '../config/config.php';
header("Content-type:application/json");

if (isset($_POST['phone'])) {

	$phone = mysqli_query($koneksi,"UPDATE `akun` SET `hp`='".$_POST['phone']."' WHERE idAkun ='".$_POST['id']."'");

	if ($phone) {
		$data['pesan'] = 'Berhasil';
	}else{
		$data['pesan'] = 'Gagal';
	}
	
}else if(isset($_POST['password'])){
	$pss = mysqli_query($koneksi,"UPDATE `akun` SET `password`='".sha1($_POST['password'])."' WHERE idAkun ='".$_POST['id']."'");

	if ($pss) {
		$data['pesan'] ='Berhasil';
	}else{
		$data['pesan'] = 'Gagal';
	}

}
echo json_encode($data);
mysqli_close($koneksi);