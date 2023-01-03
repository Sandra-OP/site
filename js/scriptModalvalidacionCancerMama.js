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
function curp2date(curp) {
    var miCurp = document.getElementById('curp').value.toUpperCase();
    var sexo = miCurp.substr(-8, 1);
    var m = miCurp.match(/^\w{4}(\w{2})(\w{2})(\w{2})/);
    //miFecha = new Date(año,mes,dia) 
    var anyo = parseInt(m[1], 10) + 1900;
    if (anyo < 1940) anyo += 100;
    var mes = parseInt(m[2], 10) - 1;
    var dia = parseInt(m[3], 10);
    document.formulario.fecha.value = (new Date(anyo, mes, dia));
    if (sexo == 'M') {
        document.formulario.sexo.value = 'Femenino';
    } else if (sexo == 'H') {
        document.formulario.sexo.value = 'Masculino';
    } else if (sexo != 'M' || 'H') {
        alert('Error de CURP');
    }

}
$(document).ready(function() {

    $('#mscancer').change(function(e) {

        
    }).multipleSelect({
        width: '100%'
    });
});
$(document).ready(function() {

    $('#mspato').change(function(e) {

        
    }).multipleSelect({
        width: '100%'
    });
});
Date.prototype.toString = function() {
    var anyo = this.getFullYear();
    var mes = this.getMonth() + 1;
    if (mes <= 9) mes = "0" + mes;
    var dia = this.getDate();
    if (dia <= 9) dia = "0" + dia;
    return anyo + "-" + mes + "-" + dia;
}
window.addEventListener('DOMContentLoaded', (evento) => {
    const hoy_fecha = new Date().toISOString().substring(0, 10);
    document.querySelector("input[name='fecha']").max = hoy_fecha;

});

$(document).ready(function() {

    $('#referenciado').change(function(e) {
        if ($(this).val() === "Si") {

            $('#unidadreferencia').prop("disabled", false);
        } else {
            $('#unidadreferencia').prop("disabled", true);
            $('#unidadreferencia').val('');

        }
    })
});

$(function() {
    $('#unidadreferencia').prop("disabled", true);

})
//clasificacion tamaños tumorales
$(document).ready(function() {

    $('#etapasclinicas').change(function(e) {
        if ($(this).val() === "TNM") {

            $('#tumoraltamanio').prop("hidden", false);
            $('#nodal_linfatico').prop("hidden", false);
            $('#metasta').prop("hidden", false);
            $('#calidaddevidaecog').prop("selectedIndex",0);
            $('#etapasclasificacion').prop("selectedIndex", 0);
        } else {
            $('#tumoraltamanio').prop("hidden", true);
            $('#nodal_linfatico').prop("hidden", true);
            $('#metasta').prop("hidden", true);
            $('#metastasissitio').prop("hidden", true);
        
        }
    })
});
function calcularmestruacion(){
    const fecha = toLocaleDateString();
    alert(fecha);
}
$(function() {
    $('#tumoraltamanio').prop("hidden", true);
    $('#nodal_linfatico').prop("hidden", true);
    $('#metasta').prop("hidden", true);
    $('#metastasissitio').prop("hidden", true);
})

$(document).ready(function() {

    $('#etapasclinicas').change(function(e) {
        if ($(this).val() === "Etapas") { 

            $('#etapas').prop("hidden", false);
            $('#tamañotumoral').prop('selectedIndex',0);
            $('#linfaticonodal').prop('selectedIndex',0);
            $('#metastasis').prop('selectedIndex',0);
            $('#sitiometastasis').prop("selectedIndex", 0);
            $('#calidaddevidaecog').prop("selectedIndex",0);
                } else {
            $('#etapas').prop("hidden", true);
            $('#etapasclasificacion').prop("selectedIndex", 0);

        }
    })
});
$(function() {

    $('#etapas').prop("hidden", true);

})
//Etapas metastasicas
$(document).ready(function() {

    $('#metastasis').change(function(e) {
        if ($(this).val() === "M1 Con enfermedad metastasica") {

            $('#metastasissitio').prop("hidden", false);
        } else {
            $('#metastasissitio').prop("hidden", true);
            $('#sitiometastasis').prop("selectedIndex", 0);
        }
    })
});

