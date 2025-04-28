<div id="modalInstructor" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalInstructorLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document"> <!-- Cambiado a modal-xl -->
        <div class="modal-content bd-0">
            <div class="modal-header pd-y pd-x-25">
                <h6 class="text-14 mg-b-0 tx-uppercase tx-inverse tx_bold">Nuevo Registro</h6>
            </div>
            <form method="post" id="instructor_form">
                <div class="modal-body pd-25">
                    <input type="hidden" name="cur_id" id="cur_id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Nombres:<span class="tx-danger"> *</span></label>
                                <input class="form-control tx-uppercase" id="inst_nom" type="text" name="inst_nom" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col-md-6">    
                            <div class="form-group">
                                <label class="form-control-label">Apellido Paterno:<span class="tx-danger"> *</span></label>
                                <input class="form-control tx-uppercase" id="inst_apep" type="text" name="inst_apep" required>
                            </div>    
                        </div>
                        <div class="col-md-6">    
                            <div class="form-group">
                                <label class="form-control-label">Apellido Materno:<span class="tx-danger"> *</span></label>
                                <input class="form-control tx-uppercase" id="inst_apem" type="text" name="inst_apem" required>
                            </div>    
                        </div>
                    </div>
                    <div class="row">  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Sexo:<span class="tx-danger"> *</span></label>
                                <select class="form-control select2" style="width:100%" data-placeholder="Seleccione" name="inst_id" id="inst_id">
                                    <option label="Seleccione"></option>
                                </select>
                            </div> 
                        </div>          
                        <div class="col-md-6">    
                            <div class="form-group">
                                <label class="form-control-label">Telefono:<span class="tx-danger"> *</span></label>
                                <input class="form-control tx-uppercase" id="inst_telf" type="number" name="inst_telf" required>
                            </div>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">    
                            <div class="form-group">
                                <label class="form-control-label">Correo:<span class="tx-danger"> *</span></label>
                                <input class="form-control tx-uppercase" id="inst_correo" type="email" name="inst_correo" required>
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
