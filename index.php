<?php session_start();
    if(isset($_SESSION['usuarioDatos'])) {
        header('location: principal'); 
        
    }elseif(isset($_SESSION['usuarioAdmin'])){
        header('location: principal');
    }elseif(isset($_SESSION['usuarioJefe'])){
        header('location: principal');
    }elseif(isset($_SESSION['usuarioMedico'])){
        header('location: principal');
    }else{
    header('location: login');
    }

?>