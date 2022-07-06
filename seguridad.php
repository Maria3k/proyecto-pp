<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="assets/js/"></script>
</head>
<body>
    <div id="accordian">
        <ul class="show-dropdown main-navbar">
        <div class="selector-active"><div class="top"></div><div class="bottom"></div></div>
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
          setTimeout("location.href = 'infoGeneral.php';",200);
        }

        function infoPersonal(){
          setTimeout("location.href = 'infoPersonal.php';",200);
        }

        function perfil(){
          setTimeout("location.href = 'perfil.php';",200);
        }
        
       </script>
</body>
</html>