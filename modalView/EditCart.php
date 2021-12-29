<form method="POST" action="kasir/EditCart.php?id=<?php echo $i['id_penjualan_d'];?>" >

<div id="EditCart<?php echo $i['id_penjualan_d']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Edit Keranjang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">



              <div class="row">
                
                 <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Nama Produk</label>
                        <input type="text" required="required" class="form-control" value="<?php echo $i['nama_barang']?>" placeholder="Enter Text">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Jumlah Beli</label>
                        <input  type="number" name="qty" required="required" class="form-control" value="<?php echo $i['jumlah_beli'] ?>" placeholder="Enter Text">
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal" >Close</button>

            <a href="kasir/EditCart.php?id=1"><button name="simpan" class="btn btn-info waves-effect waves-light">Ok, Simpan</button></a>
        </div>



    </div>


</div>

</div>

</form>


    <script type="text/javascript">


  //   function EditCart(){

  //     var id = $("#id").val();
  //     var qty = $("#qty").val();
  //     $.ajax({
  //       typo  : 'POST',
  //       url   : 'kasir/EditCart.php?&id='+id + "&qty=" + qty,
  //       data  : id,
  //       cache : false,
  //       success : function(data){

  //           if (data) {
  //               alert('Edit Keranjang Berhasil!');
  //               location.reload(true);
  //               // $('#tampil').load("kasir/tampil.php");
  //           }else{
  //               alert('gaga;!');
  //           }

  //       }
  //   });

  // }
</script>

