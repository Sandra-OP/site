<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilosMenuNew.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <title>Document</title>
</head>

<body>

    <div class="box1">
        <header>
            <i class="fa fa-heartbeat fa-2x" id="corazon"></i>
            <span id="cabecera">Datos Personales</span>
            <i class="fa fa-heartbeat fa-2x" id="corazon"></i>
        </header>
        <?php
require 'menu/menuPersonal.php';

?>
        <div class="parent">
            <div class="datosTrabajador">

                <hr id="hr1">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre del curso</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre del curso">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Subir documento</label>
                        <input type="file" id="exampleInputFile">

                    </div>

                    <button type="submit">Submit</button>

                </form>

            </div>

            <div class="datosTrabajador">

                <hr id="hr1">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre del curso</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre del curso">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Subir documento</label>
                        <input type="file" id="exampleInputFile">

                    </div>

                    <button type="submit">Submit</button>

                </form>

            </div>
            <div class="datosTrabajador">

                <hr id="hr1">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre del curso</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre del curso">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Subir documento</label>
                        <input type="file" id="exampleInputFile">

                    </div>

                    <button type="submit">Submit</button>

                </form>

            </div>
            <script>
            $(obtener_registros());

            function obtener_registros(alumno) {
                $.ajax({
                        url: 'consultaCursos.php',
                        type: 'POST',
                        dataType: 'html',
                        data: {
                            alumnos: alumno
                        },
                    })

                    .done(function(resultado) {
                        $("#tabla_resultado").html(resultado);
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
            <main>
                <style>
                main {
                    top: 40px;
                    left: 10px;

                    transition: all 300ms;
                    box-shadow: 0 0 10px #235B4E;
                    width: 100%;
                    height: 100%;
                }

                h3 {
                    color: #06477B;
                    text-align: center;

                }

                #tabla_resultado {
                    overflow-x: scroll;
                    font-size: 12px;
                    width: 100%;
                    height: 100%;
                }
                </style>
                <h3>Mis cursos</h3>
                <div id="tabla_resultado">

                </div>
            </main>



        </div>
</body>

</html>