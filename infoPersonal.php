<?php
  include("conexion.php");
  session_start();
  if($_SESSION){
    $usr = $con->query("SELECT usuario.*, avatar.* FROM usuario LEFT JOIN avatar ON usuario.nAvatar = avatar.id_avatar WHERE id_usuario = " . $_SESSION["id_usuario"])->fetch_assoc();
  }else{
    header("location:login.php");
  }

  $menu = '';

if ($_SESSION) {

  $nAvatar = $_SESSION["nAvatar"];

  $send = $con->query("SELECT * FROM avatar WHERE id_avatar = $nAvatar");
  $col = $send->fetch_assoc();
  $ad = '';

  if($_SESSION["rol"] == 2){
    $ad = '<li><a href="backend.php"><i class="fa-solid fa-gear"></i>Editar</a></li>';
  }


  $menu = '        
  <div class="action" >
    <div class="profile" onclick="menuToggle()">
      <img src="'.$col["rutaArchivo"].'" width="30px" height="30px" alt="'.$col["nombreArchivo"].'">
    </div>
    <div class="menu">
      <ul>
        <li id="primero"><a href="perfil.php"><i class="fa-solid fa-user"></i>Perfil</a></li>
        '.$ad.'
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
      <title>Document</title>
      <link rel="stylesheet" href="assets/css/perfil.css">
      <link rel="stylesheet" href="accordian.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="assets/css/bootstrap.css">
      <link rel="stylesheet" href="assets/css/icons.css">
  </head>
  <body>
    <!-- NavBar -->
    <nav>
      <img class="img1" src="assets/img/escuela/loguito.png" alt="loguito.png">
      <div class="icon-wrapper" data-numbrer="1">
        <img src="assets/img/iconos/bell.png" class="bell-icon">
      </div>
      <?= $menu ?>
    </nav>
    <!--  -->

  <!-- Menu Vertical -->
  <div id="accordian">
    <ul class="show-dropdown main-navbar">
      <div class="selector-active"><div class="top"></div><div class="bottom"></div></div>
    <li>
      <a href="perfil.php"><i class="fa fa-tachometer"></i>Inicio</a>
    </li>
    <li class="active">
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
  <!--  -->

  <!-- Tabla de Información -->

  <div id="infoPersonal">

    <div class="ImagenUsuario">
      <img src="<?= $usr["rutaArchivo"] ?>" alt="<?= $usr["nombreArchivo"] ?>">
    </div>
    <div class="username"><br><b>Username:&nbsp</b> <?= $usr["nickname"] ?></div>
  
    <div class="name"><br><b>Nombre:&nbsp</b> <?= $usr["nombre"] ?></div>
    
    <div class="surname"><br><b>Apellido:&nbsp</b> <?= $usr["apellido"] ?></div>
    
    <div class="FDN"><br><b>Fecha de Nacimiento:&nbsp</b> <?= $usr["fechaNacimiento"] ?></div>

        <div class="correoelectronico"><br> <b>Correo Electronico:&nbsp</b> <?= $usr["email"] ?></div>
  </div>

  <!-- Aca va el footer -->      

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

      function perfil(){
        setTimeout("location.href = 'perfil.php';",400);
      }

      function infoGeneral(){
        setTimeout("location.href = 'infoGeneral.php';",400);
      }
    </script>
    <script src="https://kit.fontawesome.com/b3b892b65b.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>
