<?php

class Comic
{
    //atributos
    protected $id; //solo pueden acceder los metodos de la propia clase y los metodos de los hijos de esa clase
    // protected $personaje_principal_id;
    protected $personaje_principal;
    // protected $serie_id;
    protected $serie; //Objeto serie -> atributos y metodos
    protected $volumen;
    protected $numero;
    protected $titulo;
    protected $publicacion;
    // protected $guionista_id;
    protected $guionista;
    // protected $artista_id;
    protected $artista;
    protected $bajada;
    protected $origen;
    protected $editorial;
    protected $portada;
    protected $precio;
    protected $personajes_secundarios_ids;
    protected $personajes_secundarios;
    

    protected static $valores = ["id", "volumen", "numero", "titulo", "publicacion", "bajada", "origen", "editorial", "portada", "precio"];

    //metodos
    public function mapear($comicArrayAsociativo) : self
    {
        $comic = new self();
        foreach (self::$valores as $valor) {
            $comic->{$valor} = $comicArrayAsociativo[$valor];
        }

        $comic->personaje_principal = (new Personaje())->catalogo_x_id($comicArrayAsociativo["personaje_principal_id"]);
        $comic->serie = (new Serie())->get_x_id($comicArrayAsociativo["serie_id"]);
        $comic->guionista = (new Guionista())->get_x_id($comicArrayAsociativo["guionista_id"]);
        $comic->artista = (new Artista())->get_x_id($comicArrayAsociativo["artista_id"]);
        $PSids = explode(",", $comicArrayAsociativo["personajes_secundarios"]);
        $personaje_secundario_array = [];
        foreach ($PSids as $PSid) {
            $personaje_secundario_array []= (new Personaje())->catalogo_x_id(intval($PSid));
        }
        $comic->personajes_secundarios = $personaje_secundario_array;
        $comic->personajes_secundarios_ids = $comicArrayAsociativo["personajes_secundarios"];
        return $comic;
    }

    public function catalogo_completo()
    {
        $catalogo = [];
        $conexion = Conexion::getConexion();
        $query = 'SELECT comics.*, GROUP_CONCAT(comic_x_personaje.id_personaje) AS personajes_secundarios FROM comics 
        LEFT JOIN comic_x_personaje ON comics.id = comic_x_personaje.id_comic 
        GROUP BY comics.id';
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();
        while ($comic = $PDOStatement->fetch()) {
            $catalogo[] = $this->mapear($comic);
        }

        return $catalogo;
    }
    public function catalogo_x_id($id)
    {
        $comics = $this->catalogo_completo();

        foreach ($comics as $comic) {
            if ($comic->id == $id) {
                return $comic;
            }
        }

        return [];
    }

    public function catalogo_x_personaje(int $personaje_id): array
    {
        // $comics = $this->catalogo_completo();
        $personajes = [];

        $conexion = Conexion::getConexion();
        $query = "SELECT comics.*, GROUP_CONCAT(comic_x_personaje.id_personaje) AS personajes_secundarios FROM comics 
        LEFT JOIN comic_x_personaje ON comics.id = comic_x_personaje.id_comic 
        WHERE personaje_principal_id = $personaje_id GROUP BY comics.id ";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();
        while ($comic = $PDOStatement->fetch()) {
            $personajes[] = $this->mapear($comic);
        }

        return $personajes;
    }

    public function personajes_validos()
    {
        $personajes = [];

        $conexion = Conexion::getConexion();
        $query = 'SELECT personaje_principal_id FROM `comics` GROUP BY personaje_principal_id';
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();

        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $personajes = $PDOStatement->fetchAll();

        return $personajes;
    }

    public function modificacionSerie()
    {
        //cambio el - por un " "
        $tituloConEspacio = str_replace('-', ' ', $this->serie->getNombre());
        //explode divide por un caracter indicado
        $arrayTitulo = explode(' ', $tituloConEspacio);
        //paso ambas palabras a mayusculas
        for ($i = 0; $i < count($arrayTitulo); $i++) {
            $arrayTitulo[$i] = ucfirst($arrayTitulo[$i]);
        }
        //implode lo une utilizando el caracter que le indicamos
        $tituloCorregido = implode(' ', $arrayTitulo);
        return $tituloCorregido;
    }

    public function getBajadaResumida($cantidad = 20)
    {
        //divido el texto usando explode
        //str_word_count()
        $arrayTexto = explode(' ', $this->bajada); //
        $textoResumido = [];

        foreach ($arrayTexto as $key => $value) {
            if ($key < $cantidad) {
                $textoResumido[] = $value;
            } else {
                break;
            }
        }
        return implode(' ', $textoResumido) . '...';
    }

