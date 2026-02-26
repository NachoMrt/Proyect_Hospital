<?php
require_once __DIR__. "/../config/conexion.php";

class Paciente extends Conexion {

    public function obtenerTodos() {
        $sql = "SELECT * FROM pacientes";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($nombre, $dni) {
        $sql = "INSERT INTO pacientes (nombre, DNI) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$nombre, $dni]);
    }
}