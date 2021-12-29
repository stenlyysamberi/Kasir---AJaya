<?php
session_start();
//Include file koneksi ke database
include '../config/config.php';
//menerima nilai dari kiriman form input-barang
$id_barang = $_POST['id_barang'];
$id_barcode = $_POST['id_barcode'];
//$barcode = $_POST['barcode'];
//$nota    = $_POST['nota'];
$jumlah  = $_POST['qty'];

$tgl     = date('d-m-Y H:i:s');
$idAkun  = $_SESSION['id'];
//$_SESSION['nota'] = $nota;



//cek max id tabel tbl_nota untuk menentukan ID berikutnya
// $cek = mysqli_query($koneksi,"SELECT max(id_penjualan_m) AS idmax FROM tbl_nota");
// $arr = mysqli_fetch_array($cek);
// $sum = $arr['idmax']+1;


//cek tabel Harga dan tentukan jumlah barang sebuah produk
$price        = mysqli_query($koneksi,"SELECT harga FROM tbl_barang WHERE id_barcode  ='$id_barcode'");
$minta        = mysqli_fetch_array($price);
$harga_satuan = $minta['harga'];
$jumlah_byar  = $minta['harga'] * $jumlah;

$cek_cart     = mysqli_query($koneksi,"SELECT `id_barcode` FROM `tmp_jual` WHERE id_barcode = '$id_barcode'");

if (mysqli_num_rows($cek_cart)>0) {
 $_SESSION['pesan'] =  "hpActiv";
 header('location:../index.php?bayar=1');
}else{
  $penjualan = mysqli_query($koneksi,"INSERT INTO `tmp_jual`(`id_barang`,`id_barcode`, `jumlah_beli`, `harga_satuan`, `total`)
    VALUES ('$id_barang','$id_barcode','$jumlah','$harga_satuan','$jumlah_byar');");

  if ($penjualan) {
   $_SESSION['pesan'] =  "Berhasil";
   header('location:../index.php?bayar=1');
 }else{
   $_SESSION['pesan'] =  "Gagal";
   header('location:../index.php?bayar=1');
 }
}



//simpan transaksi kedalam tabel penjualan
//pengecekan apakah nomor nota sudah terdaftar atau belum
//jika sudah terdaftar maka ID nota diinput pada tabel penjualan details
// $i = mysqli_query($koneksi,"SELECT id_penjualan_m,nomor_nota FROM tbl_nota WHERE nomor_nota = '".$_GET['nota']."'");
// $x = mysqli_fetch_array($i);//simpan data ke dalam array
// $y = $x['id_penjualan_m'];




// if (mysqli_num_rows($i)>0) {
  // code...
  // $penjualan = mysqli_query($koneksi,"INSERT INTO `tmp_jual`(`id_barang`,`id_barcode`, `jumlah_beli`, `harga_satuan`, `total`)
  //   VALUES ('$id_barang','$id_barcode','$jumlah','$harga_satuan','$jumlah_byar');");

  // if ($penjualan) {
  //   $sql = mysqli_query($koneksi,"INSERT INTO `tbl_nota`( `nomor_nota`, `tanggal`, `idAkun`) VALUES
  //     ('$nota','$tgl','$idAkun')");

  // }

// }else{
//   $penjualan = mysqli_query($koneksi,"INSERT INTO `tmp_jual`(`id_penjualan_m`,`id_barang`,`id_barcode`, `jumlah_beli`, `harga_satuan`, `total`)
//     VALUES ('$sum','$id_barang','$id_barcode','$jumlah','$harga_satuan','$jumlah_byar');");

  // if ($penjualan) {
  //   $sql = mysqli_query($koneksi,"INSERT INTO `tbl_nota`(`nomor_nota`, `tanggal`, `idAkun`) VALUES
  //     ('$nota','$tgl','$idAkun')");
  //   $_SESSION['nota'] = $nota;
  // }
// }


// $akun = mysqli_query($koneksi,"SELECT tbl_barcode_barang.nama_barang,tbl_barcode_barang.img, tbl_barcode_barang.code_barcode AS ID_BARCODE,
//   tbl_nota.nomor_nota,tmp_jual.id_penjualan_d,tmp_jual.jumlah_beli,tmp_jual.harga_satuan,tmp_jual.total
//   FROM tbl_nota INNER JOIN tmp_jual ON tbl_nota.id_penjualan_m = tmp_jual.id_penjualan_m
//   INNER JOIN tbl_barcode_barang ON tbl_barcode_barang.id_barcode = tmp_jual.id_barcode
//   WHERE tbl_nota.nomor_nota = '".$_GET['nota']."'");


// while ($row = mysqli_fetch_assoc($akun)) {
//   $data[] = $row;
// }

// echo json_encode($data);


?>
