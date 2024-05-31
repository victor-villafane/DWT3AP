<?php

include_once "class/Conexion.php";
include_once "class/Comic.php";
include_once "class/Personaje.php";
// (new Personaje())->insert('asds', 'asds', 'asds', 'asds', 1991, 'asds');
// // try {
//     $conexion = ( new Conexion() )->getConexion();

// $query = "UPDATE personajes SET nombre = 'test1' WHERE id = 1";

// $PDOStatement = $conexion->prepare($query);
// // // $PDOStatement->setFetchMode(PDO::FETCH_CLASS, Comic::class);
// $PDOStatement->execute();
// } catch (Exception $e) {
//     echo $e->getMessage();
// }

// $comics = [];
// while($comic = $PDOStatement->fetch()){
//     $comics []= $comic;
// }
// echo "<pre>";
// print_r($comics);
// echo "</pre>";
// print_r($_POST);
?>

<!-- <form action="testeando.php" method="post">
    <input type="text" name="nombre">
    <?= isset($_POST["nombre"]) 
        ? htmlspecialchars($_POST["nombre"]) 
        : "No hay nada" 
    ?>
    <input type="submit" value="enviar">
</form> -->
<?php
$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "C:\xampp\htdocs\www\DWT3AP\DigiCertGlobalRootG2.crt.pem", NULL, NULL);
mysqli_real_connect($conn, "web-callefalsa123.mysql.database.azure.com", "callefalsa123", "Homero135", "tiendita", 3306, MYSQLI_CLIENT_SSL);
?>
