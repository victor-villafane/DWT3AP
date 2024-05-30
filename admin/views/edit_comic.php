<?php
$series = (new Serie())->catalogo_completo();
$personajes = (new Personaje())->catalogo_completo();
$artistas = (new Artista())->catalogo_completo();
$guionistas = (new Guionista())->catalogo_completo();
$comic = (new Comic())->catalogo_x_id($_GET["id"]);
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de comic</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/edit_comic_acc.php" method="post" enctype="multipart/form-data">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Titulo</label>
                    <input class="form-control" type="text" name="titulo" value="<?= $comic->getTitulo() ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Serie</label>
                    <select class="form-select" name="serie_id" id="serie_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($series as $serie) { ?>
                        <option <?=$serie->getId()== $comic->getSerie_id() ? "selected" : "" ?> value="<?= $serie->getId() ?>"><?= $serie->getNombre() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Personaje Principal</label>
                    <select class="form-select" name="personaje_principal_id" id="personaje_principal_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($personajes as $personaje) { ?>
                        <option <?=$personaje->getId()== $comic->getPersonaje_id() ? "selected" : "" ?> value="<?= $personaje->getId() ?>"><?= $personaje->getNombre() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Volumen</label>
                    <input class="form-control" type="text" name="volumen" value="<?= $comic->getVolumen() ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Numero</label>
                    <input class="form-control" type="text" name="numero" value="<?= $comic->getNumero() ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Imagen Actual</label>
                    <img class="img-fluid rounded shadow-sm d-block" src="../img/covers/<?= $comic->getPortada() ?>" alt="">
                    <input class="form-control" type="hidden" name="portada_original" value="<?= $comic->getPortada() ?>">
                </div>     

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Reemplazar Portada</label>
                    <input class="form-control" type="file" name="portada" >
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Publicacion</label>
                    <input class="form-control" type="text" name="publicacion" value="<?= $comic->getPublicacion() ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Guionista</label>
                    <select class="form-select" name="guionista_id" id="guionista_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($guionistas as $guionista) { ?>
                        <option <?=$guionista->getId()== $comic->getGuionista_id() ? "selected" : "" ?> value="<?= $guionista->getId() ?>"><?= $guionista->getNombreCompleto() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Artista</label>
                    <select class="form-select" name="artista_id" id="artista_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($artistas as $artista) { ?>
                        <option <?=$artista->getId()== $comic->getArtista_id() ? "selected" : "" ?> value="<?= $artista->getId() ?>"><?= $artista->getNombreCompleto() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Origen</label>
                    <select class="form-select" name="origen" id="origen">
                        <option selected disabled>Elija una opcion</option>
                        <option <?= $comic->getOrigen() == "Estados Unidos" ? "selected" : ""?> >Estados Unidos</option>
                        <option <?= $comic->getOrigen() == "Brasil" ? "selected" : ""?>>Brasil</option>
                        <option <?= $comic->getOrigen() == "Colombia" ? "selected" : ""?>>Colombia</option>
                        <option <?= $comic->getOrigen() == "Argentina" ? "selected" : ""?>>Argentina</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Editorial</label>
                    <input class="form-control" type="text" name="editorial" value="<?= $comic->getEditorial() ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Precio</label>
                    <input class="form-control" type="number" name="precio" value="<?= $comic->getPrecio() ?>">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Bajada</label>
                    <textarea class="form-control" name="bajada" id="bajada" rows="7"><?=$comic->getBajada()?></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Editar</button>
            </form>
        </div>
    </div>
</div>
