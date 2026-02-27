<?php require 'views/header.php'; ?>
<link rel="stylesheet" href="css/pacientes.css">

<main class="main-content">

    <div class="gestion-header">
        <div>
            <h1>Gestión de Pacientes</h1>
            <p style="color: var(--verde-oliva); font-weight: 500;">Hospital Último Aliento - Registro Central</p>
        </div>
        <span class="contador-badge">
            <?php echo count($pacientes); ?> pacientes en total
        </span>
    </div>

    <section class="card-registro">
        <h3>✨ Registrar Nuevo Paciente</h3>
        <form action="index.php?c=Paciente&a=crear" method="POST" class="form-registro">
            <div class="input-group">
                <label for="nombre">Nombre Completo</label>
                <input type="text" id="nombre" name="nombre" class="input-control" placeholder="Nombre y apellidos" required>
            </div>
            <div class="input-group">
                <label for="dni">DNI / Identificación</label>
                <input type="text" id="dni" name="DNI" class="input-control" placeholder="12345678X" required>
            </div>
            <button type="submit" class="btn-guardar">
                Guardar Registro
            </button>
        </form>
    </section>

    <section class="tabla-contenedor">
        <table class="tabla-hospital">
            <thead>
                <tr>
                    <th>Nombre del Paciente</th>
                    <th>Documento (DNI)</th>
                    <th style="text-align: center;">Gestión</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($pacientes)): ?>
                    <tr>
                        <td colspan="3" style="text-align: center; padding: 40px; color: #94a3b8;">
                            No hay pacientes registrados en el sistema.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($pacientes as $p): ?>
                        <tr>
                            <td>
                                <strong style="color: var(--azul-oscuro); font-size: 1.05rem;">
                                    <?= htmlspecialchars($p['nombre']) ?>
                                </strong>
                            </td>
                            <td style="font-family: 'Courier New', Courier, monospace; font-weight: 600; color: var(--verde-oliva);">
                                <?= htmlspecialchars($p['DNI']) ?>
                            </td>
                            <td style="text-align: center;">
                                <a href="?c=Tratamiento&a=ver&id=<?= $p['id_paciente'] ?>" title="Ver Tratamientos" style="text-decoration: none; font-size: 1.2rem; margin-right: 15px;">💊</a>
                                <a href="?c=Cita&a=nueva&id=<?= $p['id_paciente'] ?>" title="Programar Cita" style="text-decoration: none; font-size: 1.2rem;">📅</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    <div style="margin-top: 40px; display: flex; gap: 20px; justify-content: center;">
        <a href="index.php" class="btn-nav-azul" style="background: #e2e8f0; color: #475569;">
            ⬅️ Panel Principal
        </a>
        <a href="?c=Tratamiento" class="btn-nav-azul">
            💊 Todos los Tratamientos
        </a>
        <a href="?c=Cita" class="btn-nav-azul" style="background: var(--verde-oliva);">
            📅 Agenda de Citas
        </a>
    </div>

</main>

<?php require 'views/footer.php'; ?>