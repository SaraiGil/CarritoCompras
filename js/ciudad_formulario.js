$( document ).ready( function() {

	// Evento para cancelar edición y regresar a tabla
	$( "#btn-cancelar" ).click( function() {
		$( location ).attr( "href", "ciudad.php" );
	});

	// Validación de formulario
	$( "#form-ciudad" ).submit( function( evento ) {
		//evento.preventDefault();	// Elimina comportamiento

		$( ".form-group" ).removeClass( "has-error" );
		$( "#mensaje-validacion" ).html( "" );

		var patron = /^[ñíóáa-zA-Z\s]*$/;
		var patroncveCiu = /^[cd]+[\_]+[0-9]*$/;
		var patroncveEdo = /^[e]+[\_]+[0-9]*$/;

		if ( $( "#Cve_ciu" ).val() == "" ) {
			muestra_error( "Cve_ciu", "danger",
				"La clave de la ciudad no debe ir vacía" );
			return false;
		}else if ( $( "#Nom_ciu" ).val() == "" ) {
			muestra_error( "Nom_ciu", "danger",
				"El nombre de la ciudad no debe ir vacía" );
			return false;
		} else if ( $( "#Cve_edo" ).val() == 0 ) {
			muestra_error( "Cve_edo", "danger",
				"Debes seleccionar un estado" );
			return false;
		} else if ( ($("#Nom_ciu").val()).search(patron) ) {
			muestra_error( "Nom_ciu", "danger",
				"El nombre de la ciudad debe contener solo letras" );
			return false;
		} else if ( ($("#Cve_ciu").val()).search(patroncveCiu) ) {
			muestra_error( "Cve_ciu", "danger",
				"La clave de la ciudad debe seguir el formato cd_xx" );
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