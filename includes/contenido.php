<?php
  $producto = new Producto();

  if (isset($_POST['btnBuscar'])){
    $textoabuscar = $_POST['txtFiltro'];
    if(!empty($textoabuscar)){
       $resultado = $producto->seleccion("upper(producto_descri) like '%{$textoabuscar}%'"); 
    } else {
       $resultado = $producto->seleccion();
    }
  } else {
    $resultado = $producto->seleccion();
  }
  
?>
    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">        
        <h1><img src="media/img/logo.png" width="100" height="100" alt="Logo de la Empresa Super 10!">Listado de Productos</h1>
      </div> 
      <div class="well">
        <form class="form-inline" role="search" method="POST" action="">
          <div class="form-group">
            <input type="text" name="txtFiltro" class="form-control" placeholder="Buscar por Descripción..." value="<?php if(isset($textoabuscar)){ echo $textoabuscar; } ?>">
            <button type="submit" class="btn btn-default" name="btnBuscar">Buscar</button>
          </div>
        </form> 
      </div>
      <div class="container-fluid">
        <div class="row">
          
            <!--<div class="list-group placeholder">-->
              <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) : ?>
                <!---->
                <div class="col-md-4">
                  <div class="list-group">
                    <a href="#" class="list-group-item">
                      <img src="media/img/<?php echo $row['producto_archivo'];?>">
                      <h4 class="list-group-item-heading"><?php echo $row['producto_descri']; ?></h4>
                      <p class="list-group-item-text">Precio:<strong><?php echo Formato::formato_moneda($row['producto_precio']); ?></strong></p>
                      <p class="list-group-item-text">IVA:<strong><?php echo $row['producto_iva']; ?></strong></p>
                      <p class="list-group-item-text">Categoría:<strong><?php echo $row['categoria_descri']; ?></strong></p>
                    </a>
                  </div>
                <!--</a>-->
                </div>
              <?php endwhile; ?>
            <!--</div>-->
          
        </div>
      </div>
    </div>

      
  