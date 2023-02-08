$(document).ready(function(){
    $("#cbx_estado").change(function () {

        $('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
        
        $("#cbx_estado option:selected").each(function () {
            id_estado = $(this).val();
            $.post("includes/getMunicipio.php", { id_estado: id_estado }, function(data){
                $("#cbx_municipio").html(data);
            });            
        });
    })
});
$(document).ready(function () {
    $("#cbx_estadoedit").change(function () {

        $('#cbx_localidadedit').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

        $("#cbx_estadoedit option:selected").each(function () {
            id_estado = $(this).val();
            $.post("includes/getMunicipio.php", { id_estado: id_estado }, function (data) {
                $("#cbx_municipioedit").html(data);
            });
        });
    })
});

