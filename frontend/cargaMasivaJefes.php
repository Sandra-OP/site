<?php
error_reporting(0);

include('dbconect.php');
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');
 
     
if (isset($_POST["import"]))
{
    
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','text/csv','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'subidas/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
                $numTrabajador = "";
                if(isset($Row[0])) {
                    $numTrabajador = mysqli_real_escape_string($con,$Row[0]);
                }
                $rfc = "";
                if(isset($Row[1])) {
                    $rfc = mysqli_real_escape_string($con, hash('sha512',$Row[1]));
                }
                $curp = "";
                if(isset($Row[2])) {
                    $curp = mysqli_real_escape_string($con,$Row[2]);
                }
                $correo = "";
                if(isset($Row[3])) {
                    $correo = mysqli_real_escape_string($con,$Row[3]);
                }
                $rol = "";
                if(isset($Row[4])) {
                    $rol = mysqli_real_escape_string($con,$Row[4]);
                }
                
          
                    $query = "INSERT into usuarioslogeojefes(id_usuariologeo, numTrabajador, password, curp, correo, rol) values(null, '".$numTrabajador."','".$rfc."','".$curp."','".$correo."','".$rol."')";
                    $resultados = mysqli_query($con, $query);
                    
                 /*   $querY = "SELECT * FROM usuarioslogeo";
                    $result = mysqli_query($con, $querY);
                    
                 
                    
                 while($row= $result->fetch_assoc())
        {
            ignore_user_abort(true);
            set_time_limit(0);
                
                            $rfc = $row['password'];
                            $id = $row['numTrabajador'];
                            $password = hash('sha512', $rfc);
                  
                    $querYs = "UPDATE usuarioslogeo set password = '$password' where numTrabajador = $id";
                    $results = mysqli_query($con, $querYs);
        }   */   
            if (!empty($resultados)) {
                        $type = "success";
                        $message = "Excel importado correctamente";
                    } else {
                        
                        $type = "error";
                        $message = "Hubo un problema al importar registros";
                    }
            }  
            
        }            

}else{ 
        $type = "error";
        $message = "El archivo enviado es invalido. Por favor vuelva a intentarlo";
  }


}
     
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    <link href="assets/sticky-footer-navbar.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../cisfa/css/styles.css">
    <link rel="stylesheet" href="../cisfa/css/main.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

</head>

<body>
    <style>
    .titulo {

        font-size: 27px;
        color: blue;
        text-align: center;
    }

    .titulo2 {

        font-size: 27px;
        color: green;
        text-align: center;
    }

    .titulo3 {

        font-size: 27px;
        color: red;
        text-align: center;
    }

    td:hover {
        background: #BAC0C4;
    }

    td {
        cursor: pointer;
    }
    </style>

    <header>



        <strong id="cabecera" style="color: white; float: left; margin-left: 42%; font-size: 18px;">CONSTANCIAS
            RH</strong>

    </header><br>



    <!-- Begin page content -->
    <script>
    /*
$(document).ready(function() {    
    $('.btn-danger').on('click', function(){
        //Añadimos la imagen de carga en el contenedor
        
        $('#cargando').html('<div id="cargando" style="position: fixed; margin-top: 10%; margin-left: 40%;  width: 100%; height: 100%; z-index: 9999;  opacity: .8; "><img src="imagenes/carga.gif" alt="loading" /><br/>Un momento, por favor...</div>');
 
        
        return false;
    });              
}); 
*/
    </script>
    <div style="width: 100%; padding: 1%; margin-top: 0px;">
        <input type="submit" class="btn btn-warning" value="Cerrar ventana" style="float: right; margin-top: 30px;"
            onclick="window.close();">
        <h3 class="mt-5">Importar archivo Empleados a tomar curso o capacitación</h3>
        <hr>

        <div class="row">
            <div class="col-12 col-md-12">
                <!-- Contenido -->

                <div class="outer-container">
                    <form action="" method="post" name="frmExcelImport" id="frmExcelImport"
                        enctype="multipart/form-data">
                        <div>
                            <label>Cargar Archivo</label> <input type="file" name="file" id="file"
                                accept=".xls,.xlsx,.csv">
                            <input type="submit" name="import" id="carga" class="btn btn-success"
                                value="  +  Importar Registros">

                        </div>

                    </form>

                </div>


                <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
                    <?php if(!empty($message)) { echo $message; } ?></div>


                <?php
require '../cisfa/conexion.php';
  $query=$conexion2->query("SELECT * FROM usuarioslogeojefes");
    
   
if (mysqli_num_rows($query) > 0)
{

   ?>
                <table id="tabla" class="table table-responsive table-striped table-bordered table-hover display"
                    cellspacing="0" width="100%">
                    <thead>
                        <tr style="background-color:#7C7C7C; color: white; font-style: italic; ">

                            <th>N° trabajador</th>
                            <th>Password</th>
                            <th>CURP</th>
                            <th>Correo</th>

                        </tr>
                    </thead>

                    <?php
    while($filaAlumnos= $query->fetch_assoc())
        {
    
     echo
            '<tr>
            <input type="hidden" value='.$id.' id="seleccionValor">
             
                <td id='.$id.' class="ver-info" title="Click para ver información completa">'.$filaAlumnos['numTrabajador'].'</td>
                <td>'.$filaAlumnos['password'].'</td>
                <td>'.$filaAlumnos['curp'].'</td>
                <td>'.$filaAlumnos['correo'].'</td>
                
             </tr>';
            
            
        }
    }else{
        echo "<script>alert('Error en la busqueda de información');</script>";
    }
    
    ?>
                    <!-- Fin Contenido -->
            </div>
        </div>
        <!-- Fin row -->


    </div>
    <!-- Fin container -->

</body>

</html>