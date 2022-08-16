<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/perfil.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/icons.css">
</head>
<body>
  <div id="accordian">
    <ul class="show-dropdown main-navbar">
      <div class="selector-active" style="top:90px;">
        <div class="top"></div>
        <div class="bottom"></div>
      </div>
      <li>
        <a href="#" onclick="perfil()"><i class="fa fa-tachometer"></i>Inicio</a>
      </li>
      <li>
        <a href="#" onclick="infoPersonal()"><i class="fa fa-address-book"></i>Información Personal</a>
      </li>
      <li class="active">
        <a href="#"><i class="fa fa-clone"></i>Seguridad</a>
      </li>
      <li>
        <a href="#" onclick="infoGeneral()"><i class="fa fa-calendar"></i>Información General</a>
      </li>
    </ul>
  </div>
  <div id="cuadrado">
    <div class="seguridad">
          <h4>Actividad reciente: </h4>
          <div class="segu">
            <p>Se inicio sesion: </p>
            <p>En el dispositivo: </p>
            <p>A la hora: </p>
          </div>
          <h4>Iniciar Sesion: </h4>
          <div class="segu">
            <p>Contraseña: </p>
            <p>Verificar contraseña: </p>
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
              <li>Thristall Guerra - 6°1 Computacion</li>
              <li>Ivan Britez - 6°1 Computacion</li>
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

        function infoGeneral(){
          setTimeout("location.href = 'infoGeneral.php';",400);
        }

        function infoPersonal(){
          setTimeout("location.href = 'infoPersonal.php';",400);
        }

        function perfil(){
          setTimeout("location.href = 'perfil.php';",400);
        }

       </script>
      <script src="https://kit.fontawesome.com/b3b892b65b.js"></script>
      <script src="assets/js/bootstrap.js"></script>
</body>
</html>
