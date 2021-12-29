<?php 
include '../config/config.php';
header("Content-type:application/json");

function acak($panjang){
  $karakter = 'ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
  $string   = '';
  for ($i=0; $i < 5 ; $i++) { 
      # code...
      $pos = rand(0, strlen($karakter)-1);
      $string .= $karakter{$pos};
  }
  return $string;
}

$text   = "A-Jaya";
$id     = $_POST['id'];
$barcode   = $_POST['barcode'];
$foto   = $_POST['foto'];
$nama   = $_POST['nama'];
$satuan = (explode('.', $_POST['satuan']));

$dinamik= acak(5);
$nama_foto =$dinamik."$text.jpg";
$lokasi= "../assets/images/products/$nama_foto";

$cek = mysqli_query($koneksi,"SELECT * FROM tbl_barcode_barang WHERE code_barcode='$barcode'");

if (mysqli_num_rows($cek)>0) {
	$data['pesan'] = "1";
}else{
	$add = mysqli_query($koneksi,"INSERT INTO tbl_barcode_barang (id_satuan,code_barcode,nama_barang,img,join_ket) VALUES ('$satuan[0]','$barcode','$nama','$nama_foto','Pendding')");
	file_put_contents($lokasi, base64_decode($foto));
	if ($add) {
		$data['pesan'] = "2";
	}else{
		$data['pesan'] = "3";
	}
}

 echo json_encode($data);
 mysqli_close($koneksi);