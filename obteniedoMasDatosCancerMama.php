<?php 
sleep(0.5);

$utimoId = $_REQUEST['utimoId'];
$totalRegist = $_REQUEST['totalregistro'];
$limite  = 3;
	require 'conexionCancer.php';
    
    $sql = $conexionCancer->prepare("SELECT COUNT(*) total FROM dato_usuario");
    $sql->execute();
    $fila = $sql->fetch(PDO::FETCH_ASSOC);
    $sqlComentLimit= $conexionCancer->prepare("SELECT dato_usuario.id, dato_usuario.curp, dato_usuario.nombrecompleto, dato_usuario.poblacionindigena, dato_usuario.escolaridad, dato_usuario.fechanacimiento, dato_usuario.edad, dato_usuario.sexo, dato_usuario.raza FROM dato_usuario WHERE dato_usuario.id < '".$utimoId."' ORDER BY dato_usuario.id DESC LIMIT ".$limite."");
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

            ?>

        <tr>
            <td id='<?php echo $id_paciente ?>' class='ver-info'>
                <?php echo $dataRegistro['nombrecompleto'].'<br>'.$dataRegistro['curp'].'<br>'.'<strong style="float:right; font-size: 10px; margin-top: -20px;">&nbsp'.$dataRegistro['sexo'].'</strong>' ?>
            </td>

        </tr>

        <?php 
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