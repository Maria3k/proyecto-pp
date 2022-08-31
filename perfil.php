<?php
  include("conexion.php");
  session_start();
  if($_SESSION){
    $usr = $con->query("SELECT usuario.*, avatar.* FROM usuario LEFT JOIN avatar ON usuario.nAvatar = avatar.id_avatar WHERE id_usuario = " . $_SESSION["id_usuario"])->fetch_assoc();
  }else{
    header("location:login.php");
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/icons.css">
</head>
<body>

  <div class="contenedor">
    <div class="carta-contenedor">
      <div class="header">
        <img src="<?= $usr["rutaArchivo"] ?>" alt="<?= $usr["nombreArchivo"] ?>">
        <h2><label for="">Bienvenido</h2></label>
          <div class="nombreUser"></div><b><?= $usr["nombre"] ?></b>
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

  <!---
    <div id="accordian">
        <ul class="show-dropdown main-navbar">
        <div class="selector-active"><div class="top"></div><div class="bottom"></div></div>
        <li class="active">
        <a href="#"><i class="fa fa-tachometer"></i>Inicio</a>
        </li>
        <li>
        <a href="#" onclick="infoPersonal()"><i class="fa fa-address-book"></i>Información Personal</a>
        </li>
        <li>
        <a href="#" onclick="seguridad()"><i class="fa fa-clone"></i>Seguridad</a>
        </li>
        <li>
        <a href="#" onclick="infoGeneral()"><i class="fa fa-calendar"></i>Información General</a>
        </li>
        </ul>
       </div>
       <div id="cuadrado">
          <div class="pansito">
            <img src="<?= $usr["rutaArchivo"] ?>" alt="<?= $usr["nombreArchivo"] ?>">
          </div>
          <div class="Bienvenido">
              <label for=""> Bienvenido&nbsp<b><?= $usr["nombre"] ?></b>  </label>
          </div>
       <div id="Consultas">
          <a href="#" class="botonConsulta">
            <p>
              Realizar Consulta
            </p> 
          </a>
       </div>
       </div>-->
<!-- Aca va el Footer --->

<!-- Codigo de abajo, script del menu anterior -->

<!---
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
  "top":itemPosVerticalTop.top + "px",
  "left":itemPosVerticalLeft.left + "px",
  "height": activeWidthVerticalHeight + "px",
  "width": activeWidthVerticalWidth + "px"
  });
  $("#accordian").on("click","li",function(e){
  $('#accordian ul li').removeClass("active");
  $(this).addClass('active');
  var activeWidthVerticalHeight = $(this).innerHeight();
  var activeWidthVerticalWidth = $(this).innerWidth();
  var itemPosVerticalTop = $(this).position();
  var itemPosVerticalLeft = $(this).position();
  $(".selector-active").css({
      "top":itemPosVerticalTop.top + "px",
      "left":itemPosVerticalLeft.left + "px",
      "height": activeWidthVerticalHeight + "px",
      "width": activeWidthVerticalWidth + "px"
  });
  });

  function seguridad(){
    setTimeout("location.href = 'seguridad.php';",400);
  }

  function infoPersonal(){
    setTimeout("location.href = 'infoPersonal.php';",400);
  }
  function infoGeneral(){
    setTimeout("location.href = 'infoGeneral.php';",400);
  }
  </script>
  -->
  <script src="https://kit.fontawesome.com/b3b892b65b.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>
</html>
