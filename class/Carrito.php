<?php

class Carrito{
    /**Agregar producto */

    public function add_item(int $id_producto, int $cantidad){
        $itemData = (new Comic())->catalogo_x_id($id_producto);
        if($itemData){
            $_SESSION["carrito"][$id_producto] = [
                "producto" => $itemData->getTitulo(),
                "portada" => $itemData->getPortada(),
                "precio" => $itemData->getPrecio(),
                "cantidad" => $cantidad
            ];
        }
    }

    /**Mostrar productos */

    public function getCarrito(){
        if( !empty($_SESSION["carrito"]) ){
            return $_SESSION["carrito"];
        }
        return [];
    }
    /**Devolver el precio total */
    public function getTotal(){
        $total = 0;
        if( !empty($_SESSION["carrito"]) ){
            foreach( $_SESSION["carrito"] as $item ){
                $total += $item["precio"] * $item["cantidad"];
            }
        }
        return $total;
    }
    /**Vaciar carrito */
    public function vaciarCarrito(){
        $_SESSION["carrito"] = [];
    }
    /**Modificar Cantidad*/

    public function actualizarCantidades(array $cantidades){
        if( !empty($cantidades) ){
            foreach( $cantidades as $id => $cantidad ){
                if( isset( $_SESSION["carrito"][$id] ) ){
                    $_SESSION["carrito"][$id]["cantidad"] = $cantidad; 
                }
            }
        }
    }

    /**Eliminar item individual Cantidad*/
    public function removeItem(int $id){
        if( isset( $_SESSION["carrito"][$id] ) ){
            unset($_SESSION["carrito"][$id]);
            (new Alerta())->add_alerta("Producto eliminado", "success");
        }else{
            (new Alerta())->add_alerta("No se ha eliminado el producto", "danger");
        }
    }
    /**Finalizar compra*/
}