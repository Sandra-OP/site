<?php session_start();
    if(isset($_SESSION['usuarioAdmin'])){
        require 'frontend/anginacronicaestable.php';
    }elseif(isset($_SESSION['usuarioMedico'])){
        require 'frontend/anginacronicaestable.php';
    }else{
    header('location: login');
    }

?>