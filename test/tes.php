<!DOCTYPE html>
<html>
<head>
    <title>Login Form Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn">
                      <div class="form-group text-center">
                          <div class="form-box">
                              <div class="button-box">
                                  <button id="login-btn" type="button" class="toggle-btn" onclick="login()">
                                    <div id="btn"><p></p></div>
                                  </button>
                                  <button id="register-btn" type="button" class="toggle-btn" onclick="register()">
                                    Registrar
                                  </button>
                              </div>
                          </div>
                      </div>
                      <form class="myForm text-center">
                            <header>Create new account</header>
                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <input class="myInput" type="text" placeholder="Username" id="username" required>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-envelope"></i>
                                <input class="myInput" placeholder="Email" type="text" id="email" required>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" type="password" id="password" placeholder="Password" required>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input id="check_1" name="check_1"  type="checkbox" required><small> I read and agree to Terms & Conditions</small></input>
                                    <div class="invalid-feedback">You must check the box.</div>
                                </label>
                            </div>

                            <input type="submit" class="butt" value="CREATE ACCOUNT">

                        </form>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="myRightCtn">
                            <div class="box"><header>Hello World!</header>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam.</p>
                                <input type="button" class="butt_out" value="Learn More"/>
                            </div>

                    </div>
                </div>
            </div>
        </div>
</div>
<script type="text/javascript">
  function login(){
    document.getElementById("login-btn").innerHTML = "Iniciar sesion";
    document.getElementById("register-btn").innerHTML = `<div id="btn"><p>Registrar</p></div>`
  }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
