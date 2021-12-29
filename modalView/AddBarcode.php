  <form method="POST" action="gudang/control.php?add" enctype="multipart/form-data">

    <div id="AddBarcode" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">



        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Add Barcode/Stok</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link">
                                New Barcode
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link active">
                               Petunjuk
                           </a>
                       </li>

                   </ul>


                   <div class="tab-content">
                    <div class="tab-pane" id="home">

                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Barcode</label>
                                <input onchange="tampil();" type="text" name="barcode" required="required" class="form-control" id="barcode" placeholder="Enter Text">

                                <p id="result"></p>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Products Name</label>
                                <input type="text" maxlength="30" name="nama" required="required" class="form-control" id="field-3" placeholder="Enter Text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Satuan Produk</label>
                                <select name="satuan-produk" class="form-control">
                                    <?php 

                                $satuan = mysqli_query($koneksi,"SELECT * FROM tbl_satuan_produk ORDER BY id_satuan DESC");
                                if (mysqli_num_rows($satuan)>0) {
                                   while($qv = mysqli_fetch_array($satuan)){
                                    ?>

                                    <option value="<?php echo $qv['id_satuan']?>"><?php echo $qv['nama_satuan']?></option>

                                    <?php
                                   }
                                }

                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div hidden class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-3" class="control-label">quantity</label>
                                <input type="number"  maxlength="30" name="banyak"  class="form-control" id="field-3" placeholder="Enter Text">
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">

                         <h4 class="header-title">Image Profil</h4>
                         <p class="sub-header">
                           Set your Profil Image.
                       </p>

                       <input type="file" required="required" name="gambar" class="form-control" width="100" />

                   </div>
               </div>

           </div>

           <div class="tab-pane show active" id="profile">
        <p>1. Pastikan perangkat mobile sudah terhubung dalam satu network.</p>
        <p>2. Pada saat pengambilan foto produk, pastika resize rasio diubah menjadi 1:1px.</p>
        <p>3. Sebelum simpan pastikan semua form input sudah terisi.</p>
        <p>4. Klik Simpan.</p>
        </div>
    </div>


    <script type="text/javascript">
        function tampil(){
            var cek = document.getElementsById('barcode').value;
            document.getElementsById('result').value = cek;

        }
    </script>






</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-info waves-effect waves-light">Ok, Simpan</button>
</div>



</div>
</div>

</div>

</form>


