  <form method="POST" action="jenis/control.php?edit=<?php echo $i['id_merk_barang'];?>" enctype="multipart/form-data">

    <div id="editJenis<?php echo $i['id_merk_barang']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Edit Jenis</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">

                    <center>
                       <div class="col-md-4">
                          <img width="100" height="100" class="rounded-circle "  src="assets/images/jenis/<?php echo $i['img'];?>">

                      </div>

                  </center>

                  


                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Nama Jenis</label>
                            <input type="text" id="nama" name="nama" required="required" class="form-control" value="<?php echo $i['merk'];?>"  placeholder="Enter Text">
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Create Date</label>
                            <input type="text" id="nama" name="tgl" required="required" class="form-control" value="<?php echo $i['tgl_buat'];?>"  placeholder="Enter Text">
                        </div>
                    </div>
                </div>

                


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group no-margin">
                            <label for="field-7"  class="control-label">Desc</label>
                            <textarea name="alamat"   required="required" class="form-control" id="alamat" placeholder="Enter Text"><?php echo $i['dihapus'];?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                       <h4 class="header-title">Image Jenis</h4>
                       <p class="sub-header">Set Jenis Image.</p>


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

