
<?php
    require_once "../../functions/autoload.php";
    try {
        $imagen = ( new Imagen() )->subirImagen("../../img/artistas", $_FILES["imagen"]);
        ( new Artista() )->insert(
            $_POST["nombre"],
            $_POST["biografia"],
            $imagen
        );
        (new Alerta())->add_alerta("Se pudo agregar artista", "success");
        header("Location: ../index.php?sec=admin_artistas");
    } catch (\Exception $e) {
        echo $e->getMessage();
        (new Alerta())->add_alerta("No se pudo agregar artista", "danger");
        die("No pude cargar el personaje :(");
    }

