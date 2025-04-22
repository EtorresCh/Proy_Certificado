<?php
    require_once("../conf/conexion.php");
    require_once("../models/Usuario.php");
    $usuario = new Usuario();
    switch($_GET["op"]){
        case "listar_cursos":
        $datos=$usuario->get_cursos_x_usuario($_POST["usu_id"]);
        $data= Array();
        foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $row["cur_nom"];
            $sub_array[] = $row["fech_ini"];
            $sub_array[] = $row["fech_fin"];
            $sub_array[] = $row["inst_nom"]." ".$row["inst_apep"];
            $sub_array[] = '<button type="button" onClick="certificado('.$row["curusu_id"].');" id="'.$row["curusu_id"].'" class="btn btn-outline-primary btn-icon"><i  style="margin:3px" class="fa fa-id-card-o"></i></button>';
            $data[]=$sub_array;
        }
        $results=array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo json_encode($results);
        break;
        case "mostrar_cursos_detalle":
            $datos=$usuario->get_cursos_x_id_detalle($_POST["curusu_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["curusu_id"] = $row["curusu_id"];
                    $output["cur_id"] = $row["cur_id"];
                    $output["cur_nom"] = $row["cur_nom"];
                    $output["cur_des"] = $row["cur_des"];
                    $output["fech_ini"] = $row["fech_ini"];
                    $output["fech_fin"] = $row["fech_fin"];
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
    }
?>