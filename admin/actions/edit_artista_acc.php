<?php
require_once "../../functions/autoload.php";
$fileData = $_FILES["imagen"] ?? FALSE;

try {
    $artista = new Artista();

    if( !empty($fileData["tmp_name"]) ){
        if( !empty($_POST["imagen_original"]) ){
            (new Imagen())->borrarImagen("../../img/artistas/".$_POST["imagen_original"]);
        }
        $imagenNueva = (new Imagen())->subirImagen("../../img/artistas", $fileData);
        $artista->reemplazarImagen($imagenNueva, $_POST["id"]);
    }
    $artista->edit($_POST["nombre"],$_POST["biografia"], $_POST["id"]);
    header("Location: ../index.php?sec=admin_artistas");
} catch (Exception $e) {
    echo $e->getMessage();
    die("No pude editar el artista");
}

