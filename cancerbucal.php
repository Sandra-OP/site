<?php session_start();
    if(isset($_SESSION['usuarioAdmin'])){
        require 'frontend/cancerbucalvista.php';
    }elseif(isset($_SESSION['usuarioJefe'])){
        require 'frontend/cancerbucalvista.php';
    }elseif(isset($_SESSION['usuarioMedico'])){
        require 'frontend/cancerbucalvista.php';
    }else{
    header('location: index');
    }
