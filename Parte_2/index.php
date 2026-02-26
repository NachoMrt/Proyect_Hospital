<?php


$c = $_GET['c'] ?? 'Paciente';

$a = $_GET['a'] ?? 'index';

require_once 'controllers/' . $c . 'Controller.php';

$controllerName = $c . 'Controller';
$controller = new $controllerName();

$controller->$a();