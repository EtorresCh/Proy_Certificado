<!DOCTYPE html>
<html lang="en" class="pos-relative">
  <head>
    <?php require_once '../html/MainHead.php';?>
    <title>Bracket Responsive Bootstrap 4 Admin Template</title>
  </head>

  <body class="pos-relative">
    <div class="ht-100v d-flex align-items-center justify-content-center">
      <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">
        <h1 class="tx-100 tx-xs-140 tx-normal tx-inverse tx-roboto mg-b-0">
          <canvas id="canvas"  height="350px"  width="600px" class="img-fluid" alt="Responsive image"></canvas> 
        </h1>
        <p class="tx-16 mg-b-20 text-center" id="cur_des">     
        </p>
        <div class="form-layout-footer">
          <button class="btn btn-outline-info" id="btnpng">
            <i class="fas fa-image mg-r-10"></i>PNG
          </button>
          <button class="btn btn-outline-success" id="btnpdf">
            <i class="fas fa-file-pdf mg-r-10"></i>PDF
          </button>
        </div>
      </div>
    </div>
    <?php require_once '../html/MainJs.php';?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script type="text/javascript" src="certificado.js"></script>
  </body>
</html>
