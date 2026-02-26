<?php require 'views/header.php'; ?>

<main>
    <div>Lista de Pacientes</div>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>DNI</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pacientes as $p): ?>
                <tr>
                    <td><strong><?= htmlspecialchars($p['nombre']) ?></strong></td>
                    <td><?= htmlspecialchars($p['DNI']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<div>
    <a href='?c=Paciente&a=crear'>Nuevo Paciente</a>
</div>
<div>
    <a href='?c=Tratamiento'>Ver tratamientes</a>
</div>
    <a href='?c=Citas'>Citas</a>
</main>