$(function() {
    $('#metastasissitio').prop("hidden", true);
    $('#sitiometastasis').prop("selectedIndex", 0);


})
//Etapa fish
$(document).ready(function() {

    $('#oncogen').change(function(e) {
        if ($(this).val() === "Dos cruces") {

            $('#muestrafish').prop("hidden", false);
        } else {
            $('#muestrafish').prop("hidden", true);
            $('#fish').prop("selectedIndex", 0);

        }
    })
});

$(function() {
    $('#muestrafish').prop("hidden", true);

})
function calculaIMC() {

    let talla = document.getElementById('talla').value;
    let peso = document.getElementById('peso').value;


    imccalculo = Math.pow(talla, 2);
    let limitimcalculo = imccalculo.toFixed(2);
    let calculoimc = peso / limitimcalculo;
    let limitcalculofinal = calculoimc.toFixed(1);

    document.formulario.imc.value = limitcalculofinal;

}




$(window).load(function() {
    $(".loader").fadeOut("slow");
});

function limpiar() {

    setTimeout('document.formulario.reset()', 1000);

    return false;
}

$(document).ready(function() {

    $('#trombolisis').change(function(e) {
        if ($(this).val() === "Si") {

            $('#iniciotromb').prop("hidden", false);
            $('#finalizotromb').prop("hidden", false);
            $('#fibrinolitico').prop("hidden", false);

        } else {
            $('#iniciotromb').prop("hidden", true);
            $('#finalizotromb').prop("hidden", true);
            $('#fibrinolitico').prop("hidden", true);


        }
    })
});

$(function() {
    $('#iniciotromb').prop("hidden", true);
    $('#finalizotromb').prop("hidden", true);
    $('#fibrinolitico').prop("hidden", true);

})

$(document).ready(function() {

    $('#fibrilonitico').change(function(e) {
        if ($(this).val() === "Si") {

            $('#iniciofibri').prop("hidden", false);
            $('#finalizofibri').prop("hidden", false);

        } else {
            $('#iniciofibri').prop("hidden", true);
            $('#finalizofibri').prop("hidden", true);


        }
    })
});

$(function() {
    $('#iniciofibri').prop("hidden", true);
    $('#finalizofibri').prop("hidden", true);

})
//funcion para carecteristicas tipicas atipicas
$(document).ready(function() {

    $('#caractipicasatipicas').change(function(e) {
        if ($(this).val() === "tipicas") {

            $('#tipicascombos').prop("hidden", false);
            $('#tipicascombos2').prop("hidden", false);


        } else {
            $('#tipicascombos').prop("hidden", true);
            $('#tipicascombos2').prop("hidden", true);

        }
        if ($(this).val() === "atipicas") {

            $('#atipicascombos').prop("hidden", false);


        } else {
            $('#atipicascombos').prop("hidden", true);

        }
    })
});

$(function() {
    $('#tipicascombos').prop("hidden", true);
    $('#tipicascombos2').prop("hidden", true);
    $('#atipicascombos').prop("hidden", true);

})

//MOSTRAR O OCULTAR CHECKBOX DE ELECTROS


