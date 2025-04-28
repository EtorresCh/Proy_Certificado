<?php
  require_once '../../conf/conexion.php';
  if (isset($_SESSION["usu_id"])){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once '../html/MainHead.php';?>
    <title>Home</title>
  </head>
  <body>
     <?php require_once '../html/MainMenu.php';?>
     <?php require_once '../html/MainHeader.php';?>  
    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Perfil</a>
        </nav>
      </div>
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Perfil</h4>
        <p class="mg-b-0">Pantalla perfil</p>
      </div>
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Perfil</h6>
          <p class="mg-b-30 tx-gray-600">Actualize sus datos.</p>
          <div class="form-layout form-layout-1">
            <div class="row">
              <div class="col-lg-4 d-flex justify-content-center align-items-start">
                <img src="../../public/foto_perfil.png" alt="Foto Perfil" class="img-thumbnail" style="max-width: 200px;">
              </div>
              <div class="col-lg-8">
                <div class="row mb-3">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="usu_nom" id="usu_nom" placeholder="Ingrese Nombre" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label">Apellido Paterno: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="usu_apep" id="usu_apep" placeholder="Ingrese Apellido Paterno">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label">Apellido Materno: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="usu_apem" id="usu_apem" placeholder="Ingrese Apellido Materno">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label">Correo Electrónico: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="usu_corr" id="usu_corr" placeholder="Ingrese Correo Electrónico" readonly>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label">Contraseña: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="usu_pass" id="usu_pass" placeholder="Ingrese Contraseña">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label">Sexo: <span class="tx-danger">*</span></label>
                      <select class="form-control select2" data-placeholder="Seleccione" name="usu_sex" id="usu_sex">
                        <option label="Seleccione"></option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label">Teléfono: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" name="telefono" id="telefono" placeholder="Ingrese Teléfono">
                    </div>
                  </div>   
                  <div class="col-lg-6 d-flex justify-content-center align-items-center ">
                    <div class="form-group mb-0">
                      <button class="btn btn-info" id="btnactualizar">Actualizar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php require_once '../html/MainJs.php';?>
    <script type="text/javascript" src="usuperfil.js"></script>
  </body>
</html>
<?php
  }else{
    header("Location:".conectar::ruta()."view/404/");
  }
?>