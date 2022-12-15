<!DOCTYPE html>
<html class="no-js" lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>HRAEI - Bolsa de Trabajo</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="css/estilosMenu.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="js/enviadatousuario.js"></script>
</head>
<style>
body {
    background-color: white;
}
</style>

<body>

    <div class="box1">
        <header class="header">

            <span id="cabecera">Datos Personales</span>

        </header>
        <div id="editarInformacion"></div>
        <?php
require 'menu/menuPersonal.php';
error_reporting(0);
session_start();
	require '../rh/conexion.php';
if (isset($_SESSION['usuarioDatos'])){
				$usernameSesion = $_SESSION['usuarioDatos'];
				
				$query ="SELECT * from personaloperativo2022 where correo = '$usernameSesion' limit 1";
                $res = mysqli_query($conexion2, $query);
                $row = mysqli_fetch_assoc($res);
                
			
}else if(isset($_SESSION['usuarioJefe'])){
				$usernameSesion = $_SESSION['usuarioJefe'];
				
				$query ="SELECT * from personaloperativo2022 where correo = '$usernameSesion' limit 1";
                $res = mysqli_query($conexion2, $query);
                $row = mysqli_fetch_assoc($res);
}
else if(isset($_SESSION['usuarioMedico'])){
  $usernameSesion = $_SESSION['usuarioMedico'];
  
  $query ="SELECT * from personaloperativo2022 where correo = '$usernameSesion' limit 1";
          $res = mysqli_query($conexion2, $query);
          $row = mysqli_fetch_assoc($res);
}
?>
        <div class="parent">


            <style>
            #filtro2 {
                color: blue;
                background: none;
                font-size: 18px;
                margin-left: 20px;
                cursor: pointer;

            }

            #tabla {
                font-size: 12px;
                margin-top: -15rem;

            }

            #boton {
                width: 120px;
                height: 25px;
                background: #B6B6B6;
                color: white;
                border: none;
                padding: 0;
                font: inherit;
                cursor: pointer;
                outline: inherit;
                font-size: 13px;
            }

            th {
                font-size: 14px;
                background-color: #B6B6B6;
                text-align: left;
            }

            td {
                width: 100%;
                cursor: pointer;
                font-size: 13px;
                background-color: #FBFBFB;
            }

            td:hover {
                background: #6A6868;
                color: white;
                font-size: 13px;

            }

            .lnr lnr-trash {
                font-size: 19px;
            }
            </style>

            <br>
            <div id="mensajeconfirmacion"></div>
            <!--<div > <i class='bx bx-search-alt-2' id="filtro2" data-bs-toggle="modal" data-bs-target="#exampleModal3">  Buscar</i></div>-->

            <input type="hidden" value="<?php echo $row['curp']; ?>" id="idcurp">
            <table id="tabla" class="table table-responsive table-striped table-bordered table-hover display"
                cellspacing="0" width="100%">
                <tr>
                    <th>Datos personales</th>
                    <td><?php echo 'Nombre completo:&nbsp'.$row['nombre'].' '.$row['apellidopaterno'].' '.$row['apellidomaterno'].'<br>'.'Sexo:&nbsp'.$row['sexo'].'<br>'.'Fecha de nacimeinto:&nbsp'.$row['fechanacimiento'].'<br>'.'Telefono de casa:&nbsp'.$row['telefonocasa'].'<br>'.'Telefono cecular:&nbsp'.$row['telefonocelular'].'<br>'.'Otro telefono:&nbsp'.$row['otrotelefono'].'<br>'.'Correo electronico:&nbsp'.$row['correo'].'<br>'.'Carta naturalización:&nbsp'.$row['cartanaturalizacion'].'<br>'.'CURP:&nbsp'.$row['curp'].'<br>'.'RFC:&nbsp'.$row['rfc'].'<br>'.'Estado:&nbsp'.$row['estado'].'<br>'.'Municipio/Delegación:&nbsp'.$row['municipio'].'<br>'.'Localidad:&nbsp'.$row['localidad'].'<br>'.'Colonia:&nbsp'.$row['colonia'].'<br>'.'Calle:&nbsp'.$row['calle'].'<br>'.'Numero exterior:&nbsp'.$row['numexterior'].'<br>'.'Num interior:&nbsp'.$row['numinterior']  ?><input
                            type="submit" value="Editar datos" style="float: right;" class="mandacurp"
                            id="<?php echo $row['curp']?>"></td>
                </tr>
                <tr>
                    <th>Educación Media Superior</th>
                    <td><?php echo 'Nombre de la institución:&nbsp'.$row['nombremediasuperior'].'<br>'.'Nombre de la formación academica:&nbsp'.$row['nombreformacionmedia'].'<br>'.'Fecha de inicio:&nbsp'.$row['fechainicio'].'<br>'.'Fecha de termino:&nbsp'.$row['fechatermino'].'<br>'.'Tiempo cursado:&nbsp'.$row['tiempocursado'].'<br>'.'Documento que recibe:&nbsp'.$row['documentomediasuperior'] ?><input
                            type="submit" value="Editar datos" style="float: right;" onclick="datosPersonales();"
                            id="boton"></td>
                </tr>
                <tr>
                    <th>Educación Superior</th>
                    <td><?php echo 'Nombre de la institución:&nbsp'.$row['nombresuperior'].'<br>'.'Nombre de la formación academica:&nbsp'.$row['nombreformacionsuperior'].'<br>'.'Fecha de inicio:&nbsp'.$row['fechasuperiorinicio'].'<br>'.'Fecha de termino:&nbsp'.$row['fechasuperiortermino'].'<br>'.'Tiempo cursado:&nbsp'.$row['tiempocursadosuperior'].'<br>'.'Documento que recibe:&nbsp'.$row['documentosuperior'].'<br>'.'Numero de cedula profesional:&nbsp'.$row['numerocedulasuperior'] ?><input
                            type="submit" value="Editar datos" style="float: right;" onclick="datosPersonales();"
                            id="boton"></td>
                </tr>
                <tr>
                    <th>Nivel Maestria</th>
                    <td><?php echo 'Nombre de la institución:&nbsp'.$row['nombremaestria'].'<br>'.'Nombre de la formación academica:&nbsp'.$row['nombreformacionmaestria'].'<br>'.'Fecha de inicio:&nbsp'.$row['fechainiciomaestria'].'<br>'.'Fecha de termino maestria:&nbsp'.$row['fechaterminomaestria'].'<br>'.'Documento que recibe:&nbsp'.$row['documentomaestria'].'<br>'.'Número de cedula:&nbsp'.$row['cedulamaestria'] ?><input
                            type="submit" value="Editar datos" style="float: right;" onclick="datosPersonales();"
                            id="boton"></td>
                </tr>
                <tr>
                    <th>Segunda Maestria</th>
                    <td><?php echo 'Nombre de la institución:&nbsp'.$row['nombremaestriados'].'<br>'.'Nombre de la formación academica:&nbsp'.$row['nombreformacionmaestriados'].'<br>'.'Fecha de inicio:&nbsp'.$row['fechainiciomaestriados'].'<br>'.'Fecha de termino maestria:&nbsp'.$row['fechaterminomaestriados'] ?><input
                            type="submit" value="Editar datos" style="float: right;" onclick="datosPersonales();"
                            id="boton"></td>
                </tr>
                <tr>
                    <th>Posgrado/Especialidad</th>
                    <td><?php echo 'Nombre de la institución:&nbsp'.$row['nombreposgrado'].'<br>'.'Nombre de la formación academica:&nbsp'.$row['nombreformacionposgrado'].'<br>'.'Unidad Hospitalaria:&nbsp'.$row['unidadhospitalaria'].'<br>'.'Fecha de inicio:&nbsp'.$row['fechaposgradoinicio'].'<br>'.'Fecha de temrino:&nbsp'.$row['fechaposgradotermino'].'<br>'.'Años cursados:&nbsp'.$row['tiempocursadoposgrado'].'<br>'.'Documento recibido posgrado:&nbsp'.$row['documentorecibedoposgrado'].'<br>'.'Número de cedula profesional:&nbsp'.$row['numerocedulaposgrado'] ?><input
                            type="submit" value="Editar datos" style="float: right;" onclick="datosPersonales();"
                            id="boton"></td>
                </tr>
                <tr>
                    <th>Doctorado/Sub-Especialidad</th>
                    <td><?php echo 'Nombre de la institución:&nbsp'.$row['nombredoctorado'].'<br>'.'Nombre de la formación academica:&nbsp'.$row['nombreformaciondoctorado'].'<br>'.'Unidad hospitalaria:&nbsp'.$row['unidadhospitalariadoctorado'].'<br>'.'Fecha de inicio de doctorado:&nbsp'.$row['fechainiciodoctorado'].'<br>'.'Fecha de termino de doctorado:&nbsp'.$row['fechaterminodoctorado'].'<br>'.'Años cursados:&nbsp'.$row['tiempocursadodoctorado'].'<br>'.'Documento que recibe:&nbsp'.$row['documentorecibedoctorado'].'<br>'.'Número de cedula profesional:&nbsp'.$row['numeroceduladoctorado'] ?><input
                            type="submit" value="Editar datos" style="float: right;" onclick="datosPersonales();"
                            id="boton"></td>
                </tr>
                <tr>
                    <th>Otros estudios/Alta especialidad</th>
                    <td><?php echo 'Nombre de la institución:&nbsp'.$row['nombrealtaespecialidad'].'<br>'.'Nombre de la formación academica:&nbsp'.$row['nombreformacionaltaesp'].'<br>'.'Unidad hospitalaria:&nbsp'.$row['unidadhospaltaesp'].'<br>'.'Fecha de inicio:&nbsp'.$row['fechainicioaltaesp'].'<br>'.'Fecha de termino:&nbsp'.$row['fechaterminoaltaesp'].'<br>'.'Años cursados:&nbsp'.$row['tiempocursadoaltaesp'].'<br>'.'Documento que recibe:&nbsp'.$row['documentorecibealtaesp'] ?><input
                            type="submit" value="Editar datos" style="float: right;" onclick="datosPersonales();"
                            id="boton"></td>
                </tr>
                <tr>
                    <th>Servicio social</th>
                    <td><?php echo 'Nombre de la dependencia donde se realizo:&nbsp'.$row['nombreserviciosocial'].'<br>'.'Fecha de inicio:&nbsp'.$row['fechainicioservicio'].'<br>'.'Fecha de termino:&nbsp'.$row['fehcaerminoservicio'].'<br>'.'Labores que desempeño:&nbsp'.$row['laboresservicio'].'<br>'.'Documento recibido:&nbsp'.$row['documentorecibeservicio'] ?><input
                            type="submit" value="Editar datos" style="float: right;" onclick="datosPersonales();"
                            id="boton"></td>
                </tr>
                <tr>
                    <th>Practicas profesionales</th>
                    <td><?php echo 'Nombre de la dependencia donde se realizó:&nbsp'.$row['nombrepracticas'].'<br>'.'Fecha de inicio:&nbsp:'.$row['fechainiciopracticas'].'<br>'.'Fecha de término:&nbsp'.$row['fechaterminopracticas'].'<br>'.'Labores que desempeñó:&nbsp'.$row['laborespracticas'].'<br>'.'Documento recibido:&nbsp'.$row['documentorecibepracticas'] ?><input
                            type="submit" value="Editar datos" style="float: right;" onclick="datosPersonales();"
                            id="boton"></td>
                </tr>
                <tr>
                    <th>Primer Certificación</th>
                    <td><?php echo 'Nombre de la institución:&nbsp'.$row['nombreformacioncertificauno'].'<br>'.'Especialidad que certifica:&nbsp'.$row['nombrecertificacionuno'].'<br>'.'Fecha de inicio:&nbsp'.$row['fechainiciocertificacionuno'].'<br>'.'Fecha de término:&nbsp'.$row['fechaterminocertificacionuno'].'<br>'.'Documento que acredita:&nbsp'.$row['documentocertificacionuno'] ?><input
                            type="submit" value="Editar datos" style="float: right;" onclick="datosPersonales();"
                            id="boton"></td>
                </tr>
                <tr>
                    <th>Segunda Certificación</th>
                    <td><?php echo 'Nombre de la institución:&nbsp'.$row['nombreformacioncertificaciondos'].'<br>'.'Especialidad que certifica:&nbsp'.$row['nombrecertificaciondos'].'<br>'.'Fecha de inicio:&nbsp'.$row['fechainiciocertificaciondos'].'<br>'.'Fecha de término:&nbsp'.$row['fechaterminocertificaciondos'].'<br>'.'Documento que acredita:&nbsp'.$row['documentocertificaciondos'] ?><input
                            type="submit" value="Editar datos" style="float: right;" onclick="datosPersonales();"
                            id="boton"></td>
                </tr>




                <?php
        $conexion2->close();
        require 'modals/actualizarDatosUsuario.php';
    ?>


</body>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>
</script>

</html>