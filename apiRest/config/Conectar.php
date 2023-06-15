<?php
class Conectar{
    protected $db;

    protected function conexion(){
        try {
            $conectar = $this->db = new PDO("mysql:local=localhost;dbname=estadisticas", "root", ""); //Lo primero es el DCN
            return $conectar;
        } catch (Exception $e) {
            return $e->getMessage();
            die();
        }
    }

    public function set_name(){
        return $this->db->query("SET NAMES 'utf8'");
    }
}
?>