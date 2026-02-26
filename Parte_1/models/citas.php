<?php
require_once __DIR__ . "/../config/conexion.php";

class Cita extends Conexion
{

    public function obtenerTodosCitas()
    {
        $sql = "SELECT * FROM citas";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($id_medico, $dia, $hora, $nombre, $dni, $id_paciente)
    {
        $sql = "INSERT INTO citas (Id_medico, dia, hora, nombre, DNI, id_paciente)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id_medico, $dia, $hora, $nombre, $dni, $id_paciente]);
    }

    public function obtenerPorPaciente($id_paciente)
    {
        $sql = "SELECT * FROM citas WHERE id_paciente = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id_paciente]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($id_medico, $dia, $hora, $nombre, $dni, $id_paciente)
    {
        $stmt = $this->conexion->prepare(
            "UPDATE citas SET id_paciente, dia=?, hora=?, nombre=?, dni=?  WHERE Id_medico=?"
        );
        $stmt->execute([$id_paciente, $dia, $hora, $nombre, $dni, $id_medico]);
    }
    public function obtenerPorMedico($id_medico)
    {
        $sql = "SELECT * FROM citas WHERE Id_medico = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id_medico]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id_medico)
    {
        $sql = "DELETE FROM citas WHERE Id_medico = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id_medico]);
    }
}
