<?php

require_once __DIR__ . '/../models/pacientes.php';
class PacienteController
{
    public function index()
    {
        $p = new Paciente();
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

    public function editar()
    {
        // En DOS pasos como método anterior de crear()
        $u = new Paciente();
        if ($_POST) {
            $u->update($_POST['nombre'], $_POST['DNI'], $_GET['id_paciente']);
            header("Location: index.php");
        }
        $data = $u->getById($_GET['id_tratamiento'])[0];
        require 'views/paciente_editar.php';
    }

    public function eliminar()
    {
        (new Paciente())->delete($_GET['id_paciente']);
        header("Location: index.php");
    }
}
