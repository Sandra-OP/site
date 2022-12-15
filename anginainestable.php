<?php session_start();
   if(isset($_SESSION['usuarioAdmin'])){
        require 'frontend/anginainestable.php';
    }elseif(isset($_SESSION['usuarioMedico'])){
        require 'frontend/anginainsestable.php';
    }else{
    header('location: login');
    }

?>