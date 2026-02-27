<?php

require_once __DIR__ . '/../models/tratamientos.php';


class TratamientoController
{
    public function index()
    {
        $t = new Tratamiento();
        $tratamientos = $t->obtenerTodos();
        require 'views/tratamientos_todos.php';
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

    public function obtenerPorId()
    {
        if (isset($_GET['id_tratamiento'])) {

            $id = $_GET['id_tratamiento'];

            $tratamiento = new Tratamiento();
            $tratamientos = $tratamiento->obtenerPorId($id);
            require 'views/tratamiento_lista.php';
        } else {
            echo "Tratamiento no especificado";
        }
    }

    public function editar()
    {
        // En DOS pasos como método anterior de crear()
        $u = new Tratamiento();
        if ($_POST) {
            $u->update($_GET['nombre'], $_POST['duracion'], $_POST['id_paciente'], $_GET['id_tratamiento']);
            header("Location: index.php");
        }
        $data = $u->obtenerPorId($_GET['id_tratamiento'])[0];
        require 'views/tratamiento_editar.php';
    }

    public function eliminar()
    {
        (new Tratamiento())->delete($_GET['id_tratamiento']);
        header("Location: index.php");
    }
}
