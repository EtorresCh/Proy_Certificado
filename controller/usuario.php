<?php
require_once("../conf/conexion.php");
require_once("../models/Usuario.php");
$usuario = new Usuario();
switch ($_GET["op"]) {
    case "listar_cursos":
        $datos = $usuario->get_cursos_x_usuario($_POST["usu_id"]);
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["cur_nom"];
            $sub_array[] = $row["fech_ini"];
            $sub_array[] = $row["fech_fin"];
            $sub_array[] = $row["inst_nom"] . " " . $row["inst_apep"];
            $sub_array[] = '<button type="button" onClick="certificado(' . $row["curusu_id"] . ');" id="' . $row["curusu_id"] . '" class="btn btn-outline-primary btn-icon"><i style="margin:12px" class="fa-solid fa-id-card"></i></button>';
            $data[] = $sub_array;
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;
    case "mostrar_cursos_detalle":
        $datos = $usuario->get_cursos_x_id_detalle($_POST["curusu_id"]);
        if (is_array($datos) == true and count($datos)<> 0) {
            foreach ($datos as $row) {
                $output["curusu_id"] = $row["curusu_id"];
                $output["cur_id"] = $row["cur_id"];
                $output["cur_nom"] = $row["cur_nom"];
                $output["cur_des"] = $row["cur_des"];
                $output["fech_ini"] = $row["fech_ini"];
                $output["fech_fin"] = $row["fech_fin"];
                $output["cur_img"] = $row["cur_img"];
                $output["usu_id"] = $row["usu_id"];
                $output["usu_nom"] = $row["usu_nom"];
                $output["usu_apep"] = $row["usu_apep"];
                $output["usu_apem"] = $row["usu_apem"];
                $output["inst_id"] = $row["inst_id"];
                $output["inst_nom"] = $row["inst_nom"];
                $output["inst_apep"] = $row["inst_apep"];
                $output["inst_apem"] = $row["inst_apem"];
            }
            echo json_encode($output);
        }
        break;
    case "total":
        $datos = $usuario->get_total_cursos_x_usuario($_POST["usu_id"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["total"] = $row["total"];
            }
            echo json_encode($output);
        }
        break;
    case "listar__cursos_top10":
        $datos = $usuario->get_cursos_x_usuario_top10($_POST["usu_id"]);
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["cur_nom"];
            $sub_array[] = $row["fech_ini"];
            $sub_array[] = $row["fech_fin"];
            $sub_array[] = $row["inst_nom"] . " " . $row["inst_apep"];
            $sub_array[] = '<button type="button" onClick="certificado(' . $row["curusu_id"] . ');" id="' . $row["curusu_id"] . '" class="btn btn-outline-primary btn-icon"><i style="margin:12px" class="fa-solid fa-id-card"></i></button>';
            $data[] = $sub_array;
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;
    case "mostrar":
        $datos = $usuario->get_usuario_x_id($_POST["usu_id"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["usu_id"] = $row["usu_id"];
                $output["usu_nom"] = $row["usu_nom"];
                $output["usu_apep"] = $row["usu_apep"];
                $output["usu_apem"] = $row["usu_apem"];
                $output["usu_corr"] = $row["usu_corr"];
                $output["usu_pass"] = $row["usu_pass"];
                $output["usu_sex"] = $row["usu_sex"];
                $output["telefono"] = $row["telefono"];
            }
            echo json_encode($output);
        }
        break;
    case "update_perfil":
           $usuario->update_usuario_perfil(
                $_POST["usu_id"],
                $_POST["usu_nom"],
                $_POST["usu_apep"],
                $_POST["usu_apem"],
                $_POST["usu_pass"],
                $_POST["usu_sex"],
                $_POST["telefono"]
            );
        break;


    case "guardaryeditar":
        if (empty($_POST["usu_id"])) {
            $categoria->insert_usuario($_POST["cat_nom"]);
        } else {
            $categoria->update_usuario($_POST["cat_id"], $_POST["cat_nom"]);
        }
        break;
     //Aqui muestra los datos de usuarios de editar para administrador    
    case "mostrar_editar":
        $datos = $usuario->get_usuario_x_id($_POST["usu_id"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["usu_id"] = $row["usu_id"];
                $output["usu_nom"] = $row["usu_nom"];
                $output["usu_apep"] = $row["usu_apep"];
                $output["usu_apem"] = $row["usu_apem"];
                $output["usu_corr"] = $row["usu_corr"];
                $output["usu_pass"] = $row["usu_pass"];
                $output["usu_sex"] = $row["usu_sex"];
                $output["telefono"] = $row["telefono"];
                $output["rol_id"] = $row["rol_id"]." " . $row["rol_tipo"];
            }
            echo json_encode($output);
        }
        break;
    case "eliminar":
        $usuario->delete_usuario($_POST["usu_id"]);
        break;
    case "listar":
        $datos = $usuario->get_usuario();
        $data= Array();
        foreach($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["usu_nom"];
            $sub_array[] = $row["usu_apep"];
            $sub_array[] = $row["usu_apem"];
            $sub_array[] = $row["telefono"];
            $sub_array[] = $row["usu_corr"];
            $sub_array[] = $row["rol_tipo"];
            $sub_array[] = '<button type="button" onClick="editar(' . $row["usu_id"] . ');" id="' . $row["usu_id"] . '" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["usu_id"] . ');" id="' . $row["usu_id"] . '" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button>';
            $data[] = $sub_array;
            }
            $result = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo json_encode($result);  
        break;  
    case "listar_cursos_usuario":
        $datos = $usuario->get_cursos_usuario_id($_POST["cur_id"]);
        $data= Array();
        foreach($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["cur_nom"];
            $sub_array[] = $row["usu_nom"]." ".$row["usu_apep"]." ".$row["usu_apem"];
            $sub_array[] = $row["fech_ini"];
            $sub_array[] = $row["fech_fin"];
            $sub_array[] = $row["inst_nom"]." ".$row["inst_apep"];
            $sub_array[] = '<button type="button" onClick="certificado(' . $row["curusu_id"] . ');" id="' . $row["curusu_id"] . '" class="btn btn-outline-primary btn-icon"><i style="margin:12px" class="fa-solid fa-id-card"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["curusu_id"] . ');" id="' . $row["curusu_id"] . '" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button>';
            $data[] = $sub_array;
            }
            $result = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo json_encode($result);  
        break;
    case "listar_detalle_usuario":
        $datos = $usuario->get_usuario_modal($_POST['cur_id']);
        $data= Array();
        foreach($datos as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="detallecheck" value="' . $row['usu_id'] . '">';
            $sub_array[] = $row["usu_nom"];
            $sub_array[] = $row["usu_apep"];
            $sub_array[] = $row["usu_apem"];
            $sub_array[] = $row["usu_corr"];
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
