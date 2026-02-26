<?php
require_once 'config/conexion.php';

class Cita extends Conexion {

    public function insertar($id_medico, $dia, $hora, $nombre, $dni, $id_paciente) {
        $sql = "INSERT INTO citas (Id_medico, dia, hora, nombre, DNI, id_paciente)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id_medico, $dia, $hora, $nombre, $dni, $id_paciente]);
    }

    public function obtenerPorPaciente($id_paciente) {
        $sql = "SELECT * FROM citas WHERE id_paciente = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id_paciente]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}