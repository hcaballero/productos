<?php
/**
* Clase Abstracta db que sirve para conectarse y heredar metodos.
*/

include "config.php";	 

abstract class Db
{
	protected $link;
	protected $tabla;
	protected $vista;
	
	public function __construct()
	{
		//Se conecta a la BD
		$this->conectar();
	}

	private function conectar(){
		try {
			$this->link = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";",DB_USER,DB_PASS);	
		} catch (Exception $e) {
			echo "Error al conectar la BD: " .$e->getMessage();
			die();
		}		
	}

	//
	public function insertar(array $args){
		if (!empty($args)) {
			$campos = implode(',',array_keys($args));
			$valores = implode(',',array_values($args));
		}
		$query = "INSERT INTO $this->tabla ($campos) VALUES ($valores)";	
		$result = $this->link->query($query);
		return $result;
	}

	public function eliminar($id){
		$query = "DELETE FROM ".$this->tabla." WHERE id=$id";
		$this->link->query($query);
	}

	public function modificar($id,$args){
		if (!empty($args)){
			$sentenciaSET="";
			foreach ($args as $campo => $valor) {
				if (!empty($sentenciaSET)) {
					$sentenciaSET .= ","; 
				}
				$sentenciaSET .= "$campo = $valor"; 
			}
			$query = "UPDATE ".$this->tabla." SET $sentenciaSET WHERE id=$id";
		}
	}
	
	public function seleccion($filtro=""){
		$query = "SELECT * FROM $this->vista";
		if (!empty($filtro)){
			 $query .= " WHERE $filtro";			
		}		
		$resultado = $this->link->query($query);
		return $resultado;
	}
}