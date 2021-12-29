<?php
session_start();
include '../../config/config.php';
$idBarcode        = $_GET['id'];
$nama             = $_POST['nama'];
$min              = $_POST['min'];
$kategori         = $_POST['kategori'];
$jenis            = $_POST['jenis'];
$harga            = $_POST['harga'];
$status_penjualan = $_POST['radioInline'];
$ket_dec          = $_POST['ket'];
$berhasil = "Berhasil";
if (isset($_POST['save'])) {

  if ($_SESSION['STATUS-SET'] == "BARU") {
    $baru = mysqli_query($koneksi,"INSERT INTO `tbl_barang`(`id_barcode`, `harga`, `min_stok`, `status_jual`, `id_kategori_barang`, `id_merk_barang`, `keterangan`)
    VALUES ('$idBarcode','$harga','$min','$status_penjualan','$kategori','$jenis','$ket_dec')");

    if ($baru) {
      mysqli_query($koneksi,"UPDATE `tbl_barcode_barang` SET `join_ket`='$berhasil' WHERE id_barcode='$idBarcode'");
      $_SESSION['pesan'] =  "Berhasil";
      header('location:../../index.php?detil-produk');
    }else{
      echo "Gagal";
    }


  }

  if($_SESSION['STATUS-SET'] == "EDIT"){
    $edit = mysqli_query($koneksi,"UPDATE `tbl_barang` SET
      `harga`='$harga',`min_stok`='$min',`status_jual`='$status_penjualan',
      `id_kategori_barang`='$kategori',`id_merk_barang`='$jenis',`keterangan`='$ket_dec' WHERE id_barcode='$idBarcode'");

      if ($edit) {
        mysqli_query($koneksi,"UPDATE `tbl_barcode_barang` SET `join_ket`='$berhasil' WHERE id_barcode='$idBarcode'");
        $_SESSION['pesan'] =  "Berhasil";
        header('location:../../index.php?detil-produk');
      }

    }


    // echo $_SESSION['STATUS-SET'];
    // echo 'save';
  }elseif (isset($_POST['hapus'])) {

    $del = mysqli_query($koneksi,"DELETE FROM `tbl_barang` WHERE id_barcode='$idBarcode'");
    if ($del) {
      $hapus = mysqli_query($koneksi,"DELETE FROM `tbl_barcode_barang` WHERE id_barcode='$idBarcode'");
      if ($hapus) {
        $_SESSION['alert'] =  "Berhasil";
        $_SESSION['sub_alert'] = "Hapus Produk Berhasil";
        header('location:../../index.php?detil-produk');
      }else{
        $_SESSION['alert'] =  "Gagal";
        $_SESSION['sub_alert'] = "Hapus Produk Gagal";
        header('location:../../index.php?detil-produk');
      }
    }else{
      $_SESSION['alert'] =  "Gagal";
      $_SESSION['sub_alert'] = "Hapus Produk Gagal";
      header('location:../../index.php?detil-produk');
    }

  }


  unset($_SESSION['STATUS-SET']);

  ?>
