<?php include 'view/controller_get.php';?>

   


<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ajaya</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded bg-soft-primary">
                        <i class="dripicons-wallet font-24 avatar-title text-primary"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><?php benefit_today();?></h3>
                        <p class="text-muted mb-1 text-truncate">Bennefit</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded bg-soft-success">
                        <i class="dripicons-basket font-24 avatar-title text-success"></i>
                    </div>
                </div>
               
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php penjualan_today()?></span>

                        </h3>
                        <p class="text-muted mb-1 text-truncate">Banyak Terjual </p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded bg-soft-info">
                        <i class="dripicons-checkmark font-24 avatar-title text-info"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php total_barang_masuk_today()?></span></h3>
                        <p class="text-muted mb-1 text-truncate">Barang Masuk</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded bg-soft-warning">
                        <i class="dripicons-user-group font-24 avatar-title text-warning"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php karyawaan();?></span></h3>
                        <p class="text-muted mb-1 text-truncate">Karyawaan</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card-box">
            <h4 class="header-title mb-3">Transaksi Hari Ini</h4>

            <div class="table-responsive">
                <table class="table table-centered table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="border-top-0">Name Barang</th>
                            <th class="border-top-0">Nomor Nota</th>
                            <th class="border-top-0">Harga Satuan</th>
                            <th class="border-top-0">Jumlah Beli</th>
                            <th class="border-top-0">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 

                        if (mysqli_num_rows($report)>0) {
                            while ($sv = mysqli_fetch_array($report)) {
                                                        // code...
                                ?>

                                <tr>
                                    <td>
                                        <img src="assets/images/products/<?php echo $sv['img']?>" alt="user-pic" class="rounded-circle avatar-sm bx-shadow-lg" />
                                        <span class="ml-2"><?php echo $sv['nama_barang']?></span>
                                    </td>
                                    <td>

                                        <a href="index.php?cetak=<?php echo $sv['nomor_nota']?>"><span class="ml-2"><?php echo $sv['nomor_nota']?></span></a>
                                    </td>
                                    <td><?php echo 'Rp'. number_format( $sv['harga_satuan'])?></td>
                                    <td><?php echo $sv['jumlah_beli']?></td>
                                    <td><span class="badge badge-pill badge-success"><?php echo 'Rp' . number_format( $sv['total'])?></span></td>
                                </tr>

                                <?php
                            }
                        }else{
                            ?>

                            <tr>
                               <td colspan="5">
                                   <div style="padding: 10px;" class="alerts alert-warning" role="alert">
                                    <i class="mdi mdi-alert-outline mr-2"></i> Belum ada <strong>Transaksi</strong>!
                                </div>
                            </td>
                        </tr>

                        <?php
                    }

                    ?>





                </tbody>
            </table>
        </div> <!-- end table-responsive -->

    </div> <!-- end card-box-->
</div> <!-- end col-->
<div class="col-xl-6">
    <div class="card-box">
        <h4 class="header-title mb-3">Barang Masuk</h4>

        <div class="table-responsive">
            <table class="table table-centered table-hover mb-0">
                <thead>
                    <tr>
                        <th class="border-top-0">Product</th>
                        <th class="border-top-0">Jenis Satuan</th>
                        <th class="border-top-0">Tanggal Masuk</th>
                        <th class="border-top-0">Petugas</th>
                        <th class="border-top-0">Keterangan</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    if (mysqli_num_rows($barangMasuk)>0) {
                        while ($p = mysqli_fetch_array(
                            $barangMasuk)) {
                                ?>

                                <tr>
                                    <td>
                                        <img src="assets/images/products/<?php echo $p['gambar_produk']?>" alt="product-pic" height="36" />
                                        <span class="ml-2"><?php echo $p['nama_barang']?></span>
                                    </td>
                                    <td>
                                        <?php echo $p['nama_satuan']?>
                                    </td>
                                    <td><?php echo $p['tgl_masuk']?></td>
                                    <td><?php echo $p['nama']?></td>
                                    <td><span class="badge bg-soft-success text-success"><?php echo $p['jumlah_masuk']?></span></td>
                                </tr>


                                <?php
                            }
                        }else{
                         ?>

                         <tr>
                           <td colspan="5">
                               <div style="padding: 10px;" class="alerts alert-warning" role="alert">
                                <i class="mdi mdi-alert-outline mr-2"></i> Belum ada <strong>Barang!</strong> Masuk!
                            </div>
                        </td>
                    </tr>

                    <?php
                }




                ?>


            </tbody>
        </table>
    </div> <!-- end table-responsive -->
</div> <!-- end card-box-->
</div> <!-- end col-->
</div>
                        <!-- end row-->