$( document ).ready( function() {

	$( ".btn-borrar" ).click( function() {
		$( "#modal-No_ven" ).html(
			$( this ).attr( "data-No_ven" )
			);
		$( "#btn-borrar-confirmar" ).attr( "data-No_ven",
			$( this ).attr( "data-No_ven" )
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
			"venta_procesa.php?accion=baja&No_ven="
			+ $( this ).attr( "data-No_ven" )
			+ "&u="
			+ $( this ).attr( "data-u" )
			+ "&s="
			+ $( this ).attr( "data-s" )
		 );
	});

});