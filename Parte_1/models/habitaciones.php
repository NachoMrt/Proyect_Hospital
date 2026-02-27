<?php
require_once "Conexion.php";

class Habitacion extends Conexion
{

    public function obtenerTodas()
    {
        $sql = "SELECT * FROM habitacion";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($numero, $planta, $id_enfermero)
    {
        $sql = "INSERT INTO habitaciones (numero, planta, id_enfermero)
                VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$numero, $planta, $id_enfermero]);
    }
    public function delete($id_habitacion)
    {
        $sql = "DELETE FROM citas WHERE id_habitacion = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id_habitacion]);
    }

    public function update($numero, $planta, $id_enfermero, $id_habitacion)
    {
        $sql = "UPDATE habitacion SET numero = ?, planta = ?, id_enfermero = ? WHERE id_habitacion = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$numero, $planta, $id_enfermero, $id_habitacion]);
    }

     public function obtenerPorId($id_habitacion)
    {
        $sql = "SELECT * FROM habitacion WHERE id_habitacion = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id_habitacion]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
