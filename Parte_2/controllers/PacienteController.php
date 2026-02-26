<?php

require_once '../../Parte_1/models/pacientes.php';

class PacienteController
{
    public function index()
    {
        $p = new Medico();
        $pacientes = $p->obtenerTodos();
        require 'views/pacientes_todos.php';
    }

    public function crear()
    {
        if ($_POST) {
            (new Paciente())->insertar($_POST['nombre'], $_POST['DNI']);
            header("Location: index.php");
            exit();
        }
        require 'views/paciente_crear.php';
    }
}