<?php
    require_once "../../functions/autoload.php";
    try {
        $imagen = ( new Imagen() )->subirImagen("../../img/personajes", $_FILES["imagen"]);
        ( new Personaje() )->insert(
            $_POST["nombre"],
            $_POST["alias"],
            $_POST["biografia"],
            $_POST["creador"],
            $_POST["primera_aparicion"],
            $imagen
        );
        header("Location: ../index.php?sec=admin_personajes");
    } catch (\Exception $e) {
        echo $e->getMessage();
        die("No pude cargar el personaje :(");
    }

