<?php session_start();
    if(isset($_SESSION['usuarioFG'])) {
        header('location: principalFG'); 
        
    }else{
        header('location: login');
    }


?>