$( document ).ready( function() {

	$( ".btn-borrar" ).click( function() {
		$( "#modal-Cantidad_cominv" ).html(
			$( this ).attr( "data-Cantidad_cominv" )
			);
		$( "#btn-borrar-confirmar" ).attr( "data-No_inv",
			$( this ).attr( "data-No_inv" )
			);
	});

	$( "#btn-borrar-confirmar" ).click( function() {
		$( location ).attr( "href",
			"cominv_procesa.php?accion=baja&Cve_prod="
			+ $( this ).attr( "data-No_inv" )
		 );
	});

});