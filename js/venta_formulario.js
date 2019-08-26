
$( document ).ready( function() {

	// Evento para cancelar edición y regresar a tabla
	$( "#btn-cancelar" ).click( function() {
		$( location ).attr( "href", "venta.php" );
	});

	// Validación de formulario
	$( "#form-venta" ).submit( function( evento ) {
		//evento.preventDefault();	// Elimina comportamiento

		$( ".form-group" ).removeClass( "has-error" );
		$( "#mensaje-validacion" ).html( "" );

		var patron = /^[ñíóáéúa-zA-Z\s]*$/;
		var patroncve = /^[c]+[\_]+[a-z]*$/;
		var patronFec = /^[0-9]*$/;

		if ( $( "#No_ven" ).val() == "" ) {
			muestra_error( "No_ven", "danger",
				"El número de venta no debe ir vacío" );
			return false;
		}else if ( $( "#Stat_ven" ).val() == "" ) {
			muestra_error( "Stat_ven", "danger",
				"El estatus no debe ir vacío" );
			return false;
		} else if ( $( "#Fec_ven" ).val() == "" ) {
			muestra_error( "Fec_ven", "danger",
				"La fecha no debe ir vacía" );
			return false;
		} else if ( $( "#Cve_clie" ).val() == "" ) {
			muestra_error( "Cve_clie", "danger",
				"La clave del cliente no debe ir vacía" );
			return false;
		} else if ( $( "#total_ven" ).val() == "" ) {
			muestra_error( "total_ven", "danger",
				"El total no debe ir vacío" );
			return false;
		} else if ( ($("#Stat_ven").val()).search(patron) ) {
			muestra_error( "Stat_ven", "danger",
				"El estatus debe contener solo letras" );
			return false;
			/*
		} else if ( ($("#Fec_ven").val()).search(patronFec) ) {
			muestra_error( "Fec_ven", "danger",
				"La fecha contener solo números" );
			return false;
		}else if ( ($("#Fec_ven").val()).length !=8 ) {
			muestra_error( "Fec_ven", "danger",
				"La fecha debe contener 8 dígitos (aaaa-mm-dd)" );
			return false;
			*/
		} else if ( $( "#Cve_clie" ).val() == 0 ) {
			muestra_error( "Cve_clie", "danger",
				"Debes seleccionar un cliente" );
			return false;
		} else if ( isNaN( $("#total_ven").val() ) ) {
			muestra_error( "total_ven", "danger",
				"El total debe contener solo números" );
			return false;
		}
		

		return true;
	});

});

function muestra_error( id, tipo, mensaje ) {
	$( "#group-" + id ).addClass( "has-error" );
	$( "#mensaje-validacion" ).html( '<div class="alert alert-' + tipo +' alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>ERROR:</strong> ' + mensaje + '</div>' );
	$( "#" + id ).focus();
}