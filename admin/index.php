<?php require_once '../functions/autoload.php';

$secciones_validas = [
    'dashboard' => [
        'titulo' => 'Panel de control',
    ],
    'admin_personajes' => [
        'titulo' => 'Administración de Personajes',
    ],
    'add_personaje' => [
        'titulo' => 'Administración de Personajes',
    ],
    'edit_personaje' => [
        'titulo' => 'Administración de Personajes',
    ],
    'delete_personaje' => [
        'titulo' => 'Eliminar Personaje',
    ],
    'edit_personaje' => [
        'titulo' => 'Editar Personaje',
    ],
    'admin_artistas' => [
        'titulo' => 'Administracion de artistas',
    ],
    'add_artista' => [
        'titulo' => 'Agregar Artista',
    ],
    'delete_artista' => [
        'titulo' => 'Eliminar Artista',
    ],
    'edit_artista' => [
        'titulo' => 'editar artista',
    ],
    'admin_guionistas' => [
        'titulo' => 'Administracion de guionista',
    ],
    'admin_series' => [
        'titulo' => 'Administracion de serie',
    ],
    'admin_comics' => [
        'titulo' => 'Administracion de comics',
    ],
    'add_comic' => [
        'titulo' => 'Agregar comic',
    ],
    'edit_comic' => [
        'titulo' => 'Editar Comic',
    ],
    'delete_comic' => [
        'titulo' => 'Eliminar Comic',
    ],
];

$seccion = $_GET['sec'] ?? 'dashboard';
(new Autenticacion())->verify();

if (!array_key_exists($seccion, $secciones_validas)) {
    $vista = '404';
    $titulo = '404 - Página no encontrada';
} else {
    $vista = $seccion;
    $titulo = $secciones_validas[$seccion]['titulo'];
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Tiendita de Comics :: <?= $titulo ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link href="../css/styles.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tiendita de Comics</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <?php if( isset($_SESSION["login"]) ) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_personajes">Personajes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_artistas">Artistas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_guionistas">Guionistas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_series">Serie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_comics">Comic</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="actions/auth_logout.php">Salir</a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php?sec=login">Login</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
    <?= (new Alerta())->get_alertas() ?>
        <?php require file_exists("views/$vista.php") ? "views/$vista.php" : 'views/404.php'; ?>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
