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
$host = 'web-callefalsa123.mysql.database.azure.com'; // Cambia 'your_server' por el nombre de tu servidor
$db = 'tiendita'; // Cambia 'your_database' por el nombre de tu base de datos
$user = 'callefalsa123@web-callefalsa123'; // Cambia 'your_username' por tu nombre de usuario, asegúrate de incluir '@your_server'
$pass = 'Homero135'; // Cambia 'your_password' por tu contraseña

// Crear conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";

// Realizar una consulta
$sql = "SELECT * FROM comics LIMIT 10"; // Cambia 'your_table' por el nombre de tu tabla
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Salida de datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Author: " . $row["author"]. "<br>";
    }
} else {
    echo "0 results";
}

// Cerrar conexión
$conn->close();
?>
