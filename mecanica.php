<?php
include("conexion.php");
session_start();

$sbt = $menu = $ad = '';
$ajax = '-1';


if ($_SESSION) {
  $_SESSION = $con->query("SELECT * FROM usuario WHERE id_usuario = " . $_SESSION["id_usuario"])->fetch_assoc();

  $nAvatar = $_SESSION["nAvatar"];
  $ajax = $_SESSION["id_usuario"];

  $send = $con->query("SELECT * FROM avatar WHERE id_avatar = $nAvatar");
  $col = $send->fetch_assoc();

  if ($_SESSION["rol"] == 2) {
    $ad = '<button class="deleteAsk btn btn-danger" value="${ask.id}">Eliminar</button>';
  }

  $menu = '
    <div class="action" >
      <div class="profile" onclick="menuToggle()">
        <img src="' . $col["rutaArchivo"] . '" width="30px" height="30px" alt="' . $col["nombreArchivo"] . '">
      </div>
      <div class="menu">
        <ul>
          <a href="perfil.php"><li id="primero"><i class="fa-solid fa-user"></i>Perfil</li></a>
          <a href="logout.php"><li><i class="fa-solid fa-arrow-right-from-bracket"></i>Cerrar Sesion</li></a>
        </ul>
      </div>
    </div>
    <div class="icon-wrapper" data-numbrer="1">
      <i class="bi bi-bell-fill" id="bell-icon"></i>
      <div id="number"></div>
    </div>
  ';
  if ($_POST) {
    $query = $con->query("INSERT INTO pregunta(usuario_pregunta, asunto, contenido, fechaPreguntada, respondida, especialidad) VALUES (" . $_SESSION["id_usuario"] . ",'" . $_POST["asunto"] . "','" . $_POST["pregunta"] . "','" . date('Y-m-d') . "',0,2)") or die("Error en el insert --->" . $query . mysqli_error($con));
  }
} else {
  $menu = '<a class="btn-nav" href="register.php">Register</a><a class="btn-nav" href="login.php">Iniciar Sesion</a>';
  $sbt = "onclick=window.location.href='./login.php';";

  if ($_POST) {
    header("Location:login.php");
  }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/img/favicon/favicon.png">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/index.css">
  <link rel="stylesheet" href="assets/css/icons.css">
  <link rel="stylesheet" href="assets/css/mi-carousel.css">
  <link rel="stylesheet" href="assets/css/especialidades.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
  <style media="screen">
    img {
      border-radius: 50%;
    }

    #pregunta {
      margin: 10px;
    }
  </style>
  <title>Especialidad Mecanica</title>
</head>

<body>
  <nav>
    <a href="index.php" title="Pagina Principal"><img class="img1" src="assets/img/escuela/loguito.png" alt="minilogo.png"></a>
    <?= $menu ?>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="input-group">
          <input type="text" class="form-control" id="search" placeholder="Busqueda de preguntas" aria-describedby="searchBtn">
          <button id="searchBtn" class="btn btn-primary input-group-text"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div class="faq">
          <div class="question">
            <button class="btn btn-primary my-3" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta" aria-expanded="false" aria-controls="pregunta">
              Realize su pregunta
            </button>
            <div class="collapse" id="pregunta">
              <div class="card card-body">

                <form id="ask-form">
                  <input id="asunto" class="form-control my-2" type="text" placeholder="Asunto" required>
                  <textarea id="contenido" class="form-control my-2" placeholder="Haga su pregunta" required></textarea>
                  <button class="btn btn-primary" <?= $sbt; ?> type="submit" data-bs-toggle="collapse" data-bs-target="#pregunta" aria-expanded="false" aria-controls="pregunta">Enviar</button>
                </form>

              </div>
            </div>
            <div id="ask"></div>
            <div id="pages"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div class="row">
      <div class="col l6">
        <h5>Contacto</h5>
        <ul>
          <li>Email DOE: ofdealumnos32@gmail.com</li>
          <li>Teléfonos: 4551-9121 4555-4026/4034</li>
          <li>Dirección: Teodoro García 3899, C1427ECG CABA</li>
          <li>
            Autores:
            <ul>
              <li>Maria Morales - 6°1 Computacion</li>
              <li>Nicolas Domeq - 6°1 Computacion</li>
              <li>Ignacio Rios Lahore - 6°1 Computacion</li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="col l6">
        <div class="wrapper">
          <div class="connect">
            <a href="https://www.facebook.com/groups/tecnica32/" rel="noopener noreferrer" class="facebook" target="_blank" title="Facebook">
              <!--LINK DE FACEBOOK -->
              <i class="fab fa-facebook-f"></i>
              <!--ICONO DE FACEBOOK -->
            </a>

            <a href="https://github.com/Maria3k/Proyecto-PP" rel="noopener noreferrer" class="github" target="_blank" title="Github">
              <!--LINK DE GITHUB -->
              <i class="fab fa-github"></i>
              <!--ICONO DE GITHUB -->
            </a>

            <a href="https://www.youtube.com/channel/UCywUijMchnujSg6dVVUKprQ/videos?view_as=subscriber" rel="noopener noreferrer" class="youtube" target="_blank" title="Youtube">
              <!--LINK DE YOUTUBE -->
              <i class="fab fa-youtube"></i>
              <!--ICONO DE YOUTUBE -->
            </a>
            <a href="https://www.instagram.com/la.gloriosa.32/?hl=es-la" rel="noopener noreferrer" class="instagram" target="_blank" title="Instagram">
              <!--LINK DE INSTAGRAM -->
              <i class="fab fa-instagram"></i>
              <!--ICONO DE INSTAGRAM -->
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="assets/js/bootstrap.js"></script>
  <script src="https://kit.fontawesome.com/b3b892b65b.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="assets/js/especialidades.js"></script>
  <script>
    function menuToggle() {
      const toggleMenu = document.querySelector('.menu');
      toggleMenu.classList.toggle('active')
    }

    $(document).ready(() => {

      window.localStorage.setItem("page", 1)

      fecthAsks(2, 1);

      $(document).on("click", "#searchBtn", () => searchAsks($("#search").val(), 2));

      $(document).on("click", ".page-link", (e) => fecthAsks(2, e.target.innerHTML))

      $(document).on("click", ".submitRta", submitRta(<?= $_SESSION ? 1 : 0 ?>))

      $("#ask-form").submit(fromA => {
        fromA.preventDefault();
        submitAsk(2)
      })

      $(document).on("click", ".deleteAsk", () => {
        postData = {
          id: $(this).val()
        };
        $.post('deleteAsk.php', postData, response => {
          notificacion();
          fecthAsks(2, 1);
        });
      })
    });
  </script>
</body>

</html>