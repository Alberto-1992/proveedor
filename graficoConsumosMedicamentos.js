function graficosConsumosMedicamentos(){
$.ajax({
		url : 'consultaConsumosCovid.php',
		dataType : 'html',
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})

}


