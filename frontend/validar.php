<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <title>Validar acceso</title>
</head>

<body>
    <form action="registrarUsuario" method="POST">

        <div class="form-group" style="width: 40%; margin-left: auto; margin-right: auto;">
            <label style="margin-top: 250px; color: black;">INGRESA LA CLAVE DE ACCESO</label>
            <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                <input name="claveAcceso" type="password" class="form-control" placeholder="Ingresa la clave de acceso"
                    required="required" style="margin-top: 5px;">
            </div>


            <input type="submit" value="Ingresar" name="Ingresar" class="btn btn-info"
                style="width: 200px; margin-top: 30px; float: left; margin-left: 40%;">

    </form>


</body>

</html>