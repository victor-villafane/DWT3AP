<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
require_once "../../functions/autoload.php";

$personajes_secundarios = $_POST["personajes_secundarios"];
try {
    $imagen = ( new Imagen() )->subirImagen("../../img/covers", $_FILES["portada"]);
    $id_comic = (new Comic())->insert(
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

    foreach ($personajes_secundarios as $id_personaje_secundario) {
        (new Comic())->add_personaje_secundario($id_comic, $id_personaje_secundario);
    }

    header("Location: ../index.php?sec=admin_comics");
} catch (\Exception $e) {
    echo $e->getMessage();
    die("No pude cargar el personaje :(");
}