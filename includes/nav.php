<?php 
    $personajes_id = ( new Comic() )->personajes_validos();


?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">La Tiendita de Comics</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=home"> home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=quienes_somos">Quienes Somos? </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=todosLosComics">Catalogo</a>
                    </li>    
                    <?php foreach( $personajes_id as $personaje ) { ?>                
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=comics&serie=<?= $personaje["personaje_principal_id"] ?>"><?= $personaje["personaje_principal_id"] ?></a>
                    </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=envios">Envios</a>
                    </li>
                    <?php if( isset($_SESSION["login"]) ){ ?>       
                    <li class="nav-item">
                        <a class="nav-link" href="admin/actions/auth_logout.php">Salir</a>
                    </li>    
                    <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=login">Login</a>
                    </li>   
                    <?php } ?>                              
                </ul>
            </div>
        </div>
    </nav>