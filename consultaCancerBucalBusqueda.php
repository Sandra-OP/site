<?php 
error_reporting(0);
date_default_timezone_set('America/Mexico_City');
require 'conexionCancer.php';
$id = $_POST['id'];
$query= $conexionCancer->prepare("SELECT *, 
antecedentesgineco.menarca, antecedentesgineco.ultimamestruacion, antecedentesgineco.cuentacon, antecedentesgineco.gestas, antecedentesgineco.parto, antecedentesgineco.aborto, 
antecedentesgineco.cesarea, antecedentesgineco.terapiareemplazohormonal, antecedentesgineco.lactancia, antecedentesgineco.tiempolactancia, antecedentesgineco.id_paciente,
signosvitales.frecuenciacardiaca, signosvitales.presionarterial, signosvitales.talla, signosvitales.peso, signosvitales.imc,
atencionclinica.*,
histopatologia.*,
inmunohistoquimica.*,
cancerpaciente.descripcioncancer,
radioterapia.aplicoradio,
tiporadioterapia.*  
FROM dato_usuario 
left outer join antecedentesgineco on antecedentesgineco.id_paciente = dato_usuario.id
left outer join signosvitales on signosvitales.id_paciente = dato_usuario.id
left outer join atencionclinica on atencionclinica.id_usuario = dato_usuario.id
left outer join histopatologia on histopatologia.id_usuario = dato_usuario.id
left outer join inmunohistoquimica on inmunohistoquimica.id_usuario = dato_usuario.id
left outer join cancerpaciente on cancerpaciente.id_paciente = dato_usuario.id
left outer join radioterapia on radioterapia.id_paciente = dato_usuario.id
left outer join tiporadioterapia on tiporadioterapia.id_radio = radioterapia.id_radio
where dato_usuario.id = $id");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$dataRegistro= $query->fetch();
if($query != false){
    require 'frontend/vistaPacientesBusquedaBucal.php';
}else{
    
}
return $dataRegistro['id'] ?? 'default value';
