<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'frontend/iam.php';
    }else if(isset($_SESSION['usuarioAdmin'])){
       require 'frontend/iam.php';
    }else if(isset($_SESSION['usuarioMedico'])){
       require 'frontend/iam.php';
    }else{
         header ('location: index');
    }
        
?>