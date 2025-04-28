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
            $sub_array[] = $row["cur_nom"];
            $sub_array[] = $row["fech_ini"];
            $sub_array[] = $row["fech_fin"];
            $sub_array[] = $row["inst_nom"]." ".$row["inst_apep"]." ".$row["inst_apem"];
            $sub_array[] = '<button type="button" onClick="editar(' . $row["cur_id"] . ');" id="' . $row["cur_id"] . '" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["cur_id"] . ');" id="' . $row["cur_id"] . '" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button>';
            $data[] = $sub_array;
          }
          $result = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo json_encode($result);  
        break;
    }
?>