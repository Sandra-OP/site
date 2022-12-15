<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'frontend/validar.php';
    }elseif(isset($_SESSION['usuarioAdmin'])){
        require 'frontend/validar.php';
    
    }else{
        header ('location: index');
    }
        
?>