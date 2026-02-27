<?php
// El controlador es el que contiene la lógica real de los endpoints (CRUD, validaciones…).

require_once __DIR__ . '/../Models/Cita.php';

class CitaController
{
    public function index()
    {
        echo json_encode(Cita::all());
    }
    public function show($id)
    {
        $cita = Cita::find($id);
        if (!$cita) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Cita no encontrada']);
        } else {
            echo json_encode($cita);
        }
    }
    public function store($data)
    {
        if (!isset($data['id_paciente']) || !isset($data['id_medico']) || !isset($data['motivo'])) {
            http_response_code(400);
            echo json_encode(['mensaje' => 'Datos incompletos error aquí']);
            return;
        }
        $cita = Cita::create($data);
        http_response_code(201);
        echo json_decode($cita);
    }

    public function update($id, $data){
        $cita = Cita::update($id, $data);
        if (!$cita){
    http_response_code(404);
    echo json_encode(['mensaje'=> 'Cita no encontrada']);
        } else{
            echo json_encode($cita);
        }
    }

    public function delete($id){
        $result = Cita::delete($id);
        if ($result){
            echo json_encode(['mensaje'=> 'Cita eliminada']);
        }else{
            echo json_encode(['mensaje'=> 'Cita no encontrada']) ;
        }
    }
}

?>