<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'cisfa/principal.php';
    }else{
        header ('location: index');
    }
        
?>