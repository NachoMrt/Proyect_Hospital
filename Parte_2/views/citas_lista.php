
<?php require 'views/header.php'; ?>

<a href='?c=Cita&a=crear'> Nuevo </a> <!--  -> IMPORTANTE !!!! -->
<ul>
    <?php foreach($citas as $cita): ?>
        <li><?= $cita['id_medico']?> - <?= $cita['dia']?> - <?=$cita['hora']?> - <?=$cita['nombre']?> - <?=$cita['DNI']?> - <?=$cita['id_paciente']?>
            <a href='?c=Cita&a=editar&id=<?= $cita['id_paciente']?>'> Editar </a> 
            <a href='?c=Cita&a=eliminar&id=<?= $cita['id_paciente']?>'> Eliminar </a>
        </li>
    <?php endforeach;?>
</ul>




<!--
Esta “ruta” NO es una ruta:
    <a href="?c=Usuario&a=crear">Nuevo</a>

    Eso es query string de HTTP.

Qué pasa realmente ??
    El navegador abre:
        index.php?c=Usuario&a=crear

    PHP NO entiende MVC por sí solo.
    Solo lee:
        $_GET['c']  // "Usuario"
        $_GET['a']  // "crear"

    index.php decide todo -> IMPORTANTE !!!!!!

    Quién “sabe” a dónde ir ??
        -> No la vista
        -> No PHP
        -> El Front Controller (index.php)  

-->



