<?php
// simple conexion a la base de datos
function connect(){
	return new mysqli("localhost","u972837353_cisfa","cisfaHraei123","u972837353_proveedor");
}
$con = connect();
if (!$con->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
       die("Error cargando el conjunto de caracteres utf8");
}

?>