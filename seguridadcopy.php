<?php
include("conexion.php");
session_start();

$menu = '';

if ($_SESSION) {
  $usr = $con->query("SELECT usuario.*, avatar.* FROM usuario LEFT JOIN avatar ON usuario.nAvatar = avatar.id_avatar WHERE id_usuario = " . $_SESSION["id_usuario"])->fetch_assoc();

  $nAvatar = $_SESSION["nAvatar"];

  $send = $con->query("SELECT * FROM avatar WHERE id_avatar = $nAvatar");
  $col = $send->fetch_assoc();
  $ad = '';

  if ($_SESSION["rol"] == 2) {
    $ad = '<li><a href="backend.php"><i class="fa-solid fa-gear"></i>Editar</a></li>';
  }


  $menu = '        
  <div class="action" >
    <div class="profile" onclick="menuToggle()">
      <img src="' . $col["rutaArchivo"] . '" width="30px" height="30px" alt="' . $col["nombreArchivo"] . '">
    </div>
    <div class="menu">
      <ul>
        <li id="primero"><a href="perfil.php"><i class="fa-solid fa-user"></i>Perfil</a></li>
        ' . $ad . '
        <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Cerrar Sesion</a></li>
      </ul>
    </div>
  </div>
        ';

  if ($_POST) {
    $query = "SELECT * FROM usuario WHERE id_usuario = " . $_SESSION["id_usuario"] . " AND contraseña = '" . $_POST["actualPass"] . "'";
    echo $query;
    $datos = $con->query($query);

    if ($datos->num_rows > 0) {

      if ($_POST["newPass"] == $_POST["vNewPass"]) {

        $actualizar = "UPDATE usuario SET contraseña= " . $_POST["newPass"] . " WHERE id_usuario = " . $_SESSION["id_usuario"];
      }
    } else {
    }
  }
} else {
  header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/perfilcopy.css">
  <link rel="stylesheet" href="accordiancopy.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/bootstrapcopy.css">
  <link rel="stylesheet" href="assets/css/iconscopy.css">
  <link rel="stylesheet" href="assets/css/fondo.css">
  <style>
    .option:hover {
      color: white !important;
    }

    .option span {
      opacity: 0;
      transition-duration: 250ms;
    }

    .option:hover>span {
      opacity: 1;
    }

    .active a{
      color: white !important;
    }
  </style>
</head>

<body>

  <!-- NavBar -->
  <nav>
    <img class="img1" src="assets/img/escuela/loguito.png" alt="loguito.png">
    <div class="icon-wrapper" data-numbrer="1">
      <img src="assets/img/iconos/bell-solid.svg" class="bell-icon">
    </div>
    <?= $menu ?>
  </nav>
  <!--menu -->

  <div id="accordian">
    <ul class="show-dropdown">
      <li>
        <a id="option1" class="option" href="perfil.php">
          <i class="fa fa-tachometer icon"></i>
          <span>Inicio</span>
        </a>
      </li>
      <li>
        <a class="option" href="infoPersonal.php">
          <i class="fa fa-address-book icon"></i>
          <span>Info Personal</span>
        </a>
      </li>
      <li class="active">
        <a href="seguridad.php">
          <i class="fa-solid fa-lock icon"></i>
          <span>Seguridad</span>
        </a>
      </li>
      <li>
        <a class="option" href="infoGeneral.php">
          <i class="fa fa-clone icon"></i>
          <span>Info General</span>
        </a>
      </li>
    </ul>
  </div>


  <!-- Información de conectividad -->
  <div class="fondo">
    <div id="Caja">
      <div class="act"> <label for="">Actividad</label> </div>
      <div class="UltSesion"> <label for="">Ultimo Inicio de Sesión:&nbsp</label><?= $usr["fechaNacimiento"] ?></div>
      <div class="navegador"><label for="">Desde el navegador:&nbsp</label><b>Chrome</b></div>
      <div class="UltConex"><label for="">Ultima Conexion:&nbsp</label><b>17:45-PM</b></div>
    </div>

    <form action="seguridad.php" method="post" class="CajaContra">
      <div class="tituloContra">
        <label>Administrador de Contraseña</label>
      </div>
      <div class="Password">
        <label>Contraseña actual:</label>
        <input type="password" name="actualPass" required>
      </div>
      <div class="Password">
        <label>Nueva contraseña:</label>
        <input type="password" name="newPass" required>
      </div>
      <div class="Password">
        <label>Confirmar contraseña:</label>
        <input type="password" name="vNewPass" required>
      </div>
      <input type="submit" class="botoncito" value="enviar">
    </form>
  </div>

  <!-- Footer -->

  <!-- Script Eye -->

  <script>
    function myFunction() {
      var x = document.getElementById("myInput");
      var y = document.getElementById("hide1");
      var z = document.getElementById("hide2");

      if (x.type === 'password') {
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
      } else {
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
      }
    }
  </script>

  <!-- Script del menu -->
  <script>
    // ---------vertical-menu with-inner-menu-active-animation-----------.
    var tabsVerticalInner = $('#accordian');
    var selectorVerticalInner = $('#accordian').find('li').length;
    var activeItemVerticalInner = tabsVerticalInner.find('.active');
    var activeWidthVerticalHeight = activeItemVerticalInner.innerHeight();
    var activeWidthVerticalWidth = activeItemVerticalInner.innerWidth();
    var itemPosVerticalTop = activeItemVerticalInner.position();
    var itemPosVerticalLeft = activeItemVerticalInner.position();
    $(".selector-active").css({
      "top": itemPosVerticalTop.top + "px",
      "left": itemPosVerticalLeft.left + "px",
      "height": activeWidthVerticalHeight + "px",
      "width": activeWidthVerticalWidth + "px"
    });
    $("#accordian").on("click", "li", function(e) {
      $('#accordian ul li').removeClass("active");
      $(this).addClass('active');
      var activeWidthVerticalHeight = $(this).innerHeight();
      var activeWidthVerticalWidth = $(this).innerWidth();
      var itemPosVerticalTop = $(this).position();
      var itemPosVerticalLeft = $(this).position();
      $(".selector-active").css({
        "top": itemPosVerticalTop.top + "px",
        "left": itemPosVerticalLeft.left + "px",
        "height": activeWidthVerticalHeight + "px",
        "width": activeWidthVerticalWidth + "px"
      });
    });

    function infoGeneral() {
      setTimeout("location.href = 'infoGeneral.php';", 400);
    }

    function infoPersonal() {
      setTimeout("location.href = 'infoPersonal.php';", 400);
    }

    function perfil() {
      setTimeout("location.href = 'perfil.php';", 400);
    }

    function menuToggle() {
      const toggleMenu = document.querySelector('.menu');
      toggleMenu.classList.toggle('active');
    }
  </script>
  <script src="https://kit.fontawesome.com/b3b892b65b.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>

</html>