var idcurp = $("#idcurp").val();
$(function(){
	$(".mandacurp").click(function(e){
  	e.preventDefault();
    var id = $(this).attr('id');
    $(".curps").html(id);
    $("#datousuario").modal('show');
   
  })
  
})