<?php

/**
* Clase que representa a la tabla Usuarios.
*/

class Usuario extends Db
{

	public function __construct()
	{
		parent::__construct();
		$this->tabla = "usuario";
		$this->vista = "usuario";
		
	}


}