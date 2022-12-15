<?php session_start();
    if(isset($_SESSION['usuarioAdmin'])){
        require 'frontend/angina.php';
    }elseif(isset($_SESSION['usuarioMedico'])){
        require 'frontend/angina.php';
    }else{
    header('location: login');
    }

?>