$(document).ready(function() {

    $('#procedimientorealizado').change(function(e) {
        if ($(this).val() === "si") {

            $('#iniciodeprocedimiento').prop("hidden", false);
            $('#tipoprocedimiento').prop("hidden", false);
            $('#procedimientofueexitoso').prop("hidden", false);
            


        } else {
            $('#iniciodeprocedimiento').prop("hidden", true);
            $('#tipoprocedimiento').prop("hidden", true);
            $('#procedimientofueexitoso').prop("hidden", true);

        }
        if ($(this).val() === "no") {
            $('#idotc').prop("hidden", true);
            $('#idolusion2').prop("hidden", true);
            $('#idtratamientovaso').prop("hidden", true);
            $('#idsintax').prop("hidden", true);   
            $('#idtromboaspiracion').prop("hidden", true);  
            $('#idtipoinjerto').prop("hidden", true);
            $('#idmediocontraste').prop("hidden", true);
            $('#idestrategia').prop("hidden", true);
            $('#idsitiopuncion').prop("hidden", true);
            $('#idetapasprocedimiento').prop("hidden", true);
            $('#idstend').prop("hidden", true);
            $('#idolusion').prop("hidden", true);

            $('#idseveridad').prop("hidden", true);

            //limpiar todos los select al seleccionar la opcion de no

            $('#otc').prop('selectedIndex',0);
            $('#olusion2').prop('selectedIndex',0);
            $('#tratamientovaso').prop('selectedIndex',0);
            $('#sintax').prop('selectedIndex',0);
            $('#tromboaspiracion').prop('selectedIndex',0);

            $('#estrategia').prop('selectedIndex',0);
            $('#sitiodepuncion').prop('selectedIndex',0);
            $('#stent').prop('selectedIndex',0);
            $('#etapasprocedimiento').prop('selectedIndex',0);
            $('#olusion').prop('selectedIndex',0);
            $('#severidad').prop('selectedIndex',0);
            $('#tipodeprocedimiento').prop('selectedIndex',0);
            $('#procedimientoexitoso').prop('selectedIndex',0);

            $('#inicioprocedimiento').val('');
            $('#tipodeinjerto').val('');
            $('#mediodecontraste').val('');

        }else{

        }
        
    })
});

$(function() {
    $('#iniciodeprocedimiento').prop("hidden", true);
    $('#tipoprocedimiento').prop("hidden", true);
    $('#procedimientofueexitoso').prop("hidden", true);

    $('#idotc').prop("hidden", true);
    $('#idolusion2').prop("hidden", true);
    $('#idtratamientovaso').prop("hidden", true);
    $('#idsintax').prop("hidden", true);   
    $('#idtromboaspiracion').prop("hidden", true);  
    $('#idtipoinjerto').prop("hidden", true);
    $('#idmediocontraste').prop("hidden", true);
    $('#idestrategia').prop("hidden", true);
    $('#idsitiopuncion').prop("hidden", true);
    $('#idetapasprocedimiento').prop("hidden", true);
    $('#idstend').prop("hidden", true);
    $('#idolusion').prop("hidden", true);

    $('#idseveridad').prop("hidden", true);
    
    

})

$(document).ready(function() {

    $('#tipodeprocedimiento').change(function(e) {
        if ($(this).val() === "Coronariografia") {

            $('#idestrategia').prop("hidden", false);
            $('#idsitiopuncion').prop("hidden", false);
            $('#idetapasprocedimiento').prop("hidden", false);
            $('#idstend').prop("hidden", false);
            $('#idolusion').prop("hidden", false);
            


        } else {
            $('#idestrategia').prop("hidden", true);
            $('#idsitiopuncion').prop("hidden", true);
            $('#idetapasprocedimiento').prop("hidden", true);
            $('#idstend').prop("hidden", true);
            $('#idolusion').prop("hidden", true);

            $('#estrategia').prop('selectedIndex',0);
            $('#sitiodepuncion').prop('selectedIndex',0);
            $('#etapasprocedimiento').prop('selectedIndex',0);
            $('#stent').prop('selectedIndex',0);
            $('#olusion').prop('selectedIndex',0);
    

        }
        if($(this).val() === "Angioplastia coronaria trasnluminal") {
            $('#idseveridad').prop("hidden", false);
        
            


        } else {
            $('#idseveridad').prop("hidden", true);
            
            $('#otc').prop('selectedIndex',0);
            $('#olusion2').prop('selectedIndex',0);
            $('#tratamientovaso').prop('selectedIndex',0);
            $('#sintax').prop('selectedIndex',0);
            $('#tromboaspiracion').prop('selectedIndex',0);

            $('#estrategia').prop('selectedIndex',0);
            $('#sitiodepuncion').prop('selectedIndex',0);
            $('#stent').prop('selectedIndex',0);
            $('#etapasprocedimiento').prop('selectedIndex',0);
            $('#olusion').prop('selectedIndex',0);
            $('#severidad').prop('selectedIndex',0);

            $('#inicioprocedimiento').val('');
            $('#tipodeinjerto').val('');
            $('#mediodecontraste').val(''); 

        }
        
    })
});

