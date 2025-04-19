<?php
   class Usuario extends Conectar {
       public function login() {
           $conectar = parent::conexion();
           parent::set_names();

           if (isset($_POST["enviar"])) {
               $correo = filter_var($_POST["usu_corr"], FILTER_SANITIZE_EMAIL);
               $pass = $_POST["usu_pass"];

               if (empty($correo) || empty($pass)) {
                   header("Location:" . Conectar::ruta() . "index.php?m=2");
                   exit();
               } else {
                   try {
                       $sql = "SELECT * FROM usuario WHERE usu_corr = ? AND estado = 1";
                       $stmt = $conectar->prepare($sql);
                       $stmt->bindValue(1, $correo);
                       $stmt->execute();
                       $resultado = $stmt->fetch();

                       if (is_array($resultado) && count($resultado) > 0) {
                           if (password_verify($pass, $resultado["usu_pass"])) {
                               session_start();
                               $_SESSION["usu_id"] = $resultado["usu_id"];
                               $_SESSION["usu_nom"] = $resultado["usu_nom"];
                               $_SESSION["usu_ape"] = $resultado["usu_ape"];
                               $_SESSION["usu_corr"] = $resultado["usu_corr"];
                               header("Location:" . Conectar::ruta() . "view/UsuHome/");
                               exit();
                           } else {
                               header("Location:" . Conectar::ruta() . "index.php?m=1");
                               exit();
                           }
                       } else {
                           header("Location:" . Conectar::ruta() . "index.php?m=1");
                           exit();
                       }
                   } catch (Exception $e) {
                       error_log("Error en login: " . $e->getMessage());
                       header("Location:" . Conectar::ruta() . "index.php?m=3");
                       exit();
                   }
               }
           }
       }
   }
?>