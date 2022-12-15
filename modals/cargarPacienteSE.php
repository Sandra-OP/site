<div id="myModal_pacientesinelevacion" class="modal fade" role="dialog" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/estilosMenu.css" rel="stylesheet">
    <script src="js/getCatalogos.js"></script>
    <script src="js/scriptModalvalidacionSE.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 950px; height: auto; color:black; left: 50%; transform: translate(-50%); ">
            <div class="modal-header" id="cabeceraModal">
                <button type="button" class="close" data-bs-dismiss="modal" onclick="limpiar();">&times;</button>
                <h5 class="modal-title">Datos paciente</h5>
            </div>
            <div class="modal-body">

                <div id="panel_editar">

                    <div class="contrato-nuevo">




                        <div class="modal-body">

                            <!-- form start -->


                            <div class="form-header">
                                <h3 class="form-title"><i class="fa fa-user"></i>Ingresa la informacion requerida</h3>

                            </div>
                            <style>
                            #fecha,
                            #curp,
                            #nombrecompleto,
                            #edad {
                                text-transform: uppercase;
                            }
                            </style>
                            <form name="formulario" id="formulario" onSubmit="return limpiar()" autocomplete="off">
                                <div class="form-row">
                                    <div id="mensaje"></div>
                                    <script>
                                    $("#formulario").on("submit", function(e) {
                                        let checked = this.querySelectorAll('input[type=checkbox]:checked');
                                        e.preventDefault();

                                        var formData = new FormData(document.getElementById("formulario"));
                                        formData.append("dato", "valor");

                                        $.ajax({

                                            url: "aplicacion/registrarpacienteSE.php",
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

                                    <div class="col-md-6" autocomplete="off">

                                        <input id="year" name="year" class="form-control" type="hidden" value="2022"
                                            required="required" onkeyup="mayus(this);" readonly>
                                    </div>
                                    <div class="col-md-12">

                                        <input id="cest" name="cest" type="hidden" class="form-control" value="cest">
                                    </div>
                                    <div class="col-md-12">
                                        <strong>CURP</strong>
                                        <input id="curp" name="curp" type="text" class="form-control" value=""
                                            onblur="curp2date();" minlength="18" maxlength="18" required>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Nombre Completo</strong>
                                        <input id="nombrecompleto" name="nombrecompleto" onblur="calcularEdad();"
                                            type="text" class="form-control" value="" required>
                                    </div>



                                    <div class="col-md-3">
                                        <strong>Fecha de nacimiento</strong>
                                        <input id="fecha" name="fecha" type="date" value="" onblur="curp2date();"
                                            class="form-control" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Edad</strong>
                                        <input id="edad" name="edad" type="text" class="form-control" value="" readonly>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Sexo</strong>
                                        <input type="text" class="form-control" id="sexo" onclick="curp2date();"
                                            name="sexo" readonly>

                                    </div>
                                    <div class="col-md-4">
                                        <strong>Frecuencia cardiaca</strong>
                                        <input type="text" class="form-control" id="frecuenciacardiaca"
                                            name="frecuenciacardiaca">

                                    </div>
                                    <div class="col-md-2">
                                        <strong>Presión arterial</strong>
                                        <input type="text" class="form-control" id="persionarterial"
                                            name="persionarterial">

                                    </div>
                                    <div class="col-md-2">
                                        <strong>Talla</strong>
                                        <input type="number" step="any" class="form-control" id="talla" name="talla"
                                            required>

                                    </div>
                                    <div class="col-md-2">
                                        <strong>Peso</strong>
                                        <input type="number" step="any" class="form-control" id="peso"
                                            onblur="calculaIMC();" name="peso" required>

                                    </div>
                                    <div class="col-md-2">
                                        <strong>IMC</strong>
                                        <input type="text" class="form-control" id="imc" onblur="calculaIMC();"
                                            name="imc" value="" readonly>

                                    </div>

                                    <div class="col-md-6">
                                        <strong>Selecciona el estado</strong>

                                        <select name="cbx_estado" id="cbx_estado" class="form-control"
                                            style="width: 100%;" required>
                                            <option value="0">Seleccionar Estado</option>
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
                                        <select name="cbx_municipio" id="cbx_municipio" class="form-control"
                                            style="width: 100%;">

                                        </select>
                                    </div>
                                    <strong>Factor de riesgo</strong>
                                    <fieldset class="col-md-12">

                                        <input type="checkbox" name="check_lista[]" id="check_lista[]" class="check"
                                            value="Diabetes">&nbsp;Diabetes&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista[]" id="check_lista[]" class="check"
                                            value="Hipertencion">&nbsp;Hipertensión&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista[]" id="check_lista[]" class="check"
                                            value="Tabaquismo">&nbsp;Tabaquismo&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista[]" id="check_lista[]" class="check"
                                            value="Enfermedad renal cronica">&nbsp;Enfermedad renal cronica&nbsp;
                                        <input type="checkbox" name="check_lista[]" id="check_lista[]" class="check"
                                            value="Hiperuricemia">&nbsp;Hiperuricemia&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista[]" id="check_lista[]" class="check"
                                            value="Obesidad">&nbsp;Obesidad&nbsp;&nbsp;<br>
                                        <input type="checkbox" name="check_lista[]" id="check_lista[]" class="check"
                                            value="IAM Previo">&nbsp;IAM Previo&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista[]" id="check_lista[]" class="check"
                                            value="Insuficiencia Venosa">&nbsp;Insuficiencia Venosa&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista[]" id="check_lista[]" class="check"
                                            value="Revascularización Cardiaca Previa">&nbsp;Revascularización Cardiaca
                                        Previa&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista[]" id="check_lista[]" class="check"
                                            value="Enfermedad multivaso">&nbsp;Enfermedad multivaso&nbsp;&nbsp;

                                    </fieldset>

                                    <div class="col-md-3">
                                        <strong>Inicio de sintomas</strong>
                                        <input id="fechasintomas" name="fechasintomas" type="datetime-local" value=""
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Inicio de triage</strong>
                                        <input type="datetime-local" id="primercontacto" name="primercontacto"
                                            placeholder="Describa" class="form-control" onkeyup="mayus(this);">
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Termino de triage</strong>
                                        <input type="datetime-local" id="puertabalon" name="puertabalon"
                                            placeholder="Describa" class="form-control" onkeyup="mayus(this);">
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Caracteristicas del dolor</strong>
                                        <select name="caractipicasatipicas" id="caractipicasatipicas"
                                            class="form-control">
                                            <option value="">Seleccione una opción</option>
                                            <option value="tipicas">Tipicas</option>
                                            <option value="atipicas">Atipicas</option>
                                        </select>
                                    </div>

                                    <fieldset id="tipicascombos" class="col-md-12">
                                        <strong>Caracteristicas tipicas</strong><br>
                                        <input type="checkbox" name="check_lista2[]" id="check_lista2[]" class="check"
                                            value="Dolor retroesternal">&nbsp;Dolor retroesternal&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista2[]" id="check_lista2[]" class="check"
                                            value="Opresivo">&nbsp;Opresivo&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista2[]" id="check_lista2[]" class="check"
                                            value="Irradacion brazo izquierdo">&nbsp;Irradacion brazo
                                        izquierdo&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista2[]" id="check_lista2[]" class="check"
                                            value="Mas de 10 minutos">&nbsp;Mas de 10 minutos
                                        <input type="checkbox" name="check_lista2[]" id="check_lista2[]" class="check"
                                            value="Nauseas">&nbsp;Nauseas&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista2[]" id="check_lista2[]" class="check"
                                            value="Diaforesis">&nbsp;Diaforesis&nbsp;&nbsp;<br>
                                        <input type="checkbox" name="check_lista2[]" id="check_lista2[]" class="check"
                                            value="Sincupe">&nbsp;Sincope&nbsp;&nbsp;

                                    </fieldset>

                                    <fieldset id="atipicascombos" class="col-md-12">
                                        <strong>Caracteristicas atipicas</strong><br>
                                        <input type="checkbox" name="check_lista3[]" id="check_lista3[]" class="check"
                                            value="Dolor epigastrio">&nbsp;Dolor epigastrio&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista3[]" id="check_lista3[]" class="check"
                                            value="Punzante">&nbsp;Punzante&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista3[]" id="check_lista3[]" class="check"
                                            value="Pleuritico">&nbsp;Pleuritico&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista3[]" id="check_lista3[]" class="check"
                                            value="Disnea">&nbsp;Disnea&nbsp;
                                        <input type="checkbox" name="check_lista3[]" id="check_lista3[]" class="check"
                                            value="Palpitación">&nbsp;Palpitación&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista3[]" id="check_lista3[]" class="check"
                                            value="Sincupe">&nbsp;Sincope&nbsp;&nbsp;


                                    </fieldset>


                                    <div class="col-md-12" style="text-align: center;">
                                        <strong>Paraclinicos</strong>
                                    </div>
                                    <div class="col-md-3">

                                        <div class="input-group pull-left">
                                            <span>CK</span>&nbsp;&nbsp;
                                            <input type="text" id="ck" name="ck" placeholder="Describa"
                                                class="form-control" onkeyup="mayus(this);">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group pull-left">
                                            <span>CK-MB</span>&nbsp;&nbsp;
                                            <input type="text" id="ckmb" name="ckmb" placeholder="Describa"
                                                class="form-control" onkeyup="mayus(this);">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group pull-left">
                                            <span>Troponinas</span>&nbsp;&nbsp;
                                            <input type="text" id="troponinas" name="troponinas" placeholder="Describa"
                                                class="form-control" onkeyup="mayus(this);">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="input-group pull-left">
                                            <span>Glucosa</span>&nbsp;&nbsp;
                                            <input type="text" id="glucosa" name="glucosa" placeholder="Describa"
                                                class="form-control" onkeyup="mayus(this);">
                                        </div>
                                    </div><br><br>
                                    <div class="col-md-3">
                                        <div class="input-group pull-left">
                                            <span>Urea</span>&nbsp;&nbsp;
                                            <input type="text" id="urea" name="urea" placeholder="Describa"
                                                class="form-control" onkeyup="mayus(this);">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group pull-left">
                                            <span>Creatinina</span>&nbsp;&nbsp;
                                            <input type="text" id="creatinina" name="creatinina" placeholder="Describa"
                                                class="form-control" onkeyup="mayus(this);">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group pull-left">
                                            <span>Colesterol</span>&nbsp;&nbsp;
                                            <input type="text" id="colesterol" name="colesterol" placeholder="Describa"
                                                class="form-control" onkeyup="mayus(this);">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group pull-left">
                                            <span>Trigliceridos</span>&nbsp;&nbsp;
                                            <input type="text" id="trigliceridos" name="trigliceridos"
                                                placeholder="Describa" class="form-control" onkeyup="mayus(this);">
                                        </div>
                                    </div><br><br>
                                    <div class="col-md-3">
                                        <div class="input-group pull-left">
                                            <span>Acido urico</span>&nbsp;&nbsp;
                                            <input type="text" id="acidourico" name="acidourico" placeholder="Describa"
                                                class="form-control" onkeyup="mayus(this);">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group pull-left">
                                            <span>Hb glucosilada</span>&nbsp;&nbsp;
                                            <input type="text" id="hbglucosilada" name="hbglucosilada"
                                                placeholder="Describa" class="form-control" onkeyup="mayus(this);">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group pull-left">
                                            <span>Proteinas</span>&nbsp;&nbsp;
                                            <input type="text" id="proteinas" name="proteinas" placeholder="Describa"
                                                class="form-control" onkeyup="mayus(this);">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group pull-left">
                                            <span>Colesterol total</span>&nbsp;&nbsp;
                                            <input type="text" id="colesteroltotal" name="colesteroltotal"
                                                placeholder="Describa" class="form-control" onkeyup="mayus(this);">
                                        </div>
                                    </div><br><br>
                                    <div class="col-md-6">
                                        <div class="input-group pull-left">
                                            <span>LDL</span>&nbsp;&nbsp;
                                            <input type="text" id="ldl" name="ldl" placeholder="Describa"
                                                class="form-control" onkeyup="mayus(this);">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group pull-left">
                                            <span>HDL</span>&nbsp;&nbsp;
                                            <input type="text" id="hdl" name="hdl" placeholder="Describa"
                                                class="form-control" onkeyup="mayus(this);">
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="text-align: center; margin-top: 30px;">
                                        <strong>Cambios ECG</strong>
                                    </div>
                                    <div class="col-md-8">
                                        <strong>Electrocardiograma</strong>
                                        <select name="electrocardio" id="electrocardio" class="form-control">
                                            <option value="">Seleccione una opción</option>
                                            <option value="electro con cambios">Si</option>
                                            <option value="electro sin cambios">No</option>

                                        </select>
                                    </div>

                                    <fieldset id="opcionelectro" class="col-md-12">
                                        <strong>Derivaciones afectadas</strong><br>
                                        <input type="checkbox" name="check_lista4[]" id="check_lista3[]" class="check"
                                            value="DI">&nbsp;&nbsp;DI&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista4[]" id="check_lista3[]" class="check"
                                            value="DII">&nbsp;DII&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista4[]" id="check_lista3[]" class="check"
                                            value="DIII">&nbsp;DIII&nbsp;&nbsp;<br>
                                        <input type="checkbox" name="check_lista4[]" id="check_lista3[]" class="check"
                                            value="aVr">&nbsp;aVr&nbsp;
                                        <input type="checkbox" name="check_lista4[]" id="check_lista3[]" class="check"
                                            value="aVf">&nbsp;aVf&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista4[]" id="check_lista3[]" class="check"
                                            value="aVL">&nbsp;aVL&nbsp;&nbsp;<br>
                                        <input type="checkbox" name="check_lista4[]" id="check_lista3[]" class="check"
                                            value="V1">&nbsp;V1&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista4[]" id="check_lista3[]" class="check"
                                            value="V2">&nbsp;V2&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista4[]" id="check_lista3[]" class="check"
                                            value="V3">&nbsp;V3&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista4[]" id="check_lista3[]" class="check"
                                            value="V4">&nbsp;V4&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista4[]" id="check_lista3[]" class="check"
                                            value="V5">&nbsp;V5&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista4[]" id="check_lista3[]" class="check"
                                            value="V6">&nbsp;V6&nbsp;&nbsp;<br>
                                        <input type="checkbox" name="check_lista4[]" id="check_lista3[]" class="check"
                                            value="V7">&nbsp;V7&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista4[]" id="check_lista3[]" class="check"
                                            value="V8">&nbsp;V8&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="check_lista4[]" id="check_lista3[]" class="check"
                                            value="V9">&nbsp;V9&nbsp;&nbsp;


                                    </fieldset>

                                    <div class="col-md-4" style="text-align: center; margin-top: 30px;">
                                        <strong>Se aplico trombolisis al paciente</strong>
                                    </div>
                                    <div class="col-md-8">
                                        <strong>Trombolisis</strong>
                                        <select name="trombolisis" id="trombolisis" class="form-control">
                                            <option value="">Seleccione una opción</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4" id="iniciotromb">
                                        <strong>Fecha/hora inicio</strong>
                                        <input type="datetime-local" id="iniciotrombolisis" name="iniciotrombolisis"
                                            placeholder="Describa" class="form-control" onkeyup="mayus(this);">
                                    </div>
                                    <div class="col-md-4" id="finalizotromb">
                                        <strong>Fecha/hora finaliza</strong>
                                        <input type="datetime-local" id="finalizotrombolisis" name="finalizotrombolisis"
                                            placeholder="Describa" class="form-control" onkeyup="mayus(this);">
                                    </div>
                                    <div class="col-md-4" id="fibrinolitico">
                                        <strong>Tipo de fibrinolitico</strong>
                                        <select name="fibrinoliticos" id="fibrinoliticos" class="form-control">
                                            <option value="">Seleccione una opción</option>
                                            <option value="tecnecteplasa">Tecnecteplasa</option>
                                            <option value="Alteplasa">Alteplasa</option>
                                            <option value="Estreptoginasa">Estreptoquinasa</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12" style="text-align: center;">
                                        <strong>Procedimiento</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <!-- moverlos -->
                                        <strong>Killip Kimball</strong>
                                        <select name="killip" id="killip" class="form-control" style="width: 100%;"
                                            required>
                                            <option value="0">Selecciona</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT * FROM killip_kimball ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['nombre_killip']; ?>">
                                                <?php echo $row['nombre_killip']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Fevi</strong>
                                        <select name="fevi" id="fevi" class="form-control" style="width: 100%;"
                                            required>
                                            <option value="0">Selecciona</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT * FROM fevi ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['nombrefevi']; ?>">
                                                <?php echo $row['nombrefevi']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Choque cardiogenico</strong>
                                        <select name="choque" id="choque" class="form-control" style="width: 100%;"
                                            required>
                                            <option value="0">Selecciona</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT * FROM choquecardiogenico ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['nombre_choque']; ?>">
                                                <?php echo $row['nombre_choque']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Localización</strong>

                                        <select name="localizacion" id="localizacion" class="form-control"
                                            style="width: 100%;" required>
                                            <option value="0">Seleccionar</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT id_localizacion, nombre_localizacion FROM localizacion ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['nombre_localizacion']; ?>">
                                                <?php echo $row['nombre_localizacion']; ?></option>
                                            <?php } ?>

                                            <!--<option value="1">Otro</option>-->

                                        </select>

                                    </div>

                                    <div class="col-md-12">
                                        <strong>Tiempo isquemia total</strong>
                                        <input type="text" id="tiempoisquemia" name="tiempoisquemia"
                                            placeholder="Describa" class="form-control" onkeyup="mayus(this);">
                                    </div>

                                    <div class="col-md-6" id="iniciofibri">
                                        <strong>Fecha/hora inicio</strong>
                                        <input type="datetime-local" id="iniciofibrilonitico" name="iniciofibrilonitico"
                                            placeholder="Describa" class="form-control" onkeyup="mayus(this);">
                                    </div>
                                    <div class="col-md-6" id="finalizofibri">
                                        <strong>Fecha/hora finaliza</strong>
                                        <input type="datetime-local" id="finalizofibrilonitico"
                                            name="finalizofibrilonitico" placeholder="Describa" class="form-control"
                                            onkeyup="mayus(this);">
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Revascularización</strong>
                                        <select name="revascularizacion" id="revascularizacion" class="form-control"
                                            style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT * FROM revascularizacion ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['nombre_revascularizacion']; ?>">
                                                <?php echo $row['nombre_revascularizacion']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Disección</strong>
                                        <select name="diseccion" id="diseccion" class="form-control"
                                            style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT * FROM diseccion ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['descripcion']; ?>">
                                                <?php echo $row['descripcion']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>IAM Periprocedimiento</strong>
                                        <select name="iamperiprocedimiento" id="iamperiprocedimiento"
                                            class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT * FROM iam_periprocedimiento ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['nombre_aimperi']; ?>">
                                                <?php echo $row['nombre_aimperi']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Complicaciones</strong>
                                        <select name="complicaciones" id="complicaciones" class="form-control"
                                            style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT * FROM complicaciones ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['nombre_compliacion']; ?>">
                                                <?php echo $row['nombre_compliacion']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Flujo microvascular tmp</strong>
                                        <select name="flujomicrovasculartmp" id="flujomicrovasculartmp"
                                            class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT * FROM flujo_microvascular_tmp ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['nombre_flujo_microvascular']; ?>">
                                                <?php echo $row['nombre_flujo_microvascular']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Fujo final tfg</strong>
                                        <select name="flujofinaltfg" id="flujofinaltfg" class="form-control"
                                            style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT * FROM flujo_final_tfg ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['nombre_flujo_final']; ?>">
                                                <?php echo $row['nombre_flujo_final']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Trombosis definitiva</strong>
                                        <select name="trombosisdefinitiva" id="trombosisdefinitiva" class="form-control"
                                            style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT * FROM trombosis_definitiva ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['nombre_trombosis']; ?>">
                                                <?php echo $row['nombre_trombosis']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Marca pasos temporal</strong>
                                        <select name="marcapasostemporal" id="marcapasostemporal" class="form-control"
                                            style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT * FROM marcapasos_temporal ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['descripcion']; ?>">
                                                <?php echo $row['descripcion']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Estancia hospitalaria</strong>
                                        <textarea id="estanciahospitalaria" name="estanciahospitalaria"
                                            placeholder="Describa" class="form-control" onkeyup="mayus(this);"
                                            rows="2"></textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Reestentosis intrastent</strong>
                                        <select name="reesentosis" id="reesentosis" class="form-control"
                                            style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT * FROM reestenosis_intrastent ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['descripcion_resentosis']; ?>">
                                                <?php echo $row['descripcion_resentosis']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Rehospitalización</strong>
                                        <select name="rehospitalizacion" id="rehospitalizacion" class="form-control"
                                            style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT * FROM rehospitalacion_one_year ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['descripcion_rehospi']; ?>">
                                                <?php echo $row['descripcion_rehospi']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>MACE Hospitalario</strong>
                                        <input type="text" name="escaladeriesgo" id="escaladeriesgo"
                                            class="form-control">

                                    </div>


                                    <div class="col-md-4">
                                        <strong>Defunción</strong>
                                        <select name="defuncion" id="defuncion" class="form-control"
                                            style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT * FROM defuncion ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['descripcion']; ?>">
                                                <?php echo $row['descripcion']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                    <div class="col-md-4" id="defuncionopcion">
                                        <strong>Causa defunción</strong>
                                        <select name="causadefuncion" id="causadefuncion" class="form-control"
                                            style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php 
				    require 'conexionInfarto.php';
				  $query = "SELECT * FROM causa ";
	                $resultado=$conexion2->query($query);
				while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['nombre_causa']; ?>">
                                                <?php echo $row['nombre_causa']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                    <div class="col-md-4" id="fechadefuncionopcion">
                                        <strong>Fecha defuncion</strong>
                                        <input type="datetime-local" name="fechadefuncion" id="fechadefuncion"
                                            class="form-control">

                                    </div>
                                    <div class="col-md-12"></div>
                                    <br>


                                    <input type="submit" id="registrar" value="Registrar">
                                    <a href='' id="recargar" onclick="window.reload();">Finalizar</a>

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