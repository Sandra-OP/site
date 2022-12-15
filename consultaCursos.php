<style>
#filtro2 {
    color: blue;
    background: none;
    font-size: 18px;
    margin-left: 20px;
    cursor: pointer;

}

#tabla {
    font-size: 14px;
}

button {
    background: none;
    color: red;
    border: none;
    padding: 0;
    font: inherit;
    cursor: pointer;
    outline: inherit;
    font-size: 15px;
}

td {
    cursor: pointer;
}

td:hover {
    background: #BAC0C4;
    color: red;
}
</style>


<?php 
error_reporting(0);
session_start();
	require '../rh/conexion.php';
if (isset($_SESSION['usuarioDatos'])){
				$usernameSesion = $_SESSION['usuarioDatos'];
				
				$query ="SELECT id_empleado from personaloperativo2022 where correo = '$usernameSesion' limit 1";
                $res = mysqli_query($conexion2, $query);
                $rw = mysqli_fetch_assoc($res);
                $ids = $rw['id_empleado'];
			
}
			
			


 
    $query=$conexion2->query("SELECT UPPER(nombre) as nombre, UPPER(nombreImparte) as nombreImparte, UPPER(nombreCurso) as nombreCurso, UPPER(area) as area, UPPER(asistio) as sistio, UPPER(nombreInstitucion) as nombreInstitucion, UPPER(tipoDocumentos) as tipoDocumentos, UPPER(siglas) as siglas, UPPER(duracion) as duracion, UPPER(Firma) as Firma, UPPER(cargoQuienFirma) as cargoQuienFirma, UPPER(asisteComo) as asisteComo, fechaImpartio, numTrabajador, fecha, id_curso FROM cursos where numTrabajador = $ids");
    if($query != false){
      
?>

<br>

<table id="tabla" class="table table-responsive table-striped table-bordered table-hover display" cellspacing="0"
    width="100%">
    <thead>
        <tr style="background-color:#7C7C7C; color: white; font-style: italic; ">
            <th>Fecha registro</th>
            <th>Nombre de la Institución que otorga la constancia</th>
            <th>Tipo de Documento</th>
            <th>Nombre del participante</th>
            <th>Núm. Empleado</th>
            <th>Nombre de la Capacitación</th>
            <th>Siglas del curso</th>
            <th>Fecha de Impartición</th>
            <th>Duración</th>
            <th>Firma de la constancias</th>
            <th>Cargo del que firma</th>
            <th>Generar Constancia</th>





        </tr>
    </thead>

    <?php
    while($filaAlumnos= $query->fetch_assoc())
        {
    
     echo
            '<tr>
            <input type="hidden" value='.$id.' id="seleccionValor">
             
                <td id='.$id.' class="ver-info" title="Click para ver información completa">'.$filaAlumnos['fecha'].'</td>
                <td id='.$id.' class="ver-info" title="Click para ver información completa">'.$filaAlumnos['nombreInstitucion'].'</td>
                <td id='.$id.' class="ver-info" title="Click para ver información completa">'.$filaAlumnos['tipoDocumentos'].'</td>
                <td id='.$id.' class="ver-info" title="Click para ver información completa">'.$filaAlumnos['nombre'].'</td>
                <td id='.$id.' class="ver-info" title="Click para ver información completa">'
                .$filaAlumnos['numTrabajador'].'</td> 
                <td id='.$id.' class="ver-info" title="Click para ver información completa">'
                .$filaAlumnos['nombreCurso'].'</td> 
                <td id='.$id.' class="ver-info" title="Click para ver información completa">'
                .$filaAlumnos['siglas'].'</td> 
                <td id='.$id.' class="ver-info" title="Click para ver información completa">'
                .$filaAlumnos['fechaImpartio'].'</td> 
                <td id='.$id.' class="ver-info" title="Click para ver información completa">'
                .$filaAlumnos['duracion'].'</td> 
                <td id='.$id.' class="ver-info" title="Click para ver información completa">'
                .$filaAlumnos['Firma'].'</td> 
                <td id='.$id.' class="ver-info" title="Click para ver información completa">'
                .$filaAlumnos['cargoQuienFirma'].'</td> 
                 <td><a href="../constancias/generarConstancia?numEmpleado='.$filaAlumnos['numTrabajador'].'&nombreCurso='.$filaAlumnos['nombreCurso'].'&id_curso='.$filaAlumnos['id_curso'].'" target="_blank" style="font-size: 24px; color: blue; background: none; border: none; margin-left: 50px;" class="lnr lnr-exit"></a></td>
                
                
             </tr>';
            
            
        }
    }else{
        echo "<script>alert('Error en la busqueda de información');</script>";
    }

    ?>

    <script>
    $(function() {

        $('table').on('click', '.ver-info', function() {

            var Xy = $(this).prop('id');

            let ob = {
                Xy: Xy
            };
            $.ajax({
                type: "POST",
                url: "consultaPostulados.php",
                data: ob,
                beforeSend: function() {

                },
                success: function(data) {

                    $("#tabla_resultado").html(data);

                }
            });

        });
    });

    var ID_usuario;
    var Xy;
    var ob;
    $('.procesonuevo').on("change", function() {
        ID_usuario = $(this).val();

    });

    $('.seleccion').click(function() {
        Xy = $(this).val();

        ob = {
            Xy: Xy,
            ID_usuario: ID_usuario
        }
        $.ajax({
            type: "POST",
            url: "seleccionarCandidato.php",
            data: ob,
            beforeSend: function() {
                swal({
                    title: '¡Seleccionado!',
                    text: '',
                    type: 'success',
                    timer: 1000,
                    showConfirmButton: false
                });
            },
            success: function(data) {

                $("#tabla_resultado").load('consultaPostulados.php?');

            }
        });

    });


    $('.borrar').click(function() {
        let Xy = $(this).val();

        let ob = {
            Xy: Xy
        };
        let mensaje = confirm("El usuario se eliminara, Deseas continuar?")

        if (mensaje == true) {


            $.ajax({
                type: "POST",
                url: "bloquearPostulado.php",
                data: ob,
                beforeSend: function() {
                    swal({
                        title: '¡Eliminado!',
                        text: '',
                        type: 'danger',
                        timer: 1000,
                        showConfirmButton: false
                    });
                },
                success: function(data) {

                    $("#tabla_resultado").load('consultaPostulados.php?');

                }
            });
        } else {
            swal({
                title: '¡Cancelado!',
                text: '',
                type: 'danger',
                timer: 1000,
                showConfirmButton: false
            });
        }

    });
    // var fired_button2= $("#claveUnicaContrato").val();  
    //var fired_button2=document.getElementById('claveUnicaContrato').value;
    /* $('#select').click(function() {
                                
                        let fired_button = $(this).val();
                        let fired_button2 = $("#reinicarEvaluacion").val();
                        let mensaje = confirm("La evaluacion del usuario se reiniciara, Deseas continuar?")
                
                if (mensaje == true) {
                         window.location.href = 'reinicarEval.php?Xy='+fired_button2;
                        } else {
                    swal({
                    title: '¡CANCELADO!',
                    text: '',
                    type: 'error',
                    timer: 1000,
                    showConfirmButton: false
                     });
                }                       
                    });   
*/
    </script>