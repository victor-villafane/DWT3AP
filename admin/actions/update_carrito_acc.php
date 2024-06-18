<?php
require_once "../../functions/autoload.php";

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

if( !empty($_GET["c"]) ){
    (new Carrito())->actualizarCantidades($_GET["c"]);
    (new Alerta())->add_alerta("Carrito Actualizado", "success");
}else{
    (new Alerta())->add_alerta("No se ha actualizado el carrito", "danger");
}

header("Location: ../../index.php?sec=carrito");