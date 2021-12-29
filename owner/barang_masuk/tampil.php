 <div class="table-responsive">


    <table class="table table-borderless table-centered mb-0">
        <thead class="thead-light">
            <tr>
                <th>Tanggal Masuk</th>
                <th>Nama Barang/Petugas</th>
                <th>Jenis Satuan</th>
                <th>Jumlah Masuk</th>
                
               
            </tr>
        </thead>
        <tbody>
            <?php

            error_reporting(0);

            $from = $_GET['from'];
            $to   = $_GET['to'];




                                        // 081217746441

                                        // 081212227730

            include '../../config/config.php';
            $report = mysqli_query($koneksi,"SELECT tbl_satuan_produk.nama_satuan,akun.nama, tbl_barcode_barang_masuk.jumlah_masuk,tbl_barcode_barang.img AS gambar_produk ,tbl_barcode_barang_masuk.tgl_masuk,tbl_barcode_barang.nama_barang FROM tbl_barcode_barang_masuk INNER JOIN tbl_barcode_barang ON tbl_barcode_barang_masuk.id_barcode = tbl_barcode_barang.id_barcode INNER JOIN tbl_satuan_produk ON tbl_satuan_produk.id_satuan = tbl_barcode_barang.id_satuan INNER JOIN akun ON akun.idAkun = tbl_barcode_barang_masuk.idAkun WHERE tbl_barcode_barang_masuk.tgl_masuk BETWEEN '$from' AND '$to'");


            if (mysqli_num_rows($report)>0) {
                $benefit = 0;

                while ($p = mysqli_fetch_array($report)) {
                 $benefit += $p['grand_total'];
                 ?>

                 <tr>
                    <td><?php echo $p['tgl_masuk']?></td>
                   
                    <td>
                        <img src="assets/images/products/<?php echo $p['gambar_produk']?>" alt="contact-img" title="contact-img" class="rounded mr-3" height="48">
                        <p class="m-0 d-inline-block align-middle font-16">
                            <a href="ecommerce-product-detail.html" class="text-reset font-family-secondary"><?php echo $p['nama_barang']?></a>
                            <br>
                            <small class="mr-2"><b><?php echo $p['nama']?></b></small>

                        </p>
                    </td>
                    <td>
                        <?php echo $p['nama_satuan'] ?>
                    </td>
                    <td>
                        <input readonly="readonly" type="number" min="1" value="<?php echo $p['jumlah_masuk']?>" class="form-control" placeholder="Qty" style="width: 90px;">
                    </td>
                    


               </tr>


               <?php
           }

           ?>


           <tr>
               <td >

               </td>

               <td >

               </td>

               <td >

               </td>

               <td >

               </td>

               <td >
                  <!--  <h3>Benefit</h3> -->
               </td>

               <td >
                  <!--  <h3><?php echo 'Rp.' . number_format($benefit)?></h3> -->
               </td>
           </tr>

           <?php

       }else{
         ?>

         <tr>
             <td colspan="7">
                 <div style="padding: 10px;" class="alerts alert-warning" role="alert">
                    <i class="mdi mdi-alert-outline mr-2"></i> Data laporan <strong>Kosong!</strong> silakan ulangi dengan priode tanggal yang berbeda!
                </div>
            </td>
        </tr>

        <?php
    }


    ?>



</tbody>


</table>
                    </div> <!-- end table-responsive-->