<?php
require_once "Conexion.php";

class Tratamiento extends Conexion
{

    public function obtenerTodos()
    {
        $sql = "SELECT * FROM tratamientos";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($nombre, $duracion, $id_paciente)
    {
        $sql = "INSERT INTO tratamientos (nombre, duracion, id_paciente)
                VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$nombre, $duracion, $id_paciente]);
    }

    public function obtenerPorPaciente($id_paciente)
    {
        $sql = "SELECT * FROM tratamientos WHERE id_paciente = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id_paciente]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}