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
  <title>Especialidad Automotores</title>
</head>

<body>
  <nav>
    <a href="index.php" title="Pagina Principal"><img class="img1" src="assets/img/escuela/loguito.png" alt="minilogo.png"></a>
    <?= $menu ?>
  </nav>
  <div class="container">
    <div class="row">
      <div class="question col">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Realize su pregunta
        </button>
        <div class="collapse" id="collapseExample">
          <div class="card card-body">
            <form action="">
              <input type="text" class="form-control" placeholder="Asunto"> <br>
              <textarea class="form-control" cols="40" rows="10" placeholder="Haga su pregunta"></textarea><br>
              <input type="submit" class="btn btn-primary">
            </form>
          </div>
        </div>
        <div class="question2">
          <h3>Asunto...</h3>
          <img src="assets/img/iconosUsu/logo1.png" width="50px" height="50px"> Nombre usuario || Fecha de la pregunta
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum esse nostrum laboriosam aut reiciendis nesciunt laudantium, itaque suscipit unde expedita beatae labore officia accusamus velit hic. Cum ea repudiandae ducimus.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate alias, maxime repellat voluptatem praesentium sunt eos repellendus dignissimos, id aspernatur iusto! Fuga distinctio asperiores voluptatem nobis sit atque aspernatur aut! </p>
          <div class="container">
            <div class="row">
              <div class="col align-content-end ml-auto">
                <button class="btn btn-primary " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-comment-dots"></i></button>
              </div>
            </div>
          </div>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <h6>Pregunta:</h6>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque provident, culpa ducimus magni, libero repellat suscipit quo dolores eveniet doloribus mollitia ea quae labore neque ab laboriosam soluta, corporis sit. <br>
              <textarea cols="40" rows="5" placeholder="Dejar un comentario"> </textarea>
            </div>
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