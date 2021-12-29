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
}elseif (isset($_GET['AddStokBaru'])) {
	// code...
	AddStokBaru();
}


function AddStokBaru(){
	session_start();
	include '../config/config.php';
	$idBarcode = $_GET['AddStokBaru'];
	$stokLama = $_POST['stokLama'];
	$stokBaru = $_POST['stokBaru'];
	$date     = date('Y-m-d');

	$total = ($stokLama + $stokBaru);
	$update = mysqli_query($koneksi,"INSERT INTO `tbl_barcode_barang_masuk`(
		`id_barcode`,`jumlah_masuk`,`tgl_masuk`,`idAkun`) 
		VALUES ('$idBarcode','$stokBaru','$date','".$_SESSION['id']."')");

	if ($update) {
		// code...
		$_SESSION['alert'] =  "Berhasil";
		$_SESSION['sub_alert'] = "Tamba Data Stok Berhasil". " " .$total;
		header('location:../index.php?add-stok=1');
	}else{
		$_SESSION['alert'] =  "Gagal";
		$_SESSION['sub_alert'] = "Tamba Data Stok Gagal";
		header('location:../index.php?add-stok=1');
	}

}


function doEdit(){
	session_start();
	include '../config/config.php';
	$id     = $_GET['edit'];
	$nama   = $_POST['nama'];
	$barcode = $_POST['barcode'];
	$jumlah = $_POST['jumlah'];
	$satuan = $_POST['satuan'];



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

				//identifikasi File
				// $img_src = imagecreatefromjpeg(filename)

				$cek = mysqli_query($koneksi,"SELECT * FROM tbl_barcode_barang WHERE id_barcode='$id'");
				$getIMG = mysqli_fetch_array($cek);
				$gambar = $getIMG['img'];
				unlink('../assets/images/products/'.$gambar);

				move_uploaded_file($file_tmp,'../assets/images/products/'.$file_baru);

				$add = mysqli_query($koneksi,"UPDATE `tbl_barcode_barang` SET `id_satuan` = '$satuan',`code_barcode`='$barcode',`nama_barang`='$nama',`img`='$file_baru',`qty`='$jumlah' WHERE id_barcode='$id'");

				if ($add) {
					//include '../../modalView/modal-sukses.php';
					$_SESSION['alert'] =  "Berhasil";
					$_SESSION['sub_alert'] = "Edit Data Berhasil". " " .$nama;
					header('location:../index.php?gudang=1');

					// echo "<script>alert('Berhasil')</script>";
					// echo "<script>location.href='../../index.php?user=1'</script>";

				}else{
					$_SESSION['alert'] =  "Gagal";
					// header('location:../index.php?gudang=1');
					// echo "<script>alert('Gagal')</script>";
					// echo "<script>location.href='../../index.php?user=1'</script>";
				}

			}else{

				echo "<script>alert('Ukuran File terlalu besar.')</script>";
				header('location:../index.php?gudang=1');


			}

		}else{
			echo "<script>alert('Extensi File tidak.')</script>";
			header('location:../index.php?gudang=1');
		}


	}else{
		$add = mysqli_query($koneksi,"UPDATE `tbl_barcode_barang` SET 
			`id_satuan` = '$satuan',`code_barcode`='$barcode',`nama_barang`='$nama',`qty`='$jumlah' WHERE id_barcode='$id'");

		if ($add) {

			$_SESSION['alert'] =  "Berhasil";
			header('location:../index.php?gudang=1');

		}else{
			$_SESSION['alert'] =  "Gagal";
			header('location:../index.php?gudang=1');
		}

	}
	
}

function doHapus(){
	session_start();
	include '../config/config.php';
	$id   = $_GET['del'];

	$cek = mysqli_query($koneksi,"SELECT * FROM tbl_barcode_barang WHERE id_barcode='$id'");
	
	if (mysqli_num_rows($cek)>0) {
		// code...

		

		$del = mysqli_query($koneksi,"DELETE FROM tbl_barcode_barang WHERE id_barcode='$id'");
		if ($del) {

			$getIMG = mysqli_fetch_array($cek);
			$gambar = $getIMG['img'];

			unlink('../assets/images/products/'.$gambar);

			$_SESSION['alert'] =  "Berhasil";
			$_SESSION['sub_alert'] = "Hapus Produts Berhasil";
			header('location:../index.php?gudang=1');
		}else{
			$_SESSION['alert'] =  "Gagal";
			$_SESSION['sub_alert'] = "Gagal Hapus Data Products";
			header('location:../index.php?gudang=1');
		}
	}
}


function doAdd(){
	session_start();
	include '../config/config.php';
	echo $id     = $_SESSION['id'];
	echo $barcode   = $_POST['barcode'];
	echo $nama   = $_POST['nama'];
	echo $jumlah = $_POST['banyak'];
	echo $satuan = $_POST['satuan-produk'];


	$cekGory = mysqli_query($koneksi,"SELECT * FROM tbl_barcode_barang WHERE code_barcode='$barcode'");
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

					$width_size = 100;

				move_uploaded_file($file_tmp, '../assets/images/products/'.$file_baru);

				$asli = "../assets/images/products/".$file_baru;
				    $nama_baru = $file_baru;
				    $uname     = $file_baru.$file_baru;
					$gambar_asli = imagecreatefromjpeg($asli);
					$lebar_asli  = imageSX($gambar_asli);
					$tinggi_asli = imageSY($gambar_asli);
					$pembagi     = $lebar_asli/$width_size;
					$lebar_baru  = $lebar_asli/$pembagi;
					$tinggi_baru = $tinggi_asli/$pembagi;

					$img = imagecreatetruecolor($lebar_baru, $tinggi_baru);
					imagecopyresampled($img, $gambar_asli, 0, 0,0,0, $lebar_baru, $tinggi_baru, $lebar_asli, $tinggi_asli);
					imagejpeg($img,$asli.$nama_baru);
					imagedestroy($gambar_asli);
					imagedestroy($img);

					$add = mysqli_query($koneksi,"INSERT INTO tbl_barcode_barang (id_satuan,code_barcode,nama_barang,img,qty,join_ket) VALUES ('$satuan','$barcode','$nama','$uname','$jumlah','Pendding')");

					if ($add) {

						$_SESSION['alert'] =  "Berhasil";
						$_SESSION['sub_alert'] = "Tamba Produts Berhasil". " " .$nama;
						header('location:../index.php?gudang=1');
						unlink('../assets/images/products/'.$gambar);

					}else{
						$_SESSION['alert'] = "Gagal";
						$_SESSION['sub_alert'] = "Tamba Produts Gagal". " " .$nama;
						header('location:../index.php?gudang=1');
						
						
					}
					
				}else{

					$_SESSION['alert'] = "Gagal";
					$_SESSION['sub_alert'] = "Ukuran File Kebesaran". " " .$nama;
					header('location:../index.php?gudang=1');

				}
				
			}else{
				$_SESSION['alert'] = "Gagal";
				$_SESSION['sub_alert'] = "Format File Tidak dizinkan (PNG/JPG)". " " .$nama;
				header('location:../index.php?gudang=1');
			}
		}
		
	# code...
	}else{
		$_SESSION['alert'] = "Gagal";
		$_SESSION['sub_alert'] = "Data Products Terdaftar. segera tambakan stok pada menu Add Stoks";
		header('location:../index.php?gudang=1');
	}

}



?>