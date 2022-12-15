<?php
include("../conexionInfarto.php");
date_default_timezone_set('America/Mexico_City');
$hoy = date("d-m-Y");
    extract($_POST);
		
	//buscamos el email	
//	$sql_busqueda = $conexion2->query("SELECT email from usuarios where email = '".$email."'");

	// SI EL EMAIL NO EXISTE, REGISTRAMOS LOS DATOS EN LA TABLA USUARIO

    
	$sql = $conexion->prepare("INSERT into dato_personal(curp, nombrecompleto, fechanacimiento, edad, localidad, municipio, estado, sexo, year) 
    
                                    values (:curp,:nombrecompleto, :fechanacimiento, :edad, '-', :municipio, :estado, :sexo, :year)");
                    
                                $sql->bindParam(':curp', $curp, PDO::PARAM_STR, 22);
                                $sql->bindParam(':nombrecompleto',$nombrecompleto, PDO::PARAM_STR, 22);
                                $sql->bindParam(':fechanacimiento',$fecha, PDO::PARAM_STR); 
                                $sql->bindParam(':edad',$edad, PDO::PARAM_INT); 
                                $sql->bindParam(':municipio',$cbx_municipio, PDO::PARAM_INT); 
                                $sql->bindParam(':estado',$cbx_estado, PDO::PARAM_INT); 
                                $sql->bindParam(':sexo',$sexo, PDO::PARAM_STR, 10); 
                                $sql->bindParam(':year',$hoy, PDO::PARAM_STR, 22);
                            $sql->execute(); 
            $query = $conexion2->query("SELECT id from dato_personal where curp = '".$curp."'");
                    $rows = mysqli_fetch_assoc($query);

                    $id_carga = $rows['id'];
                $query2 = $conexion->prepare("INSERT into tratamiento(
                killipkimball, 
                fevi, 
                choquecardiogenico, 
                revascularizacionprevia, 
                localizacion, 
                caracteristicasdolor, 
                iniciosintomas, 
                primercontacto, 
                puertabalon, 
                trombolisis, 
                fechainiciotrombolisis, 
                fechaterminotrombolisis, 
                tipofibrinolitico, 
                tiempoisquemiatotal, 
                revascularizacion, 
                diseccion, 
                iam_periprocedimiento, 
                complicaciones, 
                flujo_microvascular_tmp, 
                flujo_final_tfj, 
                trombosis_definitiva, 
                marcapasos_temporal, 
                estancia_hospitalaria, 
                reestenosis_instrastent, 
                reehospitalizacion_one_year, 
                escalas_riesgo, 
                iam_tres_years, 
                cruc_tres_years, 
                defuncion, 
                causadefuncion, 
                id_paciente, 
                identificador, 
                peso, talla, imc, electroconcambios, seguimiento)
                                    values(:killipkimball, 
                                    :fevi,
                                    :choquecardiogenico,
                                    :revascularizacionprevia,
                                    :localizacion, 
                                    :caracteristicasdolor,
                                    :iniciosintomas, 
                                    :primercontacto, 
                                    :puertabalon, 
                                    :trombolisis, 
                                    :fechainiciotrombolisis, 
                                    :fechaterminotrombolisis, 
                                    :tipofibrinolitico,
                                    :tiempoisquemiatotal,
                                    :revascularizacion,
                                    :diseccion,
                                    :iam_periprocedimiento,
                                    :complicaciones,
                                    :flujo_microvascular_tmp,
                                    :flujo_final_tfj,
                                    :trombosis_definitiva,
                                    :marcapasos_temporal,
                                    :estancia_hospitalaria,
                                    :reestenosis_instrastent,
                                    :reehospitalizacion_one_year,
                                    :escalas_riesgo,
                                    :iam_tres_years,
                                    :cruc_tres_years, 
                                    :defuncion,
                                    :causadefuncion, 
                                    :id_paciente, 
                                    :identificador, 
                                    :peso, 
                                    :talla, :imc, :electroconcambios, 'inicial')");
                            $query2->bindParam(':killipkimball',$killip, PDO::PARAM_STR, 5);
                            $query2->bindParam(':fevi',$fevi, PDO::PARAM_STR. 30); 
                            $query2->bindParam(':choquecardiogenico',$choque, PDO::PARAM_STR, 5);
                            $query2->bindParam(':revascularizacionprevia',$revascularizacionprevia, PDO::PARAM_STR, 5);
                            $query2->bindParam(':localizacion',$localizacion, PDO::PARAM_STR, 30);
                            $query2->bindParam(':caracteristicasdolor',$caractipicasatipicas, PDO::PARAM_STR, 50);
                            $query2->bindParam(':iniciosintomas',$iniciotrombolisis, PDO::PARAM_STR);
                            $query2->bindParam(':primercontacto',$primercontacto, PDO::PARAM_STR);
                            $query2->bindParam(':puertabalon',$puertabalon, PDO::PARAM_STR);
                            $query2->bindParam(':trombolisis',$trombolisis, PDO::PARAM_STR, 10);
                            $query2->bindParam(':fechainiciotrombolisis',$iniciotrombolisis, PDO::PARAM_STR);
                            $query2->bindParam(':fechaterminotrombolisis',$finalizotrombolisis, PDO::PARAM_STR);
                            $query2->bindParam(':tipofibrinolitico',$fibrinoliticos, PDO::PARAM_STR, 50);
                            $query2->bindParam(':tiempoisquemiatotal',$tiempoisquemia, PDO::PARAM_STR, 50);
                            $query2->bindParam(':revascularizacion',$revascularizacion, PDO::PARAM_STR. 30);
                            $query2->bindParam(':diseccion',$diseccion, PDO::PARAM_STR, 30);
                            $query2->bindParam(':iam_periprocedimiento',$iamperiprocedimiento, PDO::PARAM_STR,10);
                            $query2->bindParam(':complicaciones',$complicaciones, PDO::PARAM_STR, 50);
                            $query2->bindParam(':flujo_microvascular_tmp',$flujomicrovasculartmp, PDO::PARAM_STR, 10);
                            $query2->bindParam(':flujo_final_tfj',$flujofinaltfg, PDO::PARAM_STR, 10);
                            $query2->bindParam(':trombosis_definitiva',$trombosisdefinitiva, PDO::PARAM_STR, 10);
                            $query2->bindParam(':marcapasos_temporal',$marcapasostemporal, PDO::PARAM_STR, 10);
                            $query2->bindParam(':estancia_hospitalaria',$estanciahospitalaria, PDO::PARAM_STR,20);
                            $query2->bindParam(':reestenosis_instrastent',$reesentosis, PDO::PARAM_STR,10);
                            $query2->bindParam(':reehospitalizacion_one_year',$rehospitalizacion, PDO::PARAM_STR,10);
                            $query2->bindParam(':escalas_riesgo',$escaladeriesgo, PDO::PARAM_STR,30);
                            $query2->bindParam(':iam_tres_years',$iamtresyears, PDO::PARAM_STR,10);
                            $query2->bindParam(':cruc_tres_years',$cruc, PDO::PARAM_STR,10);
                            $query2->bindParam(':defuncion',$defuncion, PDO::PARAM_STR,50);
                            $query2->bindParam(':causadefuncion',$causadefuncion, PDO::PARAM_STR,40);
                            $query2->bindParam(':id_paciente',$id_carga,PDO::PARAM_INT); 
                            $query2->bindParam(':identificador', $identificador, PDO::PARAM_STR, 25);
                            $query2->bindParam(':peso',$peso,   PDO::PARAM_STR);
                            $query2->bindParam(':talla',$talla, PDO::PARAM_STR);
                            $query2->bindParam(':imc',$imc, PDO::PARAM_STR);
                            $query2->bindParam(':electroconcambios',$electrocardio, PDO::PARAM_STR);
                    $query2->execute();

                    $sql_s = $conexion->prepare("INSERT into paraclinicos(
                        ck, 
                        ckmb, 
                        troponinas, 
                        glucosa, 
                        urea, 
                        creatinina, 
                        colesterol, 
                        trigliceridos, 
                        acidourico, 
                        hbglucosilada, 
                        proteinas, 
                        colesteroltotal, 
                        ldl, 
                        hdl, 
                        id_paciente)
                                    values(
                                        :ck,
                                        :ckmb,
                                        :troponinas,
                                        :glucosa,
                                        :urea,
                                        :creatinina,
                                        :colesterol,
                                        :trigliceridos,
                                        :acidourico,
                                        :hbglucosilada,
                                        :proteinas,
                                        :colesteroltotal,
                                        :ldl,
                                        :hdl,
                                        :id_paciente)");     
                        $sql_s->execute(array(
                            ':ck'=>$ck, 
                            ':ckmb'=>$ckmb, 
                            ':troponinas'=>$troponinas, 
                            ':glucosa'=>$glucosa, 
                            ':urea'=>$urea, 
                            ':creatinina'=>$creatinina, 
                            ':colesterol'=>$colesterol, 
                            ':trigliceridos'=>$trigliceridos, 
                            ':acidourico'=>$acidourico, 
                            ':hbglucosilada'=>$hbglucosilada, 
                            ':proteinas'=>$proteinas, 
                            ':colesteroltotal'=>$colesterol, 
                            ':ldl'=>$ldl, 
                            ':hdl'=>$hdl, 
                            ':id_paciente'=>$id_carga


                        ));
                        
                        
                        $checked_contador = count($check_lista);
                //echo "<p>Has seleccionado los siguientes ".$checked_contador." opcione(s):</p> <br/>";
                // Bucle para almacenar y visualizar valores activados checkbox.
                foreach($check_lista as $seleccion) {
                    $sql = $conexion->prepare("INSERT into factores_riesgo(nombrefactor, id_paciente) 
    
                    values ('".$seleccion."', '".$id_carga."')");

                    $sql->execute(array(
                        ':nombrefactor'=>$seleccion,
                        ':id_paciente'=>$id_carga

                    ));
                }
                $checked_contador2 = count($check_lista2);
                //echo "<p>Has seleccionado los siguientes ".$checked_contador." opcione(s):</p> <br/>";
                // Bucle para almacenar y visualizar valores activados checkbox.
                foreach($check_lista2 as $seleccion2) {
                    $sql = $conexion->prepare("INSERT into caracteristicasdolortipicas(descripcioncaracteristica, id_paciente) 
    
                    values ('".$seleccion2."', '".$id_carga."')");

                    $sql->execute(array(
                        ':descripcioncaracteristica'=>$seleccion2, 
                        ':id_paciente'=>$id_carga
                    ));
                }
                $checked_contador3 = count($check_lista3);
                //echo "<p>Has seleccionado los siguientes ".$checked_contador." opcione(s):</p> <br/>";
                // Bucle para almacenar y visualizar valores activados checkbox.
                foreach($check_lista3 as $seleccion3) {
                    $sql = $conexion->prepare("INSERT into caracteristicasdoloratipicas(descripcioncaracteristica, id_paciente) 
    
                    values ('".$seleccion3."', '".$id_carga."')");
                        $sql->execute(array(
                            ':descripcioncaracteristica'=>$seleccion3, 
                            ':id_paciente'=>$id_carga
                        ));

                }
                $checked_contador4 = count($check_lista4);
                //echo "<p>Has seleccionado los siguientes ".$checked_contador." opcione(s):</p> <br/>";
                // Bucle para almacenar y visualizar valores activados checkbox.
                foreach($check_lista4 as $seleccion4) {
                    $sql = $conexion->prepare("INSERT into electrocardiograma(derivacionesafectadas, id_paciente) 
    
                    values ('".$seleccion4."', '".$id_carga."')");
                        $sql->execute(array(
                            ':derivacionesafectadas'=>$seleccion4, 
                            ':id_paciente'=>$id_carga

                        ));
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
                                
                        });
                        </script>";	
                    
					}else {
                        
                        echo "<script>swal({
                                title: 'Fatal!',
                                text: 'Error al guardar informacion!',
                                icon: 'error',
                                });</script>";
                            
                            $sql1 = $conexion2->query("DELETE from factores_riesgo where id_paciente = '$id_carga'");
                            $sql2 = $conexion2->query("DELETE from caracteristicasdolortipicas where id_paciente = '$id_carga'");
                            $sql0 = $conexion2->query("DELETE from dato_personal where id = '$id_carga'");
                        $conexion2->close();

					    }
	
	
				
				
				?>