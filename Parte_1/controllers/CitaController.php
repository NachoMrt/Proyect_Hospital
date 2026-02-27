<?php

require_once __DIR__ . '/../models/citas.php';

class CitaController
{
    public function index()
    {
        $c = new Cita();
        $citas = $c->obtenerTodosCitas();
        require 'views/citas_lista.php';
    }
    public function crear()
    {

        if ($_POST) {
            (new Cita())->insertar($_POST['Id_medico'], $_POST['dia'], $_POST['hora'], $_POST['nombre'], $_POST['DNI'], $_POST['id_paciente']);
            header("Location: index.php");
        }
        require 'views/cita_crear.php';
    }
    public function editar()
    {
        // En DOS pasos como método anterior de crear()
        $u = new Cita();
        if ($_POST) {
            $u->update($_GET['Id_medico'], $_POST['dia'], $_POST['hora'], $_POST['nombre'], $_POST['DNI'], $_POST['id_paciente']);
            header("Location: index.php");
        }
        $data = $u->obtenerPorMedico($_GET['Id_medico'])[0];
        require 'views/cita_editar.php';
    }
    public function eliminar()
    {
        (new Cita())->delete($_GET['Id_medico']);
        header("Location: index.php");
    }
}
