<?php
require_once "../../functions/autoload.php";

$id = $_GET["id"] ?? false;
$personaje = (new Personaje())->catalogo_x_id($id);
try {
    (new Imagen())->borrarImagen("../../img/personajes/".$personaje->getImagen());
    $personaje->delete();
} catch (Exception $e) {
    echo $e->getMessage();
    die("No se pudo eliminar :(");
}


header("Location: ../index.php?sec=admin_personajes");

