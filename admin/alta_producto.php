<?php 
	
	include 'includes/encabezado.php'; 
	
	$categoria = new Categoria();
	$categorias = $categoria->seleccion();

	if (isset($_POST['btnGuardar'])){
		$producto = new Producto();

		$img = $_FILES['imagen']['name'];
		$img_tmp = $_FILES['imagen']['tmp_name'];
		$descri = Formato::add_quotes($_POST['descri']);
		$precio = $_POST['precio'];
		$iva= $_POST['iva'];
		$cat = $_POST['categoria'];
		//Creo un array asociativo donde la clave es el campo de la tabla productos
		//y el valor el que se recibe por POST
		$params=array("producto_descri"=>$descri
					,"producto_precio"=>$precio
					,"producto_iva"=>$iva
					,"categoria_id"=>$cat
					,"producto_archivo"=>Formato::add_quotes($img)
			);
		$producto->insertar($params);
		move_uploaded_file($img_tmp, "../media/img/$img");
	}

?>

<div class="container">
	<div class="row col-md-6">
		<div class="page-header">        
			<h1>Nuevo Producto</h1>
		</div> 
		<form method="POST" action="" enctype="multipart/form-data">
		  <div class="form-group">
		    <label>Producto</label>
		    <input type="text" class="form-control" name="descri" placeholder="Nombre del Producto" >
		  </div>  
		  <div class="form-group">
		    <label>Categoría</label>
		    <select name="categoria" class="form-control">
		    	<option value="" selected="false" disabled="true">-- Seleccione la Categoría --</option>
		    	<?php while ($cat = $categorias->fetch(PDO::FETCH_ASSOC)) : ?>
		    		<option value="<?php echo $cat['id']; ?>"><?php echo $cat['categoria_descri']; ?></option>
		    	<?php endwhile; ?>
		    </select> 
		  </div>  
		  <div class="form-group">
		    <label>Precio</label>
		    <input type="text" class="form-control" name="precio" placeholder="Precio">
		  </div>  
		  <div class="form-group">
		    <label>IVA</label>
		    <select name="iva" class="form-control">
		    	<option value="" selected="false" disabled="true">-- Seleccione el IVA --</option>
		    	<option value="21">21%</option>
		    	<option value="10.5">10.5%</option>
		    </select> 
		  </div>  
		  <div class="form-group">
		    <label>Imágen para Mostrar</label>
		    <input type="file" value="archivo" name="imagen">
		    <p class="help-block">Busque y seleccione una imagen en su PC.</p>
		  </div>		
		  </br>  
		  <button type="submit" name ="btnGuardar" class="btn btn-primary">Guardar</button>
		  <a href="./" class = "btn btn-default">Cancelar</a>
		</form>
	</div>
</div>
<?php include 'includes/pie.php'; ?>