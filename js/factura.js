$( document ).ready( function() {

	$( ".btn-borrar" ).click( function() {
		$( "#modal-Fol_fac" ).html(
			$( this ).attr( "data-Fol_fac" )
			);
		$( "#btn-borrar-confirmar" ).attr( "data-Fol_fac",
			$( this ).attr( "data-Fol_fac" )
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
			"factura_procesa.php?accion=baja&Fol_fac="
			+ $( this ).attr( "data-Fol_fac" )
			+ "&u="
			+ $( this ).attr( "data-u" )
			+ "&s="
			+ $( this ).attr( "data-s" )
		 );
	});

});