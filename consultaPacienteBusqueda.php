<?php 
error_reporting(0);
date_default_timezone_set('America/Mexico_City');
require 'conexionCancer.php';
$id = $_POST['id'];
$query= $conexionCancer->prepare("SELECT *, 
tratamiento.killipkimball,tratamiento.fevi,tratamiento.choquecardiogenico,tratamiento.revascularizacionprevia,tratamiento.localizacion,tratamiento.primercontacto,tratamiento.puertabalon,tratamiento.trombolisis, tratamiento.fechainiciotrombolisis, tratamiento.fechaterminotrombolisis, tratamiento.tipofibrinolitico,tratamiento.tiempoisquemiatotal,tratamiento.revascularizacion,tratamiento.diseccion,tratamiento.iam_periprocedimiento,tratamiento.complicaciones,tratamiento.flujo_microvascular_tmp,tratamiento.flujo_final_tfj,tratamiento.trombosis_definitiva,tratamiento.marcapasos_temporal,tratamiento.estancia_hospitalaria,tratamiento.reestenosis_instrastent,tratamiento.reehospitalizacion_one_year,tratamiento.escalas_riesgo,tratamiento.iam_tres_years,tratamiento.cruc_tres_years,tratamiento.defuncion,tratamiento.causadefuncion,tratamiento.id_paciente FROM dato_usuario left outer join tratamiento on tratamiento.id_paciente = dato_usuario.id where tratamiento.identificador = 'cest' and dato_usuario.id = $id");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$dataRegistro= $query->fetch();
if($query != false){
    require 'frontend/vistaPacientesBusqueda.php';
}else{

}
return $dataRegistro['id'] ?? 'default value';
?>