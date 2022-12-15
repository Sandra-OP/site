<?php
include("../conexionInfarto.php");
date_default_timezone_set('America/Mexico_City');
$hoy = date("d-m-Y");
    extract($_POST);
		
	//buscamos el email	
//	$sql_busqueda = $conexion2->query("SELECT email from usuarios where email = '".$email."'");

	// SI EL EMAIL NO EXISTE, REGISTRAMOS LOS DATOS EN LA TABLA USUARIO

		
	$sql = $conexion2->query("UPDATE tratamiento set seguimiento = '$seguimiento' WHERE id_paciente = '$curps'");
           /*                         
              $query = $conexion2->query("SELECT id_dato from dato_personal where curp = '".$curp."'");
               $row = mysqli_fetch_assoc($query);
               
               $id = $row['id_dato'];
               
                  $query2 = $conexion2->query("INSERT into tratamiento(killipkimball, fevi, choquecardiogenico, revascularizacionprevia, localizacion, primercontacto, puertabalon, puerta_aguja, iniciofibrinolitico, tiempoisquemiatotal, revascularizacion, diseccion, iam_periprocedimiento, complicaciones, flujo_microvascular_tmp, flujo_final_tfj, trombosis_definitiva, marcapasos_temporal, estancia_hospitalaria, reestenosis_instrastent, reehospitalizacion_one_year, escalas_riesgo, iam_tres_years, cruc_tres_years, defuncion, causadefuncion, id_paciente, identificador)
                                    values('".$killip."', '".$fevi."', '".$choque."','".$revascularizacionprevia."','".$localizacion."','".$primercontacto."','".$puertabalon."','".$puertaaguja."','".$fibrilonitico."','".$tiempoisquemia."','".$revascularizacion."','".$diseccion."','".$iamperiprocedimiento."','".$complicaciones."','".$flujomicrovasculartmp."','".$flujofinaltfg."','".$trombosisdefinitiva."','".$marcapasostemporal."','".$estanciahospitalaria."','".$reesentosis."','".$rehospitalizacion."','".$escaladeriesgo."','".$iamtresyears."','".$cruc."','".$defuncion."','".$causadefuncion."', '".$curp."', 'cest')");
                                    
                        $checked_contador = count($check_lista);
                //echo "<p>Has seleccionado los siguientes ".$checked_contador." opcione(s):</p> <br/>";
                // Bucle para almacenar y visualizar valores activados checkbox.
                foreach($check_lista as $seleccion) {
                    $sql = $conexion2->query("INSERT into factores_riesgo(nombrefactor, id_paciente) 
    
                    values ('".$seleccion."', '".$curp."')");
                }
                              
                $query3 = $conexion2->query("INSERT into tratamiento(id_paciente, id_medicamento, indicacion)
                                    values('".$id."', '".$medicamento."', '".$tratamiento."')");
	                    if($refe != ''){
                $query4 = $conexion2->query("INSERT into referecnias(id_paciente, datosreferencia) 
                                    values('".$id."', '".$refe."')");
	                    }else{
	                        
	                    };*/
												    										 
	//MENSAJE DE CONFIRMACIÓN													 
					if($sql != false) {
					echo "<script>swal({
                                title: 'Good job!',
                                text: 'Seguimiento actualizado!',
                                icon: 'success',
                        });</script>";	
                     
					  }else {
                        
                        echo "<script>swal({
                                title: 'Fatal!',
                                text: 'Error al actualizar seguimiento!',
                                icon: 'error',
                                });</script>"; 
					    }
	
	
				
				
				?>