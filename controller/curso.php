<?php
    require_once("../conf/conexion.php");
    require_once("../models/Curso.php");
    $curso = new Curso(); 
    switch($_GET["op"]){
      case "guardaryeditar":
            if(empty($_POST["cur_id"])){
            $curso->insert_curso(
                $_POST["cat_id"],
                $_POST["cur_nom"],
                $_POST["cur_des"],
                $_POST["fech_ini"],
                $_POST["fech_fin"],
                $_POST["inst_id"]
            );
            }else{
                $curso->update_curso(
                    $_POST["cur_id"],
                    $_POST["cat_id"],
                    $_POST["cur_nom"],
                    $_POST["cur_des"],
                    $_POST["fech_ini"],
                    $_POST["fech_fin"],
                    $_POST["inst_id"]
                );
            }              
        break;
      case "mostrar":
          $datos = $curso->get_curso_id($_POST["cur_id"]);
          if (is_array($datos) == true and count($datos) > 0) {
              foreach ($datos as $row) {
                  $output["cur_id"] = $row["cur_id"];
                  $output["cat_id"] = $row["cat_id"];
                  $output["cur_nom"] = $row["cur_nom"];
                  $output["cur_des"] = $row["cur_des"];
                  $output["fech_ini"] = $row["fech_ini"];
                  $output["fech_fin"] = $row["fech_fin"];
                  $output["inst_id"] = $row["inst_id"]; 
              }
            echo json_encode($output);
        }
        break;
      case "eliminar":
        $curso->delete_curso($_POST["cur_id"]);
        break;
      case "listar":
        $datos = $curso->get_curso();
        $data= Array();
        foreach($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["cat_nom"];
            $sub_array[] = '<a/ href="'.$row["cur_img"].'"target="_blank">'.strtoupper($row["cur_nom"]).'</a>';
            $sub_array[] = $row["fech_ini"];
            $sub_array[] = $row["fech_fin"];
            $sub_array[] = $row["inst_nom"]." ".$row["inst_apep"]." ".$row["inst_apem"];
            $sub_array[] = '<button type="button" onClick="editar(' . $row["cur_id"] . ');" id="' . $row["cur_id"] . '" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["cur_id"] . ');" id="' . $row["cur_id"] . '" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button>';
            $sub_array[] = '<button type="button" onClick="imagen(' . $row["cur_id"] . ');" id="' . $row["cur_id"] . '" class="btn btn-success btn-xs"><i class="fa fa-file"></i></button>';
            $data[] = $sub_array;
          }
          $result = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo json_encode($result);  
        break;
      case "combo":
        $datos = $curso->get_curso_combo();
        if(is_array($datos)==true and count ($datos)>0){
            $html="<option value=''>Seleccionar</option>";
                foreach($datos as $row){
                    $html.="<option value='".$row["cur_id"]."'>".$row["cur_nom"]."</option>";
                }
            echo $html;
        }
        break;
        case "eliminar_curso_usuario":
            $curso->delete_curso_usuario($_POST["curusu_id"]);
            break;  
        case"inser_curso_usuario":
            $datos =explode(',',$_POST['usu_id']);
                foreach($datos as $row){
                    $sub_array=array();
                    $idx=$curso->insert_curso_usuario($_POST["cur_id"],$row);
                    $sub_array=$idx;
                    $data[]=$sub_array;
                }
                echo json_encode($data);
            break;
        case "generar_qr":
            require_once('phpqrcode/qrlib.php'); 
            QRcode::png($_POST["curusu_id"],"../public/qr/",$_POST["curusu_id"]."png",'L',32,5);  
            break; 
        case "update_imagen_curso":
            $curso->update_imagen_curso($_POST["curx_idx"],$_POST["cur_img"]);
            break;


    }
?>