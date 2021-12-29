<?php
if (isset($_GET['add'])) {
	# code...
	doAdd();
}else if (isset($_GET['edit'])) {
	# code...
	doEdit();
}elseif (isset($_GET['del'])) {
	# code...
	doHapus();
}elseif (isset($_GET['pass'])) {
	// code...
	editSandi();
}elseif (isset($_GET['myProfil'])) {
	// code...
	editMyProfil();
}


function editMyProfil(){
	session_start();
	include '../../config/config.php';
	$id     = $_GET['myProfil'];
	$nama   = $_POST['nama'];
	$hp	    = $_POST['hp'];
	$level  = $_POST['level'];
	$alamat = $_POST['alamat'];



	$ekstensi_diperbolehkan	= array('png','jpg');
	$gambar = $_FILES['gambar']['name'];
	$x = explode('.', $gambar);
	$ekstensi = strtolower(end($x));
	$file_tmp = $_FILES['gambar']['tmp_name'];
	$ukuran	= $_FILES['file']['size'];
	$file_baru = $nama.$gambar;



	if (!empty($gambar)) {
		if (in_array($ekstensi, $ekstensi_diperbolehkan)===true) {

			if ($ukuran <1044070) {

				$cek = mysqli_query($koneksi,"SELECT * FROM akun WHERE idAkun='$id'");
				$getIMG = mysqli_fetch_array($cek);


				$add = mysqli_query($koneksi,"UPDATE `akun` SET `nama`='$nama',`gambar`='$file_baru',`hp`='$hp',`levell`='$level',`alamat`='$alamat' WHERE idAkun='$id'");

				if ($add) {

					$gambar = $getIMG['gambar'];
					unlink('../../assets/images/akun/'.$gambar);
					move_uploaded_file($file_tmp, '../../assets/images/akun/'.$file_baru);


					$_SESSION['alert'] =  "Berhasil";
					$_SESSION['sub_alert'] = "Edit Data Profil Success". " " .$nama;
					header('location:../../index.php?Home');


					// echo "<script>alert('Berhasil')</script>";
					// echo "<script>location.href='../../index.php?user=1'</script>";

				}else{
					$_SESSION['alert'] =  "Gagal";
					$_SESSION['sub_alert'] = "Edit Data Profil Gagal". " " .$nama;
					header('location:../../index.php?Home');
				}

			}else{

				$_SESSION['alert'] =  "Gagal";
				$_SESSION['sub_alert'] = "Max Ukuran Gambar 2MB". " " .$nama;
				header('location:../../index.php?Home');


			}

		}else{
			$_SESSION['alert'] =  "Gagal";
			$_SESSION['sub_alert'] = "Format File Only (PNG/JPG)". " " .$nama;
			header('location:../../index.php?Home');

		}


	}else{
		$add = mysqli_query($koneksi,"UPDATE `akun` SET `nama`='$nama',`hp`='$hp',`levell`='$level',`alamat`='$alamat' WHERE idAkun='$id'");

		if ($add) {

			$_SESSION['alert'] =  "Berhasil";
			$_SESSION['sub_alert'] = "Edit Data Profil Success". " " .$nama;
			header('location:../../index.php?Home');

		}else{
			$_SESSION['alert'] =  "Gagal";
			$_SESSION['sub_alert'] = "Edit Data Profil Gagal". " " .$nama;
			header('location:../../index.php?Home');
		}

	}

}





function doEdit(){
	session_start();
	include '../../config/config.php';
	$id   = $_GET['edit'];
	$nama = $_POST['nama'];
	$tgl  = $_POST['tgl'];

	$cek  = mysqli_query($koneksi,"SELECT * FROM tbl_satuan_produk WHERE id_satuan='$id'");
	if (mysqli_num_rows($cek)>0) {

		$set = mysqli_query($koneksi,"UPDATE `tbl_satuan_produk` SET `tgl`='$tgl',`nama_satuan`='$nama' WHERE id_satuan = '$id'");


		$_SESSION['alert'] = "Berhasil";
		$_SESSION['sub_alert'] = $nama . " " . "Berhasil di edit";
		echo "<script>location.href='../../index.php?new-satuan=1'</script>";
	}else{
		$_SESSION['alert'] = "Gagal";
		echo "<script>alert('update sandi gagal!')</script>";
		echo "<script>location.href='../../index.php?new-satuan=1'</script>";

	}





}


function doHapus(){
	session_start();
	include '../../config/config.php';
	$id   = $_GET['del'];

	$cek = mysqli_query($koneksi,"SELECT * FROM tbl_satuan_produk WHERE id_satuan='$id'");

	if (mysqli_num_rows($cek)>0) {

		$del = mysqli_query($koneksi,"DELETE FROM tbl_satuan_produk WHERE id_satuan='$id'");
		if ($del) {
			$_SESSION['alert'] =  "Berhasil";
			$_SESSION['sub_alert'] = "Menghapus satuan produk ID : " . " " . $id;
			header('location:../../index.php?new-satuan=1');
		}else{
			$_SESSION['alert'] =  "Gagal";
			header('location:../../index.php?new-satuan=1');
		}
	}
}


function doAdd(){
	session_start();
	include '../../config/config.php';

	$nama   = $_POST['satuan'];
	$date   = date('l,m-D-Y');

	$add    = mysqli_query($koneksi,"INSERT INTO `tbl_satuan_produk`( `tgl`, `idAkun`, `nama_satuan`) 
		VALUES ('$date','".$_SESSION['id']."','$nama');");

	if ($add) {
		$_SESSION['alert'] =  "Berhasil";
		$_SESSION['sub_alert'] = "Menambahkan" . " " . $nama;
		header('location:../../index.php?new-satuan=1');
	}else{
		$_SESSION['pesan'] =  "Gagal";
		header('location:../../index.php?new-satuan=1');
	}
}









?>
