  <!-- start page title -->
  <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">AJaya</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Owner</a></li>
                    <li class="breadcrumb-item active">Add Satuan</li>
                </ol>
            </div>
            <h4 class="page-title">Add Satuan Produk</h4>
        </div>
    </div>
</div>     
<!-- end page title -->



<?php

if (($_SESSION['pesan'])=="Berhasil") {
 ?>

 <div class="alert alert-success" role="alert">
    <i class="mdi mdi-check-all mr-2"></i> Add Account <strong>success</strong> it out!
</div>

<?php
$_SESSION['pesan']="";
}


if (($_SESSION['pesan'])=="Hapus") {
 ?>

 <div class="alert alert-success" role="alert">
    <i class="mdi mdi-check-all mr-2"></i> Delete Account <strong>success</strong> it out!
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
        <i class="mdi mdi-alert-outline mr-2"></i> Phone number is <strong>Register!</strong> please—check Again!
    </div>

    <?php
    $_SESSION['pesan']="";
}


?>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <form method="POST"  class="search-bar form-inline">
                            <div class="position-relative">
                                <input name="keyword" type="text" class="form-control" placeholder="Search...">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>                          
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right">
                            <button type="button" data-toggle="modal" data-target="#add-satuan-modal" class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> Add Satuan</button>
                            <!-- <button type="button" class="btn btn-success waves-effect waves-light mb-2 mr-1"><i class="mdi mdi-cog"></i></button> -->
                        </div>
                    </div><!-- end col-->
                </div>
                
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                        <thead class="thead-light">
                            <tr>

                                <th>No</th>
                                <th>Tanggal Buat</th>
                               
                                <th>Create By</th>
                                <th>Satuan</th>
                               
                                
                                <th style="width: 82px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                           
                            $batas = 5;
                            $halaman = isset($_GET['new-satuan'])?(int)$_GET['new-satuan'] : 1;
                            $halaman_awal = ($halaman>1)?($halaman * $batas) - $batas : 0;
                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $data = mysqli_query($koneksi,"SELECT * FROM tbl_satuan_produk");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data/$batas);


                            if (isset($_POST['keyword'])) {
                                $key = $_POST['keyword'];
                                  $akun = mysqli_query($koneksi,"SELECT akun.nama,akun.gambar,tbl_satuan_produk.id_satuan,tbl_satuan_produk.tgl,tbl_satuan_produk.nama_satuan FROM akun INNER JOIN tbl_satuan_produk ON akun.idAkun = tbl_satuan_produk.idAkun WHERE tbl_satuan_produk.nama_satuan='$key' ORDER BY tbl_satuan_produk.id_satuan DESC LIMIT $halaman_awal,$batas");
                            }else{
                                 $akun = mysqli_query($koneksi,"SELECT akun.nama,akun.gambar,tbl_satuan_produk.id_satuan,tbl_satuan_produk.tgl,tbl_satuan_produk.nama_satuan FROM akun INNER JOIN tbl_satuan_produk ON akun.idAkun = tbl_satuan_produk.idAkun ORDER BY tbl_satuan_produk.id_satuan DESC LIMIT $halaman_awal,$batas");
                            }


                          


                            



                            
                           
                            $no = $halaman_awal + 1;

                            if (mysqli_num_rows($akun)>0) {

                                while ($i = mysqli_fetch_array($akun)) {
                                 ?>
                                 <tr>

                                    <td><?php echo $no++;?></td>

                                     <td>
                                     <?php echo $i['tgl']?>
                                </td>

                                    <td class="table-user">
                                        <img src="assets/images/akun/<?php echo $i['gambar']?>" alt="table-user" class="mr-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-semibold"><?php echo $i['nama']?></a>


                                    </td>
                                  

                                 <td><?php echo $i['nama_satuan']?></td>
                                

                                <td>
                                    <a   
                                    
                                    data-toggle ="modal" data-target="#editSatuan<?php echo $i['id_satuan']; ?>"
                                    href="" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>

                                    <a href="owner/satuan/control.php?del=<?php echo $i['id_satuan']?>" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <?php include 'modalView/EditSatuan.php';?>

                            <?php
                        }


                    }else{
                        echo "<tr><td><p>Data Satuan Kosong!</p></td></tr>";
                    }

                    ?>







                </tbody>
            </table>
        </div>

        <ul class="pagination pagination-rounded justify-content-end my-2">
            <li class="page-item">
                <a class="page-link" <?php if($halaman > 1){echo "href='?new-satuan=$previous'";}?> aria-label="Previous">
                    <span aria-hidden="true">Previous</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>



            <?php 

            for($x=1; $x<=$total_halaman; $x++){
                ?>

                <li class="page-item active"><a class="page-link" 
                    href="?new-satuan=<?php echo $x?>">

                    <?php echo $x;?>


                </a></li>

                <?php
            }

            ?>


            

            <li class="page-item">
                <a class="page-link" <?php if($halaman < $total_halaman){echo "href='?new-satuan=$next'";}?>  aria-label="Next">
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