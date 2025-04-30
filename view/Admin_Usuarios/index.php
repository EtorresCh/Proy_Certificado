<?php
  require_once '../../conf/conexion.php';
  if (isset($_SESSION["usu_id"])){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once '../html/MainHead.php';?>
    <title>Empresa: Mant. Usuario</title>
  </head>
  <body>
     <?php require_once '../html/MainMenu.php';?>
     <?php require_once '../html/MainHeader.php';?>  
    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Usuario</a>
        </nav>
      </div>
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Usuarios</h4>
        <p class="mg-b-0">Mantenimiento</p>
      </div>
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Usuarios</h6>
          <p class="mg-b-30 tx-gray-600">Listado de Usuarios.</p>
          <button class="btn btn-success mg-b-10" id="add_button" type="button" onclick="nuevo()"><i class="fa fa-plus"></i> Nuevo Registro</button>
            <div class="table-wrapper">
              <table id="usuario_data" class="table display  responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-8p">Nombre</th>
                    <th class="wd-8p">A.Paterno</th>
                    <th class="wd-8p">A.Materno</th>
                    <th class="wd-8p">Tel.</th>
                    <th class="wd-5p">Correo</th>
                    <th class="wd-5p">Tipo</th>
                    <th class="wd-1p"></th>
                    <th class="wd-1p"></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
    <?php require_once 'modalusuario.php';?>
    <?php require_once '../html/MainJs.php';?>
    <script type="text/javascript" src="adminusuario.js"></script>
  </body>
</html>
<?php
  }else{
    header("Location:".conectar::ruta()."view/404/");
  }
?>