<div class="row my-5">
    <div class="">
        <h1>Administracion de personaje</h1>
        <div>
            <form action="actions/add_personaje_acc.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="">Nombre</label>
                    <input type="text" name="nombre">
                </div>
                <div>
                    <label for="">Alias</label>
                    <input type="text" name="alias">
                </div>    
                <div>
                    <label for="">Imagen</label>
                    <input type="file" name="imagen">
                </div>     
                <div>
                    <label for="">Primera Aparicion</label>
                    <input type="text" name="primera_aparicion">
                </div>       
                <div>
                    <label for="">Creador</label>
                    <input type="text" name="creador">
                </div>  
                <div>
                    <label for="">Biografia</label>
                    <input type="text" name="biografia">
                </div>  
                
                <button type="submit">Cargar</button>
            </form>
        </div>
    </div>
</div>
