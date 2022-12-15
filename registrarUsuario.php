<?php session_start();

if(isset($_POST['Ingresar'])){

    $pass = $_POST['claveAcceso'];
    $pass2 = sha1($pass);

    require '../cisfa/conexion.php';

    $sql = $conexion2->query("SELECT clave_acceso from accesoregistro where clave_acceso = '$pass2' limit 1");
    $row = mysqli_fetch_assoc($sql);

    

    if($row != false){
        require 'registroFormUser.php';
    }else{
        echo "<script>alert('something was wrong');
window.history.back();</script>";
    }
}

?>