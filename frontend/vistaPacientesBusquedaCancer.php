<script src="js/enviacurp.js"></script>
<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
<link rel="stylesheet" href="css/estilosMenu.css">
<?php
error_reporting(0);
date_default_timezone_set('America/Mexico_City');
        $fecha_actual = new DateTime(date('Y-m-d'));
        
        
            $id_paciente = $dataRegistro['id'];
            $curp = $dataRegistro['curp'];
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
            HAVING count(id_paciente) >= 1)
            and id_paciente = $id_paciente
            ORDER BY id_paciente");
        


            $sql_r = $conexion2->query("SELECT id_paciente, descripcionantecedente
            FROM antecedentespatopersonales
            WHERE id_paciente
            IN (SELECT id_paciente
            FROM antecedentespatopersonales
            GROUP BY id_paciente
            HAVING count(id_paciente) >= 1)
            and id_paciente = $id_paciente
            ORDER BY id_paciente");
            
            $sql_q = $conexion2->query("SELECT id_quirurgico, realizoquirurgico, lateralidad, tipo, curpusuario 
            FROM quirurgico 
            WHERE curpusuario
            IN (SELECT curpusuario FROM quirurgico
            GROUP BY curpusuario
            HAVING count(curpusuario) >= 1)
            and curpusuario = '$curp'
            ORDER BY curpusuario");
            
                
                
                
                
            
        
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
    background-color: #FFE2FE;
    font-family: italic;
 
}
td{
    font-family: italic;
        /*white-space: nowrap; */
}
.containerr{
    background: #EEEEEE;
    margin-top: 45px;
    display: flex;
    justify-content: left;
    padding: 0px;
    position: fixed;
    width: 100%;
    height: 15px;
}
a {
    margin-right: 10px;
}
#eliminarregistro {
    color: red;
}
#expediente {
    color: orange;
}
#editarregistro {
    color: orange;
}
#expediente:hover,
#editarregistro:hover {
    color: blue;
}
</style>
<div id="mensaje"></div>
<input type="hidden" id="idcurp" value="<?php echo $id_paciente; ?>">
<div class="containerr">
    <?php
    if($dataRegistro['curp'] != ''){ ?>
<a href="#" class="mandaid" id="<?php echo $id_paciente ?>"
            >Seguimiento</a>
           
            <a href="consultaExpediente?id=<?php echo $id_paciente ?>" class="" id="expediente"
            >Expediente</a>
            <?php session_start();
                if (isset($_SESSION['usuarioAdmin']) or isset($_SESSION['usuarioMedico'])) { ?>
            <a href="#" onclick="editarRegistro();" id="editarregistro"
            >Editar registro</a>
                <?php };?>
            <a href="#" onclick="eliminarRegistro();" id="eliminarregistro"
            >Eliminar registro</a>
            <?php
    }?>
                </div>
