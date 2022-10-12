<?php
include("conexion.php");
session_start();
if ($_SESSION) {
  $usr = $con->query("SELECT usuario.*, avatar.* FROM usuario LEFT JOIN avatar ON usuario.nAvatar = avatar.id_avatar WHERE id_usuario = " . $_SESSION["id_usuario"])->fetch_assoc();
} else {
  header("location:login.php");
}

$menu = '';

if ($_SESSION) {

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
} else {
  $menu = '<a class="btn-nav" href="register.php">Register</a><a class="btn-nav" href="login.php">Iniciar Sesion</a>';
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="assets/css/perfil.css">
  <link rel="stylesheet" href="accordian.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/icons.css">
</head>

<body class="body-perfil">

  <nav>
    <img class="img1" src="assets/img/escuela/loguito.png" alt="loguito.png">
    <div class="icon-wrapper" data-numbrer="1">
      <img src="assets/img/iconos/bell.png" class="bell-icon">
    </div>
    <?= $menu ?>
  </nav>

  <div id="accordian">
    <ul class="show-dropdown main-navbar">
      <div class="selector-active">
        <div class="top"></div>
        <div class="bottom"></div>
      </div>
      <li class="active">
        <a href="perfil.php"><i class="fa fa-tachometer"></i>Inicio</a>
      </li>
      <li>
        <a href="infoPersonal.php"><i class="fa fa-address-book"></i>Informacion Personal</a>
      </li>
      <li>
        <a href="seguridad.php"><i class="fa fa-clone"></i>Ultima Actividad</a>
      </li>
      <li>
        <a href="infoGeneral.php"><i class="fa fa-clone"></i>Informacion</a>
      </li>
    </ul>
  </div>

  <div class="contenedor">
    <div class="carta-contenedor">
      <div class="header">
        <div class="nombreUser">
          <h2><label for="" class="label">Bienvenido&nbsp <b><?= $usr["nombre"] ?></b> </h2></label>
        </div>
        <div class="lorem">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat sequi esse beatae obcaecati consequuntur autem vel quidem officia quia maxime laboriosam quos neque quo fugit quisquam error, minima corporis ipsum.
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque ullam minus error, vitae nulla voluptatum tenetur ipsa! Aperiam unde debitis modi, totam aliquid beatae aut corrupti soluta hic, quibusdam voluptas!
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut quos, odio saepe eveniet sequi maiores eius totam porro laudantium, doloribus illum unde quas nulla. Similique debitis quae tempore vel provident?
        </div>
      </div>
    </div>
  </div>

  <div class="consulta">
    <a href="#" class="botonConsulta">
      <p>
        Realizar Consulta
      </p>
    </a>
  </div>


  <!-- Aca va el Footer --->

  <!-- Codigo de abajo, script del menu anterior -->

  <script>
    // ---------vertical-menu with-inner-menu-active-animation-----------
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
  </script>

  <!----->
  <script src="https://kit.fontawesome.com/b3b892b65b.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>

</html>