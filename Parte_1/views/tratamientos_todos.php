<?php
require 'views/header.php';
require_once __DIR__ . "/../controllers/PacienteController.php";

// Instanciamos el controlador una sola vez fuera del bucle para mayor eficiencia
$pacienteCtrl = new PacienteController();
?>

<link rel="stylesheet" href="css/tratamientos.css">

<main class="main-content">

    <div class="gestion-header">
        <div>
            <h1>💊 Seguimiento de Tratamientos</h1>
            <p style="color: var(--verde-oliva); font-weight: 500;">Hospital Último Aliento - Control de Medicación</p>
        </div>
        <span class="contador-badge" style="background: var(--azul-oscuro); color: white; padding: 5px 15px; border-radius: 20px;">
            <?php echo count($tratamientos); ?> registros activos
        </span>
    </div>

    <section class="tabla-contenedor">
        <table class="tabla-hospital">
            <thead>
                <tr>
                    <th>Nombre del Tratamiento</th>
                    <th>Duración Estándar</th>
                    <th>Paciente Asignado</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($tratamientos)): ?>
                    <tr>
                        <td colspan="3" style="text-align: center; padding: 40px; color: #94a3b8;">
                            No hay tratamientos registrados actualmente.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($tratamientos as $t): ?>
                        <?php
                        // Buscamos el nombre del paciente usando el ID del tratamiento
                        $paciente = $pacientes->getById($t['id_paciente']);
                        $nombrePaciente = $paciente ? $paciente['nombre'] : "No asignado";
                        ?>
                        <tr>
                            <td>
                                <strong style="color: var(--azul-oscuro); font-size: 1.05rem;">
                                    <?= htmlspecialchars($t['nombre']) ?>
                                </strong>
                            </td>
                            <td>
                                <span class="duracion-badge">
                                    <?= htmlspecialchars($t['duracion']) ?>
                                </span>
                            </td>
                            <td>
                                <div class="paciente-nombre">
                                    👤 <?= htmlspecialchars($nombrePaciente) ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    <div style="margin-top: 40px; display: flex; gap: 20px; justify-content: center;">
        <a href="index.php" class="btn-nav-azul" style="background: #e2e8f0; color: #475569; text-decoration: none; padding: 10px 20px; border-radius: 8px;">
            ⬅️ Volver al Panel
        </a>
        <a href="?c=Paciente" class="btn-nav-azul" style="background: var(--azul-oscuro); color: white; text-decoration: none; padding: 10px 20px; border-radius: 8px;">
            👥 Ver Pacientes
        </a>
    </div>

</main>

<?php require 'views/footer.php'; ?>