$(function() {
    $('#idestrategia').prop("hidden", true);
            $('#idsitiopuncion').prop("hidden", true);
            $('#idetapasprocedimiento').prop("hidden", true);
            $('#idstend').prop("hidden", true);
            $('#idolusion').prop("hidden", true);

            $('#idseveridad').prop("hidden", true);
    
    

})

$(document).ready(function() {

    $('#severidad').change(function(e) {
        if ($(this).val() === "OTC") {

            $('#idotc').prop("hidden", false);
            $('#idolusion2').prop("hidden", false);
            $('#idtratamientovaso').prop("hidden", false);
            $('#idtromboaspiracion').prop("hidden", false);
            $('#idtipoinjerto').prop("hidden", false);
            $('#idmediocontraste').prop("hidden", false);
            
        } else {
            $('#idotc').prop("hidden", true);
            $('#idolusion2').prop("hidden", true);
            $('#idtratamientovaso').prop("hidden", true);
            $('#idtromboaspiracion').prop("hidden", true);
            $('#idtipoinjerto').prop("hidden", true);
            $('#idmediocontraste').prop("hidden", true);

            $('#otc').prop('selectedIndex',0);
            $('#olusion2').prop('selectedIndex',0);
$('#tratamientovaso').prop('selectedIndex',0);
$('#tromboaspiracion').prop('selectedIndex',0);
$('#tipodeinjerto').val('');
            $('#mediodecontraste').val(''); 
            $('#sintax').prop('selectedIndex',0);


        }

        if ($(this).val() === "SINTAX") {

            $('#idsintax').prop("hidden", false);

        } else {
            $('#idsintax').prop("hidden", true);
            $('#otc').prop('selectedIndex',0);
            $('#olusion2').prop('selectedIndex',0);
$('#tratamientovaso').prop('selectedIndex',0);
$('#tromboaspiracion').prop('selectedIndex',0);
$('#tipodeinjerto').val('');
            $('#mediodecontraste').val(''); 

        }
    
        
    })
});

$(function() {
    $('#idotc').prop("hidden", true);
    $('#idolusion2').prop("hidden", true);
    $('#idtratamientovaso').prop("hidden", true);
    $('#idsintax').prop("hidden", true);   
    $('#idtromboaspiracion').prop("hidden", true);  
    $('#idtipoinjerto').prop("hidden", true);
    $('#idmediocontraste').prop("hidden", true);
    

})

