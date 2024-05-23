<?php
require_once "../../functions/autoload.php";

$id = $_GET["id"] ?? false;
$artista = (new Artista())->get_x_id($id);
try {
    (new Imagen())->borrarImagen("../../img/artistas/".$artista->getFotoPerfil());
    $artista->delete();
} catch (Exception $e) {
    echo $e->getMessage();
    die("No se pudo eliminar :(");
}


header("Location: ../index.php?sec=admin_artistas");

