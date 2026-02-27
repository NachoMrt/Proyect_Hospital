<?php
class Router
{
    public function route($method, $uri, $data = null)
    {
        $parts = explode('/', trim($uri, '/'));
        $resource = $parts[0] ?? null; // 'cita', 'paciente' o 'medico'
        $id = $parts[1] ?? null;

        // Mapeo de rutas a controladores
        $routes = [
            'cita' => 'CitaController',
            'paciente' => 'PacienteController',
            'medico' => 'MedicoController'
        ];

        if (!array_key_exists($resource, $routes)) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Recurso no encontrado']);
            return;
        }

        $controllerName = $routes[$resource];
        require_once __DIR__ . "/../Controllers/$controllerName.php";
        $controller = new $controllerName();

        switch ($method) {
            case 'GET':
                $id ? $controller->show($id) : $controller->index();
                break;
            case 'POST':
                $controller->store($data);
                break;
            case 'PUT':
                if (!$id) {
                    http_response_code(400);
                    echo json_encode(['mensaje' => 'ID requerido']);
                    return;
                }
                $controller->update($id, $data);
                break;
            case 'DELETE':
                if (!$id) {
                    http_response_code(400);
                    echo json_encode(['mensaje' => 'ID requerido']);
                    return;
                }
                $controller->delete($id);
                break;
            default:
                http_response_code(405);
                echo json_encode(['mensaje' => 'Método no permitido']);
        }
    }
}


