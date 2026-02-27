<?php require 'views/header.php'; ?>

<form method='post' action="">


    <input name='dia' value='<?= $data['dia'] ?>' type="date">
    <input name='hora' value='<?= $data['hora'] ?>' type="time">
    <input name='nombre' value='<?= $data['nombre'] ?>' type="text">
    <input name='DNI' value='<?= $data['DNI'] ?>' type="text">
    <input name='id_paciente' value='<?= $data['id_paciente'] ?>' type="text">
    <input type="hidden" name="Id_medico" value="<?= $data['Id_medico'] ?>">
    <button> Actualizar </button>
</form>