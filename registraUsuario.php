<?php

if (isset($_POST['almacenar'])){
    error_reporting(0);
    $name= $_POST['name'];
    $primerApellido= $_POST['primerApellido'];
    $segundoApellido= $_POST['segundoApellido'];
    $correo= $_POST['correo'];
    $password = $_POST['password'];
    $cpassword= $_POST['cpassword'];
    $rolUser = $_POST['id_rol'];
    
    
    $password = hash('sha512', $password);
    $cpassword = hash('sha512', $cpassword);
    
    
        require "../cisfa/conexion.php";
        $statement2 = $conexion->prepare('SELECT correo_electronico FROM login WHERE correo_electronico = :correo LIMIT 1');
        $statement2->execute(array(':correo' => $correo));
        
        $resultado = $statement2->fetch();

        if($resultado != false){
            echo "<script>alert('Ya existe una cuenta con este correo, ingresa otro');
            window.history.back();</script>";
        }else{
        
        $statement = $conexion->prepare('INSERT INTO login (id_trabajador, nombre_trabajador, primer_apellido, segundo_apellido, correo_electronico, clave_acceso, rol_acceso) VALUES (null, :name, :primerApellido, :segundoApellido, :correo, :password, :id_rol)');
        $statement->execute(array(
            
            ':name' => $name,
            ':primerApellido' => $primerApellido,
            ':segundoApellido' => $segundoApellido,
            ':correo' => $correo,
            ':password' => $password,
            'id_rol' => $rolUser
        
        ));
    
        if($statement != false) {
    
            echo "<script>alert('Usuario registrado exitosamente');
                    window.history.back();</script>";
        }else{
            echo "<script>alert('Error al registrar');
                    window.history.back();</script>";
        }
    }   
    
    }
    echo "<script>window.close();</script>";

?>