<?php

require_once __DIR__ . '/../../db.php';



function getCitas()
{
    global $pdo;
    $stmt = $pdo->query("SELECT id_cita, id_paciente, id_medico, motivo FROM cita");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCita($id_cita)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT id_paciente, id_medico, motivo FROM cita WHERE id_cita = ?");
    $stmt->execute([$id_cita]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function agregarCita( $id_paciente, $id_medico, $motivo)
{
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO cita ( id_paciente, id_medico, motivo) VALUES (?,?,?)");
    $stmt->execute([ $id_paciente, $id_medico, $motivo]);
    $id = $pdo->lastInsertId();
    return ['id_cita' => $id, 'id_paciente' => $id_paciente, 'id_medico' => $id_medico, 'motivo' => $motivo];
}

function actualizarCita($id_cita, $id_paciente, $id_medico, $motivo)
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE cita SET id_paciente = ?, id_medico = ?, motivo = ? WHERE id_cita = ?");
    $stmt->execute([$id_paciente, $id_medico, $motivo, $id_cita]);
    return ['id_cita' => $id_cita, 'id_paciente' => $id_paciente, 'id_medico' => $id_medico, 'motivo' => $motivo];
}

function eliminarCita($id_cita)
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM cita WHERE id_cita=?");
    $stmt->execute([$id_cita]);
    return true;
}



?>