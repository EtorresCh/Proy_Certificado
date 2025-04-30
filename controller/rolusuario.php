<?php
require_once("../conf/conexion.php");
require_once("../models/RolUsuario.php");
$rol_usuario = new RolUsuario();
switch ($_GET["op"]) {
    case "combo":
        $datos = $rol_usuario->get_RolUsuario();
        if(is_array($datos)==true and count ($datos)>0){
            $html="<option value=''>Seleccionar</option>";
                foreach($datos as $row){
                    $html.="<option value='".$row["rol_id"]."'>".$row["rol_tipo"]."</option>";
                }
            echo $html;
        }
        break;
    break;
}  
?>  