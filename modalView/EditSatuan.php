  <form method="POST" action="owner/satuan/control.php?edit=<?php echo $i['id_satuan'];?>" >


<div id="editSatuan<?php echo $i['id_satuan']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Edit Satuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">

                 


                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Nama Satuan</label>
                            <input type="text" name="nama" required="required" class="form-control" value="<?php echo $i['nama_satuan']?>" placeholder="Enter Text">
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Create Date</label>
                            <input readonly="readonly" type="text" id="nama" name="tgl" required="required" class="form-control" value="<?php echo $i['tgl'] ?>" placeholder="Enter Text">
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