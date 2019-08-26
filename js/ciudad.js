$( document ).ready( function() {

	$( ".btn-borrar" ).click( function() {
		$( "#modal-Cve_ciu" ).html(
			$( this ).attr( "data-Cve_ciu" )
			);
		$( "#btn-borrar-confirmar" ).attr( "data-Nom_ciu",
			$( this ).attr( "data-Nom_ciu" )
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
			"ciudad_procesa.php?accion=baja&Cve_ciu="
			+ $( this ).attr( "data-Cve_ciu" )
			+ "&u="
			+ $( this ).attr( "data-u" )
			+ "&s="
			+ $( this ).attr( "data-s" )
		 );
	});

});