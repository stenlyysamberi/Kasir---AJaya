<table class="table table-centered table-nowrap table-borderless table-hover mb-0">

<thead class="thead-light">
  <tr>

    <th>No</th>
    <th>Nama Barang</th>
    <th>ID Barcode</th>
    <th>Harga Satuan</th>
    <th>qty</th>
    <th>Total</th>

    <th style="width: 82px;">Action</th>
  </tr>
</thead>

<tbody>


  <?php
  session_start();
  include '../config/config.php';
  error_reporting(0);

  // $note =   $_SESSION['nota'];
  $batas = 5;
  $halaman = isset($_GET['bayar'])?(int)$_GET['bayar'] : 1;
  $halaman_awal = ($halaman>1)?($halaman * $batas) - $batas : 0;
  $previous = $halaman - 1;
  $next = $halaman + 1;

  $data = mysqli_query($koneksi,"SELECT * FROM tbl_merk_barang");
  $jumlah_data = mysqli_num_rows($data);
  $total_halaman = ceil($jumlah_data/$batas);

    $akun = mysqli_query($koneksi,"SELECT tbl_barcode_barang.nama_barang,tbl_barcode_barang.img, tbl_barcode_barang.code_barcode AS ID_BARCODE,
      tbl_nota.nomor_nota,tmp_jual.id_penjualan_d,tmp_jual.jumlah_beli,tmp_jual.harga_satuan,tmp_jual.total
      FROM tbl_nota INNER JOIN tmp_jual ON tbl_nota.id_penjualan_m = tmp_jual.id_penjualan_m
      INNER JOIN tbl_barcode_barang ON tbl_barcode_barang.id_barcode = tmp_jual.id_barcode
      WHERE tbl_nota.nomor_nota = '".$_SESSION['nota']."'");
  // $akun = mysqli_query($koneksis,"SELECT tbl_merk_barang.*, akun.nama FROM tbl_merk_barang INNER JOIN akun ON tbl_merk_barang.idAkun =
  //akun.idAkun ORDER BY tbl_merk_barang.id_merk_barang DESC LIMIT $halaman_awal,$batas");
  $no = $halaman_awal + 1;

  if (mysqli_num_rows($akun)>0) {
$total_bayar = 0;
    while ($i = mysqli_fetch_array($akun)) {
      $total_bayar += $i['total'];
      ?>
      <tr>

        <td>
          <?php echo $no++;?>
          <input hidden value="<?php echo $i['id_penjualan_d']?>" type="number" id="id"></input>
        </td>

        <td class="table-user">
          <img src="assets/images/products/<?php echo $i['img']?>" alt="table-user" class="mr-2 rounded-circle">
          <a href="javascript:void(0);" class="text-body font-weight-semibold"><?php echo $i['nama_barang']?></a>

            <!-- <?php echo $note; ?> -->

        </td>

        <td><?php echo $i['ID_BARCODE']?></td>
        <td>
          <i class=""></i> <?php echo 'Rp.'. number_format( $i['harga_satuan'])?>
        </td>
        <td>
          <center>
         <!--  <span class="font-weight-semibold"><input readonly id="form-edit-keranjang" type="number" value="<?php echo $i['jumlah_beli']?>"></input></span> -->
            <span class="font-weight-semibold"><?php echo $i['jumlah_beli']?></span>
        </center>
        </td>

        <td>
          <i class="mdi mdi-check-all text-success"></i> <?php echo 'Rp.'. number_format( $i['total'])?>
        </td>


        <td>

          <a data-toggle="modal" data-target="#EditCart<?php echo $i['id_penjualan_d'];?>"  href="#" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>

        <a href="#" data-toggle="modal" data-target="#hapusCart<?php echo $i['id_penjualan_d']?>" class="action-icon"> <i class="mdi mdi-delete"></i></a>
        </td>

      </tr>
      <?php include '../modalView/EditCart.php';?>
      <?php include '../modalView/HapusCart.php';?>
     

      <?php
     


    }

    ?>
    <tr>
      <th colspan="5"><h3></h3></th>
      <th><h3><?php echo 'Rp'. number_format($total_bayar);?></h3></th>
      <th><input hidden id="TOTALBAYAR"  value="<?php echo  $total_bayar;?>"></input>
        <!-- <a href="#"><button id="bayar"  data-toggle="modal" data-target="#Modelbayar" type="button" class="btn btn-danger waves-effect waves-light mr-1"><i class="mdi mdi-database"></i>Bayar</button></a> -->


      </th>
    </tr>
    <?php


  }else{
    ?>
    <tr>
      <td colspan="7">
        <div style="padding:15px;" class="alerts alert-warning"  role="alert">
          <i class="mdi mdi-alert-outline mr-2"></i> Kantong <strong>Belanja!</strong> belum terisi. <?php echo $_SESSION['nota']?>
        </div>
      </td>
    </tr>
    <?php
  }
$_SESSION['nota'] = "";
  ?>
</tbody>
</table>




<!-- <script>

$("#edit-keranjang").click(function(){
  $("#form-edit-keranjang").prop("readonly", false);

});

$("#form-edit-keranjang").keyup(function(){
    // var qty = $("#form-edit-keranjang").val();
    // var id  = $("#id").val();
    var FormData = "id="+encodeURI($('#id').val());
	FormData += "&qty="+encodeURI($('#form-edit-keranjang').val());
  $.ajax({

    url : 'kasir/edit_keranjang.php',
    data: FormData,
    success : function(data){
      if (data) {
        // alert('Edit Berhasil!');
        // location.reload(true);
        $("#tampil").load("kasir/tampil.php");
      }else{
        alert('error');
      }
    }

  });
});





</script> -->
