<div class="modal fade" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" id="datousuario">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/estilosMenu.css" rel="stylesheet">
    <script src="js/enviadatousuario.js"></script>
    <script src="js/getCatalogos.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 950px; height: auto; color:black; left: 50%; transform: translate(-50%); ">
            <div class="modal-header" id="cabeceraModal">
                <button type="button" class="close" data-bs-dismiss="modal" onclick="limpiar();">&times;</button>
                <h5 class="modal-title">Datos personales</h5>
            </div>
            <div class="modal-body">

                <div id="panel_editar">

                    <div class="contrato-nuevo">




                        <div class="modal-body">
                            <script>
                            $(window).load(function() {
                                $(".loader").fadeOut("slow");
                            });

                            function limpiar() {

                                setTimeout('document.formulario.reset()', 2000);
                                return false;
                            }

                            var idcurp;

                            function obtenerid() {

                                var textoadjunto = document.getElementById("curp").value = idcurp;


                            }
                            </script>
                            </script>




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
                            <form name="formulario" id="formulario" onSubmit="return limpiar()">
                                <div class="form-row">
                                    <div id="mensaje"></div>
                                    <script>
                                    $("#formulario").on("submit", function(e) {
                                        let checked = this.querySelectorAll('input[type=checkbox]:checked');
                                        e.preventDefault();

                                        var formData = new FormData(document.getElementById("formulario"));
                                        formData.append("dato", "valor");

                                        $.ajax({

                                            url: "aplicacion/registrarpaciente.php",
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

                                    function curp2date(curp) {
                                        var miCurp = document.getElementById('curp').value.toUpperCase();
                                        var sexo = miCurp.substr(-8, 1);
                                        var m = miCurp.match(/^\w{4}(\w{2})(\w{2})(\w{2})/);
                                        //miFecha = new Date(año,mes,dia) 
                                        var anyo = parseInt(m[1], 10) + 1900;
                                        if (anyo < 1950) anyo += 100;
                                        var mes = parseInt(m[2], 10) - 1;
                                        var dia = parseInt(m[3], 10);
                                        document.formulario.fecha.value = (new Date(anyo, mes, dia));
                                        if (sexo == 'M') {
                                            document.formulario.sexo.value = 'Femenino';
                                        } else if (sexo == 'H') {
                                            document.formulario.sexo.value = 'Masculino';
                                        }

                                    }
                                    Date.prototype.toString = function() {
                                        var anyo = this.getFullYear();
                                        var mes = this.getMonth() + 1;
                                        if (mes <= 9) mes = "0" + mes;
                                        var dia = this.getDate();
                                        if (dia <= 9) dia = "0" + dia;
                                        return anyo + "-" + mes + "-" + dia;
                                    }
                                    </script>

                                    <div class="col-md-6" autocomplete="off">
                                        <input id="year" name="year" class="form-control" type="hidden" value="2022"
                                            required="required" onkeyup="mayus(this);" readonly>
                                    </div>
                                    <div class="col-md-12">
                                        <strong>CURP</strong>
                                        <input id="curp" name="curp" type="text" class="form-control" value=""
                                            minlength="18" maxlength="18" readonly>
                                        <span id="curps" class="curps" name="curps"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Nombre Completo</strong>
                                        <input id="nombrecompleto" name="nombrecompleto" type="text"
                                            onclick="obtenerid();" class="form-control" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Telefono celular</strong>
                                        <input id="telefonocelular" name="telefonocelular" onblur="curp2date();"
                                            onclick="curp2date();" type="text" class="form-control" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Telefono de casa</strong>
                                        <input id="telefonocasa" name="telefonocasa" onblur="calcularEdad();"
                                            onclick="calcularEdad();" type="text" class="form-control" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Otro telefono</strong>
                                        <input id="telefonocasa" name="telefonocasa" onblur="calcularEdad();"
                                            onclick="calcularEdad();" type="text" class="form-control" value="">
                                    </div>



                                    <script>
                                    function Edad(FechaNacimiento) {

                                        var fechaNace = new Date(FechaNacimiento);
                                        var fechaActual = new Date()

                                        var mes = fechaActual.getMonth();
                                        var dia = fechaActual.getDate();
                                        var año = fechaActual.getFullYear();

                                        fechaActual.setDate(dia);
                                        fechaActual.setMonth(mes);
                                        fechaActual.setFullYear(año);

                                        edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));

                                        return edad;


                                    }

                                    function calcularEdad() {
                                        var fecha = document.getElementById('fecha').value;


                                        var edad = Edad(fecha);
                                        document.formulario.edad.value = edad;

                                    }

                                    window.addEventListener('DOMContentLoaded', (evento) => {
                                        const hoy_fecha = new Date().toISOString().substring(0, 10);
                                        document.querySelector("input[name='fecha']").max = hoy_fecha;

                                    });

                                    $(document).ready(function() {

                                        $('#referenciado').change(function(e) {
                                            if ($(this).val() === "1") {

                                                $('#refe').prop("hidden", false);
                                                $('#diag').prop("hidden", false);
                                            } else {
                                                $('#refe').prop("hidden", true);
                                                $('#diag').prop("hidden", true);

                                            }
                                        })
                                    });

                                    $(function() {
                                        // $('#refe').prop("hidden", true);
                                        // $('#diag').prop("hidden", true);
                                    })
                                    </script>
                                    <div class="col-md-4">
                                        <strong>Fecha de nacimiento</strong>
                                        <input id="fecha" name="fecha" type="date" value="" onblur="curp2date();"
                                            class="form-control" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Edad</strong>
                                        <input id="edad" name="edad" type="text" class="form-control" value="" readonly>
                                    </div>

                                    <div class="col-md-4">
                                        <strong>Sexo</strong>
                                        <input type="text" class="form-control" id="sexo" onclick="curp2date();"
                                            name="sexo" readonly>

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
                                    </div><br>


                                    <div class="col-md-6">
                                        <strong>Localidad</strong>
                                        <input type="text" id="localidad" name="localidad" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Colonia</strong>
                                        <input type="text" id="colonia" name="colonia" class="form-control" rows="4">
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Calle</strong>
                                        <input type="text" id="calle" name="calle" class="form-control"
                                            onkeyup="mayus(this);">
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Num exterior</strong>
                                        <input type="text" id="numexterior" name="numexterior" class="form-control"
                                            onkeyup="mayus(this);">
                                    </div>


                                    <div class="col-md-6">
                                        <strong>Num interior</strong>
                                        <input type="text" id="numinterior" name="numinterior" placeholder="Describa"
                                            class="form-control">
                                    </div>


                                    <br>
                                    <div class="col-md-12"></div>

                                    <input type="submit" id="registrar" value="Registrar">
                                    <a href='' id="recargar" onclick="window.reload();">Finalizar</a>

                                    <br>
                                </div>
                            </form>
                            <div id="tabla_resultado2"></div>
                        </div>
                        <script src="js/vendor/bootstrap.js"></script>
                        <script src="js/main.js"></script>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>