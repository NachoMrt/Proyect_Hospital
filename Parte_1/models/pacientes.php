<?php
require_once __DIR__ . "/../config/conexion.php";

class Paciente extends Conexion
{

    public function getById($id)
    {
        $sql = "SELECT * FROM pacientes WHERE id_paciente = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function obtenerTodos()
    {
        $sql = "SELECT * FROM pacientes";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($nombre, $dni)
    {
        $sql = "INSERT INTO pacientes (nombre, DNI) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$nombre, $dni]);
    }

    public function delete($id_paciente)
    {
        $sql = "DELETE FROM pacientes WHERE Id_paciente = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id_paciente]);
    }
}