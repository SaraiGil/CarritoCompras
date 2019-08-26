$( document ).ready( function() {

	$( ".btn-borrar" ).click( function() {
		$( "#modal-Nom_usu" ).html(
			$( this ).attr( "data-Nom_usu" )
			);
		$( "#btn-borrar-confirmar" ).attr( "data-Nom_usu",
			$( this ).attr( "data-Nom_usu" )
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
			"usuario_procesa.php?accion=baja&Nom_usu="
			+ $( this ).attr( "data-Nom_usu" )
			+ "&u="
			+ $( this ).attr( "data-u" )
			+ "&s="
			+ $( this ).attr( "data-s" )
		 );
	});

});