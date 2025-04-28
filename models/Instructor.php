<?php
   class Instructor extends Conectar {
    public function insert_instructor($inst_nom,$inst_apep,$inst_apem,$inst_sex,$inst_telf,$inst_correo){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql="INSERT INTO  instructor (inst_id, inst_nom, inst_apep, inst_apem,inst_sex,inst_telf,inst_correo,fech_crea, est) VALUES (null,?,?,?,?,?,?,now(),1);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$inst_nom);
        $sql->bindValue(2,$inst_apep);
        $sql->bindValue(3,$inst_apem);
        $sql->bindValue(4,$inst_sex);
        $sql->bindValue(6,$inst_telf);
        $sql->bindValue(6,$inst_correo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function update_instructor($inst_id,$inst_nom,$inst_apep,$inst_apem,$inst_sex,$inst_telf,$inst_correo){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql=" UPDATE instructor
            SET 
                inst_nom=?,
                inst_apep=?,
                inst_apem=?,
                inst_sex=?,
                inst_telf=?,
                inst_correo=?
            WHERE
                inst_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$inst_nom);
        $sql->bindValue(2,$inst_apep);
        $sql->bindValue(3,$inst_apem);
        $sql->bindValue(4,$inst_sex);
        $sql->bindValue(6,$inst_telf);
        $sql->bindValue(6,$inst_correo);
        $sql->bindValue(7,$inst_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function delete_instructor($inst_id){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql="UPDATE instructor
            SET 
                est=0
            WHERE
             inst_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$inst_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function get_instructor(){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql="SELECT * FROM instructor WHERE est=1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function get_instructor_id($inst_id){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql="SELECT * FROM instructor WHERE est = 1 and inst_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$inst_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();    
    }
}
?>