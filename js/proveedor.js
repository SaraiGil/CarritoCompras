$( document ).ready( function() {

	$( ".btn-borrar" ).click( function() {
		$( "#modal-Nom_prov" ).html(
			$( this ).attr( "data-Nom_prov" )
			);
		$( "#btn-borrar-confirmar" ).attr( "data-Cve_prov",
			$( this ).attr( "data-Cve_prov" )
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
			"proveedor_procesa.php?accion=baja&Cve_prov="
			+ $( this ).attr( "data-Cve_prov" )
			+ "&u="
			+ $( this ).attr( "data-u" )
			+ "&s="
			+ $( this ).attr( "data-s" )
		 );
	});

});