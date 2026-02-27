<?php
require_once '../config/conexion.php';

class Medico extends Conexion
{
    public function obtenerTodos()
    {
        $sql = "SELECT * FROM medico";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($nombre, $dni, $id_paciente, $id_departamento)
    {
        $sql = "INSERT INTO medico (nombre, DNI, id_paciente, id_departamento) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$nombre, $dni, $id_paciente, $id_departamento]);
    }

    public function delete($id_medico)
    {
        $sql = "DELETE FROM medico WHERE id_medico = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id_medico]);
    }

     public function update($nombre, $dni, $id_paciente, $id_departamento, $id_medico)
    {
        $sql = "UPDATE medico SET nombre = ?, DNI = ?, id_paciente = ?, id_departamento = ? WHERE id_medico = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$nombre, $dni, $id_paciente, $id_departamento, $id_medico]);
    }
    
     public function obtenerPorId($id_medico)
    {
        $sql = "SELECT * FROM medico WHERE id_medico = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id_medico]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
