<?php
include '../config/config.php';
$kode = $_GET['kode'];

$auto = mysqli_query($koneksi,"SELECT tbl_barcode_barang.code_barcode,tbl_barcode_barang.id_barcode,
  tbl_barcode_barang.nama_barang,tbl_barcode_barang.img,tbl_barcode_barang.qty,tbl_barang.id_barang,
  tbl_barang.harga,tbl_barang.keterangan,tbl_barang.min_stok,tbl_merk_barang.id_merk_barang,tbl_merk_barang.merk,
  tbl_kategori_barang.id_kategori_barang,tbl_kategori_barang.kategori
  FROM tbl_barcode_barang INNER JOIN tbl_barang ON tbl_barcode_barang.id_barcode = tbl_barang.id_barcode
  INNER JOIN tbl_merk_barang ON tbl_merk_barang.id_merk_barang = tbl_barang.id_merk_barang
  INNER JOIN tbl_kategori_barang ON tbl_kategori_barang.id_kategori_barang = tbl_barang.id_kategori_barang
  WHERE tbl_barcode_barang.code_barcode LIKE '%$kode%' OR tbl_barcode_barang.nama_barang LIKE '%$kode%'");

//WHERE tbl_barcode_barang.code_barcode LIKE '%".$kode."%'    ");

  if (mysqli_num_rows($auto)>0) {
    // code...
    while ($a = mysqli_fetch_array($auto)) {
      // code...

      $data = array(
        'id_barang'   =>  $a ['id_barang'],
        'id_barcode'  =>  $a ['id_barcode'],
        'nama' => $a ['nama_barang'],
        'stok' => $a ['qty'],
        'harga' => 'Rp'.number_format($a['harga'])

      );
    }
  }

  echo json_encode($data);

?>
