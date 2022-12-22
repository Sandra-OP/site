<div class="modal fade in" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" id="cancerdeMama">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/estilosMenu.css" rel="stylesheet">
    <script src="js/getCatalogos.js"></script>
    <script src="js/scriptModalvalidacionCancerMama.js"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->

        <div class="modal-content">
            <div class="modal-header" id="cabeceraModalMama">
                <button type="button" class="close" data-bs-dismiss="modal" onclick="limpiar();">&times;</button>
                <h5 class="modal-title">Datos de un paciente</h5>
            </div>
            <div class="modal-body">

                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="modal-body">

                            <!-- form start -->
                            <div class="form-header">
                                <h3 class="form-title"
                                    style="text-align: center; color:blueviolet; background-color:antiquewhite; margin-top: 5px;">
                                    FICHA DE DATOS</h3>

                            </div>

                            <form name="formulario" id="formulario" onSubmit="return limpiar()" autocomplete="off">
                                <div class="form-row">
                                    <div id="mensaje"></div>
                                    <script>
                                    $("#formulario").on("submit", function(e) {
                                        if ($('input[name=curp]').val().length == 0 || $(
                                                'input[name=nombrecompleto]')
                                            .val().length == 0 || $('select[name=cbx_estado]').val().length == 0
                                        ) {
                                            alert('Ingrese los datos requeridos');

                                            return false;
                                        }
                                        let checked = this.querySelectorAll('input[type=checkbox]:checked');
                                        e.preventDefault();

                                        var formData = new FormData(document.getElementById(
                                            "formulario"));
                                        formData.append("dato", "valor");

                                        $.ajax({

                                            url: "aplicacion/registrarpacienteCancer.php",
                                            type: "post",
                                            dataType: "html",
                                            data: formData,
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            success: function(datos) {
                                                $("#mensaje").html(datos);

                                            }
                                        })
                                    })
                                    </script>
                                    <style>
                                        .control{
                                            border: none;
                                            outline: none;
                                            border-bottom: 1px solid grey;
                                            font-size: 12px;
                                        }
                                        </style>
                                    <div class="col-md-6" autocomplete="off">

                                        <input id="year" name="year" class="form-control" type="hidden" value="2022"
                                            required="required" readonly>
                                    </div>
                                    <div class="col-md-12">

                                        <input id="cest" name="cest" type="hidden" class="form-control" value="cest">
                                    </div>
                                    <div class="col-md-3">
                                        <strong>CURP</strong>
                                        <input id="curp" name="curp" type="text" class="control col-md-12" value=""
                                            onblur="curp2date();" minlength="18" maxlength="18" required>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Nombre Completo</strong>
                                        <input id="nombrecompleto" name="nombrecompleto" onblur="calcularEdad();"
                                            type="text" class="control control col-md-12" value="" required>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Población indigena</strong>
                                        <input id="poblacionindigena" name="poblacionindigena" type="text"
                                            class="control control col-md-12" value="" required>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Discapacidad</strong>
                                        <select name="discapacidad" id="discapacidad" class="control control col-md-12">
                                            <option value="">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Escolaridad</strong>
                                        <select id="escolaridad" name="escolaridad" class="control control col-md-12">
                                            <option value="0">Seleccione </option>
                                            <?php 
				    require 'conexionInfarto.php';
				        $query = $conexionCancer->prepare("SELECT id_escolaridad, gradoacademico FROM escolaridad");
                        $query->execute();
                        $query->setFetchMode(PDO::FETCH_ASSOC);
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['gradoacademico']; ?>">
                                                <?php echo $row['gradoacademico']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Fecha de nacimiento</strong>
                                        <input id="fecha" name="fecha" type="date" value="" onblur="curp2date();"
                                            class="control control col-md-12" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Edad</strong>
                                        <input id="edad" name="edad" type="text" class="control control col-md-12" value="" readonly>
                                    </div>

                                    <div class="col-md-2">
                                        <strong>Sexo</strong>
                                        <input type="text" class="control control col-md-12" id="sexo" onclick="curp2date();"
                                            name="sexo" readonly>

                                    </div>
                                    <div class="col-md-2">
                                        <strong>Raza</strong>
                                        <input type="text" class="control control col-md-12" id="raza" onclick="curp2date();"
                                            name="raza">

                                    </div>
                                    <div class="col-md-3">
                                        <strong>Frecuencia cardiaca</strong>
                                        <input type="text" class="control control col-md-12" id="frecuenciacardiaca"
                                            name="frecuenciacardiaca">

                                    </div>
                                    <div class="col-md-3">
                                        <strong>Presión arterial</strong>
                                        <input type="text" class="control control col-md-12" id="presionarterial"
                                            name="presionarterial">

                                    </div>
                                    <script>
                                    $(document).ready(function() {
                                        $('#presionarterial').mask('000/000');
                                    });
                                    $(document).ready(function() {
                                        $('#talla').mask('0.00');
                                    });
                                    </script>
                                    <div class="col-md-2">
                                        <strong>Talla</strong>
                                        <input type="number" step="any" class="control control col-md-12" id="talla" name="talla"
                                            required>

                                    </div>
                                    <div class="col-md-2">
                                        <strong>Peso</strong>
                                        <input type="number" step="any" class="control control col-md-12" id="peso"
                                            onblur="calculaIMC();" name="peso" required>

                                    </div>
                                    <div class="col-md-2">
                                        <strong>IMC</strong>
                                        <input type="text" class="control control col-md-12" id="imc" onblur="calculaIMC();"
                                            name="imc" value="" readonly>

                                    </div>

                                    <div class="col-md-6">
                                        <strong>Estado de residencia</strong>

                                        <select name="cbx_estado" id="cbx_estado" class="control control col-md-12"
                                            style="width: 100%;" required>
                                            <option value="" selected></option>
                                            <?php 
				    require '../esclerosis/conexion.php';
				  $query = "SELECT id_estado, estado FROM t_estado ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['id_estado']; ?>">
                                                <?php echo $row['estado']; ?></option>
                                            <?php } ?>

                                            <!--<option value="1">Otro</option>-->

                                        </select>

                                    </div>
                                    <div class="col-md-6">
                                        <strong>Delegación o Municipio</strong>
                                        <select name="cbx_municipio" id="cbx_municipio" class="control control col-md-12"
                                            style="width: 100%;">

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Referenciado</strong>
                                        <select name="referenciado" id="referenciado" class="control control col-md-12">
                                            <option value="">Seleccione una opción</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6" id="medioreferencia">
                                        <strong>Unidad referencia</strong>
                                        <input list="referencias" name="unidadreferencia" id="unidadreferencia"
                                            class="control control col-md-12">
                                        <datalist id="referencias">
                                            <option value="">Seleccione</option>
                                            <?php 
				        $query = $conexionCancer->prepare("SELECT clues, unidad FROM hospitales");
                        $query->execute();
                        $query->setFetchMode(PDO::FETCH_ASSOC);
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['clues']; ?>">
                                                <?php echo $row['unidad']; ?></option>
                                            <?php } ?>

                                        </datalist>
                                    </div>
                                    <div class="col-md-12"></div>
                                    <!--
                                    <input type="submit" class="datosPersonales" id="datosPersonales" value="Guardar"
                                        onclick="guardaDatosPersonales();">

                                    <script>
                                    function guardaDatosPersonales() {
                                        if ($('input[name=curp]').val().length == 0 || $('input[name=nombrecompleto]')
                                            .val().length == 0 || $('select[name=cbx_estado]').val().length == 0) {
                                            alert('Ingrese los datos requeridos');

                                            return false;
                                        }
                                        let checked = this.querySelectorAll('input[type=checkbox]:checked');

                                        var formData = new FormData(document.getElementById("formulario"));
                                        formData.append("dato", "valor");
                                        $.ajax({

                                            url: "aplicacion/registrarpacienteCancer.php",
                                            type: "post",
                                            data: formData,
                                            cache: false,
                                            contentType: false,
                                            processData: false,

                                            success: function(data) {
                                                $("#mensaje").html(data);

                                            }
                                        })

                                    }-->
                                    </script>

                                    <div class="col-md-12"
                                        style="text-align: center; color:blueviolet; background-color:antiquewhite; margin-top: 5px;">
                                        <strong>ANTECEDENTES HEREDOFAMILIARES</strong>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Cancer</strong>
                                        <select name="tipodecancer" id="tipodecancer" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <?php 
				        $query = $conexionCancer->prepare("SELECT descripcioncancer FROM tipocancer");
                        $query->execute();
                        $query->setFetchMode(PDO::FETCH_ASSOC);
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['descripcioncancer']; ?>">
                                                <?php echo $row['descripcioncancer']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Antecedentes familiares</strong>
                                        <select id="mscancer" name="mscancer[]" multiple="multiple"
                                            class="control control col-md-12">

                                            <?php 
				        $query = $conexionCancer->prepare("SELECT relacion FROM antecedentescancer");
                        $query->execute();
                        $query->setFetchMode(PDO::FETCH_ASSOC);
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['relacion']; ?>">
                                                <?php echo $row['relacion']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <div class="col-md-12"
                                        style="text-align: center; color:blueviolet; background-color:antiquewhite; margin-top: 5px;">
                                        <strong>ANTECEDENTES GINECOOBSTETRICOS</strong>
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Menarca</strong>
                                        <input type="text" class="control control col-md-12" id="menarca" name="menarca">

                                    </div>
                                    <div class="col-md-3">
                                        <strong>Ultima mestruación</strong>
                                        <input type="date" class="control control col-md-12" id="fechaultimamestruacion"
                                            name="fechaultimamestruacion" onblur="calcularmestruacion();">

                                    </div>
                                    <div class="col-md-3" id="menopauperimenopau">
                                        <strong>Cuenta con:</strong>
                                        <input type="text" class="control control col-md-12" id="menopausea" name="menopausea"
                                            readonly>

                                    </div>

                                    <div class="col-md-2">
                                        <strong>Gestas</strong>
                                        <select name="gestas" id="gestas" class="control control col-md-12">
                                            <option value="0">Ninguna</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>

                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Parto</strong>
                                        <input type="number" class="control control col-md-12" id="parto" onblur="validaparto();"
                                            name="parto">

                                    </div>
                                    <div class="col-md-2">
                                        <strong>Aborto</strong>
                                        <input type="number" class="control control col-md-12" id="aborto" onblur="validaparto();"
                                            name="aborto">

                                    </div>
                                    <div class="col-md-2">
                                        <strong>Cesarea</strong>
                                        <input type="number" class="control control col-md-12" id="cesarea" onblur="validaparto();"
                                            name="cesarea">

                                    </div>
                                    <div class="col-md-4">
                                        <strong>Terapia de remplazo hormonal</strong>
                                        <select name="planificacionfamiliar" id="planificacionfamiliar"
                                            class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="si">si</option>
                                            <option value="no">no</option>

                                        </select>
                                    </div>

                                    <div class="col-md-2" id="tipolactancia">
                                        <strong>Lactancia</strong>
                                        <select name="lactancia" id="lactancia" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>

                                        </select>
                                    </div>
                                    <div class="col-md-2" id="tiempodelactancia">
                                        <strong>Tiempo</strong>
                                        <input type="text" class="control control col-md-12" id="tiempolactancia"
                                            name="tiempolactancia">

                                    </div>

                                    <div class="col-md-12"
                                        style="text-align: center; color:blueviolet; background-color:antiquewhite; margin-top: 5px;">
                                        <strong>ANTECEDENTES PERSONALES PATOLOGICOS</strong>
                                    </div>
                                    <div class="col-md-12">
                                        <strong>Antecedentes familiares</strong>
                                        <select id="mspato" name="check_listapato[]" multiple="multiple"
                                            class="control control col-md-12">

                                            <?php 
				        $query = $conexionCancer->prepare("SELECT descripcionantecedente FROM antecedentespersonalespatologicos");
                        $query->execute();
                        $query->setFetchMode(PDO::FETCH_ASSOC);
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['descripcionantecedente']; ?>">
                                                <?php echo $row['descripcionantecedente']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <!--
                                    <fieldset class="col-md-12">

                                        <input type="checkbox" name="check_listapato[]" id="check_listapato[]"
                                            class="check" value="Tabaquismo">&nbsp;Tabaquismo&nbsp;&nbsp;
                                        <input type="checkbox" name="check_listapato[]" id="check_listapato[]"
                                            class="check" value="Hipertencion Arterial">&nbsp;Hipertensión
                                        Arterial&nbsp;&nbsp;
                                        <input type="checkbox" name="check_listapato[]" id="check_listapato[]"
                                            class="check" value="Enfermedad Renal Cronica">&nbsp;Enfermedad Renal
                                        Cronica&nbsp;&nbsp;
                                        <input type="checkbox" name="check_listapato[]" id="check_listapato[]"
                                            class="check" value="Diabetes Mellitus">&nbsp;Diabetes Mellitus&nbsp;&nbsp;
                                        <input type="checkbox" name="check_listapato[]" id="check_listapato[]"
                                            class="check" value="Conocida con Gen BRCA 1">&nbsp;Conocida con Gen BRCA
                                        1&nbsp;&nbsp;
                                        <input type="checkbox" name="check_listapato[]" id="check_listapato[]"
                                            class="check" value="Conocida con Gen BRCA 2">&nbsp;Conocida con Gen BRCA
                                        2&nbsp;&nbsp;

                                    </fieldset>
                                    -->
                                    <div class="col-md-12"
                                        style="text-align: center; color:blueviolet; background-color:antiquewhite; margin-top: 5px;">
                                        <strong>ATENCIÓN CLINICA</strong>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Fecha primer atencion</strong>
                                        <input type="date" id="fechaatencioninicial" name="fechaatencioninicial"
                                            class="control control col-md-12">
                                    </div>
                                    <div class="col-md-3">
                                        <strong>BIRADS de referencia</strong>
                                        <select name="biradsreferencia" id="biradsreferencia" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <?php 
				        $query = $conexionCancer->prepare("SELECT descripcion_brad_referencia FROM brads_referencia");
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                            $query->execute();
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['descripcion_brad_referencia']; ?>">
                                                <?php echo $row['descripcion_brad_referencia']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>BIRADS HRAEI</strong>
                                        <select name="biradshraei" id="biradshraei" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <?php 
				            $query = $conexionCancer->prepare("SELECT descripcionbrad FROM birads_atencion_inicial");
                                $query->setFetchMode(PDO::FETCH_ASSOC);
                            $query->execute();
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['descripcionbrad']; ?>">
                                                <?php echo $row['descripcionbrad']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="col-md-3" id="lateralidadinicio">
                                        <strong>Lateralidad</strong>
                                        <select name="lateralidadprimero" id="lateralidadprimero" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="Derecha">Derecha</option>
                                            <option value="Izquierda">Izquierda</option>
                                            <option value="Bilateral">Bilateral</option>

                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Etapa clinica</strong>
                                        <select name="etapasclinicas" id="etapasclinicas" class="control control col-md-12" readonly>
                                            <option value="TNM" selected>TNM</option>

                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Tamaño tumoral</strong>
                                        <select name="tamaniotumoral" id="tamaniotumoral" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <?php 
				        $query = $conexionCancer->prepare("SELECT descripcion_size_tumoral FROM size_tumoral");
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                            $query->execute();
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['descripcion_size_tumoral']; ?>">
                                                <?php echo $row['descripcion_size_tumoral']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <strong>Compromiso linfatico nodal</strong>
                                        <select name="linfaticonodal" id="linfaticonodal" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <?php 
				        $query = $conexionCancer->prepare("SELECT descripcion_linfatico_nodal FROM compromiso_linfatico_nodal");
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                            $query->execute();
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['descripcion_linfatico_nodal']; ?>">
                                                <?php echo $row['descripcion_linfatico_nodal']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Metastasis</strong>
                                        <select name="metastasis" id="metastasis" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <?php 
				        $query = $conexionCancer->prepare("SELECT descripcion_metastasis FROM metastasis");
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                            $query->execute();
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['descripcion_metastasis']; ?>">
                                                <?php echo $row['descripcion_metastasis']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="col-md-4" id="metastasissitio">
                                        <strong>Sitio de metastasis</strong>
                                        <select name="sitiometastasis" id="sitiometastasis" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <?php 
				        $query = $conexionCancer->prepare("SELECT descripcionsitiometastasis FROM sitiometastasis");
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                            $query->execute();
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['descripcionsitiometastasis']; ?>">
                                                <?php echo $row['descripcionsitiometastasis']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="col-md-4" id="etapas">
                                        <strong>Clasificación etapas</strong>
                                        <select name="clasificaciondeetapas" id="clasificaciondeetapas"
                                            class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <?php 
				        $query = $conexionCancer->prepare("SELECT etapaclasificacion FROM clasificacionetapas");
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                            $query->execute();
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['etapaclasificacion']; ?>">
                                                <?php echo $row['etapaclasificacion']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <strong>Calidad de vida ECOG</strong>
                                        <select name="calidaddevidaecog" id="calidaddevidaecog" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <?php 
				        $query = $conexionCancer->prepare("SELECT descripcionecog FROM calidadvidaecog");
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                            $query->execute();
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['descripcionecog']; ?>">
                                                <?php echo $row['descripcionecog']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <div class="col-md-12"
                                        style="text-align: center; color:blueviolet; background-color:antiquewhite; margin-top: 5px;">
                                        <strong>HISTOPATOLOGIA</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>DX HISTOPATOLOGICO</strong>
                                        <select name="dxhistopatologico" id="dxhistopatologico" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <?php 
				        $query = $conexionCancer->prepare("SELECT descripcion_dx_histopalogico FROM dxhistopalogico");
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                            $query->execute();
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['descripcion_dx_histopalogico']; ?>">
                                                <?php echo $row['descripcion_dx_histopalogico']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="col-md-3" id="fechadx">
                                        <strong>Fecha dx histopatologico</strong>
                                        <input type="date" id="fechadxhistopatologico" name="fechadxhistopatologico"
                                            class="control control col-md-12">
                                    </div>
                                    <div class="col-md-6">
                                        <strong>ESCALA SBR (SCARLET-BLOOM-RICHARDSON)</strong>
                                        <select name="escalasbr" id="escalasbr" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <?php 
				        $query = $conexionCancer->prepare("SELECT descripcionescalasbr FROM escalasbr");
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                            $query->execute();
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['descripcionescalasbr']; ?>">
                                                <?php echo $row['descripcionescalasbr']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="col-md-12"
                                        style="text-align: center; color: blueviolet; background-color:antiquewhite; margin-top: 5px;">
                                        <strong>INMUNOHISTOQUIMICA</strong>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="input-group pull-left">
                                            <span>Receptores de estrogenos (RE)</span>&nbsp;&nbsp;
                                            <input type="number" id="receptoresestrogenos" name="receptoresestrogenos"
                                                placeholder="%" class="control control col-md-12">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group pull-left">
                                            <span>Receptores de progesterona (RP)</span>&nbsp;&nbsp;
                                            <input type="number" id="receptoresprogesterona"
                                                name="receptoresprogesterona" placeholder="%" class="control control col-md-12">
                                        </div>
                                    </div><br><br>
                                    <div class="col-md-4">
                                        <div class="input-group pull-left">
                                            <span>KI-67</span>&nbsp;&nbsp;
                                            <input type="number" id="ki67" name="ki67" placeholder="%"
                                                class="control control col-md-12">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group pull-left">
                                            <span>Triple negativo</span>
                                            <select name="triplenegativo" id="triplenegativo" class="control control col-md-12">
                                                <option value="0">Seleccione</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <fieldset class="col-md-4">
                                        <div class="input-group pull-left">
                                            <strong>Se realizó PDL &nbsp;</strong>
                                            &nbsp;Si&nbsp;&nbsp;
                                            <input type="radio" name="pdlrealizo" id="pdlrealizo1"
                                                onclick="aplicopdlsi();" class="check" value="si">
                                            &nbsp;&nbsp;No&nbsp;&nbsp;
                                            <input type="radio" name="pdlrealizo" id="pdlrealizo2"
                                                onclick="aplicopdlno();" class="check" value="no">
                                        </div>
                                    </fieldset><br><br>
                                    <div class="col-md-4">
                                        <div class="input-group pull-left">
                                            <span>PDL</span>&nbsp;&nbsp;
                                            <input type="number" id="pdl" name="pdl" placeholder="%"
                                                class="control control col-md-12" value="0">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="input-group pull-left">
                                            <strong>ONCOGEN HER2</strong>&nbsp;&nbsp;
                                            <select name="oncogen" id="oncogen" class="control control col-md-12">
                                                <option value="0">Seleccione</option>
                                                <option value="Una cruz">+</option>
                                                <option value="Dos cruces">++</option>
                                                <option value="Tres cruces">+++</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="muestrafish">
                                        <strong>FISH</strong>
                                        <select name="fish" id="fish" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="Positivo">Positivo</option>
                                            <option value="Negativo">Negativo</option>

                                        </select>
                                    </div>
                                    <hr>
                                    <div class="col-md-12"
                                        style="text-align: center; color:blueviolet; background-color:antiquewhite; margin-top: 5px;">
                                        <strong>TRATAMIENTO</strong>
                                    </div>
                                    <div class="col-md-3" style="color: #BD9FD6; ">
                                        <strong>QUIRURGICO</strong>
                                        <select name="quirurgico" id="quirurgico" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3" id="lateralidad">
                                        <strong>Lateralidad QX</strong>
                                        <select name="lateralidadsegundo" id="lateralidadsegundo" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="Derecha">Derecha</option>
                                            <option value="Izquierda">Izquierda</option>
                                            <option value="Bilateral">Bilateral</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3" id="tipoquirurgico">
                                        <strong>Tipo</strong>
                                        <select name="quirurgicotipo" id="quirurgicotipo" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="Mastectomia">Mastectomia</option>
                                            <option value="Ganglionar">Ganglionar</option>

                                        </select>
                                    </div>

                                    <div class="col-md-3" id="tipomastectomia">
                                        <strong>Tipo de mastectomia</strong>
                                        <select name="mastectomiatipo" id="mastectomiatipo" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="Mastectomia total">Mastectomia total</option>
                                            <option value="Mastectomia conservadora">Mastectomia conservadora</option>
                                            <option value="Mastectomia paliativa">Mastectomia paliativa</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3" id="tipoganglionar">
                                        <strong>Tipo de ganglionar</strong>
                                        <select name="ganglionartipo" id="ganglionartipo" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="GANGLIO CENTINELA">GANGLIO CENTINELA</option>
                                            <option value="DISECCION AXILAR">DISECCION AXILAR</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3" id="fechatipomastectomia">
                                        <strong>Fecha</strong>
                                        <input type="date" id="fechatipomastecto" name="fechatipomastecto"
                                            class="control control col-md-12">
                                    </div>
                                    <div class="col-md-3" id="fechatipoganglionar">
                                        <strong>Fecha</strong>
                                        <input type="date" id="fechatipoganglio" name="fechatipoganglio"
                                            class="control control col-md-12">
                                    </div>
                                    <div class="col-md-3" id="reconstruccion">
                                        <strong>Reconstruccion</strong>
                                        <select name="reconstruccionsino" id="reconstruccionsino" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3" id="tiporeconstruccion">
                                        <strong>Tipo</strong>
                                        <select name="reconstrucciontipo" id="reconstrucciontipo" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="Expansor tisular">Expansor tisular</option>
                                            <option value="Implante mamario">Implante mamario</option>
                                            <option value="Colgajo">Colgajo</option>

                                        </select>
                                    </div>

                                    <div class="col-md-3" id="reconstrucciontipofecha">
                                        <strong>Fecha</strong>
                                        <input type="date" id="fechatiporeconstruccion" name="fechatiporeconstruccion"
                                            class="control control col-md-12">
                                    </div>
                                    <div class="col-md-12"></div>
                                    <input type="button" name="enviar" value="Save Tratamiento" onclick="Hola();"
                                        id="guardaApartado"
                                        style="width: 170px; height: 27px; color: white; background-color: red; margin-left: auto; margin-right: auto; margin-top: 5px; text-decoration: none; border: none;">
                                    <script>
                                    function Hola() {

                                        if ($('input[name=curp]').val().length == 0 || $('input[name=nombrecompleto]')
                                            .val().length == 0 || $('select[name=cbx_estado]').val().length == 0) {
                                            swal({
                                                title: 'Hooho error!',
                                                text: 'Ingresa los datos requeridos!',
                                                icon: 'warning',

                                            });

                                            return false;
                                        }
                                        let quirurgico = $("#quirurgico").val();
                                        let lateralidadsegundo = $("#lateralidadsegundo").val();
                                        let quirurgicotipo = $("#quirurgicotipo").val();
                                        let curp = $("#curp").val();
                                        let mastectomiatipo = $("#mastectomiatipo").val();
                                        let fechatipomastecto = $("#fechatipomastecto").val();
                                        let ganglionartipo = $("#ganglionartipo").val();
                                        let fechatipoganglio = $("#fechatipoganglio").val();
                                        let reconstruccionsino = $("#reconstruccionsino").val();
                                        let reconstrucciontipo = $("#reconstrucciontipo").val();
                                        let fechatiporeconstruccion = $("#fechatiporeconstruccion").val();

                                        let parametros = {
                                            quirurgico: quirurgico,
                                            lateralidadsegundo: lateralidadsegundo,
                                            quirurgicotipo: quirurgicotipo,
                                            curp: curp,
                                            mastectomiatipo: mastectomiatipo,
                                            fechatipomastecto: fechatipomastecto,
                                            ganglionartipo: ganglionartipo,
                                            fechatipoganglio: fechatipoganglio,
                                            reconstruccionsino: reconstruccionsino,
                                            reconstrucciontipo: reconstrucciontipo,
                                            fechatiporeconstruccion: fechatiporeconstruccion
                                        }
                                        $.ajax({
                                            data: parametros,
                                            url: 'aplicacion/procesoAjax.php',
                                            type: 'post',
                                            beforeSend: function() {
                                                $("#mensaje").html("Procesando, espere por favor");
                                            },
                                            success: function(response) {
                                                $("#mensaje").html(response);
                                            }
                                        });
                                    }
                                    </script>

                                    <div class="col-md-12"
                                        style="text-align: center; color:blueviolet; background-color:antiquewhite; margin-top: 5px;">
                                        <strong>QUIMIOTERAPIA</strong>
                                    </div>
                                    <div class="col-md-3" style="color: #BD9FD6;">
                                        <strong>QUIMIOTERAPIA</strong>
                                        <select name="aplicoquimio" id="aplicoquimio" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3" id="fechainicioquimio">
                                        <strong>Fecha inicio</strong>
                                        <input type="date" id="fechadeinicioquimio" name="fechadeinicioquimio"
                                            class="control control col-md-12">
                                    </div>
                                    <div class="col-md-3" id="atracicilassi">
                                        <strong>Antraciclinas</strong>
                                        <select name="antraciclinas" id="antraciclinas" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <?php 
				        $query = $conexionCancer->prepare("SELECT descripcion FROM atraciclina");
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                            $query->execute();
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['descripcion']; ?>">
                                                <?php echo $row['descripcion']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="col-md-3" id="quimiomomento">
                                        <strong>Momento de la QT</strong>
                                        <select name="momentoquimio" id="momentoquimio" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="Neoadyuvante">Neoadyuvante</option>
                                            <option value="Coadyuvante">Coadyuvante</option>
                                        </select>
                                    </div>
                                    <fieldset class="col-md-2">
                                        <strong>HER 2 ++</strong><br>
                                        <input type="radio" name="her" id="her1" onclick="aplicoher();" class="check"
                                            value="si">&nbsp;Si&nbsp;&nbsp;
                                        <input type="radio" name="her" id="her2" onclick="aplicoherno();" class="check"
                                            value="noaplico">&nbsp;No&nbsp;&nbsp;
                                    </fieldset>
                                    <div class="col-md-4" id="esquemaher">
                                        <strong>Esquema HER 2 ++</strong>
                                        <select name="esquemaherdos" id="esquemaherdos" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="TRASTUZUMAB/PERTUZUMAB">TRASTUZUMAB/PERTUZUMAB</option>
                                            <option value="TRASTUZUMAB/EMTANSINA">TRASTUZUMAB/EMTANSINA</option>
                                        </select>
                                    </div>
                                    <fieldset class="col-md-2">
                                        <strong>Triple negativo</strong><br>&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="triplenegativo" id="triplenegativo1"
                                            onclick="triplesi();" class="check" value="si">&nbsp;Si&nbsp;&nbsp;
                                        <input type="radio" name="triplenegativo" id="triplenegativo2"
                                            onclick="tripleno();" class="check" value="no">&nbsp;No&nbsp;&nbsp;
                                    </fieldset>
                                    <div class="col-md-4" id="tripleesquema">
                                        <strong>Esquema triple negativo</strong>
                                        <select name="esquematriple" id="esquematriple" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="ATEZOLIZUMAB">ATEZOLIZUMAB</option>
                                            <option value="PEMBROLIZUMAB">PEMBROLIZUMAB</option>
                                            <option value="OLAPARIB">OLAPARIB</option>
                                        </select>
                                    </div>
                                    <fieldset class="col-md-3">
                                        <strong>Hormonosensible</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="hormonosensibles" id="hormonosensibles1"
                                            onclick="hormonosi();" class="check" value="si">&nbsp;Si&nbsp;&nbsp;
                                        <input type="radio" name="hormonosensibles" id="hormonosensibles2"
                                            onclick="hormonono();" class="check" value="no">&nbsp;No&nbsp;&nbsp;
                                    </fieldset>
                                    <div class="col-md-4" id="hormonoesquema">
                                        <strong>Esquema hormonosensible</strong>
                                        <select name="esquemahormonosensible" id="esquemahormonosensible"
                                            class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="PALBOCICLIB">PALBOCICLIB</option>
                                            <option value="RIBOCICLIB">RIBOCICLIB</option>
                                            <option value="ABEMACICLIB">ABEMACICLIB</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Tipo de tratamiento</strong>
                                        <select name="esquemhormosensible" id="esquemahormosensible"
                                            class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="ADYUVANTE">ADYUVANTE</option>
                                            <option value="PALIATIVO">PALIATIVO</option>
                                        </select>
                                    </div>
                                    <fieldset class="col-md-3">
                                        <strong>Completo quimio</strong><br>&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="completoquimio" id="completoquimio1"
                                            onclick="quimiocompletosi();" class="check" value="si">&nbsp;Si&nbsp;&nbsp;
                                        <input type="radio" name="completoquimio" id="completoquimio2"
                                            onclick="quimiocompletono();" class="check" value="no">&nbsp;No&nbsp;&nbsp;
                                    </fieldset>
                                    <div class="col-md-3" id="esquemaquimio">
                                        <strong>Causa QT incompleta</strong>
                                        <select name="quimioesquema" id="quimioesquema" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="EVENTO ADVERSO">EVENTO ADVERSO</option>
                                            <option value="PROGRESION DE LA ENFERMEDAD">PROGRESION DE LA ENFERMEDAD
                                            </option>
                                            <option value="RECURRENCIA DE LA ENFERMEDAD">RECURRENCIA DE LA ENFERMEDAD
                                            </option>
                                            <option value="ABANDONO DEL PACIENTE">ABANDONO DEL PACIENTE</option>
                                            <option value="FALLECIO">FALLECIO</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3" id="eventoadverso">
                                        <strong>Fecha evento adverso</strong>
                                        <input type="date" id="fechaeventoadverso" name="fechaeventoadverso"
                                            class="control control col-md-12">
                                    </div>
                                    <div class="col-md-3" id="eventoprogresivo">
                                        <strong>Fecha progresion</strong>
                                        <input type="date" id="fechaprogresion" name="fechaprogresion"
                                            class="control control col-md-12">
                                    </div>
                                    <div class="col-md-3" id="eventorecurrencia">
                                        <strong>Fecha recurrencia</strong>
                                        <input type="date" id="fecharecurrencia" name="fecharecurrencia"
                                            class="control control col-md-12">
                                    </div>
                                    <div class="col-md-3" id="eventodefuncion">
                                        <strong>Fecha defunción</strong>
                                        <input type="date" id="fechadefuncion" name="fechadefuncion"
                                            class="control control col-md-12">
                                    </div>
                                    <div class="col-md-3" id="causaonco">
                                        <strong>Causa</strong>
                                        <select name="otracausa" id="otracausa" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="ONCOLOGICA">ONCOLOGICA</option>
                                            <option value="EVENTO ADVERSO">EVENTO ADVERSO</option>
                                            <option value="OTRA">OTRA</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3" id="especausa">
                                        <strong>Especifique</strong>
                                        <input type="text" id="especifiquecausa" name="especifiquecausa"
                                            class="control control col-md-12">
                                    </div>

                                    <div class="col-md-12"
                                        style="text-align: center; color:blueviolet; background-color:antiquewhite; margin-top: 5px;">
                                        <strong>RADIOTERAPIA</strong>
                                    </div>
                                    <div class="col-md-3" style="color: #BD9FD6; ">
                                        <strong>RADIOTERAPIA</strong>
                                        <select name="radioterapia" id="radioterapia" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3" id="seaplicoradio">
                                        <strong>Tipo Radioterapia</strong>
                                        <select name="aplicoradioterapia" id="aplicoradioterapia" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="CICLO MAMARIO COMPLETO">CICLO MAMARIO COMPLETO</option>
                                            <option value="TANGENCIAL">TANGENCIAL</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3" id="fechadelaradio">
                                        <strong>Fecha de inicio</strong>
                                        <input type="date" id="fechainicioradio" name="fechainicioradio"
                                            class="control control col-md-12">
                                    </div>
                                    <div class="col-md-3" id="sesionescantidad">
                                        <strong>N° de sesiones</strong>
                                        <input type="number" id="numerosesiones" name="numerosesiones"
                                            class="control control col-md-12">
                                    </div>
                                    <div class="col-md-12"
                                        style="text-align: center; color:blueviolet; background-color:antiquewhite; margin-top: 5px;">
                                        <strong>BRAQUITERAPIA</strong>
                                    </div>
                                    <div class="col-md-3" style="color: #BD9FD6; ">
                                        <strong>BRAQUITERAPIA</strong>
                                        <select name="braquiterapia" id="braquiterapia" class="control control col-md-12">
                                            <option value="0">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Fecha braquiterapia</strong>
                                        <input type="date" id="fechadebraquiterapia" name="fechadebraquiterapia"
                                            class="control control col-md-12">
                                    </div>
                                </div>
                                <div class="col-md-12"></div>
                                <br>


                                <input type="submit" id="registrar" value="Registrar">
                                <input type="button" id="recargar" onclick="window.location.reload();"
                                    value="Finalizar">

                                <br>
                        </div>
                                    </form>
                     <div id="tabla_resultado2"></div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
