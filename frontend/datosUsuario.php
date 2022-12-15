<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilosMenuNew.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Datos de usuario</title>
</head>

<body>
    <style>
    #link {
        text-decoration: none;
    }
    </style>

    <header class="header">

        <span id="cabecera">HRAEI-GESTIÓN DIGITAL EN SALUD</span>

    </header>
    <div class="gallery">

        <?php
require 'menu/menuPersonal.php';

?>
        <article class="card" id="datosTrabajador">
            <a href="misDatos">


                <hr id="hr1datostrabajador">
                <p>Datos de usuario</p>
                <a id="link" href="misDatos" class="btn btn-success">Datos usuario</a>

            </a>
        </article>

        <article class="card" id="cursosDiplomas">

            <a href="misCursos">


                <hr id="hr1cursosdiplomas">
                <p>Mis cursos</p>
                <a id="link" href="misCursos" class="btn btn-success">Mis cursos</a>

            </a>

        </article>
        <article class="card" id="solicitudCursos">
            <a href="misSolicitudes">
                <hr id="hr3">
                <p>Solicitud de curso</p>
                <a id="link" href="misSolicitudes" class="btn btn-info">Solicitude de curso</a>
            </a>
        </article>
        <article class="card" id="evaluacion">
            <a href="../rh/principal">
                <hr id="hr6">
                <p>Evaluación del Desempeño</p>
                <a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>
            </a>
        </article>
        <!--
<div class="cardio4">

<hr id="hr4">
     <p>ACE</p>
     <a id="link" href="ace.php" class="btn btn-danger">Ver Información</a>

</div>

<div class="cardio5">

<hr id="hr5">
     <p>Angina post infarto</p>
     <a id="link" href="api.php" class="btn btn-primary">Ver Información</a>
 
</div>

<div class="cardio6">

    <hr id="hr6">
     <p>Primer contacto</p>
    
       <a id="link" href="seguros.html" class="btn btn-secondary">Ver Información</a>
  
</div>

<div class="cardio7">

    <hr id="hr7">
     <p>Puerta balón</p>
     <a id="link" href="seguros.html" class="btn btn-dark">Ver Información</a>
   
</div>

<div class="cardio8">

    <hr id="hr8">
     <p>Tiempo isquemia total</p>
     <a id="link" href="seguros.html" class="btn btn-success">Ver Información</a>
     
</div>

<div class="cardio9">

    <hr id="hr9">
     <p>Tiempo puerta aguda</p>
     <a id="link" href="seguros.html" class="btn btn-warning">Ver Información</a>

</div>

<div class="cardio10">

    <hr id="hr10">
     <p>Estrategia ACTP</p>
     <a id="link" href="seguros.html" class="btn btn-danger">Ver Información</a>
</div> 
-->
    </div>

    </div>
</body>

</html>