 <style type="text/css">
     * {
    font-size: 12px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 0px solid black;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 100px;
    max-width: 75px;
}

td.quantity,
th.quantity {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.price,
th.price {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 255px;
    max-width: 255px;
}

img {
    max-width: auto;
    width: auto;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
 </style>
<body>
 
 <?php 

 include '../config/config.php';



$json = mysqli_query($koneksi,"SELECT tbl_nota.keterangan_lain, tbl_nota.tanggal, tbl_nota.nomor_nota,
  tbl_nota.grand_total,tbl_nota.bayar,tbl_barang.harga,
  tbl_barcode_barang.nama_barang,tbl_penjualan_detail.jumlah_beli,tbl_penjualan_detail.total
  FROM tbl_nota INNER JOIN tbl_penjualan_detail ON tbl_nota.id_penjualan_m = tbl_penjualan_detail.id_penjualan_m
  INNER JOIN tbl_barcode_barang ON tbl_barcode_barang.id_barcode = tbl_penjualan_detail.id_barcode
  INNER JOIN tbl_barang ON tbl_barang.id_barang = tbl_penjualan_detail.id_barang
  WHERE tbl_nota.nomor_nota = '".$_GET['cetak']."'");


 ?>
 <div class="ticket">
            <?php

        echo '<img src="../PHPbarcode/barcode.php?text=' .$_GET['cetak'].'&size=50"/>';
            ?>
            <p class="centered">TOKO ANUGRAH JAYA
              
            <br>Jl. Raya Sentani - Depapre Kab.Jayapura</p>
            <h2 class="centered">"Nota Penjualan"</h2>
            <hr>
            <table>
                <thead>
                    <tr>
                        
                        <th class="description">Nama</th>
                        <th class="description">Hrg</th>
                        <th class="quantity">Qty</th>
                        <th class="description">Total</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    if (mysqli_num_rows($json)>0) {
                       while ($y = mysqli_fetch_array($json)) {
                          ?>

                    <tr>
                       
                        <td class="description"><?php echo $y['nama_barang']?></td>
                        <td class="price"><?php echo 'Rp'. number_format( $y['harga'])?></td>
                        <td class="price"><?php echo $y['jumlah_beli']?></td>
                        <td class="price"><?php echo 'Rp'. number_format( $y['total'])?></td>
                    </tr>



                          <?php
                       }
                    }

                    ?>


                    <?php 

                    $only = mysqli_query($koneksi,"SELECT tbl_nota.keterangan_lain, tbl_nota.tanggal, tbl_nota.nomor_nota,
  tbl_nota.grand_total,tbl_nota.bayar,tbl_barang.harga,
  tbl_barcode_barang.nama_barang,tbl_penjualan_detail.jumlah_beli,tbl_penjualan_detail.total
  FROM tbl_nota INNER JOIN tbl_penjualan_detail ON tbl_nota.id_penjualan_m = tbl_penjualan_detail.id_penjualan_m
  INNER JOIN tbl_barcode_barang ON tbl_barcode_barang.id_barcode = tbl_penjualan_detail.id_barcode
  INNER JOIN tbl_barang ON tbl_barang.id_barang = tbl_penjualan_detail.id_barang
  WHERE tbl_nota.nomor_nota = '".$_GET['cetak']."'");

                     $getonly = mysqli_fetch_array($only);

                    ?>

                    <tr>
                      
                        <td align="right" colspan="3" class=" quantity">TOTAL</td>
                        <td class="description"><?php echo 'Rp'.number_format($getonly['grand_total'])?></td>

                    </tr>

                    <tr>
                        
                        <td align="right" colspan="3" class="quantity">TUNAI</td>
                        <td class="description"><?php echo 'Rp'.number_format($getonly['bayar'])?></td>
                       
                    </tr>
                    
                    <tr>
                        
                        <td align="right" colspan="3" class="quantity">KEMBALI</td>
                        <td class="description"><?php echo 'Rp'.number_format(($getonly['bayar'])-($getonly['grand_total']))?></td>
                       
                    </tr>
                </tbody>
            </table>
            <p class="centered">Terima Kasih atas kunjungan Anda <br>
        
            Barang yang sudah dibeli tidak dapat ditukar atau dikembalikan.
                    
            </p>
            
        </div>
        <button id="btnPrint" class="hidden-print">Print</button>
        <button id="back" class="hidden-print">Back</button>
        
                    
        
</body>


<script type="text/javascript">          
window.print();

const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
    window.print();
});

var $back = document.querySelector("#back");
$back.addEventListener('click',() =>{
    window.location.href = "../index.php?bayar=1"; 
});

 
   
        </script>