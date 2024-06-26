<?php

class Guionista{
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

    public function get_x_id(int $id) :? self
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM guionistas WHERE id = $id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        $resultado = $PDOStatement->fetch();

        return $resultado ? $resultado : null;
        
    }

    public function catalogo_completo(): array
    {
        $catalogo = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM guionistas";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo = $PDOStatement->fetchAll();

        return $catalogo;
    }    
}