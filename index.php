<?php
include("conexion.php");
session_start();

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
  <meta property="og:title" content="Facundo se la come" />
  <meta property="og:image" content="http://186.23.120.80:800/pagina/Proyecto-PP/assets/img/iconos/logoblanco.png" />
  <meta property="og:description" content="E.T.N°32 D.E.N°14 Preguntas y Respuestas es E.T.N°32 D.E.N°14 Preguntas y Respuestas..... XD">
  <meta property="og:image:width" content="300px" />
  <meta property="og:image:height" content="300px" />
  <link rel="icon" href="assets/img/favicon/favicon.png">
  <link rel="stylesheet" href="assets/css/index.css">
  <link rel="stylesheet" href="assets/css/tarjetas.css">
  <link rel="stylesheet" href="assets/css/footer.css">
  <link rel="stylesheet" href="assets/css/slider.css">
  <title>E.T.32 Preguntas</title>
</head>

<body>
  <nav>
    <img class="img1" src="assets/img/escuela/loguito.png" alt="loguito.png">
    <div class="icon-wrapper" data-numbrer="1">
      <img src="assets/img/iconos/bell.png" class="bell-icon">
    </div>
    <?= $menu ?>
  </nav>
  <div class="container">
    <h1>HISTORIA DE LA <span>ET32</span></h1>
    <br>
    <div class="process-wrapper">
      <div id="progress-bar-container">
        <ul>
          <li class="step step01 active">
            <div class="step-inner">ESC. FÁBRICA</div>
          </li>
          <li class="step step02">
            <div class="step-inner">ACTO</div>
          </li>
          <li class="step step03">
            <div class="step-inner">ESC. MUNICIPAL</div>
          </li>
          <li class="step step04">
            <div class="step-inner">ESC. TÉCNICA</div>
          </li>
          <li class="step step05">
            <div class="step-inner">LEMA</div>
          </li>
        </ul>

        <div id="line">
          <div id="line-progress"></div>
        </div>
      </div>

      <div id="progress-content-section">
        <div class="section-content factory active">
          <h2>Escuela Fábrica</h2>
          <p>
            En agosto de 1950 se inaugura como Escuela Fábrica 131 "Géneral José De San Martín".
          </p>
        </div>
        <div class="section-content act">
          <h2>Acto Inaugural</h2>
          <p>
            22 de agosto de 1950 se realizó el acto inaugural, con la presencia del entonces Presidente de la Nación,
            General Juan Domingo Perón.
          </p>
        </div>
        <div class="section-content municipal">
          <h2>Escuela Municipal</h2>
          <p>
            En 1992 la escuela pasó a la Administración del ámbito de la Municipalidad de la Ciudad de Buenos Aires
            cambiando su denominación a Escuela Municipal de Enseñanza Técnica 2 "General José de San Martín".
          </p>
        </div>
        <div class="section-content technique">
          <h2>Escuela Técnica</h2>
          <p>
            En 1994 pasó a ser Escuela Técnica 32 Distrito Escolar 14 "General José de San Martín" hasta la actualidad.
          </p>
        </div>
        <div class="section-content motto">
          <h2>Lema de la ET32</h2>
          <p>
            Somos el azul de nuestros guardapolvos de Técnica; somos el equipo: indestructibles engranajes metálicos
            unidos en eterno movimiento; somos vivos rayos, energía que dan potencia y dinamismo a magna labor, somos el
            volante que rodea y direcciona al objetivo; somos la placa impresa, base que sostiene y que transmite plenas
            conexiones para que todo funcione ¡somos escuela pública y técnic allí donde reside la patria misma... somos
            la 32!
          </p>
        </div>
      </div>
    </div>


    <!--TARJETAS-->
    <div class="cont-card">
      <a href="automotores.html" class="card">
        <div class="face front">
          <img src=".//assets/img/escuela/automotores.png" alt="">
          <h3>Automotores</h3>
        </div>
        <div class="face back">
          <h3>Automotores</h3>
          <p>Es una espcialidad que se focaliza en el estudio y analisis de todo lo referente a los vehiculos
            automotores, desde la mecánica hasta la dinámica de los mismos</p>
          <div class="link">
            ¿Deseas Preguntar Algo?
          </div>
        </div>
      </a>
      <a href="computacion.html" class="card">
        <div class="face front">
          <img src=".//assets/img/escuela/computacion.png" alt="">
          <h3>Computación</h3>
        </div>
        <div class="face back">
          <h3>Computación</h3>
          <p> Es la tecnologia desarrollada para el tratamiento automático de la informacion mediante el uso de
            computadoras </p>
          <div class="link">
            ¿Deseas Preguntar Algo?
          </div>
        </div>
      </a>
      <a href="mecanica.html" class="card">
        <div class="face front">
          <img src=".//assets/img/escuela/mecanica.png" alt="">
          <h3>Mecánica</h3>
        </div>
        <div class="face back">
          <h3>Mecánica</h3>
          <p> Es la ciencia que estudia el movimiento de los cuerpos bajo la accion de las fuerzas participantes.</p>
          <div class="link">
            ¿Deseas Preguntar Algo?
          </div>
        </div>
      </a>
    </div>

    <div class="body">
      <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <div class="carousel">
          <img src="assets/img/escuela/aaa.jpg" alt="img" draggable="false">
          <img src="assets/img/escuela/entrada.jpg" alt="img" draggable="false">
          <img src="assets/img/escuela/escuela.jpg" alt="img" draggable="false">
          <img src="assets/img/escuela/frente.jpg" alt="img" draggable="false">
          <img src="assets/img/escuela/imgE.jpg" alt="img" draggable="false">
        </div>
        <i id="right" class="fa-solid fa-angle-right"></i>
      </div>
    </div>
    

    <!--FOOTER-->
    <footer class="foot">
      <div class="grupo-1">
        <div class="box">
          <figure>
            <a href="#">
              <img src="./assets/img/iconos/logoblanco.png" alt="">
            </a>
          </figure>
        </div>
        <div class="box">
          <h5>Autores:</h5>
          <ul>
            <li>Maria Morales - 6°1 Computacion</li>
            <li>Nicolas Domeq - 6°1 Computacion</li>
            <li>Ignacio Rios Lahore - 6°1 Computacion</li>
            <li>Thristall Guerra - 6°1 Computación</li>
            <li>Ivan Britez - 6°1 Computación</li>
          </ul>
        </div>
        <div class="box">
          <h5>Redes Sociales</h5>
          <div class="connect">
            <a href="https://www.facebook.com/groups/tecnica32/" rel="noopener noreferrer" class="facebook"
              target="_blank" title="Facebook">
              <!--LINK DE FACEBOOK -->
              <i class="fab fa-facebook-f"></i>
              <!--ICONO DE FACEBOOK -->
            </a>
            <a href="https://github.com/Maria3k/Proyecto-PP" rel="noopener noreferrer" class="github" target="_blank"
              title="Github">
              <!--LINK DE GITHUB -->
              <i class="fab fa-github"></i>
              <!--ICONO DE GITHUB -->
            </a>

            <a href="https://www.youtube.com/channel/UCywUijMchnujSg6dVVUKprQ/videos?view_as=subscriber"
              rel="noopener noreferrer" class="youtube" target="_blank" title="Youtube">
              <!--LINK DE YOUTUBE -->
              <i class="fab fa-youtube"></i>
              <!--ICONO DE YOUTUBE -->
            </a>

            <a href="https://www.instagram.com/la_gloriosa_32_escuela_tecnica/?hl=es-la" rel="noopener noreferrer"
              class="instagram" target="_blank" title="Instagram">
              <!--LINK DE INSTAGRAM -->
              <i class="fab fa-instagram"></i>
              <!--ICONO DE INSTAGRAM -->
            </a>
          </div>
        </div>
      </div>

      <div class="grupo-2">
        <small>&copy; 2022 <b>ET32 RESPUESTAS</b> - Todos los derechos reservados.</small>
      </div>
    </footer>

    <script src="https://kit.fontawesome.com/b3b892b65b.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/js/slider.js"></script>

    <script>
      $(".step").click(function () {
        $(this).addClass("active").prevAll().addClass("active");
        $(this).nextAll().removeClass("active");
      });

      $(".step01").click(function () {
        $("#line-progress").css("width", "3%");
        $(".factory").addClass("active").siblings().removeClass("active");
      });

      $(".step02").click(function () {
        $("#line-progress").css("width", "25%");
        $(".act").addClass("active").siblings().removeClass("active");
      });

      $(".step03").click(function () {
        $("#line-progress").css("width", "50%");
        $(".municipal").addClass("active").siblings().removeClass("active");
      });

      $(".step04").click(function () {
        $("#line-progress").css("width", "75%");
        $(".technique").addClass("active").siblings().removeClass("active");
      });

      $(".step05").click(function () {
        $("#line-progress").css("width", "100%");
        $(".motto").addClass("active").siblings().removeClass("active");
      });
    </script>

</body>

</html>