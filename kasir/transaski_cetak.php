<?php

$json = mysqli_query($koneksi,"SELECT tbl_nota.keterangan_lain, tbl_nota.tanggal, tbl_nota.nomor_nota,
  tbl_nota.grand_total,tbl_nota.bayar,tbl_barang.harga,
  tbl_barcode_barang.nama_barang,tbl_penjualan_detail.jumlah_beli,tbl_penjualan_detail.total
  FROM tbl_nota INNER JOIN tbl_penjualan_detail ON tbl_nota.id_penjualan_m = tbl_penjualan_detail.id_penjualan_m
  INNER JOIN tbl_barcode_barang ON tbl_barcode_barang.id_barcode = tbl_penjualan_detail.id_barcode
  INNER JOIN tbl_barang ON tbl_barang.id_barang = tbl_penjualan_detail.id_barang
  WHERE tbl_nota.nomor_nota = '".$_GET['cetak']."'");

  $only = mysqli_fetch_array($json);

?>



<script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}


 
</script>

<div class="row">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">AJaya</a></li>
          <li class="breadcrumb-item"><a href="javascript: void(0);">Kasir</a></li>
          <li class="breadcrumb-item active">Print</li>
        </ol>
      </div>
      <h4 class="page-title">Cetak Transaksi</h4>

    </div>
  </div>
</div>

<div id="cetak" class="row">
    <div class="col-12">
        <div class="card-box">
            <!-- Logo & title -->
            <div class="clearfix">
                <div class="float-left">
                  <h2><b>Toko Anugrah Jaya</b></h2>
                  <p class="text-muted">
Jl. Raya Sentani - Depapre Kab. Jayapura <br>Papua Indonesia </p>
                </div>
                <div class="float-right">
                  <?php

                  echo '<img src="PHPbarcode/barcode.php?text=' .$_GET['cetak'].'&size=50"/>';
                  ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mt-3">

                        <!-- <h2><b>Toko Anugrah Jaya</b></h2>
                        <p class="text-muted">Jl.Airport Sentani, Nendali Sentani Timur Kab. Jayapura <br>Papua Indonesia </p> -->
                    </div>

                </div><!-- end col -->
                <div class="col-md-4 offset-md-2">
                    <div class="mt-3 float-right">
                        <p class="m-b-10"><strong>Date/Time :</strong> <span class="float-right"><?php echo $only['tanggal']?></span></p>
                        <!-- <p class="m-b-10"><strong>Keterangan : </strong> <span class="float-right"><?php echo $only['keterangan_lain']?></span></p> -->
                        <p class="m-b-10"><strong>No.Nota :</strong> <span class="float-right"><?php echo $only['nomor_nota']?> </span></p>

                        <input hidden id="no-nota" type="text" value="<?php echo $only['nomor_nota']?>" name="">
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->



            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table mt-4 table-centered">
                            <thead>
                            <tr><th>#</th>
                                <th>Nama Barang</th>
                                <th style="width: 10%">qty</th>
                                <th style="width: 10%">Harga</th>
                                <th style="width: 10%" class="text-right">Total</th>
                            </tr></thead>
                            <tbody>
                              <?php
                              $no = 1;
                              $x = mysqli_query($koneksi,"SELECT tbl_nota.keterangan_lain, tbl_nota.tanggal, tbl_nota.nomor_nota,
                                tbl_nota.grand_total,tbl_nota.bayar,tbl_barang.harga,
                                tbl_barcode_barang.nama_barang,tbl_penjualan_detail.jumlah_beli,tbl_penjualan_detail.total
                                FROM tbl_nota INNER JOIN tbl_penjualan_detail ON tbl_nota.id_penjualan_m = tbl_penjualan_detail.id_penjualan_m
                                INNER JOIN tbl_barcode_barang ON tbl_barcode_barang.id_barcode = tbl_penjualan_detail.id_barcode
                                INNER JOIN tbl_barang ON tbl_barang.id_barang = tbl_penjualan_detail.id_barang
                                WHERE tbl_nota.nomor_nota = '".$_GET['cetak']."'");
                              if (mysqli_num_rows($x)>0) {

                                while ($a = mysqli_fetch_array($x)) {
                                  ?>

                                  <tr>
                                      <td><?php echo $no++?></td>
                                      <td>
                                          <b><?php echo $a['nama_barang']?></b>
                                      </td>
                                      <td><?php echo $a['jumlah_beli']?></td>
                                      <td><?php echo 'Rp'. number_format($a['harga'])?></td>
                                      <td class="text-right"><?php echo 'Rp'. number_format($a['total'])?></td>
                                  </tr>

                                  <?php
                                }


                              }



                              ?>



                            </tbody>
                        </table>
                    </div> <!-- end table-responsive -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-sm-6">
                    <div class="clearfix pt-5">
                        <h6 class="text-muted">Catatan:</h6>

                        <small class="text-muted">
                            Terima Kasih atas kunjungan Anda Periksa barang sebelum dibeli

                            Barang yang sudah dibeli tidak dapat ditukar atau dikembalikan.
                        </small>
                    </div>
                </div> <!-- end col -->
                <div class="col-sm-6">
                    <div class="float-right">
                        <p><b>Sub-total:</b> <span class="float-right"><?php echo 'Rp'.number_format($only['grand_total'])?></span></p>
                        <p><b>Tunai:</b> <span class="float-right"><?php echo 'Rp'.number_format($only['bayar'])?></span></p>
                        <h3><?php echo 'Rp'.number_format(($only['bayar'])-($only['grand_total']))?></h3>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            <div class="mt-4 mb-1">
                <div class="text-right d-print-none">
                    <button id="cetak" type="submit" name="save" class="btn w-sm btn-danger waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i>Cetak</button>
                    <!-- <a onclick="printContent('cetak')" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a> -->
                    <!-- <a href="#" class="btn btn-info waves-effect waves-light">Submit</a> -->
                </div>
            </div>
        </div> <!-- end card-box -->
    </div> <!-- end col -->
</div>
<!-- end row -->




