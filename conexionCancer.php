<?php
//-----------------conexion para el inicio de sesion del sistema-------------IMPORTANTE-----solo modificar las credenciales del nombre de la base, la contraseña y usuario no mover nada mas de lo contrario deja de funcionar el inicio de sesion
try{
  $conexionCancer = new PDO('mysql:host=localhost;dbname=u972837353_cancer', 'u972837353_cancerhraei', 'CancerHraei2022.-.');
}catch(PDOException $prueba_error){
  echo "Error: " . $prueba_error->getMessage();
}
@mysqli_query($conexion2, "SET NAMES 'utf8'");
  $host = 'localhost';
  $basededatos = 'u972837353_cancer';
  $usuario = 'u972837353_cancerhraei';
  $contraseña = 'CancerHraei2022.-.';

  $conexion2 = new mysqli($host, $usuario,$contraseña, $basededatos);
  $conexion2-> set_charset("utf8");
  if ($conexion2 -> connect_errno)
      {
        die("Fallo la conexion:(".$conexion2 -> mysqli_connect_error().")".$conexion2-> mysqli_connect_error());
    }
    mysqli_query($conexion2,  'utf8');
    ?>