<form method="POST" action="#">


    <div id="hapusCart<?php echo $i['id_penjualan_d']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog">



            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Hapus Keranjang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">

                    <input type="text" name="id" id="id" value="<?php echo $i['id_penjualan_d']?>">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                <p>apakah, anda yakin akan Hapus Belanjaan?</p>



                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal" >Close</button>

                    <button name="del-btn" type="submit" class="btn btn-danger waves-effect waves-light">Ok, Hapus</button>
                </div>



            </div>


        </div>

    </div>
</form>
<?php 

 if (isset($_POST['del-btn'])) {
     // code...
    //$id = 'Hello';
   $id= $_POST['id'];
   // echo "<script>alert('$id')</script>";
    mysqli_query($koneksi,"DELETE FROM `tmp_jual`
    WHERE id_penjualan_d='$id'");
 }

?>


<script type="text/javascript">



  //   function delCart(){

  //     var id = $("#id").val();
  //     var qty = $("#qty").val();
  //     $.ajax({
  //       typo  : 'POST',
  //       url   : 'kasir/delCart.php?&id='+id,
  //       data  : id,
  //       cache : false,
  //       success : function(data){

  //           if (data) {
  //               alert('berhasil');
  //               location.reload(true);
  //               //$('#tampil').load("kasir/tampil.php");
  //           }else{
  //               alert('gagal!');
  //           }

  //       }
  //   });

  // }
</script>

