<?php session_start();
    if(isset($_SESSION['externo'])) {
        header('location: vista-user.php'); 
        
    }else{
        header('location: login');
    }


?>