<?php
  require_once '../../conf/conexion.php';
  if (isset($_SESSION["usu_id"])){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once '../html/MainHead.php';?>
    <title>Empresa: Mant. Instructor</title>
  </head>
  <body>
     <?php require_once '../html/MainMenu.php';?>
     <?php require_once '../html/MainHeader.php';?>  
    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Instructores</a>
        </nav>
      </div>
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Intructores</h4>
        <p class="mg-b-0">Mantenimiento</p>
      </div>
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Instructores</h6>
          <p class="mg-b-30 tx-gray-600">Listado de Instructores.</p>
          <button class="btn btn-success mg-b-10" id="add_button" type="button" onclick="nuevoi()"><i class="fa fa-plus"></i> Nuevo Registro</button>
            <div class="table-wrapper">
              <table id="instructor_data" class="table display  responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Nombre</th>
                    <th class="wd-15p">Ap. Paterno</th>
                    <th class="wd-15p">Ap. Materno</th>
                    <th class="wd-15p">Sexo</th>
                    <th class="wd-15p">Telefono</th>
                    <th class="wd-15p">Correo</th>
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
    <?php require_once 'modalinstructor.php';?>
    <?php require_once '../html/MainJs.php';?>
    <script type="text/javascript" src="admininstructor.js"></script>
  </body>
</html>
<?php
  }else{
    header("Location:".conectar::ruta()."view/404/");
  }
?>