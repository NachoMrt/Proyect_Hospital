<?php
/*
Este archivo define el “esquema” GraphQL:
    qué tipos de datos existen,
    qué consultas (queries) se pueden hacer,
    qué operaciones de modificación (mutations) están disponibles,
    y qué función PHP se ejecuta en cada caso.
*/

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/resolvers/citaResolver.php';
require_once __DIR__ . '/resolvers/pacienteResolver.php';
require_once __DIR__ . '/resolvers/medicoResolver.php';

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Schema;

// Tipo Empleado
$pacienteType = new ObjectType([
    'name' => 'Paciente',
    'fields' => [
        'id_paciente' => Type::int(),
        'nombre' => Type::string(),
        'dni' => Type::string(),
        'fecha_nacimiento' => Type::string(),
        'telefono' => Type::string()
    ]
]);

$medicoType = new ObjectType([
    'name' => 'Medico',
    'fields' => [
        'id_medico' => Type::int(),
        'nombre' => Type::string(),
        'especialidad' => Type::string(),
        'id_departamento' => Type::string()
    ]
]);

$citaType = new ObjectType([
    'name' => 'Cita',
    'fields' => [
        'id_cita' => Type::int(),
        'id_paciente' => Type::int(),
        'id_medico' => Type::int(),
        'fecha' => Type::string(),
        'hora' => Type::string(),
        'motivo' => Type::string(),
        'paciente' => [
            'type' => fn(): ObjectType => $pacienteType,
            'resolve' => fn($cita) => getPaciente(id_paciente: $cita['id_paciente'])
        ],
        'medico' => [
            'type' => fn(): ObjectType => $medicoType,
            'resolve' => fn($cita) => getMedico(id_medico: $cita['id_medico'])
        ]
    ]
]);

/*
Esto crea un tipo de objeto (como una clase) llamado Empleado.
Define qué campos tiene y qué tipo de datos devuelve cada uno.
*/

// Root Query
$queryType = new ObjectType([
    'name' => 'Query',
    'fields' => [
        'cita' => [
            'type' => Type::listOf($citaType),
            'resolve' => function () {
                return getCitas();
            }
        ],
        'paciente' => [
            'type' => Type::listOf($pacienteType),
            'resolve' => function () {
                return getPacientes();
            }
        ],
        'medico' => [
            'type' => Type::listOf($medicoType),
            'resolve' => function () {
                return getMedicos();
            }
        ],
        'citaID' => [
            'type' => $citaType,
            'args' => [
                'id_cita' => ['type' => Type::int()]
            ],
            'resolve' => fn($root, $args) => getCita($args['id_cita'])
        ],
        'pacienteID' => [
            'type' => $pacienteType,
            'args' => [
                'id_paciente' => ['type' => Type::int()]
            ],
            'resolve' => fn($root, $args) => getPaciente($args['id_paciente'])
        ],
        'medicoID' => [
            'type' => $medicoType,
            'args' => [
                'id_medico' => ['type' => Type::int()]
            ],
            'resolve' => fn($root, $args) => getMedico($args['id_medico'])
        ]
    ]
]);
/*
Este bloque define qué consultas se pueden hacer.
    Aquí hay una sola: empleados.
        'name' => 'Query' → este es el conjunto de todas las consultas posibles.
        'empleados' => [...] → define una consulta llamada empleados.
        'type' => Type::listOf($empleadoType) → dice que devuelve una lista (array) de objetos Empleado.
        'resolve' => fn() => getEmpleados() → indica qué función PHP se ejecuta cuando el cliente pide { empleados { id nombre puesto } }.
*/

// Root Mutation : Aquí defines las operaciones de escritura o mutations de GraphQL crear, modificar y borrar registros.
$mutationType = new ObjectType([
    'name' => 'Mutation',
    'fields' => [
        'agregarCita' => [
            'type' => $citaType,
            'args' => [
                'id_paciente' => Type::nonNull(Type::int()),
                'id_medico' => Type::nonNull(Type::int()),
                'motivo' => Type::nonNull(Type::string())
            ],
            'resolve' => fn($root, $args) => agregarCita($args['id_paciente'], $args['id_medico'], $args['motivo'])
        ],
        'actualizarCita' => [
            'type' => $citaType,
            'args' => [
                'id_cita' => Type::nonNull(Type::int()),
                'id_paciente' => Type::nonNull(Type::int()),
                'id_medico' => Type::nonNull(Type::int()),
                'motivo' => Type::nonNull(Type::string())
            ],
            'resolve' => fn($root, $args) => actualizarCita($args['id_cita'], $args['id_paciente'], $args['id_medico'], $args['motivo'])
        ],
        'eliminarCita' => [
            'type' => Type::boolean(),
            'args' => [
                'id_cita' => Type::nonNull(Type::int())
            ],
            'resolve' => fn($root, $args) => eliminarCita($args['id_cita'])
        ],
        'agregarPaciente' => [
            'type' => $pacienteType,
            'args' => [
                'nombre' => Type::nonNull(Type::string()),
                'dni' => Type::nonNull(Type::string()),
                'fecha_nacimiento' => Type::nonNull(Type::string()),
                'telefono' => Type::nonNull(Type::string())
            ],
            'resolve' => fn($root, $args) => agregarPaciente($args['nombre'], $args['dni'], $args['fecha_nacimiento'], $args['telefono'])
        ],
        'actualizarPaciente' => [
            'type' => $pacienteType,
            'args' => [
                'id_paciente' => Type::nonNull(Type::int()),
                'nombre' => Type::nonNull(Type::string()),
                'dni' => Type::nonNull(Type::string()),
                'fecha_nacimiento' => Type::nonNull(Type::string()),
                'telefono' => Type::nonNull(Type::string())
            ],
            'resolve' => fn($root, $args) => actualizarPaciente($args['id_paciente'], $args['nombre'], $args['dni'], $args['fecha_nacimiento'], $args['telefono'])
        ],
        'eliminarPaciente' => [
            'type' => Type::boolean(),
            'args' => [
                'id_paciente' => Type::nonNull(Type::int())
            ],
            'resolve' => fn($root, $args) => eliminarPaciente($args['id_paciente'])
        ]
    ]
]);

$schema = new Schema([
    'query' => $queryType,
    'mutation' => $mutationType
]);
/*
Aquí juntamos todo:
    $queryType → las consultas (lectura)
    $mutationType → las mutaciones (escritura)

El resultado es un objeto $schema que describe toda tu API GraphQL.
Este $schema se devuelve al index.php, donde se usa en esta línea:
    $result = GraphQL::executeQuery($schema, $query);
Ahí es donde GraphQL “interpreta” lo que pidió el cliente, busca en el esquema qué resolver ejecutar, y llama a tu función PHP correspondiente.
*/



?>