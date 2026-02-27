<?php require 'views/header.php'; ?>

<div class="main-container">
    <div class="card-hospital">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2>Gestión de Citas Médicas</h2>
            <a href='?c=Cita&a=crear' class="btn-hosp" style="text-decoration: none;">+ Nueva Cita</a>
        </div>
        
        <table class="grid-form" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="border-bottom: 2px solid #ddd; text-align: left;">
                    <th>ID Médico</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Paciente</th>
                    <th>DNI</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($citas as $cita): ?>
                    <tr style="border-bottom: 1px solid #eee;">
                        <td><?= $cita['Id_medico'] ?></td>
                        <td><?= $cita['dia'] ?></td>
                        <td><?= $cita['hora'] ?></td>
                        <td><?= $cita['nombre'] ?></td>
                        <td><?= $cita['DNI'] ?></td>
                        <td>
                            <a href='?c=Cita&a=editar&Id_medico=<?= $cita['Id_medico']?>' style="color: blue; margin-right: 10px;">Editar</a> 
                            <a href='?c=Cita&a=eliminar&Id_medico=<?= $cita['Id_medico']?>' style="color: red;" onclick="return confirm('¿Eliminar cita?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require 'views/footer.php'; ?>