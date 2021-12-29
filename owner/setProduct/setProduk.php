<?php

$id  = $_GET['id'];

$set = mysqli_query($koneksi,"SELECT tbl_satuan_produk.nama_satuan, tbl_barcode_barang.code_barcode,tbl_barcode_barang.id_barcode, tbl_barcode_barang.nama_barang,tbl_barcode_barang.img,tbl_barcode_barang.qty,tbl_barang.id_barang, tbl_barang.harga,tbl_barang.keterangan,tbl_barang.min_stok,tbl_merk_barang.id_merk_barang,tbl_merk_barang.merk,tbl_kategori_barang.id_kategori_barang,tbl_kategori_barang.kategori FROM tbl_barcode_barang INNER JOIN tbl_barang ON tbl_barcode_barang.id_barcode = tbl_barang.id_barcode INNER JOIN tbl_merk_barang ON tbl_merk_barang.id_merk_barang = tbl_barang.id_merk_barang INNER JOIN tbl_kategori_barang ON tbl_kategori_barang.id_kategori_barang = tbl_barang.id_kategori_barang INNER JOIN tbl_satuan_produk ON tbl_satuan_produk.id_satuan = tbl_barcode_barang.id_satuan WHERE tbl_barcode_barang.id_barcode ='$id'");

  if (mysqli_num_rows($set)>0) {
    $mysqli = mysqli_fetch_array($set);
    $_SESSION['STATUS-SET'] = "EDIT";
  }else{
    $tbl_barcode = mysqli_query($koneksi,"SELECT tbl_barcode_barang.*,tbl_satuan_produk.nama_satuan FROM tbl_barcode_barang INNER JOIN tbl_satuan_produk ON tbl_barcode_barang.id_satuan = tbl_satuan_produk.id_satuan WHERE id_barcode = '$id'");
    $mysqli      = mysqli_fetch_array($tbl_barcode);
    $_SESSION['STATUS-SET'] = "BARU";
  }

  $ketogori    = mysqli_query($koneksi,"SELECT * FROM tbl_kategori_barang ORDER BY id_kategori_barang DESC");
  $jenis       = mysqli_query($koneksi,"SELECT * FROM tbl_merk_barang ORDER BY id_merk_barang DESC");


  ?>

  <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <div class="page-title-right">
          <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">AJaya</a></li>
            <li class="breadcrumb-item"><a href="javascript: void(0);">Owner</a></li>
            <li class="breadcrumb-item active">Product Edit</li>
          </ol>
        </div>
        <h4 class="page-title">Add / Edit Product</h4>
        <!-- <?php echo $_SESSION['STATUS-SET'] ?> -->
      </div>
    </div>
  </div>



  <div class="row">
    <div class="col-lg-6">
      <form action="owner/setProduct/control.php?id=<?php echo $_GET['id']?>" method="post">
        <div class="card-box">
          <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>

          <div class="form-group mb-3">
            <label for="product-name">Nama Produk<span class="text-danger">*</span></label>
            <input required="required" name="nama" readonly="readonly" value="<?php echo $mysqli['nama_barang']?>" type="text" id="product-name" class="form-control" placeholder="e.g : Apple iMac">
          </div>

          <div class="form-group mb-3">
            <label for="product-reference">Minimal Stok<span class="text-danger">*</span></label>
            <input name="min" required="required" type="number" value="<?php echo $mysqli['min_stok']?>" id="product-reference" class="form-control"
            placeholder="e.g : 4">
          </div>




          <div class="form-group mb-3">
            <label for="product-category">Categories <span class="text-danger">*</span></label>
            <select name="kategori" required="required" class="form-control ">

              <option value="<?php echo $mysqli['id_kategori_barang']?>"><?php echo $mysqli['kategori']?></option>

                <?php

                while ($i = mysqli_fetch_array($ketogori)) {
                  ?>
                  <option value="<?php echo $i['id_kategori_barang']?>"><?php echo $i['kategori']?></option>
                  <?php
                }

                ?>


              </select>

            </div>


            <div class="form-group mb-3">
              <label for="product-category">Jenis<span class="text-danger">*</span></label>
              <select name="jenis" required="required" class="form-control ">

                <option value="<?php echo $mysqli['id_merk_barang']?>"><?php echo $mysqli['merk']?></option>


                <?php

                while ($x = mysqli_fetch_array($jenis)) {
                  ?>

                  <option value="<?php echo $x['id_merk_barang']?>"><?php echo $x['merk']?></option>
                  <?php
                }

                ?>



              </select>

            </div>

            <div class="form-group mb-3">
              <label for="product-price">Harga Produk<span class="text-danger">*</span></label>
              <input name="harga" value="<?php echo $mysqli['harga']?>" required="required" type="text" class="form-control" id="product-price" placeholder="Rp.0">
            </div>

            <div class="form-group mb-3">
              <label class="mb-2">Status Penjualan <span class="text-danger">*</span></label>
              <br>
              <div class="radio form-check-inline">
                <input type="radio" id="inlineRadio1" value="jual" name="radioInline" checked="">
                <label for="inlineRadio1"> Jual </label>
              </div>

              <div class="radio form-check-inline">
                <input type="radio" id="inlineRadio3" value="stok" name="radioInline">
                <label for="inlineRadio3"> Stok </label>
              </div>


            </div>

            <div class="form-group mb-0">
              <label>Keterangan</label>
              <textarea  name="ket" class="form-control">
                <?php echo $mysqli['keterangan']?>
              </textarea>
            </div>
          </div> <!-- end card-box -->
        </div> <!-- end col -->

        <div class="col-lg-6">

          <div class="card-box">
            <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Images</h5>

            <div class="bg-light">

              <img src="assets/images/products/<?php echo $mysqli['img']?>" class="img-fluid" />

            </div>



          </div> <!-- end col-->

          <div class="card-box">
            <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Meta Data</h5>

            <div class="form-group mb-3">
              <label for="product-meta-title">ID Barcode</label>
              <input required="required" readonly="readonly" type="text" value="<?php echo $mysqli['code_barcode']?>" class="form-control" id="product-meta-title" placeholder="Enter title">
            </div>

            <div class="form-group mb-3">
              <label for="product-meta-keywords">Jumlah Stok</label>
              <input required="required" type="text" class="form-control" readonly="readonly" value="<?php echo $mysqli['qty']?>" id="product-meta-keywords" placeholder="Enter keywords">
            </div>

            <div class="form-group mb-3">
              <label for="product-meta-keywords">Jenis Satuan</label>
              <input required="required" type="text" class="form-control" readonly="readonly" value="<?php echo $mysqli['nama_satuan']?>" id="product-meta-keywords" placeholder="Enter keywords">
            </div>


          </div> <!-- end card-box -->

        </div> <!-- end col-->

      </div>

      <div class="row">
        <div class="col-12">
          <div class="text-center mb-3">
            <button type="submit" name="save" class="btn w-sm btn-success waves-effect waves-light">Save & Aproval</button>
            <button type="submit" name="hapus" class="btn w-sm btn-danger waves-effect waves-light">Delete</button>
          </div>
        </div> <!-- end col -->
      </div>
    </form>
