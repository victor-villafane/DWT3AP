<?php
include_once 'libraries/funciones.php';
$id = $_GET['id'];
//$comics = $productos[$id];
$comic = (new Comic())->catalogo_x_id($id);
//index.php?sec=comics&serie=batman
// echo "<pre>";
// print_r($comics[1]["portada"]);
// echo "</pre>"
?>

<div class="row" >
    <?php if(isset( $comic )){ ?>
        <h1 class="text-center my-5"> <?= $comic->getTitulo() ?> </h1>
        <div class="col">
            <div class="card mb-5">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="img/covers/<?= $comic->getPortada() ?>" class="img-fluid rounded-start border-end" alt="Portada de  <?= $comic->getTitulo() ?>">
                    </div>
                    <div class="col-md-7 d-flex flex-column p-3">
                        <div class="card-body flex-grow-0">
                            <p class="fs-4 m-0 fw-bold text-danger"><?= $comic->getTitulo() ?></p>
                            <h2 class="card-title fs-2 mb-4"><?= $comic->getTitulo(); ?></h2>
                            <p class="card-text"><?= $comic->getBajada() ?></p>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="fw-bold">Guion:</span> <?= $comic->getGuion(); ?></li>
                            <li class="list-group-item"><span class="fw-bold">Arte:</span> <?= $comic->getArte(); ?></li>
                            <li class="list-group-item"><span class="fw-bold">Publicación:</span> <?= $comic->getPublicacion() ?></li>
                        </ul>

                        <div class="card-body flex-grow-0 mt-auto">
                            <div class="fs-3 mb-3 fw-bold text-center text-danger">$<?= $comic->getPrecio() ?></div>
                            <a href="#" class="btn btn-danger w-100 fw-bold">COMPRAR</a>
                        </div>
                    </div>
                </div>
            </div>


         </div>
    <?php }else{ ?>

    <?php } ?>
</div>