//Diferencia de fecha si un es mayor a un año o menor
function calcularmestruacion(){
    
var fecha1 = $("#fechaultimamestruacion").val();
var fechaActual = new Date()
if(fecha1 == ''){
}else{
const fecha_compare_1 = new Date(fecha1)
const fecha_compare_2 = new Date(fechaActual)

fecha_compare_1.setMonth(fecha_compare_1.getMonth()+ 12);

//alert(`fecha1 es mayor a 12 meses? > ${fecha_compare_1> fecha_compare_2} `  )
const menopausea = 'Menopausea';
const perimenopausea = 'Perimenopausea';
if (fecha_compare_1< fecha_compare_2){
    $('#menopauperimenopau').prop("hidden", false);
    $('#menopausea').val(menopausea);
}else{
    $('#menopauperimenopau').prop("hidden", false);
    $('#menopausea').val(perimenopausea);
}

}
}
$(function() {
    $('#menopauperimenopau').prop("hidden", true);
    

})
/*numero de gestas*/
$(document).ready(function() {

    $('#gestas').change(function(e) {
        if ($(this).val() != 0) {

            $('#parto').prop("disabled", false);
            $('#aborto').prop("disabled", false);
            $('#cesarea').prop("disabled", false);

        }else{
            $('#parto').prop("disabled", true);
            $('#aborto').prop("disabled", true);
            $('#cesarea').prop("disabled", true);
        }

    })
});
$(function(){
    $('#parto').prop("disabled", true);
    $('#aborto').prop("disabled", true);
    $('#cesarea').prop("disabled", true);
});
function validaparto(){
    let parto = parseFloat($("#parto").val());
    let aborto = parseFloat($("#aborto").val());
    let cesarea = parseFloat($("#cesarea").val());
    let cantidad = parseFloat($("#gestas").val());
        let sumauno = parto + aborto;
        let sumauno2 = parto + cesarea;

        if(parto === cantidad){
            $('#aborto').prop("disabled", true);
            $('#cesarea').prop("disabled", true);
            $('#aborto').val('0');
            $('#cesarea').val('0');
        }else{
            $('#aborto').prop("disabled", false);
            $('#cesarea').prop("disabled", false);
        }
        if(sumauno === cantidad || parto === cantidad){
            $('#cesarea').prop("disabled", true);
            $('#cesarea').val('0');
        }else{
            $('#cesarea').prop("disabled", false);
        }
        if(sumauno === cantidad || cesarea === cantidad ){
            $('#parto').prop("disabled", true);
            $('#aborto').prop("disabled", true);

        }else{
            $('#parto').prop("disabled", false);
            $('#aborto').prop("disabled", false);
        }
        if(sumauno2 === cantidad ){
            $('#aborto').prop("disabled", true);
        
            $('#aborto').val('0');
        }else{
            $('#aborto').prop("disabled", false);
        }
        if(cantidad === 0){
            $('#cesarea').val('0');
            $('#aborto').val('0');
            $('#parto').val('0');
        }
        
    
}
$(document).ready(function() {

    $('#planificacionfamiliar').change(function(e) {
    let parto = parseFloat($("#parto").val());
    let aborto = parseFloat($("#aborto").val());
    let cesarea = parseFloat($("#cesarea").val());
    let cantidad = parseFloat($("#gestas").val());
        let sumar = parto + aborto + cesarea;

    if(sumar > cantidad || parto > cantidad || aborto > cantidad || cesarea > cantidad){
        swal({
            title: 'Warning!',
            text: 'Error! Las sumas de Parto, Aborto y Cesarea no empatan con la cantidad de gestas, Favor de verificar!',
            icon: 'error',
            
        });
    }else if(cantidad === 0){

    }

    
});
});
$(document).ready(function() {

    $('#lactancia').change(function(e) {
    let parto = parseFloat($("#parto").val());
    let aborto = parseFloat($("#aborto").val());
    let cesarea = parseFloat($("#cesarea").val());
    let cantidad = parseFloat($("#gestas").val());
        let sumar = parto + aborto + cesarea;

        if (sumar > cantidad) {
        swal({
            title: 'Warning!',
            text: 'Error! Las sumas de Parto, Aborto y Cesarea no empatan con la cantidad de gestas, Favor de verificar!',
            icon: 'error',
            
        });
    } else if (cantidad === 0) {

    }


});
});

/*termina numero de gestas*/
/*quirurgico*/
$(document).ready(function() {

    $('#quirurgico').change(function(e) {
        if ($(this).val() === "Si") {

            $('#tipoquirurgico').prop("hidden", false);
            $('#reconstruccion').prop("hidden", false);
            $('#lateralidad').prop("hidden", false);
            $("#guardaApartado").prop("hidden", false);

        } else {
            $('#tipoquirurgico').prop("hidden", true);
            $('#tipomastectomia').prop("hidden", true);
            $('#reconstruccion').prop("hidden", true);
            $('#tipoganglionar').prop("hidden", true);
            $('#tiporeconstruccion').prop("hidden", true);
            $('#fechatipomastectomia').prop("hidden", true);
            $('#fechatipoganglionar').prop("hidden", true);
            $("#guardaApartado").prop("hidden", true);
            $('#lateralidad').prop("hidden", true);
            $('#fechatiporeconstruccion').val('');
            $('#quirurgicotipo').prop('selectedIndex',0);
            $('#mastectomiatipo').prop("selectedIndex", 0);
            $('#reconstruccionsino').prop("selectedIndex", 0);
            $('#fechatipomastecto').prop("selectedIndex", 0);
            $('#fechatipoganglio').prop("selectedIndex", 0);
            $('#reconstrucciontipo').prop("selectedIndex", 0);
            $('#lateralidadsegundo').prop("selectedIndex", 0);
        }
    })
});

