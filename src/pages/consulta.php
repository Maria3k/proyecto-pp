<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de contacto</title>
    <link rel="favicon" href="../../public/logo192.png" />

</head>
<style>
    /* Importación de fuentes de google fonts */ 
@import url(https://fonts.googleapis.com/css?family=Noto+Sans);


body{
  height: 100%; 
  font-family: 'Noto Sans', sans-serif;
  background-color: rgba(40, 83, 161, 1); 
}


.contact_form{  
  width: 460px; 
  height: auto;
  margin: 80px auto;
  border-radius: 10px;  
  padding-top: 30px;
  padding-bottom: 20px;  
  background-color: #fbfbfb; 
  padding-left: 30px; 
}


input{
  background-color: #fbfbfb; 
  width: 408px; 
  height: 40px; 
  border-radius: 5px;  
  border-style: solid; 
  border-width: 1px; 
  border-color: rgba(40, 83, 161, 1); 
  margin-top: 10px;  
  padding-left: 10px;
  margin-bottom: 20px; 
}


textarea{
  background-color: #fbfbfb; 
  width: 405px; 
  height: 150px; 
  border-radius: 5px;  
  border-style: solid; 
  border-width: 1px; 
  border-color: rgba(40, 83, 161, 1); 
  margin-top: 10px;  
  padding-left: 10px;
  margin-bottom: 20px; 
  padding-top: 15px; 
}


button{
  height: 45px; 
  padding-left: 5px;
  padding-right: 5px;   
  margin-bottom: 20px; 
  margin-top: 10px;   
  text-transform: uppercase;
  background: linear-gradient(140deg, rgba(40, 83, 161, 1) 35%, rgba(87, 147, 255, 1) 100%);
  border-style: solid; 
  border-radius: 10px;  
  width: 420px;   
  cursor: pointer;
  border: none;
}


button p{
  color: #fff; 
}


h1{
  font-size: 39px;  
  text-align: letf; 
  padding-bottom: 20px; 
  color: rgba(40, 83, 161, 1);
}


h3{
  font-size: 16px; 
  padding-bottom: 30px;
  color: rgba(40, 83, 161, 1);   
}


p{
  font-size: 14px; 
  color: #0e0e0e; 
}


::-webkit-input-placeholder {
 color: #a8a8a8;
}


::-webkit-textarea-placeholder {
 color: #a8a8a8;
}


.formulario input:focus{
  outline:0;
  border: 1px solid rgba(87, 147, 255, 1);
}


.formulario textarea:focus{
  outline:0;
  border: 1px solid rgba(87, 147, 255, 1);
}

</style>
<body>

    <!-- formulario de contacto en html y css -->

    <div class="contact_form">

      <div class="formulario">
        <h1>Formulario de contacto</h1>
        <h3>Escríbenos acerca de algún incoveniente y en breve nos pondremos en contacto contigo</h3>

        <form action="https://formsubmit.co/maria3kmorales05@gmail.com" method="POST" >

          <input type="email" name="email" id="email" required placeholder="Escribe tu Email" required>
          <input type="text" name="asunto" id="assunto" required placeholder="Escribe un asunto" required>
          <textarea name="mensaje" class="texto_mensaje" id="mensaje" required placeholder="Deja aquí tu comentario..." required></textarea>

          <button type="submit" id="enviar">
              <p>Enviar</p>
          </button>

          <input type="hidden" name="_next" value="http://localhost:3000">
          <input type="hidden" name="_captcha" value="false">
        </form>
      </div>
    </div>

</body>

</html>