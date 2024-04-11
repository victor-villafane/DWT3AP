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
                        <a class="nav-link" href="index.php?sec=home"> <?= $_GET["sec"] == "home" ? "<b>Home</b>" : "home" ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $_GET["sec"] == "quienes_somos" ? "active" : "" ?>" href="index.php?sec=quienes_somos"><?= $_GET["sec"] == "quienes_somos" ? "<b>¿Quienes Somos?</b>" : "¿Quienes Somos?" ?> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=comics&serie=iron-man">Iron Man</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=comics&serie=batman">Batman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=comics&serie=Wonder-Woman">Wonder Woman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=envios">Envios</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>