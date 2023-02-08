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
    font-size: 12px;
    width: 14rem;
    float: right;
    text-align: right;
    padding: 3px;
 
}
#td{
    font-family: italic;
    font-family: italic;
    font-size: 12px;
    width: 100rem;
    padding: 3px;
 
}
.containerr{
    background: #EEEEEE;
    margin-top: 45px;
    display: flex;
    justify-content: flex-start;
    position: fixed;
    width: 73%;
    height: auto;
    font-size: 13px;
    padding: 2px;
    border-radius: 0px 0px 0px 0px;
    
}
.containerr2{
    background: grey;
    margin-top: 70px;
    display: flex;
    justify-content: center;
    border-radius: 15px 15px 0px 0px;
    padding: 0px;
    width: 100%;
    height: 15px;
    color: white;
}
.containerr3{
    background: grey;
    margin-top: -12px;
    display: flex;
    justify-content: center;
    border-radius: 15px 15px 0px 0px;
    padding: 0px;
    width: 100%;
    height: 15px;
    color: white;
}
table {
    border-radius: 0px 0px 15px 15px;
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
    color: white;
    background: orange;
    border: none;
    font-size: 10px;
    padding: 4px;
    margin-left: 5px;
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
            <input type="submit" onclick="editarRegistro();" id="editarregistro" value="Editar registro">
                <?php };?>
        
            <?php
    }?>
                </div>
<table  class="table table-responsive  table-bordered " cellspacing="0" width="100%">

    
    <div class="containerr2">Datos Personales</div>
    <tr>
        <th id="th">Nombre:</th>
        <td id="td"><?php echo $dataRegistro['nombrecompleto']?></tr>
        <tr>
        <th id="th">CURP:</th>
        <td id="td"><?php echo $dataRegistro['curp'] ?></tr>
        <tr>
        <th id="th">Edad:</th>
        <td id="td"><?php echo $dataRegistro['edad'] ?></tr>
        <tr>
        <th id="th">Sexo:</th>
        <td id="td"><?php echo $dataRegistro['sexo'] ?></tr>
    </tr>
    </tr></table>
    <table  class="table table-responsive  table-bordered " cellspacing="0" width="100%">        
    
    <div class="containerr3">ECOG</div>
    <tr>
        <th id="th">Calidad de vida ECOG</th>
        <td id="td"><?php echo $dataRegistro['calidadvidaecog'] ?></td>
    </tr></table>

<table  class="table table-responsive  table-bordered " cellspacing="0" width="100%">        
    
    <div class="containerr3">Progresión de la enfermedad</div>
    <tr>
        <th id="th">Progresión de la enfermedad</th>
        <td id="td"><?php echo $dataRegistro['progresionenfermedad'] ?></td>
    </tr>
    
    <tr>
        <th id="th">Fecha:</th>
        <td id="td"><?php echo $dataRegistro['fechadxprogresion'] ?></td>
    </tr></table>
<table  class="table table-responsive  table-bordered " cellspacing="0" width="100%">        
    
    <div class="containerr3">Recurrencia de la enfermedad:</div>
    <tr>
        <th id="th">Recurrencia de la enfermedad</th>
        <td id="td"><?php echo $dataRegistro['recurrenciaenfermedad']?></td>
    </tr>
    <tr>
        <th id="th">Fecha recurrencia:</th>
        <td id="td"><?php echo $dataRegistro['fecharecurrencia']?></td>
    </tr></table>
<table  class="table table-responsive  table-bordered " cellspacing="0" width="100%">        
    
    <div class="containerr3">Requirio intervención:</div>

    <tr>
        <th id="th">Requirio intervención</th>
        <td id="td"><?php echo $dataRegistro['ameritareintervencion']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de la reintervención:</th>
        <td id="td"><?php echo $dataRegistro['fechareintervencion'] ?></td>
    </tr>
    <tr>
        <th id="th">Lateralidad:</th>
        <td id="td"><?php echo $dataRegistro['lateralidad'] ?></td>
    </tr></table>
<table  class="table table-responsive  table-bordered " cellspacing="0" width="100%">        
    
    <div class="containerr3">Amerita QT:</div>
    <tr>
        <th id="th">Amerita QT</th>
        <td id="td"><?php echo $dataRegistro['ameritanuevaqt'] ?></td>
    </tr>
    <tr>
        <th id="th">Fecha QT:</td>
        <td id="td"><?php echo $dataRegistro['fechanuevaqt'] ?></td>
    </tr>
    <tr>
        <th id="th">Tipo:</td>
        <td id="td"><?php echo $dataRegistro['tiponuevaqt'] ?></td>
    </tr>
    <tr>
        <th id="th">Tratamiento:</td>
        <td id="td"><?php echo $dataRegistro['tratamientoqt'] ?></td>
    </tr></table>
    
<table  class="table table-responsive  table-bordered " cellspacing="0" width="100%">        
    
    <div class="containerr3">Amerita radioterapia:</div>
    <tr>
        <th id="th">Amerita radioterapia</th>
        <td id="td"><?php echo $dataRegistro['ameritaradioterapia']?></td>
    </tr>
    <tr>
        <th id="th">Tipo radioterapia:</th>
        <td id="td"><?php echo $dataRegistro['tiporadioterapia']?></td>
    </tr>
    <tr>
        <th id="th">Fecha radioterapia:</th>
        <td id="td"><?php echo $dataRegistro['fechainicioradio']?></td>
    </tr>
    <tr>
        <th id="th">N° de sesiones</th>
        <td id="td"><?php echo $dataRegistro['numerosesiones']?></td>
    </tr></table>
    <table  class="table table-responsive  table-bordered " cellspacing="0" width="100%">        
    
    <div class="containerr3">Braquiterapia:</div> 
    <tr>
        <th id="th">Braquiterapia</th>
        <td id="td"><?php echo $dataRegistro['ameritabraquiterapia']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de braquiterapia:</th>
        <td id="td"><?php echo $dataRegistro['fechainiciobraquiterapia']?></td>
    </tr></table>
    <table  class="table table-responsive  table-bordered " cellspacing="0" width="100%">        
    
    <div class="containerr3">Cuidados paliativos:</div>  
    <tr>
        <th id="th">Cuidados paliativos</th>
        <td id="td"><?php echo $dataRegistro['cuidadospaliativos'];?></td>
    </tr>
    <tr>
        <th id="th">Tipo de cuidado:</th>
        <td id="td"><?php echo $dataRegistro['tipocuidadopaliativo'];?></td>
    </tr></table>
<table  class="table table-responsive  table-bordered " cellspacing="0" width="100%">        
    
    <div class="containerr3">Protocolo clinico:</div> 
    <tr>
        <th id="th">Protocolo clinico</th>
        <td id="td"><?php echo $dataRegistro['protocoloclinico']?></td>
    </tr></table>
<table  class="table table-responsive  table-bordered " cellspacing="0" width="100%">        
    
    <div class="containerr3">>Protocolo de investigación:</div>   
    <tr>
        <th id="th">Protocolo de investigación</th>
        <td id="td"><?php echo $dataRegistro['protocoloinvestigacion']?></td>
    </tr></table>

</div>



