<?php
    $series = (new Serie())->catalogo_completo();
    $personajes = (new Personaje())->catalogo_completo();
    $artistas = (new Artista())->catalogo_completo();
    $guionistas = ( new Guionista() )->catalogo_completo();
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de comic</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/add_comic_acc.php" method="post" enctype="multipart/form-data">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Titulo</label>
                    <input class="form-control" type="text" name="titulo">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Serie</label>
                    <select class="form-select" name="serie_id" id="serie_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($series as $serie) { ?>
                            <option value="<?= $serie->getId() ?>"><?= $serie->getNombre() ?></option>
                        <?php } ?>
                    </select>
                </div>    
                <div class="col-md-6 mb-3">
                    <label class="form-label">Personaje Principal</label>
                    <input class="form-control" type="text" name="personaje_principal">
                </div>       
                <div class="col-md-6 mb-3">
                    <label class="form-label">Volumen</label>
                    <input class="form-control" type="text" name="volumen">
                </div>    
                <div class="col-md-6 mb-3">
                    <label class="form-label">Numero</label>
                    <input class="form-control" type="text" name="numero">
                </div>                               
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Portada</label>
                    <input class="form-control" type="file" name="portada">
                </div>     
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Publicacion</label>
                    <input class="form-control" type="text" name="publicacion">
                </div>       
                <div class="col-md-12 mb-3">
                    <label class="form-label">Guionista</label>
                    <input class="form-control" type="text" name="guionista">
                </div>  
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Artista</label>
                    <input class="form-control" type="text" name="artista">
                </div>  
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Origen</label>
                    <select class="form-select" name="origen" id="origen">
                        <option  selected disabled>Elija una opcion</option>
                        <option >Estados Unidos</option>
                        <option >Brasil</option>
                        <option >Colombia</option>
                        <option >Argentina</option>
                    </select>
                </div>    
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Editorial</label>
                    <input class="form-control" type="text" name="editorial">
                </div>       
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Precio</label>
                    <input class="form-control" type="number" name="precio">
                </div>                                             
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Bajada</label>
                    <textarea class="form-control" name="bajada" id="bajada" rows="7"></textarea>
                </div>                   
                <button class="btn btn-primary" type="submit">Cargar</button>
            </form>
        </div>
    </div>
</div>
