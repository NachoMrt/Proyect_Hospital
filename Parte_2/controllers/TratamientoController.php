<?php

require_once __DIR__ . '/../../Parte_1/models/tratamientos.php';


class TratamientoController
{
    public function index()
    {
        $t = new Tratamiento();
        $tratamientos = $t->obtenerTodos();
        require 'views/tratamiento_todos.php';
    }
    public function crear()
    {
        if ($_POST) {
            (new Tratamiento())->insertar($_POST['nombre'], $_POST['duracion'], $_POST['id_paciente']);
            header("Location: index.php");
            exit();
        }
        require 'views/tratamiento_crear.php';
    }

    public function obtenerPorPaciente()
    {
        if (isset($_GET['id_paciente'])) {

            $id = $_GET['id_paciente'];

            $tratamiento = new Tratamiento();
            $tratamientos = $tratamiento->obtenerPorPaciente($id);
            require 'views/tratamiento_lista.php';
        } else {
            echo "Paciente no especificado";
        }
    }
}