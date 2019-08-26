$( document ).ready( function() {

	$( ".btn-borrar" ).click( function() {
		$( "#modal-No_env" ).html(
			$( this ).attr( "data-No_env" )
			);
		$( "#btn-borrar-confirmar" ).attr( "data-No_env",
			$( this ).attr( "data-No_env" )
			);
		$( "#btn-borrar-confirmar" ).attr( "data-u",
			$( this ).attr( "data-u" )
			);
		$( "#btn-borrar-confirmar" ).attr( "data-s",
			$( this ).attr( "data-s" )
			);
	});

	$( "#btn-borrar-confirmar" ).click( function() {
		$( location ).attr( "href",
			"envio_procesa.php?accion=baja&No_env="
			+ $( this ).attr( "data-No_env" )
			+ "&u="
			+ $( this ).attr( "data-u" )
			+ "&s="
			+ $( this ).attr( "data-s" )
		 );
	});

});