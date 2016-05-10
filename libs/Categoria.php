<?php

/**
* Clase que representa a la tabla Categorias.
*/

class Categoria extends Db
{

	public function __construct()
	{
		parent::__construct();
		$this->tabla = "categoria";
		$this->vista = "categoria";
		
	}
	

}