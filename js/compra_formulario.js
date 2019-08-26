$( document ).ready( function() {

	// Evento para cancelar edición y regresar a tabla
	$( "#btn-cancelar" ).click( function() {
		$( location ).attr( "href", "compra.php" );
	});

	// Validación de formulario
	$( "#form-producto" ).submit( function( evento ) {
		//evento.preventDefault();	// Elimina comportamiento

		$( ".form-group" ).removeClass( "has-error" );
		$( "#mensaje-validacion" ).html( "" );

		var patron = /^[ñíóáa-zA-Z\s]*$/;
		var patronNocom = /^[c]+[\_]+[0-9]*$/;
		var patronFec = /^[0-9]+[-]+[0-9]+[-]+[0-9]*$/;

		/*if ( $( "#No_com" ).val() == "" ) {
			muestra_error( "No_com", "danger",
				"El numero de compra no debe ir vacía" );
			return false;
		}else if ( $( "#Stat_com" ).val() == "" ) {
			muestra_error( "Stat_com", "danger",
				"EL status de la compra no debe ir vacía" );
			return false;
		} else if ( $( "#Fec_com" ).val() == "" ) {
			muestra_error( "Fec_com", "danger",
				"La fecha de la compra no debe ir vacía" );
			return false;
		} else if ( $( "#Cve_prov" ).val() == 0 ) {
			muestra_error( "Cve_prov", "danger",
				"Debes seleccionar al proveedor" );
			return false;
		} else if ( isNaN( $("#Fec_com").val() ) ) {
			muestra_error( "Fec_com", "danger",
				"La fecha debe contener solo números" );
			return false;
		} else if ( ($("#Stat_com").val()).search(patron) ) {
			muestra_error( "Stat_com", "danger",
				"El status debe contener solo letras" );
			return false;
		} else if ( ($("#No_com").val()).search(patronNocom) ) {
			muestra_error( "No_com", "danger",
				"El numero de la compra debe seguir el formato cxxxx" );
			return false;
		} else if ( ($("#Fec_com").val()).search(patronFec) ) {
			muestra_error( "Fec_com", "danger",
				"La fecha de la compra debe seguir el formato AAAA-MM-DD" );
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