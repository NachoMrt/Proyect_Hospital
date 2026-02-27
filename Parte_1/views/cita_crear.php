<?php require 'views/header.php'; ?>

<div class="main-container">
    <div class="card-hospital">
        <h2>Nueva Cita Médica</h2>
        <form method='post' action='procesar_cita.php' class="grid-form">
            <div class="form-group">
                <label>ID Médico</label>
                <input class="form-control-hosp" name='Id_medico' type="number">
            </div>
            <div class="form-group">
                <label>Fecha</label>
                <input class="form-control-hosp" name='dia' type="date">
            </div>
            <div class="form-group">
                <label>Hora</label>
                <input class="form-control-hosp" name='hora' type="time">
            </div>
            <div class="form-group">
                <label>Nombre Paciente</label>
                <input class="form-control-hosp" name='nombre' type="text">
            </div>
            <div class="form-group">
                <label>DNI</label>
                <input class="form-control-hosp" name='DNI' type="text">
            </div>
            <div class="form-group">
                <label>ID Paciente</label>
                <input class="form-control-hosp" name='id_paciente' type="number">
            </div>
            <button class="btn-hosp">Guardar Cita</button>
        </form>
    </div>
</div>

<?php require 'views/footer.php'; ?>