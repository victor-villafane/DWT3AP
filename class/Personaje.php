<?php

class Personaje
{
    //atributos
    protected $id;
    protected $nombre;
    protected $alias;
    protected $biografia;
    protected $creador;
    protected $primera_aparicion;
    protected $imagen;

    //metodos
    public function catalogo_completo(): array
    {
        $catalogo = [];
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM personajes";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo = $PDOStatement->fetchAll();

        return $catalogo;
    }

    public function catalogo_x_id($id)
    {
        $personajes = $this->catalogo_completo();

        foreach ($personajes as $personaje) {
            if ($personaje->id == $id) {
                return $personaje;
            }
        }

        return [];
    }
    public function insert($nombre, $alias, $biografia, $creador, $primera_aparicion, $imagen): void
    {
        try {
            $conexion = (new Conexion())->getConexion();
            $query = "INSERT INTO personajes VALUES (null, '$nombre', '$alias', '$biografia', '$creador', '$primera_aparicion', '$imagen' )";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Get the value of nombre
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of alias
     */
    public function getAlias() {
        return $this->alias;
    }

    /**
     * Set the value of alias
     */
    public function setAlias($alias): self {
        $this->alias = $alias;
        return $this;
    }

    /**
     * Get the value of biografia
     */
    public function getBiografia() {
        return $this->biografia;
    }

    /**
     * Set the value of biografia
     */
    public function setBiografia($biografia): self {
        $this->biografia = $biografia;
        return $this;
    }

    /**
     * Get the value of creador
     */
    public function getCreador() {
        return $this->creador;
    }

    /**
     * Set the value of creador
     */
    public function setCreador($creador): self {
        $this->creador = $creador;
        return $this;
    }

    /**
     * Get the value of primera_aparicion
     */
    public function getPrimeraAparicion() {
        return $this->primera_aparicion;
    }

    /**
     * Set the value of primera_aparicion
     */
    public function setPrimeraAparicion($primera_aparicion): self {
        $this->primera_aparicion = $primera_aparicion;
        return $this;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen() {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     */
    public function setImagen($imagen): self {
        $this->imagen = $imagen;
        return $this;
    }
}
