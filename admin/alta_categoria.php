<?php include 'includes/encabezado.php'; 

	if (isset($_POST['btnGuardar'])){
		$categoria = new Categoria();
		$params=array("categoria_descri"=>Formato::add_quotes($_POST['descri']));
		$categoria->insertar($params);
	}

?>

<div class="container">
	<div class="row col-md-6">
		<div class="page-header">        
			<h1>Nueva Categoría</h1>
		</div> 
		<form method="POST" action="">
		  <div class="form-group">
		    <label>Categoría</label>
		    <input type="text" class="form-control" name="descri" placeholder="Nombre de la Categoría">
		  </div>  
		  <button type="submit" name ="btnGuardar" class="btn btn-primary">Guardar</button>
		  <a href="./" class = "btn btn-default">Cancelar</a>
		</form>
	</div>
</div>
<?php include 'includes/pie.php'; ?>