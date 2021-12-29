<?php
session_start();
include '../config/config.php';
echo $id= $_GET['id'];
echo $qty = $_POST['qty'];

$cek = mysqli_query($koneksi,"SELECT `jumlah_beli`, `harga_satuan` FROM `tmp_jual` WHERE id_penjualan_d = '$id'");
$fet   = mysqli_fetch_array($cek);
$total = $fet['harga_satuan']* $qty;

$edit = mysqli_query($koneksi,"UPDATE `tmp_jual` SET 
    `jumlah_beli`='$qty',`total` = '$total' WHERE id_penjualan_d='$id'");

if ($edit) {
    // code...
    $_SESSION['pesan'] =  "Berhasil";
    header('location:../index.php?bayar=1');
}else{
    $_SESSION['pesan'] =  "Gagal";
    header('location:../index.php?bayar=1');
}


?>