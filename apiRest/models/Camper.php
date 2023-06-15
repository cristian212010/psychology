<?php

class Camper extends Conectar{
    
    public function get_camper(){
        $conectar = parent::conexion();
        parent::set_name();
        $stm = $conectar->prepare("SELECT * FROM campers");
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_camper_id($id){
        $conectar = parent::conexion();
        parent::set_name();
        $stm = $conectar->prepare("SELECT * FROM campers WHERE id=?");
        $stm -> bindvalue(1,$id);
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_camper($id,$imagen,$nombre,$edad, $promedio, $nivelCAmpus, $nivelIngles, $especialidad, $direccion, $celular, $Ingles, $Ser,$Review, $Skills, $Asitencia ){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO campers(id,imagen,nombre,edad,promedio,nivelCAmpus,nivelIngles, especialidad, direccion, celular, Ingles, Ser, Review, Skills, Asitencia) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$id);
        $stm->bindValue(2,$imagen);
        $stm->bindValue(3,$nombre);
        $stm->bindValue(4,$edad);
        $stm->bindValue(5,$promedio);
        $stm->bindValue(6,$nivelCAmpus);
        $stm->bindValue(7,$nivelIngles);
        $stm->bindValue(8,$especialidad);
        $stm->bindValue(9,$direccion);
        $stm->bindValue(10,$celular);
        $stm->bindValue(11,$Ingles);
        $stm->bindValue(12,$Ser);
        $stm->bindValue(13,$Review);
        $stm->bindValue(14,$Skills);
        $stm->bindValue(15,$Asitencia);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }
}
?>