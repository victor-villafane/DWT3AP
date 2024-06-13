<?php

class Usuario{
    protected $id;
    protected $email;
	protected $nombre_usuario;	
	protected $nombre_completo;	
	protected $password;	
	protected $roles; 

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

	/**
	 * Get the value of nombre_usuario
	 */
	public function getNombreUsuario()
	{
		return $this->nombre_usuario;
	}

	/**
	 * Set the value of nombre_usuario
	 */
	public function setNombreUsuario($nombre_usuario): self
	{
		$this->nombre_usuario = $nombre_usuario;

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
	 * Get the value of password
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Set the value of password
	 */
	public function setPassword($password): self
	{
		$this->password = $password;

		return $this;
	}

	/**
	 * Get the value of roles
	 */
	public function getRoles()
	{
		return $this->roles;
	}

	/**
	 * Set the value of roles
	 */
	public function setRoles($roles): self
	{
		$this->roles = $roles;

		return $this;
	}

	public function getId(){
		return $this->id;
	}

	public function usuario_x_email(string $email){
		$conexion = (new Conexion())->getConexion();
		$query = "SELECT * FROM usuarios WHERE email = :email";
		$PDOStatement = $conexion->prepare($query);
		$PDOStatement->setFetchMode(PDO::FETCH_CLASS,self::class);
		$PDOStatement->execute([
			"email" => $email
		]);
		$result = $PDOStatement->fetch();
		return $result;
	}

	public function insert(string $email, string $password){
		$conexion = (new Conexion())->getConexion();
		$query = "INSERT INTO usuarios VALUES (NULL, '$email', '', '', '$password', 'usuario')";
		$PDOStatement = $conexion->prepare($query);
		$PDOStatement->execute();
	}
}