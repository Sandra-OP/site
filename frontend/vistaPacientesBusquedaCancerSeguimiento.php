<script src="js/enviacurp.js"></script>
<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
<link rel="stylesheet" href="css/estilosMenu.css">
<?php
error_reporting(0);
date_default_timezone_set('America/Mexico_City');
        $fecha_actual = new DateTime(date('Y-m-d'));
        
        
            $id_paciente = $dataRegistro['id_paciente'];
           
            
        
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
require 'conexionCancer.php';
        $sql_busqueda = $conexionCancer->prepare("SELECT id_paciente from seguimientocancer where id_paciente = $id_paciente");
    $sql_busqueda->execute();
    $sql_busqueda->setFetchMode(PDO::FETCH_ASSOC);
    $validacion = $sql_busqueda->fetch();
        $validaid = $validacion['id_paciente'];
    if($dataRegistro['id_paciente'] != ''){ ?>
       
          
            <a href="consultaExpediente?id=<?php echo $id_paciente ?>" class="" id="expediente"
            >Expediente</a>
            <?php session_start();
                if (isset($_SESSION['usuarioAdmin']) or isset($_SESSION['usuarioMedico'])) { ?>
            <a href="#" onclick="editarRegistro();" id="editarregistro"
            >Editar registro</a>
                <?php };?>
           
            <?php
    }?>
                </div>
<table id="tabla" class="table table-responsive  table-bordered " cellspacing="0" width="100%">
     <tr>
        <th id="th">Datos personales</th>
        <td><?php echo 'Nombre:&nbsp'.$dataRegistro['nombrecompleto'].'<br>'.'CURP:&nbsp'.$dataRegistro['curp'].'<br>'.'Edad:&nbsp'.$dataRegistro['edad'].'&nbspAños'.'<br>'.'Sexo:&nbsp'.$dataRegistro['sexo'].'<br>' ?>
            
        </td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio de vigilancia</th>
        <td><?php echo 'Fecha:&nbsp'.$dataRegistro['fechainiciovigilancia'].'<br>' ?>
       
        </td>
    </tr>
  

    <tr>
        <th id="th">Progresión de la enfermedad</th>
        <td><?php echo 'Progesión:&nbsp'.$dataRegistro['progresionenfermedad'].'<br>'.'Fecha:&nbsp'.$dataRegistro['fechadxprogresion'].'<br>' ?></td>
    </tr>

    <tr>
        <th id="th">Recurrencia de la enfermedad</th>
        <td><?php echo 'Recurrencia:&nbsp'.$dataRegistro['recurrenciaenfermedad'].'<br>'.'Fecha recurrencia:&nbsp'.$dataRegistro['fecharecurrencia'].'<br>'?>
        </td>
    </tr>


    <tr>
        <th id="th">Requirio intervención</th>
        <td><?php echo 'Intervención:&nbsp'.$dataRegistro['ameritareintervencion'].'<br>'.'Fecha de la reintervención:&nbsp'.$dataRegistro['fechareintervencion'].'<br>'.
        'Lateralidad:&nbsp'.$dataRegistro['lateralidad'].'<br>'?>
        </td>
    </tr>

    <tr>
        <th id="th">Amerita QT</th>
        <td><?php echo 'Amerita QT:&nbsp'.$dataRegistro['ameritanuevaqt'].'<br>'.'Fecha:&nbsp'.$dataRegistro['fechanuevaqt'].'<br>'.'Tipo:&nbsp'.$dataRegistro['tiponuevaqt'].'<br>'.'Tratamiento:&nbsp'.$dataRegistro['tratamientoqt'] ?>
        </td>
    </tr>
    <tr>
        <th id="th">Amerita radioterapia</th>
        <td><?php echo 'Radioterapia:&nbsp'.$dataRegistro['ameritaradioterapia'].'<br>'.'Tipo de radioterapia:&nbsp'.$dataRegistro['tiporadioterapia'].'<br>'.'Fecha:&nbsp'.$dataRegistro['fechainicioradio'].'<br>'.'Numero de sesiones:&nbsp'.$dataRegistro['numerosesiones'].'<br>'?>
        </td>
    </tr>
    
    <tr>
        <th id="th">Braquiterapia</th>
        <td><?php echo 'Amerita braquiterapia:&nbsp'.$dataRegistro['ameritabraquiterapia'].'<br>'.'Fecha de braquiterapia:&nbsp'.$dataRegistro['fechainiciobraquiterapia'].'<br>'?>
        </td>
    </tr>

    <tr>
        <th id="th">Cuidados paliativos</th>
        <td><?php echo 'Cuidado paliativo:&nbsp'.$dataRegistro['cuidadospaliativos'].'<br>'.'Tipo de cuidado:&nbsp'.$dataRegistro['tipocuidadopaliativo'];?>
        </td>
    </tr>
    <tr>
        <th id="th">Protocolo clinico</th>
        <td><?php echo 'Protocolo clinico:&nbsp'.$dataRegistro['protocoloclinico'].'<br>'?>
        </td>
    </tr>
    <tr>
        <th id="th">Protocolo de investigación</th>
        <td><?php echo 'Protocolo de investigación:&nbsp'.$dataRegistro['protocoloinvestigacion'].'<br>'?>
        </td>
    </tr>

</table>
</div>

