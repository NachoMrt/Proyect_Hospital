
<?php require 'views/header.php'; ?>

<form method='post' action="">
   
    <input name='Id_medico' value='<?= $data['Id_medico']?>' type="text">
    <input name='dia' value='<?= $data['dia']?>' type="date">
    <input name='hora' value='<?= $data['hora']?>' type="time">
    <input name='nombre' value='<?= $data['nombre']?>' type="text">
     <input name='DNI' value='<?= $data['dni']?>' type="text">
     <input type="hidden" name="Id_medico" value="<?= $data['Id_medico']?>">
    <button> Actualizar </button>
</form>




