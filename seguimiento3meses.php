<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'frontend/segumiento3meses.php';
    }else if(isset($_SESSION['usuarioAdmin'])){
        require 'frontend/segumiento3meses.php';
    }else if(isset($_SESSION['usuarioMedico'])){
        require 'frontend/segumiento3meses.php';
    }else{
            header ('location: index');
    }
        
?>