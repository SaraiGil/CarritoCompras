$( document ).ready( function() {

	// Validación de formulario
	$( "#form-login" ).submit( function( evento ) {
		//evento.preventDefault();	// Elimina comportamiento

		$( ".form-group" ).removeClass( "has-error" );
		$( "#mensaje-validacion" ).html( "" );

		if ( $( "#u" ).val() == "" ) {
			muestra_error( "u", "danger",
				"El usuario no debe ir vacío" );
			return false;
		} else if ( $( "#p" ).val() == "" ) {
			muestra_error( "p", "danger",
				"La contraseña no debe ir vacía" );
			return false;
		}
		/* 	Se agregan tantos IF como condiciones de 
			validación sean necesarias */

		return true;
	});

});

function muestra_error( id, tipo, mensaje ) {
	$( "#group-" + id ).addClass( "has-error" );
	$( "#mensaje-validacion" ).html( '<div class="alert alert-' + tipo +' alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>ERROR:</strong> ' + mensaje + '</div>' );
	$( "#" + id ).focus();
}