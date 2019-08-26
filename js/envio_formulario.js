
$( document ).ready( function() {

	// Evento para cancelar edición y regresar a tabla
	$( "#btn-cancelar" ).click( function() {
		$( location ).attr( "href", "envio.php" );
	});

	// Validación de formulario
	$( "#form-envio" ).submit( function( evento ) {
		//evento.preventDefault();	// Elimina comportamiento

		$( ".form-group" ).removeClass( "has-error" );
		$( "#mensaje-validacion" ).html( "" );

		var patron = /^[ñíóáéúa-zA-Z\s]*$/;
		var patroncve = /^[p]+[\_]+[0-9]*$/;
		var patronFec = /^[0-9]*$/;

		if ( $( "#No_env" ).val() == "" ) {
			muestra_error( "No_env", "danger",
				"El número de envío no debe ir vacío" );
			return false;
		}else if ( $( "#Cos_env" ).val() == "" ) {
			muestra_error( "Cos_env", "danger",
				"El costo de envío no debe ir vacío" );
			return false;
		} else if ( $( "#Stat_env" ).val() == "" ) {
			muestra_error( "Stat_env", "danger",
				"El estatus de envío no debe ir vacío" );
			return false;
		} else if ( $( "#Obser_env" ).val() == "" ) {
			muestra_error( "Obser_env", "danger",
				"Las observaciones no deben ir vacías" );
			return false;
		} else if ( $( "#Fec_env" ).val() == "" ) {
			muestra_error( "Fec_env", "danger",
			"La fecha de envío no debe ir vacía" );
			return false;
		} else if ( $( "#Fest_env" ).val() == "" ) {
			muestra_error( "Fest_env", "danger",
			"La fecha estimada de envío no debe ir vacía" );
			return false;
		} else if ( $( "#Fecped_env" ).val() == "" ) {
			muestra_error( "Fecped_env", "danger",
			"La fecha del pedido no debe ir vacía" );
			return false;
		} else if ( $( "#Calle_env" ).val() == "" ) {
			muestra_error( "Calle_env", "danger",
			"La calle no debe ir vacía" );
			return false;
		} else if ( $( "#Col_env" ).val() == "" ) {
			muestra_error( "Col_env", "danger",
			"La colonia no debe ir vacía" );
			return false;
		} else if ( $( "#Cp_env" ).val() == "" ) {
			muestra_error( "Cp_env", "danger",
			"El código postal no debe ir vacío" );
			return false;
		} else if ( $( "#Noc_env" ).val() == "" ) {
			muestra_error( "Noc_env", "danger",
			"El número de calle no debe ir vacío" );
			return false;
		} else if ( $( "#Cve_ciu" ).val() == 0 ) {
			muestra_error( "Cve_ciu", "danger",
				"Debes seleccionar una ciudad" );
			return false;
		} else if ( $( "#No_ven" ).val() == 0  ) {
			muestra_error( "No_ven", "danger",
			"Debe seleccionar un número de venta" );
			return false;
		} else if ( isNaN( $("#Cos_env").val() ) ) {
			muestra_error( "Cos_env", "danger",
				"El costo debe contener solo números" );
			return false;
		} else if ( ($("#Stat_env").val()).search(patron) ) {
			muestra_error( "Stat_env", "danger",
				"El estatus debe contener solo letras" );
			return false;
		} else if ( ($("#Obser_env").val()).search(patron) ) {
			muestra_error( "Obser_env", "danger",
				"Las observaciones deben contener solo letras" );
			return false;
		} else if ( ($("#Calle_env").val()).search(patron) ) {
			muestra_error( "Calle_env", "danger",
				"La calle debe contener solo letras" );
			return false;
		} else if ( ($("#Col_env").val()).search(patron) ) {
			muestra_error( "Col_env", "danger",
				"La colonia debe contener solo letras" );
			return false;
		} else if ( ($("#Cp_env").val()).search(patronFec) ) {
			muestra_error( "Cp_env", "danger",
				"El código postal de pedido contener solo números" );
			return false;
		}else if ( ($("#Cp_env").val()).length !=5 ) {
			muestra_error( "Cp_env", "danger",
				"El código postal debe contener 5 dígitos" );
			return false;
		} else if ( isNaN( $("#Noc_env").val() ) ) {
			muestra_error( "Noc_env", "danger",
				"El número de calle contener solo números" );
			return false;
			/*
		} else if ( ($("#Fec_env").val()).search(patronFec) ) {
			muestra_error( "Fec_env", "danger",
				"La fecha de envío debe contener solo números" );
			return false;
		}else if ( ($("#Fec_env").val()).length !=8 ) {
			muestra_error( "Fec_env", "danger",
				"La fecha debe contener 8 dígitos (aaaa-mm-dd)" );
			return false;

		} else if ( ($("#Fest_env").val()).search(patronFec) ) {
			muestra_error( "Fest_env", "danger",
				"La fecha estimada de envío debe contener solo números" );
			return false;
		}else if ( ($("#Fest_env").val()).length !=8 ) {
			muestra_error( "Fest_env", "danger",
				"La fecha estimada de envío debe contener 8 dígitos (aaaa-mm-dd)" );
			return false;
		} else if ( ($("#Fecped_env").val()).search(patronFec) ) {
			muestra_error( "Fecped_env", "danger",
				"La fecha de pedido contener solo números" );
			return false;
		}else if ( ($("#Fec_ped").val()).length !=8 ) {
			muestra_error( "Fec_ped", "danger",
				"La fecha de pedido debe contener 8 dígitos (aaaa-mm-dd)" );
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