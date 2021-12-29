<?php

function nota($kode){
  $str = "";
  $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $max = strlen($karakter) - 1;
  for ($i=0; $i < $kode ; $i++) {
    $rand = mt_rand(0, $max);
    $str .= $karakter[$rand];
  }
  return $str;
}

$nota_barang = "AJAYA-". $_SESSION['id'] . nota(10);

//strtoupper(uniqid($_SESSION['id']))

// include '../config/config.php';
//
// $nota  = mysqli_query($koneksi,"SELECT MAX(nomor_nota) AS kode_besar FROM tbl_nota");
// $data  = mysqli_fetch_array($nota);
// $nota_barang = $data['kode_besar'];
//
// $urut = (int) substr($nota_barang,6,3);
// $urut++;
//
// $huruf = "AJAYA-";
// $nota_barang = $huruf . sprintf("%03s", $urut);

//date('Y-m-d H:i:s')


?>
