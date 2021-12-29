<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ajaya</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Database</a></li>
                    <li class="breadcrumb-item active">Add Stok</li>
                </ol>
            </div>
            <h4 class="page-title">Tamba Stok Barang</h4>
        </div>
    </div>
</div>     
<!-- end page title -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-8">
                    <form method="POST" class="form-inline" action="#">
                        <div class="form-group">
                            <label for="inputPassword2" class="sr-only">Search</label>
                            <input type="search" name="keyword" class="form-control" id="inputPassword2" placeholder="Search...">
                        </div>
                       
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="text-lg-right mt-3 mt-lg-0">
                        <button type="button" class="btn btn-success waves-effect waves-light mr-1"><i class="mdi mdi-cog"></i></button>

                       
                    </div>
                </div><!-- end col-->
            </div> <!-- end row -->
        </div> <!-- end card-box -->
    </div> <!-- end col-->
</div>
<!-- end row-->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"></h4>
                <p class="text-muted font-13 mb-4">
                   Penambahan data jumlah stok barang yang telah habis dibelanjahkan, dengan cara scan terlebih dulu <code>ID Barcode</code> pada form pencarian gunakan memastikan stok barang tersedia. Jika Alert <b>Data Stok Barang Tidak ditemukan?</b> mohon dipastikan ID Barcode telah di setujui oleh owner.
                    
                </p>
                <div class="table-responsive">
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">

                    <thead>
                        <tr>
                            <th>ID Barcode</th>
                            <th>Nama Products</th>
                            <th>Display Pictures</th>
                            <th>Jumlah Barang</th>
                            <th>Status</th>

                        </tr>
                    </thead>

                    <tbody>

                        <?php 

                        if (isset($_POST['keyword'])) {
                            $cari = $_POST['keyword'];
                            $product = mysqli_query($koneksi,"SELECT * FROM tbl_barcode_barang WHERE join_ket='Berhasil' AND code_barcode LIKE '%$cari%' OR nama_barang LIKE '%$cari%'");
                        }else{
                         $product = mysqli_query($koneksi,"SELECT * FROM tbl_barcode_barang WHERE join_ket='Berhasil' ORDER BY id_barcode DESC");
                     }

                     if (mysqli_num_rows($product)>0){
                       while ($i = mysqli_fetch_array($product)) {
                          ?>

                          <tr>
                            <td><a data-toggle="modal" data-target="#AddStok<?php echo $i['id_barcode']?>" href="#"><?php echo $i['code_barcode']?></a></td>
                            <td><?php echo $i['nama_barang']?></td>
                            <td><img width="50" height="50" class="rounded-circle" src="assets/images/products/<?php echo $i['img']?>"></td>
                            <td><?php echo $i['qty']?></td>
                            <td>

                               <center>
                                   
                             
                                <?php 
                                if (($i['join_ket'])=="Pendding") {
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

                          </center>


                    </td>

                </tr>

                <?php

                include 'modalView/AddStok.php';

            }



        }else{
            ?>

            <tr>

                <td colspan="5">

                    <div class="col-md-12 ">
                        <div style="padding:20px;" class="alerts alert-warning" role="alert">
                            <i class="mdi mdi-alert-outline mr-2"></i> Data Stok Barang <strong>Tidak</strong> ditemukan!
                        </div>
                    </div>

                </td>

            </tr>

            <?php
        }



        ?>



    </tbody>

</table>
</div>
</div>
</div>
</div>
</div>