
<?php require 'views/header.php'; ?>

<form method='post'>
   
    <input name='id_medico' value='<?= $data['id_medico']?>'>
    <input name='dia' value='<?= $data['dia']?>'>
    <input name='hora' value='<?= $data['hora']?>'>
    <input name='nombre' value='<?= $data['nombre']?>'>
     <input name='DNI' value='<?= $data['DNI']?>'>
     <input type="hidden" name="id_paciente" value="<?= $data['id_paciente'] ?>">
    <button> Actualizar </button>
</form>




