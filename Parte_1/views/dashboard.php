<?php require 'views/header.php'; ?>

<link rel="stylesheet" href="css/dashboard.css">

<div class="card-hospital">
    <h1 class="dash-title">Panel de Control</h1>
    <p class="dash-subtitle">
        Bienvenida al sistema de gestión del Hospital Último Aliento, Espe.
    </p>

    <div class="grid-dashboard">
        
        <div class="modulo-card bg-citas">
            <span class="modulo-icon">📅</span>
            <h3>Citas</h3>
            <p>Gestionar turnos médicos</p>
            <a href="index.php?c=Cita" class="btn-hosp">Entrar</a>
        </div>

        <div class="modulo-card bg-pacientes">
            <span class="modulo-icon">👥</span>
            <h3>Pacientes</h3>
            <p>Registro de historiales</p>
            <a href="index.php?c=Paciente" class="btn-hosp">Entrar</a>
        </div>

        <div class="modulo-card bg-medicos">
            <span class="modulo-icon">👨‍⚕️</span>
            <h3>Médicos</h3>
            <p>Personal del hospital</p>
            <a href="index.php?c=Medico" class="btn-hosp">Entrar</a>
        </div>

        <div class="modulo-card bg-tratamientos">
            <span class="modulo-icon">💊</span>
            <h3>Tratamientos</h3>
            <p>Seguimiento médico</p>
            <a href="index.php?c=Tratamiento" class="btn-hosp">Entrar</a>
        </div>

    </div>
</div>

<?php require 'views/footer.php'; ?>