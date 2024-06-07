<?php

class Autenticacion{
    public function log_out() : void
    {
        if(isset($_SESSION["login"])){
            unset($_SESSION["login"]);
            session_destroy();
        }
    }
    /**
     * @param string $email El nombre de email
     * @param string $pass El password del usuario ingresado
     * @return bool Devuelve un TRUE en caso que se haya logueado 
     */
    public function log_in(string $email,string $pass) : bool
    {
        $usuario = (new Usuario())->usuario_x_email($email);

        if( $usuario->getPassword() === $pass ){
            $datosLogin["username"] = $usuario->getNombreUsuario();
            $datosLogin["id"] = $usuario->getId();
            $datosLogin["roles"] = $usuario->getRoles();
            $datosLogin["email"] = $usuario->getEmail();
        
            $_SESSION["login"] = $datosLogin;
            return true;
        }else{
            return false;
        }     
    }

    public function verify(){
        if( isset($_SESSION["login"]) ){
            return true;
        }else{
            //$path = __DIR__."../index.php?sec=login";
            header("Location: ../index.php?sec=login");
        }
    }
}