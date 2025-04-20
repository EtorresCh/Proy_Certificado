<?php
session_start();
class Conectar {
    protected $dbh;
    protected function Conexion() {
        try {
            $conectar= $this->dbh = new PDO("mysql:host=localhost;dbname=bd_diplomas", "root", "");
            return $conectar;
        } catch (PDOException $e) {
            error_log("¡Error BD!: ".$e->getMessage());
            die();
        }
    }
    public function set_names() {
            return $this->dbh->query("SET NAMES 'utf8'");
    }

    public static function ruta() {
        return "http://localhost:/Proy_Certificado/";
    }
}
?>