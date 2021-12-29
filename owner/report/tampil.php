 <div class="table-responsive">
    
  
    <table class="table table-borderless table-centered mb-0">
        <thead class="thead-light">
            <tr>
                <th>Tanggal Pembelian</th>
                <th>No. Nota</th>
                <th>Nama Barang/Petugas</th>
                
                <th>Harga</th>
                <th>Jumlah Beli</th>
                <th>Grand Total</th>
                <th style="width: 50px;"></th>
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
            $report = mysqli_query($koneksi,"SELECT akun.nama AS nama_petugas,akun.gambar, tbl_nota.nomor_nota,tbl_nota.tanggal,tbl_nota.grand_total,tbl_nota.bayar AS TUNAI, tbl_nota.tanggal,tbl_barcode_barang.nama_barang,tbl_barcode_barang.img,tbl_penjualan_detail.jumlah_beli,tbl_penjualan_detail.harga_satuan,tbl_penjualan_detail.total FROM tbl_nota INNER JOIN tbl_penjualan_detail ON tbl_nota.id_penjualan_m = tbl_penjualan_detail.id_penjualan_m INNER JOIN tbl_barcode_barang ON tbl_barcode_barang.id_barcode = tbl_penjualan_detail.id_barcode INNER JOIN akun ON akun.idAkun = tbl_nota.idAkun WHERE tbl_nota.tanggal BETWEEN '$from' AND '$to'");
            

            if (mysqli_num_rows($report)>0) {
                $benefit = 0;

                while ($p = mysqli_fetch_array($report)) {
                   $benefit += $p['grand_total'];
                   ?>

                   <tr>
                    <td><?php echo $p['tanggal']?></td>
                    <td><?php echo $p['nomor_nota']?></td>
                    <td>
                        <img src="assets/images/products/<?php echo $p['img']?>" alt="contact-img" title="contact-img" class="rounded mr-3" height="48">
                        <p class="m-0 d-inline-block align-middle font-16">
                            <a href="ecommerce-product-detail.html" class="text-reset font-family-secondary"><?php echo $p['nama_barang']?></a>
                            <br>
                            <small class="mr-2"><b><?php echo $p['nama_petugas']?></b></small>
                            
                        </p>
                    </td>
                    <td>
                        <?php echo 'Rp'. number_format($p['harga_satuan']) ?>
                    </td>
                    <td>
                        <input readonly="readonly" type="number" min="1" value="<?php echo $p['jumlah_beli']?>" class="form-control" placeholder="Qty" style="width: 90px;">
                    </td>
                    <td>
                     <?php echo 'Rp'. number_format($p['grand_total']) ?>
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
                 <h3>Benefit</h3>
             </td>

             <td >
                 <h3><?php echo 'Rp.' . number_format($benefit)?></h3>
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