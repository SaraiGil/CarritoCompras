$( document ).ready( function() {

	$( ".btn-borrar" ).click( function() {
		$( "#modal-Nom_clie" ).html(
			$( this ).attr( "data-Nom_clie" )
			);
		$( "#btn-borrar-confirmar" ).attr( "data-Cve_clie",
			$( this ).attr( "data-Cve_clie" )
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
			"cliente_procesa.php?accion=baja&Cve_clie="
			+ $( this ).attr( "data-Cve_clie" )
			+ "&u="
			+ $( this ).attr( "data-u" )
			+ "&s="
			+ $( this ).attr( "data-s" )
		 );
	});

});