<?php
class Conectar {
    protected $dbh;
    protected function conexion() {
        try {
            $this->dbh = new PDO("mysql:host=localhost;dbname=bd_diplomas", "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $this->dbh;
        } catch (PDOException $e) {
            error_log("¡Error BD!: " . $e->getMessage());
            die("Error de conexión a la base de datos.");
        }
    }

    public function set_names() {
        try {
            return $this->dbh->query("SET NAMES 'utf8'");
        } catch (PDOException $e) {
            error_log("Error al configurar el conjunto de caracteres: " . $e->getMessage());
            die("Error al configurar el conjunto de caracteres.");
        }
    }

    public function ruta() {
        return "http://localhost/Proy_Certificado/";
    }
}
?>