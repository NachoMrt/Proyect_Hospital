<?php

require_once '../../Parte_1/models/medicos.php';

class MedicoController
{
    public function index()
    {
        $m = new Medico();
        $medicos = $m->obtenerTodos();
        require 'views/medicos_todos.php';
    }

    public function crear()
    {
        if ($_POST) {
            (new Medico())->insertar($_POST['nombre'], $_POST['DNI'], $_POST['id_departamento']);
            header("Location: index.php");
            exit();
        }
        require 'views/medico_crear.php';
    }
}