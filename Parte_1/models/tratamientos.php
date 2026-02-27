<?php
require_once __DIR__ . "/../config/conexion.php";

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

    public function obtenerPorId($id_tratamiento)
    {
        $sql = "SELECT * FROM tratamientos WHERE id_tratamiento = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id_tratamiento]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id_tratamiento)
    {
        $sql = "DELETE FROM tratamientos WHERE id_tratamiento = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id_tratamiento]);
    }
    public function update($nombre, $duracion, $id_paciente, $id_tratamiento)
    {
        $sql = "UPDATE tratamientos SET nombre = ?, duracion = ?, id_paciente = ? WHERE id_tratamiento = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$nombre, $duracion, $id_paciente, $id_tratamiento]);
    }
}
