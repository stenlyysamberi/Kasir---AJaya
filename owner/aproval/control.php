<?php 

if (isset($_GET['aproval'])) {
 	// code...
	doAprov();
}elseif(isset($_GET['del'])){
	doDelete();
}

function doDelete(){
	session_start();
	include '../../config/config.php';
	$id = $_GET['id'];
	
	$cek = $cek  = mysqli_query($koneksi,"SELECT * FROM tbl_barcode_barang WHERE id_barcode='$id'");

	if (mysqli_num_rows($cek)>0) {
	 	// code...
	 	$del = mysqli_query($koneksi,"DELETE FROM `tbl_barcode_barang` WHERE id_barcode='$id'");
	 	$_SESSION['alert'] = "Berhasil";
		$_SESSION['sub_alert'] = "Tolak Produk berhasil, Mohon dipastikan petugas gudang input produk baru!";
		echo "<script>location.href='../../index.php?aproval=1'</script>";
	 }else{
	 	$_SESSION['alert'] = "Gagal";
		$_SESSION['sub_alert'] = "Aproval Produk Gagal!";
		// echo "<script>alert('update sandi gagal!')</script>";
		echo "<script>location.href='../../index.php?aproval=1'</script>";
	 }
}


function doAprov(){
	session_start();
	include '../../config/config.php';
	$id = $_GET['id'];
	$berhasil = "Berhasil";
	

	$cek  = mysqli_query($koneksi,"SELECT * FROM tbl_barcode_barang WHERE id_barcode='$id'");
	if (mysqli_num_rows($cek)>0) {
		$akupaID = mysqli_query($koneksi,"UPDATE `tbl_barcode_barang` SET `join_ket`='$berhasil' WHERE id_barcode='$id'");
		// echo "<script>alert('update sandi berhasil!')</script>";
		$_SESSION['alert'] = "Berhasil";
		$_SESSION['sub_alert'] = "Aproval Produk Berhasil, silakan set Harga Produk pada menu owner -> Detail Products";
		echo "<script>location.href='../../index.php?aproval=1'</script>";
		mysqli_query($koneksi,"INSERT INTO `tbl_barang`(`id_barang`, `id_barcode`) VALUES ('$id')");
	}else{
		$_SESSION['alert'] = "Gagal";
		$_SESSION['sub_alert'] = "Aproval Produk Gagal!";
		// echo "<script>alert('update sandi gagal!')</script>";
		echo "<script>location.href='../../index.php?aproval=1'</script>";
		
	}

}

?>