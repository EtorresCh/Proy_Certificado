<div id="modaldCertificado" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modaldCertificadoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> 
        <div class="modal-content bd-0">
            <div class="modal-header pd-y pd-x-25">
                <h6  id="lbltitulo"class="text-14 mg-b-0 tx-uppercase tx-inverse tx_bold"></h6>
            </div>
            <div class="modal-body pd-25">
                <input type="hidden" name="cur_id" id="cur_id">
                    <table id="usuario_data" class="table display  responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-5p"></th>
                                <th class="wd-8p">Nombre</th>
                                <th class="wd-8p">A.Paterno</th>
                                <th class="wd-8p">A.Materno</th>
                                <th class="wd-8p">Correo Electronico</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button name="action" onclick="registrardetalle()" class="btn btn-primary tx-13 tx-uppercase pd-y-12 pd-x-25 tx-medium"><i class="fa fa-check"></i> Guardar</button>
                            <button type="reset" class="btn btn-secondary tx-13 tx-uppercase pd-y-12 pd-x-25 tx-medium" aria-label="close" aria-hidden="true" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
                        </div>    
                    </div>
                </div>          
            </div>
        </div>
    </div>               
</div>
