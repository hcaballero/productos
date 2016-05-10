<?php 
	session_start();
	if (isset($_SESSION['email'])){
		include "includes/encabezado.php";
		include "includes/navbar.php";
		include "includes/contenido.php";
		include "includes/pie.php";
	} else {
		//Vuelvo a la Página Principal
		header("Location: login.php");
	}
