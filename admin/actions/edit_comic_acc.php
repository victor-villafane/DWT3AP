<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";
require_once "../../functions/autoload.php";
$fileData = $_FILES["portada"] ?? FALSE;

try {
    $comic = new Comic();

    if( !empty($fileData["tmp_name"]) ){
        if( !empty($_POST["portada_original"]) ){
            (new Imagen())->borrarImagen("../../img/covers/".$_POST["portada_original"]);
        }
        $imagenNueva = (new Imagen())->subirImagen("../../img/covers", $fileData);
        $comic->reemplazarImagen($imagenNueva, $_POST["id"]);
    }
    (new Comic())->edit(
        $_POST["personaje_principal_id"],  
        $_POST["serie_id"], 
        $_POST["volumen"], 
        $_POST["numero"],
        $_POST["titulo"],
        $_POST["publicacion"],
        $_POST["guionista_id"],
        $_POST["artista_id"],
        $_POST["bajada"],
        $_POST["origen"],
        $_POST["editorial"],
        $_POST["precio"],
        $_POST["id"]
    );
    //header("Location: ../index.php?sec=admin_comics");
} catch (Exception $e) {
    echo $e->getMessage();
    die("No pude editar el personaje");
}

