<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/fecha.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #fbf3ff;
        }

        .container {
            position: absolute;
            max-width: 800px;
            margin: auto;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .myRightCtn {
            position: relative;
            background-image: linear-gradient(180deg, rgba(40, 83, 161, 1) 35%, rgba(87, 147, 255, 1) 100%);
            border-radius: 25px;
            height: 100%;
            padding: 25px;
            color: rgb(192, 192, 192);
            font-size: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .myLeftCtn {
            position: relative;
            background: #fff;
            border-radius: 25px;
            height: 100%;
            padding: 25px;
            padding-left: 50px;
        }

        .myLeftCtn header {
            color: rgb(40, 83, 161);
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .row {
            height: 100%;
        }

        .myCard {
            position: relative;
            background: #fff;
            border-radius: 25px;
            -webkit-box-shadow: 0px 10px 40px -10px rgba(0, 0, 0, 0.7);
            -moz-box-shadow: 0px 10px 40px -10px rgba(0, 0, 0, 0.7);
            box-shadow: 0px 10px 40px -10px rgba(0, 0, 0, 0.7);
        }

        .myRightCtn header {
            color: #fff;
            font-size: 44px;
        }

        .box {
            position: relative;
            margin: 20px;
            margin-bottom: 100px;
        }

        .myLeftCtn .myInput {
            width: 230px;
            border-radius: 25px;
            padding: 10px;
            padding-left: 50px;
            border: none;
            -webkit-box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
            -moz-box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
            box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
        }

        .myLeftCtn .myInput:focus {
            outline: none;
        }

        .myForm {
            position: relative;
            margin-top: 50px;
            transition: .5s;
        }

        .myLeftCtn .butt {
            background: linear-gradient(90deg, rgba(40, 83, 161, 1) 35%, rgba(87, 147, 255, 1) 100%);
            color: #fff;
            width: 230px;
            border: none;
            border-radius: 25px;
            padding: 10px;
            -webkit-box-shadow: 0px 10px 41px -11px rgba(0, 0, 0, 0.7);
            -moz-box-shadow: 0px 10px 41px -11px rgba(0, 0, 0, 0.7);
            box-shadow: 0px 10px 41px -11px rgba(0, 0, 0, 0.7);
        }

        .myLeftCtn .butt:hover {
            background: linear-gradient(180deg, rgba(40, 83, 161, 1) 35%, rgba(87, 147, 255, 1) 100%);
        }

        .myLeftCtn .butt:focus {
            outline: none;
        }

        .myLeftCtn .fas {
            color: rgb(40, 83, 161);
        }

        .butt_out {
            background: transparent;
            color: #fff;
            width: 120px;
            border: 2px solid#fff;
            border-radius: 25px;
            padding: 10px;
            -webkit-box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
            -moz-box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
            box-shadow: 0px 10px 49px -14px rgba(0, 0, 0, 0.7);
        }

        .butt_out:hover {
            border: 2px solid#eecbff;
        }

        .butt_out:focus {
            outline: none;
        }

        .toggle-btn:focus {
            outline: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn">
                        <div class="form-group">
                            <div class="form-box">
                                <div class="button-box">
                                    <div id="btn" class="btn"></div>
                                    <button id="login-btn" type="button" class="toggle-btn" onclick="login()">Iniciar sesion</button>
                                    <button id="register-btn" type="button" class="toggle-btn" onclick="register()">Registrar</button>
                                </div>
                            </div>
                        </div>
                        <form id="login" class="myForm text-center">

                            <i class="fas fa-envelope icono"></i>
                            <input class="input-field" type="email" name="correo" placeholder="Correo" required>
                            <i class="fas fa-lock icono"></i>
                            <input class="input-field" type="password" name="contraseña" placeholder="Contraseña" required>
                            <div class="form-group">
                                <label>
                                    <input id="check_1" name="check_1" type="checkbox" required><small> Recordar
                                        usuario</small></input>
                                </label>
                            </div>
                            <input type="submit" class="butt" value="Iniciar sesion">
                        </form>
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
                                        <div class="input-group">
                                            <input class="form-control input-field" id="nombre" name="nombre" placeholder="Nombre">
                                            <input type="text" class="form-control input-field" id="apellido" name="apellido" placeholder="Apellido">
                                        </div>
                                        <input class="input-field" type="text" name="nickname" placeholder="Nombre de usuario" required>
                                        <input class="input-field" type="email" name="email" placeholder="Correo" required>
                                        <input class="input-field" type="password" name="contraseña" placeholder="Contraseña" required>
                                        <input class="input-field" type="password" name="contraseña" placeholder="Confirme su contraseña" required>
                                    </div>
                                </div>

                                <div class="description">
                                    <div class="date">
                                        <div class="input-content one">
                                            <select class="form-select" name="d" id="">
                                                <option value="0" selected disabled>Dia</option>
                                                <option value=1>1</option>
                                                <option value=2>2</option>
                                                <option value=3>3</option>
                                                <option value=4>4</option>
                                                <option value=5>5</option>
                                                <option value=6>6</option>
                                                <option value=7>7</option>
                                                <option value=8>8</option>
                                                <option value=9>9</option>
                                                <option value=10>10</option>
                                                <option value=11>11</option>
                                                <option value=12>12</option>
                                                <option value=13>13</option>
                                                <option value=14>14</option>
                                                <option value=15>15</option>
                                                <option value=16>16</option>
                                                <option value=17>17</option>
                                                <option value=18>18</option>
                                                <option value=19>19</option>
                                                <option value=20>20</option>
                                                <option value=21>21</option>
                                                <option value=22>22</option>
                                                <option value=23>23</option>
                                                <option value=24>24</option>
                                                <option value=25>25</option>
                                                <option value=26>26</option>
                                                <option value=27>27</option>
                                                <option value=28>28</option>
                                                <option value=29>29</option>
                                                <option value=30>30</option>
                                                <option value=31>31</option>
                                            </select>
                                            </select>
                                        </div>
                                        <div class="input-content two">
                                            <select class="form-select" name="m" id="">
                                                <option value="0" selected disabled>Mes</option>
                                                <option value=0>Enero</option>
                                                <option value=1>Febrero</option>
                                                <option value=2>Marzo</option>
                                                <option value=3>Abril</option>
                                                <option value=4>Mayo</option>
                                                <option value=5>Junio</option>
                                                <option value=6>Julio</option>
                                                <option value=7>Agosto</option>
                                                <option value=8>Septiembre</option>
                                                <option value=9>Octubre</option>
                                                <option value=10>Noviembre</option>
                                                <option value=11>Diciembre</option>
                                            </select>
                                        </div>
                                        <div class="input-content theree">
                                            <select class="form-select" name="a" id="">
                                                <option value="0" selected disabled>Año</option>
                                                <option value=1930>1930</option>
                                                <option value=1931>1931</option>
                                                <option value=1932>1932</option>
                                                <option value=1933>1933</option>
                                                <option value=1934>1934</option>
                                                <option value=1935>1935</option>
                                                <option value=1936>1936</option>
                                                <option value=1937>1937</option>
                                                <option value=1938>1938</option>
                                                <option value=1939>1939</option>
                                                <option value=1940>1940</option>
                                                <option value=1941>1941</option>
                                                <option value=1942>1942</option>
                                                <option value=1943>1943</option>
                                                <option value=1944>1944</option>
                                                <option value=1945>1945</option>
                                                <option value=1946>1946</option>
                                                <option value=1947>1947</option>
                                                <option value=1948>1948</option>
                                                <option value=1949>1949</option>
                                                <option value=1950>1950</option>
                                                <option value=1951>1951</option>
                                                <option value=1952>1952</option>
                                                <option value=1953>1953</option>
                                                <option value=1954>1954</option>
                                                <option value=1955>1955</option>
                                                <option value=1956>1956</option>
                                                <option value=1957>1957</option>
                                                <option value=1958>1958</option>
                                                <option value=1959>1959</option>
                                                <option value=1960>1960</option>
                                                <option value=1961>1961</option>
                                                <option value=1962>1962</option>
                                                <option value=1963>1963</option>
                                                <option value=1964>1964</option>
                                                <option value=1965>1965</option>
                                                <option value=1966>1966</option>
                                                <option value=1967>1967</option>
                                                <option value=1968>1968</option>
                                                <option value=1969>1969</option>
                                                <option value=1970>1970</option>
                                                <option value=1971>1971</option>
                                                <option value=1972>1972</option>
                                                <option value=1973>1973</option>
                                                <option value=1974>1974</option>
                                                <option value=1975>1975</option>
                                                <option value=1976>1976</option>
                                                <option value=1977>1977</option>
                                                <option value=1978>1978</option>
                                                <option value=1979>1979</option>
                                                <option value=1980>1980</option>
                                                <option value=1981>1981</option>
                                                <option value=1982>1982</option>
                                                <option value=1983>1983</option>
                                                <option value=1984>1984</option>
                                                <option value=1985>1985</option>
                                                <option value=1986>1986</option>
                                                <option value=1987>1987</option>
                                                <option value=1988>1988</option>
                                                <option value=1989>1989</option>
                                                <option value=1990>1990</option>
                                                <option value=1991>1991</option>
                                                <option value=1992>1992</option>
                                                <option value=1993>1993</option>
                                                <option value=1994>1994</option>
                                                <option value=1995>1995</option>
                                                <option value=1996>1996</option>
                                                <option value=1997>1997</option>
                                                <option value=1998>1998</option>
                                                <option value=1999>1999</option>
                                                <option value=2000>2000</option>
                                                <option value=2001>2001</option>
                                                <option value=2002>2002</option>
                                                <option value=2003>2003</option>
                                                <option value=2004>2004</option>
                                                <option value=2005>2005</option>
                                                <option value=2006>2006</option>
                                                <option value=2007>2007</option>
                                                <option value=2008>2008</option>
                                                <option value=2009>2009</option>
                                                <option value=2010>2010</option>
                                                <option value=2011>2011</option>
                                                <option value=2012>2012</option>
                                                <option value=2013>2013</option>
                                                <option value=2014>2014</option>
                                                <option value=2015>2015</option>
                                                <option value=2016>2016</option>
                                                <option value=2017>2017</option>
                                                <option value=2018>2018</option>
                                                <option value=2019>2019</option>
                                                <option value=2020>2020</option>
                                                <option value=2021>2021</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input class="submit-btn" type="submit" value="Registrarse">
                        </form>
                    </div>

                </div>
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
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    function register() {
        document.getElementById("login").style.right = "360px";
        document.getElementById("register").style.right = "-30px";
        document.getElementById("btn").style.left = "132px";
        document.getElementById("btn").style.background = "linear-gradient(to left, rgba(53,117,242,1) 18%, rgba(74,128,233,1) 57%, rgba(134,173,247,1) 76%)";
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
    }
</script>

</html>