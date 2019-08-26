
$( document ).ready( function() {

	// Evento para cancelar edición y regresar a tabla
	$( "#btn-cancelar" ).click( function() {
		$( location ).attr( "href", "factura.php" );
	});

	// Validación de formulario
	$( "#form-factura" ).submit( function( evento ) {
		//evento.preventDefault();	// Elimina comportamiento

		$( ".form-group" ).removeClass( "has-error" );
		$( "#mensaje-validacion" ).html( "" );

		var patron = /^[ñíóáéúa-zA-Z\s]*$/;
		var patroncve = /^[f]+[0-9]*$/;
		var patronFec = /^[0-9]*$/;

		if ( $( "#Fol_fac" ).val() == "" ) {
			muestra_error( "Fol_fac", "danger",
				"El folio no debe ir vacío" );
			return false;
		}else if ( $( "#Fec_fac" ).val() == "" ) {
			muestra_error( "Fec_fac", "danger",
				"La fecha no debe ir vacía" );
			return false;
		} else if ( $( "#No_ven" ).val() == "0" ) {
			muestra_error( "Costo_prod", "danger",
				"Debe seleccionar un número de venta" );
			return false;
			/*
		} else if ( ($("#Fec_fac").val()).search(patronFec) ) {
			muestra_error( "Fec_fac", "danger",
				"La fecha debe contener solo números" );
			return false;
		}else if ( ($("#Fec_fac").val()).length !=8 ) {
			muestra_error( "Fec_env", "danger",
				"La fecha debe contener 8 dígitos (aaaa-mm-dd)" );
			return false;
			*/
		}

		return true;
	});

});

function muestra_error( id, tipo, mensaje ) {
	$( "#group-" + id ).addClass( "has-error" );
	$( "#mensaje-validacion" ).html( '<div class="alert alert-' + tipo +' alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>ERROR:</strong> ' + mensaje + '</div>' );
	$( "#" + id ).focus();
}