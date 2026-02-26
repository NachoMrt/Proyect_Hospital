<?php require 'views/header.php';
require_once __DIR__."/../controllers/PacienteController.php"
?>
<main>
    <div>Lista de Tratamientos</div>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Duracion</th>
                <th>Paciente</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tratamientos as $t): ?>
                <tr>
                    <td><strong><?= htmlspecialchars($t['nombre']) ?></strong></td>
                    <td><?= htmlspecialchars($t['duracion']) ?></td>
                    <td><?= htmlspecialchars((new PacienteController())->getById($t['id_paciente'])['nombre']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>