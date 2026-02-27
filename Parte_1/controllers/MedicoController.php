<?php

require_once __DIR__ . '/../models/medicos.php';

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
            (new Medico())->insertar($_POST['nombre'], $_POST['DNI'], $_POST["id_paciente"], $_POST['id_departamento']);
            header("Location: index.php");
            exit();
        }
        require 'views/medico_crear.php';
    }

    public function eliminar()
    {
        (new Medico())->delete($_GET['id_medico']);
        header("Location: index.php");
    }

    public function editar()
    {
        // En DOS pasos como método anterior de crear()
        $u = new Medico();
        if ($_POST) {
            $u->update($_GET['nombre'], $_POST['DNI'], $_POST['id_paciente'], $_POST['id_departamento'], $_GET["id_medico"]);
            header("Location: index.php");
        }
        $data = $u->obtenerPorId($_GET['id_tratamiento'])[0];
        require 'views/tratamiento_editar.php';
    }
}