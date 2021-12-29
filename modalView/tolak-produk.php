
<form method="POST" action="owner/aproval/control.php?del&id=<?php echo $code['id_barcode']?>" enctype="multipart/form-data">

    <div id="Tolak<?php echo $code['id_barcode']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Aproval</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">

                    <div class="row">
                        <div class="col-md-12">

                            <p>Jika pilih lanjut!. Anda akan menghapus produk tersebut dari stok barang</p>
                     </div>



                 </div>
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light">Ok, Lanjut</button>
            </div>



        </div>


    </div>



</div>

</form>

