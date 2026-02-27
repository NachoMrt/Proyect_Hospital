<?php require 'views/header.php'; ?>

<div class="card-hospital">
    <h2>Actualizar Cita Médica</h2>
    <form method='post' action="?c=Cita&a=editar" class="grid-form">
        <input type="hidden" name="Id_medico" value="<?= $data['Id_medico']?>">

        <div class="form-group">
            <label>Fecha</label>
            <input class="form-control-hosp" name='dia' value='<?= $data['dia']?>' type="date">
        </div>
        <div class="form-group">
            <label>Hora</label>
            <input class="form-control-hosp" name='hora' value='<?= $data['hora']?>' type="time">
        </div>
        <div class="form-group">
            <label>Nombre Paciente</label>
            <input class="form-control-hosp" name='nombre' value='<?= $data['nombre']?>' type="text">
        </div>
        <div class="form-group">
            <label>DNI</label>
            <input class="form-control-hosp" name='dni' value='<?= $data['DNI']?>' type="text">
        </div>
        <div class="form-group">
            <label>ID Paciente</label>
            <input class="form-control-hosp" name='id_paciente' value='<?= $data['id_paciente']?>' type="number">
        </div>
        <button class="btn-hosp">Guardar Cambios</button>
    </form>
</div>

<?php require 'views/footer.php'; ?>


