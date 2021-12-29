  <form method="POST" action="kasir/insert.php" >

    <div id="AddCart" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Add Cart</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">


                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">ID Barcode</label>
                            <input  onkeyup="autofill()" id="kode_barang" type="text" name="id-barcode" required="required" class="form-control" placeholder="Enter Text">
                        </div>
                    </div>
                </div>

                <input hidden="hide" type="text" name="id_barang" id="id">
                <input hidden="hide" type="text" name="id_barcode" id="id_barcode">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Nama Produk</label>
                            <input type="text" readonly="readonly" name="username" required="required" class="form-control" id="nama" placeholder="Enter Text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Harga</label>
                            <input type="text" readonly="readonly"  name="username" required="required" class="form-control" id="uang" placeholder="Enter Text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Stok Ready</label>
                            <input type="number" readonly="readonly"  name="stok-ready" class="form-control" placeholder="Enter Text" id="stok-ready" required="required" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2"  class="control-label">Jumlah Beli</label>
                            <input type="number"  name="qty" class="form-control" id="jumlah_beli" required="required" >
                            
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group no-margin">
                            <label for="field-7" class="control-label">Ket</label>
                            <textarea name="ket" required="required" class="form-control" id="ket" placeholder="Enter Text">Terima Kasih!</textarea>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button id="saveCart" type="submit" class="btn btn-info waves-effect waves-light">Ok, Simpan *</button>
            </div>



        </div>
    </div>

</div>

</form>

<script type="text/javascript">



function to_rupiah(angka)
    {
      var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
      var rev2    = '';
      for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
          rev2 += '.';
      }
  }
  return 'Rp.' + rev2.split('').reverse().join('');
}

// function to_kembalian_no_rp(angka)
//     {
//       var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
//       var rev2    = '';
//       for(var i = 0; i < rev.length; i++){
//         rev2  += rev[i];
//         if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
//           rev2 += '';
//       }
//   }
//   return '' + rev2.split('').reverse().join('');
// }



function autofill(){
  var i = $("#kode_barang").val();

  $.ajax({
    url : 'kasir/autofill.php',
    data: 'kode='+i,
    success : function(data){
      if (data) {
        var json = data,
        obj = JSON.parse(json);
        $("#id").val(obj.id_barang);
        $("#id_barcode").val(obj.id_barcode);
        $("#nama").val(obj.nama);
        $("#stok-ready").val(obj.stok);
        $("#uang").val(obj.harga);
        // location.reload(true);
    }else{
        alert('error');
    }
}

});

}

function cekjumlah_beli(){
  var stok = $("#stok-ready").val();
  var beli = $("#jumlah_beli").val();

  if (parseInt(beli)>parseInt(stok)) {
    $("#jumlah_beli").val('');
    alert("Jumlah beli melebihi stok barang!");


}
}
</script>