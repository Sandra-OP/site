<script src="js/enviacurp.js"></script>
<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
<link rel="stylesheet" href="css/estilosMenu.css">
<?php
error_reporting(0);
date_default_timezone_set('America/Mexico_City');
        $fecha_actual = new DateTime(date('Y-m-d'));
        
        
            $id_paciente = $dataRegistro['id'];
            $id = $dataRegistro['id_paciente'];
            $municipio = $dataRegistro['municipio'];
            $estado = $dataRegistro['estado'];
            require 'conexionCancer.php';
            $sql = $conexion2->query("SELECT id_paciente, datoantecedentefamiliar
            FROM antecedentesfamiliarescancer
            WHERE id_paciente
            IN (SELECT id_paciente
            FROM antecedentesfamiliarescancer
            GROUP BY id_paciente
            HAVING count(id_paciente) >1)
            and id_paciente = $id_paciente
            ORDER BY id_paciente");
        


$sql_r = $conexion2->query("SELECT id_paciente, descripcionantecedente
FROM antecedentespatopersonales
WHERE id_paciente
IN (SELECT id_paciente
FROM antecedentespatopersonales
GROUP BY id_paciente
HAVING count(id_paciente) >1)
and id_paciente = $id_paciente
ORDER BY id_paciente");
                
                
                
                
            
        
            //$fecha1 = new DateTime($dataRegistro['iniciosintomas']);//fecha inicial
           // $fecha2 = new DateTime($dataRegistro['fechaterminotrombolisis']);//fecha de cierre
            
            //$intervalo = $fecha1->diff($fecha2);
            
           // $diasDiferencia = $intervalo->format('%d days %H horas %i minutos');
            $imccalculo = $dataRegistro['imc'];
            $imcbajo = "IMC bajo";
            $imcok= "IMC ok";
            $imcsobre = "Sobrepeso";
            $obe1 = "Obesidad I";
            $obe2 = "Obesidad II";
            $obe3 = "<i class='lnr lnr-flag'></i>";
            $obe4 = "<i class='lnr lnr-flag'></i>";
        if($imccalculo <= 18.5 ){
            $showimc = "<span class='imcbajo'> $imcbajo";
        }elseif($imccalculo > 18.5 and $imccalculo <= 24.9 ){
            $showimc = "<span class='imcok'> $imcok";
        }elseif($imccalculo > 25 and $imccalculo <= 29.9 ){
            $showimc = "<span class='imcsobre'> $imcsobre";
        }elseif($imccalculo > 30 and $imccalculo <= 34.9 ){
            $showimc = "<span class='obesidad1'> $obe1";
        }elseif($imccalculo > 35 and $imccalculo <= 39.9 ){
            $showimc = "<span class='obesidad2'> $obe2";
        }
            require '../esclerosis/conexion.php';
            $sqls = $conexion2->query("SELECT * from t_estado where id_estado = $estado");
            $rows = mysqli_fetch_assoc($sqls);
            
            $sqlsm = $conexion2->query("SELECT * from t_municipio where id_municipio = $municipio");
            $rowsm = mysqli_fetch_assoc($sqlsm);
        
        ?>
<style>
#th {
    background-color: #B5EBF6;
}
</style>
<div id="mensaje"></div>
<input type="hidden" id="idcurp" value="<?php echo $id_paciente; ?>">
<table id="tabla" class="table table-responsive  table-bordered table-hover display" cellspacing="0" width="100%">
    <tr>
        <th id="th">Datos personales</th>
        <td><?php echo 'Nombre:&nbsp'.$dataRegistro['nombrecompleto'].'<br>'.'CURP:&nbsp'.$dataRegistro['curp'].'<br>'.'Edad:&nbsp'.$dataRegistro['edad'].'&nbspAños'.'<br>'.'Sexo:&nbsp'.$dataRegistro['sexo'].'<br>'.'Estado:&nbsp'.$rows['estado'].'<br>'.'Municipio:&nbsp'.$rowsm['municipio']; ?>
            <a href="#" class="mandaid" id="<?php echo $id_paciente ?>"
                style="float: right; margin-top: -30px">Seguimiento</a><br>
            <a href="consultaExpediente?id=<?php echo $id_paciente ?>" class="" id="expediente"
                style="float: right; margin-top: -30px;">Expediente</a><br>
            <a href="#" onclick="eliminarRegistro();" id="expediente"
                style="float: right; margin-top: -30px; color: red;">Eliminar registro</a>
        </td>
    </tr>
    <tr>
    <tr>
        <th id="th">Patologia</th>
        <td style="color: red;"><?php echo $dataRegistro['descripcioncancer']?>
        </td>
    </tr>
    <tr>

        <th id="th">Antecedentes Heredofamiliares</th>

        <td><?php while($dataRegis= mysqli_fetch_assoc($sql))
        {
        echo '&nbsp&nbsp'.$dataRegis['datoantecedentefamiliar'].'--'.'';} ?></td>

    </tr>
    <tr>

        <th id="th">Antecedentes Personales Patologicos</th>

        <td><?php while($dataRegist= mysqli_fetch_assoc($sql_r))
{
echo '&nbsp&nbsp'.$dataRegist['descripcionantecedente'].'--'.'';} ?></td>

    </tr>

    <tr>
        <th id="th">Signos vitales</th>
        <td><?php echo 'Frecuencia cardiaca:&nbsp'.$dataRegistro['frecuenciacardiaca'].'<br>'.'Presión arterial:&nbsp'.$dataRegistro['presionarterial'].'<br>'.'Talla:&nbsp'.$dataRegistro['talla'].'<br>'.'Peso:&nbsp'.$dataRegistro['peso'].'<br>'.
        'IMC:&nbsp'.$dataRegistro['imc'].'&nbsp'.$showimc?></td>
    </tr>

    <tr>
        <th id="th">Antecedentes Gineco Obstetricos</th>
        <td><?php echo 'Menarca:&nbsp'.$dataRegistro['menarca'].'<br>'.'Ultima mestruación:&nbsp'.$dataRegistro['ultimamestruacion'].'<br>'.'Cuenta con:&nbsp'.$dataRegistro['cuentacon'].'<br>'.
        'Gestas:&nbsp'.$dataRegistro['gestas'].'<br>'.'Parto:&nbsp'.$dataRegistro['parto'].'<br>'.'Aborto:&nbsp'.$dataRegistro['aborto'].'<br>'.'Cesrea:&nbsp'.$dataRegistro['cesarea'].'<br>'.
        'Terapia de reemplazo hormonal:&nbsp'.$dataRegistro['terapiareemplazohormonal'].'<br>'.'Lactancia:&nbsp'.$dataRegistro['lactancia'].'<br>'.'Tiempo Lactancia:&nbsp'.$dataRegistro['tiempolactancia'] ?>
        </td>
    </tr>


    <tr>
        <th id="th">Atención Clinica</th>
        <td><?php echo 'Fecha de atención inicial:&nbsp'.$dataRegistro['fechaatencioninicial'].'<br>'.'BIRADS de referencia:&nbsp'.$dataRegistro['biradsreferencia'].'<br>'.
        'BIRADS HRAEI:&nbsp'.$dataRegistro['biradshraei'].'<br>'.'Lateralidad:&nbsp'.$dataRegistro['lateralidad'].'<br>'.'Etapa clinca:&nbsp'.$dataRegistro['etapaclinica'].'<br>'.
        'Tamaño tumoral:&nbsp'.$dataRegistro['tamaniotumoral'].'<br>'.'Compromiso linfatico nodal:&nbsp'.$dataRegistro['compromisolenfatico'].'<br>'.'Metastasis:&nbsp'.$dataRegistro['metastasis'].'<br>'.
        'Sitio metastasis:&nbsp'.$dataRegistro['sitiometastasis'].'<br>'.'Calidad de vida ECOG:&nbsp'.$dataRegistro['calidadvidaecog']?>
        </td>
    </tr>

    <tr>
        <th id="th">Histopatologia</th>
        <td><?php echo 'DX histopatologico:&nbsp'.$dataRegistro['dxhistopatologico'].'<br>'.'Fecha DX histopatologico:&nbsp'.$dataRegistro['fechadxhistopatologico'].'<br>'.'ESCALA SBR (SCARLET-BLOOM-RICHARDSON):&nbsp'.$dataRegistro['escalasbr'] ?>
        </td>
    </tr>
    <tr>
        <th id="th">Inmunohistoquimica</th>
        <td><?php echo 'RECEPTORES DE ESTROGENOS (RE):&nbsp'.$dataRegistro['receptoresestrogenos'].'<br>'.'RECEPTORES DE PROGESTERONA (RP):&nbsp'.$dataRegistro['receptoresprogesterona'].'<br>'.'KI-67:&nbsp'.$dataRegistro['ki67'].'<br>'.'Triple negativo:&nbsp'.$dataRegistro['triplenegativo'].'<br>'.
        'Aplico PDL:&nbsp'.$dataRegistro['aplicopdl'].'<br>'.'PDL:&nbsp'.$dataRegistro['descripcionpdl'].'<br>'.'ONCOGEN HER2:&nbsp'.$dataRegistro['oncogenher2'].'<br>'.'Fish:&nbsp'.$dataRegistro['fish']?>
        </td>
    </tr>
    <tr>
        <th id="th">Radioterapia</th>
        <td><?php echo 'Se aplico radioterapia:&nbsp'.$dataRegistro['aplicoradio'].'<br>'.'Tipo radioterapia:&nbsp'.$dataRegistro['decripcionradio'].'<br>'.'Fecha de incio de radioterapia:&nbsp'.$dataRegistro['fecharadio'].'<br>'.'N° de sesiones:&nbsp'.$dataRegistro['numerosesiones']?>
        </td>
    </tr>

</table>
</div>


<script>
function eliminarRegistro() {
    var id = $("#idcurp").val();
    var mensaje = confirm("el registro se eliminara")
    let parametros = {
        id: id
    }
    if (mensaje == true) {
        $.ajax({
            data: parametros,
            url: 'aplicacion/eliminarRegistroCancer.php',
            type: 'post',
            beforeSend: function() {
                $("#mensaje").html("Procesando, espere por favor");
            },
            success: function(response) {
                $("#mensaje").html(response);
                $("#tabla_resultadobus").load('consultacancerdemama.php');
                $("#tabla_resultado").load('consultaCancerdeMamaBusqueda.php');

            }
        });
    } else {
        swal({
            title: 'Cancelado!',
            text: 'Proceso cancelado',
            icon: 'warning',

        });
    }
}
</script>