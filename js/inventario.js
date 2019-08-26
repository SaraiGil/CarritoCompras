$( document ).ready( function() {

	$( ".btn-borrar" ).click( function() {
		$( "#modal-No_inv" ).html(
			$( this ).attr( "data-No_inv" )
			);
		$( "#btn-borrar-confirmar" ).attr( "data-No_inv",
			$( this ).attr( "data-No_inv" )
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
			"inventario_procesa.php?accion=baja&No_inv="
			+ $( this ).attr( "data-No_inv" )
			+ "&u="
			+ $( this ).attr( "data-u" )
			+ "&s="
			+ $( this ).attr( "data-s" )
		 );
	});

});