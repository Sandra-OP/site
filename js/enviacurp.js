var idcurp = $("#idcurp").val();
$(function(){
	$(".mandaid").click(function(e){
  	e.preventDefault();
    var id = $(this).attr('id');
    $(".curp").html(id);
    $("#seguimiento").modal('show');
   
  })
  
})