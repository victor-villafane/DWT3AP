<?php
require_once "../../functions/autoload.php";

$id = $_GET["id"] ?? false;
$comic = (new Comic())->catalogo_x_id($id);
try {
    if( $comic->getPortada() != "" ){
        (new Imagen())->borrarImagen("../../img/covers/".$comic->getPortada());
    }
    $comic->delete();
} catch (Exception $e) {
    echo $e->getMessage();
    die("No se pudo eliminar :(");
}

header("Location: ../index.php?sec=admin_comics");

