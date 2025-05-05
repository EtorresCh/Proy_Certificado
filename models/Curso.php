<?php
    class Curso extends Conectar {
        public function insert_curso($cat_id,$cur_nom,$cur_des,$fech_ini,$fech_fin,$inst_id){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql="INSERT INTO  curso (cur_id, cat_id, cur_nom, cur_des, fech_ini, fech_fin, inst_id,cur_img ,fech_crea, est) VALUES (null,?,?,?,?,?,?,'../../public/certificado5.png',now(),1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$cat_id);
            $sql->bindValue(2,$cur_nom);
            $sql->bindValue(3,$cur_des);
            $sql->bindValue(4,$fech_ini);
            $sql->bindValue(5,$fech_fin);
            $sql->bindValue(6,$inst_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function update_curso($cur_id,$cat_id,$cur_nom,$cur_des,$fech_ini,$fech_fin,$inst_id){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql=" UPDATE curso
                SET 
                    cat_id=?,
                    cur_nom=?,
                    cur_des=?,
                    fech_ini=?,
                    fech_fin=?,
                    inst_id=?
                WHERE
                    cur_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$cat_id);
            $sql->bindValue(2,$cur_nom);
            $sql->bindValue(3,$cur_des);
            $sql->bindValue(4,$fech_ini);
            $sql->bindValue(5,$fech_fin);
            $sql->bindValue(6,$inst_id);
            $sql->bindValue(7,$cur_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function delete_curso($cur_id){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql="UPDATE curso
                SET 
                    est=0
                WHERE
                 cur_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$cur_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();          
        }
        public function get_curso(){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql="SELECT 
                    curso.cur_id,
                    curso.cur_nom,
                    curso.cur_des,
                    curso.fech_ini,
                    curso.fech_fin,
                    categoria.cat_id,
                    categoria.cat_nom,
                    instructor.inst_id,
                    instructor.inst_nom,
                    instructor.inst_apep,
                    instructor.inst_apem,
                    instructor.inst_correo,
                    instructor.inst_sex,
                    instructor.inst_telf
                FROM curso
                INNER JOIN categoria ON curso.cat_id = categoria.cat_id
                INNER JOIN instructor ON curso.inst_id = instructor.inst_id
                WHERE curso.est = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function get_curso_id($cur_id){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql="SELECT * FROM curso WHERE est = 1 and cur_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$cur_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();    
        }
        public function get_curso_combo(){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql = "SELECT * FROM curso WHERE est = 1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function delete_curso_usuario($curusu_id){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql="UPDATE curso_usuario
                SET 
                    est=0
                WHERE
                 curusu_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$curusu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
          
        }
        public function insert_curso_usuario($cur_id,$usu_id){
            $conectar =parent::conexion();
            parent::set_names();
            $sql="INSERT INTO curso_usuario(curusu_id, cur_id, usu_id, fech_cre, est) VALUES (null,?,?,now(),1)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$cur_id);
            $sql->bindValue(2,$usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function upload_file(){
           if(isset($_FILES['#cur_img'])){
              $extension=explode('',$_FILES['cur_img']['name']);
              $new_name =rand() .'.'.$extension[1];
              $destination="../../public/".$new_name;
              move_uploaded_file($_FILES['cur_img']['tmp_name'],$destination);
              return $new_name;
            }
        }
        
    }
?>