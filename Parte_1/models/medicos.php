<?php
require_once "Conexion.php";

class Medico extends Conexion {

    public function obtenerTodos() {
        $sql = "SELECT * FROM medico";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($nombre, $dni, $id_departamento) {
        $sql = "INSERT INTO medico (nombre, DNI, id_departamento) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$nombre, $dni, $id_departamento]);
    }
}