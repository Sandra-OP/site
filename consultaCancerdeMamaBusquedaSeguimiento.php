<?php 
error_reporting(0);
date_default_timezone_set('America/Mexico_City');
require 'conexionCancer.php';
$id = $_POST['id'];
$query= $conexionCancer->prepare("SELECT *, dato_usuario.curp, dato_usuario.nombrecompleto, dato_usuario.sexo, dato_usuario.edad from seguimientocancer 
left outer join dato_usuario on dato_usuario.id = seguimientocancer.id_paciente
where id_paciente= $id");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$dataRegistro= $query->fetch();
if($query != false){
    require 'frontend/vistaPacientesBusquedaCancerSeguimiento.php';
}else{
    
}
return $dataRegistro['id_paciente'] ?? 'default value';

?>