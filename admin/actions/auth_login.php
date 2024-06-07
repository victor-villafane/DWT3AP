<?php
require_once "../../functions/autoload.php";

$email = $_POST["email"];
$pass = $_POST["pass"];

$login = (new Autenticacion())->log_in($email, $pass);

if( $login ){
    header("Location: ../index.php");
}else{
    (new Autenticacion())->log_out();
    header("Location: ../index.php?sec=login");
}