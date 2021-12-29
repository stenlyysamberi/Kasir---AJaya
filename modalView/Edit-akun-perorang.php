  <?php 

  $id = $_SESSION['id'];
  $query = mysqli_query($koneksi,"SELECT * FROM akun WHERE idAkun='$id'");
  $i = mysqli_fetch_array($query);

  ?>
  <form method="POST" action="owner/addUser/control.php?myProfil=<?php echo $i['idAkun'];?>" enctype="multipart/form-data">

    <div id="con-profil-edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Edit Profil Saya</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">

                    <center>
                       <div class="col-md-12">
                          <img width="100" height="100" class="rounded-circle "  src="assets/images/akun/<?php echo $i['gambar'];?>">

                      </div>

                  </center>

                  


                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" required="required" class="form-control" value="<?php echo $i['nama'];?>"  placeholder="Enter Text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Phone</label>
                            <input type="text" id="hp" maxlength="12" name="hp" class="form-control" value="<?php echo $i['hp'];?>"   required="required" placeholder="+62">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2"  class="control-label">Level</label>
                            <input class="form-control" value="<?php echo $i['levell']?>" type="text" name="level" readonly="readonly">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group no-margin">
                            <label for="field-7"  class="control-label">Alamat Rumah</label>
                            <textarea name="alamat"   required="required" class="form-control" id="alamat" placeholder="Enter Text"><?php echo $i['alamat'];?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                       <h4 class="header-title">Image Profil</h4>
                       <p class="sub-header">Ganti Profil Baru.</p>


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

