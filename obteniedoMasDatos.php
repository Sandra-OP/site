<?php 
sleep(0.5);

$utimoId = $_REQUEST['utimoId'];
$totalRegist = $_REQUEST['totalregistro'];
$limite  = 3;
	require 'conexionInfarto.php';
    
    $sql = $conexion->prepare("SELECT COUNT(*) total FROM tratamiento where identificador = 'cest'");
    $sql->execute();
    $fila = $sql->fetch(PDO::FETCH_ASSOC);

    $sqlComentLimit = $conexion->prepare("SELECT dato_personal.id, dato_personal.nombrecompleto, dato_personal.edad, dato_personal.curp, dato_personal.sexo, dato_personal.fechanacimiento, tratamiento.identificador FROM dato_personal left outer join tratamiento on tratamiento.id_paciente = dato_personal.id WHERE dato_personal.id < '".$utimoId."' ORDER BY dato_personal.id DESC LIMIT ".$limite."");
    $sqlComentLimit->execute();
	?>
<table>

    <?php
        $sqlComentLimit->fetch(PDO::FETCH_ASSOC);
        while($dataRegistro= $sqlComentLimit->fetch())
        { ?>

    <div class="row border_special item-comentario" id="<?php echo $dataRegistro['id']; ?>">
        <?php
            $id_paciente = $dataRegistro['id'];

            if($dataRegistro['identificador'] == 'cest'){
            ?>

        <tr>
            <td id='<?php echo $id_paciente ?>' class='ver-info'>
                <?php echo $dataRegistro['nombrecompleto'].'<br>'.$dataRegistro['curp'].'<br>'.'<strong style="float:right; font-size: 10px; margin-top: -20px;">&nbsp'.$dataRegistro['sexo']; ?>
            </td>

        </tr>

        <?php } 
        }?>

</table>

<?php
    
if ($totalRegist < $fila) { ?>


<?php }else{ ?>

<div class="col-md-12 col-sm-12">
    <div class="ajax-loader text-center">
        <img src="img/cargando.svg">
        <br>
        Cargando los Registros...
    </div>
</div>
<?php } 
?>