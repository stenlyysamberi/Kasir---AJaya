  <form method="POST" action="gudang/control.php?AddStokBaru=<?php echo $i['id_barcode'];?>" enctype="multipart/form-data">

    <div id="AddStok<?php echo $i['id_barcode']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Tamba Stok Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">

                    <center>
                     <div class="col-md-4">
                      <img width="100" height="100" class="rounded-circle "  src="assets/images/products/<?php echo $i['img'];?>">

                  </div>

              </center>




              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-3" class="control-label">ID Barcode</label>
                        <input type="text" readonly="readonly" id="nama" name="nama" required="required" class="form-control" value="<?php echo $i['code_barcode'];?>"  placeholder="Enter Text">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Nama Barang</label>
                        <input type="text" readonly="readonly" id="nama" name="tgl" required="required" class="form-control" value="<?php echo $i['nama_barang'];?>"  placeholder="Enter Text">
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Stok Tersedia</label>
                        <input type="text" name=stokLama value="<?php echo $i['qty']?>" class="form-control" readonly="readonly" id="field-1" placeholder="John">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Tamba Stok</label>
                        <input type="number" name="stokBaru" class="form-control" id="field-2" placeholder="Enter Text">
                    </div>
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

