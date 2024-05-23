<?php
$id = $_GET['id'] ?? false;
$artista = (new Artista())->get_x_id($id);
?>

<div class="row my-5 g-3">
    <h1 class="text-center mb-5 fw-bold">Desea Eliminar Artista?</h1>
    <div class="col-12 col-mb-6">
        <img class="img-fluid rounded shadow-sm d-block mx-auto mb-3"
            src="../img/artistas/<?= $artista->getFotoPerfil() ?>" alt="">
    </div>
    <div class="col-12 col-md-6">
        <h2 class="fs-6">Nombre:</h2>
        <p><?= $artista->getNombreCompleto() ?></p>
        <h2 class="fs-6">Biografia:</h2>
        <p><?= $artista->getBiografia() ?></p>
        <a class="d-block btn btn-sm btn-danger mt-4" href="actions/delete_artista_acc.php?id=<?= $artista->getId() ?>">Eliminar</a>
        <a class="d-block btn btn-sm btn-warning mt-4" href="index.php?sec=dashboard">Cancelar</a>
    </div>

</div>
