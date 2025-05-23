<div id="modalFile" class="modal modal-blur fade show" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalMantenimientoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Cambiado a modal-xl -->
        <div class="modal-content bd-0">
            <div class="modal-header pd-y pd-x-25">
                <h4  class="text-14 mg-b-0 tx-uppercase tx-inverse tx_bold"> Seleccione Imagen</h4>
            </div>
            <form method="post" id="detalle_form">
                <input type="hidden" name="curx_idx" id="curx_idx"/>
                <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="cur_img" id="cur_img"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" name="action" value="add" class="btn btn-primary tx-13 tx-uppercase pd-y-12 pd-x-25 tx-medium"><i class="fa fa-check"></i> Guardar</button>
                        <button type="reset" class="btn btn-secondary tx-13 tx-uppercase pd-y-12 pd-x-25 tx-medium" aria-label="close" aria-hidden="true" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
                    </div>    
                </div>       
            </form>    
        </div>
    </div>               
</div>
