<?php

// INSTALAR libreria:  composer require webonyx/graphql-php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/graphql/schema.php';  // contiene tu definición del esquema GraphQL (los tipos, queries y mutations que tú definiste).

use GraphQL\GraphQL;

header('Content-Type: application/json');

try {
    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);
    $query = $input['query'];  // extrae la consulta o mutación (el texto dentro del campo "query" del JSON).

    $result = GraphQL::executeQuery($schema, $query);
    /*
    $schema → es tu esquema definido en schema.php (donde dijiste qué queries y mutations existen).
    $query → es la cadena que envió el cliente.
    executeQuery() analiza la cadena, busca la query dentro del esquema y ejecuta las funciones resolve asociadas 
        (por ejemplo, getEmpleados(), agregarEmpleado(), etc.).
    */
    $output = $result->toArray(); // El resultado de GraphQL viene como un objeto complejo.
                                  // Este método lo convierte a un array PHP estándar, listo para transformarse en JSON.

} catch (Exception $e) {
    $output = ['error' => ['message' => $e->getMessage()]];
}

echo json_encode($output);


/*
ENDPOINT:

    URL:  http://localhost/Certificado/PHP/hospital-GQL/GraphQL/index.php

    - Leer (GET):
    POST 
	{ "query": "{ empleados { id nombre puesto } }" }

    - Crear (POST):
	POST
    {
        "query": "mutation { agregarEmpleado(nombre:\"Lucía\", puesto:\"Backend Developer\") { id nombre puesto } }"
    }

    - Actualizar (PUT):
	POST
    {
		"query": "mutation { actualizarEmpleado(id:1, nombre:\"Lucía Pérez\", puesto:\"Senior Backend\") { id nombre puesto } }"
    }

    - Borrar (DELETE):
	POST
    { "query": "mutation { eliminarEmpleado(id:2) }" }


SINTAXIS :
mutation {
  nombreDeLaOperacion(argumento1: valor1, argumento2: valor2) {
    camposQueQuieroRecibir
  }
}
Para strings SIEMPRE entre comillas dobles "...". El resto no

Si mandas la query desde un archivo JSON (como haces con Postman),
    entonces tienes que escapar las comillas internas con \" porque el JSON también usa comillas.

*/

?>






