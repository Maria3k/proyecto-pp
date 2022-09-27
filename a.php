<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form onsubmit="event.preventDefault();enviar(event)">
        <input type="text" name="Texto">
        <input type="submit" value="Enviar">
    </form>
</body>
<script>
    const enviar = (evt) => {
        console.log(evt);
    }
</script>

</html>