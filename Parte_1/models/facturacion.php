<?php
require_once "Conexion.php";

class Facturacion extends Conexion
{

    public function obtenerTodas()
    {
        $sql = "SELECT * FROM facturacion";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($nombre, $dni, $id_paciente)
    {
        $sql = "INSERT INTO facturacion (nombre, DNI, id_paciente)
                VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$nombre, $dni, $id_paciente]);
    }

    public function update($nombre, $dni, $id_paciente, $id_facturacion)
    {
        $sql = "UPDATE facturacion SET nombre = ?, DNI = ?, id_paciente = ? WHERE id_facturacion = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$nombre, $dni, $id_paciente, $id_facturacion]);
    }

    public function delete($id_facturacion)
    {
        $sql = "DELETE FROM facturacion WHERE id_facturacion = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id_facturacion]);
    }

     public function obtenerPorId($id_facturacion)
    {
        $sql = "SELECT * FROM facturacion WHERE id_facturacion = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id_facturacion]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
