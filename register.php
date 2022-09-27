<!DOCTYPE html>
<html lang="es">
<?php
include("conexion.php");

$userErr = '';
$emailErr = '';

if (isset($_POST["submit"])) {

  $nombre = trim($_POST["nombre"]);
  $apellido = trim($_POST["apellido"]);
  $username = trim($_POST["username"]);
  $email = trim($_POST["email"]);
  $contraseña = md5(trim($_POST["contraseña"]));
  $imagen = trim($_POST["imagen"]);

  $user_verify = $con->query("SELECT * FROM usuario WHERE nickname = '$username'");
  $email_verify = $con->query("SELECT * FROM usuario WHERE email = '$email'");

  if ($email_verify->num_rows == 0) {
    if ($user_verify->num_rows == 0) {
      if ($imagen) {
        $query = $con->query("INSERT INTO usuario(nombre, apellido, nickname, email, contraseña, nAvatar,rol) VALUES ('$nombre','$apellido','$username','$email','$contraseña','$imagen',1)") or die("Error en el insert --->" . $query . mysqli_error($con));
        $send = $con->query("SELECT * FROM usuario WHERE email = '$email'");
        $col = $send->fetch_assoc();

        $con->close();

        session_start();
        $_SESSION = $col;
        $_SESSION['contraseña'] = $_POST['contraseña'];
        header("Location:index.php");
      } else {
        echo "SELECCIONE UNA IMAGEN!!!";
      }
    } else {
      $userErr = '
      <div style="color: #c30000;">Este nombre de usuario ya existe</div>
      ';
    }
  } else {
    $emailErr = '
    <div style="color: #c30000;">Este correo electronico ya existe</div>
    ';
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
  <title>Registrarse</title>
</head>

<body>
  <div id="formulario" class="container">
    <div class="row">
      <div id="logo" class="col-4">
        <a href="index.php">
          <img src="assets/img/iconos/logoblanco.png" alt="logo.png">
        </a>
      </div>
      <div class="col-8">
        <div id="form" class="row">
          <div class="col-12">
            <h2 style="text-align: center;">REGISTER</h2>
          </div>
          <div class="col-12">
            <form action="register.php" method="post">
              <div class="form-group">
                <div class="row">
                  <div class="col-6">
                    <input type="text" name="nombre" placeholder="Nombre" required>
                  </div>
                  <div class="col-6">
                    <input type="text" name="apellido" placeholder="Apellido" required>
                  </div>
                </div>
                <input type="text" name="username" placeholder="Nombre de usuario" required>
                <?= $userErr ?>
              </div>
              <div class="form-group">
                <input type="email" name="email" placeholder="Correo electronico" required>
                <input type="text" name="cemail" placeholder="Correo electronico nuevamente" required>
                <?= $emailErr ?>
              </div>
              <div class="form-group">
                <input type="password" name="contraseña" placeholder="Ingrese su contraseña" required>
                <input type="password" name="ccontraseña" placeholder="Ingrese su contraseña nuevamente" required>
              </div>
              <div class="form-group">
                <p>Seleccione una imagen de perfil</p>

                <select name="imagen" hidden>
                  <option id="option"></option>
                </select>

                <ul id="lista">
                  <?php
                  $envio = $con->query("SELECT * FROM avatar");
                  while ($row = $envio->fetch_assoc()) {
                  ?>
                    <li>
                      <img id=<?php echo $row["id_avatar"]; ?> src=<?php echo $row["rutaArchivo"]; ?> alt=<?php echo $row["nombreArchivo"]; ?> onclick="<?php echo "select(", $row["id_avatar"], ")"; ?>" width="75px" height="75px">
                    </li>
                  <?php
                  }
                  ?>
                </ul>
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
  <script>
    function select(n) {
      if (document.getElementById(n).hasAttribute("class")) {
        document.getElementById(n).removeAttribute("class");
        document.getElementById("option").removeAttribute("value");
      } else {
        for (var i = 1; i <= document.getElementById("lista").childElementCount; i++) {
          if (document.getElementById(i).hasAttribute("class")) {
            document.getElementById(i).removeAttribute("class");
          }
        }
        document.getElementById("option").setAttribute("value", n);
        document.getElementById(n).setAttribute("class", "seleccionado");
      }
    }
  </script>
</body>

</html>
