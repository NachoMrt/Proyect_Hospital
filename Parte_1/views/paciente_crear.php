<?php require 'views/header.php'; ?>

<div class="card-hospital">
    <h2>Registrar Nuevo Paciente</h2>
    <form method='post' action="index.php?c=Paciente&a=guardar" class="grid-form">
        <div class="form-group">
            <label>Nombre Completo</label>
            <input class="form-control-hosp" name='nombre' type="text" required>
        </div>
        <div class="form-group">
            <label>DNI</label>
            <input class="form-control-hosp" name='DNI' type="text" required>
        </div>
        <button class="btn-hosp">Guardar Paciente</button>
    </form>
</div>

<?php require 'views/footer.php'; ?>