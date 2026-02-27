<?php
require_once __DIR__ . '/../Core/database.php';

class Paciente
{
    public static function all()
    {
        $db = Database::connect();
        return $db->query("SELECT * FROM paciente")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM paciente WHERE id_paciente = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO paciente (nombre, dni, fecha_nacimiento, telefono) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['nombre'], $data['dni'], $data['fecha_nacimiento'], $data['telefono']]);
        return self::find($db->lastInsertId());
    }

    public static function update($id, $data)
    {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE paciente SET nombre = ?, dni = ?, fecha_nacimiento = ?, telefono = ? WHERE id_paciente = ?");
        $stmt->execute([$data['nombre'], $data['dni'], $data['fecha_nacimiento'], $data['telefono'], $id]);
        return self::find($id);
    }

    public static function delete($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM paciente WHERE id_paciente = ?");
        return $stmt->execute([$id]);
    }
}