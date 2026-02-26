<?php
require_once "Conexion.php";

class Facturacion extends Conexion {

    public function insertar($nombre, $dni, $id_paciente) {
        $sql = "INSERT INTO facturacion (nombre, DNI, id_paciente)
                VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);        
        return $stmt->execute([$nombre, $dni, $id_paciente]);        
    }
}