<?php 

$personajes = ( new Personaje() )->catalogo_completo();

foreach ($personajes as $personaje) {
    echo "<div class='card' style='width: 18rem;'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>{$personaje->getNombre()}</h5>";
    echo "<a href='index.php?sec=edit_personaje&id={$personaje->getId()}' class='btn btn-primary'>Editar</a>";
    echo "</div>";
    echo "</div>";
}

?>
