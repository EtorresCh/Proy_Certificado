<?php
  require_once '../../conf/conexion.php';
  if (isset($_SESSION["usu_id"])){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once '../html/MainHead.php';?>
    <title>Empresa: Mant. Cursos</title>
  </head>
  <body>
     <?php require_once '../html/MainMenu.php';?>
     <?php require_once '../html/MainHeader.php';?>  
    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Cursos</a>
        </nav>
      </div>
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Cursos</h4>
        <p class="mg-b-0">Mantenimiento</p>
      </div>
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Cursos</h6>
                  <p class="mg-b-30 tx-gray-600">Listado de Cursos.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group text-right">
                <button class="btn btn-primary mg-b-10" id="add_button" type="button" onclick="nuevo()"><i class="fa fa-plus"></i> Nuevo Registro</button>
              </div>  
            </div> 
          </div>
            <div class="table-wrapper">
              <table id="cursos_data" class="table display  responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Categoria</th>
                    <th class="wd-15p">Nombre</th>
                    <th class="wd-15p">Fech.Inicio</th>
                    <th class="wd-15p">Fech.Fin</th>
                    <th class="wd-15p">Instructor</th>
                    <th class="wd-5p"></th>
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
    <?php require_once 'modalMantenimiento.php';?>
    <?php require_once 'modalFile.php';?>
    <?php require_once '../html/MainJs.php';?>
    <script type="text/javascript" src="admincurso.js"></script>
  </body>
</html>
<?php
  }else{
    header("Location:".conectar::ruta()."view/404/");
  }
?>