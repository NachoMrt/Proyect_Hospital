<?php
require_once __DIR__ . '/../Models/Paciente.php';

class PacienteController
{
    public function index()
    {
        echo json_encode(Paciente::all());
    }

    public function show($id)
    {
        $paciente = Paciente::find($id);
        echo $paciente ? json_encode($paciente) : json_encode(['mensaje' => 'No encontrado']);
    }

    public function store($data)
    {
        $paciente = Paciente::create($data);
        http_response_code(201);
        echo json_encode($paciente);
    }

    public function update($id, $data)
    {
        $paciente = Paciente::update($id, $data);
        echo json_encode($paciente);
    }

    public function delete($id)
    {
        echo json_encode(['eliminado' => Paciente::delete($id)]);
    }
}