<?php
include("../conexionCancer.php");

    extract($_POST);


        $sql = $conexionCancer->prepare("INSERT INTO seguimientocancer(fechainiciovigilancia, progresionenfermedad, fechadxprogresion, recurrenciaenfermedad, fecharecurrencia, ameritareintervencion, fechareintervencion, lateralidad, ameritanuevaqt, fechanuevaqt, tiponuevaqt, tratamientoqt, ameritaradioterapia,
        tiporadioterapia, fechainicioradio, numerosesiones, ameritabraquiterapia, fechainiciobraquiterapia, cuidadospaliativos, tipocuidadopaliativo, protocoloclinico, protocoloinvestigacion, id_paciente) values(:fechainiciovigilancia, :progresionenfermedad, :fechadxprogresion, :recurrenciaenfermedad, :fecharecurrencia, :ameritareintervencion, :fechareintervencion, :lateralidad, :ameritanuevaqt, :fechanuevaqt, :tiponuevaqt, :tratamientoqt, :ameritaradioterapia,
        :tiporadioterapia, :fechainicioradio, :numerosesiones, :ameritabraquiterapia, :fechainiciobraquiterapia, :cuidadospaliativos, :tipocuidadopaliativo, :protocoloclinico, :protocoloinvestigacion, :id_paciente)");
        
                $sql->bindParam(':fechainiciovigilancia',$fechainiciovigilancia,PDO::PARAM_STR);
                $sql->bindParam(':progresionenfermedad',$progresionenfermedad,PDO::PARAM_STR);
                $sql->bindParam(':fechadxprogresion',$fechadxprogresion,PDO::PARAM_STR);
                $sql->bindParam(':recurrenciaenfermedad',$recurrencianenfermedad,PDO::PARAM_STR);
                $sql->bindParam(':fecharecurrencia',$fecharecurrencia,PDO::PARAM_STR);
                $sql->bindParam(':ameritareintervencion',$ameritareintervencion,PDO::PARAM_STR);
                $sql->bindParam(':fechareintervencion',$fechareintenvencion,PDO::PARAM_STR);
                $sql->bindParam(':lateralidad',$lateralidadreintervencion,PDO::PARAM_STR);
                $sql->bindParam(':ameritanuevaqt',$ameritanuevaqt,PDO::PARAM_STR);
                $sql->bindParam(':fechanuevaqt',$fechanuevaqt,PDO::PARAM_STR);
                $sql->bindParam(':tiponuevaqt',$tipoqt,PDO::PARAM_STR);
                $sql->bindParam(':tratamientoqt',$tratameintoqt,PDO::PARAM_STR);
                $sql->bindParam(':ameritaradioterapia',$ameritaradioterapia,PDO::PARAM_STR);
                $sql->bindParam(':tiporadioterapia',$tipoderadioterapia,PDO::PARAM_STR);
                $sql->bindParam(':fechainicioradio',$fechadeinicioradio,PDO::PARAM_STR);
                $sql->bindParam(':numerosesiones',$numerodesesiones,PDO::PARAM_STR);
                $sql->bindParam(':ameritabraquiterapia',$ameritabraquiterapia,PDO::PARAM_STR);
                $sql->bindParam(':fechainiciobraquiterapia',$fechabraquiterapia,PDO::PARAM_STR);
                $sql->bindParam(':cuidadospaliativos',$cuidadospaliativos,PDO::PARAM_STR);
                $sql->bindParam(':tipocuidadopaliativo',$clinicapaliativa,PDO::PARAM_STR);
                $sql->bindParam(':protocoloclinico',$protocoloclinico,PDO::PARAM_STR);
                $sql->bindParam(':protocoloinvestigacion',$protocoloinvestigacion,PDO::PARAM_STR);
                $sql->bindParam(':id_paciente',$curps,PDO::PARAM_INT);
                    $sql->execute();
                    
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