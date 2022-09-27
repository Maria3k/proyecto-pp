<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/img/favicon/favicon.png">
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/forgot-password.css">
  <title>Iniciar Sesión</title>
</head>

<body>
  <div id="formulario" class="container">
    <div class="row">
      <div class="col">
        <div id="form" class="row" style="padding: 20px;">
          <div class="col-12">
            <img src="assets/img/iconos/logoblanco.png" alt="logoblanco.png" class="imagen">
            <h3 style="text-align: center;">Restablecer contraseña</h3>
          </div>
          <div class="col-12">
            <form action="login.html" method="post">
              <div class="form-group">
                <h4 style="text-align: center; margin-top: 30px;">Ingrese la dirección de correo electrónico verificada de su cuenta de usuario y le enviaremos un enlace para restablecer la contraseña.</h4>
                <input type="email" name="email" placeholder="Ingrese su correo electronico" required>
              </div>
              <div class="form-group">
                <input id="submit" type="submit" name="submit" value="Enviar correo de verificacion">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/bootstrap.js"></script>
</body>

</html>