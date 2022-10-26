<?php
include("conexion.php");
session_start();

$menu = '';

if ($_SESSION) {
  $menu = '<a class="btn-nav" href="Perfil.php">Perfil</a>';
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
  <link rel="icon" href="assets/img/favicon/favicon.png">
  <link rel="stylesheet" href="assets/css/index.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/icons.css">
  <link rel="stylesheet" href="assets/css/mi-carousel.css">
  <link rel="stylesheet" href="assets/css/especialidades.css">
  <link rel="stylesheet" href="assets/css/barra.css">
  <link rel="stylesheet" href="assets/css/pregunta.css">
  <link rel="stylesheet" href="assets/css/tarjeta.css">
  <title>Especialidad Computación</title>
</head>

<body>
  <nav>
    <a href="index.php" title="Pagina Principal"><img class="img1" src="assets/img/escuela/loguito.png" alt="minilogo.png"></a>
    <?= $menu ?>
    <div id="Barra">
      <div style="max-width:400px;margin:auto">
        <div class="input-icons">
          <i class="fa-solid fa-magnifying-glass" style="margin-top:12px;margin-left:395px;"></i>
          <input class="input-field" type="text" placeholder="Busqueda de preguntas">
        </div>
      </div>
    </div>
  </nav>

  <div class="container-sm text-center">
        <div class="row justify-content-center">
            <div class="cuadro">
                <div id="texto">
                    Para hacer una pregunta haga click en el boton
                </div>
                <button class="b" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample" style="width: 32px;">
                    +
                </button>
            </div>
            <div class="collapse" id="collapseExample" style="width: 726px">
                <div class="card card-body">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here"
                            id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Asunto</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                        <label for="floatingTextarea2">Contenido</label>
                    </div>
                    <br>
                    <div class="col text-end">
                        <input class="b mx-auto" type="submit" value="Enviar" id="botn">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tarjeta">
        <h5>Tengo una duda de Programacion</h5>
        <img src="assets/img/iconosUsu/logo1.png" alt="" class="icon">
        <div class="text">
            <h6>Nombre de usuario</h6> 
        </div>
        <div class="text2">
            <p>Fecha de la pregunta</p>
        </div>
        <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et aliquam quis numquam at hic architecto odio dolor laborum corporis sunt. Dignissimos reprehenderit officiis cum sequi eveniet, perferendis quos voluptatum earum?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque quidem autem is</p>
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="border-radius: 30px">Responder</button>
        
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Comentarios</h5>
            </div>
            <div class="offcanvas-body">
                <h5>Tengo una duda de programacion</h5>
                <img src="assets/img/iconosUsu/logo1.png" alt="" class="icon">
                <div class="text">
                    <h6>Nombre de usuario</h6> 
                </div>
                <div class="text2">
                    <p>Fecha de la pregunta</p>
                </div>
                <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et aliquam quis numquam at hic architecto odio dolor laborum corporis sunt. Dignissimos reprehenderit officiis cum sequi eveniet, perferendis quos voluptatum earum?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque quidem autem is</p>
                <div class="newRta">
                    <img src="assets/img/iconosUsu/logo2.png" alt="" class="iconSecun">
                    <form action="">
                        <textarea name="" id="" cols="37" rows="3"  placeholder="Dejar un comentario..." ></textarea>
                        <input type="submit" id="enviarr"> 
                    </form>
                </div>
                <div class="rta1">
                    <img src="assets/img/iconosUsu/logo1.png" alt="" class="icon">
                    <div class="text">
                        <h6>Nombre de usuario</h6> 
                    </div>
                    <div class="text2">
                        <p>Fecha de la pregunta</p>
                    </div>
                    <p id="rtaDerta">No se jajaj chupala</p>
                    <a class="rta3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Contestar...
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div class="newRta2">
                                <img src="assets/img/iconosUsu/logo2.png" alt="" class="iconSecun">
                                <form action="">
                                    <textarea name="" id="" cols="34" rows="3"  placeholder="Dejar un comentario..." ></textarea>
                                    <input type="submit" id="enviarrr"> 
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="linea"></div>
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
            <a href="https://www.instagram.com/la_gloriosa_32_escuela_tecnica/?hl=es-la" rel="noopener noreferrer" class="instagram" target="_blank" title="Instagram">
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
</body>

</html>