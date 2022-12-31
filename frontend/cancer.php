<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilosMenuNew.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--<script defer src="https://app.embed.im/snow.js"></script>-->
    <title>Cancer</title>
</head>

<body>

    <style>
    a {
        text-decoration: none;
    }
    </style>
    <header class="header">

        <span id="cabecera">CANCER</span>

    </header>

    <div class="gallery">

        <?php
    if(isset($_SESSION['usuarioAdmin'])){

require 'menu/menuPrincipal.php';

?>
        <article class="card" id="cancer-mama">
            <a href="cancerdemama">
                <hr id="hr3">
                <p>Cancer de mama</p>
                <a id="linkcancer" href="cancerdemama" class="btn btn-info">Ver Información</a>

            </a>
        </article>

        <article class="card" id="cancer-ovario">
            <a href="cancedeovario">
                <hr id="hr4">
                <p>Cancer de ovario</p>
                <a id="link" href="cancerdeovario" class="btn btn-danger">Ver Información</a>

            </a>
        </article>

        <article class="card" id="cancer-testiculo">
            <a href="cancerdetesticulo">
                <hr id="hr5">
                <p>Cancer de testiculo</p>
                <a id="link" href="cancerdetesticulo" class="btn btn-success">Ver Información</a>

            </a>
        </article>
        <article class="card" id="cancer-colon">
            <a href="cancerdecolon">
                <hr id="hr5">
                <p>Cancer de colon</p>
                <a id="link" href="cancerdecolon" class="btn btn-dark">Ver Información</a>

            </a>
        </article>
        <?php

    }else if(isset($_SESSION['usuarioJefe'])){

require 'menu/menuPersonal.php';

?>
        <article class="card" id="cancer-mama">
            <a href="cancerdemama">
                <hr id="hr3">
                <p>Angina inestable</p>
                <a id="link" href="cancerdemama" class="btn btn-info">Ver Información</a>

            </a>
        </article>

        <article class="card" id="cancer-ovario">
            <a href="cancerdeovario">
                <hr id="hr4">
                <p>Angina Cronica Estable</p>
                <a id="link" href="cancerdeovario" class="btn btn-danger">Ver Información</a>

            </a>
        </article>

        <article class="card" id="cancer-testiculo">
            <a href="cancerdetesticulo">
                <hr id="hr5">
                <p>Angina Post Infarto</p>
                <a id="link" href="cacerdetesticulo" class="btn btn-success">Ver Información</a>

            </a>
        </article>
        <article class="card" id="cancer-colon">
            <a href="cancerdecolon">
                <hr id="hr5">
                <p>Angina de prinzmetal</p>
                <a id="link" href="cancerdecolon" class="btn btn-dark">Ver Información</a>

            </a>
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