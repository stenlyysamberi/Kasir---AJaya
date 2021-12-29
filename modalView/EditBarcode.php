  <form method="POST" action="gudang/control.php?edit=<?php echo $code['id_barcode'];?>" enctype="multipart/form-data">

    <div id="EditBarcode<?php echo $code['id_barcode']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Edit Barcode</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">

                    <center>
                       <div class="col-md-4">
                          <img width="100" height="100" class="rounded-circle "  src="assets/images/products/<?php echo $code['img'];?>">

                      </div>

                  </center>



                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Barcode</label>
                            <input readonly="readonly" type="text" id="nama" name="barcode" required="required" class="form-control" value="<?php echo $code['code_barcode'];?>"  placeholder="Enter Text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Products name</label>
                            <input type="text" id="nama" name="nama" required="required" class="form-control" value="<?php echo $code['nama_barang'];?>"  placeholder="Enter Text">
                        </div>
                    </div>
                </div>

                



                <?php 

                if (($code['join_ket'])=="Berhasil") {
                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group no-margin">
                                <label for="field-7"  class="control-label">Total</label>
                                <input readonly="readonly" value="<?php echo $code['qty']?>" type="number" name="jumlah" class="form-control">
                            </div>
                        </div>
                    </div>




                    <?php
                }else{
                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Satuan</label>
                                <select class="form-control" name="satuan">
                                    
                                 <?php
                                 $go = mysqli_query($koneksi,"SELECT * FROM `tbl_satuan_produk`");
                                 while($y = mysqli_fetch_array($go)){
                                    ?>
                                    <option value="<?php echo $y['id_satuan'];?>"><?php echo $y['nama_satuan'];?></option>
                                    <?php
                                }

                                ?>


                            </select>
                        </div>
                    </div>
                </div>


               <!--  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group no-margin">
                            <label for="field-7"  class="control-label">Total</label>
                            <input  value="<?php echo $code['qty']?>" type="number" name="jumlah" class="form-control">
                        </div>
                    </div>
                </div> -->

                <?php
            }

            ?>



            <div class="row">
                <div class="col-md-12">

                   <h4 class="header-title">Image Category</h4>
                   <p class="sub-header">Set Category Image.</p>


                   <input type="file" class="form-control" name="gambar">






               </div>



           </div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light">Ok, Simpan</button>
    </div>



</div>


</div>



</div>

</form>