<table id="tabla" class="table table-responsive  table-bordered " cellspacing="0" width="100%">
    <tr>
        <th id="th">Datos personales</th>
        <td><?php echo 'Nombre:&nbsp'.$dataRegistro['nombrecompleto'].'<br>'.'CURP:&nbsp'.$dataRegistro['curp'].'<br>'.'Edad:&nbsp'.$dataRegistro['edad'].'&nbspAños'.'<br>'.'Sexo:&nbsp'.$dataRegistro['sexo'].'<br>'.'Estado:&nbsp'.$rows['estado'].'<br>'.'Municipio:&nbsp'.$rowsm['municipio']; ?>
            
        </td>
    </tr>
    <tr>
    <tr>
        <th id="th">Tipo de cancer</th>
        <td style="color: red;" onclick="canceredit();" id="cancer"><?php echo $dataRegistro['descripcioncancer']?>
        </td>
        
        <script>
        function editarRegistro(){
            var mensaje = confirm("Si procede a editar, se quedara un registro del usuario, fecha y hora que realizo los cambios a los datos del paciente, Desea continuar?")
            if (mensaje == true) {
        swal({
            title: 'Notificación!',
            text: 'Edicion habilitada',
            icon: 'success',

        });
        
    } else {
        swal({
            title: 'Cancelado!',
            text: 'Proceso cancelado',
            icon: 'warning',

        });
    }
        }
        
         function canceredit(){
                let cancerval = $('#cancer').text();
                if(cancerval == null){
                   
                }else{
                $("#seguimiento").modal('show');
                }
             
}
        </script>
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
        <th id="th">Tratamiento</th>
        <td><?php while($row= mysqli_fetch_assoc($sql_q))
{
    if($row['tipo'] == 'Mastectomia'){
    $id_quiru_mastecto = $row['id_quirurgico'];
    }
    if($row['tipo'] == 'Ganglionar'){
      $id_quiru_ganglio = $row['id_quirurgico'];  
    }
   
        echo 'Quirurgico:&nbsp'.$row['realizoquirurgico'].'<br>'.'Lateralidad:&nbsp'.$row['lateralidad'].'<br>'.'Tipo:&nbsp'.$row['tipo'].'<br>'; }?>
        </td>
    </tr>
    <tr>
        <th id="th">Mastectomia</th>
        <td><?php
         require 'conexionCancer.php';
         $query_s = $conexion2->query("SELECT id_mastecto, tipomastecto, fecha from mastecto where id_tipo = $id_quiru_mastecto");
        $row_s = mysqli_fetch_assoc($query_s);
        $id_mastecto1 = $row_s['id_mastecto'];
        echo 'Tipo mastectomia:&nbsp'.$row_s['tipomastecto'].'<br>'.'Fecha:&nbsp'.$row_s['fecha'];?>
        </td>
    </tr>
     <tr>
        <th id="th">Ganglionar</th>
        <td><?php 
        $query_r = $conexion2->query("SELECT id_ganglionar, tipoganglionar, fecha from ganglionar where id_tipo = $id_quiru_ganglio");
        $row_r = mysqli_fetch_assoc($query_r);
        $id_ganglio1 = $row_r['id_ganglionar'];
        echo 'Tipo ganglionar:&nbsp'.$row_r['tipoganglionar'].'<br>'.'Fecha:&nbsp'.$row_r['fecha'];?>
        </td>
    </tr>
     <tr>
        <th id="th">Reconstruccion mastectomia</th>
        <td><?php 
        $query_q = $conexion2->query("SELECT reconstruccion, tiporeconstruccion, fecha from reconstruccion where id_mastecto_ganglio = $id_mastecto1");
        $row_q = mysqli_fetch_assoc($query_q);
        echo 'Reconstruccion:&nbsp'.$row_q['reconstruccion'].'<br>'.'Tipo reconstruccion:&nbsp'.$row_q['tiporeconstruccion'].'<br>'.'Fecha:&nbsp'.$row_q['fecha'];?>
        </td>
    </tr>
    <tr>
        <th id="th">Reconstruccion ganglionar</th>
        <td><?php 
        $query_l = $conexion2->query("SELECT reconstruccion, tiporeconstruccion, fecha from reconstruccion where id_mastecto_ganglio = $id_ganglio1");
        $row_l = mysqli_fetch_assoc($query_l);
        echo 'Reconstruccion:&nbsp'.$row_l['reconstruccion'].'<br>'.'Tipo reconstruccion:&nbsp'.$row_l['tiporeconstruccion'].'<br>'.'Fecha:&nbsp'.$row_l['fecha'];?>
        </td>
    </tr>
    <tr>
        <th id="th">Radioterapia</th>
        <td><?php echo 'Se aplico radioterapia:&nbsp'.$dataRegistro['aplicoradio'].'<br>'.'Tipo radioterapia:&nbsp'.$dataRegistro['decripcionradio'].'<br>'.'Fecha de incio de radioterapia:&nbsp'.$dataRegistro['fecharadio'].'<br>'.'N° de sesiones:&nbsp'.$dataRegistro['numerosesiones'];?>
        </td>
    </tr>
    <tr>
        <th id="th">Quimioterapia</th>
        <td><?php echo 'Se aplico quimioterapia:&nbsp'.$dataRegistro['aplicoquimio'].'<br>'.'Fecha:&nbsp'.$dataRegistro['fechainicio'].'<br>'.'Antraciclinas:&nbsp'.$dataRegistro['antraciclinas'].'<br>'.'Momento de la Qt:&nbsp'.$dataRegistro['momentodelaqt'].'<br>'.'Her 2 ++:&nbsp'.$dataRegistro['her2'].'<br>'.
        'Esquema her 2 ++:&nbsp'.$dataRegistro['esquemaher2'].'<br>'.'Triple negativo:&nbsp'.$dataRegistro['triplenegativo'].'<br>'.'Esquema triple negativo:&nbsp'.$dataRegistro['esquematrilpenegativo'].'<br>'.'Hormonosensible:&nbsp'.$dataRegistro['hormonosensible'].'<br>'.
        'Esquema hormonosensible:&nbsp'.$dataRegistro['esquemahormonosensible'].'<br>'.'Tipo tratameinto:&nbsp'.$dataRegistro['tipotratamiento'].'<br>'.'Completo quimio:&nbsp'.$dataRegistro['completoquimio'].'<br>'.'Causa quimio incompleta:&nbsp'.$dataRegistro['causaqtincompleta'].'<br>'.'Fecha evento adverso:&nbsp'.$dataRegistro['fechaeventoadverso'].'<br>'.
        'Fecha progresión:&nbsp'.$dataRegistro['fechaprogresion'].'<br>'.'Fecha recurrencia:&nbsp'.$dataRegistro['fecharecurrencia'].'<br>'.'Fecha fallecio:&nbsp'.$dataRegistro['fechafallecio'].'<br>'.'Causa fallecio:&nbsp'.$dataRegistro['causafallecio'].'<br>'.'Especifique:&nbsp'.$dataRegistro['especifique'];?>
        </td>
    </tr>
    <tr>
        <th id="th">Braquiterapia</th>
        <td><?php echo 'Se aplico braquiterapia:&nbsp'.$dataRegistro['aplicobraquiterapia'].'<br>'.'Fecha:&nbsp'.$dataRegistro['fechabraquiterapia'];?>
        </td>
    </tr>

</table>
</div>

<script>
function eliminarRegistro() {
    var id = $("#idcurp").val();
    var mensaje = confirm("el registro se eliminara");
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
