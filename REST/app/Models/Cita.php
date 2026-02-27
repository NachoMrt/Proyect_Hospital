<?php

require_once __DIR__ . '/../Core/database.php';

class Cita
{
    public static function all()
    {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM cita");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM cita WHERE id_cita = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO cita (id_cita, id_paciente, id_medico, motivo) VALUES (null, ?, ?, ?)");
        $stmt->execute([$data['id_paciente'], $data['id_medico'], $data['motivo']]);
        return self::find($db->lastInsertId());
    }

    public static function update($id, $data)
    {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE cita SET id_paciente = ?, id_medico = ?, motivo = ? WHERE id_cita = ?");
        $stmt->execute([$data['id_paciente'], $data['id_medico'], $data['motivo'], $id]);
        return self::find($id);
    }

    public static function delete($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM cita WHERE id_cita = ?");
        return $stmt->execute([$id]);
    }

}
?>