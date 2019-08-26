
$( document ).ready( function() {

	// Evento para cancelar edición y regresar a tabla
	$( "#btn-cancelar" ).click( function() {
		$( location ).attr( "href", "cliente.php" );
	});

	// Validación de formulario
	$( "#form-cliente" ).submit( function( evento ) {
		//evento.preventDefault();	// Elimina comportamiento

		$( ".form-group" ).removeClass( "has-error" );
		$( "#mensaje-validacion" ).html( "" );

		var patron = /^[ñíóáéúa-zA-Z\s]*$/;
		var patroncve = /^[c]+[\_]+[a-z]*$/;
		var patronEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var patronTel = /^[0-9\(\)]*$/;


		if ( $( "#Cve_clie" ).val() == "" ) {
			muestra_error( "Cve_clie", "danger",
				"La clave del cliente no debe ir vacía" );
			return false;
		}else if ( $( "#Nom_clie" ).val() == "" ) {
			muestra_error( "Nom_clie", "danger",
				"El nombre de producto no puede ir vacío" );
			return false;
		} else if ( $( "#App_clie" ).val() == "" ) {
			muestra_error( "App_clie", "danger",
				"El apellido paterno no debe ir vacío" );
			return false;
		} else if ( $( "#Apm_clie" ).val() == "" ) {
			muestra_error( "Apm_clie", "danger",
				"El apellido materno no debe ir vacío" );
			return false;
		} else if ( $( "#Rfc_clie" ).val() == "" ) {
			muestra_error( "Rfc_clie", "danger",
				"El RFC no debe ir vacío" );
			return false;
		} else if ( $( "#Email_clie" ).val() == "" ) {
			muestra_error( "Email_clie", "danger",
			"El correo electrónico no debe ir vacío" );
			return false;
		} else if ( $( "#Tel_clie" ).val() == "" ) {
			muestra_error( "Tel_clie", "danger",
			"El teléfono no debe ir vacío" );
			return false;
		} else if ( $( "#Calle_clie" ).val() == "" ) {
			muestra_error( "Calle_clie", "danger",
			"La calle no debe ir vacía" );
			return false;
		} else if ( $( "#Col_clie" ).val() == "" ) {
			muestra_error( "Col_clie", "danger",
			"La colonia no debe ir vacía" );
			return false;
		} else if ( $( "#Cp_clie" ).val() == "" ) {
			muestra_error( "Cp_clie", "danger",
			"El coódigo postal no debe ir vacío" );
			return false;
		} else if ( $( "#Noc_clie" ).val() == "" ) {
			muestra_error( "Noc_clie", "danger",
			"El número no debe ir vacío" );
			return false;
		} else if ( $( "#qr_clie" ).val() == "" ) {
			muestra_error( "qr_clie", "danger",
			"La dirección del QR no debe ir vacía" );
			return false;
		} else if ( $( "#cve_ciu" ).val() == 0 ) {
			muestra_error( "cve_ciu", "danger",
				"Debes seleccionar la ciudad" );
			return false;
		} else if ( $( "#Nom_usu" ).val() == "" ) {
			muestra_error( "Nom_usu", "danger",
			"El nombre de usuario no debe ir vacío" );
			return false;
		} else if ( ($("#Nom_clie").val()).search(patron) ) {
			muestra_error( "Nom_clie", "danger",
				"El nombre debe contener solo letras" );
			return false;
		}else if ( ($("#App_clie").val()).search(patron) ) {
			muestra_error( "App_clie", "danger",
				"El apellido paterno debe contener solo letras" );
			return false;
		}else if ( ($("#Apm_clie").val()).search(patron) ) {
			muestra_error( "Apm_clie", "danger",
				"El apellido materno debe contener solo letras" );
			return false;
		}else if ( ($("#Rfc_clie").val()).length<12 ) {
			muestra_error( "Rfc_clie", "danger",
				"El RFC debe contener 12 dígitos" );
			return false;
		}else if ( !patronEmail.test( $("#Email_clie").val()) ) {
			muestra_error( "Email_clie", "danger",
				"Correo electrónico inválido" );
			return false;
		}else if ( ($("#Tel_clie").val()).search(patronTel) ) {
			muestra_error( "Tel_clie", "danger",
				"El teléfono debe contener solo numeros" );
			return false;
		}else if ( ($("#Calle_clie").val()).search(patron) ) {
			muestra_error( "Calle_clie", "danger",
				"La calle debe contener solo letras" );
			return false;
		}else if ( ($("#Col_clie").val()).search(patron) ) {
			muestra_error( "Col_clie", "danger",
				"La colonia debe contener solo letras" );
			return false;
		}else if ( isNaN( $("#Cp_clie").val() ) ) {
			muestra_error( "Cp_clie", "danger",
				"El codigo postal debe contener solo números" );
			return false;
		} else if ( ($("#Cp_clie").val()).length<5 ) {
			muestra_error( "Cp_clie", "danger",
				"El código postal debe contener 5 dígitos" );
			return false;
		}
		else if ( isNaN( $("#Noc_clie").val() ) ) {
			muestra_error( "Noc_clie", "danger",
				"El número debe contener solo números" );
			return false;
		}
		else if ( isNaN( $("#bon_clie").val() ) ) {
			muestra_error( "bon_clie", "danger",
				"La bonificación debe contener solo números" );
			return false;
		}else if ( ($("#Cve_clie").val()).search(patroncve) ) {
			muestra_error( "Cve_clie", "danger",
				"La clave del cliente debe seguir el formato c_xxx" );
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