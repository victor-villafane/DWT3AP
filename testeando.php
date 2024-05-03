<?php

include_once "class/Conexion.php";
include_once "class/Comic.php";
$conexion = ( new Conexion() )->getConexion();

$query = "SELECT * FROM comics";

$PDOStatement = $conexion->prepare($query);
$PDOStatement->setFetchMode(PDO::FETCH_CLASS, Comic::class);
$PDOStatement->execute();
$comics = [];
while($comic = $PDOStatement->fetch()){
    $comics []= $comic;
}
echo "<pre>";
print_r($comics);
echo "</pre>";


