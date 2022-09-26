<?php
include("conexion.php");
$errEm = "";
if (isset($_POST["submit"])) {
  if (isset($_POST["email"])) {
    if (isset($_POST["contraseña"])) {
      $e = trim($_POST["email"]);
      $p = trim(md5($_POST["contraseña"]));

      if (!empty($e)) {
        if (!empty($p)) {
          $query = "SELECT * FROM usuario WHERE email = '$e' AND contraseña = '$p'";
          $send = $con->query($query);
          $col = $send->fetch_assoc();

          print_r($col);

          if (($send->num_rows) > 0) {
            session_start();
            $_SESSION = $col;
            $_SESSION["contraseña"] = $_POST["contraseña"];
            header("Location:index.php");
          } else {
            $errEm = '<div style="color: #c30000;">Nombre de usuario o contraseña incorrectos</div>';
          }
        }
      }
    }
  }
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
  <title>Iniciar Sesión</title>
</head>

<body>
  <div id="formulario" class="container">
    <div class="row">
      <div id="logo" class="col-4">
        <img src="assets/img/iconos/logoblanco.png" alt="logoblanco.png" class="logo_main">
      </div>
      <div class="col-8">
        <div id="form" class="row" style="padding: 20px;">
          <div class="col-12">
            <h2 style="text-align: center;">INICIAR SESION</h2>
          </div>
          <div class="col-12">
            <form action="login.php" method="post">
              <div class="form-group">
                <input type="email" name="email" placeholder="Ingrese su correo electronico" required>
                <?= $errEm; ?>
              </div>
              <div class="form-group">
                <input type="password" name="contraseña" placeholder="Ingrese su contraseña" required>
                <span>Recordar nombre de usuario</span><input type="checkbox" name="recordar">
              </div>
              <div class="form-group">
                <input id="submit" type="submit" name="submit" value="Ingresar">
              </div>
            </form>
            <a class="reg" href="register.php">Crear Cuenta</a>
            <a class="forg" href="forgot-password.php">¿Olvidaste tu contraseña?</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/bootstrap.js"></script>
</body>

</html>