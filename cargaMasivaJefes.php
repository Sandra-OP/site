<?php session_start();
    if(isset($_SESSION['usuarioDatos'])){
         $usernameSesion = $_SESSION['usuarioDatos'];
            require '../cisfa/conexion.php';
			$statement = $conexion->prepare("SELECT correo_electronico, nombre_trabajador, rol_acceso FROM login WHERE correo_electronico= '$usernameSesion' AND rol_acceso = 9");
                 $statement->execute(array(
                        ':correo_electronico' => $usernameSesion
                    ));
                    $rw = $statement->fetch();
                    if($rw != false){
                         $_SESSION['usuarioDatos'] = $usernameSesion;
                            require 'frontend/principalInfarto.php';
                    }else{
                        echo "<script>alert('No tienes acceso a este apartado');
                        </script>;";
                         require 'close_sesion.php';
                    }
    }else if(isset($_SESSION['usuarioAdmin'])){
        $usernameSesion = $_SESSION['usuarioAdmin'];
            require '../cisfa/conexion.php';
			$statement = $conexion->prepare("SELECT correo_electronico, nombre_trabajador, rol_acceso FROM login WHERE correo_electronico= '$usernameSesion' AND rol_acceso = 5");
                 $statement->execute(array(
                        ':correo_electronico' => $usernameSesion
                    ));
                    $rw = $statement->fetch();
                    if($rw != false){
                         $_SESSION['usuarioAdmin'] = $usernameSesion;
                            require 'frontend/cargaMasivaJefes.php';
                    }else{
                        echo "<script>alert('No tienes acceso a este apartado');
                        </script>;";
                         require 'close_sesion.php';
                    }
               
    }else if(isset($_SESSION['usuarioFGX'])){
        require 'frontend/principalInfarto.php';
      
    }else{
         header ('location: index');
    }
        
?>