<?php

class Artista{
    protected $id;
    protected $nombre_completo;
    protected $biografia;
    protected $foto_perfil;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre_completo
     */
    public function getNombreCompleto()
    {
        return $this->nombre_completo;
    }

    /**
     * Set the value of nombre_completo
     */
    public function setNombreCompleto($nombre_completo): self
    {
        $this->nombre_completo = $nombre_completo;

        return $this;
    }

    /**
     * Get the value of biografia
     */
    public function getBiografia()
    {
        return $this->biografia;
    }

    /**
     * Set the value of biografia
     */
    public function setBiografia($biografia): self
    {
        $this->biografia = $biografia;

        return $this;
    }

    /**
     * Get the value of foto_perfil
     */
    public function getFotoPerfil()
    {
        return $this->foto_perfil;
    }

    /**
     * Set the value of foto_perfil
     */
    public function setFotoPerfil($foto_perfil): self
    {
        $this->foto_perfil = $foto_perfil;

        return $this;
    }

    public function get_x_id(int $id) :? Artista
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM artistas WHERE id = $id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        $resultado = $PDOStatement->fetch();

        return $resultado ? $resultado : null;
        
    }

    public function catalogo_completo(): array
    {
        $catalogo = [];
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM artistas";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo = $PDOStatement->fetchAll();

        return $catalogo;
    }
    public function insert($nombre, $biografia, $imagen): void
    {
        try {
            $conexion = (new Conexion())->getConexion();
            $query = "INSERT INTO artistas VALUES (null, '$nombre', '$biografia', '$imagen' )";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function delete(){
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM artistas WHERE id = $this->id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
    }

    public function edit($nombre, $biografia, $id){
        $conexion = (new Conexion())->getConexion();
        $query = "UPDATE artistas SET nombre_completo='$nombre', biografia='$biografia' WHERE id = $id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
    }
    public function reemplazarImagen($imagen, $id){
        $conexion = (new Conexion())->getConexion();
        $query = "UPDATE artistas SET foto_perfil='$imagen' WHERE id = $id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
    }
}