<?php
  $productosvw = new Producto();
  $productos = $productosvw->seleccion();
  $categoriastbl = new Categoria();
  $categorias = $categoriastbl->seleccion();
?>
    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">        
        <h1><img src="../media/img/logo.png" width="100" height="100" alt="Logo de la Empresa Super 10!">Panel de Administración</h1>
      </div> 
      <div class="container-fluid">
        <div class="row">
          <h2>Productos</h2>
          <p>Listado de Productos disponibles para comercializar, y sus propiedades:</p>           
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Categoría</th>
                <th>Descripción</th>                
                <th>Precio</th>
                <th>IVA</th>
                <th>Archivo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $productos->fetch(PDO::FETCH_ASSOC)) : ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['categoria_descri']; ?></td>
                <td><a href="editar_producto.php?id=<?php echo $row['id'].'&acc=1'; ?>">
                      <?php echo $row['producto_descri']; ?>
                    </a>
                </td>
                <td><?php echo Formato::formato_moneda($row['producto_precio']); ?></td>
                <td><?php echo $row['producto_iva']; ?></td>
                <td><?php echo $row['producto_archivo']; ?></td>
                <td><a href="editar_producto.php?id=<?php echo $row['id'].'&acc=1';?>">
                      <span class="glyphicon glyphicon-remove"></span>
                    </a>
                </td>
              </tr>
              <?php endwhile; ?>              
            </tbody>
          </table>
          
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <h2>Categorías</h2>
          <p>Listado de Categorías:</p>           
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Descripción</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $categorias->fetch(PDO::FETCH_ASSOC)) : ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><a href="editar_categoria.php?id=<?php echo $row['id'].'&acc=1'; ?>">
                      <?php echo $row['categoria_descri']; ?>
                    </a>
                </td>
                <td><a href="editar_categoria.php?id=<?php echo $row['id'].'&acc=1';?>">
                      <span class="glyphicon glyphicon-remove"></span>
                    </a>
                </td>                
              </tr>
              <?php endwhile; ?>              
            </tbody>
          </table>          
        </div>
      </div>
    </div>

      
  