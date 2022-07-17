<?php
include("conexion.php");
session_start();

$sbt = $ajax = $menu = '';

if ($_SESSION) {
  $_SESSION = $con->query("SELECT * FROM usuario WHERE id_usuario = " . $_SESSION["id_usuario"])->fetch_assoc();

  $nAvatar = $_SESSION["nAvatar"];
  $id = $_SESSION["id_usuario"];
  $ajax = '
    $("#number").hide();
    let id = ' . $id . ';
    $.ajax({
         url: "notification.php",
         type: "POST",
         data: { id },
         success: function (n) {
           if (n != 0) {
             $("#number").html(n);
             $("#number").show();
           }
         }
    });
  ';
  $send = $con->query("SELECT * FROM avatar WHERE id_avatar = $nAvatar");
  $col = $send->fetch_assoc();
  $ad = '';



  if ($_SESSION["rol"] == 2) {
    $ad = '<button class="btn btn-danger">Eliminar</button>';
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
  </div>';
  if ($_POST) {
    $query = $con->query("INSERT INTO pregunta(usuario_pregunta, asunto, contenido, fechaPreguntada, respondida, especialidad) VALUES (" . $_SESSION["id_usuario"] . ",'" . $_POST["asunto"] . "','" . $_POST["pregunta"] . "','" . date('Y-m-d') . "',0,3)") or die("Error en el insert --->" . $query . mysqli_error($con));
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
  <title>Especialidad Computación</title>
</head>

<body>
  <nav>
    <a href="index.php" title="Pagina Principal"><img class="img1" src="assets/img/escuela/loguito.png" alt="minilogo.png"></a>
    <?= $menu ?>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="faq">
          <div class="question">
            <button class="btn btn-primary my-3" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta" aria-expanded="false" aria-controls="pregunta">
              Realize su pregunta
            </button>
            <div class="collapse" id="pregunta">
              <div class="card card-body">
                <form id="pregunta-form" method="post">
                  <input id="asunto" class="form-control my-2" type="text" placeholder="Asunto" required>
                  <textarea id="contenido" class="form-control my-2" placeholder="Haga su pregunta" required></textarea>

                  <button class="btn btn-primary" type="submit" name="button" data-bs-toggle="collapse" data-bs-target="#pregunta" aria-expanded="false" aria-controls="pregunta">Enviar</button>
                </form>
              </div>
            </div>

            <div id="ask"></div>
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
    <script src="assets/js/jquery-3.6.0.js"></script>
    <script>
      function menuToggle() {
        const toggleMenu = document.querySelector('.menu');
        toggleMenu.classList.toggle('active')
      }

      $(document).ready(() => {
        <?= $ajax; ?>
        fecthAsks();

        function fecthAsks() {
          $.ajax({
            url: "asks.php",
            type: "POST",
            data: {
              e: 3
            },
            success: function(response) {
              let plantilla = '';
              JSON.parse(response).forEach(ask => {
                plantilla += `
                  <img src="${ask.avatar}" alt="${ask.avatarName}" title="${ask.nombre} ${ask.apellido}" width="50px" height="50px">${ask.nickname} || ${ask.fecha}
  
                  <h5>${ask.asunto}</h5>
                  <p>${ask.contenido}</p>
  
                  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight${ask.id}" aria-controls="offcanvasRight${ask.id}">+</button><?= $ad; ?><br>
  
                  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight${ask.id}" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body" style="overflow:hidden;">
                      <img src="${ask.avatar}" alt="${ask.avatarName}" title="${ask.nombre} ${ask.apellido}" width="50px" height="50px">
                      <h5>${ask.asunto}</h5>
                      <p>${ask.contenido}</p>
                    </div>
                  </div>
                `
              });
              $("#ask").html(plantilla);
            }
          })
        }


        $('#pregunta-form').submit(function(e) {
          const postData = {
            asunto: $('#asunto').val(),
            pregunta: $('#contenido').val()
          };
          $.post('automotores.php', postData, function(response) {
            fecthAsks();
            $('#pregunta-form').trigger('reset');
          });
          e.preventDefault();
        });

      });
    </script>
</body>

</html>