$(function() {
    $('#tipoquirurgico').prop("hidden", true);
    $('#tipomastectomia').prop("hidden", true);
    $('#reconstruccion').prop("hidden", true);
    $('#tipoganglionar').prop("hidden", true);
    $('#tiporeconstruccion').prop("hidden", true);
    $('#lateralidad').prop("hidden", true);
    $('#reconstrucciontipofecha').prop("hidden", true);
    $("#guardaApartado").prop("hidden", true);
    $('#quirurgicotipo').prop('selectedIndex',0);
    $('#mastectomiatipo').prop("selectedIndex", 0);
    $('#reconstruccionsino').prop("selectedIndex", 0);
    $('#fechatipomastecto').prop("selectedIndex", 0);
    $('#fechatipoganglio').prop("selectedIndex", 0);
    $('#lateralidadsegundo').prop("selectedIndex", 0);

})
/*termina quirurgico*/
/*mastectomia ganglionar*/
$(document).ready(function() {

    $('#quirurgicotipo').change(function(e) {
        if ($(this).val() === "Mastectomia") {

            $('#tipomastectomia').prop("hidden", false);
            $('#fechatipomastectomia').prop("hidden", false);
            $('#ganglionartipo').prop("selectedIndex", 0);
            $('#fechatipoganglio').prop("selectedIndex", 0);
            $('#fechatipomastecto').val('');
            $('#fechatipoganglio').val('');
        } else {
            $('#tipomastectomia').prop("hidden", true);
            $('#fechatipomastectomia').prop("hidden", true);
            $('#fechatipomastecto').val('');
            $('#fechatipoganglio').val('');
        
        }
        if ($(this).val() === "Ganglionar") {

            $('#tipoganglionar').prop("hidden", false);
            $('#fechatipoganglionar').prop("hidden", false);
            $('#mastectomiatipo').prop("selectedIndex", 0);
            $('#fechatipomastecto').prop("selectedIndex", 0);
            $('#fechatipoganglio').val('');
            $('#fechatipomastecto').val('');
        } else {
            $('#tipoganglionar').prop("hidden", true);
            $('#fechatipoganglionar').prop("hidden", true);
            $('#fechatipoganglio').val('');
            $('#fechatipomastecto').val('');
        
        }
    })
});

$(function() {
    $('#tipomastectomia').prop("hidden", true);
    $('#tipoganglionar').prop("hidden", true);
    $('#fechatipomastectomia').prop("hidden", true);
    $('#fechatipoganglionar').prop("hidden", true);
    $('#fechatipoganglio').val('');
    $('#fechatipomastecto').val('');


})
/*termina mastectomia ganglionar*/
/*tipo reconstruccion*/
$(document).ready(function() {

    $('#reconstruccionsino').change(function(e) {
        if ($(this).val() === "Si") {

            $('#tiporeconstruccion').prop("hidden", false);
            $('#reconstrucciontipofecha').prop("hidden", false);
            $('#reconstrucciontipo').prop("selectedIndex", 0);
        } else {
            $('#tiporeconstruccion').prop("hidden", true);
            $('#reconstrucciontipofecha').prop("hidden", true);
            $('#reconstrucciontipo').prop("selectedIndex", 0);
            $('#fechatiporeconstruccion').val('');
        
        }
    
    })
});

$(function() {
    $('#tiporeconstruccion').prop("hidden", true);
    $('#reconstrucciontipofecha').prop("hidden", true);
    $('#reconstrucciontipo').prop("selectedIndex", 0);
    $('#fechatiporeconstruccion').val('');


})
/*termina tipo reconstruccion*/

