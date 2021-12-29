<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">AJaya</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Owner</a></li>
                    <li class="breadcrumb-item active">Aproval</li>
                </ol>
            </div>
            <h4 class="page-title">Aproval Products</h4>
        </div>
    </div>
</div>



<div class="row">

    <?php

    if (isset($_POST['keyword'])) {
        $cari = $_POST['keyword'];
        $product = mysqli_query($koneksi,"SELECT * FROM tbl_barcode_barang WHERE code_barcode LIKE '%$cari%' OR nama_barang LIKE '%$cari%'");
    }else{

        $product = mysqli_query($koneksi,"SELECT tbl_satuan_produk.nama_satuan,tbl_barcode_barang.* FROM tbl_satuan_produk INNER JOIN tbl_barcode_barang ON tbl_barcode_barang.id_satuan = tbl_satuan_produk.id_satuan WHERE tbl_barcode_barang.join_ket = 'Pendding' ORDER BY tbl_barcode_barang.id_barcode DESC");

    }

    

    if (mysqli_num_rows($product)>0) {

     while ($code = mysqli_fetch_array($product)) {
                    // code...
        ?>


        <div class="col-md-6 col-xl-3">
            <div class="card-box product-box">

                <div class="product-action">
                   <!--  <a data-toggle="modal" data-target="#Aproval<?php echo $code['id_barcode']?>" href="#" class="btn btn-success btn-xs waves-effect waves-light"><i class="mdi mdi-check"></i></a> -->

                    <a  href="index.php?set-produk&id=<?php echo $code['id_barcode']?>" class="btn btn-success btn-xs waves-effect waves-light"><i class="mdi mdi-check"></i></a>


                    <?php 
                        if (($code['join_ket']) == "Pendding") {
                           ?>

                             <a data-toggle="modal" data-target="#Tolak<?php echo $code['id_barcode']?>" href="#" class="btn btn-danger btn-xs waves-effect waves-light"><i class="mdi mdi-close"></i></a>

                           <?php
                        }
                    ?>

                   
                </div>

                <div class="bg-light">
                    <img style="width: 100%; height: 100%;"  src="assets/images/products/<?php echo $code['img']?>" alt="product-pic" class="img-fluid" />
                </div>

                <div class="product-info">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="font-16 mt-0 sp-line-1"><a href="ecommerce-product-detail.html" class="text-dark"><?php echo $code['nama_barang']?></a> </h5>
                            <div class="text-warning mb-2 font-13">

                                <?php 

                                echo '<img src="PHPbarcode/barcode.php?text=' .$code['code_barcode'].'&print=true&size=50"/>';


                                ?>

                            </div>
                            <h5 class="m-0"> <span class="text-muted"> Stocks : <?php echo $code['qty']?>/<?php echo $code['nama_satuan']?></span></h5>
                        </div>
                        <div class="col-auto">
                            <div class="aproduct-price-tag">

                                <?php 
                                if (($code['join_ket'])=="Pendding") {
                                   ?>

                                   <div class="checkbox checkbox-danger checkbox-circle mb-2">
                                    <input id="checkbox14" type="checkbox" disabled checked>
                                    <label for="checkbox14">

                                    </label>
                                </div>

                                <?php
                            }else{
                                ?>

                                <div class="checkbox checkbox-success checkbox-circle mb-2">
                                    <input id="checkbox14" type="checkbox" disabled checked>
                                    <label for="checkbox14">

                                    </label>
                                </div>

                                <?php
                            }
                            ?>


                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end product info-->
        </div> <!-- end card-box-->
    </div> <!-- end col-->

    <?php
    include 'modalView/Aproval-produk.php';
    include 'modalView/tolak-produk.php';
}

}else{
   ?>

     <div class="col-md-12 ">
        <div style="padding:20px;" class="alerts alert-warning" role="alert">
            <i class="mdi mdi-alert-outline mr-2"></i> Data <strong>Aproval Kosong</strong> Belum ada barang masuk!
        </div>
    </div>

   <?php
}




?>




</div>