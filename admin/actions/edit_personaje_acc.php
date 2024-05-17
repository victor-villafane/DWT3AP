<?php
require_once "../../functions/autoload.php";
$fileData = $_FILES["imagen"] ?? FALSE;

try {
    $personaje = new Personaje();

    if( !empty($fileData["tmp_name"]) ){
        if( !empty($_POST["imagen_original"]) ){
            (new Imagen())->borrarImagen("../../img/personajes/".$_POST["imagen_original"]);
        }
        $imagenNueva = (new Imagen())->subirImagen("../../img/personajes", $fileData);
        $personaje->reemplazarImagen($imagenNueva, $_POST["id"]);
    }
    $personaje->edit($_POST["nombre"], $_POST["alias"], trim($_POST["biografia"]), $_POST["creador"], $_POST["primera_aparicion"], $_POST["id"]);
    header("Location: ../index.php?sec=admin_personajes");
} catch (Exception $e) {
    echo $e->getMessage();
    die("No pude editar el personaje");
}

