<?php

class Comic{
    //atributos
    public $id;                      //solo pueden acceder los metodos de la propia clase y los metodos de los hijos de esa clase
    public $personaje;
    public $serie;
    public $volumen;
    public $numero;
    public $titulo;
    public $publicacion;
    public $guion;
    public $arte;
    public $bajada;
    public $portada;
    public $precio;
    //metodos
    public function catalogo_completo(){
        $catalogo = [];
        $productosStringJson = file_get_contents("includes/productos.json");
        $productosArray = json_decode($productosStringJson);        // -> un objeto de la clase stdClass

        foreach ($productosArray as $value) {

            //creo una instancia de comic -> ahora tengo un objeto comic
            $comic = new Comic();
            //relleno los atributos
            $comic->id = $value->id;
            $comic->personaje = $value->personaje;
            $comic->serie = $value->serie;
            $comic->volumen = $value->volumen;
            $comic->titulo = $value->titulo;
            $comic->publicacion = $value->publicacion;
            $comic->guion = $value->guion;
            $comic->arte = $value->arte;
            $comic->bajada = $value->bajada;
            $comic->portada = $value->portada;
            $comic->precio = $value->precio;
            $catalogo []= $comic;

        }
        return $catalogo;
    }
    public function catalogo_x_id($id){
        $comics = $this->catalogo_completo();
    
        foreach ($comics as $comic) {
            if( $comic->id == $id ){
                return $comic;
            }
        }
    
        return [];
    }

    public function catalogo_x_personaje($personaje){
        $comics = $this->catalogo_completo();
        $personajes = [];
    
        foreach ($comics as $comic) {
            if( $comic->personaje == $personaje ){
                $personajes []= $comic;
            }
        }
    
        return $personajes;
    }
}