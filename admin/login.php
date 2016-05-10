<?php
  session_start();
  include_once "../autoloader.php";
  $usuario = new Usuario();

  if (isset($_POST['btnLogin'])){
      $email = $_POST['email'];
      $pass = $_POST['pass'];

      $result = $usuario->seleccion("email='$email' and password='$pass'");
      
      if ( count($result->fetchAll(PDO::FETCH_ASSOC)) > 0) {
        $_SESSION['email'] = $email;
        header ("Location: ./index.php");
      } else {
        header ("Location: login.php");
      }

  }
  
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../media/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../media/css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <form class="form-signin" method="POST" action="login.php">
        <h2 class="form-signin-heading">Panel de Administración</h2>        
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Correo Electrónico" required autofocus name="email">
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="pass">
        <button class="btn btn-lg btn-primary" type="submit" name="btnLogin">Ingresar</button>
        <a href="../" class="btn btn-lg btn-success">Página Principal</a>
      </form>
    </div> <!-- /container -->
  </body>
</html>
