<?php
require_once __DIR__ . '/../Models/Medico.php';

class MedicoController
{
    public function index()
    {
        echo json_encode(Medico::all());
    }

    public function show($id)
    {
        $medico = Medico::find($id);
        if (!$medico) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Médico no encontrado']);
        } else {
            echo json_encode($medico);
        }
    }

    public function store($data)
    {
        if (!isset($data['nombre']) || !isset($data['especialidad'])) {
            http_response_code(400);
            echo json_encode(['mensaje' => 'Datos incompletos']);
            return;
        }
        $medico = Medico::create($data);
        http_response_code(201);
        echo json_encode($medico);
    }

    public function update($id, $data)
    {
        $medico = Medico::update($id, $data);
        echo $medico ? json_encode($medico) : json_encode(['mensaje' => 'Error al actualizar']);
    }

    public function delete($id)
    {
        $result = Medico::delete($id);
        echo json_encode(['mensaje' => $result ? 'Médico eliminado' : 'No encontrado']);
    }
}