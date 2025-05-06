<!DOCTYPE html>
<html lang="en" class="pos-relative">
  <head>
  <?php require_once '../html/MainHead.php';?>
    <title>Consulta</title>
  </head>

  <body class="pos-relative">

    <div class="d-flex align-items-center justify-content-center">
      <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">
        <h1 class="tx-100 tx-xs-140 tx-normal tx-inverse tx-roboto mg-b-0">Consulta</h1>
        <h5 class="tx-xs-24 tx-normal tx-info mg-b-30 lh-5">Ingrese DNI para validad certificados.</h5>
        <div class="d-flex justify-content-center">
          <div class="input-group wd-xs-300">
            <input type="text"  id ="usu_dni" name ="usu_dni" class="form-control" placeholder="Buscar Dni...">
            <div class="input-group-btn">
              <button class="btn btn-info" id="btnconsultar"><i class="fa fa-search"></i></button>
            </div><!-- input-group-btn -->
          </div><!-- input-group -->
        </div><!-- d-flex -->
        <div class="row row-sm mg-t-20" id="divpanel">
            <div class="col-12">
                <div class="card pd-0 bd-0 shadow-base">
                    <div class="pd-x-30 pd-t-30 pd-b-15">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                        <h6 id="lbldatos" class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1"></h6>
                        <p class="mg-b-0">Aqui podras visualizar los certificados </p>
                        </div>
                    </div>
                    </div>
                    <div class="pd-x-15 pd-b-15">
                    <div class="table-wrapper">
                        <table id="cursos_data" class="table display nowrap">
                        <thead>
                            <tr>
                            <th class="wd-15p">Curso</th>
                            <th class="wd-15p">Fecha Inicio</th>
                            <th class="wd-20p">Fecha Fin</th>
                            <th class="wd-15p">Instructor</th>
                            <th class="wd-10p"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
          </div>
      </div>
    </div><!-- ht-100v -->
    
    <?php require_once '../html/MainJs.php';?>
    <script type="text/javascript" src="consulta.js"></script>
  </body>
</html>
