<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/register.css">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/fecha.css">
</head>
<body class="row align-items-center justify-content-center vh-100">
    <div class="col-sm-6 text-center">
        <div id="row" class="row">
            <div id="izq" class="col-6">
                <img id="img" class="img-fluid" src="assets/img/iconos/logoblanco.png" alt="imagen.png" width="400px" height="400px">
            </div>
            <div id="derecha" class="col-6">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div id="button-box" class="row">
                                <div id="btn" class="btn"></div>
                                <div class="col-6">
                                    <button id="login-btn" type="button" class="toggle-btn" onclick="login()">Login</button>
                                </div>
                                <div class="col-6">
                                    <button id="register-btn" type="button" class="toggle-btn" onclick="register()">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form id="login" class="input-group">
                                <input class="input-field" type="email" name="correo" placeholder="Ingrese su correo electronico" required>
                                <input class="input-field" type="password" name="contraseña" placeholder="Ingrese su contraseña" required>
                                <input class="check-box" type="checkbox" name="" id=""><span>Recordar Contraseña</span>
                                <input class="submit-btn" type="submit" value="Iniciar Sesion">
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form id="register" class="input-group">
                                <div class="container">
                                    <div class="row">
                                        <div id="colImg" class="col">
                                            <img id="imgSeleccionada" class="img-fluid" src="assets/img/iconosUsu/logo1.png" width="75px" height="75px" alt="imagen.png">
                                            <a id="lapiz" data-bs-toggle="collapse" href="#imagenes" role="button" aria-expanded="false" aria-controls="imagenes">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                        </div>
                                        <div class="collapse" id="imagenes">
                                            <div class="col" id="lista">
                                              <img id="1" class="avatar" src="assets/img/iconosUsu/logo1.png" alt="logo1.png" onclick="select(1)" data-bs-toggle="collapse" href="#imagenes" role="button" aria-expanded="false" aria-controls="imagenes">
                                              <img id="2" class="avatar" src="assets/img/iconosUsu/logo2.png" alt="logo2.png" onclick="select(2)" data-bs-toggle="collapse" href="#imagenes" role="button" aria-expanded="false" aria-controls="imagenes">
                                              <img id="3" class="avatar" src="assets/img/iconosUsu/logo3.png" alt="logo3.png" onclick="select(3)" data-bs-toggle="collapse" href="#imagenes" role="button" aria-expanded="false" aria-controls="imagenes">
                                              <img id="4" class="avatar" src="assets/img/iconosUsu/logo4.png" alt="logo4.png" onclick="select(4)" data-bs-toggle="collapse" href="#imagenes" role="button" aria-expanded="false" aria-controls="imagenes">
                                              <img id="5" class="avatar" src="assets/img/iconosUsu/logo5.png" alt="logo5.png" onclick="select(5)" data-bs-toggle="collapse" href="#imagenes" role="button" aria-expanded="false" aria-controls="imagenes">
                                              <img id="6" class="avatar" src="assets/img/iconosUsu/logo6.png" alt="logo6.png" onclick="select(6)" data-bs-toggle="collapse" href="#imagenes" role="button" aria-expanded="false" aria-controls="imagenes">
                                              <img id="7" class="avatar" src="assets/img/iconosUsu/logo7.png" alt="logo7.png" onclick="select(7)" data-bs-toggle="collapse" href="#imagenes" role="button" aria-expanded="false" aria-controls="imagenes">
                                              <img id="8" class="avatar" src="assets/img/iconosUsu/logo8.png" alt="logo8.png" onclick="select(8)" data-bs-toggle="collapse" href="#imagenes" role="button" aria-expanded="false" aria-controls="imagenes">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="input-field" id="nom" type="text" name="nombre" placeholder="Ingrese su nombre" required> 
                                            </div>
                                            <div class="col-6">
                                                <input class="input-field" id="ape" type="text" name="apellido" placeholder="Ingrese su apellido" required>
                                            </div>
                                        </div>
                                        <input class="input-field" type="text" name="nickname" placeholder="Ingrese su nombre de usuario" required>
                                        <input class="input-field" type="email" name="email" placeholder="Ingrese su correo electronico" required>
                                        <input class="input-field" type="email" name="cemail" placeholder="Confirme su correo electronico" required>
                                        <input class="input-field" type="password" name="contraseña" placeholder="Ingrese su contraseña" required>
                                        <input class="input-field" type="password" name="contraseña" placeholder="Confirme su contraseña" required>

                                    </div>
                                </div>

                                <div class="description">
                                    <div class="date">
                                        <div class="input-content one">
                                              <select class="form-select" name="d" id="">
                                                <option value="0" selected disabled>Dia</option>
                                                <?php
                                                  for ($i=1; $i < 32 ; $i++) {
                                                    echo "<option value=$i>$i</option>";
                                                  }
                                                ?>
                                              </select>
                                            </select>
                                        </div>
                                        <div class="input-content two">
                                            <select class="form-select" name="m" id="">
                                              <option value="0" selected disabled>Mes</option>
                                              <?php
                                              $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                              foreach ($meses as $i=>$mes) {
                                                echo "<option value=$i>$mes</option>";
                                              }

                                              ?>
                                            </select>
                                        </div>
                                        <div class="input-content theree">
                                            <select class="form-select" name="a" id="">
                                              <option value="0" selected disabled>Año</option>
                                              <?php
                                                for ($i=1930; $i < date("Y") ; $i++) {
                                                  echo "<option value=$i>$i</option>";
                                                }
                                              ?>
                                            </select>
                                        </div>
                                  </div>
                                <input class="submit-btn" type="submit" value="Registrarse">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://kit.fontawesome.com/b3b892b65b.js"></script>
<script>
    function register() {
        document.getElementById("login").style.marginLeft = "-360px";
        document.getElementById("register").style.right = "100px";
        document.getElementById("btn").style.left = "130px";
        document.getElementById("btn").style.background = "linear-gradient(to left, rgba(53,117,242,1) 18%, rgba(74,128,233,1) 57%, rgba(134,173,247,1) 76%)";
        document.getElementById("imagenes").removeAttribute("style");
        document.getElementById("imagenes").className = "collapsed collapse";
    }
    function login() {
        document.getElementById("login").style.marginLeft = "0px";
        document.getElementById("register").style.right = "-380px";
        document.getElementById("btn").removeAttribute("style");
        document.getElementById("btn").style.right = "130px";
        document.getElementById("btn").style.background = "linear-gradient(to right, rgba(53,117,242,1) 18%, rgba(74,128,233,1) 57%, rgba(134,173,247,1) 76%)";
        document.getElementById("imagenes").style.display = "none";
    }
    function select(n) {
        document.getElementById("imgSeleccionada").setAttribute("src",document.getElementById(n).getAttribute("src"));
    }
</script>
</html>
