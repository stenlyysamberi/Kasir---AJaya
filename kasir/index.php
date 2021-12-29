  <!-- start page title -->
  <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">AJaya</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Owner</a></li>
                    <li class="breadcrumb-item active">Add Account</li>
                </ol>
            </div>
            <h4 class="page-title">Payment</h4>
        </div>
    </div>
</div>     
<!-- end page title -->



<?php
include 'auto_nota.php';
if (($_SESSION['pesan'])=="Berhasil") {
   ?>

   <div class="alert alert-success" role="alert">
    <i class="mdi mdi-check-all mr-2"></i> Cart Edit <strong>success</strong> it out!
</div>

<?php
$_SESSION['pesan']="";
}


if (($_SESSION['pesan'])=="Hapus") {
   ?>

   <div class="alert alert-success" role="alert">
    <i class="mdi mdi-check-all mr-2"></i> Delete Cart <strong>success</strong> it out!
</div>

<?php
$_SESSION['pesan']="";
}

if (($_SESSION['pesan'])=="Gagal") {
    ?>

    <div class="alert alert-danger" role="alert">
        <i class="mdi mdi-block-helper mr-2"></i> This is a <strong>danger</strong> alert—check it out!
    </div>
    <?php
    $_SESSION['pesan']="";
}



if (($_SESSION['pesan'])=="hpActiv") {
    # code...
    ?>

    <div class="alert alert-warning" role="alert">
        <i class="mdi mdi-alert-outline mr-2"></i> Produk sudah di <strong>Tambahkan!</strong> please—check Again!
    </div>

    <?php
    $_SESSION['pesan']="";
}


?>

<div class="row">
    <div class="col-12">
      <div class="card-box">
        <div class="row">
          <div class="col-lg-8">

            <div class="form-group">
              <div class="col-4">
                <h2 id="bayar-total">Rp.0</h2>
                <input hidden="hide" id="harga"  readonly="readonly"  class="form-control"  placeholder="0">
            </div>
        </div>


    </div>
    <div class="col-lg-4">
        <div class="text-lg-right mt-3 mt-lg-0">
          <button data-toggle="modal" data-target="#Modelbayar" id="bayar" type="button" class="btn btn-danger waves-effect waves-light mr-1"><i class="mdi mdi-database"></i>Bayar -</button>

          <a id="addCart"  data-toggle="modal" data-target="#AddCart" href="#" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-cart"></i>Add Cart +</a>
      </div>
  </div><!-- end col-->
</div> <!-- end row -->
</div> <!-- end card-box -->
</div> <!-- end col-->
</div>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <!-- <div class="col-md-6">
                        <form method="POST"  class="search-bar form-inline">
                            <div class="position-relative">
                                <input name="keyword" type="text" class="form-control" placeholder="Search...">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>                          
                    </div> -->
                    <!-- <div class="col-md-6">
                        <div class="text-md-right">
                            <button type="button" data-toggle="modal" data-target="#add-category-modal" class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-cart mr-1"></i> Add Cart</button>
                            <button type="button" class="btn btn-success waves-effect waves-light mb-2 mr-1"><i class="mdi mdi-cog"></i></button>
                        </div>


                    </div> -->


                </div>
                
                <div class="table-responsive">
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
                        echo $key = $_POST['keyword'];
                        $batas = 5;
                        $halaman = isset($_GET['category'])?(int)$_GET['category'] : 1;
                        $halaman_awal = ($halaman>1)?($halaman * $batas) - $batas : 0;
                        $previous = $halaman - 1;
                        $next = $halaman + 1;

                        $data = mysqli_query($koneksi,"SELECT * FROM tbl_kategori_barang");
                        $jumlah_data = mysqli_num_rows($data);
                        $total_halaman = ceil($jumlah_data/$batas);


                        $cari = mysqli_query($koneksi,"SELECT * FROM tbl_kategori_barang WHERE nama='$key'");




                        $no=1;
                        $akun = mysqli_query($koneksi,"SELECT tbl_barcode_barang.nama_barang,tbl_barcode_barang.img, tbl_barcode_barang.code_barcode AS ID_BARCODE, tmp_jual.id_penjualan_d,tmp_jual.jumlah_beli,tmp_jual.harga_satuan,tmp_jual.total FROM tbl_barcode_barang INNER JOIN tmp_jual ON tbl_barcode_barang.id_barcode = tmp_jual.id_barcode");
                        $no = $halaman_awal + 1;

                        if (mysqli_num_rows($akun)>0) {

                            while ($i = mysqli_fetch_array($akun)) {
                             $total_bayar += $i['total'];
                             ?>
                             <tr>

                                <td><?php echo $no++;?></td>

                                <td class="table-user">
                                    <img src="assets/images/products/<?php echo $i['img']?>" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold"><?php echo $i['nama_barang']?></a>


                                </td>


                                <td><?php echo $i['ID_BARCODE']?></td>
                                <td>
                                  <?php echo 'Rp.'. number_format($i['harga_satuan'])?>
                              </td>
                              <td><?php echo $i['jumlah_beli']?></td>
                              <td><?php echo 'Rp.'. number_format($i['total'])?></td>

                              <td>
                                <a   

                                data-toggle ="modal" data-target="#EditCart<?php echo $i['id_penjualan_d']; ?>"
                                href="" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>




                                <a href="kasir/delCart.php?id=<?php echo $i['id_penjualan_d']?>" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        <?php include 'modalView/EditCart.php';?>

                        <?php
                    }


                }else{
                    ?>
                    <tr>
                      <td colspan="7">
                        <div style="padding:15px;" class="alerts alert-warning"  role="alert">
                            <i class="mdi mdi-alert-outline mr-2"></i> <strong>Belanjaan!</strong> belum terisi.
                      </div>
                  </td>
              </tr>
              <?php
          }

          ?>

          <tr>
            <td>
                <input id="tunai" hidden="hide" type="text" value="<?php echo $total_bayar?>">
                <input hidden="hide" id="bayar-tampil" type="text" value="<?php echo 'Rp.'. number_format($total_bayar)?>">
            </td>
        </tr>



    </tbody>
</table>
</div>

<ul class="pagination pagination-rounded justify-content-end my-2">
    <li class="page-item">
        <a class="page-link" <?php if($halaman > 1){echo "href='?category=$previous'";}?> aria-label="Previous">
            <span aria-hidden="true">Previous</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>



    <?php 

    for($x=1; $x<=$total_halaman; $x++){
        ?>

        <li class="page-item active"><a class="page-link" 
            href="?category=<?php echo $x?>">

            <?php echo $x;?>


        </a></li>

        <?php
    }

    ?>


    <?php include 'modalView/bayar.php'; ?>
    <?php include 'modalView/AddCart.php';?>
    <li class="page-item">
        <a class="page-link" <?php if($halaman < $total_halaman){echo "href='?category=$next'";}?>  aria-label="Next">
            <span aria-hidden="true">Next</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
</ul>
</div> <!-- end card-body-->
</div> <!-- end card-->
</div> <!-- end col -->
</div>
                        <!-- end row -->