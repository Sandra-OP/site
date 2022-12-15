<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php 

	require 'conexionInfarto.php';

    
	$sql = "SELECT COUNT(*) total FROM tratamiento where identificador = 'sest'";
    $result = mysqli_query($conexion2, $sql);
    $fila = mysqli_fetch_assoc($result);

    $query= $conexion->prepare("SELECT dato_personal.id, dato_personal.nombrecompleto, dato_personal.edad, dato_personal.curp, dato_personal.sexo, dato_personal.fechanacimiento, tratamiento.identificador FROM dato_personal left outer join tratamiento on tratamiento.id_paciente = dato_personal.id where tratamiento.identificador = 'sest' order by dato_personal.id DESC LIMIT 10");
    
    if(isset($_POST['alumnos']))
    {
        $q=$conexion2->real_escape_string($_POST['alumnos']);
        $query=$conexion->prepare("SELECT dato_personal.id, dato_personal.nombrecompleto, dato_personal.edad, dato_personal.curp, dato_personal.sexo, dato_personal.fechanacimiento, tratamiento.identificador FROM dato_personal left outer join tratamiento on tratamiento.id_paciente = dato_personal.id where
            dato_personal.id LIKE '%".$q."%' OR
            dato_personal.nombrecompleto LIKE '%".$q."%' OR
            dato_personal.fechanacimiento LIKE '%".$q."%' OR
            dato_personal.edad LIKE '%".$q."%' OR
            dato_personal.sexo LIKE '%".$q."%' OR
            dato_personal.curp LIKE '%".$q."%' group by dato_personal.id");
    }
        ?>
<strong style="float: right; margin-right: 0%; font-size: 17px; margin-top: 10px; font-style: normal;"><label>Total<input
            type="text" value="<?php echo $fila['total']; ?>" readonly
            style="width: 50px; height: 25px;"></label></strong>

<input type="submit" data-bs-toggle="modal" data-bs-target="#myModal_pacientesinelevacion" value="+Cargar Paciente"
    id="boton_paciente">

<table id="table" class="table table-responsive  table-bordered table-striped table-hover display" width="100%">

    <tbody>
        <?php
        $fecha_actual = new DateTime(date('Y-m-d'));
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        while($dataRegistro= $query->fetch())
        {
            $id_paciente = $dataRegistro['id'];
            $id = $dataRegistro['id_paciente'];
        
        
            if($dataRegistro['identificador'] == 'sest'){
        ?>
        <tr>
            <td id='<?php echo $id_paciente ?>' class='ver-info'>
                <?php echo $dataRegistro['nombrecompleto'].'<br>'.$dataRegistro['curp'].'<br>'.'<strong style="float:right; font-size: 10px; margin-top: -20px;">&nbsp'.$dataRegistro['sexo'].'</strong>'  ?>
            </td>

        </tr>
        <?php }
        } ?>
    </tbody>
</table>



<script>
$(function() {

    $('table').on('click', '.ver-info', function() {

        var id = $(this).prop('id');

        let ob = {
            id: id
        };
        $.ajax({
            type: "POST",
            url: "consultaPacienteBusquedaSest.php",
            data: ob,
            beforeSend: function() {

            },
            success: function(data) {

                $("#tabla_resultado").html(data);

            }
        });

    });
});

$(document).ready(function() {
    $('table').on('click', '.ver-info', function() {

        //Añadimos la imagen de carga en el contenedor
        $('#tabla_resultado').html(
            '<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>'
        );


        return false;
    });
});
</script>