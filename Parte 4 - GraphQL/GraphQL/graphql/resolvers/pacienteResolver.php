<?php

require_once __DIR__ . '/../../db.php';



function getPacientes()
{
    global $pdo;
    $stmt = $pdo->query("SELECT id_paciente, nombre, dni, fecha_nacimiento, telefono FROM paciente");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPaciente($id_paciente)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT nombre, dni, fecha_nacimiento, telefono FROM paciente WHERE id_paciente = ?");
    $stmt->execute([$id_paciente]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function agregarPaciente($nombre, $dni, $fecha_nacimiento, $telefono)
{
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO paciente (nombre, dni, fecha_nacimiento, telefono) VALUES(?,?,?,?)");
    $stmt->execute([$nombre, $dni, $fecha_nacimiento, $telefono]);
    $id = $pdo->lastInsertId();
    return ['id_paciente' => $id, 'nombre' => $nombre, 'dni' => $dni, 'fecha_nacimiento' => $fecha_nacimiento, 'telefono' => $telefono];
}

function actualizarPaciente($id_paciente, $nombre, $dni, $fecha_nacimiento, $telefono)
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE paciente SET nombre=?, dni =?, fecha_nacimiento = ?, telefono = ? WHERE id_paciente=?");
    $stmt->execute([$nombre, $dni, $fecha_nacimiento, $telefono, $id_paciente]);
    return ['id_paciente' => $id_paciente, 'nombre' => $nombre, 'dni' => $dni, 'fecha_nacimiento' => $fecha_nacimiento, 'telefono' => $telefono];
}

function eliminarPaciente($id_paciente)
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM paciente WHERE id_paciente=?");
    $stmt->execute([$id_paciente]);
    return true;
}



?>