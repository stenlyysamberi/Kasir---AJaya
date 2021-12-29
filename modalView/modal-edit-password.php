  <form method="POST" action="owner/addUser/control.php?pass&id=<?php echo $_SESSION['id'];?>" enctype="multipart/form-data">

    <div id="con-sandi-edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Ubah Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">


                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Password</label>
                            <input type="password" name="old-password" required="required" class="form-control" id="field-3" placeholder="Enter Text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">New Password</label>
                            <input type="password" maxlength="30" name="new-password" required="required" class="form-control" id="field-3" placeholder="Enter Text">
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