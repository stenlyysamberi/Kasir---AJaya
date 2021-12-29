  <form method="POST" action="category/control.php?add" enctype="multipart/form-data">

    <div id="add-category-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">


                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Nama Category</label>
                            <input type="text" name="nama" required="required" class="form-control" id="field-3" placeholder="Enter Text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Create Date</label>
                            <input type="text" readonly="readonly" maxlength="30" name="username" required="required" class="form-control" value="<?php echo date('l, m D Y')?>" id="field-3" placeholder="Username">
                        </div>
                    </div>
                </div>

                

           

                
               

                <div class="row">
                    <div class="col-md-12">

                         <h4 class="header-title">Image Category</h4>
                        <p class="sub-header">
                           Set Image on Category.
                        </p>

                        <input type="file" required="required" name="gambar" class="form-control" width="100" />
                        
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