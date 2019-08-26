$( document ).ready( function() {

	$( ".btn-borrar" ).click( function() {
		$( "#modal-No_com" ).html(
			$( this ).attr( "data-No_com" )
			);
		$( "#btn-borrar-confirmar" ).attr( "data-No_com",
			$( this ).attr( "data-No_com" )
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
			"compra_procesa.php?accion=baja&No_com="
			+ $( this ).attr( "data-No_com" )
			+ "&u="
			+ $( this ).attr( "data-u" )
			+ "&s="
			+ $( this ).attr( "data-s" )
		 );
	});

});