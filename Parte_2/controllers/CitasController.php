<?php
require_once __DIR__ . '/../../Parte_1/models/citas.php';

class CitasController {
    public function index() {
        $c = new Cita();
        $citas = $c->obtenerTodosCitas();
        require 'views/citas_lista.php';
    }
    public function crear() {
       
        if($_POST){
            (new Cita())->insertar($_POST['id_medico'],$_POST['dia'],$_POST['hora'],$_POST['nombre'],$_POST['DNI'],$_POST['id_paciente']);
            header("Location: index.php");
        }
        require 'views/cita_crear.php';
    }
    public function editar() {
        // En DOS pasos como método anterior de crear()
        $u = new Cita();
        if($_POST){
            $u->update($_POST['id_medico'],$_POST['dia'],$_POST['hora'],$_POST['nombre'],$_POST['dni'],$_POST['id_paciente']);
            header("Location: index.php");
        }
        $data = $u->obtenerPorPaciente($_GET['id_paciente']);
        require 'views/cita_editar.php';
    }
    public function eliminar() {
        (new Cita())->delete($_GET['id_paciente']);
        header("Location: index.php");
    }
}