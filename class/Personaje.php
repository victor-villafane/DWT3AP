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
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM personajes";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo = $PDOStatement->fetchAll();

        return $catalogo;
    }

    public function catalogo_x_id(int $id)
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
            $conexion = Conexion::getConexion();
            $query = "INSERT INTO personajes VALUES (null, :nombre, :alias, :biografia, :creador, :primera_aparicion, :imagen )";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "nombre" => htmlspecialchars($nombre),
                "alias" => htmlspecialchars($alias),
                "biografia" => htmlspecialchars($biografia),
                "creador" => htmlspecialchars($creador),
                "primera_aparicion" => htmlspecialchars($primera_aparicion),
                "imagen" => htmlspecialchars($imagen)
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM personajes WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id" => htmlspecialchars($this->id)
        ]);
    }

    public function edit($nombre, $alias, $biografia, $creador, $primera_aparicion, $id){
        $conexion = Conexion::getConexion();
        $query = "UPDATE personajes SET nombre=:nombre, alias=:alias, biografia=:biografia, creador=:creador, primera_aparicion=:primera_aparicion WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "nombre" => htmlspecialchars($nombre),
            "alias" => htmlspecialchars($alias),
            "biografia" => htmlspecialchars($biografia),
            "creador" => htmlspecialchars($creador),
            "primera_aparicion" => htmlspecialchars($primera_aparicion),
            "id" => htmlspecialchars($id)
        ]);
    }

    public function reemplazarImagen($imagen, $id){
        $conexion = Conexion::getConexion();
        $query = "UPDATE personajes SET imagen=:imagen WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "imagen" => $imagen,
            "id" => $id
        ]);
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
