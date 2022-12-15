<?php session_start();
    if(isset($_SESSION['usuarioFG'])){
        require 'frontend/principalInfarto.php';
    }else{
        header ('location: indexFG');
    }
        
?>