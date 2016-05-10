<?php

/**
* Clase que representa a la tabla Productos.
*/

class Producto extends Db
{

	public function __construct()
	{
		parent::__construct();
		$this->tabla = "productos";
		$this->vista = "productosw";
		
	}


}
