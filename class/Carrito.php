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
    /**Devolver el precio total */
    /**Vaciar carrito */
    /**Modificar Cantidad*/
    /**Eliminar item individual Cantidad*/

    /**Finalizar compra*/
}