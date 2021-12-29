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





function editSandi(){
	session_start();
	include '../../config/config.php';
	$id = $_GET['id'];
	$lama = sha1($_POST['old-password']);
	$baru = sha1($_POST['new-password']);

	$cek  = mysqli_query($koneksi,"SELECT * FROM akun WHERE password='$lama'");
	if (mysqli_num_rows($cek)>0) {
		$akupaID = mysqli_query($koneksi,"UPDATE `akun` SET `password`='$baru' WHERE idAkun='$id'");
		// echo "<script>alert('update sandi berhasil!')</script>";
		$_SESSION['alert'] = "Berhasil";
		echo "<script>location.href='../../index.php?Home'</script>";
	}else{
		$_SESSION['alert'] = "Gagal";
		// echo "<script>alert('update sandi gagal!')</script>";
		echo "<script>location.href='../../index.php?Home'</script>";

	}





}


function doHapus(){
	session_start();
	include '../../config/config.php';
	$id   = $_GET['del'];

	$cek = mysqli_query($koneksi,"SELECT * FROM akun WHERE idAkun='$id'");

	if (mysqli_num_rows($cek)>0) {
		// code...

		$getIMG = mysqli_fetch_array($cek);
		$gambar = $getIMG['gambar'];

		unlink('../../assets/images/akun/'.$gambar);

		$del = mysqli_query($koneksi,"DELETE FROM akun WHERE idAkun='$id'");
		if ($del) {
			$_SESSION['pesan'] =  "Hapus";
			header('location:../../index.php?user');
		}else{
			$_SESSION['pesan'] =  "Gagal";
			header('location:../../index.php?user');
		}
	}
}


function doAdd(){
	session_start();
	include '../../config/config.php';

	$nama   = $_POST['nama'];
	$hp	    = $_POST['hp'];
	$level  = $_POST['level'];
	$alamat = $_POST['alamat'];
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	$date   = date('l,m-D-Y');

	$cekPhone = mysqli_query($koneksi,"SELECT * FROM akun WHERE hp='$hp'");
	if (!mysqli_num_rows($cekPhone)>0) {

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

					move_uploaded_file($file_tmp, '../../assets/images/akun/'.$file_baru);

					$add = mysqli_query($koneksi,"INSERT INTO akun(nama,username,password,gambar,hp,levell,alamat,create_date)
					VALUES('$nama','$username','$password','$file_baru','$hp','$level','$alamat','$date')");

					if ($add) {

						$_SESSION['pesan'] =  "Berhasil";
						header('location:../../index.php?user=1');

					}else{
						$_SESSION['pesan'] =  "Gagal";
						header('location:../../index.php?user=1');
					}

				}else{

					echo "Ukuran File terlalu bersar!";

				}

			}else{
				echo "File Extensi tidak, izinkan!";
			}
		}

		# code...
	}else{
		$_SESSION['pesan'] =  "hpActiv";
		header('location:../../index.php?user=1');
	}

}






function doEdit(){
	session_start();
	include '../../config/config.php';
	$id     = $_GET['edit'];
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
				$gambar = $getIMG['gambar'];
				unlink('../../assets/images/akun/'.$gambar);

				move_uploaded_file($file_tmp, '../../assets/images/akun/'.$file_baru);

				$add = mysqli_query($koneksi,"UPDATE `akun` SET `nama`='$nama',`gambar`='$file_baru',`hp`='$hp',`levell`='$level',`alamat`='$alamat' WHERE idAkun='$id'");

				if ($add) {
					//include '../../modalView/modal-sukses.php';
					$_SESSION['pesan'] =  "Berhasil";
					header('location:../../index.php?user=1');

					// echo "<script>alert('Berhasil')</script>";
					// echo "<script>location.href='../../index.php?user=1'</script>";

				}else{
					$_SESSION['pesan'] =  "Gagal";
					header('location:../../index.php?user=1');
					// echo "<script>alert('Gagal')</script>";
					// echo "<script>location.href='../../index.php?user=1'</script>";
				}

			}else{

				echo "<script>alert('Ukuran File terlalu besar.')</script>";
				echo "<script>location.href='../../index.php?user=1'</script>";


			}

		}else{
			echo "<script>alert('Extensi File tidak.')</script>";
			echo "<script>location.href='../../index.php?user=1'</script>";
		}


	}else{
		$add = mysqli_query($koneksi,"UPDATE `akun` SET `nama`='$nama',`hp`='$hp',`levell`='$level',`alamat`='$alamat' WHERE idAkun='$id'");

		if ($add) {

			$_SESSION['pesan'] =  "Berhasil";
			header('location:../../index.php?user=1');

		}else{
			$_SESSION['pesan'] =  "Gagal";
			header('location:../../index.php?user=1');
		}

	}

}



?>
