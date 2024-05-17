<?php
    $id = $_GET['id'] ?? false;
    $personaje = (new Personaje())->catalogo_x_id($id);
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Editar personaje</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/edit_personaje_acc.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $personaje->getId() ?>">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" type="text" name="nombre" value="<?= $personaje->getNombre() ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Alias</label>
                    <input class="form-control" type="text" name="alias" value="<?= $personaje->getAlias() ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Imagen Actual</label>
                    <img class="img-fluid rounded shadow-sm d-block" src="../img/personajes/<?= $personaje->getImagen() ?>" alt="">
                    <input class="form-control" type="hidden" name="imagen_original" value="<?= $personaje->getImagen() ?>">
                </div>       
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Reemplazar Imagen</label>
                    <input class="form-control" type="file" name="imagen">
                </div>     
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Primera Aparicion</label>
                    <input class="form-control" type="text" name="primera_aparicion" value="<?= $personaje->getPrimeraAparicion() ?>">
                </div>       
                <div class="col-md-12 mb-3">
                    <label class="form-label">Creador</label>
                    <input class="form-control" type="text" name="creador" value="<?= $personaje->getCreador() ?>">
                </div>  
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Biografia</label>
                    <textarea class="form-control" name="biografia" rows="3"><?= $personaje->getBiografia(); ?></textarea>
                </div>  
                
                <button class="btn btn-primary" type="submit">Editar</button>
            </form>
        </div>
    </div>
</div>
