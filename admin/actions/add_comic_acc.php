<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
require_once "../../functions/autoload.php";
try {
    $imagen = ( new Imagen() )->subirImagen("../../img/covers", $_FILES["portada"]);
    (new Comic())->insert(
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
        $imagen,
        $_POST["precio"]
    );
    header("Location: ../index.php?sec=admin_comics");
} catch (\Exception $e) {
    echo $e->getMessage();
    die("No pude cargar el personaje :(");
}

