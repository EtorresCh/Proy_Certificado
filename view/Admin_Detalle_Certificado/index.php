<?php
  require_once '../../conf/conexion.php';
  if (isset($_SESSION["usu_id"])){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once '../html/MainHead.php';?>
    <title>Empresa: Mant. Detalle Certificado</title>
  </head>
  <body>
     <?php require_once '../html/MainMenu.php';?>
     <?php require_once '../html/MainHeader.php';?>  
    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">D. Certificado</a>
        </nav>
      </div>
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Detalle Certificado</h4>
        <p class="mg-b-0">Mantenimiento</p>
      </div>
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Detalle Certificados</h6>
          <p class="mg-b-30 tx-gray-600">Listado de Detalle Certificado.</p> 
            <div class="form-layout" >
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                      <label class="form-control-label">Curso:<span class="tx-danger"> *</span></label>
                      <select class="form-control select2" style=" width: 100%; Height: 100%;" data-placeholder="Seleccione" name="cur_id" id="cur_id" required>
                          <option label="Seleccione"></option>
                      </select>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">&nbsp;</label>
                    <button class="btn btn-success form-control mg-b-10" id="add_button" type="button" onclick="nuevo()"><i class="fa fa-plus"></i> Nuevo Registro</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-wrapper"></div>
              <table id="detalle_data" class="table display  responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Curso</th>
                    <th class="wd-15p">Usuario</th>
                    <th class="wd-5p">Fech. Inicio</th>
                    <th class="wd-5p">Fech. Fin</th>
                    <th class="wd-15p">Instructor</th>
                    <th class="wd-5p"></th>
                    <th class="wd-5p"></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
    <?php require_once 'modaldcertificado.php';?>
    <?php require_once '../html/MainJs.php';?>
    <script type="text/javascript" src="admindcertificado.js"></script>
  </body>
</html>
<?php
  }else{
    header("Location:".conectar::ruta()."view/404/");
  }
?>