<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/fecha.css">
    <link rel="stylesheet" href="assets/css/estilos2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
</head>

<body>
    <div class="container cuerpo">
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn">
                        <div class="form-group">
                            <div class="form-box">
                                <div class="button-box">
                                    <div id="btn"></div>
                                    <button id="login-btn" type="button" class="toggle-btn" onclick="login()">Iniciar sesion</button>
                                    <button id="register-btn" type="button" class="toggle-btn" onclick="register()">Registrar</button>
                                </div>
                            </div>
                        </div>
                        <form id="login" class="myForm text-center" method="post">

                            <i class="fas fa-envelope icono"></i>
                            <input class="input-field" id="emailogin" type="email" name="email" pattern="[a-zA-Z0-9!#$%&'*_+-]([\.]?[a-zA-Z0-9!#$%&'*_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?" placeholder="Correo" required>
                            <i class="fas fa-lock icono"></i>
                            <input class="input-field" id="contralogin" type="password" name="contraseña" pattern="[A-Za-z-0-9]{2,16}" placeholder="Contraseña" required>
                            <div id="error"></div>
                            <div class="form-group">
                                <label>
                                    <input id="check_1" name="check_1" type="checkbox" required><small> Recordar usuario</small></input>
                                </label>
                            </div>
                            <input type="submit" class="butt my-3" value="Iniciar sesion">
                        </form>

                        <form id="register" class="input-group" method="post">
                            <div class="container">
                                <div class="row">
                                    <div id="colImg" class="col text-center">
                                        <input id="imgInput" name="imgInput" type="hidden" value="1">
                                        <img id="imgSeleccionada" class="img-fluid" src="assets/img/iconosUsu/logo1.png" width="75px" height="75px" alt="imagen.png">
                                        <a id="lapiz" data-bs-toggle="collapse" href="#imagenes" role="button" aria-expanded="false" aria-controls="imagenes">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                    </div>
                                    <div class="collapse show text-center" id="imagenes">
                                        <div class="col py-2" id="lista">
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
                                        <div class="input-group text-center">
                                            <input class="input-field text-center col-5 mx-auto" id="nombre" type="text" name="nombre" pattern="[A-Za-z-0-9]{3,16}" placeholder="Nombre" value="tt">
                                            <input class="input-field text-center col-5 mx-auto" id="apellido" type="text" name="apellido" pattern="[A-Za-z-0-9]{3,16}" placeholder="Apellido" value="tt">
                                        </div>
                                        <input class="input-field" id="nickname" type="text" name="nickname" pattern="[A-Za-z-0-9]{3,16}" placeholder="Nombre de usuario" required value="tt">
                                        <div id="errorUsuario"></div>
                                        <input class="input-field" id="email" type="email" name="email" pattern="[a-zA-Z0-9!#$%&'*_+-]([\.]?[a-zA-Z0-9!#$%&'*_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?" placeholder="Correo" required value="tt@gmail.com">
                                        <div id="errorEmail"></div>
                                        <input class="input-field" id="contraseña" type="password" name="contraseña" pattern="[A-Za-z-0-9]{8,16}" placeholder="Contraseña" required value="tt">
                                        <input class="input-field" id="contraconfi" type="password" name="contraconfi" pattern="[A-Za-z-0-9]{8,16}" placeholder="Confirme su contraseña" required value="tt">
                                        <div id="passwordError"></div>
                                        <div id="caracter"></div>

                                    </div>
                                </div>

                                <div class="description">
                                    <div class="date">
                                        <div class="input-content one">
                                            <select class="form-select" name="d" id="dia">
                                                <option value="10" selected>Dia</option>
                                                <?php
                                                for ($i = 1; $i < 32; $i++) {
                                                    echo "<option value=$i>$i</option>";
                                                }
                                                ?>
                                            </select>
                                            </select>
                                        </div>
                                        <div class="input-content two">
                                            <select class="form-select" name="m" id="mes">
                                                <option value="1" selected>Mes</option>
                                                <?php
                                                $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                                                foreach ($meses as $i => $mes) {
                                                    echo "<option value=$i>$mes</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                        <div class="input-content theree">
                                            <select class="form-select" name="a" id="año">
                                                <option value="1900" selected>Año</option>
                                                <?php
                                                for ($i = 1930; $i < date("Y"); $i++) {
                                                    echo "<option value=$i>$i</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input class="submit-btn butt" type="submit" value="Registrarse">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="myRightCtn">
                        <div class="box">
                            <img id="img" class="img-fluid" src="assets/img/iconos/logoblanco.png" alt="imagen.png" width="400px" height="400px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./assets/js/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="https://kit.fontawesome.com/b3b892b65b.js"></script>
<script>
    function register() {
        document.getElementById("login").style.right = "405px";
        document.getElementById("register").style.right = "-30px";
        document.getElementById("btn").style.left = "190px";
        document.getElementById("btn").style.background = "linear-gradient(to left, rgba(40,83,161,1) 35%, rgba(87,147,255,1) 100%)";
        document.getElementById("login-btn").style.color = "gray";
        document.getElementById("register-btn").style.color = "white";
        //document.getElementById("imagenes").removeAttribute("style");
        //document.getElementById("imagenes").className = "collapsed collapse";
    }

    function login() {
        document.getElementById("login").style.right = "0px";
        document.getElementById("register").style.right = "-380px";
        document.getElementById("btn").removeAttribute("style");
        document.getElementById("login-btn").style.color = "white";
        document.getElementById("register-btn").style.color = "gray";
        //document.getElementById("imagenes").style.display = "none";
    }

    function select(n) {
        document.getElementById("imgSeleccionada").setAttribute("src", document.getElementById(n).getAttribute("src"));
        document.getElementById("imgInput").value = n;

    }

    $("#register").submit(form => {
        form.preventDefault();
        registerSend();
    });

    $("#login").submit(form => {
        form.preventDefault();
        loginSend();
    });

    function loginSend() {
        $.ajax({
            url: "login.php",
            type: "POST",
            data: {
                email: $("#emailogin").val(),
                contraseña: $("#contralogin").val()
            },
            success: response => {

                if (response != true) {
                    $("#error").html(JSON.parse(response)[0].error);
                } else {
                    window.location.href = "index.php"
                }
            }
        })
    }

    function registerSend() {
        $.ajax({
            url: "register.php",
            type: "POST",
            data: {
                nombre: $("#nombre").val(),
                apellido: $("#apellido").val(),
                nickname: $("#nickname").val(),
                email: $("#email").val(),
                contraseña: $("#contraseña").val(),
                contraconfi: $("#contraconfi").val(),
                imgInput: $("#imgInput").val(),
                a: $("#año").val(),
                m: $("#mes").val(),
                d: $("#dia").val()
            },
            success: response => {
                console.log(response);
                response.forEach(dato => {
                    document.getElementById(Object.entries(dato)[0][0]).innerHTML = Object.entries(dato)[0][1];

                });
            }
        })
    }
</script>

</html>