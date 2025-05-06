<div id="modalCategoria" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalCategoriaLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document"> <!-- Cambiado a modal-xl -->
        <div class="modal-content bd-0">
            <div class="modal-header pd-y pd-x-25">
                <h6  class="text-14 mg-b-0 tx-uppercase tx-inverse tx_bold"> Registro Categoria</h6>
            </div>
            <form method="post" id="categoria_form">
                <div class="modal-body pd-25">
                    <input type="hidden" name="cat_id" id="cat_id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Categoria:<span class="tx-danger"> *</span></label>
                                <input class="form-control tx-uppercase" id="cat_nom" type="text" name="cat_nom" required>
                            </div>
                        </div>
                    </div>     
                </div>
                <div class="modal-footer"> 
                    <button type="submit" name="action" value="add" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-medium">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <button type="reset" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-medium" aria-label="close" aria-hidden="true" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cancelar
                    </button>
                </div> 
            </form>    
        </div>
    </div>               
</div>
