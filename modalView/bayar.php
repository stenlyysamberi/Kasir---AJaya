
<div id="Modelbayar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog"  >
    <div class="modal-content">
      <form action="kasir/simpan_transaksi.php" method="POST">
        <div class="modal-header">

          <h4 class="modal-title">Payment/Bayar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body p-4">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">

                <center><h3 id="VIEWBAYAR">Rp.0</h3></center>
                <input hidden="hide"  id="uangBayar" readonly type="text" name="grand-total" required="required" class="form-control"  placeholder="Tanggal/Jam">
                <input hidden  id="modal-nota" readonly type="text" name="nota" required="required" class="form-control"  placeholder="Tanggal/Jam">
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="field-3" class="control-label">Tanggal</label>
                <input  id="tanggal" readonly  type="text" name="tgl-transaksi" required="required" class="form-control" value="<?php echo date("Y-m-d h:i:sa")?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="field-3" class="control-label">No.Nota</label>
                <input  type="text" name="nota" id="nota" required="required" class="form-control" readonly="readonly" value="<?php echo $nota_barang?>">
              </div>
            </div>
          </div>

          <div hidden class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="field-3" class="control-label">Pelanggan</label>
                <input type="text"   name="member"  class="form-control" id="field-3" placeholder="Username">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="field-3" class="control-label">Jumlah Uang</label>
                <input type="number" maxlength="30" name="jumlah-uang" required="required" class="form-control" id="UangCash" >
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group no-margin">
                <label for="field-7" class="control-label">Uang Kembali</label>
                <input  name="kembalian" readonly="readonly" required ="required" id="Kembalian" class="form-control"></input>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group no-margin">
                <label for="field-7" class="control-label">Keterangan</label>
                <textarea name="ket-trasaski" class="form-control">Terima Kasih! Anugrah Jaya</textarea>
              </div>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
          <button id=bayarCetak type="submit" class="btn btn-success waves-effect waves-light">Bayar Cetak /</button>
          <!-- <button id="btn-bayar-cetak" class="btn btn-success waves-effect waves-light">Bayar Cetak</button> -->
        </div>

      </form>

    </div>
  </div>

</div>

<script type="text/javascript">
  function HitungTotalKembalian(){

    var Cash = $("#UangCash").val();
    var TotalBayar = $("#uangBayar").val();

    if(parseInt(Cash) >= parseInt(TotalBayar)){
      var Selisih = parseInt(Cash) - parseInt(TotalBayar);
      $("#Kembalian").val(to_rupiah(Selisih));
    // alert(Selisih);
  } else {
    $("#Kembalian").val('');
  }
}

// function bayar_cetak(){

//   var nota = $("#nota").val();
//   var tgl = $("#tanggal").val();
//   var hml_bayar = $("#UangCash").val();
//   var kembalian = $("#Kembalian").val();
  
  
//   if (tgl!="" && hml_bayar !="" && kembalian !="" && nota !="") {

//     var data = $('#form-bayar').serialize();
//     $.ajax({
//       typo  : 'POST',
//       url   : 'kasir/simpan_transaksi.php',
//       data  : data,
//       // cache : false,
//       success : function(data){
//         window.location = "kasir/tnx_fix.php?cetak="+nota; 
       
//       }
//     });
    
//   }else{
//     alert("Pastikan Semua inputan sudah terisi")
//   }

// }
</script>


