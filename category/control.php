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


function doEdit(){
	session_start();
	include '../config/config.php';
	$id     = $_GET['edit'];
	$nama   = $_POST['nama'];
	$dec = $_POST['alamat'];
	$date = $_POST['tgl'];



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

				$cek = mysqli_query($koneksi,"SELECT * FROM tbl_kategori_barang WHERE id_kategori_barang='$id'");
				$getIMG = mysqli_fetch_array($cek);
				$gambar = $getIMG['img'];
				unlink('../assets/images/category/'.$gambar);

				move_uploaded_file($file_tmp, '../assets/images/category/'.$file_baru);

				$add = mysqli_query($koneksi,"UPDATE `tbl_kategori_barang` SET `kategori`='$nama',`img`='$file_baru',`tgl_buat`='$date',`dihapus`='$dec' WHERE id_kategori_barang='$id'");

				if ($add) {
					//include '../../modalView/modal-sukses.php';
					$_SESSION['pesan'] =  "Berhasil";
					header('location:../index.php?category=1');

					// echo "<script>alert('Berhasil')</script>";
					// echo "<script>location.href='../../index.php?user=1'</script>";

				}else{
					$_SESSION['pesan'] =  "Gagal";
					header('location:../index.php?category=1');
					// echo "<script>alert('Gagal')</script>";
					// echo "<script>location.href='../../index.php?user=1'</script>";
				}

			}else{

				echo "<script>alert('Ukuran File terlalu besar.')</script>";
				echo "<script>location.href='../index.php?category=1'</script>";


			}

		}else{
			echo "<script>alert('Extensi File tidak.')</script>";
			echo "<script>location.href='../index.php?category=1'</script>";
		}


	}else{
		$add = mysqli_query($koneksi,"UPDATE `akun` SET `kategori`='$nama',`tgl_buat`='$date',`dihapus`='$dec' WHERE id_kategori_barang='$id'");

		if ($add) {

			$_SESSION['pesan'] =  "Berhasil";
			header('location:../index.php?category=1');

		}else{
			$_SESSION['pesan'] =  "Gagal";
			header('location:../index.php?category=1');
		}

	}
	
}

function doHapus(){
	session_start();
	include '../config/config.php';
	$id   = $_GET['del'];

	$cek = mysqli_query($koneksi,"SELECT * FROM tbl_kategori_barang WHERE id_kategori_barang='$id'");
	
	if (mysqli_num_rows($cek)>0) {
		// code...

		$getIMG = mysqli_fetch_array($cek);
		$gambar = $getIMG['img'];
		
		unlink('../assets/images/category/'.$gambar);

		$del = mysqli_query($koneksi,"DELETE FROM tbl_kategori_barang WHERE id_kategori_barang='$id'");
		if ($del) {
			$_SESSION['pesan'] =  "Hapus";
			header('location:../index.php?category=1');
		}else{
			$_SESSION['pesan'] =  "Gagal";
			header('location:../index.php?category=1');
		}
	}
}


function doAdd(){
	session_start();
	include '../config/config.php';
	echo $id     = $_SESSION['id'];
	echo $nama   = $_POST['nama'];
	echo $date   = date('l,m-D-Y');

	$cekGory = mysqli_query($koneksi,"SELECT * FROM tbl_kategori_barang WHERE kategori='$nama'");
	if (!mysqli_num_rows($cekGory)>0) {

		$ekstensi_diperbolehkan	= array('png','jpg');
		$gambar = $_FILES['gambar']['name'];
		$x = explode('.', $gambar);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['gambar']['tmp_name'];
		$ukuran	= $_FILES['gambar']['size'];
		$file_baru = $nama.$gambar;
		


		if (!empty($gambar)) {
			if (in_array($ekstensi, $ekstensi_diperbolehkan)===true) {

				if ($ukuran <1044070) {

					move_uploaded_file($file_tmp, '../assets/images/category/'.$file_baru);

					$add = mysqli_query($koneksi,"INSERT INTO tbl_kategori_barang (idAkun,kategori,img,tgl_buat) VALUES ('$id','$nama','$file_baru','$date')");

					if ($add) {

						$_SESSION['pesan'] =  "Berhasil";
						header('location:../index.php?category=1');

					}else{
						$_SESSION['pesan'] =  "Gagal";
						echo "Error :".$add. mysqli_error($koneksi);
						header('location:../index.php?category=1');
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
		header('location:../index.php?category=1');
	}

}



?>