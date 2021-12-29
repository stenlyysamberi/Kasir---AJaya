<?php
session_start();
$response  = array("error" => FALSE);
include '../config/config.php';
echo $nota = $_POST['nota'];

echo "<br>";
echo $grand_total = $_POST['grand-total'];
echo "<br>";
echo $kembalina = $_POST['kembalian'];
echo "<br>";
echo $jumlah_uang = $_POST['jumlah-uang'];
echo "<br>";
echo $member = $_POST['member'];
echo "<br>";
echo $tgl = $_POST['tgl-transaksi'];
echo "<br>";
echo $ket = $_POST['ket-trasaski'];

$tamba_nota = mysqli_query($koneksi,"INSERT INTO `tbl_nota`(`nomor_nota`, `tanggal`, `grand_total`, `bayar`, `keterangan_lain`, `id_pelanggan`, `idAkun`) VALUES ('$nota','$tgl','$grand_total','$jumlah_uang','$ket','$member','".$_SESSION['id']."');");

if ($tamba_nota) {
    //cek max id yang telah simpan pada tabel nota
    $cek    = mysqli_query($koneksi,"SELECT MAX(id_penjualan_m) AS max_id FROM tbl_nota");
    $get    = mysqli_fetch_array($cek);//simpan max id ke dalam variable get
    $idnota = $get['max_id'];

    //update tabel tmp_jual untuk menambahakan id nota
    if (mysqli_num_rows($cek)>0) {
        mysqli_query($koneksi,"UPDATE `tmp_jual` SET `id_penjualan_m`='$idnota'");
    }

}

mysqli_query($koneksi,"INSERT INTO `tbl_penjualan_detail`(`id_penjualan_m`, `id_barang`, `id_barcode`, `jumlah_beli`, `harga_satuan`, `total`) SELECT tmp_jual.id_penjualan_m,tmp_jual.id_barang,tmp_jual.id_barcode,tmp_jual.jumlah_beli,tmp_jual.harga_satuan,tmp_jual.total FROM tmp_jual INNER JOIN tbl_nota ON tmp_jual.id_penjualan_m = tbl_nota.id_penjualan_m WHERE tbl_nota.nomor_nota = '$nota'");
mysqli_query($koneksi,"DELETE FROM `tmp_jual`");
header('location:../kasir/tnx_fix.php?cetak=' . $nota );


?>


