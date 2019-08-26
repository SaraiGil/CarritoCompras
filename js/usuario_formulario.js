
$( document ).ready( function() {

	// Evento para cancelar edición y regresar a tabla
	$( "#btn-cancelar" ).click( function() {
		$( location ).attr( "href", "usuario.php" );
	});

	// Validación de formulario
	$( "#form-usuario" ).submit( function( evento ) {
		//evento.preventDefault();	// Elimina comportamiento

		$( ".form-group" ).removeClass( "has-error" );
		$( "#mensaje-validacion" ).html( "" );

		var patron = /^[ñíóáéúa-zA-Z\s]*$/;
		var patroncve = /^[p]+[\_]+[0-9]*$/;

		if ( $( "#Nom_usu" ).val() == "" ) {
			muestra_error( "Nom_usu", "danger",
				"El nombre de usuario no debe ir vacío" );
			return false;
		}else if ( $( "#Tipo_usu" ).val() == "0" ) {
			muestra_error( "Tipo_usu", "danger",
				"Se debe seleccionar un tipo de usuario" );
			return false;
		} else if ( $( "#Pass_usu" ).val() == "" ) {
			muestra_error( "Pass_usu", "danger",
				"El password no debe ir vacío" );
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