/*inicia aplicacion quimioterapia*/
$(document).ready(function() {

    $('#aplicoquimio').change(function(e) {
        if ($(this).val() === "Si") {

            $('#fechainicioquimio').prop("hidden", false);
            $('#atracicilassi').prop("hidden", false);
            $('#quimiomomento').prop("hidden", false);
        } else {
            $('#fechainicioquimio').prop("hidden", true);
            $('#atracicilassi').prop("hidden", true);
            $('#quimiomomento').prop("hidden", true);
            $('#fechadeinicioquimio').val('');
            $('#antraciclinas').prop("selectedIndex", 0);
            $('#momentoquimio').prop("selectedIndex", 0);
            $("input[type=radio][name=her]").prop('checked', false);
            $("input[type=radio][name=triplenegativo]").prop('checked', false);
            $("input[type=radio][name=hormonosensibles]").prop('checked', false);
            $('#fechaeventoadverso').val('');
            $('#quimioesquema').prop("selectedIndex", 0);
            $("input[type=radio][name=completoquimio]").prop('checked', false);
            $('#esquemaquimio').prop("hidden", true);
            $('#eventoadverso').prop("hidden", true);
        
        }
    
    })
});

$(function() {
    $('#fechainicioquimio').prop("hidden", true);
    $('#atracicilassi').prop("hidden", true);
    $('#quimiomomento').prop("hidden", true);
    $('#fechainicioquimio').prop("selectedIndex", 0);
    $('#atracicilassi').prop("selectedIndex", 0);
    $('#quimiomomento').prop("selectedIndex", 0);


})
/*finaliza quimio*/

/*incia onco her*/
function aplicoher(){
        if ($("#her1").val() === "si") {

            $('#esquemaher').prop("hidden", false);
        
        }
    
    }
    function aplicoherno(){
        if ($("#her2").val() === "noaplico") {

            $('#esquemaher').prop("hidden", true);
            $('#esquemaherdos').prop("selectedIndex", 0);
        }
    
    }

$(function() {
        $('#esquemaher').prop("hidden", true);
        $('#esquemaherdos').prop("selectedIndex", 0);


})
/*finaliza onco her*/

/*incia triple si*/
function triplesi(){
    if ($("#triplenegativo1").val() === "si") {

        $('#tripleesquema').prop("hidden", false);
        
    }

}
function tripleno(){
    if ($("#triplenegativo2").val() === "no") {

        $('#tripleesquema').prop("hidden", true);
        $('#esquematriple').prop("selectedIndex", 0);
    }

}

$(function() {
    $('#tripleesquema').prop("hidden", true);
    $('#esquematriple').prop("selectedIndex", 0);


})
/*finaliza triples si*/

/*inicia hormonosensibles*/
function hormonosi(){
    if ($("#hormonosensibles1").val() === "si") {

        $('#hormonoesquema').prop("hidden", false);
        
    }

}
function hormonono(){
    if ($("#hormonosensibles2").val() === "no") {

        $('#hormonoesquema').prop("hidden", true);
        $('#esquemahormonosensible').prop("selectedIndex", 0);
    }

}

$(function() {
    $('#hormonoesquema').prop("hidden", true);
    $('#esquemahormonosensible').prop("selectedIndex", 0);


})
/*finaliza hormonosensibles*/

/*inicia quimio completa si/no*/
function quimiocompletosi(){
    if ($("#completoquimio1").val() === "si") {

        $('#esquemaquimio').prop("hidden", true);
        $('#eventoadverso').prop("hidden", true);
        $('#eventoprogresivo').prop("hidden", true);
        $('#eventorecurrencia').prop("hidden", true);
        $('#eventodefuncion').prop("hidden", true);
        $('#causaonco').prop("hidden", true);
        $('#especausa').prop("hidden", true);
        $('#quimioesquema').prop("selectedIndex", 0);
        $('#otracausa').prop("selectedIndex", 0);
    
    }

}
function quimiocompletono(){
    if ($("#completoquimio2").val() === "no") {

        $('#esquemaquimio').prop("hidden", false);
        
        
    }

}

$(function() {
    $('#esquemaquimio').prop("hidden", true);
    $('#eventoadverso').prop("hidden", true);
    $('#eventoprogresivo').prop("hidden", true);
    $('#eventorecurrencia').prop("hidden", true);
    $('#eventodefuncion').prop("hidden", true);
    $('#causaonco').prop("hidden", true);
    $('#especausa').prop("hidden", true);
    $('#otracausa').prop("selectedIndex", 0);
    $('#quimioesquema').prop("selectedIndex", 0);


})

