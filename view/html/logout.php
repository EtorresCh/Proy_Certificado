<?php
require_once "../../conf/conexion.php";
session_destroy();
header("Location:".conectar::ruta()."index.php");
exit();
?>