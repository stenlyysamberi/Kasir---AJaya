<?php
include '../config/config.php';
echo $id  = $_GET['id'];
echo $qty = $_GET['qty'];

$cek   = mysqli_query($koneksi,"SELECT harga_satuan FROM tbl_penjualan_detail WHERE id_penjualan_d='$id'");
$arr   = mysqli_fetch_array($cek);
$get   = $arr['harga_satuan'];
$total = $get * $qty;


 $cart = mysqli_query($koneksi,"UPDATE `tbl_penjualan_detail` SET `jumlah_beli`='$qty',`total`='$total'
    WHERE id_penjualan_d='$id'");

?>
