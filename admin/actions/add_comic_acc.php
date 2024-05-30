<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
require_once "../../functions/autoload.php";

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
    "algo.jpg",
    $_POST["precio"]
);