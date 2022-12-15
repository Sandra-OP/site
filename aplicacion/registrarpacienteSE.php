<?php
include("../conexionInfarto.php");
date_default_timezone_set('America/Mexico_City');
$hoy = date("d-m-Y");
    extract($_POST);
		
	//buscamos el email	
//	$sql_busqueda = $conexion2->query("SELECT email from usuarios where email = '".$email."'");

	// SI EL EMAIL NO EXISTE, REGISTRAMOS LOS DATOS EN LA TABLA USUARIO

		
	$sql = $conexion2->query("INSERT into dato_personal(curp, nombrecompleto, fechanacimiento, edad, localidad, municipio, estado, sexo, year) 
    
                                    values ('".$curp."','".$nombrecompleto."', '".$fecha."', '".$edad."', '-', '".$cbx_municipio."', '".$cbx_estado."', '".$sexo."', '".$hoy."')");
                                    
                $query = $conexion2->query("SELECT id_dato from dato_personal where curp = '".$curp."'");
                    $rows = mysqli_fetch_assoc($query);

                    $id_carga = $rows['id_dato'];
                    $query2 = $conexion2->query("INSERT into tratamiento(killipkimball, fevi, choquecardiogenico, revascularizacionprevia, localizacion, caracteristicasdolor, iniciosintomas, primercontacto, puertabalon, trombolisis, fechainiciotrombolisis, fechaterminotrombolisis, tipofibrinolitico, tiempoisquemiatotal, revascularizacion, diseccion, iam_periprocedimiento, complicaciones, flujo_microvascular_tmp, flujo_final_tfj, trombosis_definitiva, marcapasos_temporal, estancia_hospitalaria, reestenosis_instrastent, reehospitalizacion_one_year, escalas_riesgo, iam_tres_years, cruc_tres_years, defuncion, causadefuncion, id_paciente, identificador, peso, talla, imc, electroconcambios)
                                    values('".$killip."', '".$fevi."', '".$choque."','".$revascularizacionprevia."','".$localizacion."', '".$caractipicasatipicas."','".$fechasintomas."', '".$primercontacto."', '".$puertabalon."', '".$trombolisis."', '".$iniciotrombolisis."', '".$finalizotrombolisis."', '".$fibrinoliticos."','".$tiempoisquemia."','".$revascularizacion."','".$diseccion."','".$iamperiprocedimiento."','".$complicaciones."','".$flujomicrovasculartmp."','".$flujofinaltfg."','".$trombosisdefinitiva."','".$marcapasostemporal."','".$estanciahospitalaria."','".$reesentosis."','".$rehospitalizacion."','".$escaladeriesgo."','".$iamtresyears."','".$cruc."','".$defuncion."','".$causadefuncion."', '".$id_carga."', 'sest', '".$peso."', '".$talla."', '".$imc."', '".$electrocardio."')");
                        $sql_s = $conexion2->query("INSERT into paraclinicos(ck, ckmb, troponinas, glucosa, urea, creatinina, colesterol, trigliceridos, acidourico, hbglucosilada, proteinas, colesteroltotal, ldl, hdl, id_paciente)
                                    values('".$ck."','".$ckmb."','".$troponinas."','".$glucosa."','".$urea."','".$creatinina."','".$colesterol."','".$trigliceridos."','".$acidourico."','".$hbglucosilada."','".$proteinas."','".$colesteroltotal."','".$ldl."','".$hdl."','".$id_carga."')");               
                        
                        
                $checked_contador = count($check_lista);
                //echo "<p>Has seleccionado los siguientes ".$checked_contador." opcione(s):</p> <br/>";
                // Bucle para almacenar y visualizar valores activados checkbox.
                foreach($check_lista as $seleccion) {
                    $sql = $conexion2->query("INSERT into factores_riesgo(nombrefactor, id_paciente) 
    
                    values ('".$seleccion."', '".$id_carga."')");
                }
                $checked_contador2 = count($check_lista2);
                //echo "<p>Has seleccionado los siguientes ".$checked_contador." opcione(s):</p> <br/>";
                // Bucle para almacenar y visualizar valores activados checkbox.
                foreach($check_lista2 as $seleccion2) {
                    $sql = $conexion2->query("INSERT into caracteristicasdolortipicas(descripcioncaracteristica, id_paciente) 
    
                    values ('".$seleccion2."', '".$id_carga."')");
                }
                $checked_contador3 = count($check_lista3);
                //echo "<p>Has seleccionado los siguientes ".$checked_contador." opcione(s):</p> <br/>";
                // Bucle para almacenar y visualizar valores activados checkbox.
                foreach($check_lista3 as $seleccion3) {
                    $sql = $conexion2->query("INSERT into caracteristicasdoloratipicas(descripcioncaracteristica, id_paciente) 
    
                    values ('".$seleccion3."', '".$id_carga."')");
                }
                $checked_contador4 = count($check_lista4);
                //echo "<p>Has seleccionado los siguientes ".$checked_contador." opcione(s):</p> <br/>";
                // Bucle para almacenar y visualizar valores activados checkbox.
                foreach($check_lista4 as $seleccion4) {
                    $sql = $conexion2->query("INSERT into electrocardiograma(derivacionesafectadas, id_paciente) 
    
                    values ('".$seleccion4."', '".$id_carga."')");
                }
                    /*              
                $query3 = $conexion2->query("INSERT into tratamiento(id_paciente, id_medicamento, indicacion)
                                    values('".$id."', '".$medicamento."', '".$tratamiento."')");
	                    if($refe != ''){
                $query4 = $conexion2->query("INSERT into referecnias(id_paciente, datosreferencia) 
                                    values('".$id."', '".$refe."')");
	                    }else{
	                        
	                    };*/
                        
	//MENSAJE DE CONFIRMACIÓN				
                        
					if($query2 != false) {
					echo "<script>swal({
                                title: 'Good job!',
                                text: 'Datos guardados exitosamente!',
                                icon: 'success',
                        });</script>";	
                        
					    }else {
                        
                        echo "<script>swal({
                                title: 'Fatal!',
                                text: 'Error al guardar informacion!',
                                icon: 'error',
                                });</script>";
                                
                            
                            $sql1 = $conexion2->query("DELETE from factores_riesgo where id_paciente = '$id_carga'");
                            $sql2 = $conexion2->query("DELETE from caracteristicasdolortipicas where id_paciente = '$id_carga'");
                            $sql0 = $conexion2->query("DELETE from dato_personal where curp = '$curp'");
                            $conexion2->close();

					    }
	
	
				
				
				?>