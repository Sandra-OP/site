<?php
include("../conexionCancer.php");
date_default_timezone_set('America/Mexico_City');
$hoy = date("d-m-Y");
    extract($_POST);
		
	//buscamos el email	
    
	$sql_busqueda = $conexionCancer->prepare("SELECT curp from dato_usuario");
    $sql_busqueda->execute();
    $sql_busqueda->setFetchMode(PDO::FETCH_ASSOC);
    $validacion = $sql_busqueda->fetch();
        $validaCurp = $validacion['curp'];
    if($validaCurp === $curp){
        echo "<script>swal({
            title: 'Fatal!',
            text: 'Error!! ya existe un usuario con este curp!',
            icon: 'error',
            });</script>";
        
    }else{
	// SI EL EMAIL NO EXISTE, REGISTRAMOS LOS DATOS EN LA TABLA USUARIO

	$sql = $conexionCancer->prepare("INSERT into dato_usuario(curp, nombrecompleto, poblacionindigena, escolaridad, fechanacimiento, edad, sexo, raza, estado, municipio, year) 
    
                                    values (:curp, :nombrecompleto, :poblacionindigena, :escolaridad, :fechanacimiento, :edad, :sexo, :raza, :estado, :municipio, :year)");
                    
                                $sql->bindParam(':curp', $curp, PDO::PARAM_STR, 25);
                                $sql->bindParam(':nombrecompleto',$nombrecompleto, PDO::PARAM_STR, 100);
                                $sql->bindParam(':poblacionindigena',$poblacionindigena, PDO::PARAM_STR, 100);
                                $sql->bindParam(':escolaridad',$escolaridad, PDO::PARAM_STR, 100);
                                $sql->bindParam(':fechanacimiento',$fecha, PDO::PARAM_STR); 
                                $sql->bindParam(':edad',$edad, PDO::PARAM_INT); 
                                $sql->bindParam(':sexo',$sexo, PDO::PARAM_STR, 10); 
                                $sql->bindParam(':raza',$raza, PDO::PARAM_STR, 100); 
                                $sql->bindParam(':estado',$cbx_estado, PDO::PARAM_INT); 
                                $sql->bindParam(':municipio',$cbx_municipio, PDO::PARAM_INT); 
                                $sql->bindParam(':year',$hoy, PDO::PARAM_STR);
                            $sql->execute(); 

                            $sql = $conexionCancer->prepare("SELECT id from dato_usuario where curp = :curp");
                            $sql->execute(array(
            
                                ':curp' => $curp
                            
                            ));
                            $row = $sql->fetch();
                            $id_usuario = $row['id'];

                            $sql = $conexionCancer->prepare("INSERT into signosvitales(frecuenciacardiaca, presionarterial, talla, peso, imc, id_paciente) 
    
                                    values (:frecuenciacardiaca, :presionarterial, :talla, :peso, :imc, :id_paciente)");
                    
                                $sql->bindParam(':frecuenciacardiaca', $frecuenciacardiaca, PDO::PARAM_STR, 10);
                                $sql->bindParam(':presionarterial',$presionarterial, PDO::PARAM_STR, 15);
                                $sql->bindParam(':talla',$talla, PDO::PARAM_STR, 10);
                                $sql->bindParam(':peso',$peso, PDO::PARAM_STR, 10);
                                $sql->bindParam(':imc',$imc, PDO::PARAM_STR); 
                                $sql->bindParam(':id_paciente',$id_usuario, PDO::PARAM_INT);
                            $sql->execute(); 

                            $sql = $conexionCancer->prepare("INSERT into antecedentesgineco(menarca, ultimamestruacion, cuentacon, gestas, parto, aborto, cesarea, terapiareemplazohormonal, lactancia, tiempolactancia, id_paciente) 
    
                                    values (:menarca, :ultimamestruacion, :cuentacon, :gestas, :parto, :aborto, :cesarea, :terapiareemplazohormonal, :lactancia, :tiempolactancia, :id_paciente)");
                    
                                $sql->bindParam(':menarca', $menarca, PDO::PARAM_STR, 100);
                                $sql->bindParam(':ultimamestruacion',$fechaultimamestruacion, PDO::PARAM_STR);
                                $sql->bindParam(':cuentacon',$menopausea, PDO::PARAM_STR, 100);
                                $sql->bindParam(':gestas',$gestas, PDO::PARAM_INT);
                                $sql->bindParam(':parto',$parto, PDO::PARAM_INT); 
                                $sql->bindParam(':aborto',$aborto, PDO::PARAM_INT);
                                $sql->bindParam(':cesarea',$cesarea, PDO::PARAM_INT);
                                $sql->bindParam(':terapiareemplazohormonal',$planificacionfamiliar, PDO::PARAM_STR, 10);
                                $sql->bindParam(':lactancia',$lactancia, PDO::PARAM_STR, 10);
                                $sql->bindParam(':tiempolactancia',$tiempolactancia, PDO::PARAM_STR, 35);
                                $sql->bindParam(':id_paciente',$id_usuario, PDO::PARAM_INT);
                            $sql->execute(); 
                            
                            $sql = $conexionCancer->prepare("INSERT INTO cancerpaciente(descripcioncancer, id_paciente)
                                        values(:descripcioncancer, :id_paciente)");
                                        $sql->bindParam(':descripcioncancer',$tipodecancer,PDO::PARAM_STR,100);
                                        $sql->bindParam(':id_paciente',$id_usuario,PDO::PARAM_INT);
                                    $sql->execute();
                            $checked_contador = count($check_listapato);
                            //echo "<p>Has seleccionado los siguientes ".$checked_contador." opcione(s):</p> <br/>";
                            // Bucle para almacenar y visualizar valores activados checkbox.
                            foreach($check_listapato as $seleccion) {
                                $sql_s = $conexionCancer->prepare("INSERT into antecedentespatopersonales(descripcionantecedente, id_paciente) 
                
                                            values('".$seleccion."', '".$id_usuario."')");

                                                $sql_s->execute(array(
                                                    ':descripcionantecedente'=>$seleccion,
                                                    ':id_paciente'=>$id_usuario
                                    ));
                            }
                            

                                    $ms_contador = count($mscancer);
                            foreach($mscancer as $heredo) {
                                $sql_s = $conexionCancer->prepare("INSERT into antecedentesfamiliarescancer(datoantecedentefamiliar, id_paciente) 
                
                                values(:datoantecedentefamiliar, :id_paciente)");
            
                                $sql_s->execute(array(
                                    ':datoantecedentefamiliar'=>$heredo,
                                    ':id_paciente'=>$id_usuario
            
                                ));
                            }
                            $sql = $conexionCancer->prepare("INSERT into atencionclinica(fechaatencioninicial, biradsreferencia, biradshraei, lateralidad, etapaclinica, tamaniotumoral, compromisolenfatico, metastasis, sitiometastasis, calidadvidaecog, id_usuario)
                                        values(:fechaatencioninicial, :biradsreferencia, :biradshraei, :lateralidad, :etapaclinica, :tamaniotumoral, :compromisolenfatico, :metastasis, :sitiometastasis, :calidadvidaecog, :id_usuario)");

                                        $sql->bindParam(':fechaatencioninicial',$fechaatencioninicial, PDO::PARAM_STR);
                                        $sql->bindParam(':biradsreferencia',$biradsreferencia,PDO::PARAM_STR,100);
                                        $sql->bindParam(':biradshraei',$biradshraei,PDO::PARAM_STR,100);
                                        $sql->bindParam(':lateralidad',$lateralidadprimero,PDO::PARAM_STR,100);
                                        $sql->bindParam(':etapaclinica',$etapasclinicas,PDO::PARAM_STR,20);
                                        $sql->bindParam(':tamaniotumoral',$tamaniotumoral,PDO::PARAM_STR,100);
                                        $sql->bindParam(':compromisolenfatico',$linfaticonodal,PDO::PARAM_STR,150);
                                        $sql->bindParam(':metastasis',$metastasis,PDO::PARAM_STR,150);
                                        $sql->bindParam(':sitiometastasis',$sitiometastasis,PDO::PARAM_STR,100);
                                        $sql->bindParam(':calidadvidaecog',$calidaddevidaecog,PDO::PARAM_STR,100);
                                        $sql->bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT);
                                    $sql->execute();

                            $sql = $conexionCancer->prepare("INSERT into histopatologia(dxhistopatologico, fechadxhistopatologico, escalasbr, id_usuario)
                                        values(:dxhistopatologico, :fechadxhistopatologico, :escalasbr, :id_usuario)");

                                        $sql->bindParam(':dxhistopatologico',$dxhistopatologico,PDO::PARAM_STR,50);
                                        $sql->bindParam(':fechadxhistopatologico',$fechadxhistopatologico,PDO::PARAM_STR);
                                        $sql->bindParam(':escalasbr',$escalasbr,PDO::PARAM_STR,150);
                                        $sql->bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT);
                                            $sql->execute();

                            $sql = $conexionCancer->prepare("INSERT into inmunohistoquimica(receptoresestrogenos, receptoresprogesterona, ki67, triplenegativo, aplicopdl, descripcionpdl, oncogenher2, fish, id_usuario)
                                                        values(:receptoresestrogenos, :receptoresprogesterona, :ki67, :triplenegativo, :aplicopdl, :descripcionpdl, :oncogenher2, :fish, :id_usuario)");

                                                        $sql->bindParam(':receptoresestrogenos',$receptoresestrogenos,PDO::PARAM_STR,10);
                                                        $sql->bindParam(':receptoresprogesterona',$receptoresprogesterona,PDO::PARAM_STR,10);
                                                        $sql->bindParam(':ki67',$ki67,PDO::PARAM_STR,100);
                                                        $sql->bindParam(':triplenegativo',$triplenegativo,PDO::PARAM_STR,10);
                                                        $sql->bindParam(':aplicopdl',$pdlrealizo,PDO::PARAM_STR,10);
                                                        $sql->bindParam(':descripcionpdl',$pdl,PDO::PARAM_STR,10);
                                                        $sql->bindParam(':oncogenher2',$oncogen,PDO::PARAM_STR,10);
                                                        $sql->bindParam(':fish',$fish,PDO::PARAM_STR,25);
                                                        $sql->bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT);
                                                            $sql->execute();
                            $sql = $conexionCancer->prepare("INSERT into radioterapia(aplicoradio, id_paciente)
                                        values(:aplicoradio, :id_paciente)");

                                        $sql->bindParam(':aplicoradio',$radioterapia,PDO::PARAM_STR,10);
                                        $sql->bindParam(':id_paciente',$id_usuario, PDO::PARAM_INT);
                                            $sql->execute();
                                        if($radioterapia == 'Si'){
                                            $sql = $conexionCancer->prepare("SELECT id_radio from radioterapia where id_paciente = :id_paciente");
                            $sql->execute(array(
            
                                ':id_paciente' => $id_usuario
                            
                            ));
                            $row = $sql->fetch();
                            $id_deradio = $row['id_radio'];
                                            $sql = $conexionCancer->prepare("INSERT into tiporadioterapia(decripcionradio, fecharadio, numerosesiones, id_radio)
                                                values(:decripcionradio, :fecharadio, :numerosesiones, :id_radio)");
                                                        $sql->bindParam(':decripcionradio',$aplicoradioterapia,PDO::PARAM_STR,100);
                                                        $sql->bindParam(':fecharadio',$fechainicioradio,PDO::PARAM_STR);
                                                        $sql->bindParam(':numerosesiones',$numerosesiones,PDO::PARAM_INT);
                                                        $sql->bindParam(':id_radio',$id_deradio,PDO::PARAM_INT);
                                                            $sql->execute();

                                        }
                                        $sql = $conexionCancer->prepare("INSERT into braquiterapia(aplicobraquiterapia, fechabraquiterapia, id_paciente) values(:aplicobraquiterapia, :fechabraquiterapia, :id_paciente)");
                                                        $sql->bindParam(':aplicobraquiterapia',$braquiterapia,PDO::PARAM_STR,10);
                                                        $sql->bindParam(':fechabraquiterapia',$fechadebraquiterapia,PDO::PARAM_STR);
                                                        $sql->bindParam(':id_paciente',$id_usuario,PDO::PARAM_INT);
                                                            $sql->execute();
                            if($sql != false) {
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
                                        
                                    
                                    }
                                }
                            ?>