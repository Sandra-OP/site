$(document).ready(function () {

    $('#progresionenfermedad').change(function (e) {
        if ($(this).val() === "Si") {

            $('#dxprogresion').prop("hidden", false);
        } else {
            $('#dxprogresion').prop("hidden", true);
            $('#fechadxprogresion').val('');

        }

    })
});

$(document).ready(function () {

    $('#recurrencianenfermedad').change(function (e) {
        if ($(this).val() === "Si") {

            $('#recurrenciadate').prop("hidden", false);
        } else {
            $('#recurrenciadate').prop("hidden", true);
            $('#fecharecurrencia').val('');

        }

    })
});
$(document).ready(function () {

    $('#ameritareintervencion').change(function (e) {
        if ($(this).val() === "Si") {

            $('#datereintervencion').prop("hidden", false);
            $('#lateralidadqt').prop("hidden", false);
        } else {
            $('#datereintervencion').prop("hidden", true);
            $('#lateralidadqt').prop("hidden", true);
            $('#fechareintenvencion').val('');
            $('#lateralidadreintervencion').prop("selectedIndex", 0);

        }

    })
});
$(document).ready(function () {

    $('#ameritanuevaqt').change(function (e) {
        if ($(this).val() === "Si") {

            $('#tipodelaqt').prop("hidden", false);
            $('#tratamientodelaqt').prop("hidden", false);
            $('#fechadelanuevaqt').prop("hidden", false);
        } else {
            $('#tipodelaqt').prop("hidden", true);
            $('#tratamientodelaqt').prop("hidden", true);
            $('#fechadelanuevaqt').prop("hidden", true);
            $('#fechanuevaqt').val('');
            $('#tipoqt').prop("selectedIndex", 0);
            $('#tratameintoqt').prop("selectedIndex", 0);

        }

    })
});
$(document).ready(function () {

    $('#ameritaradioterapia').change(function (e) {
        if ($(this).val() === "Si") {

            $('#aplicoradio').prop("hidden", false);
            $('#fecharadio').prop("hidden", false);
            $('#sesionescanti').prop("hidden", false);
        } else {
            $('#aplicoradio').prop("hidden", true);
            $('#fecharadio').prop("hidden", true);
            $('#sesionescanti').prop("hidden", true);
            $('#aplicoderadioterapia').prop("selectedIndex", 0);
            $('#fechadeinicioradio').val('');
            $('#numerodesesiones').val('');


        }

    })
});
$(document).ready(function () {

    $('#ameritabraquiterapia').change(function (e) {
        if ($(this).val() === "Si") {

            $('#fechadelabraqui').prop("hidden", false);
        } else {
            $('#fechadelabraqui').prop("hidden", true);
            $('#fechabraquiterapia').val('');


        }

    })
});
$(function () {
    $('#dxprogresion').prop("hidden", true);
    $('#fechadxprogresion').val('');
    $('#recurrenciadate').prop("hidden", true);
    $('#fecharecurrencia').val('');
    $('#datereintervencion').prop("hidden", true);
    $('#fechareintenvencion').val('');
    $('#lateralidadqt').prop("hidden", true);
    $('#lateralidadreintervencion').prop("selectedIndex", 0);
    $('#fechadelanuevaqt').prop("hidden", true);
    $('#fechanuevaqt').val('');
    $('#tipodelaqt').prop("hidden", true);
    $('#tratamientodelaqt').prop("hidden", true);
    $('#tipoqt').prop("selectedIndex", 0);
    $('#tratameintoqt').prop("selectedIndex", 0);
    $('#aplicoradio').prop("hidden", true);
    $('#fecharadio').prop("hidden", true);
    $('#sesionescanti').prop("hidden", true);
    $('#fechadelabraqui').prop("hidden", true);
    $('#fechabraquiterapia').val('');
    $('#aplicoderadioterapia').prop("selectedIndex", 0);
    $('#fechadeinicioradio').val('');
    $('#numerodesesiones').val('');


})