$(document).ready(function() {

    $('#quimioesquema').change(function(e) {
        if ($(this).val() === "EVENTO ADVERSO") {

            $('#eventoadverso').prop("hidden", false);

        } else {
            $('#eventoadverso').prop("hidden", true);
            $('#fechaeventoadverso').val('');
        
        }
        if ($(this).val() === "PROGRESION DE LA ENFERMEDAD") {

            $('#eventoprogresivo').prop("hidden", false);

        } else {
            $('#eventoprogresivo').prop("hidden", true);
            $('#fechaprogresion').val();
        
        }
        if ($(this).val() === "RECURRENCIA DE LA ENFERMEDAD") {

            $('#eventorecurrencia').prop("hidden", false);

        } else {
            $('#eventorecurrencia').prop("hidden", true);
            $('#fecharecurrencia').val();
        
        }
        if ($(this).val() === "ABANDONO DEL PACIENTE") {
            $('#eventoadverso').prop("hidden", true);
            $('#eventorecurrencia').prop("hidden", true);
            $('#eventoprogresivo').prop("hidden", true);
        } else {
            $('#fechaeventoadverso').prop("selectedIndex", 0);
            $('#fechaprogresion').val('');
            $('#fecharecurrencia').val('');
        
        }
        if ($(this).val() === "FALLECIO") {

            $('#eventodefuncion').prop("hidden", false);
            $('#causaonco').prop("hidden", false);
            $('#especausa').prop("hidden", false);

        } else {
            $('#eventodefuncion').prop("hidden", true);
            $('#causaonco').prop("hidden", true);
            $('#especausa').prop("hidden", true);
            $('#fechadefuncion').val('');
            $('#otracausa').val('');
        
        }
    
    })
});


/*finiliza quimio completa*/

/*incia radio terapia*/
$(document).ready(function(){
    $("#radioterapia").change(function(e) {
    if ($(this).val() === "Si") {

        $('#seaplicoradio').prop("hidden", false);
        $('#fechadelaradio').prop("hidden", false);
        $('#sesionescantidad').prop("hidden", false);
    
    }else{
        $('#seaplicoradio').prop("hidden", true);
        $('#fechadelaradio').prop("hidden", true);
        $('#sesionescantidad').prop("hidden", true);
        $('#aplicoradioterapia').prop("selectedIndex", 0);
    }

    })
});

$(function() {
    $('#seaplicoradio').prop("hidden", true);
    $('#fechadelaradio').prop("hidden", true);
    $('#sesionescantidad').prop("hidden", true);
    $('#aplicoradioterapia').prop("selectedIndex", 0);


})
/*finaliza radio*/
/*inicia braquiterapia*/
$(document).ready(function(){
    $("#braquiterapia").change(function(e) {
    if ($(this).val() === "Si") {

        $('#fechadebraquiterapia').prop("disabled", false);

    
    }else{
        $('#fechadebraquiterapia').prop("disabled", true);
    }

    })
});

$(function() {
    $('#fechadebraquiterapia').prop("disabled", true);


})
/*finaliza braquiterapia*/

/*inicia pdl*/
function aplicopdlsi(){
    if ($("#pdlrealizo1").val() === "si") {

        $('#pdl').prop("disabled", false);
        
    }

}
function aplicopdlno(){
    if ($("#pdlrealizo2").val() === "no") {

        $('#pdl').prop("disabled", true);
        
    }

}

$(function() {
    $('#pdl').prop("disabled", true);


})

/*finaliza pdl*/
/*lactancia*/
$(document).ready(function(){
    $("#lactancia").change(function(e) {
    if ($(this).val() === "No") {

        $('#tiempolactancia').prop("disabled", true);

    
    }else{
        $('#tiempolactancia').prop("disabled", false);
    }

    })
});

$(function() {
    $('#tiempolactancia').prop("disabled", true);


})
/*finaliza lactancia*/
/*cuidados paliativos*/
$(document).ready(function() {

    $('#cuidadospaliativos').change(function(e) {
        if ($(this).val() === "Si") {

            $('#paliativaclinica').prop("hidden", false);
        } else {
            $('#paliativaclinica').prop("hidden", true);
        
        }
    
    })
});

$(function() {
    $('#paliativaclinica').prop("hidden", true);


})