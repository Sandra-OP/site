<?php session_start();
   if(isset($_SESSION['usuarioAdmin'])){
        require 'frontend/anginapostinfarto.php';
    }elseif(isset($_SESSION['usuarioMedico'])){
        require 'frontend/anginapostinfarto.php';
    }else{
    header('location: login');
    }

?>