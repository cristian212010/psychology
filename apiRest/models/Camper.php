<?php

class Persona extends Conectar{
    private $id;
    private $nombre;
    private $telefono;
    private $correo;
    private $foto;
    private $documento;
    private $tipo_documento;
    private $tipo_persona;  

    public function __construct($id=0, $nombre='', $telefono='', $correo='', $documento = 0, $tipo_documento='', $tipo_persona=''){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->documento = $documento;
        $this->tipo_documento = $tipo_documento;
        $this->cortipo_personareo = $tipo_persona;
    }

    function set_nombre($id){
        $this->id=$id;
    }

    function get_nombre(){
        return $this->nombre;
    }

    function set_telefono($telefono){
        $this->telefono=$telefono;
    }

    function get_telefono(){
        return $this->telefono;
    }

    function set_correo($correo){
        $this->correo=$correo;
    }

    function get_correo(){
        return $this->correo;
    }

    function set_documento($documento){
        $this->documento=$documento;
    }

    function get_documento(){
        return $this->documento;
    }

    function set_tipo_documento($tipo_documento){
        $this->tipo_documento=$tipo_documento;
    }

    function get_tipo_documento(){
        return $this->tipo_documento;
    }

    function set_tipo_persona($tipo_persona){
        $this->tipo_persona=$tipo_persona;
    }

    function get_tipo_persona(){
        return $this->tipo_persona;
    }


    public function get_persona(){
        $conectar = parent::conexion();
        parent::set_name();
        $stm = $conectar->prepare("SELECT * FROM persona");
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_persona_id($id){
        $conectar = parent::conexion();
        parent::set_name();
        $stm = $conectar->prepare("SELECT * FROM persona WHERE id=?");
        $stm -> bindvalue(1,$id);
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_persona($nombre, $telefono, $correo, $documento, $tipo_documento, $tipo_persona){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO persona(nombre,telefono,correo,documento,tipo_documento, tipo_persona) VALUES(?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$nombre);
        $stm->bindValue(2,$telefono);
        $stm->bindValue(3,$correo);
        $stm->bindValue(4,$documento);
        $stm->bindValue(5,$tipo_documento);
        $stm->bindValue(6,$tipo_persona);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }
}
?>