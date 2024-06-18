<?php
// echo "<pre>";
// print_r($_SESSION["carrito"]);
// echo "</pre>";
$miCarrito = new Carrito();
$items = ($miCarrito)->getCarrito();
?>

<h1>Carrito de compras</h1>
<div>
    <?= (new Alerta())->get_alertas() ?>
    <?php if( count($items) ){ ?>
<form action="admin/actions/update_carrito_acc.php" method="get">
        <table>
            <thead>
                <tr>
                    <th scope="col" width="15%">Portada</th>
                    <th scope="col">Datos del producto</th>
                    <th scope="col" width="15%">Cantidad</th>
                    <th scope="col" width="15%">Precio Unitario</th>
                    <th scope="col" width="15%">Subtotal</th>
                    <th scope="col" width="10%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $items as $key => $item ) {?>
                    <tr>
                        <td><img class="img-fluid rounded shadow-sm" src="img/covers/<?php echo $item["portada"]; ?>" alt="<?php echo $item["producto"]; ?>" width="50"></td>
                        <td class="align-middle">
                            <p class="h5"><?php echo $item["producto"]; ?></p>
                        </td>
                        <td>
                            <input type="number" value="<?php echo $item["cantidad"]; ?>" name="c[<?= $key ?>]" class="form-control">
                        </td>
                        <td class="align-middle"> <p class="h5 py-3"><?php echo $item["precio"]; ?></p></td>
                        <td class="align-middle"> <p class="h5 py-3"> <?php echo $item["precio"] * $item["cantidad"]; ?> </p> </td>
                        <td class="text-end align-middle">
                            <a class="btn btn-danger" href="admin/actions/remove_item_acc.php?id=<?= $key ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?> 
                <tr>
                    <td class="text-end">
                        <h2 class="h5 py-3">Total: </h2>
                    </td>
                    <td>
                        <p class="h5 py-3"><?= $miCarrito->getTotal() ?></p>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-end gap-2">
            <input type="submit" value="Actualizar cantidades" class="btn btn-primary">
            <a class="btn btn-warning" href="index.php?sec=todosLosComics">Seguir Comprando</a>
            <a class="btn btn-danger"  href="admin/actions/vaciar_carrito_acc.php">Vaciar Carrito</a>
            <a class="btn btn-success"  href="admin/actions/guardar_carrito_acc.php">Finalizar Compra</a>
        </div>
    </form>
    <?php }else{ ?>
        <p>No hay productos en el carrito</p>
        <a class="btn btn-warning" href="index.php?sec=todosLosComics">Seguir Comprando</a>

    <?php } ?>
</div>
