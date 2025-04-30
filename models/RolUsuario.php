<?php
   class RolUsuario extends Conectar {
    public function get_RolUsuario(){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql = "SELECT * FROM rol_usuario WHERE est = 1";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
   }
?>