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

      $_POST['m'] = $_POST['m'] + 1;
      $fechaNacimiento_sql = $_POST['a']."-".$_POST['m']."-".$_POST['d'];

      $query = "INSERT INTO usuario(nombre,apellido,nickname,email,fechaNacimiento,contraseña,nAvatar,rol) VALUES('$nombre','$apellido','$nickname','$email','$fechaNacimiento_sql','$contraseña',7,1)";

      $conErr = 0;

      $verificar_email = "SELECT * FROM usuario WHERE email = '$email' ";
      $vemail = $con -> query($verificar_email);
      if(($vemail->num_rows) > 0){
        $errMail = '<div class="error"><i class="fa-solid fa-circle-exclamation"></i> Este email ya esta registrado</div>';
        $conErr = 1;
      }else{
        $conErr = 0;
      }


      $verificar_nickname = "SELECT * FROM usuario WHERE nickname = '$nickname' ";
      $venickame = $con -> query($verificar_nickname);
      if(($venickame->num_rows) > 0){
        $errNick = '<div class="error"><i class="fa-solid fa-circle-exclamation"></i> Este nombre de usuario ya esta registrado</div>';
        $conErr = 1;
      }else{
        $conErr = 0;
      }

      if ($conErr == 0) {
        $con->query($query)or die("error de sintaxtis " . mysqli_error($con));
        header("Location:index.html");
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
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/fecha.css">
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
              <form action="fecha.php" method="post">
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
                <div class="description">
                  <div class="date">
                      <div class="input-content one">
                            <select class="form-select" name="d" id="">
                              <option value="0" selected disabled>Dia</option>
                              <?php
                                for ($i=1; $i < 32 ; $i++) {
                                  echo "<option value=$i>$i</option>";
                                }
                              ?>
                            </select>
                          </select>
                      </div>
                      <div class="input-content two">
                          <select class="form-select" name="m" id="">
                            <option value="0" selected disabled>Mes</option>
                            <?php
                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                            foreach ($meses as $i=>$mes) {
                              echo "<option value=$i>$mes</option>";
                            }

                            ?>
                          </select>
                      </div>
                      <div class="input-content theree">
                          <select class="form-select" name="a" id="">
                            <option value="0" selected disabled>Año</option>
                            <?php
                              for ($i=1930; $i < date("Y") ; $i++) {
                                echo "<option value=$i>$i</option>";
                              }
                            ?>
                          </select>
                      </div>
                </div>
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
