<?php
    require_once "../../functions/autoload.php";
    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo "</pre>";
    try {
        // ( new Personaje() )->insert(
        //     $_POST["nombre"],
        //     $_POST["alias"],
        //     $_POST["biografia"],
        //     $_POST["creador"],
        //     $_POST["primera_aparicion"],
        //     $_POST["imagen"]
        // );
        //header("Location: ../index.php?sec=admin_personajes");
    } catch (\Exception $e) {
        echo $e->getMessage();
        die("No pude cargar el personaje :(");
    }