    public function insert($personaje_principal_id, $serie_id, $volumen, $numero, $titulo, $publicacion, $guionista_id, $artista_id, $bajada, $origen, $editorial, $portada, $precio): int
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "INSERT INTO `comics` (`id`, `titulo`, `personaje_principal_id`, `guionista_id`, `artista_id`, `serie_id`, `volumen`, `numero`, `publicacion`, `origen`, `editorial`, `bajada`, `portada`, `precio`) VALUES (NULL, :titulo, :personaje_principal_id, :guionista_id, :artista_id, :serie_id, :volumen, :numero, :publicacion, :origen, :editorial, :bajada, :portada, :precio)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                'personaje_principal_id' => htmlspecialchars($personaje_principal_id),
                'serie_id' => htmlspecialchars($serie_id),
                'volumen' => htmlspecialchars($volumen),
                'numero' => htmlspecialchars($numero),
                'titulo' => htmlspecialchars($titulo),
                'publicacion' => htmlspecialchars($publicacion),
                'guionista_id' => htmlspecialchars($guionista_id),
                'artista_id' => htmlspecialchars($artista_id),
                'bajada' => htmlspecialchars($bajada),
                'origen' => htmlspecialchars($origen),
                'editorial' => htmlspecialchars($editorial),
                'portada' => htmlspecialchars($portada),
                'precio' => htmlspecialchars($precio),
            ]);
            return $conexion->lastInsertId();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function reemplazarImagen($portada, $id){
        $conexion = Conexion::getConexion();
        $query = "UPDATE comics SET portada=:portada WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "portada" => $portada,
            "id" => $id
        ]);
    }
    public function edit($personaje_principal_id, $serie_id, $volumen, $numero, $titulo, $publicacion, $guionista_id, $artista_id, $bajada, $origen, $editorial, $precio, $id){
        $conexion = Conexion::getConexion();
        $query = "UPDATE `comics` SET `titulo` = :titulo, `personaje_principal_id` = :personaje_principal_id, `guionista_id` = :guionista_id, `artista_id` = :artista_id, `serie_id` = :serie_id, `volumen` = :volumen, `numero` = :numero, `publicacion` = :publicacion, `origen` = :origen, `editorial` = :editorial, `bajada` = :bajada,`precio` = :precio WHERE `comics`.`id` = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'personaje_principal_id' => htmlspecialchars($personaje_principal_id),
            'serie_id' => htmlspecialchars($serie_id),
            'volumen' => htmlspecialchars($volumen),
            'numero' => htmlspecialchars($numero),
            'titulo' => htmlspecialchars($titulo),
            'publicacion' => htmlspecialchars($publicacion),
            'guionista_id' => htmlspecialchars($guionista_id),
            'artista_id' => htmlspecialchars($artista_id),
            'bajada' => htmlspecialchars($bajada),
            'origen' => htmlspecialchars($origen),
            'editorial' => htmlspecialchars($editorial),
            'precio' => htmlspecialchars($precio),
            "id" => htmlspecialchars($id)
        ]);
    }

    public function delete(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM comics WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id" => htmlspecialchars($this->id)
        ]);
    }

    public function add_personaje_secundario($id_comic, $id_personaje){
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `comic_x_personaje` (`id`, `id_comic`, `id_personaje`) VALUES (NULL, :id_comic, :id_personaje)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id_comic" => $id_comic,
            "id_personaje" => $id_personaje
        ]);
    }
    public function clear_personajes_secundarios($id){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM comic_x_personaje WHERE id_comic = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id" => $id,
        ]);
    }
    //get -> sirven para obtener el valor del atributo
    public function getId()
    {
        return $this->id;
    }
    public function getPersonaje()
    {
        // $personaje = (new Personaje())->catalogo_x_id($this->personaje_principal_id);
        return $this->personaje_principal->getNombre();
    }
    //set -> sirver para cambiar el valor del atributo

    /**
     * Get the value of volumen
     */
    public function getVolumen()
    {
        return $this->volumen;
    }

    /**
     * Get the value of serie
     */
    public function getSerie()
    {
        // $serie = (new Serie())->get_x_id($this->serie_id);
        return $this->serie->getNombre();
    }

    /**
     * Get the value of numero
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Get the value of publicacion
     */
    public function getPublicacion()
    {
        return $this->publicacion;
    }

    /**
     * Get the value of guion
     */
    public function getGuion()
    {
        // $guionista = (new Guionista())->get_x_id($this->guionista_id);
        return $this->guionista->getNombreCompleto();
    }

    /**
     * Get the value of arte
     */
    public function getArte()
    {
        // $artista = (new Artista())->get_x_id($this->artista_id);
        return $this->artista->getNombreCompleto();
    }

    /**
     * Get the value of bajada
     */
    public function getBajada()
    {
        return $this->bajada;
    }

    /**
     * Get the value of portada
     */
    public function getPortada()
    {
        return $this->portada;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of origen
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Set the value of origen
     */
    public function setOrigen($origen): self
    {
        $this->origen = $origen;

        return $this;
    }

    /**
     * Get the value of editorial
     */
    public function getEditorial()
    {
        return $this->editorial;
    }

    /**
     * Set the value of editorial
     *
     * @return  self
     */
    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;

        return $this;
    }

    public function getSerie_id(){
        return $this->serie->getId();
    }

    public function getPersonaje_id(){
        return $this->personaje_principal->getId();
    }

    public function getGuionista_id(){
        return $this->guionista->getId();
    }

    public function getArtista_id(){
        return $this->artista->getId();
    }

    public function getPersonajesSecundarios(){
        return $this->personajes_secundarios_ids;
    }
}
