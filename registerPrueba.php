<?php
    include 'conexion.php';

    $errMail = "";
    $errNick = "";

    if(isset($_POST['submit'])){
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $nickname = $_POST['nickname'];
      $email = $_POST['email'];
      $contraseña = md5($_POST['contraseña']);

      $query = "INSERT INTO usuario(nombre,apellido,nickname,email,contraseña,nAvatar,rol)
      VALUES('$nombre','$apellido','$nickname','$email','$contraseña',7,1)";

      $verificar_email = "SELECT * FROM usuario WHERE email = '$email' ";
      $vemail = $con -> query($verificar_email);
      if(($vemail->num_rows) > 0){
        $errMail = '<div class="error"><i class="fa-solid fa-circle-exclamation"></i> Este email ya esta registrado</div>';
      }
      $verificar_nickname = "SELECT * FROM usuario WHERE nickname = '$nickname' ";
      $venickame = $con -> query($verificar_nickname);
      if(($venickame->num_rows) > 0){
          $errNick = '<div class="error"><i class="fa-solid fa-circle-exclamation"></i> Este nombre de usuario ya esta registrado</div>';
      }


      //$con->query($query)or die("error de sintaxtis");
      //header("Location:index.html");

    }
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/favicon/favicon.png">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <title>Registrarse</title>
  </head>
  <body>
    <div id="formulario" class="container">
      <div class="row">
        <div id="logo" class="col-4">
          <img src="assets/img/iconos/logoblanco.png" alt="logo" >
        </div>
        <div class="col-8">
          <div id="form" class="row">
            <div class="col-12">
              <h2 style="text-align: center;">REGISTER</h2>
            </div>
            <div class="col-12">
              <form action="registerPrueba.php" method="post">
                <div class="form-group">
                  <input style="width: 45%;" type="text" name="nombre" placeholder="Nombre" required><input style="width: 45%;" type="text" name="apellido" placeholder="Apellido" required>
                  <input type="text" name="nickname" placeholder="Nombre de usuario" required>
                </div>
                <?= $errNick; ?>
                <div class="form-group">
                  <input type="email" name="email" placeholder="Correo electronico" required>
                  <input type="text" name="cemail" placeholder="Correo electronico nuevamente" required>
                </div>
                <?= $errMail; ?>
                <div class="form-group">
                  <input type="password" name="contraseña" placeholder="Ingrese su contraseña" required>
                  <input type="password" name="contraseña" placeholder="Ingrese su contraseña nuevamente" required>
                </div>
                <div class="form-group">
                  <input id="submit" type="submit" name="submit" style="width: auto;">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/b3b892b65b.js"></script>

  </body>
</html>
