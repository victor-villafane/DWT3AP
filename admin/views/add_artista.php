<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de artista</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/add_artista_acc.php" method="post" enctype="multipart/form-data">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" type="text" name="nombre">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Imagen</label>
                    <input class="form-control" type="file" name="imagen">
                </div>         
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Biografia</label>
                    <textarea class="form-control" name="biografia" rows="3"></textarea>
                </div>  
                
                <button class="btn btn-primary" type="submit">Cargar</button>
            </form>
        </div>
    </div>
</div>
