<div id="modalMantenimiento" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalMantenimientoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Cambiado a modal-xl -->
        <div class="modal-content bd-0">
            <div class="modal-header pd-y pd-x-25">
                <h6  id="lbltitulo"class="text-14 mg-b-0 tx-uppercase tx-inverse tx_bold"></h6>
            </div>
            <form method="post" id="cursos_form">
                <div class="modal-body pd-25">
                    <input type="hidden" name="cur_id" id="cur_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Categoria:<span class="tx-danger"> *</span></label>
                                <select class="form-control select2" style="width:100%" data-placeholder="Seleccione" name="cat_id" id="cat_id">
                                    <option label="Seleccione"></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">    
                            <div class="form-group">
                                <label class="form-control-label">Nombre:<span class="tx-danger"> *</span></label>
                                <input class="form-control tx-uppercase" id="cur_nom" type="text" name="cur_nom" required>
                            </div>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">    
                            <div class="form-group">
                                <label class="form-control-label">Descripcion:<span class="tx-danger"> *</span></label>
                                <textarea class="form-control tx-uppercase" id="cur_des" type="text" name="cur_des" rows="8" style="resize: none;" required></textarea>
                            </div>    
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Fecha Inicio:<span class="tx-danger"> *</span></label>
                                <input class="form-control tx-uppercase" id="fech_ini" type="date" name="fech_ini" required>
                            </div> 
                        </div>    
                        <div class="col-md-6">    
                            <div class="form-group">
                                <label class="form-control-label">Fecha Final:<span class="tx-danger"> *</span></label>
                                <input class="form-control tx-uppercase" id="fech_fin" type="date" name="fech_fin" required>
                            </div>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">    
                            <div class="form-group">
                                <label class="form-control-label">Instructor:<span class="tx-danger"> *</span></label>
                                <select class="form-control select2" style="width:100%" data-placeholder="Seleccione" name="inst_id" id="inst_id">
                                    <option label="Seleccione"></option>
                                </select>
                            </div>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" name="action" value="add" class="btn btn-primary tx-13 tx-uppercase pd-y-12 pd-x-25 tx-medium"><i class="fa fa-check"></i> Guardar</button>
                                <button type="reset" class="btn btn-secondary tx-13 tx-uppercase pd-y-12 pd-x-25 tx-medium" aria-label="close" aria-hidden="true" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
                            </div>    
                        </div>
                    </div>          
                </div>
            
            </form>    
        </div>
    </div>               
</div>
