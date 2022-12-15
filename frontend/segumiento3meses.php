<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilosMenu.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <title>Seguimiento</title>
</head>

<body>

    <div class="box1">
        <header class="header">
            <input type="text" class="form-control" id="busqueda" name="busqueda" value="" placeholder="Buscar...">
            <span id="cabecera">Seguimiento 3 meses</span>

        </header>

        <?php
require 'menu/menuInfarto.php';

?>

        <script>
        $(obtener_registros());

        function obtener_registros(paciente) {
            $.ajax({
                    url: 'consultaseguimiento3meses.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        pacientes: paciente
                    },
                })

                .done(function(resultado) {
                    $("#tabla_resultadobus").html(resultado);
                })
        }
        $(document).on('keyup', '#busqueda', function() {
            var valorBusqueda = $(this).val();
            if (valorBusqueda != "") {
                obtener_registros(valorBusqueda);
            } else {
                obtener_registros();
            }
        });
        </script>

        <div class="autoheight">

            <div id="tabla_resultadobus">

            </div>
            <div id="tabla_resultado" class="adaptar"></div>
        </div>
    </div>
    <?php


require 'modals/seguimientoPacienteUnAnio.php';

?>
    <script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>

</body>

</html>