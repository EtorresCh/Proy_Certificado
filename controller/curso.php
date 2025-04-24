<?php
    require_once("../conf/conexion.php");
    require_once("/../models/Curso.php");
    $curso = new Curso(); 
    switch($_GET["OP"]){
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
        break;
      case "eliminar":
        break;
      case "listar":
        break;
    }
?>