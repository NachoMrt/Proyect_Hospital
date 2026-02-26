<?php
require_once "Conexion.php";

class Habitacion extends Conexion {

    public function obtenerTodas() {
        $sql = "SELECT * FROM habitacion";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);     
    }
}