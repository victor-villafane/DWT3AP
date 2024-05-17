<?php
$id = $_GET['id'] ?? false;
$personaje = (new Personaje())->catalogo_x_id($id);
?>

<div class="row my-5 g-3">
    <h1 class="text-center mb-5 fw-bold">Desea Eliminar Personaje?</h1>
    <div class="col-12 col-mb-6">
        <img class="img-fluid rounded shadow-sm d-block mx-auto mb-3"
            src="../img/personajes/<?= $personaje->getImagen() ?>" alt="">
    </div>
    <div class="col-12 col-md-6">
        <h2 class="fs-6">Nombre:</h2>
        <p><?= $personaje->getNombre() ?></p>
        <h2 class="fs-6">Alias:</h2>
        <p><?= $personaje->getAlias() ?></p>
        <h2 class="fs-6">Creador:</h2>
        <p><?= $personaje->getCreador() ?></p>
        <h2 class="fs-6">Primera Aparicion:</h2>
        <p><?= $personaje->getPrimeraAparicion() ?></p>
        <h2 class="fs-6">Biografia:</h2>
        <p><?= $personaje->getBiografia() ?></p>
        <a class="d-block btn btn-sm btn-danger mt-4" href="actions/delete_personaje_acc.php?id=<?= $personaje->getId() ?>">Eliminar</a>
        <a class="d-block btn btn-sm btn-warning mt-4" href="index.php?sec=dashboard">Cancelar</a>
    </div>

</div>
