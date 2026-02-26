<?php

require_once '../../Parte_1/models/medicos.php';

class MedicoController {
    public function index() {
        $m = new Medico();
        $medicos = $m ->obtenerTodos();
        require 'views/medicos_todos.php';
    }

    public function crear() {
        if($_POST) {
            
        }
    }
}