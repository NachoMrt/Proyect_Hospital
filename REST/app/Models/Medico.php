<?php
require_once __DIR__ . '/../Core/database.php';

class Medico
{
    public static function all()
    {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM medico");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM medico WHERE id_medico = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO medico (nombre, especialidad, id_departamento) VALUES (?, ?, ?)");
        $stmt->execute([$data['nombre'], $data['especialidad'], $data['id_departamento']]);
        return self::find($db->lastInsertId());
    }

    public static function update($id, $data)
    {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE medico SET nombre = ?, especialidad = ?, id_departamento = ? WHERE id_medico = ?");
        $stmt->execute([$data['nombre'], $data['especialidad'], $data['id_departamento'], $id]);
        return self::find($id);
    }

    public static function delete($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM medico WHERE id_medico = ?");
        return $stmt->execute([$id]);
    }
}