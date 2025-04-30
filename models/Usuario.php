<?php
   class Usuario extends Conectar {
       public function login() {
           $conectar = parent::conexion();
           parent::set_names();
           if (isset($_POST["enviar"])) {
               $correo = $_POST["usu_corr"];
               $pass = $_POST["usu_pass"];
               if (empty($correo) || empty($pass)) {
                   header("Location:".conectar::ruta()."index.php?m=2");
                   exit();
               } else {
                    $sql = "SELECT * FROM usuario WHERE usu_corr = ? AND usu_pass =? and est = 1";
                    $stmt = $conectar->prepare($sql);
                    $stmt->bindValue(1, $correo);
                    $stmt->bindValue(2, $pass);
                    $stmt->execute();
                    $resultado = $stmt->fetch();
                    if (is_array($resultado) && count($resultado) > 0) {
                        $_SESSION["usu_id"] = $resultado["usu_id"];
                        $_SESSION["usu_nom"] = $resultado["usu_nom"];
                        $_SESSION["usu_ape"] = $resultado["usu_ape"];
                        $_SESSION["usu_corr"] = $resultado["usu_corr"];
                        $_SESSION["rol_id"] = $resultado["rol_id"];
                        header("Location:".conectar::ruta()."view/UsuHome/");
                        exit();
                    } else {
                        header("Location:".conectar::ruta()."index.php?m=1");
                        exit();
                    }
               }
           }
       }
       public  function get_cursos_x_usuario($usu_id){
             $conectar = parent::conexion(); 
             parent::set_names();
             $sql="SELECT
                    curso_usuario.curusu_id,
                    curso.cur_id,
                    curso.cur_nom,
                    curso.cur_des,
                    curso.fech_ini,
                    curso.fech_fin,
                    usuario.usu_id,
                    usuario.usu_nom,
                    usuario.usu_apep,
                    usuario.usu_apem,
                    instructor.inst_id,
                    instructor.inst_nom,
                    instructor.inst_apep,
                    instructor.inst_apem
                FROM curso_usuario
                INNER JOIN curso ON curso_usuario.cur_id = curso.cur_id
                INNER JOIN usuario ON curso_usuario.usu_id = usuario.usu_id
                INNER JOIN instructor ON curso.inst_id = instructor.inst_id
                WHERE
                curso_usuario.usu_id = ?";
             $sql=$conectar->prepare($sql);
             $sql->bindValue(1, $usu_id);
             $sql->execute();
             return $resultado=$sql->fetchAll();
       }
       public  function get_cursos_x_id_detalle($curusu_id){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql="SELECT
                curso_usuario.curusu_id,
                curso.cur_id,
                curso.cur_nom,
                curso.cur_des,
                curso.fech_ini,
                curso.fech_fin,
                usuario.usu_id,
                usuario.usu_nom,
                usuario.usu_apep,
                usuario.usu_apem,
                instructor.inst_id,
                instructor.inst_nom,
                instructor.inst_apep,
                instructor.inst_apem
            FROM curso_usuario
            INNER JOIN curso ON curso_usuario.cur_id = curso.cur_id
            INNER JOIN usuario ON curso_usuario.usu_id = usuario.usu_id
            INNER JOIN instructor ON curso.inst_id = instructor.inst_id
            WHERE
            curso_usuario.usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$curusu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
       }
       public function get_total_cursos_x_usuario($usu_id){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql= "SELECT COUNT(*)  as total from curso_usuario where usu_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
        return $resultado=$sql->fetchAll(); 
       }
       public  function get_cursos_x_usuario_top10($usu_id){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql="SELECT
               curso_usuario.curusu_id,
               curso.cur_id,
               curso.cur_nom,
               curso.cur_des,
               curso.fech_ini,
               curso.fech_fin,
               usuario.usu_id,
               usuario.usu_nom,
               usuario.usu_apep,
               usuario.usu_apem,
               instructor.inst_id,
               instructor.inst_nom,
               instructor.inst_apep,
               instructor.inst_apem
           FROM curso_usuario
           INNER JOIN curso ON curso_usuario.cur_id = curso.cur_id
           INNER JOIN usuario ON curso_usuario.usu_id = usuario.usu_id
           INNER JOIN instructor ON curso.inst_id = instructor.inst_id
           WHERE
           curso_usuario.usu_id = ?
           Limit 10 ";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
       } 
        /* Mostrar los datos del  usuario  segun el ID*/
       public  function get_usuario_x_id($usu_id){
        $conectar = parent::conexion(); 
             parent::set_names();
             $sql="SELECT * FROM usuario WHERE est=1 and usu_id=?";
             $sql=$conectar->prepare($sql);
             $sql->bindValue(1, $usu_id);
             $sql->execute();
        return $resultado=$sql->fetchAll();
       }
        /* Actualizar datos del  usuario */
       public  function update_usuario_perfil($usu_id,$usu_nom,$usu_apep,$usu_apem,$usu_pass,$usu_sex,$telefono){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql="UPDATE usuario 
               SET
                usu_nom=?,
                usu_apep=?,
                usu_apem=?,
                usu_pass=?,
                usu_sex=?,
                telefono=?
               WHERE
                usu_id=?";     
             $sql=$conectar->prepare($sql);
             $sql->bindValue(1, $usu_nom);
             $sql->bindValue(2, $usu_apep);
             $sql->bindValue(3, $usu_apem);
             $sql->bindValue(4, $usu_pass);
             $sql->bindValue(5, $usu_sex);
             $sql->bindValue(6, $telefono);
             $sql->bindValue(7, $usu_id);
             $sql->execute();
             return $resultado=$sql->fetchAll();
       }
       public function insert_usuario($usu_nom,$usu_apep,$usu_apem,$usu_corr,$usu_pass,$telefono,$rol_id){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql = "INSERT INTO usuario (usu_id,usu_nom, usu_apep, usu_apem,usu_correo,usu_pass,fech_crea, est,telefono, rol_id) VALUES (null,?,?,?,?,?,1,now(),?,?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_nom);
        $sql->bindValue(2, $usu_apep);
        $sql->bindValue(3, $usu_apem);
        $sql->bindValue(4, $usu_corr);
        $sql->bindValue(5, $usu_pass);
        $sql->bindValue(6, $telefono);
        $sql->bindValue(7, $rol_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    
    public function update_usuario($usu_id,$usu_nom,$usu_apep,$usu_apem,$usu_corr,$usu_pass,$telefono,$rol_id){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql = "UPDATE usuario 
        SET 
            usu_nom=?
            usu_apep=?,
            usu_apem=?,
            usu_correo=?,
            usu_pass=?,
            telefono=?,
            rol_id=?
        WHERE usu_id=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_nom);
        $sql->bindValue(2, $usu_apep);
        $sql->bindValue(3, $usu_apem);
        $sql->bindValue(4, $usu_corr);
        $sql->bindValue(5, $usu_pass);
        $sql->bindValue(6, $telefono);
        $sql->bindValue(7, $rol_id);
        $sql->bindValue(8, $usu_id);
        $sql->execute();
        return true; 
    }

    public function get_usuario(){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql = "SELECT 
            usuario.usu_id,
            usuario.usu_nom,
            usuario.usu_apep,
            usuario.usu_apem,
            usuario.usu_corr,
            usuario.usu_pass,
            usuario.usu_sex,
            usuario.telefono,
            rol_usuario.rol_id,
            rol_usuario.rol_tipo
            FROM usuario
            INNER JOIN rol_usuario ON usuario.rol_id = rol_usuario.rol_id
            WHERE usuario.est = 1;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function delete_usuario($usu_id){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql="UPDATE usuario
            SET 
                est=0
            WHERE
             usu_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$usu_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
      
    }
    public  function get_cursos_usuario_id($cur_id){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql="SELECT
               curso_usuario.curusu_id,
               curso.cur_id,
               curso.cur_nom,
               curso.cur_des,
               curso.fech_ini,
               curso.fech_fin,
               usuario.usu_id,
               usuario.usu_nom,
               usuario.usu_apep,
               usuario.usu_apem,
               instructor.inst_id,
               instructor.inst_nom,
               instructor.inst_apep,
               instructor.inst_apem
           FROM curso_usuario
           INNER JOIN curso ON curso_usuario.cur_id = curso.cur_id
           INNER JOIN usuario ON curso_usuario.usu_id = usuario.usu_id
           INNER JOIN instructor ON curso.inst_id = instructor.inst_id
           WHERE
           curso_usuario.cur_id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cur_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
  }

    }
?>