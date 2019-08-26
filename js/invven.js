$( document ).ready( function() {

	$( ".btn-borrar" ).click( function() {
		$( "#modal-Desc_prod" ).html(
			$( this ).attr( "data-Desc_prod" )
			);
		$( "#btn-borrar-confirmar" ).attr( "data-Cve_prod",
			$( this ).attr( "data-Cve_prod" )
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
			"catalogo_procesa.php?accion=baja&Cve_prod="
			+ $( this ).attr( "data-Cve_prod" )
			+ "&u="
			+ $( this ).attr( "data-u" )
			+ "&s="
			+ $( this ).attr( "data-s" )
		 );
	});

});