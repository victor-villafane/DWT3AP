<?php

$guionistas = (new Guionista())->catalogo_completo();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de gionistas</h1>
        <div class="row mb-5 d-flex align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Biografia</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($guionistas as $guionista) { ?>
                    <tr>
                        <td> <img src="../img/guionistas/<?= $guionista->getFotoPerfil() ?>" alt="Imagen del guionista" class="img-fluid rounded shadow-sm"> </td>
                        <td><?= $guionista->getNombreCompleto() ?> </td>
                        <td><?= $guionista->getBiografia() ?></td>
                        <td>
                            <a href="index.php?sec=edit_guionista&id=<?= $guionista->getId() ?>" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                            <a href="index.php?sec=delete_guionista&id=<?= $guionista->getId() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <a href="index.php?sec=add_guionista" class="btn btn-primary mt-5">Agregar Personaje</a>

        </div>
    </div>
</div>
