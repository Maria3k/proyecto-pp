<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/favicon/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <title>Registrarse</title>
  </head>
  <body>
    <div id="formulario" class="container">
      <div class="row">
        <div id="logo" class="col-4">
          <img src="assets/img/iconos/logoblanco.png" alt="logo" >
        </div>
        <div class="col-8">
          <div id="form" class="row">
            <div class="col-12">
              <h2 style="text-align: center;">REGISTER</h2>
            </div>
            <div class="col-12">
              <form action="register.html" method="post">
                <div class="form-group">
                  <input style="width: 45%;" type="text" name="nombre" placeholder="Nombre" required><input style="width: 45%;" type="text" name="apellido" placeholder="Apellido" required>
                  <input type="text" name="username" placeholder="Nombre de usuario" required>
                </div>
                <div class="form-group">
                  <input type="email" name="email" placeholder="Correo electronico" required>
                  <input type="text" name="cemail" placeholder="Correo electronico nuevamente" required>
                </div>
                <div class="row form-group">
                  <div class="col-sm-4">
                      <div class="input-group date" id="datepicker">
                          <input type="text" class="form-control" placeholder="Fecha de Nacimiento">
                          <span class="input-group-append">
                              <span class="input-group-text bg-white">
                                  <i class="fa fa-calendar"></i>
                              </span>
                          </span>
                      </div>
                  </div>
              </div>
                <div class="form-group">
                  <input type="password" name="contraseña" placeholder="Ingrese su contraseña" required>
                  <input type="password" name="contraseña" placeholder="Ingrese su contraseña nuevamente" required>
                </div>
                <div class="form-group">
                  <input id="submit" type="submit" name="submit" style="width: auto;">        
                </div> 
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
     <script type="text/javascript">
      $(function() {
          $('#datepicker').datepicker();
      });
  </script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>
