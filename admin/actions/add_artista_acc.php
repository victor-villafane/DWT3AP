
<?php
    require_once "../../functions/autoload.php";
    try {
        $imagen = ( new Imagen() )->subirImagen("../../img/artistas", $_FILES["imagen"]);
        ( new Artista() )->insert(
            $_POST["nombre"],
            $_POST["biografia"],
            $imagen
        );
        header("Location: ../index.php?sec=admin_artistas");
    } catch (\Exception $e) {
        echo $e->getMessage();
        die("No pude cargar el personaje :(");
    }

