<?php
require_once '../conf/conexion.php';
require_once '../models/Categoria.php';
$categoria = new Categoria(); 
    switch($_GET["op"]){
    case "guardaryeditar":
            if(empty($_POST["cur_id"])){
            $curso->insert_curso(
                $_POST["cat_id"],
                $_POST["cur_nom"],
                $_POST["cur_desc"],
                $_POST["fech_ini"],
                $_POST["fech_fin"],
                $_POST["inst_id"]
            );
            }else{
                $curso->update_curso(
                    $_POST["cur_id"],
                    $_POST["cat_id"],
                    $_POST["cur_nom"],
                    $_POST["cur_desc"],
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
    case "combo":
        $datos = $categoria->get_categoria();
        if(is_array($datos)==true and count ($datos)>0){
            $html="<option value=''>Seleccionar</option>";
                foreach($datos as $row){
                    $html.="<option value='".$row["cat_id"]."'>".$row["cat_nom"]."</option>";
                }
            echo $html;
        }
        break;
    }
?>