<?php 
date_default_timezone_set('America/Mexico_City');
require 'conexionInfarto.php';
$id = $_POST['id'];
$query= $conexion->prepare("SELECT *, tratamiento.killipkimball,tratamiento.fevi,tratamiento.choquecardiogenico,tratamiento.revascularizacionprevia,tratamiento.localizacion,tratamiento.primercontacto,tratamiento.puertabalon,tratamiento.trombolisis, tratamiento.fechainiciotrombolisis, tratamiento.fechaterminotrombolisis, tratamiento.tipofibrinolitico,tratamiento.tiempoisquemiatotal,tratamiento.revascularizacion,tratamiento.diseccion,tratamiento.iam_periprocedimiento,tratamiento.complicaciones,tratamiento.flujo_microvascular_tmp,tratamiento.flujo_final_tfj,tratamiento.trombosis_definitiva,tratamiento.marcapasos_temporal,tratamiento.estancia_hospitalaria,tratamiento.reestenosis_instrastent,tratamiento.reehospitalizacion_one_year,tratamiento.escalas_riesgo,tratamiento.iam_tres_years,tratamiento.cruc_tres_years,tratamiento.defuncion,tratamiento.causadefuncion,tratamiento.id_paciente FROM dato_personal left outer join tratamiento on tratamiento.id_paciente = dato_personal.id where tratamiento.identificador = 'sest' and dato_personal.id = $id");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
if($query != false){
    require 'frontend/vistaPacientesBusqueda.php';
}else{

}
$conexion2->close();

?>