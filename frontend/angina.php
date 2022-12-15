<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilosMenuNew.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <style>
    a {
        text-decoration: none;
    }

    P {
        font-size: 13px;
    }
    </style>

    <header class="header">

        <span id="cabecera">HRAEI</span>

    </header>




    <div class="gallery">

        <?php
    if(isset($_SESSION['usuarioAdmin'])){

require 'menu/menuPrincipal.php';

?>
        <article class="card" id="anginainestable">
            <a href="anginainestable">
                <hr id="hr3">
                <p>Angina inestable</p>
                <a id="link" href="anginainestable" class="btn btn-info">Ver Información</a>

            </a>
        </article>

        <article class="card" id="anginaestable">
            <a href="anginacronicaestable">
                <hr id="hr4">
                <p>Angina Cronica Estable</p>
                <a id="link" href="anginacronicaestable" class="btn btn-danger">Ver Información</a>

            </a>
        </article>

        <article class="card" id="anginapostinfarto">
            <a href="anginapostinfarto">
                <hr id="hr5">
                <p>Angina Post Infarto</p>
                <a id="link" href="anginapostinfarto" class="btn btn-primary">Ver Información</a>

            </a>
        </article>
        <article class="card" id="anginaprinzmetal">
            <a href="anginaprinzmetal">
                <hr id="hr5">
                <p>Angina de prinzmetal</p>
                <a id="link" href="anginaprinzmetal" class="btn btn-primary">Ver Información</a>

            </a>
        </article>
        <?php

    }else if(isset($_SESSION['usuarioMedico'])){

require 'menu/menuMedico.php';

?>
        <article class="card" id="anginainestable">

            <hr id="hr3">
            <p>Angina inestable</p>
            <a id="link" href="anginainsetable" class="btn btn-info">Ver Información</a>

        </article>

        <article class="card" id="anginaestable">

            <hr id="hr4">
            <p>Angina Cronica Estable</p>
            <a id="link" href="anginacronicaestable" class="btn btn-danger">Ver Información</a>

        </article>

        <article class="card" id="anginapostinfarto">

            <hr id="hr5">
            <p>Angina Post Infarto</p>
            <a id="link" href="anginapostinfarto" class="btn btn-primary">Ver Información</a>

        </article>
        <article class="card" id="anginaprinzmetal">

            <hr id="hr5">
            <p>Angina de prinzmetal</p>
            <a id="link" href="anginaprinzmetal" class="btn btn-primary">Ver Información</a>

        </article>
        <!--
<div class="cardio6">

    <hr id="hr6">
     <p>Primer contacto</p>
    
       <a id="link" href="#" class="btn btn-secondary">Ver Información</a>
  
</div>

<div class="cardio7">

    <hr id="hr7">
     <p>Puerta balón</p>
     <a id="link" href="#" class="btn btn-dark">Ver Información</a>
   
</div>

<div class="cardio8">

    <hr id="hr8">
     <p>Tiempo isquemia total</p>
     <a id="link" href="#" class="btn btn-success">Ver Información</a>
     
</div>

<div class="cardio9">

    <hr id="hr9">
     <p>Tiempo puerta aguda</p>
     <a id="link" href="#" class="btn btn-warning">Ver Información</a>

</div>

<div class="cardio10">

    <hr id="hr10">
     <p>Estrategia ACTP</p>
     <a id="link" href="#" class="btn btn-danger">Ver Información</a>
</div> 
-->
        <?php
       }
    
       ?>
    </div>

</body>

</html>