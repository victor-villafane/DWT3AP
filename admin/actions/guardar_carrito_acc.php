<?php
require_once "../../functions/autoload.php";

$carrito = new Carrito();
$carrito->borrarCarritosAnteriores();
$carrito->finalizarCompra();
$carrito->vaciarCarrito();
header("Location: ../../index.php");

