<?php


$c = $_GET['c'] ?? 'Paciente'||'Citas';

$a = $_GET['a'] ?? 'index';

require_once 'controllers/' . $c . 'Controller.php';

$controllerName = $c . 'Controller';
$controller = new $controllerName();

$controller->$a();
// $cit = $_GET['cit'] ?? 'Citas';

// require_once 'controllers/' . $cit . 'Controller.php';
// $controllerName = $cit . 'Controller';
// $controller = new $controllerName();