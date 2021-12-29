<?php 
include '../config/config.php';
echo $id= $_GET['id'];

$del = mysqli_query($koneksi,"DELETE FROM `tmp_jual`
    WHERE id_penjualan_d='$id'");

if ($del) {
    $_SESSION['alert'] = "Berhasil";
    $_SESSION['sub_alert'] = "Tolak Produk berhasil, Mohon dipastikan petugas gudang input produk baru!";
    header('location:../index.php?bayar');
    // echo "<script>location.href='../index.php?bayar'</script>";
}else{
    $_SESSION['alert'] = "Gagal";
    $_SESSION['sub_alert'] = "Aproval Produk Gagal!";
        // echo "<script>alert('update sandi gagal!')</script>";
    echo "<script>location.href='../index.php?bayar'</script>";
}




?>