<?php
   class Categoria extends Conectar {
    public function insert_categoria($cat_id,$cur_nom,$cur_desc,$fech_ini,$fech_fin,$inst_id){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql="INSERT INTO  curso(cur_id, cur_nom, cur_des, fech_ini, fech_fin, inst_id, fech_crea, est) VALUES (null,?,?,?,?,?,now(),'1');";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cat_id);
        $sql->bindValue(2,$cur_nom);
        $sql->bindValue(3,$cur_desc);
        $sql->bindValue(4,$fech_ini);
        $sql->bindValue(5,$fech_fin);
        $sql->bindValue(6,$inst_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function update_categoria($cur_id,$cat_id,$cur_nom,$cur_desc,$fech_ini,$fech_fin,$inst_id){
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
        $sql->bindValue(3,$cur_desc);
        $sql->bindValue(4,$fech_ini);
        $sql->bindValue(5,$fech_fin);
        $sql->bindValue(6,$inst_id);
        $sql->bindValue(7,$cur_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function delete_categoria($cur_id){
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
    public function get_categoria(){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql="SELECT * FROM categoria WHERE estado=1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function get_categoria_id($cur_id){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql="SELECT * FROM curso WHERE est = 1 and cur_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cur_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();    
    }
}
?>