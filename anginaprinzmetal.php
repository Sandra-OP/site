<?php session_start();
   if(isset($_SESSION['usuarioAdmin'])){
        require 'frontend/anginaprinzmetal.php';
    }elseif(isset($_SESSION['usuarioMedico'])){
        require 'frontend/anginaprinzmetal.php';
    }else{
    header('location: login');
    }

?>