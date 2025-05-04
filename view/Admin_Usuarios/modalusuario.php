<div id="modalusuario" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> 
        <div class="modal-content bd-0">
            <div class="modal-header pd-y pd-x-25">
                <h6  id="lbltitulo"class="text-14 mg-b-0 tx-uppercase tx-inverse tx_bold"></h6>
            </div>
            <form method="post" id="usuario_form">
                <div class="modal-body pd-25">
                    <input type="hidden" name="usu_id" id="usu_id">
                    <div class="row">
                        <div class="col-md-12">    
                            <div class="form-group">
                                <label class="form-control-label">Nombre:<span class="tx-danger"> *</span></label>
                                <input class="form-control tx-uppercase" id="usu_nom" type="text" name="usu_nom" required>
                            </div>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">    
                            <div class="form-group">
                                <label class="form-control-label">Apellido Paterno:<span class="tx-danger"> *</span></label>
                                <input class="form-control tx-uppercase" id="usu_apep" type="text" name="usu_apep" required>
                            </div>    
                        </div>
                        <div class="col-md-6">    
                            <div class="form-group">
                                <label class="form-control-label">Apellido Materno:<span class="tx-danger"> *</span></label>
                                <input class="form-control tx-uppercase" id="usu_apem" type="text" name="usu_apem" required>
                            </div>    
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Correo Electronico:<span class="tx-danger"> *</span></label>
                                <input class="form-control tx-uppercase" id="usu_corr" type="text" name="usu_corr" required>
                            </div> 
                        </div>    
                    </div>
                    <div class="row">    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Contraseña:<span class="tx-danger"> *</span></label>
                                <input class="form-control tx-uppercase" id="usu_pass" type="password" name="usu_pass" required>
                            </div> 
                        </div>    
                        <div class="col-md-6">    
                            <div class="form-group">
                                <label class="form-control-label">Sexo:<span class="tx-danger"> *</span></label>
                                <select class="form-control " style="width:100%" data-placeholder="Seleccione" name="usu_sex" id="usu_sex" required>
                                    <option label="Seleccione"></option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">    
                            <div class="form-group">
                                <label class="form-control-label">Telefono:<span class="tx-danger"> *</span></label>
                                <input class="form-control tx-uppercase" id="telefono" type="number" name="telefono" required>
                            </div> 
                        </div>    
                        <div class="col-md-6">  
                            <div class="form-group">
                                <label class="form-control-label">Rol:<span class="tx-danger"> *</span></label>
                                <select class="form-control select2" style="width:100%" data-placeholder="Seleccione" name="rol_id" id="rol_id">
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
